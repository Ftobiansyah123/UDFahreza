@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Perubahan harga') }}
                    <a href={{ route('perubahan_hargaJual.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i> Tambah Data</a>
                    <a href={{ route('perubahan_hargaJual.preview') }} class="btn btn-sm btn-success float-md-right "><i class="fa-solid fa-print"></i> Cetak</a>
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                            
                        <thead class="table-primary">
                            <tr>

                               
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Tanggal</th>
                                <th>Harga Modal</th>
                                <th>Harga Jual</th>
                              
                               
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
                                <td>{{ $ph->stock->merek }}</td>
                                <td>{{ $ph->tanggal }}</td>
                                <td>{{ $ph->harga_modal}}</td>
                                <td>{{ $ph->harga_jual }}</td>
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
 