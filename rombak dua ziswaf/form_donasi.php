<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <!-- CSS for Navbar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background-color: lightblue; 
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
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
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
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
            <input type="number" name="jumlah_rp" id="jumlah_rp" class="form-control" placeholder="Jumlah Donasi (Rp)" required>
        </div>
        <div class="form-group" id="form-jumlah-barang" style="display:none;">
            <label for="jumlah_paket" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket" id="jumlah_paket" class="form-control" placeholder="Jumlah Donasi (Paket)" required>
        </div>

        <div class="form-group">
        <label for="perincian_donasi2" class="form-label" id="label-perincian-donasi2" style="display:none;">Donasi Kedua:</label>
            <select name="perincian_donasi2" id="perincian_donasi2" class="form-control" required style="display:none;">
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
            <select name="bentuk_donasi2" id="bentuk_donasi2" class="form-control" required>
                <option value="">Pilih Bentuk Donasi Kedua</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang2" style="display:none;">
            <label for="jumlah_rp2" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp2" id="jumlah_rp2" class="form-control" placeholder="Jumlah Donasi Kedua (Rp)" required>
        </div>
        <div class="form-group" id="form-jumlah-barang2" style="display:none;">
            <label for="jumlah_paket2" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket2" id="jumlah_paket2" class="form-control" placeholder="Jumlah Donasi Kedua (Paket)" required>
        </div>

        <div class="form-group">
            <label for="perincian_donasi3" class="form-label" id="label-perincian-donasi3" style="display:none;">Donasi Ketiga:</label>
            <select name="perincian_donasi3" id="perincian_donasi3" class="form-control" required style="display:none;">
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
            <select name="bentuk_donasi3" id="bentuk_donasi3" class="form-control" required>
                <option value="">Pilih Bentuk Donasi Ketiga</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang3" style="display:none;">
            <label for="jumlah_rp3" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp3" id="jumlah_rp3" class="form-control" placeholder="Jumlah Donasi Ketiga (Rp)" required>
        </div>
        <div class="form-group" id="form-jumlah-barang3" style="display:none;">
            <label for="jumlah_paket3" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket3" id="jumlah_paket3" class="form-control" placeholder="Jumlah Donasi Ketiga (Paket)" required>
        </div>

        <div class="form-group">
            <label for="perincian_donasi4" class="form-label" id="label-perincian-donasi4" style="display:none;">Donasi Keempat:</label>
            <select name="perincian_donasi4" id="perincian_donasi4" class="form-control" required style="display:none;">
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
            <select name="bentuk_donasi4" id="bentuk_donasi4" class="form-control" required>
                <option value="">Pilih Bentuk Donasi Keempat</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang4" style="display:none;">
            <label for="jumlah_rp4" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp4" id="jumlah_rp4" class="form-control" placeholder="Jumlah Donasi Keempat (Rp)" required>
        </div>
        <div class="form-group" id="form-jumlah-barang4" style="display:none;">
            <label for="jumlah_paket4" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket4" id="jumlah_paket4" class="form-control" placeholder="Jumlah Donasi Keempat (Paket)" required>
        </div>

        <div class="form-group">
            <label for="perincian_donasi5" class="form-label" id="label-perincian-donasi5" style="display:none;">Donasi Kelima:</label>
            <select name="perincian_donasi5" id="perincian_donasi5" class="form-control" required style="display:none;">
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
            <select name="bentuk_donasi5" id="bentuk_donasi5" class="form-control" required>
                <option value="">Pilih Bentuk Donasi Kelima:</option>
                <option value="uang">Uang</option>
                <option value="barang">Barang</option>
            </select>
        </div>
        <div class="form-group" id="form-jumlah-uang5" style="display:none;">
            <label for="jumlah_rp5" class="form-label">Jumlah (Rp):</label>
            <input type="number" name="jumlah_rp5" id="jumlah_rp5" class="form-control" placeholder="Jumlah Donasi Kelima: (Rp)" required>
        </div>
        <div class="form-group" id="form-jumlah-barang5" style="display:none;">
            <label for="jumlah_paket5" class="form-label">Jumlah Paket:</label>
            <input type="number" name="jumlah_paket5" id="jumlah_paket5" class="form-control" placeholder="Jumlah Donasi Kelima: (Paket)" required>
        </div>
        <button type="submit" class="btn btn-donasi">Simpan Donasi</button>
    </form>

    <footer class="bg-gray-800 text-white p-8">
    <h5 class="text-2xl font-bold mb-4">Hubungi Kami</h5>
    <address class="mb-4">
        <strong class="block">Yayasan Permata Mojokerto</strong>
        Jl. Raya Pondok Gede No. 123<br>
        Pondok Gede, Bekasi<br>
        Jawa Barat 17411<br>
        <abbr title="Phone" class="text-gray-400">Phone:</abbr> (021) 1234567<br>
        <abbr title="Email" class="text-gray-400">Email:</abbr> <a href="mailto:info@al-ikhlaszakat.org" class="text-blue-500 hover:underline">info@al-ikhlaszakat.org</a>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>