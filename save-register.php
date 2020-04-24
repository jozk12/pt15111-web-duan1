<?php
session_start();
require_once "./config/utils.php";

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$cfpassword = trim($_POST['cfpassword']);
$phone_number = trim($_POST['phone_number']);

$nameerr = "";
$emailerr = "";
$passworderr = "";
$cfpassworderr = "";
if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Hãy nhập tên nằm trong khoảng 2-191 ký tự";
}
if(strlen($email)==0){
    $emailerr = "Yêu cầu nhập email";
}
if($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerr = "Không đúng định dạng email";
}
$checkEmailQuery = "select * from users where email = '$email'";
$users = queryExecute($checkEmailQuery, true);
if($emailerr =="" && count($users)>0){
    $emailerr = "Email đã tồn tại";
}

if(strlen($password)<6){
    $passworderr = "Mật khẩu phải >= 6 ký tự";
}
if($password != $cfpassword){
    $cfpassworderr = "Mật khẩu nhập lại không khớp";
}

if($nameerr . $emailerr . $passworderr .$cfpassworderr!= ""){
    header('location:'.BASE_URL. "register.php?nameerr=$nameerr&&emailerr=$emailerr&&passworderr=$passworderr&&cfpassworderr=$cfpassworderr");
    die;
}

$password = password_hash($password, PASSWORD_DEFAULT);

$insertUserQuery = "insert into users
                            (email, name, password, phone_number, role_id)
                    values
                            ('$email','$name','$password','$phone_number',1)";
queryExecute($insertUserQuery, false);
header('location:'.BASE_URL.'login.php?msg=Đăng ký thành công!');
die;
?>