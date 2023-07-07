@extends('layoutsOffice.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Perubahan Harga') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.perubahan_hargaJual') }}" method="post">
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
                      
                            <label for="harga_modal" class="form-label">Harga modal </label>
                            <input type="number" id="harga_modal" name="harga_modal" class="form-control" readonly > 
                        
                           
                        </div>
                        <div class="mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual </label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <input type="number" id="persentase" name="persentase" class="  input-persentase form-control" min="0" max="100"><h4>%</h4>
                                    </span>
                                </div>
                                <input type="number" id="harga_jual" name="harga_jual" class=" form-control @error('harga_jual') is-invalid @enderror price-detail" placeholder="Masukkan harga Jual">
                                
                            </div>
                            @error('harga_jual')
                            <div class="alert alert-warning invalid-feedback">{{ $message }}</div>
                            @enderror
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
        $('#harga_modal').val(harga);
    });
        });  
        
</script> 
<script>
    const persentaseInput = document.getElementById('persentase');
    const hargaModalInput = document.getElementById('harga_modal');
    const hargaJualInput = document.getElementById('harga_jual');

    persentaseInput.addEventListener('change', function() {
        const persentase = parseFloat(persentaseInput.value);
        const hargaModal = parseFloat(hargaModalInput.value);
        const hargaJual = hargaModal + (hargaModal * (persentase / 100));

        if (!isNaN(hargaJual)) {
            hargaJualInput.value = hargaJual.toFixed(2);
        }
    });
</script>


@endsection
 