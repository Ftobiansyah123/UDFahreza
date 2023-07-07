<?php

namespace App\Http\Controllers;
use App\Models\Perubahan_hargaJual;
use App\Models\Stock;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;

class Perubahan_hargaJualController extends Controller
{
    public function index(){
        $perubahan_harga = Perubahan_hargaJual::with(['stock'])->get();
        return view('perubahan_hargaJual.index', compact('perubahan_harga'));
    }

    public function create() {
        $stock = Stock::all();                
       
        return view('perubahan_hargaJual.create', compact('stock'));
    }
   

    public function store(Request $request) {
        $request->validate([
            
            'idbarang' => 'required',
            'tanggal' => 'required',
            'harga_modal' => 'required',
            'harga_jual' => 'required',
        ]);

        $hargajual = $request->input('harga_jual');
        $namaBarang = $request->input('idbarang');
        $ambilharga = Stock::where('id', $namaBarang)->first();

        // $harganew = $ambilharga->harga == $hargabaru;
        
        // Stock::where('id', $namaBarang)->update(['harga' => $hargabaru]);
        
        Perubahan_hargaJual::create($request->all());
        $ambilharga->update(['hargaJual' => $hargajual]);
        return redirect()->route('perubahan_hargaJual');
    
    }

   

    public function destroy($id){
        $perubahan_harga =Perubahan_harga::find($id);
        $perubahan_harga->delete();
        return redirect()->route('perubahan_harga');
    }
    public function preview()
    {
        
        $perubahan_hargaJual = Perubahan_hargaJual::with(['stock'])->get(); // replace with your own data
        return view('perubahan_hargaJual.preview', compact('perubahan_hargaJual'));
            
        
            
    }
  
        
            
   
    public function cetakPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Mendapatkan data perubahan harga berdasarkan periode yang dipilih
        $perubahan_hargaJual = Perubahan_hargaJual::whereBetween('tanggal', [$start_date, $end_date])->get();
    
        
        $pdf = PDF::loadView('cetak.perubahan_hargaJual', compact('perubahan_hargaJual', 'start_date', 'end_date'));
        return $pdf->download('cetak_perubahan_hargaJual.pdf');
    
        
    }
    
}
