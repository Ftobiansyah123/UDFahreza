
<!DOCTYPE html>
<html lang="en">
<head>
   
  <title>Faktur Pembelian</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
  <style>
   .pagenum:before {
        content: counter(page);
    }

    .line_nota{
    border-top: 1px dashed #000;
    margin-top: 3px;
    height: 6px;
}
</style>
<div class=" text-md-center">
    Halaman <span class="pagenum"></span>
  </div>
</head>
<body class="container">
    <div class="page-header">
        <br>
    <p>Dicetak pada :  {{$today}}  </p> 
    
    <center>
    <h1>Toko UD FAHREZA</h1>
    <br>
    </center>
   
    <center>   <h1>FAKTUR PEMBELIAN</h1></center>
    <br>
    <div class="container text-start">
    <h3>
        Nomor Faktur :   {{$noPembelian}}
    </h3>
    <h5>Tanggal Pembelian : {{$tanggalbeli}}</h5>
</div>
</div>
    
    <div class="row">
        <div class="col-md-12 ">
        <div class="card-body">
            <
        <div class="container">
        <div class="line_nota"></div>
        <div class="line_nota"></div>
       
        <br>
       <table class="table tabel-bordered text-center">
                                <thead class=" table-primary">
                                    <tr>
										<th>Nama Supplier</th>
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
										 <td>{{ $pembelianItem->supplier->namasupplier }}</td> 
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
                                    <td colspan="6" class="text-bold text-center "><b>Jumlah </b></td>
                                    
                                      
                                    <td scope="col" class="price-detail text-bold text-end"><b>{{ $totalHarga }}</b></td>
                                   
                                    </tr>           
                                </tfoot>
                            </table>

        </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html