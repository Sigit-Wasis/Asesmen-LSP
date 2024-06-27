<?php
    $base_url = "/sigitlsp"; 
    $mysqli = new mysqli("localhost", "root", "123456");

    //buat database sigitlsp jika belum ada
    $query = "CREATE DATABASE IF NOT EXISTS esteh";
    $result = mysqli_query($mysqli, $query);

    if(!$result){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Database <b>'esteh'</b> berhasil dibuat... <br>";
    }

    //pilih database esteh
    $result = mysqli_select_db($mysqli, "esteh");

    if(!$result){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Database <b>'esteh'</b> berhasil dipilih... <br>";
    }

    // cek apakah tabel pesanan_esteh sudah ada. jika ada, hapus tabel
    $query = "DROP TABLE IF EXISTS pesanan_esteh";
    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'pesanan_esteh'</b> berhasil dihapus... <br>";
    }

    // Query untuk membuat tabel pesanan es teh
    $query  = "CREATE TABLE pesanan_esteh (";
    $query .= "id INT AUTO_INCREMENT, ";
    $query .= "nama_pelanggan VARCHAR(100) NOT NULL, ";
    $query .= "nomor_telepon VARCHAR(20), ";
    $query .= "alamat_pengiriman TEXT, ";
    $query .= "jenis_esteh VARCHAR(50) NOT NULL, ";
    $query .= "instruksi_tambahan TEXT, ";
    $query .= "jumlah_pesanan INT NOT NULL DEFAULT 1, ";
    $query .= "harga_total DECIMAL(10,2), ";
    $query .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
    $query .= "PRIMARY KEY (id)";
    $query .= ")";

    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'pesanan'</b> berhasil dibuat... <br>";
        echo "Buka Website di <a href='{$base_url}/views/index.php'><b>Sini</b></a>";
    }

    // tutup koneksi dengan database mysql
    mysqli_close($mysqli);
?>
