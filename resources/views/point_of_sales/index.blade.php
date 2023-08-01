@extends('layoutsOffice.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('point-of-sales.indexEdit') }}"><i class="btn btn-success fa fa-house-chimney-user float-lg-end"> Data Transaksi</i></a>
                    <h1>Point of Sales</h1>
                    
                    <br>
                   
                 
                    <div class="line_nota"></div>
                    <div class="line_nota"></div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                               
                                <h2>Daftar Barang</h2>
                                <div class="line_nota"></div>
                                <table id="data-tabel" class="table table-group-divider table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-start">QTY</th>
                                            <th>Nomor Barang</th>
                                            <th>Nama</th>
                                            <th>Merek</th>
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
                                                    @if($br->hargaJual == 0)
                                                        <button class="btn btn-success" type="submit" disabled>Tambah</button>
                                                    @else
                                                        <button class="btn btn-success" type="submit">Tambah</button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>{{ $br->nomorbarang }}</td>
                                            <td>{{ $br->namabarang }}</td>
                                            <td>{{ $br->merek }}</td>
                                            <td class="price-detail">{{ $br->hargaJual }}</td>
                                            <td class="text-end">{{ $br->stok }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    
                                    </tfoot>
                                </table>
                                <div class="line_nota"></div>
                                <div class="line_nota"></div>
                            </div>
                                                    <!-- Tampilkan keranjang -->
                            <div class="col-4 p-3 mb-2" style="background-color: #ffd541">
                                <h2 class="text-bg-secondary">Keranjang</h2>
                                <div class="line_nota"></div>
                                <div class="line_nota"></div>
                                @if(session('cart'))
                                <table class="tabel bg-light table-bordered table-striped-columns">
                                    <thead>
                                        <tr>
                                            <th class="text-start">Nama</th>
                                            <th>Harga</th>
                                            <th>QTY</th>
                                            <th>Total Harga</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(session('cart') as $id => $details)
                                        <tr>
                                            <td>{{ $details['nama'] }}</td>
                                            <td class="price-detail">{{ $details['hargaJual'] }}</td>
                                            <td class="text-center">
                                              {{ $details['stok'] }} 
                                            </td>
                                            <td class="price-detail">{{ $details['hargaJual'] * $details['stok'] }}</td>
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
                                    <label for="">Member</label>
                                   <select name="member" id="member" class="form-control">
                                    <option value="" disabled selected>--plih member--</option>
                                    @foreach ($member as $m)
                                    <option value="{{$m->id}}">{{$m->namamember}}</option>
                                    @endforeach
                                   </select>
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
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit-qty', function() {
            var id = $(this).data('id');
            $('#qtyId').val(id);
        });
    });
</script>


@endsection
