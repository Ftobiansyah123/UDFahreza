@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Stock') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
                        <div class="col">
                            <label for="iduser" class="form-label">Nama Pegawai</label>
                            <select name="iduser" id="iduser" class="form-control" >
                                <option value="" disabled selected>--Pilih User--</option>
                                @foreach ( $user as $u)
                                <option value="{{ $u->id }}" {{ $pegawai->iduser == $u->id ? 'selected' : ''   }} >{{ $u->name }}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>
                        <div class="mb-3">
                                <label for="bagian" class="form-label">Bagian</label>
                                <input type="text" name="bagian" class="form-control" placeholder="masukan bagian" value="{{ is_null($pegawai) ? '' : $pegawai->bagian }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomortelepon" class="form-label">Nomor Telepon</label>
                            <input type="text" name="nomortelepon" class="form-control" placeholder="masukan nomor elepon" value="{{ is_null($pegawai) ? '' : $pegawai->nomortelepon }}">
                           
                        </div>
                        
                        <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="desk" cols="2" rows="3" style="resize: none" >{{ is_null($pegawai) ? '' : $pegawai->alamat }}</textarea>
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
 