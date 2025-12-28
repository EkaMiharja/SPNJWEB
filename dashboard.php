<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");  // Atau arahkan ke halaman login jika belum login
    exit;
}

// Ambil username dari sesi
$username = htmlspecialchars($_SESSION['username']);
?>

<!-- HTML START -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="icon" type="image/svg+xml" href="asset/logo.svg">

</head>
<body>
    <!-- NAVBAR START -->
    <nav class="nav">
                <ul class="nav__list">
                <!-- NAVBAR ITEM -->
                    <li class="nav__item">
                        <a href="#home" class="nav__link">
                        <i onclick="navHome()" class="fa-solid fa-house"  style="font-size: 18px;"></i>
                        <span class="nav__name">Home</span>
                        </a>
                    </li>
                <!-- NAVBAR ITEM -->
                    <li class="nav__item">
                        <a href="#recent" class="nav__link" style="position: relative;">
                        <i onclick="navCart()" class="fa-solid fa-receipt" style="font-size: 18px;"></i>
                        <span class="nav__name">Recent</span>
                        <span id="cart-notification-badge" class="badge rounded-pill bg-danger" style="position: absolute; top: -6px; right: 6px; display: inline-block; font-size: 10px;">
                        </span>
                        </a>
                    </li>
                <!-- NAVBAR ITEM -->
                    <li class="nav__item">
                        <a href="#explore" class="nav__link">
                        <i onclick="navExplore()" class="fa-solid fa-compass" style="font-size: 18px;"></i>
                        <span class="nav__name">Explore</span>
                        </a>
                    </li>
                <!-- NAVBAR ITEM -->
                    <li class="nav__item">
                        <a href="#user" class="nav__link">
                        <i onclick="navUser()" class="fa-solid fa-user" style="font-size: 18px;"></i>
                        <span class="nav__name">User</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- NAVBAR END -->
            
        <!-- ALERT KERANJANG START -->
        <div id="successAlert" class="alert alert-success alert-dismissible fade fixed-top w-100 text-center d-none" role="alert" style="z-index: 1050;">
            <strong>Berhasil!</strong> Produk telah ditambahkan ke keranjang.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- ALERT KERANJANG END -->
</div>

    <div class="container-fluid px-3">
        <header class="header" id="header">
            <h2>Hi, <span class="name"><?php echo $username; ?></span></h2>
            <p>Mau makan apa hari ini?</p>
        </header>

        <!-- CAROUSEL START -->
        <div class="w-100 mt-3">
            <div id="promoCarousel" class="carousel slide w-100" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4">
                    <div class="carousel-item active">
                        <img src="asset/promo-1.jpg" class="d-block w-100 carousel-image" alt="Promo 1">
                    </div>
                        <div class="carousel-item">
                            <img src="asset/promo-2.jpg" class="d-block w-100 carousel-image" alt="Promo 2">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/promo-3.jpg" class="d-block w-100 carousel-image" alt="Promo 3">
                        </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
        <!-- CAROUSEL END -->

        <!-- SEARCH BAR START -->
        <div class="search-bar">
            <input type="text" placeholder="Ayam Bakar, Nasi Goreng">
            <button class="filter-btn"><i class="fa-solid fa-sliders"></i></button>
        </div>
        <!-- SEARCH BAR END -->
    </div>

<!-- MENU MAKANAN START -->
<div class="container-fluid container-menu py-1 px-3 mt-3 mb-5">
        <div class="row justify-content-start py-2 g-4 ">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-1.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bakso Wonogiri - Pengadegan</h6>
                        <p class="card-text">Bakso dengan rasa asli nusantara yang kaya akan rempah-rempah dan cita rasa lokal Indonesia.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 30.000</h5>
                        <button class="btn btn-primary btn-sm px-2 py-1" onclick="addToCart('Bakso Wonogiri - Pengadegan', 30000, 'asset/menu-1.webp')"> Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-2.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ayam Penyet - Guntur</h6>
                        <p class="card-text">Ayam penyet dengan rasa asli nusantara yang kaya akan rempah-rempah dan cita rasa lokal Indonesia.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 20.000</h5>
                        <button class="btn btn-primary btn-sm px-2 py-1" onclick="addToCart('Ayam Penyet - Guntur', 20000, 'asset/menu-2.webp')"> Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-3.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ayam Bakar - Guntur</h5>
                        <p class="card-text">Ayam bakar dengan rasa asli nusantara yang kaya akan rempah-rempah dan cita rasa lokal Indonesia.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 20.000</h5>
                        <button class="btn btn-primary btn-sm px-2 py-1" onclick="addToCart('Ayam Bakar - Guntur', 20000, 'asset/menu-3.webp')"> Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-4.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Milksmith - Petojo Utara</h5>
                        <p class="card-text">Milkshake untuk minuman yang lezat dan creamy, cocok untuk melepas dahaga di hari yang panas.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 15.000</h5>
                        <button class="btn btn-primary btn-sm px-2 py-1" onclick="addToCart('Milksmith - Petojo Utara', 15000, 'asset/menu-4.webp')"> Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-5.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pisang Nugget - Depok</h5>
                        <p class="card-text">Pisang nugget yang crispy di luar dan lembut di dalam, sangat cocok sebagai camilan yang lezat dan mengenyangkan.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 20.000</h5>
                        <button class="btn btn-primary btn-sm px-2 py-1" onclick="addToCart('Pisang Nugget - Depok', 20000, 'asset/menu-5.webp')"> Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-6.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Goreng - Bogor</h5>
                        <p class="card-text">Nasi goreng yang gurih dan pedas, dengan tambahan telur, sayuran, dan daging ayam, membuatnya menjadi hidangan yang lezat dan mengenyangkan.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 30.000</h5>
                        <button class="btn btn-primary btn-sm px-2 py-1" onclick="addToCart('Nasi Goreng - Bogor', 30000, 'asset/menu-6.webp')">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-7.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gerobak LO - Depok</h5>
                        <p class="card-text">Nasi goreng yang gurih dan pedas, dengan tambahan telur, sayuran, dan daging ayam, membuatnya menjadi hidangan yang lezat dan mengenyangkan.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 20.000</h5>
                        <button class="btn btn-primary btn-sm px-2 py-1 " onclick="addToCart('Gerobak LO - Depok', 20000, 'asset/menu-7.webp')">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="asset/menu-8.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sate Padang - Depok</h5>
                        <p class="card-text">Sate padang yang khas dengan kuah kacangnya yang gurih dan lezat, serta daging sapi yang empuk dan dibumbui dengan rempah-rempah khas Minang.</p>
                    </div>
                    <div class="mb-5 d-flex align-items-center gap-2 justify-content-between px-4">
                        <h5>Rp 15.000</h5>
                        <button class="btn btn-primary btn btn-primary btn-sm px-2 py-1 " onclick="addToCart('Sate Padang - Depok', 20000, 'asset/menu-8.webp')">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MENU MAKANAN END -->


<!-- JS UNTUK BUY NOW START -->
<script>
function navHome() {
    window.location.href = "dashboard.php";
}
function navCart() {
    window.location.href = "recent.html";
}

function navExplore() {
    window.location.href = "explore.html";
}

function navUser() {
    window.location.href = "user.php";
}
// =================================
// FUNGSI LENCANA NOTIFIKASI GLOBAL
// =================================
function updateCartBadge() {
    // Cari elemen lencana di halaman
    const badge = document.getElementById('cart-notification-badge');
    
    // Pastikan elemen lencana ada di halaman saat ini sebelum melanjutkan
    if (badge) {
        // Ambil data keranjang dari localStorage
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        if (cart.length > 0) {
            badge.textContent = cart.length; // Tampilkan jumlah item
            badge.style.display = 'inline-block'; // Tampilkan lencana
        } else {
            badge.style.display = 'none'; // Sembunyikan jika keranjang kosong
        }
    }
}

// Ini memastikan lencana selalu dicek setiap kali halaman baru dibuka
document.addEventListener('DOMContentLoaded', function() {
    updateCartBadge();
});
    function addToCart(name, price, image) {
        const item = { name, price, image, quantity: 1 };
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push(item);
        localStorage.setItem('cart', JSON.stringify(cart));

        // ALERT DENGAN BOOTSTRAP
    const alert = document.getElementById('successAlert');
        alert.innerHTML = `<strong>Berhasil!</strong> ${name} telah ditambahkan ke keranjang.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
        alert.classList.remove('d-none');
        alert.classList.add('show');

    // Sembunyikan setelah 3 detik
    setTimeout(() => {
        alert.classList.remove('show');
        alert.classList.add('d-none');
    }, 3000);

}
</script>
<!-- JS UNTUK BUY NOW END -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
