<!DOCTYPE html>
<html lang="en">
<head>
   
  <title>Invoice</title>
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
      
    <h1>INVOICE PEMBELIAN</h1>
    <br>
    </center> 
    <center> 
    <p>pembelian ke:</p>    
    @foreach ($barangmasuk as $bm)
    <h4>{{ $bm->supplier->namasupplier }}</h4>       </center>
    <br>
    <br>
    <div class="line_nota"></div>
    <p>Alamat  : {{ $bm->supplier->Alamat }}</p>
    <p>Nomor Telepon Supplier   : {{ $bm->supplier->no_telepon }}</p>
    <p>Tanggal Pembelian        : {{$bm->tanggalmasuk}}</p>
    
    @endforeach
 
                
                                
    <div class="line_nota"></div>                     

    <div class="row">
        <div class="col-md-12">
        <div class="card-body">
                 <div class="table-responsive">
                
                <table class="table table-sm table-bordered table-striped"  >
                    <thead style="width:50%;">
                    <tr>
                                <th>No</th>                    
                                <th>Nama Barang</th>
                               
                               <th>Stok</th>
                               <th>Satuan</th>
                               <th>Harga</th>
                               <th>Jumlah</th>
                               
                            </tr>
                    </thead>
                    <tbody>
                    @php
                        $id = 1;
                    @endphp
                    @foreach ($barangmasuk as $bm)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $bm->stock->namabarang }}</td> 
                               
                                <td>{{ $bm->stok }}</td>
                                <td>{{ $bm->stock->satuan }}</td>
                                <td>Rp. {{ $bm->stock->harga }}</td>
                                <td>Rp {{$bm->stok * $bm->stock->harga }}  </td>
                            </tr>
                        @endforeach
                                
                          
                    </tbody>
                </table>
                
                </div>
            </div>       
        </div>
        <div class="line_nota"></div>
        <div class="text-right">
        @foreach ($barangmasuk as $bm)
        <p>Pegawai Penerima Barang</p>
        <br>
        <br>
    <p>{{ $bm->user->name }}</p>
    @endforeach
        </div>
</body>
</html>