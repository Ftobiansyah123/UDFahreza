@extends('layoutsOffice.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Pembelian') }}
                    <a href="{{ route('pembelian.indexEdit') }}"><i class="btn btn-success fa fa-house-chimney-user float-lg-end"> Data Pembelian</i></a>
                </div>
                    
                <div class="card-body">
                   
                            <br>
                    <div class="table-responsive">
                        <table id="" class="table table-bordered text-sm-right ">
                                <thead><tr>
                                    <form action="{{ route('Pembelian.add-to-cart') }}" method="post">
                                        @csrf
                                           
                                        <select style="width: 190px" name="idsupplier" id="idsupplier" class="idsupplier form-control @error('idsupplier') is-invalid @enderror" >
                                            <option value="" disabled selected>--Pilih Supplier--</option>
                                            @foreach ( $supplier as $sp)
                                            <option value="{{ $sp->id }}">{{ $sp->namasupplier }}</option>
                                            @endforeach
                                        </select>
                                    @error('idsupplier')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                    <th>Nomor-Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Stock Tersedia</th>
                                    <th>QTY Pembelian</th>
                                    <th>Harga</th>
                                 
                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                               
                                <td>
                                    
                                    <select style="width: 190px" name="idbarang" id="idbarang" class="idbarang form-control @error('idbarang') is-invalid @enderror" >
                                        <option value="" disabled selected>--Pilih Barang--</option>
                                        @foreach ( $stock as $st)
                                        <option  value="{{ $st->id }}"  data-harga="{{ $st->harga }}" data-satuan="{{  $st->satuan}}" data-stok="{{ $st->stok }}">{{ $st->namabarang }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('idbarang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                                </td>
                           
                                <td> <input type="text" id="satuan" name="satuan" class="form-control" readonly ></td>
                                <td><input type="number" id="stokModal" name="stokModal" class="form-control" readonly></td>
                                <td> <input type="number" id="stok" name="stok" class="form-control @error('stok') is-invalid @enderror" >
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                <td> <input type="number" id="harga" name="harga" class="form-control"  >
                                </td>  
                            </tr>
                           
                            </tbody>
                           <tfoot>
                            <tr>
                                <td colspan="5">
                                    
                                   
                                        <button class="btn btn-success" type="submit"  >Tambah</button>
                                    </form>
                                </td>
                            </tr>
                           </tfoot>
                            
        
                        </table>
                    </div>
                    <div class="">

                        <h2 class="text-bg-secondary">Keranjang</h2>
                        <div class="line_nota"></div>
                        <div class="line_nota"></div>
                        @if(session('cart'))
                        <table class="tabel bg-light table-bordered table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Nomor-Nama Barang</th>
                                    <th>Nama Supplier</th>
                                    <th>Jumlah Stock</th>
                                    <th>Harga</th>
                                    <th>Harga Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('cart') as $id => $details)
                                <tr>
                                    <td>{{ $details['nama'] }}</td>
                                 
                                   <td>{{ $details['namasupplier'] }}</td>
                                    <td class="text-center">
                                      {{ $details['stok'] }} 
                                    </td>
                                    <td class="price-detail">{{ $details['harga'] }}</td>
                                    <td class="price-detail">{{ $details['harga'] * $details['stok'] }}</td>
                                    <td>
                                        <form action="{{ route('Pembelian.remove-from-cart', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('Pembelian.checkout') }}" method="POST">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>    
$(document).ready(function() {
  
  
    $('#idbarang').change(function() {
        // Ambil harga lama dari atribut data-harga pada pilihan yang dipilih
        var harga = $(this).find(':selected').data('harga');
        var stok = $(this).find(':selected').data('stok');
        var satuan = $(this).find(':selected').data('satuan');
        // Isi nilai harga lama pada input harga_lama
        $('#harga').val(harga);
        $('#stokModal').val(stok);
        $('#satuan').val(satuan);
    });


    $('.idbarang').select2();
$('.idsupplier').select2();

        });  
        
</script> 
@endsection
 