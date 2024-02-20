<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .photo-credit {
            margin-top: 1rem;
            font-size: 0.8rem;
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
                <li class="nav-item active">
                    <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form_donasi.php">Form Donasi</a>
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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="./image/barbeku.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Barbeku</h5>
            <p>Barbeku Barang Bekas Berkualitas.</p>
            <p class="photo-credit">(Gambar oleh Furkan İsmail Dokuzlar dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/yatim.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Cinta Yatim</h5>
            <p>Rp, 100.000,-/Paket.</p> 
            <p class="photo-credit">(Gambar oleh Pexels dari Pixabay)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/fidyah.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Fidyah</h5>
            <p>Rp, 25.000,-/Hari.</p>
            <p class="photo-credit">(Gambar oleh Ahmed Aqtai dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/puasa.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Paket Buka Puasa</h5>
            <p>Rp, 25.000,-/Hari.</p>
            <p class="photo-credit">(Gambar oleh Naim Benjelloun dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/sembako.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Semabko Ramadhan</h5>
            <p>Nominal Terbaik.</p>
            <p class="photo-credit">(Gambar oleh SlimMars 13 dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/tabungan.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Tabungan Surga</h5>
            <p>Nominal Terbaik.</p>
            <p class="photo-credit">(Gambar oleh Towfiqu barbhuiya dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/masjid.jpg" class="d-block w-100" alt="Wakaf Pengembangan Masjid">
        <div class="carousel-caption d-none d-md-block">
            <h5>Wakaf Pengembangan Masjid</h5>
            <p>Rp, 100.000,- atau kelipatannya.</p>
            <p class="photo-credit">(Gambar oleh Pavlo Luchkovski dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/pondok.jpg" class="d-block w-100" alt="Wakaf Pembangunan PPTQ">
        <div class="carousel-caption d-none d-md-block">
            <h5>Wakaf Pembangunan PPTQ</h5>
            <p>Rp, 250.000,- atau kelipatannya.</p>
            <p class="photo-credit">(Gambar oleh Pok Rie dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="./image/quran.jpg" class="d-block w-100" alt="Wakaf al-Qur'an">
        <div class="carousel-caption d-none d-md-block">
            <h5>Wakaf al-Qur'an</h5>
            <p>Rp, 100.000,- atau kelipatannya.</p>
            <p class="photo-credit">(Gambar oleh khats cassim dari Pexels)</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="infaq-shodaqoh.jpg" class="d-block w-100" alt="Infaq dan Shodaqoh">
        <div class="carousel-caption d-none d-md-block">
            <h5>Infaq dan Shodaqoh</h5>
            <p>Nominal Terbaik.</p>simon2579
        </div>
        </div>
        <div class="carousel-item">
        <img src="zakat-fitrah.jpg" class="d-block w-100" alt="Zakat Fitrah">
        <div class="carousel-caption d-none d-md-block">
            <h5>Zakat Fitrah</h5>
            <p>Beras 2,6 Kg atau Rp, 35.000,-</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="zakat-maal.jpg" class="d-block w-100" alt="Zakat Maal">
        <div class="carousel-caption d-none d-md-block">
            <h5>Zakat Maal</h5>
            <p>Sesuai Nishob.</p>
        </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>