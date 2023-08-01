@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah Pengeluaran') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.pengeluaran') }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
                            <div class="mb-3">
                                <label for="Referensi" class="form-label">No Pengeluaran</label>
                                <input type="text" name="noPengeluaran" class="form-control @error('noPengeluaran') is-invalid @enderror" placeholder="" value="{{ isset($noPengeluaran) ? $noPengeluaran : $Referensi }}">
                                @error('Referensi')
                        <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                        @enderror
                               
                            </div>
                        
                            <div class="mb-3">
                                <label for="namapengeluaran" class="form-label">Nama pengeluaran</label>
                                <input type="text" name="namapengeluaran" class="form-control @error('namapengeluaran') is-invalid @enderror" placeholder="" >
                                @error('namapengeluaran')
                        <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                        @enderror
                               
                            </div>


                        <div class="mb-3">
                            <label for="tanggalPengeluaran" class="form-label">Tanggal</label>
                            <input style="width: 200px" type="date" name="tanggalPengeluaran" class="form-control @error('tanggalPengeluaran') is-invalid @enderror" placeholder="" >
                            @error('tanggalPengeluaran')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                           
                        </div>
                        
                        <div class="mb-3">
                                <label for="biaya" class="form-label">Biaya</label>
                                <input type="number" class="price-detail form-control @error('biaya') is-invalid @enderror" name="biaya" id="biaya" style="width: 200px" ></input>@error('biaya')
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
 