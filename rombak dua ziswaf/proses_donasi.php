<?php
session_start();

// Mengatur zona waktu ke Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbaseziswaf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir
$nama_donatur = $_POST['nama_donatur'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$kelas = $_POST['kelas'];
$gerai = $_POST['gerai']; 
$petugas_gerai = $_POST['petugas_gerai'];

// Menghindari serangan XSS
$nama_donatur = htmlspecialchars(strip_tags($nama_donatur, NULL));
$alamat = htmlspecialchars(strip_tags($alamat, NULL));
$no_hp = htmlspecialchars(strip_tags($no_hp, NULL));
$kelas = htmlspecialchars(strip_tags($kelas, NULL));
$gerai = htmlspecialchars(strip_tags($gerai, NULL));
$petugas_gerai = htmlspecialchars(strip_tags($petugas_gerai, NULL));

// Menyimpan data donasi ke database
$sql = "INSERT INTO donasi (nama_donatur, alamat, no_hp, tanggal, kelas_id, gerai_id, petugas_gerai_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Gagal menyiapkan pernyataan: " . $conn->error);
}

$stmt->bind_param("ssssiii", $nama_donatur, $alamat, $no_hp, date('Y-m-d H:i:s'), $kelas, $gerai, $petugas_gerai);

if ($stmt->execute()) {
    // Mengarahkan user ke halaman kwitansi
    header('Location: kwitansi.php?id=' . $conn->insert_id);
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
