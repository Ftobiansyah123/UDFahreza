<!DOCTYPE html>
<html lang="en">
<head>
   
  <title>CetakPegawai</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
   
    <center>    <h4>Laporan Data Pegawai</h4></center>
    <div class="row">
        
    
        <div class="col-md-12">
        <div class="card-body">
        <div class="table-responsive">
                 
                <table class="table table-sm table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                        <th>ID</th>
                                            <th>Nama Pegawai</th>
                                            <th>Bagian</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $id = 1;
                    @endphp
                        @foreach($pegawai as $pg)
                            <tr>
                            <td>{{ $id++ }}</td>
                            <td>{{ $pg->user->name }}</td>
                            <td>{{ $pg->bagian }}</td>
                            <td>{{ $pg->nomortelepon }}</td>
                            <td>{{ $pg->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>       
        </div>
</body>
</html>