<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRoomGall = "select * from room_galleries where id = $id";
$roomGall = queryExecute($getRoomGall, false);

if(!$roomGall){
    header("location: ".ADMIN_URL."room_galleries?msg=Ảnh phòng không tồn tại");
    die;
}
$removeRoomGall = "delete from room_galleries where id = $id";
queryExecute($removeRoomGall, false);
unlink("../../".$roomGall['image']);
header("location: ".ADMIN_URL."room_galleries?msg=Xóa ảnh phòng thành công!")
?>