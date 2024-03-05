<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: dashboard_login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbaseziswaf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM donasi";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <style>
        .photo-credit {
            margin-top: 1rem;
            font-size: 0.8rem;
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
                <li class="nav-item">
                    <a class="nav-link" href="form_donasi.php">Form Donasi</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard_signup.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="form-inline ml-auto">
                <input class="form-control mr-sm-2" type="text" placeholder="Search...">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome to the Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Donatur</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Tanggal</th>
                    <th>Kelas ID</th>
                    <th>Gerai ID</th>
                    <th>Petugas Gerai ID</th>
                    <th>Perincian Donasi 1 ID</th>
                    <th>Bentuk Donasi 1</th>
                    <th>Jumlah RP 1</th>
                    <th>Jumlah Paket 1</th>
                    <th>Perincian Donasi 2 ID</th>
                    <th>Bentuk Donasi 2</th>
                    <th>Jumlah RP 2</th>
                    <th>Jumlah Paket 2</th>
                    <th>Perincian Donasi 3 ID</th>
                    <th>Bentuk Donasi 3</th>
                    <th>Jumlah RP 3</th>
                    <th>Jumlah Paket 3</th>
                    <th>Perincian Donasi 4 ID</th>
                    <th>Bentuk Donasi 4</th>
                    <th>Jumlah RP 4</th>
                    <th>Jumlah Paket 4</th>
                    <th>Perincian Donasi 5 ID</th>
                    <th>Bentuk Donasi 5</th>
                    <th>Jumlah RP 5</th>
                    <th>Jumlah Paket 5</th>
                    <th>Cara Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                    <th>Total RP</th>
                    <th>Total Paket</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama_donatur'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['no_hp'] . "</td>";
                        echo "<td>" . date('d-m-Y H:i:s', strtotime($row['tanggal'])) . "</td>";
                        echo "<td>" . $row['kelas_id'] . "</td>";
                        echo "<td>" . $row['gerai_id'] . "</td>";
                        echo "<td>" . $row['petugas_gerai_id'] . "</td>";
                        echo "<td>" . $row['perincian_donasi_1_id'] . "</td>";
                        echo "<td>" . $row['bentuk_donasi_1'] . "</td>";
                        echo "<td>" . $row['jumlah_rp_1'] . "</td>";
                        echo "<td>" . $row['jumlah_paket_1'] . "</td>";
                        echo "<td>" . $row['perincian_donasi_2_id'] . "</td>";
                        echo "<td>" . $row['bentuk_donasi_2'] . "</td>";
                        echo "<td>" . $row['jumlah_rp_2'] . "</td>";
                        echo "<td>" . $row['jumlah_paket_2'] . "</td>";
                        echo "<td>" . $row['perincian_donasi_3_id'] . "</td>";
                        echo "<td>" . $row['bentuk_donasi_3'] . "</td>";
                        echo "<td>" . $row['jumlah_rp_3'] . "</td>";
                        echo "<td>" . $row['jumlah_paket_3'] . "</td>";
                        echo "<td>" . $row['perincian_donasi_4_id'] . "</td>";
                        echo "<td>" . $row['bentuk_donasi_4'] . "</td>";
                        echo "<td>" . $row['jumlah_rp_4'] . "</td>";
                        echo "<td>" . $row['jumlah_paket_4'] . "</td>";
                        echo "<td>" . $row['perincian_donasi_5_id'] . "</td>";
                        echo "<td>" . $row['bentuk_donasi_5'] . "</td>";
                        echo "<td>" . $row['jumlah_rp_5'] . "</td>";
                        echo "<td>" . $row['jumlah_paket_5'] . "</td>";
                        echo "<td>" . $row['cara_pembayaran'] . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['bukti_pembayaran']) . "' alt='Bukti Pembayaran' width='200'></td>";
                        echo "<td>" . $row['total_rp'] . "</td>";
                        echo "<td>" . $row['total_paket'] . "</td>";
                        echo "<td>" . $row['keterangan'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='30'>No data found</td></tr>";
                }
                ?>
            </tbody>

        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>