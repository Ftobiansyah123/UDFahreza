
@extends('layoutsOffice.app')

@section('content')
        <div class="container">
                        <div class="page-header">
                            <br>
                        <p>Dibuat pada :  {{$tanggalbeli}}  </p>
                    
                        
                        <div>
                            {{-- <center>
                                <a href={{ route('point-of-sales') }} class="btn btn-sm btn-warning"><i class="fa-solid fa-backspace"></i>kembali
                                </a>
                                <a href={{ route('pos.cetak', ['noTransaksi' => $noPembayaran]) }} class="btn btn-sm btn-primary "><i class="fa-solid fa-print fa-beat"></i>cetak
                                </a>
                            </center>  --}}
                        </div>
                        <div class="line_nota"></div>
                        <br>
                        <br>

                        <center>
                        <h1>Toko UD FAHREZA</h1>
                        <br>
                        </center>
                    
                        <center>   <h1>FAKTUR PEMBELIAN</h1></center>
                        <br>
                        <div class="container text-start">
                        <h3>
                        
                            Nomor PEMBELIAN :   {{$noPembelian}}
                        
                        </h3>
                    </div>
                    </div>
                        
                        <div class="row">
                            <div class="col-md-12 ">
                            <div class="card-body">
                                
                            <div class="container">
                            <div class="line_nota"></div>
                            <div class="line_nota"></div>
                        
                            <br>
                            <table class="table tabel-bordered text-center">
                                <thead class=" table-primary">
                                    <tr>
                                        <th>Nomor Barang</th>
                                        <th>Nama Barang</th> 
                                        <th>Merek</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Satuan</th>
                                        <th class="text-end">Harga Akhir</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @php
                                        $totalHarga = 0;
                                    @endphp
                                    @foreach($pembelian as $pembelianItem)
                                
                                    <tr>
                                        <td>{{ $pembelianItem->stock->nomorbarang }}</td> 
                                        <td>{{ $pembelianItem->stock->namabarang }}</td>  
                                        <td>{{ $pembelianItem->stock->merek }}</td>    
                                        <td class="price-detail">{{ $pembelianItem->hargaModal }}</td>   
                                        <td>{{ $pembelianItem->stokMasuk }}</td>
                                        <td>{{ $pembelianItem->stock->satuan}}</td>
                                        <td scope="col" class="text-end price-detail">{{ $pembelianItem->hargaModal * $pembelianItem->stokMasuk }}</td>
                                    </tr>
                                    @php
                                    $totalHarga += $pembelianItem->hargaModal * $pembelianItem->stokMasuk;
                                @endphp
                                    @endforeach 
                                </tbody>
                                <tfoot class="table-group-divider">
                                    <tr>
                                    <td colspan="6" class="text-bold text-center "><b>Jumlah Barang Masuk</b></td>
                                    
                                      
                                    <td scope="col" class="price-detail text-bold text-end"><b>{{ $totalHarga }}</b></td>
                                   
                                    </tr>           
                                </tfoot>
                            </table>

                            </div>
                            </div>
                        </div>
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


@endsection
 
