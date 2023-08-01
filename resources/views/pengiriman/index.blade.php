@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Pengiriman') }}
                    <a href={{ route('pengiriman.create') }} class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-circle-plus fa-beat"></i>Tambah Data</a>
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
                                        <th>No Resi</th>
                                        <th>Data pengiriman</th>
                                        <th>Tanggal pengiriman</th>
                                        <th>Catatan</th> 
                                    </tr>
                                
                            </thead>
                            <tbody>
                                @php
                                $id = 1;
                                @endphp
                                @foreach ($pengiriman as $mb)
                                <tr>
                                    <td>
                                        
                                        <a href={{ route('pengiriman.hapus', $mb->id) }} class="btn btn-sm btn-danger"><i class="fa fa-eraser"></i>HAPUS</a>

                                    </td>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $mb->noResi }}</td>
                                    <td>
                                        @if ($mb->penjualan && $mb->datapengiriman == $mb->penjualan->noTransaksi)
                                        <a href="{{ route('point-of-sales.printout', ['noTransaksi' => $mb->penjualan->noTransaksi]) }}">{{ $mb->datapengiriman }}</a>
                                    @elseif ($mb->pembelian && $mb->datapengiriman == $mb->pembelian->noPembelian)
                                        <a href="{{ route('pembelian.printout', ['noPembelian' => $mb->pembelian->noPembelian]) }}">{{ $mb->datapengiriman }}</a>
                                    @else
                                        {{ $mb->datapengiriman }}
                                    @endif
                                    
                                    
                                    </td>
                                    
                                    <td>{{ $mb->tanggal }}</td>
                                    <td>{{ $mb->catatan }}</td>
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
 