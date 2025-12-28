const loginForm = document.querySelector(".login-form");
const registerForm = document.querySelector(".register-form");
const wrapper = document.querySelector(".wrapper");
const loginTitle = document.querySelector(".title-login");
const registerTitle = document.querySelector(".title-register");
const signUpBtn = document.querySelector("#SignUpBtn");
const signInBtn = document.querySelector("#SignInBtn");

function loginFunction(){
    loginForm.style.left = "50%";
    loginForm.style.opacity = 1;
    registerForm.style.left = "150%";
    registerForm.style.opacity = 0;
    wrapper.style.height = "500px";
    loginTitle.style.top = "50%";
    loginTitle.style.opacity = 1;
    registerTitle.style.top = "50px";
    registerTitle.style.opacity = 0;
}

function registerFunction(){
    loginForm.style.left = "-50%";
    loginForm.style.opacity = 0;
    registerForm.style.left = "50%";
    registerForm.style.opacity = 1;
    wrapper.style.height = "580px";
    loginTitle.style.top = "-60px";
    loginTitle.style.opacity = 0;
    registerTitle.style.top = "50%";
    registerTitle.style.opacity = 1;
}


function submitRegister(e) {
    e.preventDefault();

    const username = document.getElementById("reg-name").value.trim();
    const email = document.getElementById("reg-email").value.trim();
    const password = document.getElementById("reg-pass").value;

    fetch("register.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(async res => {
        if (!res.ok) {
            const text = await res.text();
            throw new Error(text || "HTTP error " + res.status);
        }
        return res.json();
    })
    .then(data => {
        alert(data.message);
        if (data.status === "success") {
            // Tidak pindah halaman, cukup reset form saja jika perlu
            document.querySelector(".register-form").reset();
        }
    })
    .catch(error => {
        alert("Terjadi kesalahan saat mengirim data.");
        console.error(error);
    });
}

function submitLogin(e) {
    e.preventDefault();

    const email = document.getElementById("log-email").value.trim();
    const password = document.getElementById("log-pass").value;

    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(async res => {
        if (!res.ok) {
            const text = await res.text();
            throw new Error(text || "HTTP error " + res.status);
        }
        return res.json();
    })
    .then(data => {
        alert(data.message);
        if (data.status === "success") {
            if (data.role === "admin") {
                window.location.href = "admin.html";
            } else {
                window.location.href = "dashboard.php"; // Atau halaman untuk user biasa
            }
        }
    })
    .catch(error => {
        alert("Terjadi kesalahan saat mengirim data.");
        console.error(error);
    });
}

