<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Memastikan formulir disubmit dari halaman yang diizinkan
// if (!isset($_POST['id_donasi']) || !isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'form_donasi.php') === false) {
//     die('Acces Denied');
// }

require_once 'db_connection.php';

// Ambil data dari formulir
$id_donatur = $_POST['id_donatur'];
$id_gerai = $_POST['gerai'];
$id_petugas_gerai = $_POST['petugas_gerai'];
$nama_donatur = $_POST['nama_donatur'];
$alamat = $_POST['alamat'];
$nomor_hp = $_POST['nomor_hp'];
$perincian_donasi = $_POST['perincian_donasi'];
$bentuk_donasi = $_POST['bentuk_donasi'];
$jumlah_rp = isset($_POST['jumlah_rp'][$i]) ? $_POST['jumlah_rp'][$i] : 0;
$jumlah_paket = isset($_POST['jumlah_paket'][$i]) ? $_POST['jumlah_paket'][$i] : 0;
$cara_pembayaran = $_POST['cara_pembayaran'];
$bukti_pembayaran = isset($_FILES['bukti_pembayaran']) ? $_FILES['bukti_pembayaran'] : null;
$keterangan = $_POST['keterangan'];
$donasiCount = intval($_POST['donasiCount']);
$totalRp = isset($_POST['totalRp']) ? $_POST['totalRp'] : 0;
$totalPaket = isset($_POST['totalPaket']) ? $_POST['totalPaket'] : 0;

// Simpan data donasi
$conn->begin_transaction();
try {
    // Ambil ID donasi terakhir
    $query_last_donasi = "SELECT id_donasi FROM donasi ORDER BY id_donasi DESC LIMIT 1";
    $result_last_donasi = $conn->query($query_last_donasi);
    $row_last_donasi = $result_last_donasi->fetch_assoc();
    $id_donasi = $row_last_donasi['id_donasi'] + 1;

    // Simpan data donasi
    $jumlah_rp_decimal = array();
    for ($i = 0; $i < $donasiCount; $i++) {
        $jumlah_rp_decimal[$i] = floatval($jumlah_rp[$i]);
    }
    $stmt_insert_donasi->bind_param("ississssssssssssddddddd", $id_donasi, $id_donatur, $id_gerai, $id_petugas_gerai, $nama_donatur, $alamat, $nomor_hp, $perincian_donasi[$i], $bentuk_donasi[$i], $jumlah_rp_decimal[$i], $jumlah_paket[$i], $cara_pembayaran, $bukti_pembayaran, $keterangan, $total_jumlah_rp, $total_jumlah_paket);
    $stmt_insert_donasi->send_long_data(11, $bukti_pembayaran);
    $stmt_insert_donasi->execute(); 

    // Update total jumlah donasi 
    $query_update_total_donasi = "UPDATE donasi SET total_jumlah_rp = ?, total_jumlah_paket = ? WHERE id_donasi = ?"; $stmt_update_total_donasi = $conn->prepare($query_update_total_donasi); $stmt_update_total_donasi->bind_param("dii", $totalRp, $totalPaket, $id_donasi); $stmt_update_total_donasi->execute();
        
    $conn->commit();
        
    // Redirect ke halaman kwitansi.php 
    header('Location: kwitansi.php?id_donasi=' . $id_donasi); exit;
        
} 
catch (\Exception $e) { echo 'Terjadi kesalahan: ' . $e->getMessage(); $conn->rollback(); }
        
$conn->close(); ?>