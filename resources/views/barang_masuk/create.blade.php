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
                            <label for="date" class="col-1 col-form-label">Date</label>
                            <input type="date" name="tanggalmasuk" class="form-control" placeholder="masukan tanggal" >

                             @error('tanggalmasuk')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>

                        <div class="col">
                            <label for="iduser" class="form-label">Nama Pegawai</label>
                            <select name="iduser" id="iduser" class="form-control @error('iduser') is-invalid @enderror" >
                                <option value="" disabled selected>--Pilih User--</option>
                                @foreach ( $user as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                                
                            </select>
                            @error('iduser')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
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
@endsection
 