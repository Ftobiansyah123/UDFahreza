<?php

namespace App\Http\Controllers;
use App\Models\Perubahan_harga;
use App\Models\Stock;
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
}
