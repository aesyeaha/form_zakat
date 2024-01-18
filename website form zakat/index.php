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
                labore et dolore magna aliqua. <br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="carousel-content">
                <h1>Menu</h1>
                <img src="menu.jpg" alt="logo" class="logo">
                <br>
                <button class="lanjut-button" onclick="lanjutKeFormDonasi()">Form Donasi</button>
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