<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = trim($_POST['id']);
$image = $_FILES['image'];
$status = trim($_POST['status']);

$getGallery = "select * from galleries where id = $id";
$gallery = queryExecute($getGallery, false);

if(!$gallery){
    header('location:'.ADMIN_URL.'galleries?msg=Ảnh không tồn tại');
    die;
}
$filename = $gallery['image'];
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateGalleryQuery = "update galleries 
                            set
                                image='$filename',
                                status='$status'
                            where id = $id";
queryExecute($updateGalleryQuery, false);
header('location:'.ADMIN_URL .'galleries?msg=Chỉnh sửa ảnh thành công!');
die;
?>