<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
  
    public function index(){
        $pegawai = Pegawai::with(['user', 'bagian'])->get();
        return view('pegawai.index', compact('pegawai'));
    }
 
    public function create() {
        $user = User::all();
        return view('pegawai.create', compact('user'));
    }

    public function store(Request $request) {

         $request->validate([
            'iduser' => 'required',
            'idbagian' => 'required',
            'nomortelepon' => 'required',
            'alamat' => 'required',
           


        ]);
        Pegawai::create($request->all());
        
        return redirect()->route('pegawai');
    }

    public function edit($id){
        $user = User::all();
        $bagian = Bagian::all();
        $pegawai =Pegawai::find($id);
        Return view('pegawai.edit', compact('pegawai','bagian', 'user'));
    }

    public function update(Request $request, $id){
        $pegawai =Pegawai::find($id);
        $pegawai->update($request->all());
       
        return redirect()->route('pegawai');
    }

    public function destroy($id){
        $pegawai =Pegawai::find($id);
        $pegawai->delete();
        
        return redirect()->route('pegawai');
    }

}
