<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .pagenum:before {
      content: counter(page);
    }

    .line_nota {
      border-top: 1px dashed #000;
      margin-top: 3px;
      height: 6px;
    }
  </style>
</head>
<body class="container">
  <div class="page-header">
    <br>
    <center>
      <h1>Toko UD FAHREZA</h1>
      <br>
    </center>
    <center>
      <h1>Laporan Perubahan Harga Jual Barang</h1>
    </center>
    <br>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card-body">
        <div class="container">
          <div class="line_nota"></div>
          <div class="line_nota"></div>
          <br>
          <table class="table table-bordered">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Harga Modal</th>
                <th>Harga Jual</th>
              </tr>
            </thead>
            <tbody>
              @php
                $id = 1;
              @endphp
              @foreach ($perubahan_hargaJual as $ph)
              <tr>
                <td>{{ $id++ }}</td>
                <td>{{ $ph->stock->namabarang }}</td>
                <td>{{ $ph->tanggal }}</td>
                <td class="price-detail">Rp. {{ $ph->harga_modal }}</td>
                <td class="price-detail">Rp. {{ $ph->harga_jual }}</td>
              </tr>
              @endforeach
            </tbody>
           
          </table>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript">
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
  <script type="text/php">
    if (isset($pdf)) {
      $font = $fontMetrics->getFont("Arial", "bold");
      $pdf->page_text(530, 820, "Halaman {PAGE_NUM}", $font, 10, array(0, 0, 0));
    }
  </script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
