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

  <title>Pengeluaran Husen Variasi</title>
</head>

<body>
  <div class="container py-4 px-2">
    <div class="row">
      <div class="col-md-2">
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
          <a href="pengeluaran" class="list-group-item list-group-item-action py-2 ripple active"><i class="fas fa-lock fa-fw me-3"></i><span>Pengeluaran</span></a>
          <a href="seller_dropship" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-line fa-fw me-3"></i><span>Reseller & Dropship</span></a>
          <a href="data_barang" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Data Barang</span>
          </a>
          <a href="<?= base_url(); ?>/login/logout" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-sign-out fa-fw me-3"></i><span>Logout</span>
          </a>
        </div>
      </div>
      <div id="app" class="col-md-10 ps-3">
        <div class="container mb-4 px-0">
          <!-- TABEL GAJI DROPSHIPPER -->
          <div class="card my-4">
            <div class="card-header d-flex justify-content-between py-3">
              <h5 class="mb-0 align-self-center">
                <strong>Informasi Gaji Dropshipper</strong>
              </h5>
              <!-- <div class="dropdown align-self-center">
                <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                  Bulan: Februari
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Januari</a></li>
                  <li><a class="dropdown-item" href="#">Maret</a></li>
                </ul>
              </div> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">Nama Dropshipper</th>
                      <th scope="col">Keuntungan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dropshipperkeuntungan as $row) : ?>
                      <tr>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['total_gaji'] ?></td>
                        <td><a href="" class="btn btn-success">Gaji</a></td>

                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- GAJI  -->
          <div class="card my-4">
            <div class="card-header d-flex justify-content-between py-3">
              <h5 class="mb-0 align-self-center">
                <strong>Informasi Gaji</strong>
              </h5>
              <a class="btn btn-primary" href="/pengeluaran/gaji" role="button">
                <i class="fas fa-plus"></i>
                Tambah Data
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">Nama </th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">nominal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($gaji as $row) : ?>
                      <tr>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['nominal'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- PEMBELIAN BARANG -->
          <div class="card my-4">
            <div class="card-header d-flex justify-content-between py-3">
              <h5 class="mb-0 align-self-center">
                <strong>Pembelian Produk</strong>
              </h5>
              <a class="btn btn-primary" href="/pengeluaran/pembelianBarang" role="button">
                <i class="fas fa-plus"></i>
                Tambah Data
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">Tanggal Pembelian</th>
                      <th scope="col">Nama Toko</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Total</th>
                      <th scope="col">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($blbarang as $row) : ?>
                      <tr>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['nama_toko'] ?></td>
                        <td><?= $row['nama_barang'] ?></td>
                        <td><?= $row['jumlah_beli'] ?></td>
                        <td><?= $row['harga'] ?></td>

                        <td><?= $row['total_harga'] ?></td>
                        <td><a href="/pengeluaran/editpembelianbarang/<?= $row['id']; ?>" class="btn btn-success">Edit</a> <a href="/pengeluaran/deletepembelianbarang/<?= $row['id']; ?>" class="btn btn-danger">Delete</a></td>
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
                <strong>Biaya Overhead</strong>
              </h5>
              <a class="btn btn-primary" href="/pengeluaran/biayaoverhead" role="button">
                <i class="fas fa-plus"></i>
                Tambah Data
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Jumlah Pengeluaran</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($overhead as $row) : ?>
                      <tr>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td><?= $row['jumlah_pengeluaran'] ?></td>
                        <td><a href="/pengeluaran/editoverhead/<?= $row['id']; ?>" class="btn btn-success">Edit</a> <a href="/pengeluaran/deleteoverhead/<?= $row['id']; ?>" class="btn btn-danger">Delete</a></td>
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
  <script type="text/javascript" src="script.js"></script>
</body>

</html>