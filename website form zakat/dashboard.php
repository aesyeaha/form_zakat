<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-primary">
        <div id="toggle-btn">&#9776;</div>
        <img src="./image/logo.png" alt="Beranda" id="brand-logo">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

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

    <div class="container">
        <h1>Dashboard</h1>
        <?php
        session_start();
        require_once 'db_connection.php';

        // Check if the user is logged in
        if (!isset($_SESSION['username'])) {
            echo '<p>Please <a href="signup.php">sign up</a> or <a href="login.php">log in</a> to access the dashboard.</p>';
            exit;
        }

        // Get the user's data from the database
        $stmt = $conn->prepare("SELECT * FROM donasi_data WHERE nama_donatur = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display the user's data on the dashboard
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead><tr><th>ID Donasi</th><th>ID Donatur</th><th>ID Gerai</th><th>ID Petugas Gerai</th><th>Nama Donatur</th><th>Alamat</th><th>Nomor HP</th><th>Cara Pembayaran</th><th>Bukti Pembayaran</th><th>Keterangan</th><th>Total RP</th><th>Total Paket</th></tr></thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id_donasi'] . '</td>';
                echo '<td>' . $row['id_donatur'] . '</td>';
                echo '<td>' . $row['id_gerai'] . '</td>';
                echo '<td>' . $row['id_petugas_gerai'] . '</td>';
                echo '<td>' . $row['nama_donatur'] . '</td>';
                echo '<td>' . $row['alamat'] . '</td>';
                echo '<td>' . $row['nomor_hp'] . '</td>';
                echo '<td>' . $row['cara_pembayaran'] . '</td>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['bukti_pembayyaran']) . '" alt="Bukti Pembayaran" width="150"></td>';
                echo '<td>' . $row['keterangan'] . '</td>';
                echo '<td>' . $row['total_rp'] . '</td>';
                echo '<td>' . $row['total_paket'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
        ?>
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