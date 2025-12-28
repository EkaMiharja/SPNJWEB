<?php
$success = isset($_GET['success']) && $_GET['success'] === 'true';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="user.css">
    <!-- Goggle Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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


<div class="container mt-3">
    <div class="row g-4 justify-content-center">
      <!-- Profile Sidebar -->
      <div class="col-md-3">
        <div class="profile-card">
  <img src="asset/profile.jpg" alt="Profile" class="profile-img" />
  <h5 class="mt-2 mb-1">Profile</h5>
  <p class="mb-1">+628474737292</p>
  <p class="text-muted mb-0">Jl. Kelapa Dua No. 71,<br> Jakarta Barat</p>

  <!-- Link Pesanan Saya -->
  <a href="pesanan.html" class="btn btn-outline-success mt-3 d-flex align-items-center justify-content-center gap-2">
    <i class="fa-solid fa-box"></i> Pesanan Saya
  </a>
  <!-- Tombol Logout -->
<a href="index.php" class="btn btn-outline-danger mt-2 d-flex align-items-center justify-content-center gap-2">
  <i class="fa-solid fa-right-from-bracket"></i> Logout
</a>
</div>
      </div>

      <!-- Form Section -->
      <div class="col-md-7">
        <div class="form-card">
          <h5 class="mb-2 fw-bold">General Information</h5>
            <?php if ($success): ?>
  <div  id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> Data berhasil disimpan.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
          <form action="save_user.php" method="POST">
            <div class="row g-1">
              <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" id="firstName" name="firstName" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="birthDate" class="form-label">Birth Date</label>
                <input type="date" id="birthDate" name="birthDate" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" id="gender" name="gender" class="form-control" />
              </div>
              <div class="col-md-6">
                <label for="phone" class="form-label">Handphone</label>
                <input type="text" id="phone" name="phone" class="form-control" />
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" />
              </div>
              <div class="col-12">
                <label for="address" class="form-label">Residential Address</label>
                <textarea id="address" name="address" class="form-control" rows="2"></textarea>
              </div>
              <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-update px-4 py-2">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper (Wajib untuk alert dismiss) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JAVASCRIPT USER -->
<script src="user.js"></script>
</body>
</html>