@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Transaksi') }}
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered text-sm-right">
                        <thead><tr>
                                <th>Aksi</th>
                                <th>ID</th>
                                <th>Nomor Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Kasir</th>
                               
                               
                            </tr></thead> 
                        <tbody> @php
                            $id = 1;
                            @endphp
                            @foreach ($posEdit as $pe)
                            <tr>
                                <td><a href={{ route('point-of-sales.delete', $pe->noTransaksi) }} class="btn btn-sm btn-danger">
                                    <i class="fa fa-eraser"></i>    
                            Hapus</a>
                            <a href={{ route('point-of-sales.printout',$pe->noTransaksi) }} class="btn btn-sm btn-primary btn-detail">
                                <i class="fa fa-eye"></i>    
                        Lihat Detail </a>
                                    
                                </td>
                                <td>{{ $id++ }}</td>
                                <td>{{ $pe->noTransaksi}}</td>
                                <td>{{ $pe->created_at }}</td>
                                <td>{{ $pe->user->name }}</td>
                                
                            
                            </tr>
                            @endforeach</tbody>
                        <tfoot></tfoot>   
                        
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 