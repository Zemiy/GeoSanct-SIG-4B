<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="assets/style/login.css" />
    <link rel="stylesheet" href="assets/style/transition.css" />
    <title>Login | GEOSanct</title>
  </head>
  <body>
    <img src="assets/images/login-bg.png" alt="Background Image" class="background-image" />
    <div class="container">
      <div class="box">
        <div class="box-login" id="login">
          <div class="top-header">
            <img src="assets/images/logo.png" alt="Logo" class="logo" />
            <h3>WELCOME!!!</h3>
            <small>Silahkan login ke akun anda</small>
          </div>
          <FORM ACTION="log.php" METHOD="POST" NAME="input">
          <div class="input-group">
            <div class="input-field">
              <input type="text" name="logUsername" class="input-box" id="logUsername" required />
              <label for="Username">Username</label>
            </div>
            <div class="input-field">
              <input type="password" name="logPassword" class="input-box" id="logPassword" required />
              <label for="logPassword">Password</label>
              <div class="eye-area">
                <div class="eye-box" onclick="myLogPassword()">
                  <i class="fa-regular fa-eye" id="eye"></i>
                  <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                </div>
              </div>
            </div>
            <div class="remember">
              <input type="checkbox" id="formCheck" class="check" />
              <label for="formCheck">Ingat saya!</label>
            </div>
            <div class="input-field">
              <input type="submit" name="input" class="input-submit" value="Sign In" required />
            </div>
            </FORM>
            <div class="forgot">
              <a href="#">lupa password?</a>
            </div>
          </div>
        </div>

        <!---------------------------- register --------------------------------------->

        <div class="box-register" id="register">
          <div class="top-header">
            <h3>BELUM PUNYA AKUN?</h3>
            <small>Daftar Sekarang</small>
          </div>
          <div class="input-group">
            <div class="input-field">
              <input type="text" class="input-box" id="regUsername" required />
              <label for="regUsername">Username</label>
            </div>
            <div class="input-field">
              <input type="text" class="input-box" id="regLevel" required />
              <label for="regLevel">administrator / pengguna</label>
            </div>
            <div class="input-field">
              <input type="password" class="input-box" id="regPassword" required />
              <label for="regPassword">Password</label>
              <div class="eye-area">
                <div class="eye-box" onclick="myRegPassword()">
                  <i class="fa-regular fa-eye" id="eye-2"></i>
                  <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                </div>
              </div>
            </div>

            <div class="remember">
              <input type="checkbox" id="formCheck2" class="check" />
              <label for="formCheck2">Remember Me</label>
            </div>
            <div class="input-field">
              <input type="submit" class="input-submit" value="Sign Up" required />
            </div>
          </div>
        </div>
        <div class="switch">
          <a href="#" class="login active" onclick="login()">Login</a>
          <a href="#" class="register" onclick="register()">Register</a>
          <div class="btn-active" id="btn"></div>
        </div>
        <div class="back-index">
          <a href="index.html"><<<</a>
        </div>
      </div>
    </div>
  
  
    <?php if (isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])) { ?>
        <div class="log-error">
            <?php echo $_SESSION['login_error']; ?>
        </div>
        <?php

        unset($_SESSION['login_error']);
    } ?>


    <script src="assets/script/login.js"></script> 

  </body>
</html>
