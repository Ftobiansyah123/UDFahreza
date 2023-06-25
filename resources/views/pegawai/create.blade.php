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
                                <option value="" disabled selected>--Pilih Nama--</option>
                                @foreach ( $user as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                                
                            </select>
                            @error('iduser')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>

                        <div class="col">
                            <label for="iduser" class="form-label">Bagian</label>
                            <select name="iduser" id="iduser" class="form-control @error('iduser') is-invalid @enderror" >
                                <option value="" disabled selected>--Pilih Bagian--</option>
                                @foreach ( $user as $u)
                                <option value="{{ $u->id }}">{{ $u->bagian }}</option>
                                @endforeach
                                
                            </select>
                            @error('iduser')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="nomortelpon" class="form-label">Nomor Telepon</label>
                            <input type="text" name="nomortelpon" class="form-control @error('nomortelpon') is-invalid @enderror" placeholder="masukan nomor telepon" >
                            @error('nomortelpon')
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
 