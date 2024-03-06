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

$sql = "SELECT kelas.nama_kelas, gerai.nama_gerai, petugas_gerai.nama_petugas_gerai,
perincian_donasi_1.nama_perincian_donasi_1,
perincian_donasi_2.nama_perincian_donasi_2,
perincian_donasi_3.nama_perincian_donasi_3,
perincian_donasi_4.nama_perincian_donasi_4,
perincian_donasi_5.nama_perincian_donasi_5
FROM donasi
JOIN kelas ON donasi.kelas_id = kelas.id
JOIN gerai ON donasi.gerai_id = gerai.id
JOIN petugas_gerai ON donasi.petugas_gerai_id = petugas_gerai.id
LEFT JOIN perincian_donasi_1 ON donasi.perincian_donasi_1_id = perincian_donasi_1.id
LEFT JOIN perincian_donasi_2 ON donasi.perincian_donasi_2_id = perincian_donasi_2.id
LEFT JOIN perincian_donasi_3 ON donasi.perincian_donasi_3_id = perincian_donasi_3.id
LEFT JOIN perincian_donasi_4 ON donasi.perincian_donasi_4_id = perincian_donasi_4.id
LEFT JOIN perincian_donasi_5 ON donasi.perincian_donasi_5_id = perincian_donasi_5.id
WHERE donasi.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
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

        body {
            font-family: Arial, sans-serif;
        }
        .kwitansi {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .kwitansi h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .kwitansi p {
            margin-bottom: 10px;
        }
        .kwitansi table {
            width: 100%;
            border-collapse: collapse;
        }
        .kwitansi th,
        .kwitansi td {
            padding: 10px;
            border: 1px solid #ccc;
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
        <h1>KWITANSI</h1>
        <p>Terima kasih atas donasi Anda, <?= htmlspecialchars($donasi['nama_donatur']) ?>. Berikut adalah detail donasi Anda:</p>
        <p>No. Transaksi: <?php echo isset($donasi['id']) ? $donasi['id'] : ''; ?></p>
        <p>Tanggal: <?php echo isset($donasi['tanggal']) ? $donasi['tanggal'] : ''; ?></p>
        <p>Donatur:</p>
        <p>Nama Donatur: <?php echo isset($donasi['nama_donatur']) ? $donasi['nama_donatur'] : ''; ?></p>
        <p>Alamat: <?php echo isset($donasi['alamat']) ? $donasi['alamat'] : ''; ?></p>
        <p>No. HP: <?php echo isset($donasi['no_hp']) ? $donasi['no_hp'] : ''; ?></p>
        <p>Detail Donasi:</p>
        <table>
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Gerai</th>
                    <th>Petugas Gerai</th>
                    <th>Shift Petugas</th>
                    <th>Perincian Donasi</th>
                    <th>Bentuk Donasi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo isset($row['nama_kelas']) ? $row['nama_kelas'] : '';?></td>
                    <td><?php echo isset($row['nama_gerai']) ? $row['nama_gerai'] : '';?></td>
                    <td><?php echo isset($row['nama_petugas_gerai']) ? $row['nama_petugas_gerai'] : ''; ?></td>
                    <td><?php echo isset($donasi['shift_petugas']) ? $donasi['shift_petugas'] : ''; ?></td>
                    <td><?php echo isset($row['nama_perincian_donasi_1']) ? $row['nama_perincian_donasi_1'] : '';?></td>
                    <td><?php echo isset($donasi['bentuk_donasi_1']) ? $donasi['bentuk_donasi_1'] : ''; ?></td>
                    <td>
                        <?php
                            echo isset($donasi['jumlah_rp_1']) ? $donasi['jumlah_rp_1'] : '';
                            echo isset($donasi['jumlah_rp_1']) && isset($donasi['jumlah_paket_1']) ? '(' . $donasi['jumlah_paket_1'] . ' Paket)' : '';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">Donasi Kedua</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><?php echo isset($row['nama_perincian_donasi_2']) ? $row['nama_perincian_donasi_2'] : ''; ?></td>
                    <td><?php echo isset($donasi['bentuk_donasi_2']) ? $donasi['bentuk_donasi_2'] : ''; ?></td>
                    <td>
                        <?php
                            echo isset($donasi['jumlah_rp_2']) ? $donasi['jumlah_rp_2'] : '';
                            echo isset($donasi['jumlah_rp_2']) && isset($donasi['jumlah_paket_2']) ? '(' . $donasi['jumlah_paket_2'] . ' Paket)' : '';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">Donasi Ketiga</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><?php echo isset($row['nama_perincian_donasi_3']) ? $row['nama_perincian_donasi_3'] : '';  ?></td>
                    <td><?php echo isset($donasi['bentuk_donasi_3']) ? $donasi['bentuk_donasi_3'] : ''; ?></td>
                    <td>
                        <?php
                            echo isset($donasi['jumlah_rp_3']) ? $donasi['jumlah_rp_3'] : '';
                            echo isset($donasi['jumlah_rp_3']) && isset($donasi['jumlah_paket_3']) ? '(' . $donasi['jumlah_paket_3'] . ' Paket)' : '';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">Donasi Keempat</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><?php echo isset($row['nama_perincian_donasi_4']) ? $row['nama_perincian_donasi_4'] : ''; ?></td>
                    <td><?php echo isset($donasi['bentuk_donasi_4']) ? $donasi['bentuk_donasi_4'] : ''; ?></td>
                    <td>
                        <?php
                            echo isset($donasi['jumlah_rp_4']) ? $donasi['jumlah_rp_4'] : '';
                            echo isset($donasi['jumlah_rp_4']) && isset($donasi['jumlah_paket_4']) ? '(' . $donasi['jumlah_paket_4'] . ' Paket)' : '';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: center;">Donasi Kelima</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><?php echo isset($row['nama_perincian_donasi_5']) ? $row['nama_perincian_donasi_5'] : '';  ?></td>
                    <td><?php echo isset($donasi['bentuk_donasi_5']) ? $donasi['bentuk_donasi_5'] : ''; ?></td>
                    <td>
                        <?php
                            echo isset($donasi['jumlah_rp_5']) ? $donasi['jumlah_rp_5'] : '';
                            echo isset($donasi['jumlah_rp_5']) && isset($donasi['jumlah_paket_5']) ? '(' . $donasi['jumlah_paket_5'] . ' Paket)' : '';
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>Total Donasi:</p>
        <p>Rp. <?php echo isset($donasi['total_rp']) ? $donasi['total_rp'] : ''; ?></p>
        <p>Paket: <?php echo isset($donasi['total_paket']) ? $donasi['total_paket'] : ''; ?></p>
        <p>Cara Pembayaran: <?php echo isset($donasi['cara_pembayaran']) ? $donasi['cara_pembayaran'] : ''; ?></p>
        <p>Bukti Pembayaran: <img src="<?php echo isset($donasi['bukti_pembayaran']) ? $donasi['bukti_pembayaran'] : ''; ?>" alt="Bukti Pembayaran" style="max-width: 100%;"></p>
        <p>Keterangan: <?php echo isset($donasi['keterangan']) ? $donasi['keterangan'] : ''; ?></p>
        <p style="text-align: center;">Terima Kasih Telah Berdonasi Untuk Kami</p>
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