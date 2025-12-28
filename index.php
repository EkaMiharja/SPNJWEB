<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
    <link rel="icon" type="image/svg+xml" href="asset/logo.svg">

</head>
<body>
    <div class="wrapper">
        <div class="form-header">
            <div class="titles">
                <div class="title-login">Login</div>
                <div class="title-register">Register</div>
            </div>
        </div>

        <!-- LOGIN FORM START-->
        <form onsubmit="submitLogin(event)" class="login-form" autocomplete="off">
            <!-- Input box untuk email -->
            <div class="input-box">
                <input type="text" name="email" class="input-field" id="log-email" required>
                <!-- Label untuk input field email -->
                <label for="log-email" class="label">Email</label>
                <i class='bx bx-envelope icon'></i>
            </div>

            <!-- Input box untuk password -->
            <div class="input-box">
                <input type="password" name="password" class="input-field" id="log-pass" required>
                <!-- Label untuk input field password -->
                <label for="log-pass" class="label">Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>

            <!-- Input box untuk tombol submit -->
            <div class="input-box">
                <button class="btn-submit" type="submit" name="login">Sign In <i class='bx bx-log-in'></i></button>
            </div>

            <!-- Link untuk register -->
            <div class="switch-form">
                <span>Don't have an account? <a href="#" onclick="registerFunction()">Register</a></span>
            </div>
        </form>
        <!-- LOGIN FORM END-->

        <!-- REGISTER FORM START -->
        <form onsubmit="submitRegister(event)" class="register-form" autocomplete="off">
            <div class="input-box">
                <input type="text" name="username" class="input-field" id="reg-name" required>
                <label for="reg-name" class="label">Username</label>
                <i class='bx bx-user icon'></i>
            </div>
            <div class="input-box">
                <input type="text" name="email" class="input-field" id="reg-email" required>
                <label for="reg-email" class="label">Email</label>
                <i class='bx bx-envelope icon'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" id="reg-pass" required>
                <label for="reg-pass" class="label">Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>
            <div class="form-cols">
                <div class="col-1">
                    <input type="checkbox" id="agree">
                    <label for="agree"> I agree to terms & conditions</label>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="input-box">
                <button class="btn-submit" type="submit" name="register">Sign Up <i class='bx bx-user-plus'></i></button>
            </div>
            <div class="switch-form">
                <span>Already have an account? <a href="#" onclick="loginFunction()">Login</a></span>
            </div>
        </form>
        <!-- REGISTER FORM END -->
    </div>

    <script src="script.js"></script>
</body>
</html>