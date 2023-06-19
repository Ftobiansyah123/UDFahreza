@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Barang Masuk') }}
                    <a href={{ route('barang_masuk.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
                    <a href={{ route('cetak_barang_masuk.pdf') }} class="btn btn-sm btn-primary float-left" target="_blank">CETAK PDF</a>
                 
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-sm-right">
                            <tr>
                                <th>ID</th>
                                <th>Nama Supplier</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Pegawai Penerima</th>
                                <th>Keterangan</th>
                                <th>Stok Masuk</th>
                                <th>Aksi</th>
                               
                            </tr>
                            @php
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
                                
                                <td>
                                <a  href={{ route('cetak_invoice_bm.pdf', $bm->id) }} class="btn btn-sm btn-warning" target="_blank"> <i class="fa fa-edit"  ></i>Invoice</a>
                                <!-- <a href={{ route('barang_masuk.edit', $bm->id) }} class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i>EDIT</a> -->
                                <a href={{ route('barang_masuk.hapus', $bm->id) }} class="btn btn-sm btn-danger"><i class="fa fa-eraser"></i>HAPUS</a>

                                </td>
                            </tr>
                            @endforeach
        
                            <tfoot>
                                <th colspan="6">
                                <td class="text-bold"><b>Jumlah Barang Masuk</b></td>
                                <td class=" text-bold text-end"><b>{{ $bm->sum('stok') }}</b></td>
                                <td></td>
                                </th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 