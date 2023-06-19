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
                    <form action="{{ route('stock.update', $stock->id) }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
                        <div class="mb-3">
                            <label for="nomorbarang" class="form-label">Nomor Barang/SN</label>
                            <input type="number" name="nomorbarang" class="form-control" placeholder="nomorbarang" value="{{ is_null($stock) ? '' : $stock->nomorbarang }}" >
                            
                        </div>
                        <div class="mb-3">
                                <label for="namabarang" class="form-label">Nama Barang</label>
                                <input type="text" name="namabarang" class="form-control" placeholder="masukan nama barang" value="{{ is_null($stock) ? '' : $stock->namabarang }}">
                        </div>
                        <div class="mb-3">
                            <label for="Merek" class="form-label">Merek</label>
                            <input type="text" name="Merek" class="form-control" placeholder="Merek brand" value="{{ is_null($stock) ? '' : $stock->Merek }}">
                           
                        </div>
                        <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" name="satuan" class="form-control" placeholder="masukan satuan" value="{{ is_null($stock) ? '' : $stock->satuan }}">
                        </div><div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="masukan harga" value="{{ is_null($stock) ? '' : $stock->harga }}">
                            
                        </div>
                        <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="desk" value="{{ is_null($stock) ? '' : $stock->deskripsi }}" cols="10" rows="10" >{{ is_null($stock) ? '' : $stock->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" placeholder="masukan stok" value="{{ is_null($stock) ? '' : $stock->stok }}">
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
 