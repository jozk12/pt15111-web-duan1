<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$image = $_FILES['image'];

$filename = "";
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertGalleryQuery = "insert into galleries
                            (image)
                    values
                            ('$filename')";
queryExecute($insertGalleryQuery, false);
header('location:'.ADMIN_URL .'galleries?msg=Thêm ảnh thành công!');
die;
?>