<?php

namespace App\Http\Controllers;
use App\Models\Barang_masuk;
use App\Models\Pegawai;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
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

 



 
    
}
