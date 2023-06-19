@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Stock') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.stock') }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
                        <div class="mb-3">
                            <label for="nomorbarang" class="form-label">Nomor Barang/SN</label>
                            <input type="number" name="nomorbarang" class="form-control @error('nomorbarang') is-invalid @enderror" placeholder="nomorbarang" >@error('stok')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                            
                        </div>
                        <div class="mb-3">
                                <label for="namabarang" class="form-label">Nama Barang</label>
                                <input type="text" name="namabarang" class="form-control @error('namabarang') is-invalid @enderror" placeholder="masukan nama barang">@error('namabarang')
                    <div class=" alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Merek" class="form-label">Merek</label>
                            <input type="text" name="Merek" class="form-control @error('Merek') is-invalid @enderror" placeholder="Merek brand" >@error('Merek')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                           
                        </div>
                        <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" placeholder="masukan satuan">  @error('satuan')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                      
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="masukan harga" >
                            @error('harga')
                    <div class="alert alert-warning  invalid-feedback" >{{ $message }}</div>
                    @enderror
                            
                        </div>
                        <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="desk" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="masukan stok">
                                @error('stok')
                    <div class=" alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
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
@endsection
 