<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class PenjualanController extends Controller
{
   
        public function index()
        {
            $barang = Stock::all();
    
            return view('point_of_sales.index', compact('barang'));
        }
    
        public function addToCart(Request $request)
        {
            $barang = Stock::find($request->input('idbarang'));

            $cart = session()->get('cart', []);

            $stok = $request->input('stok') ?? 1; // Menggunakan nilai 1 jika stok tidak dimasukkan

            if ($stok > $barang->stok) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
            }

            if (isset($cart[$barang->id])) {
                $cart[$barang->id]['stok'] += $stok;
            } else {
                $cart[$barang->id] = [
                    'nama' => $barang->namabarang,
                    'harga' => $barang->harga,
                    'stok' => $stok
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
            $hargaAkhir = 0;
            $noTransaksi = uniqid(); // Menghasilkan nomor transaksi unik
        
            foreach ($cart as $id => $details) {
                $barang = Stock::find($id);
                $hargaAkhir += $barang->harga * $details['stok'];
                $barang->stok -= $details['stok'];
                $barang->save();
        
                $penjualan = new Penjualan([
                    'noTransaksi' => $noTransaksi, // Menyimpan nomor transaksi yang sama pada setiap item
                    'idbarang' => $barang->id,
                    'iduser' => $user->id,
                    'hargaAkhir' => $barang->harga * $details['stok'],
                    'kuantitas' => $details['stok']
                ]);
                $penjualan->save();
            }
        
            session()->forget('cart');
        
            return redirect()->route('point-of-sales.printout', ['noTransaksi' => $noTransaksi])
                ->with('success', 'Pembayaran berhasil. Terima kasih atas pembelian Anda!');
        }
        public function printout($noTransaksi)
        {
            
            $penjualan = Penjualan::where('noTransaksi', $noTransaksi)->get();
            $today = Carbon::now()->isoFormat('DD MMMM Y');
        
            return view('point_of_sales.printout', compact('penjualan', 'noTransaksi', 'today'));
        }

}
