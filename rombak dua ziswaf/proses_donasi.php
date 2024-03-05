<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbaseziswaf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menerima data dari form donasi
$nama_donatur = $_POST['nama_donatur'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$kelas_id = $_POST['kelas'];
$gerai_id = $_POST['gerai'];
$petugas_gerai_id = $_POST['petugas_gerai'];
$perincian_donasi = array(
    $_POST['perincian_donasi_1_id'],
    $_POST['perincian_donasi_2_id'],
    $_POST['perincian_donasi_3_id'],
    $_POST['perincian_donasi_4_id'],
    $_POST['perincian_donasi_5_id']
);
$bentuk_donasi = array(
    $_POST['bentuk_donasi_1'],
    $_POST['bentuk_donasi_2'],
    $_POST['bentuk_donasi_3'],
    $_POST['bentuk_donasi_4'],
    $_POST['bentuk_donasi_5']
);
$jumlah_rp = array(
    $_POST['jumlah_rp_1'],
    $_POST['jumlah_rp_2'],
    $_POST['jumlah_rp_3'],
    $_POST['jumlah_rp_4'],
    $_POST['jumlah_rp_5']
);
$jumlah_paket = array(
    $_POST['jumlah_paket_1'],
    $_POST['jumlah_paket_2'],
    $_POST['jumlah_paket_3'],
    $_POST['jumlah_paket_4'],
    $_POST['jumlah_paket_5']
);
$cara_pembayaran = $_POST['cara_pembayaran'];
$bukti_pembayaran = $_FILES['bukti_pembayaran'];
$total_rp = 0;
$total_paket = 0;

// Menghitung total uang dan barang yang didonasikan
for ($i = 0; $i < 5; $i++) {
    if ($bentuk_donasi[$i] == 'Uang') {
        $total_rp += $jumlah_rp[$i];
    } else {
        $total_paket += $jumlah_paket[$i];
    }
}
// Mengupload file bukti pembayaran
if (isset($_FILES['bukti_pembayaran'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa format file yang diperbolehkan
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowed_types)) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Memeriksa ukuran file yang diperbolehkan
    if ($_FILES["bukti_pembayaran"]["size"] > 500000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Mengupload file bukti pembayaran
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
            echo "File " . htmlspecialchars(basename($_FILES["bukti_pembayaran"]["name"])) . " berhasil diupload.";
        } else {
            echo "Maaf, file gagal diupload.";
        }
    }
}

// Menyimpan data ke dalam tabel donasi
$sql = "INSERT INTO donasi (
    nama_donatur, alamat, no_hp, tanggal, kelas_id, gerai_id, petugas_gerai_id,
    perincian_donasi_1_id, bentuk_donasi_1, jumlah_rp_1, jumlah_paket_1,
    perincian_donasi_2_id, bentuk_donasi_2, jumlah_rp_2, jumlah_paket_2,
    perincian_donasi_3_id, bentuk_donasi_3, jumlah_rp_3, jumlah_paket_3,
    perincian_donasi_4_id, bentuk_donasi_4, jumlah_rp_4, jumlah_paket_4,
    perincian_donasi_5_id, bentuk_donasi_5, jumlah_rp_5, jumlah_paket_5,
    cara_pembayaran, bukti_pembayaran, total_rp, total_paket, keterangan
) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt) {
    echo "Query berhasil disiapkan!";
} else {
    echo "Error: " . $conn->error;
}
$stmt->bind_param("ssssiiissiiissiiissiiissiiissii", $nama_donatur, $alamat, $no_hp, $kelas_id, $gerai_id, $petugas_gerai_id,
    $perincian_donasi_1_id, $bentuk_donasi_1, $jumlah_rp_1, $jumlah_paket_1,
    $perincian_donasi_2_id, $bentuk_donasi_2, $jumlah_rp_2, $jumlah_paket_2,
    $perincian_donasi_3_id, $bentuk_donasi_3, $jumlah_rp_3, $jumlah_paket_3,
    $perincian_donasi_4_id, $bentuk_donasi_4, $jumlah_rp_4, $jumlah_paket_4,
    $perincian_donasi_5_id, $bentuk_donasi_5, $jumlah_rp_5, $jumlah_paket_5,
    $cara_pembayaran, $bukti_pembayaran, $total_rp, $total_paket, $keterangan);

$result = $stmt->execute();

if ($result) {
    // Data donasi berhasil disimpan
    $donasi_id = $conn->insert_id;
    
    // Redirect ke halaman kwitansi dengan menyertakan ID donasi
    header("Location: kwitansi.php?id=" . $donasi_id);
} else {
    echo "Maaf, terjadi kesalahan saat menyimpan data donasi: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
