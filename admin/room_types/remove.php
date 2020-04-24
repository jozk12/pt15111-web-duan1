<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRoom = "select * from room_types where id = $id";
$room = queryExecute($getRoom, false);

if(!$room){
    header("location: ".ADMIN_URL."room_types?msg=Loại phòng không tồn tại");
    die;
}
$removeRoom = "delete from room_types where id = $id";
queryExecute($removeRoom, false);
unlink("../../".$room['image']);
header("location: ".ADMIN_URL."room_types?msg=Xóa loại phòng thành công!")
?>