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
        <form action="form_process.php" method="post" id="donationForm">
            <label for="id_donatur">ID Donatur:</label>
            <select name="id_donatur" id="id_donatur">
                <option value="TPA-PS">TPA-PS, DC 1, TK & DC 2</option>
                <option value="PGIT">PGIT</option>
                <option value="TK-A1 - A2">TK-A1 - A2</option>
                <option value="TK-A3 - A5">TK-A3 - A5</option>
                <option value="TK-B1 - B2">TK-B1 - B2</option>
                <option value="TK-B3 - B4">TK-B3 - B4</option>
                <option value="SD-1A">SD-1A</option>
                <option value="SD-1B">SD-1B</option>
                <option value="SD-1C">SD-1C</option>
                <option value="SD-1D">SD-1D</option>
                <option value="SD-1|CP">SD-1|CP</option>
                <option value="SD-2A">SD-2A</option>
                <option value="SD-2B">SD-2B</option>
                <option value="SD-2C">SD-2C</option>
                <option value="SD-2D">SD-2D</option>
                <option value="SD-3A">SD-3A</option>
                <option value="SD-3B">SD-3B</option>
                <option value="SD-3C">SD-3C</option>
                <option value="SD-3D">SD-3D</option>
                <option value="SD-4A">SD-4A</option>
                <option value="SD-4B">SD-4B</option>
                <option value="SD-4C">SD-4C</option>
                <option value="SD-4D">SD-4D</option>
                <option value="SD-5A">SD-5A</option>
                <option value="SD-5B">SD-5B</option>
                <option value="SD-5C">SD-5C</option>
                <option value="SD-5D">SD-5D</option>
                <option value="SD-6A">SD-6A</option>
                <option value="SD-6B">SD-6B</option>
                <option value="SD-6C">SD-6C</option>
                <option value="SD-6D">SD-6D</option>
                <option value="SMP-7A">SMP-7A</option>
                <option value="SMP-7B">SMP-7B</option>
                <option value="SMP-7C">SMP-7C</option>
                <option value="SMP-7D">SMP-7D</option>
                <option value="SMP-8A">SMP-8A</option>
                <option value="SMP-8B">SMP-8B</option>
                <option value="SMP-8C">SMP-8C</option>
                <option value="SMP-8D">SMP-8D</option>
                <option value="SMP-9A">SMP-9A</option>
                <option value="SMP-9B">SMP-9B</option>
                <option value="SMP-9C">SMP-9C</option>
                <option value="SMP-9D">SMP-9D</option>
                <option value="MA-10">MA-10</option>
                <option value="MA-11">MA-11</option>
                <option value="MA-12">MA-12</option>
                <option value="P1">P1</option>
                <option value="P2">P2</option>
                <option value="P3">P3</option>
                <option value="P4">P4</option>
                <option value="P5">P5</option>
                <option value="Umum">Umum</option>
            </select>

            <label for="gerai">Gerai:</label>
            <select name="gerai" id="gerai">
                <option value="PAUD">PAUD</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="MA">MA</option>
                <option value="Online">Online</option>
            </select>

            <label for="petugas_gerai">Petugas Gerai:</label>
            <select name="petugas_gerai" id="petugas_gerai">
                <option value="A. Burhanuddin">A. Burhanuddin</option>
                <option value="Achmad Nurkholik">Achmad Nurkholik</option>
                <option value="Agustin Wahyuningtyas">Agustin Wahyuningtyas</option>
                <option value="Akhada Irmawati">Akhada Irmawati</option>
                <option value="Akhmad Anwar Sadad">Akhmad Anwar Sadad</option>

                <option value="Alynia Purwaning">Alynia Purwaning</option>
                <option value="Andika Setyobudi">Andika Setyobudi</option>
                <option value="Choirul Purwati">Choirul Purwati</option>
                <option value="Chusniatul Khisoli">Chusniatul Khisoli</option>
                <option value="Chusnul Chotimah">Chusnul Chotimah</option>

                <option value="Dafis Luqqi Muzakki">Dafis Luqqi Muzakki</option>
                <option value="Dani Setiawan">Dani Setiawan</option>
                <option value="Denny Sandyarani">Denny Sandyarani</option>
                <option value="Devi Antika Sari">Devi Antika Sari</option>
                <option value="Djuniati Kustifah">Djuniati Kustifah</option>

                <option value="Dwi Cahyanti Yuliasih">Dwi Cahyanti Yuliasih</option>
                <option value="Eka Saryani">Eka Saryani</option>
                <option value="Elly Faizah">Elly Faizah</option>
                <option value="Fashiha Ulinnuha">Fashiha Ulinnuh</option>
                <option value="Fitria Kurnia Fatma">Fitria Kurnia Fatma</option>

                <option value="Fitria">Fitria</option>
                <option value="Gori Laksana Lusfida">Gori Laksana Lusfida</option>
                <option value="Ida Susanti">Ida Susanti</option>
                <option value="Ismi Mardiyanah">Ismi Mardiyanah</option>
                <option value="Khurin Alifia Yahya">Khurin Alifia Yahya</option>

                <option value="Khusnul Feryka A. Sari">Khusnul Feryka A. Sari</option>
                <option value="Khusnul Khotimah">Khusnul Khotimah</option>
                <option value="Krisdianto">Krisdianto</option>
                <option value="Listiyowati">Listiyowati</option>
                <option value="M. Hafidz Sulistyawan">M. Hafidz Sulistyawan</option>

                <option value="M. Januar Arifin">M. Januar Arifin</option>
                <option value="Mastoni Muhajirin">Mastoni Muhajirin</option>
                <option value="Muhammad Hullah">Muhammad Hullah</option>
                <option value="Nani Harpanti">Nani Harpanti</option>
                <option value="Nila Meirinda Wardhani">Nila Meirinda Wardhani</option>

                <option value="Ninik Ikawanti">Ninik Ikawanti</option>
                <option value="Ninik Kuswahyuni">Ninik Kuswahyuni</option>
                <option value="Novita Mauris">Novita Mauris</option>
                <option value="Nur Aisyiyah">Nur Aisyiyah</option>
                <option value="Nur Miftahul Hikmah">Nur Miftahul Hikmah</option>

                <option value="Nurul Hidajati">Nurul Hidajati</option>
                <option value="Puny Komariah">Puny Komariah</option>
                <option value="Ramadani Akhirul">Ramadani Akhirul</option>
                <option value="Rhiza Arif Firman">Rhiza Arif Firman</option>
                <option value="Roviatin Kurnia">Roviatin Kurnia</option>

                <option value="Saidah">Saidah</option>
                <option value="Santi Islamy Romadhony A">Santi Islamy Romadhony A</option>
                <option value="Siti Masruroh">Siti Masruroh</option>
                <option value="Siti Rukoiyah Ulfah">Siti Rukoiyah Ulfah</option>
                <option value="Sri Handayani">Sri Handayani</option>

                <option value="Suyanti">Suyanti</option>
                <option value="Ulil Fadhilah">Ulil Fadhilah</option>
                <option value="Umi Fauziah">Umi Fauziah</option>
                <option value="Umi Khusnul">Umi Khusnul</option>
                <option value="Wahyuningsih">Wahyuningsih</option>

                <option value="Wiwit Sofiyanti Budiono">Wiwit Sofiyanti Budiono</option>
                <option value="Yanuati Intan">Yanuati Intan</option>
                <option value="Yuni Ikhsaniah">Yuni Ikhsaniah</option>
                <option value="Ziauddin Bahtiar">Ziauddin Bahtiar</option>
                <option value="Zulfi Sufairoh">Zulfi Sufairoh</option>

                <option value="Kukuh Nurma Nugroho">Kukuh Nurma Nugroho</option>
                <option value="Makhfud Kurniawan Hidayat">Makhfud Kurniawan Hidayat</option>
                <option value="Online">Online</option>
            </select>

            <label for="nama_donatur">Nama Donatur:</label>
            <input type="text" name="nama_donatur" placeholder="Nama Donatur" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" placeholder="Alamat" required>

            <label for="nomor_hp">Nomor Handphone:</label>
            <input type="text" name="nomor_hp" placeholder="Nomor Handphone" required>

            <label for="perincian_donasi">Perincian Donasi:</label>
            <select name="perincian_donasi" id="perincian_donasi">
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

                <option value="Zakat Maal">Zakat Fitrah</option>
                <option value="Zakat Fitrah">Zakat Maal</option>
            </select>

            <label for="bentuk_donasi">Bentuk Donasi:</label>
            <input type="radio" name="bentuk_donasi" value="uang" required onclick="tampilkanJenisDonasi('uang')"> Uang
            <input type="radio" name="bentuk_donasi" value="barang" required onclick="tampilkanJenisDonasi('barang')"> Barang

            <div id="uangDonasi" class="hidden">
                <label for="jumlah_donasi">Jumlah (Rp):</label>
                <input type="text" name="jumlah_donasi" id="jumlah_donasi" oninput="hitungTotalUang()" required>
                
                <label for="total_donasi">Total (Rp):</label>
                <input type="text" name="total_donasi" id="total_donasi" readonly>
                
                <label for="cara_pembayaran">Cara Pembayaran:</label>
                <input type="radio" name="cara_pembayaran" value="tunai" required> Tunai
                <input type="radio" name="cara_pembayaran" value="transfer" required onclick="tampilkanUnggahBukti()"> Transfer
            </div>

            <div id="unggahBukti" class="hidden">
                <label for="bukti_transfer">Unggah Bukti Transfer:</label>
                <input type="file" name="bukti_transfer" id="bukti_transfer">
            </div>

            <div id="barangDonasi" class="hidden">
                <label for="jumlah_paket">Jumlah Paket:</label>
                <input type="text" name="jumlah_paket" id="jumlah_paket" oninput="hitungTotalPaket()" required>

                <label for="total_paket">Total Paket:</label>
                <input type="text" name="total_paket" id="total_paket" readonly>
            </div>

            <button type="button" onclick="tambahDonasi()">Tambah Donasi</button>

            <div id="additionalDonations"></div>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" placeholder="Keterangan"></textarea>

            <button type="submit" name="submit">Save</button>
        </form>
    </div>

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

    function sembunyikanSemua() {
            var uangDonasi = document.getElementById('uangDonasi');
            var barangDonasi = document.getElementById('barangDonasi');
            var unggahBukti = document.getElementById('unggahBukti');

            uangDonasi.classList.add('hidden');
            barangDonasi.classList.add('hidden');
            unggahBukti.classList.add('hidden');
        }

        function tampilkanJenisDonasi(jenis) {
            sembunyikanSemua();

            var uangDonasi = document.getElementById('uangDonasi');
            var barangDonasi = document.getElementById('barangDonasi');
            var unggahBukti = document.getElementById('unggahBukti');

            if (jenis === 'uang') {
                uangDonasi.classList.remove('hidden');
            } else if (jenis === 'barang') {
                barangDonasi.classList.remove('hidden');
            }
        }

        function hitungTotalUang() {
            var jumlahDonasi = parseFloat(document.getElementById('jumlah_donasi').value) || 0;
            document.getElementById('total_donasi').value = jumlahDonasi.toFixed(2);
        }

        function hitungTotalPaket() {
            var jumlahPaket = parseInt(document.getElementById('jumlah_paket').value) || 0;
            var totalPaket = parseInt(document.getElementById('total_paket').value) || 0;
            document.getElementById('total_paket').value = totalPaket + jumlahPaket;
        }

        function sembunyikanUnggahBukti() {
            var unggahBukti = document.getElementById('unggahBukti');
            unggahBukti.classList.add('hidden');
        }

        function tampilkanUnggahBukti() {
            sembunyikanUnggahBukti();

            var unggahBukti = document.getElementById('unggahBukti');
            unggahBukti.classList.remove('hidden');
        }

        var counter = 1;

        function tambahDonasi() {
            sembunyikanSemua(); 

            counter++;

            var container = document.getElementById('additionalDonations');
            var donationContainer = document.createElement('div');
            donationContainer.innerHTML = `
                <hr>
                <label for="perincian_donasi${counter}">Perincian Donasi ${counter}:</label>
                <select name="perincian_donasi${counter}" id="perincian_donasi${counter}">
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

                <label for="bentuk_donasi${counter}">Bentuk Donasi:</label>
                <input type="radio" name="bentuk_donasi${counter}" value="uang" required onclick="tampilkanJenisDonasi('uang')"> Uang
                <input type="radio" name="bentuk_donasi${counter}" value="barang" required onclick="tampilkanJenisDonasi('barang')"> Barang

                <div id="uangDonasi${counter}" class="hidden">
                    <label for="jumlah_donasi${counter}">Jumlah (Rp):</label>
                    <input type="text" name="jumlah_donasi${counter}" id="jumlah_donasi${counter}" oninput="hitungTotalUang()" required>
                    
                    <label for="total_donasi${counter}">Total (Rp):</label>
                    <input type="text" name="total_donasi${counter}" id="total_donasi${counter}" readonly>
                    
                    <label for="cara_pembayaran${counter}">Cara Pembayaran:</label>
                    <input type="radio" name="cara_pembayaran${counter}" value="tunai" required> Tunai
                    <input type="radio" name="cara_pembayaran${counter}" value="transfer" required onclick="tampilkanUnggahBukti()"> Transfer
                </div>

                <div id="barangDonasi${counter}" class="hidden">
                    <label for="jumlah_paket${counter}">Jumlah Paket:</label>
                    <input type="text" name="jumlah_paket${counter}" id="jumlah_paket${counter}" oninput="hitungTotalPaket()" required>

                    <label for="total_paket${counter}">Total Paket:</label>
                    <input type="text" name="total_paket${counter}" id="total_paket${counter}" readonly>
                </div>

                <div id="unggahBukti${counter}" class="hidden">
                    <label for="bukti_transfer${counter}">Unggah Bukti Transfer:</label>
                    <input type="file" name="bukti_transfer${counter}" id="bukti_transfer${counter}">
                </div>
            `;

            container.appendChild(donationContainer);
        }
</script>

</body>

</html>