@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Supplier') }}
                    <a href={{ route('supplier.create') }} class="btn btn-sm btn-primary float-end "> <i class="fa-solid fa-circle-plus fa-beat" ></i>   Tambah Data</a>
                     <a href={{ route('cetak_supplier.pdf') }} class="btn btn-sm btn-primary float-left" target="_blank">CETAK PDF</a>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-sm-right">
                            <tr>
                                <th>ID</th>
                                <th>Nama barang</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                             @php
                        $id = 1;
                    @endphp
                            @foreach ($supplier as $sp)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $sp->namasupplier }}</td>
                                <td>{{ $sp->no_telepon }}</td>
                                <td>{{ $sp->Alamat }}</td>
                              
                                
                                <td>
                                <a href={{ route('supplier.edit', $sp->id) }} class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>    
                                EDIT</a>
                                <a href={{ route('supplier.hapus', $sp->id) }} class="btn btn-sm btn-danger">
                                <i class="fa fa-eraser"></i>
                                HAPUS</a>

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
 