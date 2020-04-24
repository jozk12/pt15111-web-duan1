<?php
session_start();
require_once './config/utils.php';

$token = trim($_POST['token']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$cfpassword = trim($_POST['cfpassword']);
$getForgot = "select * from users where email='$email'";
$fogot = queryExecute($getForgot, false);
$passworderr = "";

$timezone  = 'Asia/Ho_Chi_Minh';
date_default_timezone_set($timezone);
$current_time = date_format(date_create(), 'Y-m-d H:i:s');
$expire_time = $forgot['expire_time'];
$diff_today = strtotime($current_time)-strtotime($expire_time);
$total_today = $diff_today/(60*60*24);
if($total_today>0&&$total_today<1){
    header('location: '.BASE_URL."reset-password.php");
    die;
}
if(strlen($password)<6){
    $passworderr = "Mật khẩu phải >= 6 ký tự";
}
if($password!=$cfpassword){
    $passworderr = "Mật khẩu nhập lại không khớp";
}
if($passworderr!=""){
    header('location:'.BASE_URL."reset-password.php?email=$email&&token=$token&&passworderr=$passworderr");
    die;
}
$password = password_hash($password, PASSWORD_DEFAULT);
$updateUser = "update users set
                            password = '$password'
                            where 
                            email = '$email'";
queryExecute($updateUser,false);
header('location: '.BASE_URL."login.php?msg=Bạn đã thay đổi mật khẩu thành công");
die;
?>