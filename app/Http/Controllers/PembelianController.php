<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Models\Pembelian;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Barang_masuk;
use App\Models\Perubahan_harga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class PembelianController extends Controller
{
    public function index()
    {
        $stock = Stock::all();
        $supplier = Supplier::all();
    
        return view('pembelian.index', compact('stock', 'supplier'));
    }
    public function addToCart(Request $request)
    {   
        $request->validate([
            
            'idbarang' => 'required',
            'idsupplier' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'idsupplier' => 'required'
        ]);
        $stock = Stock::find($request->input('idbarang'));
        $supplier = Supplier::find($request->input('idsupplier'));
    
        $cart = session()->get('cart', []);
    
        $stok = $request->input('stok') ?? 1; // Menggunakan nilai default 1 jika 'stokMasuk' tidak ada
        $harga = $request->input('harga');
    
       
   
        if (isset($cart[$stock->id])) {
            $cart[$stock->id]['stok'] += $stok;
            $cart[$stock->id]['harga'] += $harga;
        } else {
            $cart[$stock->id] = [
                'nama' => $stock->namabarang,
                'harga' => $harga,
                'stok' => $stok,
                'namasupplier' => $supplier->namasupplier
            ];
        }
     
        session()->put('cart', $cart);
      
    
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }
    
public function removeItemFromCart($id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang.');
}


public function checkout()
{   
    $cart = session()->get('cart');
    $user = Auth::user();
 
    $noPembelian = uniqid(); // Menghasilkan nomor transaksi unik

    foreach ($cart as $id => $details) {
        $stock = Stock::find($id);
        $supplier = Supplier::where('namasupplier', $details['namasupplier'])->first();
        $stock->harga = $details['harga'];
        $stock->stok += $details['stok'];
        $stock->save();

     
                $pembelian = new Pembelian([
            'noPembelian' => $noPembelian, // Menyimpan nomor transaksi yang sama pada setiap item
            'idbarang' => $stock->id,
            'iduser' => $user->id,
            'idsupplier' => $supplier->id,
            'hargaModal' => $details['harga'],
            'stokMasuk' => $details['stok']
        ]);
     
        $pembelian->save();
        $barangmasuk = new Barang_masuk([
            'idbarang' => $stock->id,
            'idsupplier'=> $supplier->id,
            'stok' => $details['stok'],
            'tanggalmasuk' => $pembelian['created_at'], // Menggunakan tanggal penjualan sebagai tanggal keluar
            'iduser' => $user->id,
            'keterangan' => 'Pembelian',
            'token' => $noPembelian
        ]);
        $barangmasuk->save();
        $perubahan_harga = new Perubahan_harga([
            'idbarang' => $stock->id,
             'tanggal' => $pembelian['created_at'],
             'harga_lama' => $stock->harga,
             'harga_baru' => $details['harga'],
             'token' => $noPembelian

        ]);
        $barangmasuk->save();
    }

    session()->forget('cart');

    return redirect()->route('pembelian.printout', ['noPembelian' => $noPembelian])
        ->with('success', 'Pembayaran berhasil. Terima kasih atas pembelian Anda!');
}  
public function destroy($noPembelian){
    $pembelian =Pembelian::where('noPembelian', $noPembelian);
    $pembelian->delete();
    $barangmasuk =Barang_masuk::where('token', $noPembelian);
    $barangmasuk->delete();
    return redirect()->route('pembelian.indexEdit');
}
public function printout($noPembelian)
        {
            
            
            $pembelian = Pembelian::where('noPembelian', $noPembelian)->get();
            $tanggalbeli = $pembelian->first()->created_at->isoFormat('DD MMMM Y');
           
            return view('pembelian.printout', compact('pembelian', 'noPembelian', 'tanggalbeli'));
        }
        public function indexEdit()
        {
            $pembelianEdit = Pembelian::groupBy('noPembelian')->get();
            return view('pembelian.indexEdit', compact('pembelianEdit'));
        }
		 public function cetak($noPembelian)
        {
            
            $pembelian = Pembelian::where('noPembelian', $noPembelian)->get();
            $today = Carbon::now()->isoFormat('DD MMMM Y');
           
            $tanggalbeli = $pembelian->first()->created_at->isoFormat('DD MMMM Y');
            $pdf = PDF::loadView('cetak.pembelian_pdf',compact( 'noPembelian', 'pembelian', 'today', 'tanggalbeli') );
           
     
            return $pdf->download('cetak_pembelian.pdf');
        }


}
