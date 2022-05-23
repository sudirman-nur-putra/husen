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

    <title>Dashboard Husen Variasi</title>
</head>

<body>
    <div class="card m-4">
        <div class="card-header d-flex flex-row align-items-stretch">
            <a onclick="history.back()" class="ripple text-muted">
                <i class="fas fa-arrow-left me-2"></i>
            </a>
            <h5 class="ps-3 m-0">Form Ubah Data</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">Informasi Pemasukan dari Dropshipper</h5>
            <p class="text-muted">
                Masukkan data-data yang akan diubah melalui form di bawah ini. Dan pastikan bahwa data yang Anda<br />
                masukan adalah benar.
            </p>
            <?php foreach ($transaksidropship as $row) : ?>
                <form action="/pemasukan/updatetransaksidropship/<?= $row['id'] ?>" method="post">
                    <h6 class="m-0">Nama Dropshipper</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <select name="namadropship" class="form-select" aria-label="Default select example">
                            <?php foreach ($dropshipper as $d) : ?>
                                <?php
                                if ($d['id'] == $row['id_user']) { ?>
                                    <option value="<?= $d['id'] ?>" selected> <?= $d['nama'] ?> </option>
                                <?php
                                } else {
                                ?><option value="<?= $d['id'] ?>" ?><?= $d['nama'] ?></option> <?php
                                                                                            } ?>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <h6 class="m-0">Marketplace</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <select name="marketplace" class="form-select" aria-label="Default select example">
                            <option value="Shopee" <?php if ($row['marketplace'] == "Shopee") {
                                                        echo 'selected';
                                                    } ?>>Shopee</option>
                            <option value="Lazada" <?php if ($row['marketplace'] == "Lazada") {
                                                        echo 'selected';
                                                    } ?>>Lazada</option>
                        </select>
                    </div>
                    <h6 class="m-0">No Resi</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="noresi" value="<?= $row['no_resi'] ?>" type="text" class="form-control form-control-md" />
                    </div>
                    <h6 class="m-0">produk</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <select name="namaproduk" class="form-select" aria-label="Default select example">
                            <?php foreach ($barang as $b) : ?>
                                <?php
                                if ($b['id'] == $row['id_barang']) { ?>
                                    <option value="<?= $b['id'] ?>" selected> <?= $b['nama_barang'] ?> </option>
                                <?php
                                } else {
                                ?><option value="<?= $b['id'] ?>" ?><?= $b['nama_barang'] ?></option> <?php
                                                                                                    } ?>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <h6 class="m-0">Harga Jual</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="hargajual" value="<?= $row['harga_jual'] ?>" type="number" class="form-control form-control-md" />
                    </div>
                    <h6 class="m-0">Modal</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="modal" value="<?= $row['modal'] ?>" type="number" class="form-control form-control-md" />
                    </div>
                    <h6 class="m-0">Jumlah</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="jumlah" value="<?= $row['jumlah_barang'] ?>" type="number" class="form-control form-control-md" />
                    </div>
                    <h6 class="m-0">Tanggal Pembelian</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="tanggal" value="<?= $row['tanggal'] ?>" type="date" id="birthday" class="form-control form-control-md">
                    </div>
                    <h6 class="m-0">Packing</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <select name="packing" class="form-select" aria-label="Default select example">
                            <option value="Sendiri" <?php if ($row['status_packing'] == "Sendiri") {
                                                        echo 'selected';
                                                    } ?>>Sendiri</option>
                            <option value="Dari Husein" <?php if ($row['status_packing'] == "Dari Husein") {
                                                            echo 'selected';
                                                        } ?>>Dari Husein</option>
                        </select>
                    </div>
                    <h6 class="m-0">Status</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <select name="status" class="form-select" aria-label="Default select example">
                            <option value="Proses" <?php if ($row['status'] == "Proses") {
                                                        echo 'selected';
                                                    } ?>>Proses</option>
                            <option value="Sampai" <?php if ($row['status'] == "Sampai") {
                                                        echo 'selected';
                                                    } ?>>Sampai</option>
                            <option value="Barang Hilang" <?php if ($row['status'] == "Barang Hilang") {
                                                                echo 'selected';
                                                            } ?>>Barang Hilang</option>
                            <option value="Barang Dikembalikan" <?php if ($row['status'] == "Barang Dikembalikan") {
                                                                    echo 'selected';
                                                                } ?>>Barang Dikembalikan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Ubah
                    </button>
        </div>
        </form>
    <?php endforeach; ?>
    </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>