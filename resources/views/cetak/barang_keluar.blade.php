<!DOCTYPE html>
<html lang="en">
<head>
   
  <title>CetakBarangKeluar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
   .pagenum:before {
        content: counter(page);
    }
</style>
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
   
    <center>    <h4>Laporan Data Barang Keluar</h4></center>
    <div class="row">
        
    
        <div class="col-md-12">
        <div class="card-body">
        <div class="table-responsive">
                 
                <table class="table table-sm table-striped table-bordered table-hover"" >
                    <thead>
                    <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Tanggal Keluar</th>
                                <th>Nama Penerima</th>
                             
                               
                            </tr>
                    </thead>
                    <tbody>
                    @php
                        $id = 1;
                    @endphp
                    @foreach ($barangkeluar as $bk)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $bk->stock->namabarang }}</td>
                                <td>{{ $bk->stok }}</td>
                                <td>{{ $bk->tanggalkeluar }}</td>
                                <td>{{ $bk->penerima }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>       
        </div>
</body>
</html>