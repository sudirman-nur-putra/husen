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

  <title>Login Husen Variasi</title>
</head>

<body>
  <div class="mx-auto" style="width: 200px;">
    <div class="container-fluid px-0 mx-0">
      <div class="row">
        <div class="col-md">
          <div class="welcome w-100 h-100 d-flex flex-column justify-content-center align-items-center">
            <h6 class="display-6">Welcome back to Husen Variasi</h1>
              <img src="/img/login_background.png" alt="Login" width="350" height="300" class="pt-3">
          </div>
        </div>
        <div class="col-md">
          <form class="login w-100 h-100" method="post" action="<?= base_url() . '/login/masuk' ?>">
            <h6 class="display-6">Login</h1>
              <div class="form-outline my-3 w-100 bg-light border rounded-3">
                <input type="email" id="form12" class="form-control form-control-lg" name="email" required="Jangan dibiarkan kosong" />
                <label class="form-label" for="form12">Username</label>
              </div>
              <div class="form-outline my-3 w-100 bg-light border rounded-3">
                <input type="password" id="typePassword" class="form-control form-control-lg" name="password" required="Jangan dibiarkan kosong" />
                <label class="form-label" for="typePassword">Password</label>
              </div>
              <?php if (isset($error)) {
                echo $error;
              }; ?>
              <input type="submit" class="btn btn-primary my-3 w-100" name="" value="Login">
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>

</html>