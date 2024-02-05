<?php
include 'db_connection.php';

// Mendapatkan data dari formulir
$id_donatur = mysqli_real_escape_string($conn, $_POST['id_donatur']);
$id_gerai = mysqli_real_escape_string($conn, $_POST['gerai']);
$id_petugas_gerai = mysqli_real_escape_string($conn, $_POST['petugas_gerai']);
$nama_donatur = htmlspecialchars($_POST['nama_donatur']);
$alamat = htmlspecialchars($_POST['alamat']);
$nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
$cara_pembayaran = mysqli_real_escape_string($conn, $_POST['cara_pembayaran']);
$bukti_pembayaran = isset($_FILES['bukti_pembayaran']) ? file_get_contents($_FILES['bukti_pembayaran']['tmp_name']) : null;
$nama_file_gambar = isset($_FILES['bukti_pembayaran']) ? $_FILES['bukti_pembayaran']['name'] : null;
$keterangan = htmlspecialchars($_POST['keterangan']);
$total_rp = mysqli_real_escape_string($conn, $_POST['totalRp']);
$total_paket = mysqli_real_escape_string($conn, $_POST['totalPaket']);
$donasiCount = mysqli_real_escape_string($conn, $_POST['donasiCount']);

// Menyimpan data donasi ke dalam tabel donasi_data
$query_donasi = "INSERT INTO donasi_data (id_donatur, id_gerai, id_petugas_gerai, nama_donatur, alamat, nomor_hp, cara_pembayaran, bukti_pembayaran, nama_file_gambar, keterangan, total_rp, total_paket) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt_donasi = $conn->prepare($query_donasi);
$stmt_donasi->bind_param("iiisssssssis", $id_donatur, $id_gerai, $id_petugas_gerai, $nama_donatur, $alamat, $nomor_hp, $cara_pembayaran, $bukti_pembayaran, $nama_file_gambar, $keterangan, $total_rp, $total_paket);
$stmt_donasi->execute();

// Mendapatkan ID donasi yang baru saja dibuat
$id_donasi = $stmt_donasi->insert_id;

// Menyimpan data perincian donasi ke dalam tabel perincian_donasi
for ($i = 1; $i <= $donasiCount; $i++) {
    $perincian_donasi = isset($_POST["perincian_donasi_$i"]) ? $_POST["perincian_donasi_$i"] : null;
    $bentuk_donasi = isset($_POST["bentuk_donasi_$i"]) ? $_POST["bentuk_donasi_$i"] : null;
    $jumlah_rp = isset($_POST["jumlah_rp_$i"]) ? $_POST["jumlah_rp_$i"] : null;
    $jumlah_paket = isset($_POST["jumlah_paket_$i"]) ? $_POST["jumlah_paket_$i"] : null;

    // Lakukan penyimpanan ke database sesuai dengan struktur tabel perincian_donasi
    $query_perincian = "INSERT INTO perincian_donasi (id_donasi, perincian_donasi_$i, bentuk_donasi_$i, jumlah_rp_$i, jumlah_paket_$i) VALUES (?, ?, ?, ?, ?)";
    $stmt_perincian = $conn->prepare($query_perincian);
    $stmt_perincian->bind_param("isssi", $id_donasi, $perincian_donasi, $bentuk_donasi, $jumlah_rp, $jumlah_paket);
    $stmt_perincian->execute();
}

// Tutup koneksi ke database
$stmt_donasi->close();
$conn->close();

// Dapatkan ID donasi yang baru saja dibuat
$id_donasi = $stmt_donasi->insert_id;

// Mengarahkan ke halaman kwitansi.php dengan menyertakan ID donasi
header("Location: kwitansi.php?id_donasi=$id_donasi");
exit();