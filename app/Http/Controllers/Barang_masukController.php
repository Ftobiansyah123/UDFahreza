<?php

namespace App\Http\Controllers;
use App\Models\Barang_masuk;
use App\Models\Pegawai;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class Barang_masukController extends Controller
{
    public function index(){
        $barangmasuk = Barang_masuk::with(['stock', 'user', 'supplier'])->get();
        return view('barang_masuk.index', compact('barangmasuk'));
    }

    public function create() {
        $stock = Stock::all();
        $user = User::all();
        $supplier = Supplier::all();
        return view('Barang_masuk.create', compact('stock', 'user', 'supplier'));
    }

    public function store(Request $request) {
        $request->validate([
            'idsupplier' => 'required',
            'idbarang' => 'required',
            'tanggalmasuk' => 'required',
            'iduser' => 'required',
            'stok' => 'required',
            
           


        ]);

        $stockMasuk = $request->input('stok');
        $namaBarang = $request->input('idbarang');
        $ambiStok = Stock::where('id', $namaBarang)->first();

        $jumlahStok = $ambiStok->stok + $stockMasuk;
       
        $idUser = auth()->user()->name;
        $idUser = auth()->user()->id;
        $request->merge(['iduser' => $idUser]);
        Barang_masuk::create($request->all());
        $ambiStok->update(['stok' => $jumlahStok]);

        
        
       
        return redirect()->route('barang_masuk');
    
    }

 

    public function preview()
    {
        
        $barangmasuk = Barang_masuk::with(['stock'])->get(); // replace with your own data
        return view('barang_masuk.preview', compact('barangmasuk'));
            
        
            
    }
  
        
            
   
    public function cetakPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Mendapatkan data perubahan harga berdasarkan periode yang dipilih
        $barangmasuk = Barang_masuk::whereBetween('tanggalmasuk', [$start_date, $end_date])->get();
    
        
        $pdf = PDF::loadView('cetak.barang_masuk', compact('barangmasuk', 'start_date', 'end_date'));
        return $pdf->download('cetak_barang_masuk.pdf');
    
        
    }

 
    
}
