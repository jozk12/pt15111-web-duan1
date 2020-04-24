<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getContact = "select * from contacts where id = $id";
$contact = queryExecute($getContact, false);

if(!$contact){
    header("location: ".ADMIN_URL."contacts?msg=Liên hệ không tồn tại");
    die;
}
$removeContact = "delete from contacts where id = $id";
queryExecute($removeContact, false);
header("location: ".ADMIN_URL."contacts?msg=Xóa liên hệ thành công!")
?>