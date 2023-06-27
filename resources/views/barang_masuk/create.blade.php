@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Data Barang Masuk') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.barang_masuk') }}" method="post">
                        @csrf
                        
                        <div class="from-group">
                        <div class="col">
                            <label for="idsupplier" class="form-label"
                           
                            >Nama Supplier</label>
                            <select name="idsupplier" id="idsupplier" class="form-control @error('idsupplier') is-invalid @enderror" >
                                <option value="" disabled selected>--Pilih Supplier--</option>
                                @foreach ( $supplier as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->namasupplier }}</option>
                                @endforeach
                                
                            </select>
                   @error('idsupplier')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        <div class="col">
                            <label for="iduser" class="form-label">Nama Barang</label>
                            <select name="idbarang" id="idbarang" class="form-control @error('idbarang') is-invalid @enderror" >
                                <option value="" disabled selected>--Pilih Barang--</option>
                                @foreach ( $stock as $st)
                                <option value="{{ $st->id }}" data-stok="{{ $st->stok }}">{{ $st->namabarang }}</option>
                                @endforeach
                                
                            </select>
                            @error('idbarang')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                           <div class="mb-3">
                      
                            <label for="stoklama" class="form-label">Stok Lama </label>
                            <input type="number" id="stoklama" name="stoklama" class="form-control" readonly > 
                        
                           
                        </div>
                        <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>

                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror " placeholder="masukan stok">
                                @error('stok')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                            <label for="date" class="col-1 col-form-label">Date</label>
                            <input type="date" name="tanggalmasuk" class="form-control" placeholder="masukan tanggal" >

                             @error('tanggalmasuk')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>

                        <div class="mb-3">
                      
                      <label for="user" class="form-label">Pegawai Pengolah </label>
                      <input type="text" id="iduser" name="iduser" value="{{ Auth::user()->name }} " class="form-control"  readonly > 
                  
                     
                  </div>
                        
                        
                        <div class="mb-3">
                                <label for="alamat" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="desk" cols="2" rows="3" style="resize: none" ></textarea>
                                
                        </div>
                       
                        </div>
    
                        
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col float-end">
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                <button type="button" class="btn btn-md btn-danger" onclick="window.history.back();">Cancel</button>
                                </div>
                              
                            </div>
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>    
$(document).ready(function() {
    $('#idbarang').select2();
    $('#idbarang').change(function() {
        // Ambil harga lama dari atribut data-harga pada pilihan yang dipilih
        var stok = $(this).find(':selected').data('stok');
        // Isi nilai harga lama pada input harga_lama
        $('#stoklama').val(stok);
    });
        });  
        
</script> 
@endsection
 