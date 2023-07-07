@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Barang Keluar') }}
                    <a href={{ route('barang_keluar.create') }} class="btn btn-sm btn-primary float-end">  <i class="fa-solid fa-circle-plus fa-beat" ></i>Tambah Data</a>
                    <a href={{ route('barang_keluar.preview') }} class="btn btn-sm btn-success float-md-right "><i class="fa-solid fa-print"></i> Cetak</a>
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                        <thead><tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Tanggal Keluar</th>
                                <th>Nama Penerima</th>
                           
                               
                            </tr></thead> 
                        <tbody> @php
                            $id = 1;
                            @endphp
                            @foreach ($barangkeluar as $bk)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $bk->stock->namabarang }}</td>
                                <td>{{ $bk->stok }}</td>
                                <td>{{ $bk->tanggalkeluar }}</td>
                                <td>{{ $bk->user->name }}</td>
                                
                              
                            </tr>
                            @endforeach</tbody>
                        <tfoot></tfoot>   
                        
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 