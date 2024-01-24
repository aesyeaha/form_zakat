<?php
session_start();

// Membuat koneksi ke database MySQL menggunakan MySQLi
$conn = new mysqli("localhost", "root", "", "zakat_ramadhan");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa metode permintaan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Memproses pengiriman formulir
    try {
        // Validasi dan membersihkan input pengguna
        $gerai = filter_input(INPUT_POST, 'gerai', FILTER_SANITIZE_STRING);
        $petugas_gerai = filter_input(INPUT_POST, 'petugas_gerai', FILTER_SANITIZE_STRING);
        $nama_donatur = filter_input(INPUT_POST, 'nama_donatur', FILTER_SANITIZE_STRING);
        $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
        $nomor_hp = filter_input(INPUT_POST, 'nomor_hp', FILTER_SANITIZE_STRING);
        $perincian_donasi = filter_input(INPUT_POST, 'perincian_donasi', FILTER_SANITIZE_STRING);
        $bentuk_donasi = filter_input(INPUT_POST, 'bentuk_donasi', FILTER_SANITIZE_STRING);
        $keterangan = filter_input(INPUT_POST, 'keterangan', FILTER_SANITIZE_STRING);

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
            throw new Exception("Error: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Menangani pengecualian, redirect ke halaman kesalahan, atau menampilkan pesan kesalahan yang ramah pengguna
        echo "Error: " . $e->getMessage();
    }

    // Menutup pernyataan
    $stmt->close();
}

// Menutup koneksi database
$conn->close();
?>
