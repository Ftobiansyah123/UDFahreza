<div class="row">
    
    <div class="col-md-3" style="height: 100%;">
        <!-- Sidebar content goes here -->
       <nav>
        <div class="flex-shrink-0 p-3" id="sidebar" style="position: sticky; width: 280px; height: 100%; background: #ddd; ">
            <ul class="list-unstyled ps-0">


                <h5>Gudang</h5>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dbarang-collapse" aria-expanded="true">
                        Data Barang
                    </button>
                    <div class="collapse show" id="dbarang-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{ route('stock') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Stock</a></li>
                            <li><a href="{{ route('pembelian.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Pembelian Barang</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pstock-collapse" aria-expanded="false">
                        Data Perubahan Harga
                    </button>
                    <div class="collapse" id="pstock-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('perubahan_harga')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Perubahan Harga Modal</a></li>
                            <li><a href="{{route('perubahan_hargaJual')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Perubahan harga Jual</a></li>
                            <li><a href="{{route('perubahan_harga.preview')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Laporan Harga Modal</a></li>
                            <li><a href="{{route('perubahan_hargaJual.preview')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Laporan Harga Jual</a></li>
                           
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#so-collapse" aria-expanded="false">
                        Barang Masuk
                    </button>
                    <div class="collapse" id="so-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('barang_masuk')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Lihat Barang Masuk</a></li>
                            <li><a href="{{route('barang_masuk.preview')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Cetak Barang Masuk</a></li>
                          
                        </ul>
                    </div>
                </li>
                <br>
                <div style="border-top: 1px dashed #000; margin-top: 3px; height: 6px;"></div>
                <br>
                <h5>PENJUALAN</h5>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pos-collapse" aria-expanded="false">
                        PointOfSales
                    </button>
                    <div class="collapse" id="pos-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('point-of-sales')}}" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                            <li><a href="{{route('barang_keluar')}}" class="link-dark d-inline-flex text-decoration-none rounded">Barang Keluar</a></li>
                        </ul>
                    </div>
                </li>
               
               
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#rpenjualan-collapse" aria-expanded="false">
                        Barang Keluar
                    </button>
                    <div class="collapse" id="rpenjualan-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('barang_keluar')}}" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                            
                        </ul>
                    </div>
                </li>
            
                <br>
                <div style="border-top: 1px dashed #000; margin-top: 3px; height: 6px;"></div>
                <br>
                <h5>PENDISTRIBUSIAN</h5>

               
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dsupplier-collapse" aria-expanded="false">
                        Data Supllier
                    </button>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('supplier.create')}}" class="link-dark d-inline-flex text-decoration-none rounded">Lihat</a></li>
                           
                            
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dsupplier-collapse" aria-expanded="false">
                        Data Pengiriman
                    </button>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('pengiriman')}}" class="link-dark d-inline-flex text-decoration-none rounded">Buat Surat Jalant</a></li>
                           
                            
                        </ul>
                    </div>
                </li>
               
                <br>
                <div style="border-top: 1px dashed #000; margin-top: 3px; height: 6px;"></div>

                
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dsupplier-collapse" aria-expanded="false">
                        Data Pegawai
                    </button>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('pegawai')}}" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                         
                            
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dsupplier-collapse" aria-expanded="false">
                        Data Member
                    </button>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('member')}}" class="link-dark d-inline-flex text-decoration-none rounded">Lhat</a></li>
                         
                            
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dsupplier-collapse" aria-expanded="false">
                        Data Pengeluaran
                    </button>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('pengeluaran')}}" class="link-dark d-inline-flex text-decoration-none rounded">Lihat Data</a></li>
                         
                            
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dsupplier-collapse" aria-expanded="false">
                        Cetak Data
                    </button>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('stock.cetak')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak stock </a></li>
                         
                            
                        </ul>
                    </div>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('pembelian.indexEdit')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Pembelian </a></li>
                         
                            
                        </ul>
                    </div>
                     <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('point-of-sales.indexEdit')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Penjualan</a></li>
                         
                            
                        </ul>
                    </div>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('barang_masuk.preview')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Barang Masuk</a></li>
                         
                            
                        </ul>
                    </div>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('barang_keluar.preview')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Barang Keluar</a></li>
                         
                            
                        </ul>
                    </div>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('perubahan_harga.preview')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Perubahan Harga Modal</a></li>
                         
                            
                        </ul>
                    </div>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('perubahan_hargaJual.preview')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Perubahan Harga Jual</a></li>
                         
                            
                        </ul>
                    </div>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('laba')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Laba/Rugi</a></li>
                         
                            
                        </ul>
                    </div>
                    <div class="collapse" id="dsupplier-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="{{route('cetak_supplier.pdf')}}" class="link-dark d-inline-flex text-decoration-none rounded">Cetak Supplier</a></li>
                         
                            
                        </ul>
                    </div>
                
                    
                </li>

            </ul>
        </div>
        </nav>
    </div>
</div>

