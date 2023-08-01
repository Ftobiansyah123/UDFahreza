@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambah pengiriman') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('simpan.pengiriman') }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                    
                            <div class="mb-3">
                                <label for="Referensi" class="form-label">No Resi</label>
                                <input type="text" name="noResi" class="form-control @error('noResi') is-invalid @enderror" placeholder="" value="{{ isset($noResi) ? $noResi : $Referensi }}">
                                @error('Referensi')
                        <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                        @enderror
                               
                            </div>
                        
                            <div class="col">
                                <label for="" class="form-label">Data Pengiriman</label>
                                <select name="datapengiriman" id="datapengiriman" class="form-control @error('datapengiriman') is-invalid @enderror" >
                                    <option value="" disabled selected>--Data--</option>
                                    <option value="" disabled selected>--Penjualan--</option>
                                    @foreach ( $penjualan as $pj)
                                    <option value="{{ $pj->noTransaksi }}">{{ $pj->noTransaksi }}</option>
                                    @endforeach
                                    <br>
                                    <option value="" disabled selected>--Pembelian--</option>
                                    @foreach ( $pembelian as $pb)
                                    <option value="{{ $pb->noPembelian }}">{{ $pb->noPembelian }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('datapengiriman')
                        <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                        @enderror
                            </div>


                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input style="width: 200px" type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="" >
                            @error('tanggal')
                    <div class="alert alert-warning invalid-feedback" >{{ $message }}</div>
                    @enderror
                           
                        </div>
                        
                        <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <br>
                                <textarea style="height: 200px"  name="catatan" id="catatan"  ></textarea>
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
 