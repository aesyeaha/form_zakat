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

// Menghindari serangan XSS
$nama = htmlspecialchars($nama);
$email = htmlspecialchars($email);
$pesan = htmlspecialchars($pesan);

// Menggunakan prepared statement untuk menghindari serangan SQL injection
$stmt = $conn->prepare("INSERT INTO form_data (nama, email, pesan) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nama, $email, $pesan);

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
