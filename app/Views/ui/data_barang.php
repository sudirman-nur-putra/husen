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

  <link rel="stylesheet" href="/asset/styles.css">

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <title>Data Barang Husen</title>
</head>

<body>
  <div class="container py-4 px-2">
    <div class="row">
      <div class="col-md-2">
        <?php
        if (session()->getFlashdata('status')) {
          echo '<h4>' . session()->getFlashdata('status') . '</h4>';
        }
        ?>
        <!-- SIDE NAVBAR -->
        <div class="card list-group list-group-flush rounded">
          <h4 class="list-group-item p-4 ">
            HUSEN VARIASI
          </h4>
          <a href="dashboard" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="pemasukan" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Pemasukan</span>
          </a>
          <a href="pengeluaran" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-lock fa-fw me-3"></i><span>Pengeluaran</span>
          </a>
          <a href="seller_dropship" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-line fa-fw me-3"></i><span>Reseller & Dropship</span>
          </a>
          <a href="" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Data Barang</span>
          </a>
          <a href="<?= base_url(); ?>/login/logout" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-sign-out fa-fw me-3"></i><span>Logout</span>
          </a>
        </div>
      </div>
      <div id="app" class="col-md-10 ps-3">
        <!-- SEARCH BOX -->
        <div class="card mb-4">
          <form class="d-none d-md-flex w-auto my-2">
            <span class="border-0 mx-3 my-auto">
              <i class="fas fa-search"></i>
            </span>
            <input autocomplete="off" type="text" class="form-control form-control me-3 my-auto border-0" placeholder='Search' name="keyword" />
          </form>
        </div>
        <!-- TABEL DATA BARANG -->
        <div class="card my-4 rounded-6">
          <div class="card-header d-flex justify-content-between py-3">
            <h5 class="mb-0 align-self-center">
              <strong>Data Barang</strong>
            </h5>
            <a class="btn btn-primary" href="form_dataBarang" role="button">
              <i class="fas fa-plus"></i>
              Tambah Data
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Dropshipper</th>
                    <th scope="col">Harga Reseller</th>
                    <th scope="col">Stok</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($fetch_data as $row) : ?>
                    <tr>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['harga_beli'] ?></td>
                      <td><?= $row['harga_jual_dropshipper'] ?></td>
                      <td><?= $row['harga_jual_reseller'] ?></td>
                      <td><?= $row['stok'] ?></td>
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
  <script type="text/javascript" src="script.js"></script>
</body>

</html>