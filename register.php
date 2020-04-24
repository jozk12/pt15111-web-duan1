<?php
session_start();
require_once "./config/utils.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ĐĂNG KÝ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= LOGIN_THEME_ASSET_URL ?>images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= LOGIN_THEME_ASSET_URL ?>css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= LOGIN_THEME_ASSET_URL ?>images/img-01.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" id="register-form" action="<?= BASE_URL.'save-register.php'?>" method="post">
                    <div class="login100-form-avatar">
                        <img src="<?= LOGIN_THEME_ASSET_URL ?>images/avatar-01.png" alt="AVATAR">
                    </div>
                    <span class="login100-form-title p-t-20 p-b-45">
                        Gradium Hotel
                    </span>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                        <input class="input100" type="text" name="name"
                            <?php if (isset($_GET['nameerr'])) : ?>
                                <?=$_GET['nameerr']?>
                            <?php elseif(isset($_GET['nameerr'])==""): ?>
                               placeholder="Họ tên"
                            <?php else:?>
                                placeholder="Họ tên"
                            <?php endif ?>
                        >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>

                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
                        <input class="input100" type="text" name="email"
                            <?php if (isset($_GET['emailerr'])) : ?>
                                placeholder="<?=$_GET['emailerr']?>"
                            <?php elseif(isset($_GET['emailerr'])==""): ?>
                               placeholder="Email"
                            <?php else:?>
                                placeholder="Email"
                            <?php endif;?>
                        >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                        <input class="input100" type="password" name="password"
                            <?php if (isset($_GET['passworderr'])) : ?>
                                placeholder="<?=$_GET['passworderr']?>"
                            <?php elseif(isset($_GET['passworderr'])==""): ?>
                                placeholder="Password"
                            <?php else:?>
                                placeholder="Password"
                            <?php endif;?>
                        >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Confirm password is required">
                        <input class="input100" type="password" name="cfpassword"
                            <?php if (isset($_GET['cfpassworderr'])) : ?>
                                placeholder="<?=$_GET['cfpassworderr']?>"
                            <?php elseif(isset($_GET['cfpassworderr'])==""):?>
                                placeholder="Nhập lại mật khẩu"
                            <?php else: ?>
                                placeholder="Nhập lại mật khẩu"
                            <?php endif;?>
                        >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Phone number is required">
                        <input class="input100" type="text" name="phone_number" placeholder="Số điện thoại">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit">
                            Đăng ký
                        </button>
                    </div>

                    <div class="text-center w-full p-t-80">
                        <a href="<?= BASE_URL.'forgot-request.php'?>" class="txt1">
                            Quên mật khẩu?
                        </a>
                    </div>

                    <div class="text-center w-full p-t-10 p-b-100">
                        <a class="txt1" href="login.php">
                            <i class="fa fa-long-arrow-left"></i>
                            Đăng nhập
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--===============================================================================================-->
    <script src="<?= LOGIN_THEME_ASSET_URL ?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= LOGIN_THEME_ASSET_URL ?>vendor/bootstrap/js/popper.js"></script>
    <script src="<?= LOGIN_THEME_ASSET_URL ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= LOGIN_THEME_ASSET_URL ?>vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= LOGIN_THEME_ASSET_URL ?>js/main.js"></script>
</body>

</html>