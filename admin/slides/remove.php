<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getSlide = "select * from slides where id = $id";
$slide = queryExecute($getSlide, false);

if(!$slide){
    header("location: ".ADMIN_URL."slides?msg=Slide không tồn tại");
    die;
}
$removeSlide = "delete from slides where id = $id";
queryExecute($removeSlide, false);
unlink("../../".$slide['image']);
header("location: ".ADMIN_URL."slides?msg=Xóa Slide thành công!")
?>