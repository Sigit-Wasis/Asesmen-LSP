<?php
    $base_url = "/sigitlsp"; 

    // ambil pesan jika ada  
    if (isset($_GET["pesan"])) {
        $pesan = $_GET["pesan"];
    }
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
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

            <?php
                // tampilkan pesan jika ada
                if (isset($pesan)) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Mantappp',
                                text: '$pesan',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'index.php';
                                }
                            });
                        });
                    </script>";
                }
            ?>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Pesanan Kamu</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0" id="detail_jenis_esteh">Belum Ada Pesanan</h6>
                            </div>
                            <span class="text-muted" id="detail_jumlah_pesanan">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Tagihan (Rp.)</span>
                            <strong id="total_tagihan">0</strong>
                        </li>
                    </ul>

                    <div class="text-center mt-5"> 
                        <img src="<?= $base_url ?>/assets/img/tunjuk.png" alt="tunjuk" width="200">
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Yuuuuuk Pesan Disini Sekarang!</h4>
                    <form action="simpan_pemesanan.php" method="POST" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan <span style="color: red"> *</span></label>
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="ani" required>
                                <div class="invalid-feedback">
                                    Nama Pelanggan Wajib Diisi
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon <span style="color: red"> *</span></label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="085268812237" required>
                                <div class="invalid-feedback">
                                    Nomor Telepon Wajib Diisi.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="alamat_pengiriman" class="form-label">Alamat <span style="color: red"> *</span></label>
                                <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" placeholder="alamat" required>
                                <div class="invalid-feedback">
                                    Alamat Wajib Diisi.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="jenis_esteh" class="form-label">Jenis Es Teh <span style="color: red"> *</span></label>
                                <select class="form-select" id="jenis_esteh" name="jenis_esteh" required>
                                    <option value="">pilih...</option>
                                    <option value="Es Teh Manis">Es Teh Manis (Rp.3000)</option>
                                    <option value="Es Teh Tawar">Es Teh Tawar (Rp.2000)</option>
                                    <option value="Es Lemon Tea">Es Lemon Tea (Rp.5000)</option>
                                    <option value="Es Teh Jumbo">Es Teh Jumbo (Rp.4000)</option>
                                </select>
                                <div class="invalid-feedback">
                                    Jenis Es Teh Wajib Dipilih.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="jumlah_pesanan" class="form-label">Jumlah Pesanan <span style="color: red"> *</span></label>
                                <input type="number" min="1" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="" required>
                                <div class="invalid-feedback">
                                    Jumlah Pesanan Wajib Diisi.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="instruksi_tambahan" class="form-label">Tambahan Informasi</label>
                                <input type="text" class="form-control" id="instruksi_tambahan" name="instruksi_tambahan" placeholder="">
                            </div>
                        </div>

                        <input type="hidden" name="harga_total" id="harga_total"> 

                        <hr class="my-4">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="w-100 btn btn-info btn-lg" onclick="calculateTotal()" type="button">Hitung Pesanan</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="w-100 btn btn-success btn-lg" type="submit">Pesan Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small font-weight-bold">
            <p class="mb-1">&copy; 2024 Sigit Wasis Subekti</p>
            <a href="https://embuncode.com" style="text-decoration: none;">Embuncode</a>
        </footer>
    </div>
    <script src="<?= $base_url ?>/assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= $base_url ?>/assets/js/form-validation.js"></script>
    <script>
        $('#jenis_esteh').on('input', function() {
            calculateTotal();
        });

        $('#jumlah_pesanan').on('input', function() {
            calculateTotal();
        });

        // Kalkulasi untuk total tagihan keseluruhan
        function calculateTotal() {
            if ($('#jenis_esteh').val() == 'Es Teh Manis') {
                var hargaJenisEsTeh = 3000;
            } else if ($('#jenis_esteh').val() == 'Es Teh Tawar') {
                var hargaJenisEsTeh = 2000;
            } else if ($('#jenis_esteh').val() == 'Es Lemon Tea') {
                var hargaJenisEsTeh = 5000;
            } else {
                var hargaJenisEsTeh = 4000;
            }

            var jenisEsTeh = parseFloat(hargaJenisEsTeh) || 0;
            var jumlahPesanan = parseFloat($('#jumlah_pesanan').val()) || 0;
            // kalkulasi total tagihan
            var totalTagihan = jenisEsTeh * jumlahPesanan;

            // assign value ke input harga_total
            $('#harga_total').val(parseInt(totalTagihan));
            // menampilkan total tagihan
            $('#total_tagihan').html(totalTagihan);
            // menampilkan jumlah pesanan
            $('#detail_jumlah_pesanan').html(jumlahPesanan);
            // menampilkan jenis es teh
            $('#detail_jenis_esteh').html($('#jenis_esteh').val());
        }
    </script>
</body>
</html>
