<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getFb = "select * from customer_feedback where id = $id";
$fb = queryExecute($getFb, false);

if(!$fb){
    header('location:'.ADMIN_URL.'customer_feedback?msg=Phản hồi không tồn tại');
    die;
}
$removeFb = "delete from customer_feedback where id = $id";
queryExecute($removeFb, false);
unlink("../../".$fb['avatar']);
header("location: ".ADMIN_URL."customer_feedback?msg=Xóa Phản hồi thành công!")
?>