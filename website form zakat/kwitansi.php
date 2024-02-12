<?php
session_start();
include 'db_connection.php';

if (isset($_SESSION['id_donasi'])) {
    $donasi_id = $_SESSION['id_donasi'];

    // Ambil data donasi
    $sql = "SELECT * FROM donasi WHERE id_donasi = :donasi_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':donasi_id', $donasi_id);
    $stmt->execute();

    $result_donasi = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result_donasi) > 0) {
        $donasi_data = $result_donasi[0];

        // Ambil data perincian donasi
        $sql = "SELECT * FROM perincian_donasi WHERE id_donasi = :donasi_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':donasi_id', $donasi_id);
        $stmt->execute();

        $result_perincian_donasi = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Tampilkan kwitansi
        // Gunakan variabel $donasi_data dan $result_perincian_donasi untuk menampilkan data
    } else {
        header('Location: form_donasi.php');
    }
} else {
    header('Location: form_donasi.php');
}
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

    <h1>Kwitansi Donasi</h1>
    <table>
        <tr>
            <th>ID Donasi</th>
            <td><?php echo $donasi_data['id_donasi']; ?></td>
        </tr>
        <tr>
            <th>ID Donatur</th>
            <td><?php echo $donasi_data['id_donatur']; ?></td>
        </tr>
        <tr>
            <th>Nama Donatur</th>
            <td><?php echo $donasi_data['nama_donatur']; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $donasi_data['alamat']; ?></td>
        </tr>
        <tr>
            <th>No. HP</th>
            <td><?php echo $donasi_data['nomor_hp']; ?></td>
        </tr>
        <tr>
            <th>ID Gerai</th>
            <td><?php echo $donasi_data['id_gerai']; ?></td>
        </tr>
        <tr>
            <th>Nama Gerai</th>
            <td><?php echo $donasi_data['nama_gerai']; ?></td>
        </tr>
        <tr>
        <th>ID Petugas Gerai</th>
            <td><?php echo $donasi_data['id_petugas_gerai']; ?></td>
        </tr>
        <tr>
            <th>Nama Petugas Gerai</th>
            <td><?php echo $donasi_data['nama_petugas_gerai']; ?></td>
        </tr>
    </table>

    <h2>Perincian Donasi</h2>
    <table>
        <tr>
            <th>ID Perincian Donasi</th>
            <th>Nama Perincian Donasi</th>
            <th>Bentuk Donasi</th>
        </tr>
        <?php while ($perincian_donasi = $result_perincian_donasi->fetch_assoc()): ?>
        <tr>
            <td><?php echo $perincian_donasi['id_perincian_donasi']; ?></td>
            <td><?php echo $perincian_donasi['perincian_donasi']; ?></td>
            <td><?php echo $perincian_donasi['bentuk_donasi']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="sidebar">
        <div id="close-btn">&times;</div>
        <img src="./image/logo.png" alt="Ziswaf 1445H" id="sidebar-logo">
        <div class="sidebar-links">
            <a href="index.php">Beranda</a>
            <a href="form_donasi.php">Form Donasi</a>
            <a href="dashboard.php">Dashboard</a>
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