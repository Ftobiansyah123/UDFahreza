<?php

namespace App\Http\Controllers;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\Pembelian;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index(){
        $pengiriman = Pengiriman::with(['penjualan', 'pembelian'])->get();
        return view('pengiriman.index', compact('pengiriman'));
    }
    
    public function create() {
        $penjualan = Penjualan::all();
        $pembelian = Pembelian::all();
        $Referensi = uniqid('UDF-');
        return view('pengiriman.create', compact('penjualan', 'pembelian', 'Referensi'));
    }
    public function store(Request $request) {

        $request->validate([
           'noResi' => 'required',
           'datapengiriman' => 'required',
           'tanggal' => 'required',
           'catatan' => 'required',
          


       ]);
       
       Pengiriman::create($request->all());
       
       return redirect()->route('pengiriman');
   }
   public function destroy($id){
    $pengiriman =Pengiriman::find($id);
    $pengiriman->delete();
    return redirect()->route('pengiriman');
}
}
