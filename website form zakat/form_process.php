<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_donatur = $_POST["id_donatur"];
    $nama_donatur = $_POST["nama_donatur"];
    $alamat_donatur = $_POST["alamat"];
    $telepon_donatur = $_POST["nomor_hp"];

    $donasiCount = count($_POST["perincian_donasi"]);

    $donasiDetails = [];
    $totalRp = 0;
    $totalPaket = 0;

    // Koneksi ke database
    $host = "localhost";
    $dbname = "zakatramadhan";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Memulai transaksi
        $pdo->beginTransaction();

        // Menyimpan data donasi ke tabel donasi
        $queryDonasi = $pdo->prepare("INSERT INTO donasi (id_donatur, nama_donatur, alamat_donatur, telepon_donatur) 
                                      VALUES (:id_donatur, :nama_donatur, :alamat_donatur, :telepon_donatur)");
        $queryDonasi->bindParam(":id_donatur", $id_donatur);
        $queryDonasi->bindParam(":nama_donatur", $nama_donatur);
        $queryDonasi->bindParam(":alamat_donatur", $alamat_donatur);
        $queryDonasi->bindParam(":telepon_donatur", $telepon_donatur);
        $queryDonasi->execute();

        // Mendapatkan ID donasi yang baru saja disimpan
        $id_donasi = $pdo->lastInsertId();

        // Menyimpan data rincian donasi ke tabel rincian_donasi
        $queryRincianDonasi = $pdo->prepare("INSERT INTO rincian_donasi (id_donasi, bentuk_donasi, perincian_donasi, jumlah_rp, jumlah_paket) 
                                            VALUES (:id_donasi, :bentuk_donasi, :perincian_donasi, :jumlah_rp, :jumlah_paket)");

        for ($i = 1; $i <= $donasiCount; $i++) {
            $bentukDonasi = $_POST["bentuk_donasi_" . $i];
            $perincianDonasi = $_POST["perincian_donasi_" . $i];
            $jumlahRp = ($bentukDonasi === "uang") ? $_POST["jumlah_rp_" . $i] : 0;
            $jumlahPaket = ($bentukDonasi === "barang") ? $_POST["jumlah_paket_" . $i] : 0;

            // Bind parameters
            $queryRincianDonasi->bindParam(":id_donasi", $id_donasi);
            $queryRincianDonasi->bindParam(":bentuk_donasi", $bentukDonasi);
            $queryRincianDonasi->bindParam(":perincian_donasi", $perincianDonasi);
            $queryRincianDonasi->bindParam(":jumlah_rp", $jumlahRp);
            $queryRincianDonasi->bindParam(":jumlah_paket", $jumlahPaket);

            // Execute query
            $queryRincianDonasi->execute();

            $totalRp += $jumlahRp;
            $totalPaket += $jumlahPaket;
        }

        // Commit transaksi
        $pdo->commit();

        // Set session untuk ID donasi
        $_SESSION["id_donasi"] = $id_donasi;

        // Check if bukti pembayaran is uploaded
        if (isset($_FILES['bukti_pembayaran']) && $_FILES['bukti_pembayaran']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'path/to/upload/directory/';
            $uploadFile = $uploadDir . basename($_FILES['bukti_pembayaran']['name']);

            // Move uploaded file to desired directory
            move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $uploadFile);
        }

        // Redirect ke halaman kwitansi.php dengan membawa ID donasi
        header("Location: kwitansi.php?id_donasi=$id_donasi");
        exit();

    } catch (PDOException $e) {
        // Rollback transaksi jika terjadi kesalahan
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
} else {
    // Redirect ke halaman form_donasi.php jika tidak ada data POST
    header("Location: form_donasi.php");
    exit();
}
?>