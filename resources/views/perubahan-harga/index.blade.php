@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Perubahan harga') }}
                    <a href={{ route('perubahan_harga.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
                    <a href={{ route('cetak_perubahan_harga.pdf') }} class="btn btn-sm btn-primary float-left" target="_blank">CETAK PDF</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-sm-right">
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Harga Lama</th>
                                <th>Harga Baru</th>
                                <th>Aksi</th>
                               
                            </tr>
                            @php
                            $id = 1;
                            @endphp
                            @foreach ($perubahan_harga as $ph)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $ph->stock->namabarang }}</td>
                                <td>{{ $ph->tgl }}</td>
                                <td>{{ $ph->harga_lama }}</td>
                                <td>{{ $ph->harga_baru }}</td>
                                
                                <td>
                                <!-- <a href={{ route('perubahan_harga.edit', $ph->id) }} class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>EDIT</a> -->
                                <a href={{ route('perubahan_harga.hapus', $ph->id) }} class="btn btn-sm btn-danger"><i class="fa fa-eraser"></i>HAPUS</a>

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
 