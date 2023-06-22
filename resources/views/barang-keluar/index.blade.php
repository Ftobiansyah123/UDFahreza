@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Barang Keluar') }}
                    <a href={{ route('barang_keluar.create') }} class="btn btn-sm btn-primary float-end">  <i class="fa-solid fa-circle-plus fa-beat" ></i>Tambah Data</a>
                    <a href={{ route('cetak_barang_keluar.pdf') }} class="btn btn-sm btn-primary float-left" target="_blank">CETAK PDF</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-sm-right">
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Tanggal Keluar</th>
                                <th>Nama Penerima</th>
                                <th>Aksi</th>
                               
                            </tr>
                            @php
                            $id = 1;
                            @endphp
                            @foreach ($barangkeluar as $bk)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $bk->stock->namabarang }}</td>
                                <td>{{ $bk->stok }}</td>
                                <td>{{ $bk->tanggalkeluar }}</td>
                                <td>{{ $bk->penerima }}</td>
                                
                                <td>
                                <!-- <a href={{ route('barang_keluar.edit', $bk->id) }} class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>EDIT</a> -->
                                <a href={{ route('barang_masuk.hapus', $bk->id) }} class="btn btn-sm btn-danger"> <i class="fa fa-eraser"></i>HAPUS</a>

                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 