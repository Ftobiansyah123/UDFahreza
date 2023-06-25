@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Perubahan harga') }}
                    <a href={{ route('perubahan_harga.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                            
                        <thead><tr>

                               
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Harga Lama</th>
                                <th>Harga Baru</th>
                              
                               
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $id = 1;
                            @endphp
                            @foreach ($perubahan_harga as $ph)
                            <tr>
                         
                                <td>{{ $id++ }}</td>
                                <td>{{ $ph->stock->namabarang }}</td>
                                <td>{{ $ph->tanggal }}</td>
                                <td>{{ $ph->harga_lama }}</td>
                                <td>{{ $ph->harga_baru }}</td>
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
 