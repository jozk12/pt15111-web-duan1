<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);
$short_desc = trim($_POST['short_desc']);
$desc = trim($_POST['desc']);
$price = trim($_POST['price']);
$adult = trim($_POST['adult']);
$child = trim($_POST['child']);
$service = $_POST['service'];
$image = $_FILES['image'];

$nameerr = "";
$short_descerr = "";
$descerr = "";
$priceerr = "";
$adulterr = "";
$childerr = "";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from room_types where name = '$name'";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tên đã tồn tại, vui lòng sử dụng tên khác khác";
}
if(strlen($short_desc)==0){
    $short_descerr = "Yêu cầu nhập mô tả ngắn";
}
if(strlen($desc)==0){
    $descerr = "Yêu cầu nhập mô tả chi tiết";
}
if(strlen($price)==0){
    $priceerr = "Yêu cầu nhập giá";
}
if(strlen($adult)==0){
    $adulterr = "Yêu cầu nhập số lượng người lớn";
}
if(strlen($child)==0){
    $childerr = "Yêu cầu nhập số lượng trẻ em";
}
if($nameerr . $short_descerr . $descerr . $priceerr . $adulterr . $childerr != ""){
    header('location:'.ADMIN_URL. "room_types/add-form.php?nameerr=$nameerr&&short_descerr=$short_descerr&&descerr=$descerr&&priceerr=$priceerr&&adulterr=$adulterr&&childerr=$childerr");
    die;
}

$filename = "";
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertRoomQuery = "insert into room_types
                            (name, image, short_desc, description,price,adults,children)
                    values
                            ('$name','$filename','$short_desc','$desc','$price','$adult','$child')";
queryExecute($insertRoomQuery, false);

$roomId = "select id from room_types where name = '$name'";
$idArr = queryExecute($roomId, false);
$id = $idArr[0];

for($i=0; $i<count($service); $i++){
    $insertRoomSerXref = "insert into room_service_xref
                                        (room_id, service_id)
                                    values
                                        ('$id','$service[$i]')";
    queryExecute($insertRoomSerXref, false);
};

header('location:'.ADMIN_URL .'room_types?msg=Thêm loại phòng thành công!');
die;
