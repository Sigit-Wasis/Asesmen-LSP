<?php
mysqli_report(MYSQLI_REPORT_STRICT);
$base_url = "/sigitlsp"; 

try {
  $mysqli = new mysqli("localhost", "root", "123456");

  // Cek apakah database esteh tersedia
  $mysqli->select_db("esteh");
  if ($mysqli->error){
    throw new Exception();
  }

  // Cek apakah tabel pesanan_esteh tersedia
  $query = "SELECT 1 FROM pesanan_esteh";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception();
  }
  // tutup koneksi ke database
  if (isset($mysqli)) {
    $mysqli->close();
  }

  // jika database digitalent, tabel paket_wisata & admin ada, redirect ke halaman home
  header("Location: views/index.php");
}
catch (Exception $e) {
  // kode catch ini akan diproses jika salah satu dari database digitalent,
  // tabel paket_wisata dan tabel admin tidak ada di database.
?>

  <!doctype html>
  <html lang="id">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>App Pemesanan Es Teh</title>
      <link rel="icon" href="<?= $base_url ?>/assets/img/favicon.ico" type="image/png" >
      <link href="<?= $base_url ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <div class="container" class="py-5">
      <div class="row">
        <div class="col-12 py-4 mx-auto text-center">
          <h3 class="mt-5">
            Selamat datang di Aplikasi <strong>Pemesanan Es Teh</strong>
          </h3>
          <p class="lead mt-5">Sistem kami mendeteksi database /
            tabel belum tersedia, apakah ingin dibuat sekarang?</p>
          <a href="<?= $base_url ?>/database/migration.php"
             class="btn btn-info">Ya</a>
          <a href="#" class="btn btn-danger">Tidak</a>
        </div>
      </div>
    </div>

    <script src="<?= $base_url ?>/assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>
<?php
// kurung kurawal untuk menutup block catch
}
