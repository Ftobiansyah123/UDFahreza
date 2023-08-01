<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $supplier =Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    public function create() {
        return view('supplier.create');
    }

    public function store(Request $request) {

         $request->validate([
            'namasupplier' => 'required',
            'no_telepon' => 'required',
            'Alamat' => 'required',

        ]);
        
        Supplier::create($request->all());
        return redirect()->route('supplier');
    }

    public function edit($id){
        $supplier =Supplier::find($id);
        Return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id){
        $supplier =Supplier::find($id);
        $supplier->update($request->all());
        return redirect()->route('supplier');
    }

    public function destroy($id){
        $supplier =Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier');
    }
    public function cetak_pdf()
    {
        $today = Carbon::now()->isoFormat('DD MMMM Y');
        $supplier = Supplier::all(); // replace with your own data

        $pdf = PDF::loadView('cetak.supplier',compact('supplier', 'today') );
     
        return $pdf->stream('cetak_supplier.pdf');   
    }

}
