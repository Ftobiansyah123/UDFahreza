@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Pegawai') }}
                    <a href={{ route('pegawai.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
                    
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                            <thead>
                                    <tr>
                                    <th>Aksi</th>
                                        <th>ID</th>
                                        <th>Nama Pegawai</th>
                                        <th>Bagian</th>
                                        <th>Nomor Telepon</th>
                                        <th>Alamat</th> 
                                    </tr>
                                
                            </thead>
                            <tbody>
                                @php
                                $id = 1;
                                @endphp
                                @foreach ($pegawai as $pg)
                                <tr>
                                    <td>
                                        <a href={{ route('pegawai.edit', $pg->id) }} class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>EDIT</a>
                                        <a href={{ route('pegawai.hapus', $pg->id) }} class="btn btn-sm btn-danger"><i class="fa fa-eraser"></i>HAPUS</a>

                                    </td>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $pg->user->name }}</td>
                                    <td>{{ $pg->user->bagian }}</td>
                                    <td>{{ $pg->nomortelpon }}</td>
                                    <td>{{ $pg->alamat }}</td>
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
 