<!DOCTYPE html>
<html lang="en">
<head>
   
  <title>CetakPerubahanHarga</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
</head>
<body class="A4">
    <div class="page-header"></div>
    <p>Dicetak pada:  @php
       echo  $today;
       @endphp</p>
    <center>
    <h1>Toko UD FAHREZA</h1>
    <br>
    </center>
   
    <center>    <h4>Laporan Data Perubahan Harga</h4></center>
    <div class="row">
        
    
        <div class="col-md-12">
        <div class="card-body">
        <div class="table-responsive">
                 
        <table class="table table-sm table-bordered">
                            <tr style="text-align: center;"  class="table-secondary">
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Harga Lama</th>
                                <th>Harga Baru</th>
                               
                               
                            </tr>
                            @php
                            $id = 1;
                            @endphp
                            @foreach ($perubahan_harga as $ph)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $ph->stock->namabarang }}</td>
                                <td>{{ $ph->tgl }}</td>
                                <td>Rp. {{ $ph->harga_lama }}</td>
                                <td>Rp. {{ $ph->harga_baru }}</td>
                                
                              
                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>       
        </div>
</body>
</html>