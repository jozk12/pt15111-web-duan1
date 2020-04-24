<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);
$short_desc = trim($_POST['short_desc']);
$desc = trim($_POST['desc']);
$image = $_FILES['image'];

$nameerr = "";
$short_descerr = "";
$descerr = "";

if(strlen($short_desc)<2 || strlen($short_desc)>191){
    $short_descerr = "Hãy nhập mô tả ngắn nằm trong khoảng 2-191 ký tự";
}

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên dịch vụ nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from services where name = '$name'";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tên đã tồn tại, vui lòng sử dụng tên khác khác";
}
if(strlen($desc)==0){
    $descerr = "Yêu cầu nhập mô tả chi tiết";
}

if($nameerr . $short_descerr . $descerr != ""){
    header('location:'.ADMIN_URL. "services/add-form.php?nameerr=$nameerr&&short_descerr=$short_descerr&&descerr=$descerr");
    die;
}

$filename = "";
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertServiceQuery = "insert into services
                            (name, image, short_desc, description)
                    values
                            ('$name','$filename','$short_desc','$desc')";
queryExecute($insertServiceQuery, false);
header('location:'.ADMIN_URL .'services?msg=Thêm dịch vụ thành công!');
die;
?>