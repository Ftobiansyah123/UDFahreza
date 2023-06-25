@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Perubahan Harga') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.perubahan_harga') }}" method="post">
                        @csrf
                        <div class="from-group">
                            

                       

                        <div class="col">
                            <label for="namabarang" class="form-label">Nama Barang</label>
                            <select name="idbarang" id="idbarang" class="idbarang form-control @error('idbarang') is-invalid @enderror" >
                                <option value="">--Nama Barang--</option>
                                @foreach ( $stock as $st)
                                <option value="{{ $st->id }}" data-harga="{{ $st->harga }}">{{ $st->namabarang }}</option>
                                @endforeach
                                
                            </select>
                            @error('idbarang')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                        


                        <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="masukan Tangal">
                                @error('tanggal')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                        </div>
                        <div class="mb-3">
                      
                            <label for="harga_lama" class="form-label">Harga Lama </label>
                            <input type="number" id="harga_lama" name="harga_lama" class="form-control" readonly > 
                        
                           
                        </div>
                        
                        <div class="mb-3">
                            <label for="harga_baru" class="form-label">Harga Baru </label>
                            <input type="number" name="harga_baru" class="form-control @error('harga_baru') is-invalid @enderror" placeholder="masukan harga baru ">
                            @error('harga_baru')
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




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>    
$(document).ready(function() {
    $('.idbarang').select2();
    $('#idbarang').change(function() {
        // Ambil harga lama dari atribut data-harga pada pilihan yang dipilih
        var harga = $(this).find(':selected').data('harga');
        // Isi nilai harga lama pada input harga_lama
        $('#harga_lama').val(harga);
    });
        });  
        
</script> 


@endsection
 