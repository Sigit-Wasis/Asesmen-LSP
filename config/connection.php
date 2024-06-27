<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Muat variabel lingkungan dari file .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Ambil nilai variabel lingkungan
$dbhost = $_ENV['DB_HOST'];
$dbuser = $_ENV['DB_USER'];
$dbpass = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

// Buat koneksi dengan database mysql
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Periksa koneksi, tampilkan pesan kesalahan jika gagal
if (!$link) {
    die("Koneksi dengan database gagal: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
}
?>
