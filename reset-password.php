<?php
session_start();
require_once './config/utils.php';

$token=isset($_GET['token'])?$_GET['token']:"";
$email=isset($_GET['email'])?$_GET['email']:"";
$getForgot = "select * from forgot_password where token='$token' and email = '$email'";
$forgot = queryExecute($getForgot, false);
if(!$forgot){
    header('location:'.BASE_URL."forgot-reset.php?msg=Link không tồn tại");
    die;
}
$timezone  = 'Asia/Ho_Chi_Minh';
date_default_timezone_set($timezone);
$current_time = date_format(date_create(), 'Y-m-d H:i:s');
$expire_time = $forgot['expire_time'];
$diff_today = strtotime($current_time)-strtotime($expire_time);
$total_today = $diff_today/(60*60*24);
?>
<?php if($total_today>0&&$total_today<1):?>
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
                <form class="login100-form validate-form" action="post-reset-password.php" method="post">
                    <div class="login100-form-avatar">
                        <img src="<?= LOGIN_THEME_ASSET_URL ?>images/avatar-01.png" alt="AVATAR">
                    </div>
                    <span class="login100-form-title p-t-20 p-b-45">
						Gradium Hotel
					</span>
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Yêu cầu nhập mật khẩu">
                        <input class="input100" type="password" name="password" <?php if(isset($_GET['passworderr'])):?>
                            placeholder="<?= $_GET['passworderr']?>"
                        <?php else:?>
                            placeholder="Password"
                        <?php endif;?>
                        >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Yêu cầu nhập lại mật khẩu">
                        <input class="input100" type="password" name="cfpassword" <?php if(isset($_GET['passworderr'])):?>
                            placeholder="<?= $_GET['passworderr']?>"
                        <?php else:?>
                            placeholder="Confirm password"
                        <?php endif;?>
                        >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                    </div>
                    <input type="hidden"  name="email" value="<?= $email?>" id="">
                    <input type="hidden"  name="token" value="<?= $token?>" id="">
                    <br>
                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit">
                            RESET PASSWORD
                        </button>
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
<?php else:?>
<?php
header('location:'.BASE_URL."forgot-request.php?msg=Link của bạn đã hết hạn!");
?>
<?php endif;?>
