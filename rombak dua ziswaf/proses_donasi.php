<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbaseziswaf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk membersihkan input dari potensi serangan XSS
function clean_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Mendapatkan data dari form
$nama_donatur = clean_input($_POST['nama_donatur']);
$alamat = clean_input($_POST['alamat']);
$no_hp = clean_input($_POST['no_hp']);
$kelas_id = (int) clean_input($_POST['kelas']);
$gerai_id = (int) clean_input($_POST['gerai']);
$petugas_gerai_id = (int) clean_input($_POST['petugas_gerai']);
$perincian_donasi_1_id = (int) clean_input($_POST['perincian_donasi']);
$bentuk_donasi_1 = clean_input($_POST['bentuk_donasi']);
$jumlah_rp_1 = (int) clean_input($_POST['jumlah_rp']);
$jumlah_paket_1 = (int) clean_input($_POST['jumlah_paket']);
$perincian_donasi_2_id = (int) clean_input($_POST['perincian_donasi2']);
$bentuk_donasi_2 = clean_input($_POST['bentuk_donasi2']);
$jumlah_rp_2 = (int) clean_input($_POST['jumlah_rp2']);
$jumlah_paket_2 = (int) clean_input($_POST['jumlah_paket2']);
$perincian_donasi_3_id = (int) clean_input($_POST['perincian_donasi3']);
$bentuk_donasi_3 = clean_input($_POST['bentuk_donasi3']);
$jumlah_rp_3 = (int) clean_input($_POST['jumlah_rp3']);
$jumlah_paket_3 = (int) clean_input($_POST['jumlah_paket3']);
$perincian_donasi_4_id = (int) clean_input($_POST['perincian_donasi4']);
$bentuk_donasi_4 = clean_input($_POST['bentuk_donasi4']);
$jumlah_rp_4 = (int) clean_input($_POST['jumlah_rp4']);
$jumlah_paket_4 = (int) clean_input($_POST['jumlah_paket4']);
$perincian_donasi_5_id = (int) clean_input($_POST['perincian_donasi5']);
$bentuk_donasi_5 = clean_input($_POST['bentuk_donasi5']);
$jumlah_rp_5 = (int) clean_input($_POST['jumlah_rp5']);
$jumlah_paket_5 = (int) clean_input($_POST['jumlah_paket5']);

// Mendapatkan tanggal saat ini
$tanggal = date("Y-m-d H:i:s");

// Validasi input
if (empty($nama_donatur) || empty($alamat) || empty($no_hp) || empty($kelas_id) || empty($gerai_id) || empty($petugas_gerai_id)) {
    echo "Semua field wajib diisi.";
    exit;
}

// Query untuk menyimpan data ke dalam database
$query = "INSERT INTO donasi (nama_donatur, alamat, no_hp, tanggal, kelas_id, gerai_id, petugas_gerai_id, 
            perincian_donasi_1_id, bentuk_donasi_1, jumlah_rp_1, jumlah_paket_1, 
            perincian_donasi_2_id, bentuk_donasi_2, jumlah_rp_2, jumlah_paket_2, 
            perincian_donasi_3_id, bentuk_donasi_3, jumlah_rp_3, jumlah_paket_3, 
            perincian_donasi_4_id, bentuk_donasi_4, jumlah_rp_4, jumlah_paket_4, 
            perincian_donasi_5_id, bentuk_donasi_5, jumlah_rp_5, jumlah_paket_5) 
          VALUES ('$nama_donatur', '$alamat', '$no_hp', '$tanggal', $kelas_id, $gerai_id, $petugas_gerai_id, 
                  $perincian_donasi_1_id, '$bentuk_donasi_1', $jumlah_rp_1, $jumlah_paket_1, 
                  $perincian_donasi_2_id, '$bentuk_donasi_2', $jumlah_rp_2, $jumlah_paket_2, 
                  $perincian_donasi_3_id, '$bentuk_donasi_3', $jumlah_rp_3, $jumlah_paket_3, 
                  $perincian_donasi_4_id, '$bentuk_donasi_4', $jumlah_rp_4, $jumlah_paket_4, 
                  $perincian_donasi_5_id, '$bentuk_donasi_5', $jumlah_rp_5, $jumlah_paket_5)";

if ($conn->query($query) === TRUE) {
    // Mengarahkan user ke halaman kwitansi
    header('Location: kwitansi.php?id=' . $conn->insert_id);
    exit;
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>