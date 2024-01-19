<?php
session_start();

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
        $gerai = htmlspecialchars($_POST['gerai']);
        $petugas_gerai = htmlspecialchars($_POST['petugas_gerai']);
        $nama_donatur = htmlspecialchars($_POST['nama_donatur']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
        $perincian_donasi = htmlspecialchars($_POST['perincian_donasi']);
        $bentuk_donasi = htmlspecialchars($_POST['bentuk_donasi']);
        $keterangan = htmlspecialchars($_POST['keterangan']);

        // Memasukkan data ke dalam database menggunakan prepared statement
        $sql = "INSERT INTO donasi (gerai, petugas_gerai, nama_donatur, alamat, nomor_hp, perincian_donasi, bentuk_donasi, keterangan)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Mempersiapkan pernyataan
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $gerai, $petugas_gerai, $nama_donatur, $alamat, $nomor_hp, $perincian_donasi, $bentuk_donasi, $keterangan);

        // Mengeksekusi pernyataan
        if ($stmt->execute()) {
            // Menyimpan data ke dalam sesi
            $_SESSION['form_data'] = [
                'gerai' => $gerai,
                'petugas_gerai' => $petugas_gerai,
                'nama_donatur' => $nama_donatur,
                'alamat' => $alamat,
                'nomor_hp' => $nomor_hp,
                'perincian_donasi' => $perincian_donasi,
                'bentuk_donasi' => $bentuk_donasi,
                'keterangan' => $keterangan
            ];

            // Memanggil fungsi JavaScript untuk menampilkan pemberitahuan
            echo '<script>showNotification("Formulir telah berhasil disimpan!");</script>';

            // Redirect ke halaman kwitansi
            header("Location: kwitansi.php");
            exit();
        } else {
            // Pesan kesalahan
            echo "Error: " . $stmt->error;
        }

        // Menutup pernyataan
        $stmt->close();
    }
}

// Menutup koneksi database
$conn->close();
?>