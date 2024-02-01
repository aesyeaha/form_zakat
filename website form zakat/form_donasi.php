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
        <form action="form_process.php" method="post" id="donasiForm" onsubmit="return false;"
            enctype="multipart/form-data">

            <?php
            include 'db_connection.php';

            // Query untuk dropdown id_donatur 
            $query_donatur = "SELECT DISTINCT id_donatur, nama_id_donatur FROM donatur";
            $stmt_donatur = $conn->prepare($query_donatur);
            $stmt_donatur->execute();
            $result_donatur = $stmt_donatur->get_result();

            // Query untuk dropdown gerai 
            $query_gerai = "SELECT DISTINCT nama_gerai FROM gerai";
            $stmt_gerai = $conn->prepare($query_gerai);
            $stmt_gerai->execute();
            $result_gerai = $stmt_gerai->get_result();

            // Query untuk dropdown petugas_gerai 
            $query_petugas = "SELECT DISTINCT nama_petugas_gerai FROM petugas_gerai";
            $stmt_petugas = $conn->prepare($query_petugas);
            $stmt_petugas->execute();
            $result_petugas = $stmt_petugas->get_result();
            ?>

            <label for="id_donatur">ID Donatur:</label>
            <select name="id_donatur" id="id_donatur">
                <?php
            while ($row_donatur = $result_donatur->fetch_assoc()) {
                echo "<option value='" . $row_donatur['id_donatur'] . "'>" . $row_donatur['nama_id_donatur'] . "</option>";
            }
            ?>
            </select>

            <label for="gerai">Gerai:</label>
            <select name="gerai" id="gerai">
                <?php
            while ($row_gerai = $result_gerai->fetch_assoc()) {
                echo "<option value='" . $row_gerai['nama_gerai'] . "'>" . $row_gerai['nama_gerai'] . "</option>";
            }
            ?>
            </select>

            <label for="petugas_gerai">Petugas Gerai:</label>
            <select name="petugas_gerai" id="petugas_gerai">
                <?php
            while ($row_petugas = $result_petugas->fetch_assoc()) {
                echo "<option value='" . $row_petugas['nama_petugas_gerai'] . "'>" . $row_petugas['nama_petugas_gerai'] . "</option>";
            }
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

            <input type="hidden" id="donasiCount" name="donasiCount" value="0">

            <button type="button" onclick="validateAndSubmitForm()">Simpan Donasi</button>
        </form>

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
    let jumlahRpValues = [];
    let jumlahPaketValues = [];

    function tambahDonasi() {
        const donasiDetails = document.getElementById('donasiDetails');
        const donasiCountInput = document.getElementById('donasiCount');

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

            jumlahRpValues[donasiCount] = '';
            jumlahPaketValues[donasiCount] = '';

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
        try {
            const donasiCountInput = document.getElementById('donasiCount');
            const donasiCount = donasiCountInput.value;

            // Ambil data lain dari formulir
            const caraPembayaran = document.getElementById('cara_pembayaran').value;
            const buktiPembayaran = document.getElementById('bukti_pembayaran').files[0];
            const keterangan = document.querySelector('textarea[name="keterangan"]').value;

            // Buat objek FormData
            const formData = new FormData();
            formData.append('donasiCount', donasiCount);
            formData.append('cara_pembayaran', caraPembayaran);
            formData.append('bukti_pembayaran', buktiPembayaran);
            formData.append('keterangan', keterangan);

            for (let i = 0; i < donasiCount; i++) {
                const perincianDonasi = validateInput(document.getElementById(`perincian_donasi_${i + 1}`).value);
                const bentukDonasi = validateInput(document.querySelector(`input[name="bentuk_donasi_${i + 1}"]:checked`).value);
                const jumlahRp = validateInput(document.getElementById(`jumlah_rp_${i + 1}`).value);
                const jumlahPaket = validateInput(document.getElementById(`jumlah_paket_${i + 1}`).value);

                // Append data perincian donasi ke FormData
                formData.append(`perincian_donasi_${i + 1}`, perincianDonasi);
                formData.append(`bentuk_donasi_${i + 1}`, bentukDonasi);
                formData.append(`jumlah_rp_${i + 1}`, jumlahRp);
                formData.append(`jumlah_paket_${i + 1}`, jumlahPaket);
            }

            // Buat objek XMLHttpRequest
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'form_process.php', true);

            // Atur fungsi untuk menanggapi ketika permintaan selesai
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);

                    // Response dari form_process.php akan berupa redirect ke halaman kwitansi.php
                    // Anda bisa menangani redirect di sini jika diperlukan
                    window.location.href = 'kwitansi.php';
                } else {
                    console.error('Error saving donation:', xhr.statusText);

                    // Tampilkan pesan kesalahan kepada pengguna
                    alert('Terjadi kesalahan saat menyimpan donasi. Silakan coba lagi.');
                }
            };

            // Kirim data menggunakan XMLHttpRequest
            xhr.send(formData);

        } catch (error) {
        console.error('Terjadi kesalahan:', error.message);
        alert('Terjadi kesalahan. Silakan coba lagi.');
        }   
    }

    function validateAndSubmitForm() {
        if (validateData()) {
            simpanDonasi();
        } else {
            alert('Harap isi semua data dengan benar.');
        }
    }
</script>
</body>

</html>