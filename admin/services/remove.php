<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getService = "select * from services where id = $id";
$service = queryExecute($getService, false);

if(!$service){
    header("location: ".ADMIN_URL."services?msg=Dịch vụ không tồn tại");
    die;
}
$removeService = "delete from services where id = $id";
queryExecute($removeService, false);
unlink("../../".$service['image']);
header("location: ".ADMIN_URL."services?msg=Xóa dịch vụ thành công!")
?>