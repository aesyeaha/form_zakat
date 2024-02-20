<?php
session_start();

// Mengatur zona waktu ke Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbaseziswaf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil id donasi dari URL
$id = isset($_GET['id']) ? $_GET['id'] : die('ID donasi tidak ditemukan');

// Mengambil data donasi berdasarkan id
$sql = "SELECT * FROM donasi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$donasi = $result->fetch_assoc();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Donasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background-color: lightblue; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Ziswaf</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="form_donasi.php">Form Donasi <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="form-inline ml-auto">
                <input class="form-control mr-sm-2" type="text" placeholder="Search...">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <!-- Displaying Kwitansi Donasi -->
        <h1>Kwitansi Donasi</h1>
        <p>Terima kasih atas donasi Anda, <?= htmlspecialchars($donasi['nama_donatur']) ?>. Berikut adalah detail donasi Anda:</p>
        <ul>
            <li>Nama Donatur: <?= htmlspecialchars($donasi['nama_donatur']) ?></li>
            <li>Alamat: <?= htmlspecialchars($donasi['alamat']) ?></li>
            <li>No. HP: <?= htmlspecialchars($donasi['no_hp']) ?></li>
            <li>Tanggal: <?= htmlspecialchars($donasi['tanggal']) ?></li>
            <li>Kelas: <?= htmlspecialchars($donasi['kelas_id']) ?></li>
            <li>Gerai: <?= htmlspecialchars($donasi['gerai_id']) ?></li>
            <li>Petugas Gerai: <?= htmlspecialchars($donasi['petugas_gerai_id']) ?></li>
        </ul>
    </div>

    <footer class="bg-gray-800 text-white p-8">
        <h5 class="text-2xl font-bold mb-4">Hubungi Kami</h5>
        <address class="mb-4">
            <strong class="block">Yayasan Permata Mojokerto</strong>
            Jl. Raya Pondok Gede No. 123<br>
            Pondok Gede, Bekasi<br>
            Jawa Barat 17411<br>
            <abbr title="Phone" class="text-gray-400">Phone:</abbr> (021) 1234567<br>
            <abbr title="Email" class="text-gray-400">Email:</abbr> <a href="mailto:info@al-ikhlaszakat.org" class="text-blue-500 hover:underline">info@al-ikhlaszakat.org</a>
        </address>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

    