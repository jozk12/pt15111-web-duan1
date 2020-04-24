<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getGallery = "select * from galleries where id = $id";
$gallery = queryExecute($getGallery, false);

if(!$gallery){
    header('location:'.ADMIN_URL.'galleries?msg=Ảnh không tồn tại');
    die;
}
$removeGallery = "delete from galleries where id = $id";
queryExecute($removeGallery, false);
unlink("../../".$gallery['image']);
header("location: ".ADMIN_URL."galleries?msg=Xóa ảnh thành công!")
?>