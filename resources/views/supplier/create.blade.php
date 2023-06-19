@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Supplier') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.supplier') }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
                      
                        <div class="mb-3">
                                <label for="" class="form-label">Nama Supplier</label>
                                <input type="text" name="namasupplier" class="form-control form-control @error('namasupplier') is-invalid @enderror" placeholder="masukan nama supplier">
                                @error('namasupplier')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                      
                            <label for="no_telepon" class="form-label">Nomor Telepon</label>
                            <input type="number" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" placeholder="masukan nomor telepon" >
                            @error('no_telepon')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                            
                        </div>
                        <div class="mb-3">
                                <label for="" class="form-label">Alamat</label>
                                <textarea class="form-control @error('Alamat') is-invalid @enderror" name="Alamat" id="desk" cols="30" rows="10"></textarea>
                                @error('Alamat')
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
 