<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);
$city = trim($_POST['city']);
$content = trim($_POST['content']);
$avatar = $_FILES['avatar'];

$nameerr = "";
$cityerr = "";
$contenterr = "";

if(strlen($city)<2 || strlen($city)>191){
    $cityerr = "Yêu cầu nhập thành phố nằm trong khoảng 2-191 ký tự";
}
if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Hãy nhập tên nằm trong khoảng 2-191 ký tự";
}

$checkNamesQuery = "select * from customer_feedback where name = '$name'";
$Names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($Names)>0){
    $nameerr = "Tên đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if(strlen($content)<2 || strlen($content)>191){
    $contenterr = "Yêu cầu nhập vị trí nằm trong khoảng 2-191 ký tự";
}
if($nameerr . $cityerr . $contenterr != ""){
    header('location:'.ADMIN_URL. "customer_feedback/add-form.php?nameerr=$nameerr&&cityerr=$cityerr&&content=$content");
    die;
}

$filename = "";
if($avatar['size']>0){
    $filename = uniqid().'-'.$avatar['name'];
    move_uploaded_file($avatar['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertFbQuery = "insert into customer_feedback
                            (name, city, avatar, content)
                    values
                            ('$name','$city','$filename','$content')";
queryExecute($insertFbQuery, false);
header('location:'.ADMIN_URL .'customer_feedback?msg=Thêm phản hồi thành công!');
die;
?>