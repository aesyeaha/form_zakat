<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <style>
        .photo-credit {
            margin-top: 1rem;
            font-size: 0.8rem;
        }

        .container {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        h1 {
            font-weight: bold;
            color: #413d3a;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.5;
        }

        img {
            border-radius: 10px;
        }

        .photo-credit {
            margin-top: 1rem;
            font-size: 0.8rem;
        }

        .highlight {
            color: #f06c64;
        }

        .btn-primary {
            background-color: #f06c64;
            border-color: #f06c64;
        }

        .btn-primary:hover {
            background-color: #eb5e57;
            border-color: #eb5e57;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 128, 132, 0.5);
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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form_donasi.php">Form Donasi</a>
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

    <div class="container">
        <h1 class="text-center my-5">Ziswaf Permata</h1>
        <div class="row">
            <div class="col-md-6">
                <p class="lead">Ziswaf Permata menyediakan fasilitas tabungan surga, wakaf pengembangan masjid, wakaf pembangunan PPTQ, dan wakaf al-Qur'an. Selain itu, kami juga menerima zakat maal, zakat fitrah, dan shodaqoh, serta infaq untuk kepentingan umum. </p>
                <p class="lead">Dengan mengambil tindakan sosial yang bermanfaat, kami berharap dapat membantu memakmurkan masyarakat dan mengukir nama Allah SWT di atas segala sesuatu. </p>
            </div>
            <div class="col-md-6">
                <img src="./image/upz.png" class="img-fluid" alt="Yayasan Permata Ansyithoh Ramadhan 1445H">
            </div>
        </div>
    </div>

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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>