@extends('layoutsOffice.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Pembelian') }}
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" class="table table-bordered text-sm-right">
                        <thead><tr>
                                <th>Aksi</th>
                                <th>ID</th>
                                <th>Nomor Pembelian</th>
                                <th>Tanggal Pembelian</th>
								<th>Supplier</th>
                                <th>Pegawai Pemesan</th>
                               
                               
                            </tr></thead> 
                        <tbody> @php
                            $id = 1;
                            @endphp
                            @foreach ($pembelianEdit as $pe)
                            <tr>
                                <td><a href={{ route('pembelian.delete', $pe->noPembelian) }} class="btn btn-sm btn-danger">
                                    <i class="fa fa-eraser"></i>    
                            Hapus</a>
                            <a href={{ route('pembelian.printout',$pe->noPembelian) }} class="btn btn-sm btn-primary btn-detail">
                                <i class="fa fa-eye"></i>    
                        Lihat Detail </a>
                                    
                                </td>
                                <td>{{ $id++ }}</td>
                                <td>{{ $pe->noPembelian}}</td>
                                <td>{{ $pe->created_at }}</td>
								<td>{{ $pe->supplier->namasupplier }}</td>
                                <td>{{ $pe->user->name }}</td>
                                
                            
                            </tr>
                            @endforeach</tbody>
                 
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 