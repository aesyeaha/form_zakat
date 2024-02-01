<?php
include 'db_connection.php'; // Sesuaikan dengan lokasi file db_connection.php

// Mendapatkan data dari formulir
$id_donatur = $_POST['id_donatur'];
$id_gerai = $_POST['gerai'];
$id_petugas_gerai = $_POST['petugas_gerai'];
$nama_donatur = $_POST['nama_donatur'];
$alamat = $_POST['alamat'];
$nomor_hp = $_POST['nomor_hp'];
$cara_pembayaran = $_POST['cara_pembayaran'];
$bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
$keterangan = $_POST['keterangan'];
$total_rp = $_POST['totalRp'];
$total_paket = $_POST['totalPaket'];
$donasiCount = $_POST['donasiCount'];

// Menyimpan data donasi ke dalam tabel donasi_data
$query_donasi = "INSERT INTO donasi_data (id_donatur, id_gerai, id_petugas_gerai, nama_donatur, alamat, nomor_hp, cara_pembayaran, bukti_pembayaran, keterangan, total_rp, total_paket) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_donasi = $conn->prepare($query_donasi);
$stmt_donasi->bind_param("iiissssssis", $id_donatur, $id_gerai, $id_petugas_gerai, $nama_donatur, $alamat, $nomor_hp, $cara_pembayaran, $bukti_pembayaran, $keterangan, $total_rp, $total_paket);
$stmt_donasi->execute();

// Mendapatkan ID donasi yang baru saja dibuat
$id_donasi = $stmt_donasi->insert_id;

// Menyimpan data perincian donasi ke dalam tabel perincian_donasi
for ($i = 1; $i <= $donasiCount; $i++) {
    $perincian_donasi = $_POST["perincian_donasi_$i"];
    $bentuk_donasi = $_POST["bentuk_donasi_$i"];
    $jumlah_rp = $_POST["jumlah_rp_$i"];
    $jumlah_paket = $_POST["jumlah_paket_$i"];

    $query_perincian = "INSERT INTO perincian_donasi (id_donasi, perincian_donasi_$i, bentuk_donasi_$i, jumlah_rp_$i, jumlah_paket_$i) VALUES (?, ?, ?, ?, ?)";
    $stmt_perincian = $conn->prepare($query_perincian);
    $stmt_perincian->bind_param("isssi", $id_donasi, $perincian_donasi, $bentuk_donasi, $jumlah_rp, $jumlah_paket);
    $stmt_perincian->execute();
}

// Menyimpan bukti pembayaran jika ada
if (!empty($bukti_pembayaran)) {
    $upload_dir = "uploads/"; // Sesuaikan dengan direktori tempat menyimpan berkas
    $target_file = $upload_dir . basename($_FILES["bukti_pembayaran"]["name"]);
    move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file);
}

// Tutup koneksi ke database
$stmt_donasi->close();
$conn->close();

// Mengarahkan ke halaman kwitansi.php
header("Location: kwitansi.php");
exit();
?>
