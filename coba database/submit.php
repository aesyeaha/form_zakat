<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cobacoba";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$kelas = $_POST['kelas'];

// Menggunakan prepared statement untuk menghindari serangan SQL injection
$stmt = $conn->prepare("INSERT INTO form_data (nama, email, pesan, kelas) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $nama, $email, $pesan, $kelas);

// Menghindari serangan XSS
$nama = htmlspecialchars(strip_tags($nama, NULL));
$email = htmlspecialchars(strip_tags($email, NULL));
$kelas = (int)$kelas;

// Mengecek apakah variabel pesan kosong atau tidak
if (!empty($pesan)) {
    // Menghindari serangan XSS
    $pesan = htmlspecialchars(trim($pesan));
} else {
    echo "Pesan tidak boleh kosong.";
    exit();
}

// Menjalankan query dan memeriksa hasilnya
if ($stmt->execute()) {
    echo "Data berhasil disimpan.";
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}

// Menutup koneksi
$stmt->close();
$conn->close();
?>
