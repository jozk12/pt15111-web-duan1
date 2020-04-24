<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getBooking = "select * from booking where id = $id";
$booking = queryExecute($getBooking, false);

if(!$booking){
    header("location: ".ADMIN_URL."booking?msg=Đơn không tồn tại");
    die;
}
$removeBooking = "delete from booking where id = $id";
queryExecute($removeBooking, false);
header("location: ".ADMIN_URL."booking?msg=Xóa đơn thành công!")
?>