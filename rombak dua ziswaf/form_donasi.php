<!DOCTYPE html>
<html>
<head>
    <title>Form Donasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background-color: lightblue; 
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <style>
        .donasi-form {
            margin: 2rem auto;
            width: 50%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 1rem;
        }

            .form-group {
            grid-column: span 2;
            margin-bottom: 1rem;
        }

            .form-control {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 0.5rem;
            width: 100%;
        }

            .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

            .btn-donasi {
            grid-column: span 2;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            padding: 0.5rem;
            cursor: pointer;
        }

            .btn-donasi:hover {
            background-color: #0069d9;
        }

        @media (max-width: 768px) {
            .donasi-form {
                width: 100%;
            }

            .form-group {
                grid-column: span 1;
            }

            .btn-donasi {
                grid-column: span 2;
            }
        }
        
        footer {
            bottom: 0; width: 100%; 
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Ziswaf</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="form_donasi.php">Form Donasi <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard_signup.php">Dashboard</a>
                </li>
            </ul>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="form-inline ml-auto">
                <input class="form-control mr-sm-2" type="text" placeholder="Search...">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </nav>

    <form action="proses_donasi.php" method="post" class="donasi-form">
        <div class="form-group">
            <label for="nama_donatur" class="form-label">Nama Donatur:</label>
            <input type="text" name="nama_donatur" id="nama_donatur" class="form-control" placeholder="Nama Donatur" required>
        </div>

        <div class="form-group">
            <label for="alamat" class="form-label">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required>
        </div>

        <div class="form-group">
            <label for="no_hp" class="form-label">Nomor Handphone:</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor Handphone" required>
        </div>

        <div class="form-group">
            <label for="kelas" class="form-label">Kelas:</label>
            <select name="kelas" id="kelas" class="form-control" required>
                <option value="">Pilih Kelas</option>
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

                // Mengambil data dari tabel kelas
                $sql = "SELECT * FROM kelas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_kelas'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="gerai" class="form-label">Gerai:</label>
            <select name="gerai" id="gerai" class="form-control" required>
                <option value="">Pilih Gerai</option>
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

                // Mengambil data dari tabel gerai
                $sql = "SELECT * FROM gerai";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_gerai'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="petugas_gerai" class="form-label">Petugas Gerai:</label>
            <select name="petugas_gerai" id="petugas_gerai" class="form-control" required>
                <option value="">Pilih Gerai</option>
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

                // Mengambil data dari tabel petugas gerai
                $sql = "SELECT * FROM petugas_gerai";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_petugas_gerai'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="shift_petugas" class="form-label">Shift Petugas:</label>
            <select name="shift_petugas" id="shift_petugas" class="form-control" required>
                <option value="">Pilih Shift Petugas</option>
                <option value="uang">1</option>
                <option value="barang">2</option>
            </select>
        </div>

        <div class="form-group">
            <label for="perincian_donasi" class="form-label">Perincian Donasi:</label>
            <select name="perincian_donasi" id="perincian_donasi" class="form-control" required>
                <option value="">Pilih Perincian Donasi</option>
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

                // Mengambil data dari tabel petugas gerai
                $sql = "SELECT * FROM perincian_donasi_1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_perincian_donasi_1'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="bentuk_donasi" class="form-label">Bentuk Donasi:</label>
            <select name="bentuk_donasi" id="bentuk_donasi" class="form-control" required>
                <option value="">Pilih Bentuk Donasi</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang" style="display:none;">
            <label for="jumlah_rp" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp" id="jumlah_rp" class="form-control" placeholder="Jumlah Donasi (Rp)">
        </div>
        <div class="form-group" id="form-jumlah-barang" style="display:none;">
            <label for="jumlah_paket" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket" id="jumlah_paket" class="form-control" placeholder="Jumlah Donasi (Paket)">
        </div>

        <div class="form-group">
        <label for="perincian_donasi2" class="form-label" id="label-perincian-donasi2" style="display:none;">Donasi Kedua:</label>
            <select name="perincian_donasi2" id="perincian_donasi2" class="form-control" style="display:none;">
                <option value="">Pilih Perincian Donasi Kedua</option>
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

                // Mengambil data dari tabel petugas gerai
                $sql = "SELECT * FROM perincian_donasi_2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_perincian_donasi_2'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group" id="form-bentuk-donasi2" style="display:none;">
            <label for="bentuk_donasi2" class="form-label">Bentuk Donasi Kedua:</label>
            <select name="bentuk_donasi2" id="bentuk_donasi2" class="form-control">
                <option value="">Pilih Bentuk Donasi Kedua</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang2" style="display:none;">
            <label for="jumlah_rp2" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp2" id="jumlah_rp2" class="form-control" placeholder="Jumlah Donasi Kedua (Rp)">
        </div>
        <div class="form-group" id="form-jumlah-barang2" style="display:none;">
            <label for="jumlah_paket2" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket2" id="jumlah_paket2" class="form-control" placeholder="Jumlah Donasi Kedua (Paket)">
        </div>

        <div class="form-group">
            <label for="perincian_donasi3" class="form-label" id="label-perincian-donasi3" style="display:none;">Donasi Ketiga:</label>
            <select name="perincian_donasi3" id="perincian_donasi3" class="form-control" style="display:none;">
                <option value="">Pilih Perincian Donasi Ketiga</option>
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

                // Mengambil data dari tabel petugas gerai
                $sql = "SELECT * FROM perincian_donasi_3";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_perincian_donasi_3'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group" id="form-bentuk-donasi3" style="display:none;">
            <label for="bentuk_donasi3" class="form-label">Bentuk Donasi Ketiga:</label>
            <select name="bentuk_donasi3" id="bentuk_donasi3" class="form-control">
                <option value="">Pilih Bentuk Donasi Ketiga</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang3" style="display:none;">
            <label for="jumlah_rp3" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp3" id="jumlah_rp3" class="form-control" placeholder="Jumlah Donasi Ketiga (Rp)">
        </div>
        <div class="form-group" id="form-jumlah-barang3" style="display:none;">
            <label for="jumlah_paket3" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket3" id="jumlah_paket3" class="form-control" placeholder="Jumlah Donasi Ketiga (Paket)">
        </div>

        <div class="form-group">
            <label for="perincian_donasi4" class="form-label" id="label-perincian-donasi4" style="display:none;">Donasi Keempat:</label>
            <select name="perincian_donasi4" id="perincian_donasi4" class="form-control" style="display:none;">
                <option value="">Pilih Perincian Donasi Keempat</option>
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

                // Mengambil data dari tabel petugas gerai
                $sql = "SELECT * FROM perincian_donasi_4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_perincian_donasi_4'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group" id="form-bentuk-donasi4" style="display:none;">
            <label for="bentuk_donasi4" class="form-label">Bentuk Donasi Keempat:</label>
            <select name="bentuk_donasi4" id="bentuk_donasi4" class="form-control">
                <option value="">Pilih Bentuk Donasi Keempat</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang4" style="display:none;">
            <label for="jumlah_rp4" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp4" id="jumlah_rp4" class="form-control" placeholder="Jumlah Donasi Keempat (Rp)">
        </div>
        <div class="form-group" id="form-jumlah-barang4" style="display:none;">
            <label for="jumlah_paket4" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket4" id="jumlah_paket4" class="form-control" placeholder="Jumlah Donasi Keempat (Paket)">
        </div>

        <div class="form-group">
            <label for="perincian_donasi5" class="form-label" id="label-perincian-donasi5" style="display:none;">Donasi Kelima:</label>
            <select name="perincian_donasi5" id="perincian_donasi5" class="form-control" style="display:none;">
                <option value="">Pilih Perincian Donasi Kelima:</option>
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

                // Mengambil data dari tabel petugas gerai
                $sql = "SELECT * FROM perincian_donasi_5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data ke dropdown
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama_perincian_donasi_5'] . '</option>';
                    }
                } else {
                    echo '<option value="">Tidak ada data</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>
        <div class="form-group" id="form-bentuk-donasi5" style="display:none;">
            <label for="bentuk_donasi5" class="form-label">Bentuk Donasi Kelima::</label>
            <select name="bentuk_donasi5" id="bentuk_donasi5" class="form-control">
                <option value="">Pilih Bentuk Donasi Kelima:</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang5" style="display:none;">
            <label for="jumlah_rp5" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp5" id="jumlah_rp5" class="form-control" placeholder="Jumlah Donasi Kelima: (Rp)">
        </div>
        <div class="form-group" id="form-jumlah-barang5" style="display:none;">
            <label for="jumlah_paket5" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket5" id="jumlah_paket5" class="form-control" placeholder="Jumlah Donasi Kelima: (Paket)">
        </div>

        <div class="form-group">
            <label for="total_rp" class="form-label">Total Donasi (Rp):</label>
            <input type="number" name="total_rp" id="total_rp" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="total_paket" class="form-label">Total Donasi (Paket):</label>
            <input type="number" name="total_paket" id="total_paket" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="cara_pembayaran" class="form-label">Cara Pembayaran:</label>
            <select name="cara_pembayaran" id="cara_pembayaran" class="form-control">
                <option value="">Pilih Cara Pembayaran</option>
                <option value="tunai">Tunai</option>
                <option value="transfer">Transfer</option>
            </select>
        </div>

        <div id="form-bukti-transfer" style="display:none;">
            <div class="form-group">
                <label for="bukti_transfer" class="form-label">Bukti Transfer:</label>
                <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control">
            </div>
        </div>
   
        <div class="form-group"> 
            <label for="keterangan" class="form-label">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea> 
        </div>
        <button type="submit" class="btn btn-donasi">Simpan Donasi</button>
    </form>

    <footer class="bg-gray-800 text-white p-8">
    <h5 class="text-2xl font-bold mb-4">Hubungi Kami</h5>
    <address class="mb-4">
        <strong class="block">Yayasan Permata Mojokerto</strong>
        Jl. Tropodo No 847 A, Kelurahan Meri, <br>
        Kecamatan Magersari, Kota Mojokerto, <br>
        Provinsi Jawa Timur, 61315 <br>
        <abbr title="Phone" class="text-gray-400">Phone:</abbr> (021) 1234567<br>
        <abbr title="Email" class="text-gray-400">Email:</abbr> <a href="mailto:info@yayasanpermatamojokerto.org" class="text-blue-500 hover:underline">info@yayasanpermatamojokerto.org</a>
    </address>
    </footer>

    <script>
        document.getElementById("bentuk_donasi").addEventListener("change", function() {
            if (this.value == "uang") {
                document.getElementById("form-jumlah-uang").style.display = "block";
                document.getElementById("form-jumlah-barang").style.display = "none";
            } else if (this.value == "barang") {
                document.getElementById("form-jumlah-uang").style.display = "none";
                document.getElementById("form-jumlah-barang").style.display = "block";
            } else {
                document.getElementById("form-jumlah-uang").style.display = "none";
                document.getElementById("form-jumlah-barang").style.display = "none";
            }
        });

        document.getElementById("perincian_donasi").addEventListener("change", function() {
            if (this.value != "") {
                document.getElementById("perincian_donasi2").style.display = "block";
                document.getElementById("label-perincian-donasi2").style.display = "block";
                document.getElementById("form-bentuk-donasi2").style.display = "block";
            }
        });
        document.getElementById("bentuk_donasi2").addEventListener("change", function() {
            if (this.value == "uang") {
                document.getElementById("form-jumlah-uang2").style.display = "block";
                document.getElementById("form-jumlah-barang2").style.display = "none";
            } else if (this.value == "barang") {
                document.getElementById("form-jumlah-uang2").style.display = "none";
                document.getElementById("form-jumlah-barang2").style.display = "block";
            } else {
                document.getElementById("form-jumlah-uang2").style.display = "none";
                document.getElementById("form-jumlah-barang2").style.display = "none";
            }
        });

        document.getElementById("perincian_donasi2").addEventListener("change", function() {
            if (this.value != "") {
                document.getElementById("perincian_donasi3").style.display = "block";
                document.getElementById("label-perincian-donasi3").style.display = "block";
                document.getElementById("form-bentuk-donasi3").style.display = "block";
            }
        });
        document.getElementById("bentuk_donasi3").addEventListener("change", function() {
            if (this.value == "uang") {
                document.getElementById("form-jumlah-uang3").style.display = "block";
                document.getElementById("form-jumlah-barang3").style.display = "none";
            } else if (this.value == "barang") {
                document.getElementById("form-jumlah-uang3").style.display = "none";
                document.getElementById("form-jumlah-barang3").style.display = "block";
            } else {
                document.getElementById("form-jumlah-uang3").style.display = "none";
                document.getElementById("form-jumlah-barang3").style.display = "none";
            }
        });

        document.getElementById("perincian_donasi3").addEventListener("change", function() {
            if (this.value != "") {
                document.getElementById("perincian_donasi4").style.display = "block";
                document.getElementById("label-perincian-donasi4").style.display = "block";
                document.getElementById("form-bentuk-donasi4").style.display = "block";
            }
        });
        document.getElementById("bentuk_donasi4").addEventListener("change", function() {
            if (this.value == "uang") {
                document.getElementById("form-jumlah-uang4").style.display = "block";
                document.getElementById("form-jumlah-barang4").style.display = "none";
            } else if (this.value == "barang") {
                document.getElementById("form-jumlah-uang4").style.display = "none";
                document.getElementById("form-jumlah-barang4").style.display = "block";
            } else {
                document.getElementById("form-jumlah-uang4").style.display = "none";
                document.getElementById("form-jumlah-barang4").style.display = "none";
            }
        });

        document.getElementById("perincian_donasi4").addEventListener("change", function() {
            if (this.value != "") {
                document.getElementById("perincian_donasi5").style.display = "block";
                document.getElementById("label-perincian-donasi5").style.display = "block";
                document.getElementById("form-bentuk-donasi5").style.display = "block";
            }
        });
        document.getElementById("bentuk_donasi5").addEventListener("change", function() {
            if (this.value == "uang") {
                document.getElementById("form-jumlah-uang5").style.display = "block";
                document.getElementById("form-jumlah-barang5").style.display = "none";
            } else if (this.value == "barang") {
                document.getElementById("form-jumlah-uang5").style.display = "none";
                document.getElementById("form-jumlah-barang5").style.display = "block";
            } else {
                document.getElementById("form-jumlah-uang5").style.display = "none";
                document.getElementById("form-jumlah-barang5").style.display = "none";
            }
        });

        function calculateTotals() {
            // Initialize total variables
            var totalRp = 0;
            var totalPaket = 0;

            // Get all the input fields that represent the amount of Rp
            var rpInputs = document.querySelectorAll('input[id^="jumlah_rp"]');

            // Get all the input fields that represent the number of packages
            var paketInputs = document.querySelectorAll('input[id^="jumlah_paket"]');

            // Loop through each input field and add its value to the total variables
            rpInputs.forEach(function(input) {
                totalRp += parseInt(input.value || 0);
            });

            paketInputs.forEach(function(input) {
                totalPaket += parseInt(input.value || 0);
            });

            // Update the total input fields with the total values
            document.getElementById('total_rp').value = totalRp;
            document.getElementById('total_paket').value = totalPaket;
        }
        // Get all the input fields that represent the amount of Rp and the number of packages
        var amountInputs = document.querySelectorAll('input[id^="jumlah_rp"], input[id^="jumlah_paket"]');

        // Loop through each input field and add an event listener for the 'input' event
        amountInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                calculateTotals();
            });
        });


        
    document.getElementById("cara_pembayaran").addEventListener("change", function() {
        if (this.value == "transfer") {
            document.getElementById("form-bukti-transfer").style.display = "block";

            // Check if any donation type is 'uang'
            const donationTypes = document.querySelectorAll('select[id^="perincian_donasi"], select[id^="perincian_donasi2"], select[id^="perincian_donasi3"], select[id^="perincian_donasi4"], select[id^="perincian_donasi5"]');
            let donationTypeUangFound = false;

            donationTypes.forEach(function(select) {
                if (select.value !== "" && select.options[select.selectedIndex].getAttribute('data-donation-type') === 'uang') {
                    donationTypeUangFound = true;
                }
            });

            // If no 'uang' donation type is found, hide the input fields related to money donation
            if (!donationTypeUangFound) {
                const moneyInputs = document.querySelectorAll('input[id^="jumlah_rp"], select[id^="bentuk_donasi"]');
                moneyInputs.forEach(function(input) {
                    input.style.display = "none";
                });
            } else {
                // Display the input fields related to money donation
                const moneyInputs = document.querySelectorAll('input[id^="jumlah_rp"], select[id^="bentuk_donasi"]');
                moneyInputs.forEach(function(input) {
                    input.style.display = "block";
                });
            }
        } else {
            document.getElementById("form-bukti-transfer").style.display = "none";

            // Hide the input fields related to money donation
            const moneyInputs = document.querySelectorAll('input[id^="jumlah_rp"], select[id^="bentuk_donasi"]');
            moneyInputs.forEach(function(input) {
                input.style.display = "none";
            });
        }
    });

    // Add a change event listener for each donation type select
    const donationTypes = document.querySelectorAll('select[id^="perincian_donasi"], select[id^="perincian_donasi2"], select[id^="perincian_donasi3"], select[id^="perincian_donasi4"], select[id^="perincian_donasi5"]');
    donationTypes.forEach(function(select) {
        select.addEventListener("change", function() {
            if (select.value !== "") {
                const selectedDonationType = select.options[select.selectedIndex].getAttribute('data-donation-type');
                const donationIndex = select.id.split("_")[1];

                // Show donation type select and input based on selected donation type
                document.getElementById("bentuk_donasi" + donationIndex).style.display = "block";
                if (selectedDonationType === 'uang') {
                    document.getElementById("form-jumlah-uang" + donationIndex).style.display = "block";
                    document.getElementById("form-jumlah-barang" + donationIndex).style.display = "none";
                } else {
                    document.getElementById("form-jumlah-uang" + donationIndex).style.display = "none";
                    document.getElementById("form-jumlah-barang" + donationIndex).style.display = "block";
                }
            } else {
                document.getElementById("bentuk_donasi" + select.id.split("_")[1]).style.display = "none";
            }
        });
    });

    // Add a change event listener for each donation amount select
    const donationAmounts = document.querySelectorAll('select[id^="bentuk_donasi"], select[id^="bentuk_donasi2"], select[id^="bentuk_donasi3"], select[id^="bentuk_donasi4"], select[id^="bentuk_donasi5"]');
    donationAmounts.forEach(function(select) {
        select.addEventListener("change", function() {
            const donationIndex = select.id.split("_")[1];

            // Show or hide donation amount input based on selected donation type
            if (select.value === 'uang') {
                document.getElementById("form-jumlah-uang" + donationIndex).style.display = "block";
                document.getElementById("form-jumlah-barang" + donationIndex).style.display = "none";
            } else {
                document.getElementById("form-jumlah-uang" + donationIndex).style.display = "none";
                document.getElementById("form-jumlah-barang" + donationIndex).style.display = "block";
            }
        });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>