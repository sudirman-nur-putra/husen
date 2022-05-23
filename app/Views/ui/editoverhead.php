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

    <title>Data Biaya Overhead</title>
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
            <h5 class="card-title">Data Biaya Overhead</h5>
            <p class="text-muted">
                Masukkan data-data yang akan diubah melalui form di bawah ini. Dan pastikan bahwa data yang Anda<br />
                masukan adalah benar.
            </p>
            <?php foreach ($overhead as $row) : ?>
                <form action="/pengeluaran/updateoverhead/<?= $row['id'] ?>" method="post">
                    <h6 class="m-0">Keterangan</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="keterangan" value="<?= $row['keterangan'] ?>" type="text" class="form-control form-control-md" />
                    </div>
                    <h6 class="m-0">Tanggal Pembelian</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="tanggal" value="<?= $row['tanggal'] ?>" type="date" id="birthday" class="form-control form-control-md">
                    </div>
                    <h6 class="m-0">Total Pengeluaran</h6>
                    <div class="form-outline mt-1 mb-3 w-100 bg-light border rounded-3">
                        <input required name="total" value="<?= $row['jumlah_pengeluaran'] ?>" type="text" class="form-control form-control-md" />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Ubah
                    </button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>