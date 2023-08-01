@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Pengeluaran') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                            <div class="mb-3">
                                <label for="Referensi" class="form-label">No Pengeluaran</label>
                                <input type="text" name="noPengeluaran" class="form-control" placeholder="" value="{{ is_null($pengeluaran) ? '' : $pengeluaran->noPengeluaran }}">
                               
                            </div>
                        
                            <div class="mb-3">
                                <label for="namapengeluaran" class="form-label">Nama pengeluaran</label>
                                <input type="text" name="namapengeluaran" class="form-control" placeholder="" value="{{ is_null($pengeluaran) ? '' : $pengeluaran->namapengeluaran}}">
                               
                            </div>
                       
                       
                        

                        <div class="mb-3">
                            <label for="tanggalPengeluaran" class="form-label">Tanggal Pengeluaran</label>
                            <input style="width: 150px" type="date" name="tanggalPengeluaran" class="form-control" placeholder="" value="{{ is_null($pengeluaran) ? '' : $pengeluaran->tanggalPengeluaran }}">
                           
                        </div>
                        <div class="mb-3">
                            <label for="biaya" class="form-label">Biaya</label>
                            <input type="text" name="biaya" class="form-control" placeholder="" value="{{ is_null($pengeluaran) ? '' : $pengeluaran->biaya }}">
                           
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
 