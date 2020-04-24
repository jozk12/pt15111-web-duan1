<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);
$image = $_FILES['image'];

$filename = "";
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertRoomGallQuery = "insert into room_galleries
                            (room_id, image)
                    values
                            ('$name','$filename')";
queryExecute($insertRoomGallQuery, false);
header('location:'.ADMIN_URL .'room_galleries?msg=Thêm ảnh phòng thành công!');
die;
?>