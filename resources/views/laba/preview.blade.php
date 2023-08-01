
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Laporan Laba') }}
                    <div class="float-end">
                    
                        <form action="{{ route('laba.search') }}" method="GET">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date" required>
                        
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date" required>
                        
                            <button class="btn btn-primary" type="submit">Search</button>
                            <a href="{{ route('laba.cetak') }}?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}" type="submit" class="btn btn-info">Cetak PDF</a>
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
                                       <th>Total Pendapatan</th>
                                       <th>Total Pengeluaran</th> 
                                       <th>Total Pembelian</th>
                                       <th>Total Gaji Pegawai</th>
                                   </tr>
                               </thead>
                              <!-- resources/views/penjualan.blade.php -->

                                   <tbody>
                                   <tr>
                                    @if(isset($totalHargaAkhir))
                                    <td class="price-detail">{{ $totalHargaAkhir }}</td>
                                @endif
                                @if(isset($totalbiayapengeluaran))
                                <td class="price-detail">{{ $totalbiayapengeluaran }}</td>
                            @endif
                            @if(isset($totalmodal))
                            <td class="price-detail">{{ $totalmodal }}</td>
                        @endif
                        @if(isset($totalgaji))
                        <td class="price-detail">{{ $totalgaji }}</td>
                    @endif
                                   </tr>
                               </tbody>
                               <tfoot class="table-group-divider">
                                <tr>
                                <td colspan="3" class="text-bold text-center "><b>Laba Bersih </b></td>
                                 <td scope="col" class=" text-bold text-end">
                                  @if(isset($total))
                                  <b>Rp. {{ format_uang($total) }}</b>
                                  @endif
                                </td>
                                </tr>           
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
                        <a href={{ route('perubahan_hargaJual') }} class="btn btn-sm btn-warning"><i class="fa-solid fa-backspace"></i> Kembali
                         </a>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
        


@endsection
 
