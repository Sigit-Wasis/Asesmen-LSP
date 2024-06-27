<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // buat koneksi ke mysql dari file connection.php
    // Menggunakan __DIR__ untuk memastikan jalur absolut
    include(__DIR__ . "/../config/connection.php");

    // Ambil dan bersihkan data dari form
    // real_escape_string untuk mengamankan input dari pengguna sebelum dimasukkan ke dalam database
    $nama_pelanggan = $link->real_escape_string($_POST['nama_pelanggan']);
    $nomor_telepon = $link->real_escape_string($_POST['nomor_telepon']);
    $alamat_pengiriman = $link->real_escape_string($_POST['alamat_pengiriman']);
    $jenis_esteh = $link->real_escape_string($_POST['jenis_esteh']);
    $instruksi_tambahan = $link->real_escape_string($_POST['instruksi_tambahan']);
    $jumlah_pesanan = $link->real_escape_string($_POST['jumlah_pesanan']);
    $harga_total = $link->real_escape_string($_POST['harga_total']);

    // Buat query SQL untuk menyimpan data
    $query = "INSERT INTO pesanan_esteh (nama_pelanggan, nomor_telepon, alamat_pengiriman, jenis_esteh, instruksi_tambahan, jumlah_pesanan, harga_total) VALUES ('$nama_pelanggan', '$nomor_telepon', '$alamat_pengiriman', '$jenis_esteh', '$instruksi_tambahan', '$jumlah_pesanan', '$harga_total')";

    $result = mysqli_query($link, $query);

    //periksa hasil query
    if($result) {
        // Siapkan data untuk dilempar ke home.php
        $data = array(
            'nama_pelanggan' => $nama_pelanggan,
            'nomor_telepon' => $nomor_telepon,
            'alamat_pengiriman' => $alamat_pengiriman,
            'jenis_esteh' => $jenis_esteh,
            'instruksi_tambahan' => $instruksi_tambahan,
            'harga_total' => $harga_total,
            'jumlah_pesanan' => $jumlah_pesanan
        );

        // Redirect ke index.php dengan menyertakan data dalam URL + pesan
        $pesan = "Pesanan Anda Berhasil Dikirim.";
        $pesan = urlencode($pesan);
        header("Location: index.php?pesan={$pesan}");
    } else {
        die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
    }
}
?>
