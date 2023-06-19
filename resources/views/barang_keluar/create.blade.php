@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Data Barang Keluar') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.barang_keluar') }}" method="post">
                        @csrf
                        
                        <div class="from-group">
                        <div class="col">
                            <label for="iduser" class="form-label">Nama Barang</label>
                            <select name="idbarang" id="idbarang" class="form-control @error('idbarang') is-invalid @enderror" >
                                <option value="" disabled selected>--Pilih Barang--</option>
                                @foreach ( $stock as $st)
                                <option value="{{ $st->id }}">{{ $st->namabarang }}</option>
                                @endforeach
                                
                            </select>
                            @error('idbarang')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                        <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>

                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror " placeholder="masukan stok">
                                @error('stok')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                            <label for="date" class="col-1 col-form-label">Date</label>
                            <input type="date" name="tanggalkeluar" class="form-control @error('tanggalkeluar') is-invalid @enderror" placeholder="masukan tanggal" >

                             @error('tanggalkeluar')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                            <label for="text" class="col-1 col-form-label">Penerima</label>
                            <input type="text" name="penerima" class="form-control @error('penerima') is-invalid @enderror" placeholder="masukan tanggal" >

                             @error('penerima')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                    </div>
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
 