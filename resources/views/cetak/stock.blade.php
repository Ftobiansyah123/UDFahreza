<!DOCTYPE html>
<html lang="en">
<head>
   
  <title>CetakStok</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <style>
   .pagenum:before {
        content: counter(page);
    }
    .line_nota{
    border-top: 1px dashed #000;
    margin-top: 3px;
    height: 6px;}
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
    <center>    <h4>Laporan Stock Data Barang</h4></center>
    <div class="row">
        
    
        <div class="col-md-12">
        <div class="card-body">
       
        <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped">
                
                    <thead>
                        <tr style="text-align: center;"  class="table-secondary">
                                <th>ID</th>
                                <th>SN</th>
                                <th>Nama barang</th>
                                <th>Merek</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $id = 1;
                    @endphp
                            @foreach ($stock as $st)
                            <tr>
                                <td class="text-center">{{ $id++ }}</td>
                                <td class="text-center">{{ $st->nomorbarang }}</td>
                                <td>{{ $st->namabarang }}</td>
                                <td>{{ $st->Merek }}</td>
                                <td>{{ $st->satuan }}</td>
                                <td class="text-left">Rp.  {{ $st->harga }} </td>
                                <td class="text-center">{{ $st->deskripsi }}</td>
                                <td class="text-right">{{ $st->stok }} </td>
                               
                            </tr>
                            @endforeach
                    </tbody>
                   <tfoot>
                    
                    <th colspan="6">
                        <td>Jumlah Stok Barang</td>
                    <td class="bg bg-warning">{{ $st->sum('stok') }}</td>

                    </th>
                   </tfoot>
                  
                        
                </table>
                </div>
            </div>       
        </div>
       <div>

       </div>
     
      
</body>

</html>