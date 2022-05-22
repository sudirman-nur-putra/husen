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
                          <p id="text_pemasukan">Bulan ini</p> 
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="#" onclick="pemasukanTahun()" >Tahun ini</a></li>
                          <li><a class="dropdown-item" href="#" onclick="pemasukanBulan()" >Bulan ini</a></li>
                          <li><a class="dropdown-item" href="#" onclick="pemasukanHari()">Hari ini</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                      <div class="text-end ps-3">
                        <?php
                        // Menghitung Jumlah Pemasukan Bulanan
                        $totpemb = 0;
                        foreach ($getPenDropBulan as $getPenDropBulan) {
                          $totpemb = $getPenDropBulan['harga'];
                        }
                        foreach ($getPenResBulan as $getPenResBulan) {
                          $totpemb = $getPenResBulan['harga'] + $totpemb;
                        }

                        // Menghitung Jumlah Pemasukan harian
                        $totpemh = 0;
                        foreach ($getPenDropHari as $getPenDropHari) {
                          $totpemh = $getPenDropHari['harga'];
                        }
                        foreach ($getPenResHari as $getPenResHari) {
                          $totpemh = $getPenResHari['harga'] + $totpemh;
                        }

                        $totpemt = 0;
                        foreach ($getPenDropTahun as $getPenDropTahun) {
                          $totpemt = $getPenDropTahun['harga'];
                        }
                        foreach ($getPenResTahun as $getPenResTahun) {
                          $totpemt = $getPenResTahun['harga'] + $totpemt;
                        }
                        ?>
                        <h3 id="pemasukan">Rp <?= $totpemb; ?></h3>
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
                          <p id="text_barangKeluar">Bulan ini</p>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="#" onclick="barangTerjualTahun()">Tahun ini</a></li>
                          <li><a class="dropdown-item" href="#" onclick="barangTerjualBulan()">Bulan ini</a></li>
                          <li><a class="dropdown-item" href="#" onclick="barangTerjualHari()">Hari ini</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-shopping-bag fa-3x"></i>
                      <div class="text-end ps-3">
                        <?php
                        // Menghitung Jumlah Barang Keluar Bulan ini
                        $totbarb = 0;
                        foreach ($getBarDropBulan as $getBarDropBulan) {
                          $totbarb = $getBarDropBulan['barang'];
                        }
                        foreach ($getBarResBulan as $getBarResBulan) {
                          $totbarb = $getBarResBulan['barang'] + $totbarb;
                        }

                        // Menghitung Jumlah Barang Keluar Tahun ini
                        $totbart = 0;
                        foreach ($getBarDropTahun as $getBarDropTahun) {
                          $totbart = $getBarDropTahun['barang'];
                        }
                        foreach ($getBarResTahun as $getBarResTahun) {
                          $totbart = $getBarResTahun['barang'] + $totbart;
                        }

                        // Menghitung Jumlah Barang Keluar Hari ini
                        $totbarh = 0;
                        foreach ($getBarDropHari as $getBarDropHari) {
                          $totbarh = $getBarDropHari['barang'];
                        }
                        foreach ($getBarResHari as $getBarResHari) {
                          $totbarh = $getBarResHari['barang'] + $totbarh;
                        }
                        ?>
                        <h3 id="barangKeluar"><?= $totbarb ?></h3>
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
                          <p id="text_pengeluaran">Bulan ini</p>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="#" onclick="totalPengeluaranTahun()">Tahun ini</a></li>
                          <li><a class="dropdown-item" href="#" onclick="totalPengeluaranBulan()">Bulan ini</a></li>
                          <li><a class="dropdown-item" href="#" onclick="totalPengeluaranHari()">Hari ini</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                      <div class="text-end ps-3">
                        <?php
                        // Menghitung Jumlah Pengeluaran Bulanan
                        $luarb = 0;
                        foreach ($getPengOverBulan as $getPengOverBulan) {
                          $luarb = $getPengOverBulan['pengeluaran'];
                        }
                        foreach ($getPengPemBulan as $getPengPemBulan) {
                          $luarb = $getPengPemBulan['pengeluaran'] + $luarb;
                        }
                        foreach ($getPengGajiBulan as $getPengGajiBulan) {
                          $luarb = $getPengGajiBulan['pengeluaran'] + $luarb;
                        }

                        // Menghitung Jumlah Pengeluaran Tahunan
                        $luart = 0;
                        foreach ($getPengOverTahun as $getPengOverTahun) {
                          $luart = $getPengOverTahun['pengeluaran'];
                        }
                        foreach ($getPengPemTahun as $getPengPemTahun) {
                          $luart = $getPengPemTahun['pengeluaran'] + $luart;
                        }
                        foreach ($getPengGajiTahun as $getPengGajiTahun) {
                          $luart = $getPengGajiTahun['pengeluaran'] + $luart;
                        }

                        // Menghitung Jumlah Pengeluaran Harian
                        $luarh = 0;
                        foreach ($getPengOverHari as $getPengOverHari) {
                          $luarh = $getPengOverHari['pengeluaran'];
                        }
                        foreach ($getPengPemHari as $getPengPemHari) {
                          $luarh = $getPengPemHari['pengeluaran'] + $luarh;
                        }
                        foreach ($getPengGajiHari as $getPengGajiHari) {
                          $luarh = $getPengGajiHari['pengeluaran'] + $luarh;
                        }
                        ?>
                        <h3 id="pengeluaran">Rp <?= $luarb; ?></h3>
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
                    </div>
                    <div class="pt-3 d-flex flex-row justify-content-start align-items-end">
                      <i class="fas fa-dollar-sign fa-3x"></i>
                      <div class="text-end ps-3">
                        <h3 id="gaji">Rp <?= $keuntungan ?></h3>
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
              <strong>Grafik Penjualan Barang <?= $tahun1; ?></strong>
            </h5>
            <div class="dropdown align-self-top">
              <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                <p id="text_pemasukan">Pilih Tahun</p> 
              </div>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                $date = date("Y");
                for ($i = $date; $i >= $date-5 ; $i-- ) {
                ?>
                <li><a class="dropdown-item" href="<?= base_url().'/index.php/home/index/barang/'.$i; ?>"><?= "Tahun ".$i ?></a></li>
                <?php 
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <canvas class="w-100" id="myChart" height="400"></canvas>
          </div>
        </div>
        <!-- CHART Pemasukan -->
        <div class="card rounded-6 mb-4">
          <div class="card-header d-flex justify-content-between py-3">
            <h5 class="mb-0 align-self-center">
              <strong>Grafik Pemasukan <?= $tahun2; ?></strong>
            </h5>
            <div class="dropdown align-self-top">
              <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                <p id="text_pemasukan">Pilih Tahun</p> 
              </div>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                $date = date("Y");
                for ($i = $date; $i >= $date-5 ; $i-- ) {
                ?>
                <li><a class="dropdown-item" href="<?= base_url().'/index.php/home/index/pemasukan/'.$i; ?>"><?= "Tahun ".$i ?></a></li>
                <?php 
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <canvas class="w-100" id="ChartPemasukan" height="400"></canvas>
          </div>
        </div>
        <!-- CHART Pengeluaran -->
        <div class="card rounded-6 mb-4">
          <div class="card-header d-flex justify-content-between py-3">
            <h5 class="mb-0 align-self-center">
              <strong>Grafik Penjualan <?= $tahun3 ?></strong>
            </h5>
            <div class="dropdown align-self-top">
              <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                <p id="text_pemasukan">Pilih Tahun</p> 
              </div>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                $date = date("Y");
                for ($i = $date; $i >= $date-5 ; $i-- ) {
                ?>
                <li><a class="dropdown-item" href="<?= base_url().'/index.php/home/index/pengeluaran/'.$i; ?>"><?= "Tahun ".$i ?></a></li>
                <?php 
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <canvas class="w-100" id="ChartPengeluaran" height="400"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- DATA UNTUK CHART -->
  <?php 

  $Januari1 = 0;
  $Februari1 = 0;
  $Maret1 = 0;
  $April1 = 0;
  $Mei1 = 0;
  $Juni1 = 0;
  $Juli1 = 0;
  $Agustus1 = 0;
  $September1 = 0;
  $Oktober1 = 0;
  $November1 = 0;
  $Desember1 = 0;

  // Menghitung Jumlah Barang Tahun ini
  foreach ($getBarDropTahunBulan as $getBarDropTahunBulan) {
    $tgl = $getBarDropTahunBulan['tanggal']; 
    $jml_barang = $getBarDropTahunBulan['barang'];
    $pecah = explode("-", $tgl);
    $tahun1 = $pecah[0];
    // echo "<br><br>".$pecah[1]."<br><br>";
    if ($pecah[1] == '01') {
      $Januari1 = $jml_barang;
    }
    if ($pecah[1] == '02') {
      $Februari1 = $jml_barang;
    }
    if ($pecah[1] == '03') {
      $Maret1 = $jml_barang;
    }
    if ($pecah[1] == '04') {
      $April1 = $jml_barang;
    }
    if ($pecah[1] == '05') {
      $Mei1 = $jml_barang;
    }
    if ($pecah[1] == '06') {
      $Juni1 = $jml_barang;
    }
    if ($pecah[1] == '07') {
      $Juli1 = $jml_barang;
    }
    if ($pecah[1] == '08') {
      $Agustus1 = $jml_barang;
    }
    if ($pecah[1] == '09') {
      $September1 = $jml_barang;
    }
    if ($pecah[1] == '10') {
      $Oktober1 = $jml_barang;
    }
    if ($pecah[1] == '11') {
      $November1 = $jml_barang;
    }
    if ($pecah[1] == '12') {
      $Desember1 = $jml_barang;
    }
  }
   foreach ($getBarResTahunBulan as $getBarResTahunBulan) {
    $tgl = $getBarResTahunBulan['tanggal']; 
    $jml_barang = $getBarResTahunBulan['barang'];
    $pecah = explode("-", $tgl);
    $tahun1 = $pecah[0];
    // echo "<br><br>".$pecah[1]."<br><br>";
    if ($pecah[1] == '01') {
      $Januari1 = $jml_barang + $Januari1;
    }
    if ($pecah[1] == '02') {
      $Februari1 = $jml_barang + $Februari1;
    }
    if ($pecah[1] == '03') {
      $Maret1 = $jml_barang + $Maret1;
    }
    if ($pecah[1] == '04') {
      $April1 = $jml_barang + $April1;
    }
    if ($pecah[1] == '05') {
      $Mei1 = $jml_barang + $Mei1 ;
    }
    if ($pecah[1] == '06') {
      $Juni1 = $jml_barang + $Juni1;
    }
    if ($pecah[1] == '07') {
      $Juli1 = $jml_barang + $Juli1;
    }
    if ($pecah[1] == '08') {
      $Agustus1 = $jml_barang + $Agustus1;
    }
    if ($pecah[1] == '09') {
      $September1 = $jml_barang + $September1;
    }
    if ($pecah[1] == '10') {
      $Oktober1 = $jml_barang + $Oktober1;
    }
    if ($pecah[1] == '11') {
      $November1 = $jml_barang + $November1;
    }
    if ($pecah[1] == '12') {
      $Desember1 = $jml_barang + $Desember1;
    }
  }

// CHART PENDAPATAN DROPSHIPPER TAHUN PERBULAN
  $Januari3 = 0;
  $Februari3 = 0;
  $Maret3 = 0;
  $April3 = 0;
  $Mei3 = 0;
  $Juni3 = 0;
  $Juli3 = 0;
  $Agustus3 = 0;
  $September3 = 0;
  $Oktober3 = 0;
  $November3 = 0;
  $Desember3 = 0;

  // Menghitung Jumlah Barang Tahun ini
  foreach ($getPenDropTahunBulan as $getPenDropTahunBulan) {
    $tgl = $getPenDropTahunBulan['tanggal']; 
    $nominal = $getPenDropTahunBulan['harga'];
    $pecah = explode("-", $tgl);
    $tahun3 = $pecah[0];
    // echo "<br><br>".$pecah[1]."<br><br>";
    if ($pecah[1] == '01') {
      $Januari3 = $nominal;
    }
    if ($pecah[1] == '02') {
      $Februari3 = $nominal;
    }
    if ($pecah[1] == '03') {
      $Maret3 = $nominal;
    }
    if ($pecah[1] == '04') {
      $April3 = $nominal;
    }
    if ($pecah[1] == '05') {
      $Mei3 = $nominal;
    }
    if ($pecah[1] == '06') {
      $Juni3 = $nominal;
    }
    if ($pecah[1] == '07') {
      $Juli3 = $nominal;
    }
    if ($pecah[1] == '08') {
      $Agustus3 = $nominal;
    }
    if ($pecah[1] == '09') {
      $September3 = $nominal;
    }
    if ($pecah[1] == '10') {
      $Oktober3 = $nominal;
    }
    if ($pecah[1] == '11') {
      $November3 = $nominal;
    }
    if ($pecah[1] == '12') {
      $Desember3 = $nominal;
    }
  }
// CHART PENDAPATAN RESELLER TAHUNAN PERBULAN
  $Januari4 = 0;
  $Februari4 = 0;
  $Maret4 = 0;
  $April4 = 0;
  $Mei4 = 0;
  $Juni4 = 0;
  $Juli4 = 0;
  $Agustus4 = 0;
  $September4 = 0;
  $Oktober4 = 0;
  $November4 = 0;
  $Desember4 = 0;

  // Menghitung Jumlah Barang Tahun ini
  foreach ($getPenResTahunBulan as $getPenResTahunBulan) {
    $tgl = $getPenResTahunBulan['tanggal']; 
    $nominal = $getPenResTahunBulan['harga'];
    $pecah = explode("-", $tgl);
    $tahun3 = $pecah[0];
    // echo "<br><br>".$pecah[1]."<br><br>";
    if ($pecah[1] == '01') {
      $Januari4 = $nominal;
    }
    if ($pecah[1] == '02') {
      $Februari4 = $nominal;
    }
    if ($pecah[1] == '03') {
      $Maret4 = $nominal;
    }
    if ($pecah[1] == '04') {
      $April4 = $nominal;
    }
    if ($pecah[1] == '05') {
      $Mei4 = $nominal;
    }
    if ($pecah[1] == '06') {
      $Juni4 = $nominal;
    }
    if ($pecah[1] == '07') {
      $Juli4 = $nominal;
    }
    if ($pecah[1] == '08') {
      $Agustus4 = $nominal;
    }
    if ($pecah[1] == '09') {
      $September4 = $nominal;
    }
    if ($pecah[1] == '10') {
      $Oktober4 = $nominal;
    }
    if ($pecah[1] == '11') {
      $November4 = $nominal;
    }
    if ($pecah[1] == '12') {
      $Desember4 = $nominal;
    }
  }


  // CHART PENGELUARAN BIAYA OVERHEAD TAHUN PERBULAN
  $Januari5 = 0;
  $Februari5 = 0;
  $Maret5 = 0;
  $April5 = 0;
  $Mei5 = 0;
  $Juni5 = 0;
  $Juli5 = 0;
  $Agustus5 = 0;
  $September5 = 0;
  $Oktober5 = 0;
  $November5 = 0;
  $Desember5 = 0;

  // Menghitung Jumlah Barang Tahun ini
  foreach ($getPengOverTahunBulan as $getPengOverTahunBulan) {
    $tgl = $getPengOverTahunBulan['tanggal']; 
    $nominal = $getPengOverTahunBulan['pengeluaran'];
    $pecah = explode("-", $tgl);
    $tahun4 = $pecah[0];
    // echo "<br><br>".$pecah[1]."<br><br>";
    if ($pecah[1] == '01') {
      $Januari5 = $nominal;
    }
    if ($pecah[1] == '02') {
      $Februari5 = $nominal;
    }
    if ($pecah[1] == '03') {
      $Maret5 = $nominal;
    }
    if ($pecah[1] == '04') {
      $April5 = $nominal;
    }
    if ($pecah[1] == '05') {
      $Mei5 = $nominal;
    }
    if ($pecah[1] == '06') {
      $Juni5 = $nominal;
    }
    if ($pecah[1] == '07') {
      $Juli5 = $nominal;
    }
    if ($pecah[1] == '08') {
      $Agustus5 = $nominal;
    }
    if ($pecah[1] == '09') {
      $September5 = $nominal;
    }
    if ($pecah[1] == '10') {
      $Oktober5 = $nominal;
    }
    if ($pecah[1] == '11') {
      $November5 = $nominal;
    }
    if ($pecah[1] == '12') {
      $Desember5 = $nominal;
    }
  }
  // CHART JUMLAH PENGELUARAN UNTUK PEMBELIAN BARANG
  $Januari6 = 0;
  $Februari6 = 0;
  $Maret6 = 0;
  $April6 = 0;
  $Mei6 = 0;
  $Juni6 = 0;
  $Juli6 = 0;
  $Agustus6 = 0;
  $September6 = 0;
  $Oktober6 = 0;
  $November6 = 0;
  $Desember6 = 0;

  // Menghitung Jumlah Barang Tahun ini
  foreach ($getPengPemTahunBulan as $getPengPemTahunBulan) {
    $tgl = $getPengPemTahunBulan['tanggal']; 
    $nominal = $getPengPemTahunBulan['pengeluaran'];
    $pecah = explode("-", $tgl);
    $tahun4 = $pecah[0];
    // echo "<br><br>".$pecah[1]."<br><br>";
    if ($pecah[1] == '01') {
      $Januari6 = $nominal;
    }
    if ($pecah[1] == '02') {
      $Februari6 = $nominal;
    }
    if ($pecah[1] == '03') {
      $Maret6 = $nominal;
    }
    if ($pecah[1] == '04') {
      $April6 = $nominal;
    }
    if ($pecah[1] == '05') {
      $Mei6 = $nominal;
    }
    if ($pecah[1] == '06') {
      $Juni6 = $nominal;
    }
    if ($pecah[1] == '07') {
      $Juli6 = $nominal;
    }
    if ($pecah[1] == '08') {
      $Agustus6 = $nominal;
    }
    if ($pecah[1] == '09') {
      $September6 = $nominal;
    }
    if ($pecah[1] == '10') {
      $Oktober6 = $nominal;
    }
    if ($pecah[1] == '11') {
      $November6 = $nominal;
    }
    if ($pecah[1] == '12') {
      $Desember6 = $nominal;
    }
  }
// CHART JUMLAH PENGELUARAN UNTUK GAJI TAHUN PERBULAN
  $Januari7 = 0;
  $Februari7 = 0;
  $Maret7 = 0;
  $April7 = 0;
  $Mei7 = 0;
  $Juni7 = 0;
  $Juli7 = 0;
  $Agustus7 = 0;
  $September7 = 0;
  $Oktober7 = 0;
  $November7 = 0;
  $Desember7 = 0;

  // Menghitung Jumlah Barang Tahun ini
  foreach ($getPengGajiTahunBulan as $getPengGajiTahunBulan) {
    $tgl = $getPengGajiTahunBulan['tanggal']; 
    $jml_barang = $getPengGajiTahunBulan['pengeluaran'];
    $pecah = explode("-", $tgl);
    $tahun4 = $pecah[0];
    // echo "<br><br>".$pecah[1]."<br><br>";
    if ($pecah[1] == '01') {
      $Januari7 = $jml_barang;
    }
    if ($pecah[1] == '02') {
      $Februari7 = $jml_barang;
    }
    if ($pecah[1] == '03') {
      $Maret7 = $jml_barang;
    }
    if ($pecah[1] == '04') {
      $April7 = $jml_barang;
    }
    if ($pecah[1] == '05') {
      $Mei7 = $jml_barang;
    }
    if ($pecah[1] == '06') {
      $Juni7 = $jml_barang;
    }
    if ($pecah[1] == '07') {
      $Juli7 = $jml_barang;
    }
    if ($pecah[1] == '08') {
      $Agustus7 = $jml_barang;
    }
    if ($pecah[1] == '09') {
      $September7 = $jml_barang;
    }
    if ($pecah[1] == '10') {
      $Oktober7 = $jml_barang;
    }
    if ($pecah[1] == '11') {
      $November7 = $jml_barang;
    }
    if ($pecah[1] == '12') {
      $Desember7 = $jml_barang;
    }
  }
  ?>
  <script type="text/javascript" src="script.js"></script>

  <script>
    // Graph
    // Pemasukan 
    function pemasukanHari() {
    document.getElementById("pemasukan").innerHTML = 'Rp <?= $totpemh; ?>';
    document.getElementById("text_pemasukan").innerHTML = 'Hari ini';
        }
    function pemasukanBulan() {
    document.getElementById("pemasukan").innerHTML = 'Rp <?= $totpemb; ?>';
    document.getElementById("text_pemasukan").innerHTML = 'Bulan ini';
        }
    function pemasukanTahun() {
    document.getElementById("pemasukan").innerHTML = 'Rp <?= $totpemt; ?>';
    document.getElementById("text_pemasukan").innerHTML = 'Tahun ini';
        }


    // Barang Terjual
    function barangTerjualHari() {
    document.getElementById("barangKeluar").innerHTML = '<?= $totbarh; ?>';
    document.getElementById("text_barangKeluar").innerHTML = 'Hari ini';
        }
    function barangTerjualBulan() {
    console.log("Berhasil!");
    document.getElementById("barangKeluar").innerHTML = '<?= $totbarb; ?>';
    document.getElementById("text_barangKeluar").innerHTML = 'Bulan ini';
        }
    function barangTerjualTahun() {
    document.getElementById("barangKeluar").innerHTML = "<?= $totbart; ?>";
    document.getElementById("text_barangKeluar").innerHTML = 'Tahun ini';
        }


    // Total Pengeluaran
    function totalPengeluaranHari() {
    document.getElementById("pengeluaran").innerHTML = "Rp <?= $luarh; ?>";
    document.getElementById("text_pengeluaran").innerHTML = 'Hari ini';
        }
    function totalPengeluaranBulan() {
    document.getElementById("pengeluaran").innerHTML = "Rp <?= $luarb; ?>";
    document.getElementById("text_pengeluaran").innerHTML = 'Bulan ini';
        }
    function totalPengeluaranTahun() {
    document.getElementById("pengeluaran").innerHTML = "Rp <?= $luart ?>";
    document.getElementById("text_pengeluaran").innerHTML = 'Tahun ini';
        }


function grafiktahunlalu(){
    document.getElementById("text_grafik").innerHTML = 'Tahun sebelumnya';
}

function grafiktahunini(){
    document.getElementById("text_grafik").innerHTML = 'Tahun ini';
}

var ctx = document.getElementById("myChart");

var myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ],
    datasets: [
      {
        label: 'Grafik Penjualan Barang Tahun Ini',
        data: [<?= $Januari1.",".$Februari1.",".$Maret1.",".$April1.",".$Mei1.",".$Juni1.",".$Juli1.",".$Agustus1.",".$September1.",".$Oktober1.",".$November1."".$Desember1; ?>],
        backgroundColor: "blue",
        hoverBackgroundColor: "green",
        borderRadius: 5,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: false,
          },
        },
      ],
    },
    legend: {
      display: false,
    },
  },
});

var pemasukan = document.getElementById("ChartPemasukan");

var ChartPemasukan = new Chart(pemasukan, {
  type: "bar",
  data: {
    labels: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ],
    datasets: [
      {
        label: 'Pemasukan dari Dropshipper',
        data: [<?= $Januari3.",".$Februari3.",".$Maret3.",".$April3.",".$Mei3.",".$Juni3.",".$Juli3.",".$Agustus3.",".$September3.",".$Oktober3.",".$November3."".$Desember3; ?>],
        backgroundColor: "red",
        hoverBackgroundColor: "green",
        borderRadius: 5,
      },
      {
        label: 'pemasukan dari Reseller',
        data: [<?= $Januari4.",".$Februari4.",".$Maret4.",".$April4.",".$Mei4.",".$Juni4.",".$Juli4.",".$Agustus4.",".$September4.",".$Oktober4.",".$November4."".$Desember4; ?>],
        backgroundColor: "blue",
        hoverBackgroundColor: "green",
        borderRadius: 5,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: false,
          },
        },
      ],
    },
    legend: {
      display: false,
    },
  },
});

var pengeluaran = document.getElementById("ChartPengeluaran");

var ChartPengeluaran = new Chart(pengeluaran, {
  type: "bar",
  data: {
    labels: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ],
    datasets: [
      {
        label: 'Pengeluaran Overhead',
        data: [<?= $Januari5.",".$Februari5.",".$Maret5.",".$April5.",".$Mei5.",".$Juni5.",".$Juli5.",".$Agustus5.",".$September5.",".$Oktober5.",".$November5."".$Desember5; ?>],
        backgroundColor: "red",
        hoverBackgroundColor: "green",
        borderRadius: 5,
      },
      {
        label: 'Pengeluaran Pembeliann Barang',
        data: [<?= $Januari6.",".$Februari6.",".$Maret6.",".$April6.",".$Mei6.",".$Juni6.",".$Juli6.",".$Agustus6.",".$September6.",".$Oktober6.",".$November6."".$Desember6; ?>],
        backgroundColor: "blue",
        hoverBackgroundColor: "green",
        borderRadius: 5,
      },
      {
        label: 'Pengeluaran Gaji Bulanan',
        data: [<?= $Januari7.",".$Februari7.",".$Maret7.",".$April7.",".$Mei7.",".$Juni7.",".$Juli7.",".$Agustus7.",".$September7.",".$Oktober7.",".$November7."".$Desember7; ?>],
        backgroundColor: "yellow",
        hoverBackgroundColor: "green",
        borderRadius: 5,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: false,
          },
        },
      ],
    },
    legend: {
      display: false,
    },
  },
});



let routes = {};
let templates = {};

let app_div = document.getElementById('app');

function home() {
    let div = document.createElement('div');
    let link = document.createElement('a');
    link.href = '#/about';
    link.innerText = 'About';

    div.innerHTML = '<h1>Home</h1>';
    div.appendChild(link);

    app_div.appendChild(div);
};

function about() {
    let div = document.createElement('div');
    let link = document.createElement('a');
    link.href = '#/';
    link.innerText = 'Home';

    div.innerHTML = '<h1>About</h1>';
    div.appendChild(link);

    app_div.appendChild(div);
};

function route (path, template) {
    if (typeof template === 'function') {
        return routes[path] = template;
    }
    else if (typeof template === 'string') {
        return routes[path] = templates[template];
    } else {
        return;
    };
};

function template (name, templateFunction) {
    return templates[name] = templateFunction;
};

template('home', function(){
    home();
});

template('about', function(){
    about();
});

// route('/', 'home');
// route('/about', 'about');

function resolveRoute(route) {
    try {
        return routes[route];
    } catch (e) {
        throw new Error(`Route ${route} not found`);
    };
};

function router(evt) {
    let url = window.location.hash.slice(1) || '/';
    let route = resolveRoute(url);

    route();
};


  </script>
</body>

</html>