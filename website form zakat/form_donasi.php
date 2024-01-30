<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permata Ansyithoh Ramadhan 1445H</title>
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
        </div>
        <div class="sidebar-buttons">
            <button id="share-btn">Share</button>
            <button id="about-btn">About</button>
        </div>
    </div>

    <div class="container">
        <h1>Form Donasi Zakat</h1>
        <form action="form_process.php" method="post" id="donasiForm" onsubmit="return false;" enctype="multipart/form-data">
            <label for="id_donatur">ID Donatur:</label>
            <select name="id_donatur" id="id_donatur">
            <?php
            // Sambungkan ke database (gantilah dengan kredensial database Anda)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ziswaf";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk mendapatkan opsi gerai dari database
    $query_gerai = "SELECT DISTINCT nama_id_donatur FROM donasi_data";
    $result_gerai = $conn->query($query_gerai);

    // Tampilkan opsi gerai di dropdown
    while ($row_gerai = $result_gerai->fetch_assoc()) {
        echo "<option value='" . $row_gerai['nama_id_donatur'] . "'>" . $row_gerai['nama_id_donatur'] . "</option>";
    }

    // Tutup koneksi
    $conn->close();
    ?>
            </select>

            <label for="gerai">Gerai:</label>
            <select name="gerai" id="gerai">
                <?php
            // Sambungkan ke database (gantilah dengan kredensial database Anda)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ziswaf";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk mendapatkan opsi gerai dari database
    $query_gerai = "SELECT DISTINCT gerai FROM donasi_data";
    $result_gerai = $conn->query($query_gerai);

    // Tampilkan opsi gerai di dropdown
    while ($row_gerai = $result_gerai->fetch_assoc()) {
        echo "<option value='" . $row_gerai['gerai'] . "'>" . $row_gerai['gerai'] . "</option>";
    }

    // Tutup koneksi
    $conn->close();
    ?>
            </select>

            <label for="petugas_gerai">Petugas Gerai:</label>
            <select name="petugas_gerai" id="petugas_gerai">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ziswaf";
                // Menambahkan opsi dari database untuk petugas gerai
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Query untuk mendapatkan opsi petugas gerai dari database
                $query_petugas = "SELECT DISTINCT petugas_gerai FROM donasi_data";
                $result_petugas = $conn->query($query_petugas);

                // Tampilkan opsi petugas gerai di dropdown
                while ($row_petugas = $result_petugas->fetch_assoc()) {
                    echo "<option value='" . $row_petugas['petugas_gerai'] . "'>" . $row_petugas['petugas_gerai'] . "</option>";
                }

                // Tutup koneksi
                $conn->close();
                ?>
            </select>

            <label for="nama_donatur">Nama Donatur:</label>
            <input type="text" name="nama_donatur" placeholder="Nama Donatur" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" placeholder="Alamat" required>

            <label for="nomor_hp">Nomor Handphone:</label>
            <input type="text" name="nomor_hp" placeholder="Nomor Handphone" required>

            <button type="button" onclick="tambahDonasi()">Masukkan/Tambahkan Kriteria Donasi</button>

            <div id="donasiDetails">
                <!-- Detail donasi akan ditampilkan di sini -->
            </div>

            <div id="totalSection">
                <h2>Total Semua Donasi</h2>
                <label for="totalRp">Total Jumlah (Rp): </label>
                <input type="text" name="totalRp" id="totalRp"
                    placeholder="Masukkan Total Jumlah (Rp) jika sudah mengisi nominal pada Jumlah (Rp)">

                <label for="totalPaket">Total Jumlah Paket: </label>
                <input type="text" name="totalPaket" id="totalPaket"
                    placeholder="Masukkan total Jumlah Paket jika sudah mengisi nominal pada Jumlah Paket">
            </div>

            <div>
                <label for="cara_pembayaran">Cara Pembayaran (Jika Donasi Dalam Bentuk Uang):</label>
                <select name="cara_pembayaran" id="cara_pembayaran">
                    <option value="tunai">Tunai</option>
                    <option value="transfer">Transfer</option>
                    <option value="tunai">Barang</option>
                </select>
            </div>

            <div id="buktiPembayaranDetails" style="display: none;">
                <label for="bukti_pembayaran">Unggah Bukti Pembayaran (Maks. 2MB):</label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept=".jpg, .jpeg, .png" required>
            </div>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" placeholder="Keterangan"></textarea>

            <button onclick="simpanDonasi()">Simpan Donasi</button>
        </form>
</body>

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

    let donasiCount = 0;

    function tambahDonasi() {
        const donasiDetails = document.getElementById('donasiDetails');

        donasiDetails.innerHTML += `
            <h2>Donasi ${donasiCount + 1}</h2>
            <label for="perincian_donasi_${donasiCount + 1}">Perincian Donasi:</label>
            <select name="perincian_donasi_${donasiCount + 1}" id="perincian_donasi_${donasiCount + 1}">
                <option value="Barbeku">Barbeku</option>
                <option value="Cinta Yatim">Cinta Yatim</option>
                <option value="Fidyah">Fidyah</option>
                <option value="Paket Buka Puasa">Paket Buka Puasa</option>
                <option value="Sembako Ramadhan">Sembako Ramadhan</option>
                <option value="Tabungan Surga si Copral">Tabungan Surga si Copral</option>
                <option value="Wakaf Pembangunan Masjid">Wakaf Pengembangan Masjid</option>
                <option value="Wakaf Pembebasan dan Pembangunan PPTQ">Wakaf Pembebasan dan Pembangunan PPTQ</option>
                <option value="Wakaf al-Qur'an">Wakaf al-Qur'an</option>
                <option value="Zakat Maal">Infaq dan Shodaqoh</option>
                <option value="Zakat Fitrah">Zakat Fitrah</option>
                <option value="Zakat Maal">Zakat Maal</option>
            </select>

            <label for="bentuk_donasi_${donasiCount + 1}">Bentuk Donasi:</label>
            <div class="radio-group">
            <input type="radio" id="donasi_uang_${donasiCount}" name="bentuk_donasi_${donasiCount}" value="uang" onclick="tampilkanInput(${donasiCount})">
            <label for="donasi_uang_${donasiCount}">Uang</label>

            <input type="radio" id="donasi_barang_${donasiCount}" name="bentuk_donasi_${donasiCount}" value="barang" onclick="tampilkanInput(${donasiCount})">
            <label for="donasi_barang_${donasiCount}">Barang</label>
        </div>
        
        <div id="jumlahRpInput_${donasiCount}" style="display: none;">
            <label for="jumlah_rp_${donasiCount}">Jumlah (Rp): </label>
            <input type="text" name="jumlah_rp_${donasiCount}" id="jumlah_rp_${donasiCount}" placeholder="Masukkan Jumlah (Rp) jika memilih bentuk donasi Uang" required>
        </div>

        <div id="jumlahPaketInput_${donasiCount}" style="display: none;">
            <label for="jumlah_paket_${donasiCount}">Jumlah Paket: </label>
            <input type="text" name="jumlah_paket_${donasiCount}" id="jumlah_paket_${donasiCount}" placeholder="Masukkan Jumlah Paket jika memilih bentuk donasi Barang" required>
        </div>
    `;

        donasiCount++;
    }

    function tampilkanInput(donasiCount) {
        const donasiUang = document.getElementById(`donasi_uang_${donasiCount}`);
        const donasiBarang = document.getElementById(`donasi_barang_${donasiCount}`);
        const jumlahRpInput = document.getElementById(`jumlahRpInput_${donasiCount}`);
        const jumlahPaketInput = document.getElementById(`jumlahPaketInput_${donasiCount}`);

        if (donasiUang.checked) {
            jumlahRpInput.style.display = 'block';
            jumlahPaketInput.style.display = 'none';
        } else if (donasiBarang.checked) {
            jumlahRpInput.style.display = 'none';
            jumlahPaketInput.style.display = 'block';
        }
    }

    function simpanDonasi() {
    const caraPembayaran = document.getElementById('cara_pembayaran').value;
    const buktiPembayaran = document.getElementById('bukti_pembayaran').files[0]; // Get the file object

    const keterangan = document.querySelector('textarea[name="keterangan"]').value;

    const dataDonasi = {
        caraPembayaran,
        buktiPembayaran: buktiPembayaran ? buktiPembayaran.name : '', // Check if buktiPembayaran is defined
        keterangan,
        donasiDetails: [],
    };

    for (let i = 1; i <= donasiCount; i++) {
        const bentukDonasi = document.querySelector(`input[name="bentuk_donasi_${i}"]:checked`).value;
        const perincianDonasi = document.getElementById(`perincian_donasi_${i}`).value;
        const jumlahRp = document.getElementById(`jumlah_rp_${i}`).value;
        const jumlahPaket = document.getElementById(`jumlah_paket_${i}`).value;

        dataDonasi.donasiDetails.push({
            bentukDonasi,
            perincianDonasi,
            jumlahRp: bentukDonasi === 'uang' ? jumlahRp : '',
            jumlahPaket: bentukDonasi === 'barang' ? jumlahPaket : '',
        });
    }

    console.log(dataDonasi); // Tampilkan data donasi di console (gantilah dengan pengiriman ke backend).

    alert('Donasi berhasil disimpan!');
    donasiCount = 0;
    document.getElementById('donasiDetails').innerHTML = '';
    document.getElementById('totalRp').value = 0;
    document.getElementById('totalPaket').value = 0;
}

    document.querySelector('select[name="cara_pembayaran"]').addEventListener('change', function () {
        const buktiPembayaranDetails = document.getElementById('buktiPembayaranDetails');

        if (this.value === 'transfer') {
            buktiPembayaranDetails.style.display = 'block';
        } else {
            buktiPembayaranDetails.style.display = 'none';
        }
    });
</script>

</body>

</html>