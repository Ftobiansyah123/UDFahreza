
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Cetak Perubahan Harga') }}
                    <div class="float-end">
                        <form method="GET" action="{{ route('perubahan_harga.preview') }}">
                            <label for="start_date">Mulai Tanggal:</label>
                            <input type="date" id="start_date" name="start_date">
                            <label for="end_date">Akhir Tanggal:</label>
                            <input type="date" id="end_date" name="end_date">
                            <button class="btn btn-success" type="submit">Cek Data</button>
                             <a href="{{ route('perubahan_harga.cetakPDF') }}?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}" type="submit" class="btn btn-primary">Cetak PDF</a>
                        </form>
                        
                        </div>
                </div>

                <div class="card-body">

                    <div class="container">
                        <br>
                        <!-- Tambahkan form untuk memilih periode -->
                          
                           <br>
                       <div>
                          
                        <table class="table table-bordered">
                            <thead class="table-primary">
                              <tr>
                                    <th>Nama Barang</th>
                                     <th>Tanggal</th>
                                    <th>Harga Lama</th>
                                    <th>Harga Baru</th>
                                 </tr>
                            </thead>
                            @foreach ($perubahan_harga as $ph)
                            @php
                                // Periksa apakah tanggal berada dalam periode yang dipilih
                                $tanggal = \Carbon\Carbon::parse($ph->tanggal);
                                $start_date = \Carbon\Carbon::parse(request('start_date'));
                                $end_date = \Carbon\Carbon::parse(request('end_date'));

                                if (($start_date && $tanggal->lessThan($start_date)) || ($end_date && $tanggal->greaterThan($end_date))) {
                                    continue; // Lewati data yang tidak masuk periode
                                }
                            @endphp
                            <tbody>
                             
                                            <tr>
                                                
                                                <td>{{ $ph->stock->namabarang }}</td>
                                                <td>{{ $ph->tanggal }}</td>
                                                <td>Rp. {{ $ph->harga_lama }}</td>
                                                <td>Rp. {{ $ph->harga_baru }}</td>
                                                
                                              
                                            </tr>
                                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                          </table>
                   </div>
                   </div>
                       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
                       <script>
                           // Fungsi untuk mengonversi nilai angka ke format uang
                           function formatCurrency(element) {
                           const textPriceDetail = element.textContent;
                           const number = parseInt(textPriceDetail.replace(/[^0-9]/g, ""));
                           const formattedNumber = "Rp. " + number.toLocaleString("id-ID", { minimumFractionDigits: 0, maximumFractionDigits: 0 });
                           element.textContent = formattedNumber;
                           }
   
                           // Ambil semua elemen dengan class "price-detail"
                           const formatPriceDetails = document.querySelectorAll(".price-detail");
   
                           // Panggil fungsi formatCurrency untuk setiap elemen
                           formatPriceDetails.forEach((element) => {
                           formatCurrency(element);
                           });
                       </script>
                       <div class="float-end">
                       <a href={{ route('perubahan_harga') }} class="btn btn-sm btn-warning"><i class="fa-solid fa-backspace"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        


@endsection
 
