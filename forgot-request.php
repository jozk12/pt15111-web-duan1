<?php
session_start();
require_once "./config/utils.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= LOGIN_THEME_ASSET_URL ?>images/icons/favicon.ico"/>
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
            <form class="login100-form validate-form" action="post-request.php" method="post">
                <div class="login100-form-avatar">
                    <img src="<?= LOGIN_THEME_ASSET_URL ?>images/avatar-01.png" alt="AVATAR">
                </div>
                <span class="login100-form-title p-t-20 p-b-45">
						Gradium Hotel
					</span>
                <div class="wrap-input100 validate-input m-b-10" data-validate = "Yêu cầu nhập email">
                    <input class="input100" type="text" name="email"
                    <?php if(isset($_GET['emailerr'])):?>
                        placeholder="<?= $_GET['emailerr']?>"
                    <?php else:?>
                        placeholder="Email"
                    <?php endif;?>
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
                </div>
                <br>
                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn" type="submit">
                        RESET PASSWORD
                    </button>
                </div>

                <div class="text-center w-full p-t-150 p-b-10">
                    <a class="txt1" href="register.php">
                        Tạo tài khoản mới
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
                <div class="text-center w-full p-t-10 p-b-100">
                    <a class="txt1" href="<?=BASE_URL?>">
                        <i class="fa fa-long-arrow-left"></i>
                        Quay lại
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
<?php include_once './_share/msg_warn.php' ?>

</body>
</html>