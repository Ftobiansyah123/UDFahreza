<?php

namespace App\Http\Controllers;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(){
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran'));
    }
    public function create() {
        $pengeluaran = Pengeluaran::all();
        $Referensi = uniqid();
        return view('pengeluaran.create', compact('pengeluaran', 'Referensi'));
    }
    public function store(Request $request) {

        $request->validate([
           'noPengeluaran' => 'required',
           'namapengeluaran' => 'required',
           'tanggalPengeluaran' => 'required',
           'biaya' => 'required',
          


       ]);
       Pengeluaran::create($request->all());
       
       return redirect()->route('pengeluaran');
   }
   public function edit($id){
   
 
    $pengeluaran =Pengeluaran::find($id);
    Return view('pengeluaran.edit', compact('pengeluaran'));
}

public function update(Request $request, $id){
    $pengeluaran =Pengeluaran::find($id);
    $pengeluaran->update($request->all());
   
    return redirect()->route('pengeluaran');
}

public function destroy($id){
    $pengeluaran =Pengeluaran::find($id);
    $pengeluaran->delete();
    return redirect()->route('pengeluaran');
}
}
