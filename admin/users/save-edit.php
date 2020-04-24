<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone_number = trim($_POST['phone_number']);
$role_id = trim($_POST['role_id']);
$status = trim($_POST['status']);
$avatar = $_FILES['avatar'];

$getUser = "select * from users where id = $id";
$user = queryExecute($getUser, false);

if(!$user){
    header('location:'.ADMIN_URL.'users?msg=Tài khoản không tồn tại');
    die;
}
if($_SESSION[AUTH]['id'] != $user['id'] && $_SESSION[AUTH]['role_id'] <= $user['role_id'] ){
    header("location: " . ADMIN_URL . 'users?msg=Bạn không có quyền sửa thông tin tài khoản này');
    die;
}

$nameerr = "";
$emailerr = "";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Hãy nhập tên nằm trong khoảng 2-191 ký tự";
}

if(strlen($email)==0){
    $emailerr = "Yêu cầu nhập email";
}
if($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerr = "Không đúng định dạng email";
}
$checkEmailQuery = "select * from users where email = '$email' and id !=$id";
$users = queryExecute($checkEmailQuery, true);
if($emailerr =="" && count($users)>0){
    $emailerr = "Email đã tồn tại, vui lòng sử dụng email khác";
}

if($nameerr . $emailerr != ""){
    header('location:'.ADMIN_URL. "users/edit-form.php?id=$id&&nameerr=$nameerr&&emailerr=$emailerr");
    die;
}

$filename = $user['avatar'];
if($avatar['size']>0){
    $filename = uniqid().'-'.$avatar['name'];
    move_uploaded_file($avatar['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateUserQuery = "update users 
                            set
                                email='$email', 
                                name='$name',
                                avatar='$filename',
                                phone_number='$phone_number',
                                role_id='$role_id',
                                status='$status'
                            where id = $id";
queryExecute($updateUserQuery, false);
header('location:'.ADMIN_URL .'users?msg=Chỉnh sửa tài khoản thành công!');
die;
?>