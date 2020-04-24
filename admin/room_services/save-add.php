<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);
$icon = $_FILES['icon'];

$nameerr = "";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from room_services where name = '$name'";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if($nameerr != ""){
    header('location:'.ADMIN_URL. "room_services/add-form.php?nameerr=$nameerr");
    die;
}

$filename = "";
if($icon['size']>0){
    $filename = uniqid().'-'.$icon['name'];
    move_uploaded_file($icon['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertServiceQuery = "insert into room_services
                            (name, icon)
                    values
                            ('$name','$filename')";
queryExecute($insertServiceQuery, false);
header('location:'.ADMIN_URL .'room_services?msg=Thêm dịch vụ thành công!');
die;
?>