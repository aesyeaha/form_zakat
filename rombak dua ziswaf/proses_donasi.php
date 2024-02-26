<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbaseziswaf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$nama_donatur = $_POST['nama_donatur'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$tanggal = date('Y-m-d H:i:s'); // Get the current date and time
$kelas_id = $_POST['kelas'];
$gerai_id = $_POST['gerai'];
$petugas_gerai_id = $_POST['petugas_gerai'];

// Get the perincian donasi data
$perincian_donasi_1_id = $_POST['perincian_donasi_1'];
$bentuk_donasi_1 = $_POST['bentuk_donasi_1'];
$jumlah_rp_1 = $_POST['jumlah_rp_1'];
$jumlah_paket_1 = $_POST['jumlah_paket_1'];

// Initialize variables for the remaining perincian donasi data
$perincian_donasi_2_id = null;
$bentuk_donasi_2 = null;
$jumlah_rp_2 = null;
$jumlah_paket_2 = null;

$perincian_donasi_3_id = null;
$bentuk_donasi_3 = null;
$jumlah_rp_3 = null;
$jumlah_paket_3 = null;

$perincian_donasi_4_id = null;
$bentuk_donasi_4 = null;
$jumlah_rp_4 = null;
$jumlah_paket_4 = null;

$perincian_donasi_5_id = null;
$bentuk_donasi_5 = null;
$jumlah_rp_5 = null;
$jumlah_paket_5 = null;

// Check if there is a second perincian donasi
if (isset($_POST['perincian_donasi_2'])) {
    $perincian_donasi_2_id = $_POST['perincian_donasi_2'];
    $bentuk_donasi_2 = $_POST['bentuk_donasi_2'];
    $jumlah_rp_2 = $_POST['jumlah_rp_2'];
    $jumlah_paket_2 = $_POST['jumlah_paket_2'];
}
    // Check if there is a third perincian donasi
    if (isset($_POST['perincian_donasi3'])) {
        $perincian_donasi_3_id = $_POST['perincian_donasi_3'];
        $bentuk_donasi_3 = $_POST['bentuk_donasi_3'];
        $jumlah_rp_3 = $_POST['jumlah_rp_3'];
        $jumlah_paket_3 = $_POST['jumlah_paket_3'];
    }

        // Check if there is a fourth perincian donasi
        if (isset($_POST['perincian_donasi4'])) {
            $perincian_donasi_4_id = $_POST['perincian_donasi_4'];
            $bentuk_donasi_4 = $_POST['bentuk_donasi_4'];
            $jumlah_rp_4 = $_POST['jumlah_rp_4'];
            $jumlah_paket_4 = $_POST['jumlah_paket_4'];
        }

            // Check if there is a fifth perincian donasi
            if (isset($_POST['perincian_donasi5'])) {
                $perincian_donasi_5_id = $_POST['perincian_donasi_5'];
                $bentuk_donasi_5 = $_POST['bentuk_donasi_5'];
                $jumlah_rp_5 = $_POST['jumlah_rp_5'];
                $jumlah_paket_5 = $_POST['jumlah_paket_5'];
            }

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO donasi (nama_donatur, alamat, no_hp, tanggal, kelas_id, gerai_id, petugas_gerai_id, perincian_donasi_1_id, bentuk_donasi_1, jumlah_rp_1, jumlah_paket_1, perincian_donasi_2_id, bentuk_donasi_2, jumlah_rp_2, jumlah_paket_2, perincian_donasi_3_id, bentuk_donasi_3, jumlah_rp_3, jumlah_paket_3, perincian_donasi_4_id, bentuk_donasi_4, jumlah_rp_4, jumlah_paket_4, perincian_donasi_5_id, bentuk_donasi_5, jumlah_rp_5, jumlah_paket_5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("ssssiiiiiiiiiiiiiiiiii", $nama_donatur, $alamat, $no_hp, $tanggal, $kelas_id, $gerai_id, $petugas_gerai_id, $perincian_donasi_1_id, $bentuk_donasi_1, $jumlah_rp_1, $jumlah_paket_1, $perincian_donasi_2_id, $bentuk_donasi_2, $jumlah_rp_2, $jumlah_paket_2, $perincian_donasi_3_id, $bentuk_donasi_3, $jumlah_rp_3, $jumlah_paket_3, $perincian_donasi_4_id, $bentuk_donasi_4, $jumlah_rp_4, $jumlah_paket_4, $perincian_donasi_5_id, $bentuk_donasi_5, $jumlah_rp_5, $jumlah_paket_5);

// Execute the statement
$stmt->execute();

// Close the statement and the connection
$stmt->close();
$conn->close();

// Redirect the user to the kwitansi page
header("Location: kwitansi.php");
exit();