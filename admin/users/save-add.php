<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$cfpassword = trim($_POST['cfpassword']);
$phone_number = trim($_POST['phone_number']);
$role_id = trim($_POST['role_id']);
$avatar = $_FILES['avatar'];

$nameerr = "";
$emailerr = "";
$passworderr = "";

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
    $emailerr = "Email đã tồn tại, vui lòng sử dụng email khác";
}

if(strlen($password)<6){
    $passworderr = "Mật khẩu phải >= 6 ký tự";
}
if($passworderr == ""&& $password != $cfpassword){
    $passworderr = "Mật khẩu nhập lại không khớp";
}

if($nameerr . $emailerr . $passworderr!= ""){
    header('location:'.ADMIN_URL. "users/add-form.php?nameerr=$nameerr&&emailerr=$emailerr&&passworderr=$passworderr");
    die;
}

$password = password_hash($password, PASSWORD_DEFAULT);

$filename = "";
if($avatar['size']>0){
    $filename = uniqid().'-'.$avatar['name'];
    move_uploaded_file($avatar['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertUserQuery = "insert into users
                            (email, name, password, avatar, phone_number, role_id)
                    values
                            ('$email','$name','$password','$filename','$phone_number','$role_id')";
queryExecute($insertUserQuery, false);
header('location:'.ADMIN_URL .'users?msg=Thêm tài khoản thành công!');
die;
?>