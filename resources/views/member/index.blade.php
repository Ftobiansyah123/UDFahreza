@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Member') }}
                    <a href={{ route('member.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
                    {{-- <a href={{ route('cetak_pegawai.pdf') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-print"></i> Cetak Data</a>
                     --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                            <thead>
                                    <tr>
                                    <th>Aksi</th>
                                        <th>ID</th>
                                        <th>No Referensi</th>
                                        <th>Nama Member</th>
                                        <th>Nomor Telpon</th>
                                        <th>Discount</th> 
                                    </tr>
                                
                            </thead>
                            <tbody>
                                @php
                                $id = 1;
                                @endphp
                                @foreach ($member as $mb)
                                <tr>
                                    <td>
                                        <a href={{ route('member.edit', $mb->id) }} class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>EDIT</a>
                                        <a href={{ route('member.hapus', $mb->id) }} class="btn btn-sm btn-danger"><i class="fa fa-eraser"></i>HAPUS</a>

                                    </td>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $mb->noReferensi }}</td>
                                    <td>{{ $mb->namamember }}</td>
                                    <td>{{ $mb->nomortelpon }}</td>
                                    <td>{{ format_uang($mb->discount) }}%</td>
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
 