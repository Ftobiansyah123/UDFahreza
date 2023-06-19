@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Pegawai') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.pegawai') }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
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
                                <label for="bagian" class="form-label">Bagian</label>
                                <input type="text" name="bagian" class="form-control @error('bagian') is-invalid @enderror" placeholder="masukan bagian">
                                @error('bagian')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomortelepon" class="form-label">Nomor Telepon</label>
                            <input type="text" name="nomortelepon" class="form-control @error('nomortelepon') is-invalid @enderror" placeholder="masukan nomor telepon" >
                            @error('nomortelepon')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                           
                        </div>
                        
                        <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="desk" cols="2" rows="3" style="resize: none" ></textarea>@error('alamat')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
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
 