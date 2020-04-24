<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$icon = $_FILES['icon'];

$getService = "select * from room_services where id = $id";
$service = queryExecute($getService, false);

if (!$service) {
    header('location:' . ADMIN_URL . 'room_services?msg=Dịch vụ không tồn tại');
    die;
}
$nameerr = "";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from room_services where name = '$name' and id != $id";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if($nameerr != ""){
    header('location:'.ADMIN_URL. "room_services/edit-form.php?id=$id&&nameerr=$nameerr");
    die;
}

$filename = $service['icon'];
if($icon['size']>0){
    $filename = uniqid().'-'.$icon['name'];
    move_uploaded_file($icon['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateServiceQuery = "update room_services 
                            set
                                name='$name',
                                icon='$filename',
                                status='$status'
                            where id = $id";
queryExecute($updateServiceQuery, false);
header('location:'.ADMIN_URL .'room_services?msg=Chỉnh sửa dịch vụ thành công!');
die;
?>