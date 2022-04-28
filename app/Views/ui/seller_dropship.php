<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="favicon.png">
  <meta name="description" content="Aplikasi untuk inventaris Husen Variasi" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
  />
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
  />
  <!-- MDB -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="styles.css">

  <!-- MDB -->
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"
  ></script>

  <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" 
    integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"
  ></script>

  <title>Reseller dan Dropshipper Husen Variasi</title>
</head>

<body>
  <div class="container py-4 px-2">
    <div class="row">
      <div class="col-md-2">
        <div class="card list-group list-group-flush rounded">
          <h4 class="list-group-item p-4 ">
            HUSEN VARIASI
          </h4>
          <a href="dashboard.html" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="pemasukan.html" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Pemasukan</span>
          </a>
          <a href="pengeluaran.html" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-lock fa-fw me-3"></i><span>Pengeluaran</span></a>
          <a href="" class="list-group-item list-group-item-action py-2 ripple active"><i
              class="fas fa-chart-line fa-fw me-3"></i><span>Reseller & Dropship</span></a>
          <a href="data_barang" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Data Barang</span>
          </a>
        </div>
      </div>
      <div id="app" class="col-md-10 ps-3">
        <div class="container mb-4 px-0">
          <div class="row">
            <div class="col-md-6">
              <!-- TOTAL GAJI BOX -->
              <div class="card  rounded-6 primaryhusen-color">
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                      <p class="mb-0">Total Gaji Dropshipper</p>
                      <div class="dropdown align-self-top">
                        <div
                          class="dropdown-toggle"
                          type="button"
                          id="dropdownMenuButton"
                          data-mdb-toggle="dropdown"
                          aria-expanded="false"
                        >
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
                        <h3>Rp123.123.123</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- BIAYA OVERHEAD BOX -->
              <div class="card  rounded-6 primaryhusen-color">
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between">
                      <p class="mb-0">Total Dropshipper</p>
                      <div class="dropdown align-self-top">
                        <div
                          class="dropdown-toggle"
                          type="button"
                          id="dropdownMenuButton"
                          data-mdb-toggle="dropdown"
                          aria-expanded="false"
                        >
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
                        <h3><?php echo $count['total']; ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- PEMBELIAN BARANG -->
          <div class="card my-4">
            <div class="card-header d-flex justify-content-between py-3">
              <h5 class="mb-0 align-self-center">
                <strong>Reseller</strong>
              </h5>
              <a class="btn btn-primary" href="form_dataReseller" role="button">
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
                      <th scope="col">NO HP</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($reseller as $row) : ?>
                    <tr>
                      <td><?= $row['nama']?></td>
                      <td><?= $row['nomor_hp']?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- BIAYA OVERHEAD -->
          <div class="card my-4">
            <div class="card-header d-flex justify-content-between py-3">
              <h5 class="mb-0 align-self-center">
                <strong>Dropshipper</strong>
              </h5>
              <a class="btn btn-primary" href="form_dataDropship" role="button">
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
                      <th scope="col">Keuntungan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($dropshipper as $row) : ?>
                    <tr>
                      <td><?= $row['nama']?></td>
                      <td><?= $row['nomor_hp']?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script
    type="text/javascript"
    src="script.js"
  ></script>
</body>

</html>
