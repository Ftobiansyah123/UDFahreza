@extends('layoutsOffice.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h1>Point of Sales</h1>
                    <br>
                    <div class="line_nota"></div>
                    <div class="line_nota"></div>
                    
                        <div clas="container">
                        <div class="row ">
                            <div class="col-8">
                                
                            <h2>Daftar Barang</h2>
                    <div class="line_nota"></div>
                        
                        <table id="data-tabel" class="table  table-group-divider table-bordered">
                                <thead>
                                    <tr>
                                    <th class="text-center">Aksi</th>
                                        <th>Nomor Barang</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $br)
                                    <tr>
                                    <td class="text-center">
                                            <form action="{{ route('point-of-sales.add-to-cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="idbarang" value="{{ $br->id }}">
                                                <input class="text-center" type="number" name="stok" min="1" max="{{ $br->stok }}" placeholder="1">
                                                <button class="btn btn-success" type="submit">Tambah</button>
                                            </form>
                                        </td>
                                        <td>{{ $br->nomorbarang }}</td>
                                        <td>{{  $br->namabarang }}</td>
                                        <td scope="col" class="price-detail "> {{ $br->harga }}</td>
                                        <td class="text-end">{{ $br->stok }}</td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                
                                </tfoot>
                            </table>
                            
                            <div class="line_nota">
                                
                            </div>
                            <div class="line_nota"></div>
                            </div>
                        <!-- Tampilkan keranjang -->
                        <div class="col-4 p-3 mb-2 bg-warning ">
                            
                      
                        <h2 class="text-bg-dark">Keranjang</h2>
                        <div class="line_nota"></div>
                        <div class="line_nota"></div>
                        @if(session('cart'))
                        <table id="" class="tabel bg-light table-bordered table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th >Harga</th>
                                    <th>QTY</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('cart') as $id => $details)
                                <tr>
                                    <td>{{ $details['nama'] }}</td>
                                    <td scope="col "class="price-detail">{{ $details['harga'] }}</td>
                                    <td class="text-center">{{ $details['stok'] }}</td>
                                    <td scope="col "class="price-detail" >{{ $details['harga'] * $details['stok'] }}</td>
                                    <td>
                                        <form action="{{ route('point-of-sales.remove-from-cart', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                    
                                @endforeach
                            </tbody>
                        </table>

                        <form action="{{ route('point-of-sales.checkout') }}" method="POST">
                            @csrf
                            <button class="btn btn-primary" type="submit">Checkout</button>
                        </form>
                        @endif
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
 