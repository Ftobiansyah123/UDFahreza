@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="overflow-y: auto;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Stock') }}
                    <a href={{ route('stock.create') }} class="btn btn-sm btn-primary float-end"> <i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered table-striped text-sm-right display " >
                        <thead>
            <tr>
                <th>AKSI</th>
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
            <tr>
                <td>  
                    <a href={{ route('stock.edit', $st->id) }} class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>    
                    EDIT</a>
                    <a href={{ route('stock.hapus', $st->id) }} class="btn btn-sm btn-danger">
                        <i class="fa fa-eraser"></i>
                    HAPUS</a>
</td>
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
@endsection
 