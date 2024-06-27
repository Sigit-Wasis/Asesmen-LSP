<?php

include(__DIR__ . "/../config/connection.php");

// Query untuk mengambil data
$query = "SELECT id, nama_pelanggan, nomor_telepon, alamat_pengiriman, jenis_esteh, instruksi_tambahan, jumlah_pesanan, harga_total FROM pesanan_esteh";
$result = $link->query($query);

$pesanan = array();

if ($result->num_rows > 0) {
    // Mengambil data dari setiap baris
    while($row = $result->fetch_assoc()) {
        $pesanan[] = $row;
    }
} else {
    echo "0 results";
}

// Menutup koneksi
$link->close();

// Mengubah array ke format JSON
$json_data = json_encode($pesanan, JSON_PRETTY_PRINT);

// Menyimpan data JSON ke file
file_put_contents('pesanan_esteh.json', $json_data);

echo $json_data;
?>
