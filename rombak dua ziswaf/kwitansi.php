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

// Add default values for missing perincian_donasi_5 index
if (!isset($donasi["perincian_donasi_5_id"])) {
    $donasi["perincian_donasi_5_id"] = 0;
    $donasi["bentuk_donasi_5"] = "";
    $donasi["jumlah_rp_5"] = 0;
    $donasi["jumlah_paket_5"] = 0;
}

// Define perincianDonasi array with all perincian donasi
$perincianDonasi = [
    [
        'id' => htmlspecialchars($donasi["perincian_donasi_1_id"]),
        'bentuk_donasi' => htmlspecialchars($donasi["bentuk_donasi_1"]),
        'jumlah_rp' => htmlspecialchars($donasi["jumlah_rp_1"]),
        'jumlah_paket' => htmlspecialchars($donasi["jumlah_paket_1"])
    ],
    [
        'id' => htmlspecialchars($donasi["perincian_donasi_2_id"]),
        'bentuk_donasi' => htmlspecialchars($donasi["bentuk_donasi_2"]),
        'jumlah_rp' => htmlspecialchars($donasi["jumlah_rp_2"]),
        'jumlah_paket' => htmlspecialchars($donasi["jumlah_paket_2"])
    ],
    [
        'id' => htmlspecialchars($donasi["perincian_donasi_3_id"]),
        'bentuk_donasi' => htmlspecialchars($donasi["bentuk_donasi_3"]),
        'jumlah_rp' => htmlspecialchars($donasi["jumlah_rp_3"]),
        'jumlah_paket' => htmlspecialchars($donasi["jumlah_paket_3"])
    ],
    [
        'id' => htmlspecialchars($donasi["perincian_donasi_4_id"]),
        'bentuk_donasi' => htmlspecialchars($donasi["bentuk_donasi_4"]),
        'jumlah_rp' => htmlspecialchars($donasi["jumlah_rp_4"]),
        'jumlah_paket' => htmlspecialchars($donasi["jumlah_paket_4"])
    ],
    [
        'id' => htmlspecialchars($donasi["perincian_donasi_5_id"]),
        'bentuk_donasi' => htmlspecialchars($donasi["bentuk_donasi_5"]),
        'jumlah_rp' => htmlspecialchars($donasi["jumlah_rp_5"]),
        'jumlah_paket' => htmlspecialchars($donasi["jumlah_paket_5"])
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Donasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <style>
        .navbar-custom {
            background-color: lightblue; 
        }
        
        footer {
            bottom: 0; width: 100%; 
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
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
                <a class="nav-link" href="dashboard_signup.php">Dashboard</a>
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

        <h2>Rincian Donasi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Perincian Donasi</th>
                    <th>Bentuk Donasi</th>
                    <th>Jumlah (Rp)</th>
                    <th>Jumlah (Paket)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalRp = 0;
                $totalPaket = 0;
                    // Mengambil data perincian donasi
                    $perincianDonasi = [];
                    for ($i = 1; $i <= 5; $i++) {
                        $perincianDonasiId = "perincian_donasi_$i";
                        $perincianDonasi[$i] = [
                            'id' => htmlspecialchars($donasi["{$perincianDonasiId}_id"]),
                            'bentuk_donasi' => htmlspecialchars($donasi["bentuk_donasi_$i"]),
                            'jumlah_rp' => htmlspecialchars($donasi["jumlah_rp_$i"]),
                            'jumlah_paket' => htmlspecialchars($donasi["jumlah_paket_$i"])
                        ];
                    }

                    if ($$perincianDonasiId) {
                        $totalRp += $jumlahRp;
                        $totalPaket += $jumlahPaket;
                    }

                    ?>
                
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= htmlspecialchars($donasi["$perincianDonasiId"]) ?></td>
                            <td><?= $bentukDonasi ?></td>
                            <td><?= $jumlahRp ?></td>
                            <td><?= $jumlahPaket ?></td>
                        </tr>
               
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th><?= htmlspecialchars($totalPaket) ?></th>
                    <th><?= htmlspecialchars($totalRp) ?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        <h2>Metode Pembayaran</h2>
        <p>Cara Pembayaran: <?= htmlspecialchars($donasi['cara_pembayaran']) ?></p>
        <?php if ($donasi['cara_pembayaran'] == 'transfer') : ?>
            <p>Bukti Pembayaran: <img src="bukti_pembayaran/<?= htmlspecialchars($donasi['bukti_pembayaran']) ?>" alt="Bukti Pembayaran" class="img-fluid"></p>
        <?php endif; ?>
    </div>
    <a href="print_pdf.php" class="btn btn-secondary">Print ke PDF</a>

    <footer class="bg-gray-800 text-white p-8">
        <h5 class="text-2xl font-bold mb-4">Hubungi Kami</h5>
        <address class="mb-4">
            <strong class="block">Yayasan Permata Mojokerto</strong>
            Jl. Tropodo No 847 A, Kelurahan Meri, <br>
            Kecamatan Magersari, Kota Mojokerto, <br>
            Provinsi Jawa Timur, 61315 <br>
            <abbr title="Phone" class="text-gray-400">Phone:</abbr> (021) 1234567<br>
            <abbr title="Email" class="text-gray-400">Email:</abbr> <a href="mailto:info@yayasanpermatamojokerto.org" class="text-blue-500 hover:underline">info@yayasanpermatamojokerto.org</a>
        </address>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>