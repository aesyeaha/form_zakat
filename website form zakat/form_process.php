<?php
// Membuat koneksi ke database MySQL menggunakan MySQLi
$conn = new mysqli("localhost", "root", "", "zakat_ramadhan");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa metode permintaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memproses pengiriman formulir
    if (isset($_POST['submit'])) {
        // Mendapatkan data formulir
        $gerai = $_POST['gerai'];
        $petugas_gerai = $_POST['petugas_gerai'];
        $nama_donatur = $_POST['nama_donatur'];
        $alamat = $_POST['alamat'];
        $nomor_hp = $_POST['nomor_hp'];
        $perincian_donasi = $_POST['perincian_donasi'];
        $bentuk_donasi = $_POST['bentuk_donasi'];
        $keterangan = $_POST['keterangan'];

        // Memasukkan data ke dalam database
        $sql = "INSERT INTO donasi (gerai, petugas_gerai, nama_donatur, alamat, nomor_hp, perincian_donasi, bentuk_donasi, keterangan)
                VALUES ('$gerai', '$petugas_gerai', '$nama_donatur', '$alamat', '$nomor_hp', '$perincian_donasi', '$bentuk_donasi', '$keterangan')";

        // Cetak query untuk debugging
        echo "Query: $sql<br>";

        if ($conn->query($sql) === TRUE) {
            // Pesan berhasil
            echo "<script>alert('Formulir telah berhasil disimpan!');</script>";
            // Redirect ke halaman kwitansi
            header("Location: kwitansi.php");
            exit();
        } else {
            // Pesan kesalahan
            echo "Error: " . $conn->error;
        }
    }
}

// Menutup koneksi database
$conn->close();
?>
