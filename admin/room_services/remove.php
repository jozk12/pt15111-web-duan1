<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getService = "select * from room_services where id = $id";
$service = queryExecute($getService, false);

if(!$service){
    header("location: ".ADMIN_URL."room_services?msg=Dịch vụ không tồn tại");
    die;
}
$removeService = "delete from room_services where id = $id";
queryExecute($removeService, false);
unlink("../../".$service['icon']);
header("location: ".ADMIN_URL."room_services?msg=Xóa Dịch vụ thành công!")
?>