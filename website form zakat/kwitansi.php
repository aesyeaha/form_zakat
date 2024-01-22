<?php
session_start();

// Ambil data formulir dari sesi
$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : null;

// Hapus data formulir dari sesi (opsional)
unset($_SESSION['form_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitan[ si Donasi</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
    <div id="toggle-btn">&#9776;</div>
    <img src="logo.png" alt="Beranda" id="brand-logo">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </nav>

    <div class="container">
        <h1>Data Donasi Zakat</h1>

        <?php if ($formData && is_array($formData)): ?>
            <p><strong>Gerai:</strong> <?php echo htmlspecialchars($formData['gerai']); ?></p>
            <p><strong>Petugas Gerai:</strong> <?php echo htmlspecialchars($formData['petugas_gerai']); ?></p>
            <p><strong>Nama Donatur:</strong> <?php echo htmlspecialchars($formData['nama_donatur']); ?></p>
            <p><strong>Alamat:</strong> <?php echo htmlspecialchars($formData['alamat']); ?></p>
            <p><strong>Nomor Handphone:</strong> <?php echo htmlspecialchars($formData['nomor_hp']); ?></p>
            <p><strong>Perincian Donasi:</strong> <?php echo htmlspecialchars($formData['perincian_donasi']); ?></p>
            <p><strong>Bentuk Donasi:</strong> <?php echo htmlspecialchars($formData['bentuk_donasi']); ?></p>
            <p><strong>Keterangan:</strong> <?php echo htmlspecialchars($formData['keterangan']); ?></p>

            <form action="print_pdf.php" method="post">
                <?php foreach ($formData as $key => $value): ?>
                    <input type="hidden" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($value); ?>">
                <?php endforeach; ?>
                <button type="submit" name="print">Print Kwitansi</button>
            </form>
        <?php else: ?>
            <p>Tidak ada data formulir yang tersedia atau format data tidak valid.</p>
        <?php endif; ?>
    </div>

    <div class="sidebar">
        <div id="close-btn">&times;</div>
        <img src="logo.png" alt="Ziswaf 1445H" id="sidebar-logo">
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