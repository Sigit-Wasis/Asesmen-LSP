<?php
    $base_url = "/sigitlsp"; 
    
    // buat koneksi ke mysql dari file connection.php
    // Menggunakan __DIR__ untuk memastikan jalur absolut
    include(__DIR__ . "/../config/connection.php");

    // query untuk mengambil semua data dari pesanan esteh
    $query = "SELECT id, nama_pelanggan, nomor_telepon, alamat_pengiriman, jenis_esteh, instruksi_tambahan, jumlah_pesanan, harga_total FROM pesanan_esteh";
    $result = $link->query($query);
?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sigit Wasis Subekti">
    <meta name="generator" content="Hugo 0.84.0">
    <title>App Warung ES-Teh</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= $base_url ?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="icon" href="<?= $base_url ?>/assets/img/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="<?= $base_url ?>/assets/css/form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">    
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="<?= $base_url ?>/assets/img/tea.png" alt="" width="100" height="100">
                <h2>ES TEH SEGAR</h2>
                <p class="lead">Yuk, segarkan hari kamu dengan Esteh! Nikmati sensasi manis dan menyegarkan dari Esteh yang siap menemani setiap momenmu. Esteh kami dibuat dari bahan-bahan berkualitas, sehingga memberikan rasa yang nikmat dan menyegarkan.</p>
                <div class="text-center">
                    <a href="<?= $base_url ?>/views/index.php" class="btn btn-info">Form Pemesanan</a>
                    <a href="<?= $base_url ?>/views/list_pesanan.php" class="btn btn-info">List Pesanan</a>
                </div>
            </div>

            <a href="<?= $base_url ?>/views/export_json.php" class="btn btn-secondary">Export Json</a>
            <table class="table table-striped table-bordered">
                <?php
                    if ($result->num_rows > 0) {
                        echo "<thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>Nama</th>
                                    <th scope='col'>Telepon</th>
                                    <th scope='col'>Alamat</th>
                                    <th scope='col'>Jenis Es Teh</th>
                                    <th scope='col'>Jumlah</th>
                                    <th scope='col'>Harga</th>
                                    <th scope='col'>Tambahan</th>
                                </tr>
                            </thead>
                            <tbody>";

                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"]. "</td>
                                    <td>" . $row["nama_pelanggan"]. "</td>
                                    <td>" . $row["nomor_telepon"]. "</td>
                                    <td>" . $row["alamat_pengiriman"]. " Hari</td>
                                    <td>" . $row["jenis_esteh"]. "</td>
                                    <td>" . $row["jumlah_pesanan"]. "</td>
                                    <td>Rp. " . number_format($row["harga_total"], 0, ',', '.') . "</td>
                                    <td>" . $row["instruksi_tambahan"]. "</td>
                                </tr>";
                        }
                        echo "</tbody>";
                    } else {
                        echo "<tbody><tr><td colspan='8'>Tidak ada data</td></tr></tbody>";
                    }
                ?>
            </table>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small font-weight-bold">
            <p class="mb-1">&copy; 2024 Sigit Wasis Subekti</p>
            <a href="https://embuncode.com" style="text-decoration: none;">Embuncode</a>
        </footer>
    </div>
    <script src="<?= $base_url ?>/assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

