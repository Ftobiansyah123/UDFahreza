@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Supplier') }}
                    <a href={{ route('supplier.create') }} class="btn btn-sm btn-primary float-end "> <i class="fa-solid fa-circle-plus fa-beat" ></i>   Tambah Data</a>
                    

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                           
                            <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>ID</th>
                                <th>Nama Supplier</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                
                            </tr>
                            </thead>

                            <tbody>
                            @php
                        $id = 1;
                    @endphp
                            @foreach ($supplier as $sp)
                            <tr>
                                <td>
                                <a href={{ route('supplier.edit', $sp->id) }} class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>    
                                EDIT</a>
                                <a href={{ route('supplier.hapus', $sp->id) }} class="btn btn-sm btn-danger">
                                <i class="fa fa-eraser"></i>
                                HAPUS</a>

                                </td>
                                <td>{{ $id++ }}</td>
                                <td>{{ $sp->namasupplier }}</td>
                                <td>{{ $sp->no_telepon }}</td>
                                <td>{{ $sp->Alamat }}</td>
                              
                                
                                
                            </tr>
                            @endforeach
                            </tbody>

                            <tfoot></tfoot>

                             
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 