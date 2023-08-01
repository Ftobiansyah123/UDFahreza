@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="card card-deck bg-info text-bg-success" style="width: 200px">
                            <div class="card-body">
                                <h5 class="card-title">Total Penjualan</h5>
                                <p class="card-text price-detail ">Rp. {{$penjualan->sum('hargaAkhir') }}</p>
                            </div>
                        </div>  
                        <div class="card card-deck bg-success text-start text-bg-success" style="width: 300px">
                            <div class="card-body">
                                <h5 class="card-title">Total Barang Terjual</h5>
                                <p class="card-text">{{$penjualan->sum('kuantitas')}} UNIT</p>
                            </div>
                        </div>  
                        <div class="card bg-warning card-deck text-bg-success" style="width: 300px">
                            <div class="card-body">
                                <h5 class="card-title">Total Stok Barang Saat Ini</h5>
                                <p class="card-text">{{format_uang($stock->sum('stok'))}} UNIT</p>
                            </div>
                        </div>  
                </div>
              </div>
                
                <br>
                <div class="card">
                        <div class="card-header">
                            {{ __('Data Stock') }}
                          
                        
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-tabel" class="table table-bordered table-striped text-sm-right display " >
                                <thead>
                    <tr>
                  
                        <th>ID</th>
                        <th>Nomor Barang/SN</th>
                        <th>Nama barang</th>
                        <th>Merek</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $id = 1;
                @endphp
                @foreach ($stock as $st)
              
                    <td>{{ $id++ }}</td>
                    <td>{{ $st->nomorbarang }}</td>
                    <td>{{ $st->namabarang }}</td>
                    <td>{{ $st->merek }}</td>
                    <td>{{ $st->satuan }}</td>
                    <td>{{ $st->harga }}</td>
                    <td class="text-center">{{ $st->deskripsi }}</td>
                    <td class=" text-end">{{ $st->stok }}</td>
                                        
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                    <td class="text-bold"><b>Jumlah Stok Barang</b></td>
                            <td class=" text-bold text-end"><b>{{ $st->sum('stok') }}</b></td>

                    </tr>
                    
                </tfoot>
            </table>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </div>
</div>
@endsection
