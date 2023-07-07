<?php

namespace App\Http\Controllers;
use App\Models\Perubahan_harga;
use App\Models\Stock;
use PDF;
use Illuminate\Http\Request;

class Perubahan_hargaController extends Controller
{
    public function index(){
        $perubahan_harga = Perubahan_harga::with(['stock'])->get();
        return view('perubahan_harga.index', compact('perubahan_harga'));
    }

    public function create() {
        $stock = Stock::all();                
       
        return view('perubahan_harga.create', compact('stock'));
    }
   

    public function store(Request $request) {
        $request->validate([
            
            'idbarang' => 'required',
            'tanggal' => 'required',
            'harga_lama' => 'required',
            'harga_baru' => 'required',
        ]);

        $hargabaru = $request->input('harga_baru');
        $namaBarang = $request->input('idbarang');
        $ambilharga = Stock::where('id', $namaBarang)->first();

        // $harganew = $ambilharga->harga == $hargabaru;
        
        // Stock::where('id', $namaBarang)->update(['harga' => $hargabaru]);
        
        Perubahan_harga::create($request->all());
        $ambilharga->update(['harga' => $hargabaru]);
        return redirect()->route('perubahan_harga');
    
    }

    public function edit($id){
      
    }

    public function update(Request $request, $id){
        
        $perubahan_harga =Perubahan_harga::find($id);
        $perubahan_harga->update($request->all());
        return redirect()->route('perubahan_harga');
    }

    public function destroy($id){
        $perubahan_harga =Perubahan_harga::find($id);
        $perubahan_harga->delete();
        return redirect()->route('perubahan_harga');
    }
    public function preview()
    {
        
        $perubahan_harga = Perubahan_harga::with(['stock'])->get(); // replace with your own data
        return view('perubahan_harga.preview', compact('perubahan_harga'));
            
        
            
    }
  
        
            
   
    public function cetakPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Mendapatkan data perubahan harga berdasarkan periode yang dipilih
        $perubahan_harga = Perubahan_harga::whereBetween('tanggal', [$start_date, $end_date])->get();
    
        
        $pdf = PDF::loadView('cetak.perubahan_harga', compact('perubahan_harga', 'start_date', 'end_date'));
        return $pdf->download('cetak_perubahan_harga.pdf');
    
        
    }
}
