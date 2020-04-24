<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$short_desc = trim($_POST['short_desc']);
$desc = trim($_POST['desc']);
$status = trim($_POST['status']);
$image = $_FILES['image'];

$getService = "select * from services where id = $id";
$service = queryExecute($getService, false);

if(!$service){
    header('location:'.ADMIN_URL.'services?msg=Dịch vụ không tồn tại');
    die;
}

$nameerr = "";
$short_descerr = "";
$descerr = "";

if(strlen($short_desc)<2 || strlen($short_desc)>191){
    $short_descerr = "Hãy nhập mô tả ngắn nằm trong khoảng 2-191 ký tự";
}

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên dịch vụ nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from services where name = '$name' and id != $id";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tên đã tồn tại, vui lòng sử dụng tên khác khác";
}
if(strlen($desc)==0){
    $descerr = "Yêu cầu nhập mô tả chi tiết";
}
if($nameerr . $short_descerr . $descerr != ""){
    header('location:'.ADMIN_URL. "services/edit-form.php?id=$id&&nameerr=$nameerr&&short_descerr=$short_descerr&&descerr=$descerr");
    die;
}

$filename = $service['image'];
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateServiceQuery = "update services 
                            set
                            name='$name', 
                            image='$filename',
                            short_desc='$short_desc',
                            description='$desc',
                            status='$status'
                            where id = $id";
queryExecute($updateServiceQuery, false);
header('location:'.ADMIN_URL .'services?msg=Chỉnh sửa dịch vụ thành công!');
die;
?>