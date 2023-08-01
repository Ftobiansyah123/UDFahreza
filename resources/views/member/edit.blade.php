@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Member') }}
                    
                </div>

                <div class="card-body bg-secondary text-white">
                    <form action="{{ route('member.update', $member->id) }}" method="post">
                        @csrf
                        <div class="from-group">
                            
                            <div class="mb-3">
                                <label for="Referensi" class="form-label">No Referensi</label>
                                <input type="text" name="noReferensi" class="form-control" placeholder="" value="{{ is_null($member) ? '' : $member->noReferensi }}">
                               
                            </div>
                        
                            <div class="mb-3">
                                <label for="namamember" class="form-label">Nama Member</label>
                                <input type="text" name="namamember" class="form-control" placeholder="" value="{{ is_null($member) ? '' : $member->namamember}}">
                               
                            </div>
                       
                       
                        

                        <div class="mb-3">
                            <label for="nomortelpon" class="form-label">Nomor Telepon</label>
                            <input type="text" name="nomortelpon" class="form-control" placeholder="masukan nomor elepon" value="{{ is_null($member) ? '' : $member->nomortelpon }}">
                           
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="text" name="discount" class="form-control" placeholder="masukan nomor elepon" value="{{ is_null($member) ? '' : $member->discount }}">
                           
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
 