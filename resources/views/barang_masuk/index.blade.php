@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Barang Masuk') }}
                    <a href={{ route('barang_masuk.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
                    <a href={{ route('barang_masuk.preview') }} class="btn btn-sm btn-success float-md-right "><i class="fa-solid fa-print"></i> Cetak</a>
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                                <thead><tr>
                                    <th>ID</th>
                                    <th>Nama Supplier</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Nama Pegawai</th>
                                    <th>Keterangan</th>
                                    <th>Stok Masuk</th>
                                    <th>Stok Tersedia</th>
                            
                                
                                </tr>
                            </thead>
                            <tbody>@php
                            $id = 1;
                            @endphp
                            @foreach ($barangmasuk as $bm)
                            <tr>
                                 
                        
                                <td>{{ $id++ }}</td>
                                <td>{{ $bm->supplier->namasupplier }}</td>
                                <td>{{ $bm->stock->namabarang }}</td>
                                <td>{{ $bm->stock->satuan }}</td>
                                <td>{{ $bm->tanggalmasuk }}</td>
                                <td>{{ $bm->user->name }}</td>
                                <td>{{ $bm->keterangan }}</td>
                                <td>{{ $bm->stok }}</td>
                                <td>{{ $bm->stock->stok }}</td>
                               
                            </tr>
                            @endforeach</tbody>
                            <tfoot>
                              
                            </tfoot>
                            
                            
        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 