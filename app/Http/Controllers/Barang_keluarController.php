<?php

namespace App\Http\Controllers;
use App\Models\Barang_keluar;
use App\Models\Stock;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class Barang_keluarController extends Controller
{
    public function index(){
        $barangkeluar = Barang_keluar::with(['stock'])->get();
        return view('barang_keluar.index', compact('barangkeluar'));
    }

    public function create() {
        $stock = Stock::all();
       
        return view('Barang_keluar.create', compact('stock'));
    }

    public function store(Request $request) {
        $request->validate([
            
            'idbarang' => 'required',
            'stok' => 'required',
            'tanggalkeluar' => 'required'
            
            
           


        ]);

        $stockKeluar = $request->input('stok');
        $namaBarang = $request->input('idbarang');
        $ambiStok = Stock::where('id', $namaBarang)->first();

        $jumlahStok = $ambiStok->stok - $stockKeluar;
       
        $idUser = auth()->user()->name;
        $idUser = auth()->user()->id;
        $request->merge(['iduser' => $idUser]);
        Barang_keluar::create($request->all());
        $ambiStok->update(['stok' => $jumlahStok]);
        return redirect()->route('barang_keluar');
    
    }

    public function edit($id){
        $stock = Stock::all();
        
        $barangkeluar =Barang_keluar::find($id);
        Return view('barang_keluar.edit', compact('barangmasuk', 'stock', 'user', 'supplier'));
    }

    public function update(Request $request, $id){
        $barangkeluar =Barang_keluar::find($id);
        $barangkeluar->update($request->all());
        alert()->success('Sukses','Data sudah update.');
        return redirect()->route('barang_keluar');
    }

    public function preview()
    {
        
        $barangkeluar = Barang_keluar::with(['stock'])->get(); // replace with your own data
        return view('barang_keluar.preview', compact('barangkeluar'));
            
        
            
    }
  

    public function cetakPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Mendapatkan data perubahan harga berdasarkan periode yang dipilih
        $barangkeluar = Barang_keluar::whereBetween('tanggalkeluar', [$start_date, $end_date])->get();
    
        
        $pdf = PDF::loadView('cetak.barang_keluar', compact('barangkeluar', 'start_date', 'end_date'));
        return $pdf->download('cetak_barang_keluar.pdf');

    }
}
