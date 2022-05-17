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

  <title>Dashboard Husen Variasi</title>
</head>

<body>
  <div class="container py-4 px-2">
    <div class="row">
      <div class="col-md-2">
        <!-- SIDE NAVBAR -->
        <div class="card rounded-6 list-group list-group-flush">
          <h4 class="list-group-item p-4 ">
            HUSEN VARIASI
          </h4>
          <a href="dashboard" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="pemasukan" class="list-group-item list-group-item-action py-2 ripple">
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
        <h3>Dashboard</h3>
        <div class="container mb-4 px-0">
          <div class="row">
            <!-- TOTAL PEMASUKAN BOX -->
            <div class="col-md-4">
              <div class="card rounded-6 pemasukan-color">
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                      <p class="mb-0">Total Pemasukan</p>
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
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                      <div class="text-end ps-3">
                        <?php
                        foreach ($getPenDropBulan as $getPenDropBulan) {
                          $totpem = $getPenDropBulan['harga'];
                        }
                        foreach ($getPenResBulan as $getPenResBulan) {
                          $totpem = $getPenResBulan['harga'] + $totpem;
                        }
                        ?>
                        <h3>Rp <?= $totpem; ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- TOTAL PEMASUKAN BOX -->
            <!-- TOTAL BARANG TERJUAL BOX -->
            <div class="col-md-4">
              <div class="card rounded-6 barang-color">
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                      <p class="mb-0">Total Barang Terjual</p>
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
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-shopping-bag fa-3x"></i>
                      <div class="text-end ps-3">
                        <?php
                        foreach ($getBarDropBulan as $getBarDropBulan) {
                          $totbar = $getBarDropBulan['barang'];
                        }
                        foreach ($getBarResBulan as $getBarResBulan) {
                          $totbar = $getBarResBulan['barang'] + $totbar;
                        }
                        ?>
                        <h3><?= $totbar ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- TOTAL BARANG TERJUAL BOX -->
            <!-- TOTAL PENGELUARAN BOX -->
            <div class="col-md-4">
              <div class="card rounded-6 pengeluaran-color">
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                      <p class="mb-0">Total Pengeluaran</p>
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
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                      <div class="text-end ps-3">
                        <?php
                        $luar = 0;
                        foreach ($getPengOverBulan as $getPengOverBulan) {
                          $luar = $getPengOverBulan['pengeluaran'];
                        }
                        foreach ($getPengPemBulan as $getPengPemBulan) {
                          $luar = $getPengPemBulan['pengeluaran'] + $luar;
                        }
                        // var_dump($luar);
                        ?>
                        <h3>Rp <?=  $luar; ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- TOTAL PENGELUARAN BOX -->
          </div>
          <div class="row pt-4">
            <!-- TOTAL DROPSHIPPER BOX -->
            <div class="col-md-4">
              <div class="card rounded-6 barang-color">
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                      <p class="mb-0">Total Dropshipper</p>
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
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-users fa-3x"></i>
                      <div class="text-end ps-3">
                        <?php
                        $drop = 0;
                        $keuntungan = 0;
                        foreach ($getUser as $getUser) {
                          if ($getUser['level'] == "Dropshipper") {
                            $drop = $drop + 1;
                          }
                          $keuntungan = $getUser['keuntungan'] + $keuntungan;
                        }
                        // var_dump($luar);
                        ?>
                        <h3><?= $drop ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- TOTAL DROPSHIPPER BOX -->
            <!-- BEBAN GAJI BOX -->
            <div class="col-md-4">
              <div class="card rounded-6 pengeluaran-color">
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                      <p class="mb-0">Beban Gaji</p>
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
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                      <div class="text-end ps-3">
                        <h3>Rp <?= $keuntungan ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- BEBAN GAJI BOX -->
          </div>
        </div>
        <!-- CHART PENJUALAN -->
        <div class="card rounded-6 mb-4">
          <div class="card-header d-flex justify-content-between py-3">
            <h5 class="mb-0 align-self-center">
              <strong>Grafik Penjualan</strong>
            </h5>
            <div class="dropdown align-self-center">
              <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                Tahun ini
              </div>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Hari ini</a></li>
                <li><a class="dropdown-item" href="#">Bulan ini</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <canvas class="w-100" id="myChart" height="400"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>

</html>