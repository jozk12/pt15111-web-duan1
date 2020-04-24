<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$short_desc = trim($_POST['short_desc']);
$desc = trim($_POST['desc']);
$price = trim($_POST['price']);
$adult = trim($_POST['adult']);
$child = trim($_POST['child']);
$service = $_POST['service'];
$status = trim($_POST['status']);
$image = $_FILES['image'];

$nameerr = "";
$short_descerr = "";
$descerr = "";
$priceerr = "";
$adulterr = "";
$childerr = "";

$getRooms = "select * from room_types where id = '$id'";
$room = queryExecute($getRooms, false);
if (!$room) {
    header('location:' . ADMIN_URL . 'room_types?msg=Loại phòng không tồn tại');
    die;
}

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from room_types where name = '$name' and id !='$id'";
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
    header('location:'.ADMIN_URL. "room_types/edit-form.php?id=$id&&nameerr=$nameerr&&short_descerr=$short_descerr&&descerr=$descerr&&priceerr=$priceerr&&adulterr=$adulterr&&childerr=$childerr");
    die;
}

$filename = $room['image'];
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateRoomQuery = "update room_types 
                            set
                            name='$name', 
                                image='$filename',
                                short_desc='$short_desc',
                                description='$desc',
                                price='$price',
                                adults='$adult',
                                children='$child',
                                status='$status'
                            where id = $id";
queryExecute($updateRoomQuery, false);

$getRemove = "delete from room_service_xref where room_id='$id'";
queryExecute($getRemove,false);

for($i=0; $i<count($service); $i++){
    $insertRoomSerXref = "insert into room_service_xref
                                        (room_id, service_id)
                                    values
                                        ('$id','$service[$i]')";
    queryExecute($insertRoomSerXref, false);
};
header('location:'.ADMIN_URL .'room_types?msg=Chỉnh sửa phòng thành công!');
die;
