<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use App\Models\Pembelian;
use App\Models\Pegawai;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stock=Stock::all();
        $penjualan=Penjualan::all();
        return view('home', compact('stock', 'penjualan'));
    }

    public function office()
    {
        return view('Office')->with('status');
    }
    public function laba(){
       
        $penjualan=Penjualan::all();
        return view('laba.preview', compact('penjualan'));
    }
    public function search(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $penjualan = Penjualan::whereDate('created_at', '>=', $start_date)
                              ->whereDate('created_at', '<=', $end_date)
                              ->get();
        
        $pengeluaran = Pengeluaran::whereDate('created_at', '>=', $start_date)
                              ->whereDate('created_at', '<=', $end_date)
                              ->get();
        $pembelian = Pembelian::whereDate('created_at', '>=', $start_date)
                              ->whereDate('created_at', '<=', $end_date)
                              ->get();
        $pegawai = Pegawai::all();
        $totalgaji = $pegawai->sum('gaji');
        $totalmodal = $pembelian->sum('hargaModal');
        $totalbiayapengeluaran = $pengeluaran->sum('biaya');
        $totalHargaAkhir = $penjualan->sum('hargaAkhir');
        $total = $totalHargaAkhir - $totalmodal - $totalgaji - $totalbiayapengeluaran;

        return view('laba.preview', compact('totalHargaAkhir', 'totalbiayapengeluaran', 'totalmodal', 'totalgaji', 'total'));
    }
    public function cetakPDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $penjualan = Penjualan::whereDate('created_at', '>=', $start_date)
                              ->whereDate('created_at', '<=', $end_date)
                              ->get();
        
        $pengeluaran = Pengeluaran::whereDate('created_at', '>=', $start_date)
                              ->whereDate('created_at', '<=', $end_date)
                              ->get();
        $pembelian = Pembelian::whereDate('created_at', '>=', $start_date)
                              ->whereDate('created_at', '<=', $end_date)
                              ->get();
        $pegawai = Pegawai::all();
        $totalgaji = $pegawai->sum('gaji');
        $totalmodal = $pembelian->sum('hargaModal');
        $totalbiayapengeluaran = $pengeluaran->sum('biaya');
        $totalHargaAkhir = $penjualan->sum('hargaAkhir');
        $total = $totalHargaAkhir - $totalmodal - $totalgaji - $totalbiayapengeluaran;
        $pdf = PDF::loadView('cetak.laba',  compact('totalHargaAkhir', 'totalbiayapengeluaran', 'totalmodal', 'totalgaji', 'total'));
        return $pdf->download('cetak_laba-rugi.pdf');
    
        
    }
}
