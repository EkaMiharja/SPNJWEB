// FUNCTION NAVBAR START
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
// FUNCTION NAVBAR END

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

 // Auto close alert after 1 second
  document.addEventListener('DOMContentLoaded', function () {
    const alertBox = document.getElementById('successAlert');
    if (alertBox) {
      setTimeout(() => {
        // Fade out and remove alert
        alertBox.classList.remove('show');
        alertBox.classList.add('fade');
        setTimeout(() => {
          alertBox.remove();
        }, 300); // Tunggu animasi selesai
      }, 2000); // 2 detik
    }
  });

// FUNCTION LOGOUT START
function logout() {
  localStorage.removeItem("user");
  window.location.href = "login.html";
}
// FUNCTION LOGOUT END