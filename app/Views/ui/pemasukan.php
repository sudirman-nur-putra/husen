<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="favicon.png">
  <meta name="description" content="Aplikasi untuk inventaris Husen Variasi" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="styles.css">

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <title>Pemasukan Husen Variasi</title>
</head>

<body>
  <div class="container py-4 px-2">
    <div class="row">
      <div class="col-md-2">
        <div class="card list-group list-group-flush rounded-6">
          <h4 class="list-group-item p-4 ">
            HUSEN VARIASI
          </h4>
          <a href="dashboard" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="pemasukan" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Pemasukan</span>
          </a>
          <a href="pengeluaran" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-lock fa-fw me-3"></i><span>Pengeluaran</span></a>
          <a href="seller_dropship" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-line fa-fw me-3"></i><span>Reseller & Dropship</span></a>
          <a href="data_barang" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Data Barang</span>
          </a>
        </div>
      </div>
      <div id="app" class="col-md-10 ps-3">
        <div class="container mb-4 px-0">
          <div class="row">
            <div class="col-md-6">
              <!-- PEMASUKAN BOX -->
              <div class="card rounded-6 pemasukan-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                    </div>
                    <div class="text-start">
                      <p class="mb-0">Pemasukan dari Reseller</p>
                      <h3>Rp123.123.123</h3>
                    </div>
                    <div class="dropdown align-self-top">
                      <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        Bulan ini
                      </div>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Tahun ini</a></li>
                        <li><a class="dropdown-item" href="#">Hari ini</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- BARANG TERJUAL BOX -->
              <div class="card rounded-6 pemasukan-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                    </div>
                    <div class="text-start">
                      <p class="mb-0">Pemasukan dari Dropshipper</p>
                      <h3>Rp123.123.123</h3>
                    </div>
                    <div class="dropdown align-self-top">
                      <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        Bulan ini
                      </div>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Tahun ini</a></li>
                        <li><a class="dropdown-item" href="#">Hari ini</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-md-6">
              <!-- PEMASUKAN BOX -->
              <div class="card rounded-6 barang-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-shopping-bag fa-3x"></i>
                    </div>
                    <div class="text-start">
                      <p class="mb-0">Pemasukan dari Shopee</p>
                      <h3>Rp123.123.123</h3>
                    </div>
                    <div class="dropdown align-self-top">
                      <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        Minggu ini
                      </div>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Tahun ini</a></li>
                        <li><a class="dropdown-item" href="#">Hari ini</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- BARANG TERJUAL BOX -->
              <div class="card rounded-6 barang-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-shopping-bag fa-3x"></i>
                    </div>
                    <div class="text-start">
                      <p class="mb-0">Pemasukan dari Lazada</p>
                      <h3>Rp123.123.123</h3>
                    </div>
                    <div class="dropdown align-self-top">
                      <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        Bulan ini
                      </div>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Tahun ini</a></li>
                        <li><a class="dropdown-item" href="#">Hari ini</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-md-6">
              <!-- PEMASUKAN BOX -->
              <div class="card rounded-6 keuntungan-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                    </div>
                    <div class="text-start">
                      <p class="mb-0">Total Pemasukan</p>
                      <h3>Rp123.123.123</h3>
                    </div>
                    <div class="dropdown align-self-top">
                      <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                        Minggu ini
                      </div>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Tahun ini</a></li>
                        <li><a class="dropdown-item" href="#">Hari ini</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card my-4 rounded-6">
            <div class="card-header d-flex justify-content-between py-3">
              <h5 class="mb-0 align-self-center">
                <strong>Pemasukan dari Seller</strong>
              </h5>
              <a class="btn btn-primary" href="/pemasukan/formtransaksireseller" role="button">
                <i class="fas fa-plus"></i>
                Tambah Data
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">Nama Reseller</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Tanggal Pembelian</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Alex Purwoto</td>
                      <td>Stang</td>
                      <td>10</td>
                      <td>Rp123.123.123</td>
                      <td>23 Maret 2022</td>
                    </tr>
                    <tr>
                      <td>Alex Purwoto</td>
                      <td>Stang</td>
                      <td>10</td>
                      <td>Rp123.123.123</td>
                      <td>23 Maret 2022</td>
                    </tr>
                    <tr>
                      <td>Alex Purwoto</td>
                      <td>Stang</td>
                      <td>10</td>
                      <td>Rp123.123.123</td>
                      <td>23 Maret 2022</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card my-4">
            <div class="card-header d-flex justify-content-between py-3">
              <h5 class="mb-0 align-self-center">
                <strong>Pemasukan dari Dropshipper</strong>
              </h5>
              <a class="btn btn-primary" href="/pemasukan/formtranskasidropshipper" role="button">
                <i class="fas fa-plus"></i>
                Tambah Data
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">Nama Dropshipper</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Tanggal Pembelian</th>
                      <th scope="col">Marketplace</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Alex Purwoto</td>
                      <td>Stang</td>
                      <td>10</td>
                      <td>Rp123.123.123</td>
                      <td>23 Maret 2022</td>
                      <td>Shopee</td>
                      <td>Selesai</td>
                    </tr>
                    <tr>
                      <td>Alex Purwoto</td>
                      <td>Stang</td>
                      <td>10</td>
                      <td>Rp123.123.123</td>
                      <td>23 Maret 2022</td>
                      <td>Shopee</td>
                      <td>Selesai</td>
                    </tr>
                    <tr>
                      <td>Alex Purwoto</td>
                      <td>Stang</td>
                      <td>10</td>
                      <td>Rp123.123.123</td>
                      <td>23 Maret 2022</td>
                      <td>Shopee</td>
                      <td>Selesai</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>

</html>