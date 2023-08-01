<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Carbon;
use App\Http\Requests\StorestockRequest;
use App\Http\Requests\UpdatestockRequest;
use PDF;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock=Stock::all();
        return view('stock.index', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestockRequest $request)
    {
        $request->validate([
              'nomorbarang' => 'required',
              'namabarang' => 'required',
              'merek' => 'required',
              'satuan' => 'required',
              'harga' => 'required',
              'stok' => 'required',


          ]);


        Stock::create($request->all());

        return redirect()->route('stock');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stock =Stock::find($id);
        return view('stock.edit', compact('stock'));
    }

    public function update(Request $request, $id)
    {
        $stock =Stock::find($id);
        $stock->update($request->all());
        return redirect()->route('stock');
    }

    public function destroy($id)
    {
        $stock =Stock::find($id);
        $stock->delete();
        return redirect()->route('stock');
    }
    public function cetak_pdf()
    {
        $today = Carbon::now()->isoFormat('
        DD-MMMM-Y');
        $stock = Stock::all(); // replace with your own data


        $pdf = PDF::loadView('cetak.stock', compact('stock', 'today'));

        return $pdf->stream('cetak_stock.pdf');

    }
}
