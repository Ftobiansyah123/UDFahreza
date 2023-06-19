@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Supplier') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                        <div class="mb-3">
                                <label for="" class="form-label">Nama Supplier</label>
                                <input type="text" name="namasupplier" class="form-control" placeholder="masukan nama supplier" value="{{ is_null($supplier) ? '' : $supplier->namasupplier }}">
                        </div>
                      
                            <label for="no_telepon" class="form-label">Nomor Telepon</label>
                            <input type="number" name="no_telepon" class="form-control" placeholder="masukan nomor telepon" value="{{ is_null($supplier) ? '' : $supplier->no_telepon }}" >
                            
                        </div>
                        <div class="mb-3">
                                <label for="" class="form-label">Alamat</label>
                                <textarea class="form-control" name="Alamat" id="desk" cols="30" rows="10"> {{ is_null($supplier) ? '' : $supplier->Alamat }}</textarea>
                        </div>
                       
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col float-end">
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                <button type="button" class="btm btn-md btn-dangers" onclick="window.history.back();">Cancel</button>
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
 