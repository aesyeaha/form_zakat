<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permata Ansyithoh Ramadhan 1445H</title>
    <link rel="stylesheet" type="text/css" href="indexstyles.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div id="toggle-btn">&#9776;</div>
        <img src="logo.png" alt="Beranda" id="brand-logo">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    <div class="sidebar">
        <div id="close-btn">&times;</div>
        <img src="logo.png" alt="Ziswaf 1445H" id="sidebar-logo">
        <div class="sidebar-links">
            <a href="index.php">Beranda</a>
            <a href="form_donasi.php">Form Donasi</a>
        </div>
        <div class="sidebar-buttons">
            <button id="share-btn">Share</button>
            <button id="about-btn">About</button>
        </div>
    </div>

    <div class="carousel-container">
        <div class="carousel-wrapper">
            <div class="carousel-content">
                <h1>Permata Ansyithoh Ramadhan <br> 1445H</h1>
                <img src="upz.png" alt="logo" class="logo">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris
                    nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <div class="carousel-content">
                <h1>Menu Zizwaf</h1>
                <table class="menu-table">
                    <tr>
                        <!-- Kolom Kiri -->
                        <td>
                            <div class="menu-container">
                                <div class="menu-item">
                                    <img src="menu1.jpg" alt="Barbeku" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Barbeku</h3>
                                        <p>Barang Bekas Berkualitas.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu2.jpg" alt="Cinta Yatim" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Cinta Yatim</h3>
                                        <p>Rp, 100.000,-/Paket.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu3.jpg" alt="Fidyah" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Fidyah</h3>
                                        <p>Rp, 25.000,-/Hari.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu4.jpg" alt="Paket Buka Puasa" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Paket Buka Puasa</h3>
                                        <p>Rp, 25.000,-/Hari.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu5.jpg" alt="Tabungan Surga" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Tabungan Surga</h3>
                                        <p>Nominal Terbaik.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu6.jpg" alt="Wakaf Pengembangan Masjid" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Wakaf Pengembangan Masjid</h3>
                                        <p>Rp, 100.000,- atau kelipatannya.</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <!-- Kolom Kanan -->
                        <td>
                            <div class="menu-container">
                                <div class="menu-item">
                                    <img src="menu7.jpg" alt="Wakaf Pembangunan PPTQ" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Wakaf Pembebasan dan
                                            Pembangunan PPTQ</h3>
                                        <p>Rp, 250.000,- atau
                                            kelipatannya.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu8.jpg" alt="Wakaf al-Qur'an" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Wakaf al-Qur'an</h3>
                                        <p>Rp, 100.000,- atau kelipatannya.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu9.jpg" alt="Infaq dan Shodaqoh" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Infaq dan Shodaqoh</h3>
                                        <p>Nominal Terbaik.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu10.jpg" alt="Zakat Maal" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Zakat Maal</h3>
                                        <p>Sesuai Nishob.</p>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <img src="menu11.jpg" alt="Zakat Fitrah" class="menu-image">
                                    <div class="menu-description">
                                        <h3>Zakat Fitrah</h3>
                                        <p>Beras 2,6 Kg atau Rp, 35.000,-</p>
                                    </div>
                                </div>
                            </div>
                            <button class="lanjut-button" onclick="lanjutKeFormDonasi()">Form Donasi</button>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <button class="carousel-button prev" onclick="prevPage()">❮</button>
        <button class="carousel-button next" onclick="nextPage()">❯</button>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const closeBtn = document.getElementById('close-btn');
        const sidebar = document.querySelector('.sidebar');
        const carouselWrapper = document.querySelector('.carousel-wrapper');
        const pages = document.querySelectorAll('.carousel-content');
        let currentPage = 0;

        toggleBtn.addEventListener('click', () => {
            sidebar.style.left = '0px';
        });

        closeBtn.addEventListener('click', () => {
            sidebar.style.left = '-250px';
        });

        function nextPage() {
            if (currentPage < pages.length - 1) {
                currentPage++;
                updateCarousel();
            }
        }

        function prevPage() {
            if (currentPage > 0) {
                currentPage--;
                updateCarousel();
            }
        }

        function updateCarousel() {
            const transformValue = `translateX(-${currentPage * 100}%)`;
            carouselWrapper.style.transform = transformValue;
        }

        function lanjutKeFormDonasi() {
            window.location.href = "form_donasi.php";
        }
    </script>

</body>

</html>