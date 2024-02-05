<?php
include 'db_connection.php';

// Mendapatkan ID donasi dari URL
$id_donasi = isset($_GET['id_donasi']) ? $_GET['id_donasi'] : null;

if (!$id_donasi) {
    echo "Invalid request.";
    exit();
}

// Query untuk mendapatkan data donasi berdasarkan ID
$query_donasi = "SELECT * FROM donasi_data WHERE id_donasi = ?";
$stmt_donasi = $conn->prepare($query_donasi);
$stmt_donasi->bind_param("i", $id_donasi);
$stmt_donasi->execute();
$result_donasi = $stmt_donasi->get_result();

if ($result_donasi->num_rows === 0) {
    echo "Donation not found.";
    exit();
}

$row_donasi = $result_donasi->fetch_assoc();

// Query untuk mendapatkan data perincian donasi berdasarkan ID donasi
$query_perincian = "SELECT * FROM perincian_donasi WHERE id_donasi = ?";
$stmt_perincian = $conn->prepare($query_perincian);
$stmt_perincian->bind_param("i", $id_donasi);
$stmt_perincian->execute();
$result_perincian = $stmt_perincian->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Donasi</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
    <div id="toggle-btn">&#9776;</div>
    <img src="./image/logo.png" alt="Beranda" id="brand-logo">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </nav>

    <div class="container">
        <h1>Kwitansi Donasi</h1>
        <div>
            <h2>Informasi Donatur</h2>
            <p>ID Donatur: <?php echo $row_donasi['id_donatur']; ?></p>
            <p>Nama Donatur: <?php echo $row_donasi['nama_donatur']; ?></p>
            <p>Alamat: <?php echo $row_donasi['alamat']; ?></p>
            <p>Nomor Handphone: <?php echo $row_donasi['nomor_hp']; ?></p>
        </div>

        <div>
            <h2>Informasi Donasi</h2>
            <p>Gerai: <?php echo $row_donasi['id_gerai']; ?></p>
            <p>Petugas Gerai: <?php echo $row_donasi['id_petugas_gerai']; ?></p>
            <p>Cara Pembayaran: <?php echo $row_donasi['cara_pembayaran']; ?></p>
            <p>Total Jumlah (Rp): <?php echo $row_donasi['total_rp']; ?></p>
            <p>Total Jumlah Paket: <?php echo $row_donasi['total_paket']; ?></p>
            <p>Keterangan: <?php echo $row_donasi['keterangan']; ?></p>
        </div>

        <div>
            <h2>Perincian Donasi</h2>
            <?php
            for ($i = 1; $i <= 6; $i++) {
                $row_perincian = $result_perincian->fetch_assoc();
                if (!$row_perincian) {
                    echo "<p>Donasi $i: Kosong</p>";
                } else {
                    echo "<p>Donasi $i</p>";
                    echo "<p>Perincian Donasi: " . $row_perincian['perincian_donasi'] . "</p>";
                    echo "<p>Bentuk Donasi: " . $row_perincian['bentuk_donasi'] . "</p>";
                    echo "<p>Jumlah (Rp): " . $row_perincian['jumlah_rp'] . "</p>";
                    echo "<p>Jumlah Paket: " . $row_perincian['jumlah_paket'] . "</p>";
                    echo "<hr>";
                }
            }
            ?>
        </div>
    </div>

    <div class="sidebar">
        <div id="close-btn">&times;</div>
        <img src="./image/logo.png" alt="Ziswaf 1445H" id="sidebar-logo">
        <div class="sidebar-links">
            <a href="index.php">Beranda</a>
            <a href="form_donasi.php">Form Donasi</a>
        </div>
        <div class="sidebar-buttons">
            <button id="share-btn">Share</button>
            <button id="about-btn">About</button>
        </div>
    </div>

    <script>
    const toggleBtn = document.getElementById('toggle-btn');
    const closeBtn = document.getElementById('close-btn');
    const sidebar = document.querySelector('.sidebar');

    toggleBtn.addEventListener('click', () => {
        sidebar.style.left = '0px';
    });

    closeBtn.addEventListener('click', () => {
        sidebar.style.left = '-250px';
    });
    </script>

</body>
</html>

<?php
// Tutup koneksi ke database
$stmt_donasi->close();
$stmt_perincian->close();

$conn->close();
header("Location: index.php");
exit();
?>