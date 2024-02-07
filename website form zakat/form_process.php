<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection file
require_once 'db_connection.php';

// Get form data
$donasiCount = $_POST['donasiCount'];
$cara_pembayaran = $_POST['cara_pembayaran'];
$bukti_pembayaran = $_FILES['bukti_pembayaran'];
$keterangan = $_POST['keterangan'];

// Get donasi data
for ($i = 0; $i < $donasiCount; $i++) {
    $perincian_donasi[] = $_POST["perincian_donasi"][$i];
    $bentuk_donasi[] = $_POST["bentuk_donasi"][$i];
    $jumlah_rp[] = $_POST["jumlah_rp"][$i];
    $jumlah_paket[] = $_POST["jumlah_paket"][$i];
}

// Validate form data
if (empty($perincian_donasi) || empty($bentuk_donasi) || empty($jumlah_rp) || empty($jumlah_paket)) {
    echo "Error: Invalid form data.";
    exit;
}

// Calculate total Rp and total Paket
$total_rp = array_sum($jumlah_rp);
$total_paket = array_sum($jumlah_paket);

// Prepare and bind donasi_data table data
$stmt_donasi_data = $conn->prepare("INSERT INTO donasi_data (id_donatur, id_gerai, id_petugas_gerai, nama_donatur, alamat, nomor_hp, cara_pembayaran, bukti_pembayaran, keterangan, total_rp, total_paket) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt_donasi_data->bind_param("iiissssssiii", $id_donatur, $id_gerai, $id_petugas_gerai, $nama_donatur, $alamat, $nomor_hp, $cara_pembayaran, $bukti_pembayaran, $keterangan, $total_rp, $total_paket);

// Set default values for id_donatur, id_gerai, and id_petugas_gerai
$id_donatur = $id_gerai = $id_petugas_gerai = 0;

// Get form data for donasi_data
$id_donatur = $_POST['id_donatur'];
$id_gerai = $_POST['id_gerai'];
$nama_donatur = $_POST['nama_donatur'];
$alamat = $_POST['alamat'];
$nomor_hp = $_POST['nomor_hp'];

// Prepare and bind perincian_donasi table data
$stmt_perincian_donasi = $conn->prepare("INSERT INTO perincian_donasi (id_donasi, perincian_donasi, bentuk_donasi, jumlah_rp, jumlah_paket) VALUES (?, ?, ?, ?, ?)");

// Move the uploaded file
if ($bukti_pembayaran["error"] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($bukti_pembayaran["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the uploaded file is an image
    $check = getimagesize($bukti_pembayaran["tmp_name"]);
    if ($check === false) {
        echo "Error: File is not an image.";
        exit;
    }

        // Check if uploads directory exists, if not create it
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        // Check if $imageFileType is a valid image file type
        $allowed_types = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowed_types)) {
            echo "Error: Invalid file type.";
            exit;
        }
    
        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "Error: File already exists.";
            exit;
        }
    
        // Check file size
        if ($bukti_pembayaran["size"] > 2000000) {
            echo "Error: File size is too large.";
            exit;
        }
    
        // Move the uploaded file
        if (!move_uploaded_file($bukti_pembayaran["tmp_name"], $target_file)) {
            echo "Error: Failed to upload file.";
            exit;
        }
    
        // Insert data into donasi_data table
        $stmt_donasi_data->execute();
        $id_donasi = $conn->insert_id;
    
        // Insert data into perincian_donasi table
        for ($i = 0; $i < $donasiCount; $i++) {
            $perincian_donasi[$i] = $conn->real_escape_string($perincian_donasi[$i]);
            $bentuk_donasi[$i] = $conn->real_escape_string($bentuk_donasi[$i]);
    
            $stmt_perincian_donasi->execute();
            $id_perincian_donasi = $conn->insert_id;
            $stmt_perincian_donasi->close();
    
            // Associate the perincian_donasi with the donasi_data
            $stmt_donasi_perincian_association = $conn->prepare("INSERT INTO donasi_perincian_association (id_donasi, id_perincian_donasi) VALUES (?, ?)");
            $stmt_donasi_perincian_association->bind_param("ii", $id_donasi, $id_perincian_donasi);
            $stmt_donasi_perincian_association->execute();
            $stmt_donasi_perincian_association->close();
        }
    
        // Redirect to kwitansi page
        header("Location: kwitansi.php?id_donasi=$id_donasi");
        exit;
    
    } else {
        echo "Error: Failed to upload file.";
        exit;
    }
    
    // Close the database connection
    $conn->close();
    
    ?>