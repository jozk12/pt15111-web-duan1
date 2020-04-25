<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$city = trim($_POST['city']);
$content = trim($_POST['content']);
$status = trim($_POST['status']);
$avatar = $_FILES['avatar'];

$getFb = "select * from customer_feedback where id = $id";
$fb = queryExecute($getFb, false);

if(!$fb){
    header('location:'.ADMIN_URL.'customer_feedback?msg=Phản hồi không tồn tại');
    die;
}

$nameerr = "";
$cityerr = "";
$contenterr = "";

if(strlen($city)<2 || strlen($city)>191){
    $cityerr = "Yêu cầu nhập thành phố nằm trong khoảng 2-191 ký tự";
}
if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Hãy nhập tên nằm trong khoảng 2-191 ký tự";
}

$checkNamesQuery = "select * from customer_feedback where name = '$name' and id !=$id";
$Names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($Names)>0){
    $nameerr = "Tên đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if(strlen($content)==0){
    $contenterr = "Yêu cầu nhập nội dung";
}
if($nameerr . $cityerr . $contenterr != ""){
    header('location:'.ADMIN_URL. "customer_feedback/edit-form.php?id=$id&&nameerr=$nameerr&&cityerr=$cityerr&&content=$content");
    die;
}


$filename = $fb['avatar'];
if($avatar['size']>0){
    $filename = uniqid().'-'.$avatar['name'];
    move_uploaded_file($avatar['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateFbQuery = "update customer_feedback 
                            set
                                name='$name', 
                                city='$city',
                                avatar='$filename',
                                content='$content',
                                status='$status'
                            where id = $id";
queryExecute($updateFbQuery, false);
header('location:'.ADMIN_URL .'customer_feedback?msg=Chỉnh sửa phản hồi thành công!');
die;
?>