<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$idName = trim($_POST['name']);
$status = trim($_POST['status']);
$image = $_FILES['image'];

$getRoomGall = "select * from room_galleries where id = $id";
$gall = queryExecute($getRoomGall, false);
if (!$gall) {
    header("location: " . ADMIN_URL . "room_galleries?msg=Ảnh phòng không tồn tại");
    die;
}

$filename = $gall['image'];
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateRoomGallQuery = "update room_galleries 
                            set
                                room_id='$idName',
                                image='$filename',
                                status='$status'
                            where id = $id";
queryExecute($updateRoomGallQuery, false);
header('location:'.ADMIN_URL .'room_galleries?msg=Chỉnh sửa Slide thành công!');
die;
?>