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

  <title>Husen Variasi</title>
</head>

<body>
  <div class="container py-4 px-2">
    <div class="row">
      <div class="col-md-2">
        <div class="card list-group list-group-flush rounded">
          <h4 class="list-group-item p-4 ">
            HUSEN VARIASI
          </h4>
          <a href="dashboard" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="pemasukan" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Pemasukan</span>
          </a>
          <a href="pengeluaran" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-lock fa-fw me-3"></i><span>Pengeluaran</span></a>
          <a href="seller_dropship" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-line fa-fw me-3"></i><span>Reseller & Dropship</span></a>
          <a href="data_barang" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Data Barang</span>
          </a>
        </div>
      </div>
      <div id="app" class="col-md-10 ps-3">
        <div class="card mb-4">
          <form class="d-none d-md-flex w-auto my-2">
            <span class="border-0 mx-3 my-auto">
              <i class="fas fa-search"></i>
            </span>
            <input autocomplete="off" type="search" class="form-control me-3 my-auto border-0" placeholder='Search' />
          </form>
        </div>
        <div class="container mb-4 px-0">
          <div class="row">
            <div class="col-md-4">
              <div class="card rounded pemasukan-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                    </div>
                    <div class="text-end">
                      <h3>Rp123.123.123</h3>
                      <p class="mb-0">Total Pemasukan</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card rounded barang-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-shopping-bag fa-3x"></i>
                    </div>
                    <div class="text-end">
                      <h3>123</h3>
                      <p class="mb-0">Jumlah Barang Terjual</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card rounded pengeluaran-color">
                <div class="card-body">
                  <div class="d-flex justify-content-between px-md-1">
                    <div class="align-self-center">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                    </div>
                    <div class="text-end">
                      <h3>Rp123.123.123</h3>
                      <p class="mb-0">Total Pengeluaran</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- CHART -->
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between py-3">
            <h5 class="mb-0 align-self-center">
              <strong>Grafik Penjualan</strong>
            </h5>
            <div class="dropdown align-self-center">
              <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                Bulan ini
              </div>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Hari ini</a></li>
                <li><a class="dropdown-item" href="#">Tahun ini</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <canvas class="my-4 w-100" id="myChart" height="200"></canvas>
          </div>
        </div>
        <!-- TABLE -->
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between py-3">
            <h5 class="mb-0 align-self-center">
              <strong>Informasi Gaji Dropshipper</strong>
            </h5>
            <div class="dropdown align-self-center">
              <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                Bulan: Februari
              </div>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Januari</a></li>
                <li><a class="dropdown-item" href="#">Maret</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Gaji</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Alex Purwoto</td>
                    <td>Rp123.123.123</td>
                  </tr>
                  <tr>
                    <td>Alex Purwoto</td>
                    <td>Rp123.123.123</td>
                  </tr>
                  <tr>
                    <td>Alex Purwoto</td>
                    <td>Rp123.123.123</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>

</html>