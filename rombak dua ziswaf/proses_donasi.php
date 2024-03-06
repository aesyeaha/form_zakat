<?php
// Memulai sesi
session_start();

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menghubungkan ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbaseziswaf";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mendapatkan data dari form
    $nama_donatur = $_POST["nama_donatur"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $tanggal = date("Y-m-d H:i:s");
    $kelas_id = $_POST["kelas"];
    $gerai_id = $_POST["gerai"];
    $petugas_gerai_id = $_POST["petugas_gerai"];
    $shift_petugas = $_POST["shift_petugas"];

    $perincian_donasi_1_id = $_POST["perincian_donasi"];
    $bentuk_donasi_1 = $_POST["bentuk_donasi"];
    $jumlah_rp_1 = $_POST["jumlah_rp"];
    $jumlah_paket_1 = $_POST["jumlah_paket"];

    $perincian_donasi_2_id = isset($_POST["perincian_donasi2"]) ? $_POST["perincian_donasi2"] : null;
    $bentuk_donasi_2 = isset($_POST["bentuk_donasi2"]) ? $_POST["bentuk_donasi2"] : null;
    $jumlah_rp_2 = isset($_POST["jumlah_rp2"]) ? $_POST["jumlah_rp2"] : null;
    $jumlah_paket_2 = isset($_POST["jumlah_paket2"]) ? $_POST["jumlah_paket2"] : null;

    $perincian_donasi_3_id = isset($_POST["perincian_donasi3"]) ? $_POST["perincian_donasi3"] : null;
    $bentuk_donasi_3 = isset($_POST["bentuk_donasi3"]) ? $_POST["bentuk_donasi3"] : null;
    $jumlah_rp_3 = isset($_POST["jumlah_rp3"]) ? $_POST["jumlah_rp3"] : null;
    $jumlah_paket_3 = isset($_POST["jumlah_paket3"]) ? $_POST["jumlah_paket3"] : null;

    $perincian_donasi_4_id = isset($_POST["perincian_donasi4"]) ? $_POST["perincian_donasi4"] : null;
    $bentuk_donasi_4 = isset($_POST["bentuk_donasi4"]) ? $_POST["bentuk_donasi4"] : null;
    $jumlah_rp_4 = isset($_POST["jumlah_rp4"]) ? $_POST["jumlah_rp4"] : null;
    $jumlah_paket_4 = isset($_POST["jumlah_paket4"]) ? $_POST["jumlah_paket4"] : null;

    $perincian_donasi_5_id = isset($_POST["perincian_donasi5"]) ? $_POST["perincian_donasi5"] : null;
    $bentuk_donasi_5 = isset($_POST["bentuk_donasi5"]) ? $_POST["bentuk_donasi5"] : null;
    $jumlah_rp_5 = isset($_POST["jumlah_rp5"]) ? $_POST["jumlah_rp5"] : null;
    $jumlah_paket_5 = isset($_POST["jumlah_paket5"]) ? $_POST["jumlah_paket5"] : null;

    $cara_pembayaran = $_POST["cara_pembayaran"];
    $bukti_pembayaran = isset($_FILES["bukti_pembayaran"]) ? $_FILES["bukti_pembayaran"] : null;

    // Total values
    $total_rp = isset($_POST["total_rp"]) ? $_POST["total_rp"] : 0;
    $total_paket = isset($_POST["total_paket"]) ? $_POST["total_paket"] : 0;

$keterangan = $_POST["keterangan"];

    // Save donation data to the database
    $sql = "INSERT INTO donasi (
        nama_donatur, alamat, no_hp, tanggal, kelas_id, gerai_id, petugas_gerai_id,
        perincian_donasi_1_id, bentuk_donasi_1, jumlah_rp_1, jumlah_paket_1,
        perincian_donasi_2_id, bentuk_donasi_2, jumlah_rp_2, jumlah_paket_2,
        perincian_donasi_3_id, bentuk_donasi_3, jumlah_rp_3, jumlah_paket_3,
        perincian_donasi_4_id, bentuk_donasi_4, jumlah_rp_4, jumlah_paket_4,
        perincian_donasi_5_id, bentuk_donasi_5, jumlah_rp_5, jumlah_paket_5,
        cara_pembayaran, bukti_pembayaran, total_rp, total_paket, keterangan
    ) VALUES (
        '$nama_donatur', '$alamat', '$no_hp', '$tanggal', '$kelas_id', '$gerai_id', '$petugas_gerai_id',
        '$perincian_donasi_1_id', '$bentuk_donasi_1', '$jumlah_rp_1', '$jumlah_paket_1',
        '$perincian_donasi_2_id', '$bentuk_donasi_2', '$jumlah_rp_2', '$jumlah_paket_2',
        '$perincian_donasi_3_id', '$bentuk_donasi_3', '$jumlah_rp_3', '$jumlah_paket_3',
        '$perincian_donasi_4_id', '$bentuk_donasi_4', '$jumlah_rp_4', '$jumlah_paket_4',
        '$perincian_donasi_5_id', '$bentuk_donasi_5', '$jumlah_rp_5', '$jumlah_paket_5',
        '$cara_pembayaran', '$bukti_pembayaran', '$total_rp', '$total_paket', '$keterangan'
    )";

if ($conn->query($sql) === TRUE) {
    $lastInsertedId = $conn->insert_id;
    header("Location: kwitansi.php?id=" . $lastInsertedId);
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
