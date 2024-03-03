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
$perincian_donasi_1_id = $_POST['perincian_donasi'];
$bentuk_donasi_1 = $_POST['bentuk_donasi'];
$jumlah_rp_1 = $_POST['jumlah_rp'];
$jumlah_paket_1 = $_POST['jumlah_paket'];

// Memeriksa apakah ada donasi kedua
if (!empty($_POST['perincian_donasi2'])) {
    $perincian_donasi_2_id = $_POST['perincian_donasi2'];
    $bentuk_donasi_2 = $_POST['bentuk_donasi2'];
    $jumlah_rp_2 = $_POST['jumlah_rp2'];
    $jumlah_paket_2 = $_POST['jumlah_paket2'];

    // Memeriksa apakah ada donasi ketiga
    if (!empty($_POST['perincian_donasi3'])) {
        $perincian_donasi_3_id = $_POST['perincian_donasi3'];
        $bentuk_donasi_3 = $_POST['bentuk_donasi3'];
        $jumlah_rp_3 = $_POST['jumlah_rp3'];
        $jumlah_paket_3 = $_POST['jumlah_paket3'];

        // Memeriksa apakah ada donasi keempat
        if (!empty($_POST['perincian_donasi4'])) {
            $perincian_donasi_4_id = $_POST['perincian_donasi4'];
            $bentuk_donasi_4 = $_POST['bentuk_donasi4'];
            $jumlah_rp_4 = $_POST['jumlah_rp4'];
            $jumlah_paket_4 = $_POST['jumlah_paket4'];

           // Memeriksa apakah ada donasi kelima
            if (!empty($_POST['perincian_donasi5'])) {
                $perincian_donasi_5_id = $_POST['perincian_donasi5'];
                $bentuk_donasi_5 = $_POST['bentuk_donasi5'];
                $jumlah_rp_5 = $_POST['jumlah_rp5'];
                $jumlah_paket_5 = $_POST['jumlah_paket5'];
            } else {
                $perincian_donasi_5_id = NULL;
                $bentuk_donasi_5 = NULL;
                $jumlah_rp_5 = NULL;
                $jumlah_paket_5 = NULL;
            }
        }
    }
}

$target_dir = "bukti_pembayaran/";
$target_file = $target_dir . basename($_FILES["bukti_pembayaran"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek ekstensi file
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
    $uploadOk = 0;
} else {
    $uploadOk = 1;
}

// Cek apakah file diupload
if ($uploadOk == 0) {
    echo "Maaf, file gagal diupload.";
    // Jika file gagal diupload, tidak perlu menyimpan nama file ke database atau variabel lainnya
} else {
    if (move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], $target_file)) {
        // Jika file berhasil diupload, simpan nama file ke database atau variabel lainnya
        $bukti_pembayaran = basename($_FILES["bukti_pembayaran"]["name"]);
        echo "File berhasil diupload.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file.";
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
) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
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

