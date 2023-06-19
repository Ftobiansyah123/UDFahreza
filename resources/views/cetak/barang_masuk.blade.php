<!DOCTYPE html>
<html lang="en">
<head>
   
  <title>CetakBarangMasuk</title>
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
   
    <center>    <h4>Laporan Data Barang Masuk</h4></center>
    <div class="row">
        
    
        <div class="col-md-12">
        <div class="card-body">
         
        <div class="table-responsive">
                 
                <table class="table table-sm table-bordered table-striped"  >
                    <thead>
                    <tr>
                                
                                <th>Nama Supplier</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Pegawai Penerima</th>
                                <th>Keterangan</th>
                               <th>Stok</th>
                               
                            </tr>
                    </thead>
                    <tbody>
               
                    @foreach ($barangmasuk as $bm)
                            <tr>
                              
                                <td>{{ $bm->supplier->namasupplier }}</td>
                                <td>{{ $bm->stock->namabarang }}</td>
                                <td>{{ $bm->stock->satuan }}</td>
                                <td>{{ $bm->tanggalmasuk }}</td>
                                <td>{{ $bm->user->name }}</td>
                                <td>{{ $bm->keterangan }}</td>
                                <td>{{ $bm->stok }}</td>
                            
                            </tr>
                        @endforeach
                          
                            <tfoot>

                        <th >
                                <td colspan="5" class="text-bold text-center "><b>Jumlah Barang Masuk</b></td>
                                <td class=" text-bold text-end"><b>{{ $bm->sum('stok') }}</b></td>
                              
                                </th>
                            </tfoot>
                    </tbody>
                </table>
                </div>
            </div>       
        </div>
</body>
</html>