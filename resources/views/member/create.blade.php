@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Member') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.member') }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
                            <div class="mb-3">
                                <label for="Referensi" class="form-label">No Referensi</label>
                                <input type="text" name="noReferensi" class="form-control @error('noReferensi') is-invalid @enderror" placeholder="" value="{{ isset($noReferensi) ? $noReferensi : $Referensi }}">
                                @error('Referensi')
                        <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                        @enderror
                               
                            </div>
                        
                            <div class="mb-3">
                                <label for="namamember" class="form-label">Nama Member</label>
                                <input type="text" name="namamember" class="form-control @error('namamember') is-invalid @enderror" placeholder="" >
                                @error('namamember')
                        <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                        @enderror
                               
                            </div>


                        <div class="mb-3">
                            <label for="nomortelpon" class="form-label">Nomor Telepon</label>
                            <input type="text" name="nomortelpon" class="form-control @error('nomortelpon') is-invalid @enderror" placeholder="" >
                            @error('nomortelpon')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                           
                        </div>
                        
                        <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" id="discount" style="width: 100px" ></input>@error('discount')
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
 