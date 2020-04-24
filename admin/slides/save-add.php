<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$intro = trim($_POST['intro']);
$title = trim($_POST['title']);
$location = trim($_POST['location']);
$image = $_FILES['image'];

$introerr = "";
$titleerr = "";
$locerr = "";

if(strlen($intro)<2 || strlen($intro)>191){
    $introerr = "Hãy nhập tiêu đề giới thiệu nằm trong khoảng 2-191 ký tự";
}

if(strlen($title)<2 || strlen($title)>191){
    $titleerr = "Yêu cầu nhập tiêu đề nằm trong khoảng 2-191 ký tự";
}
$checkTitlesQuery = "select * from slides where title = '$title'";
$titles = queryExecute($checkTitlesQuery, true);

if($titleerr =="" && count($titles)>0){
    $titleerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if(strlen($location)<2 || strlen($location)>191){
    $locerr = "Yêu cầu nhập vị trí nằm trong khoảng 2-191 ký tự";
}
if($introerr . $titleerr . $locerr != ""){
    header('location:'.ADMIN_URL. "slides/add-form.php?introerr=$introerr&&titleerr=$titleerr&&locerr=$locerr");
    die;
}

$filename = "";
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertSlideQuery = "insert into slides
                            (intro_title, title, location, image)
                    values
                            ('$intro','$title','$location','$filename')";
queryExecute($insertSlideQuery, false);
header('location:'.ADMIN_URL .'slides?msg=Thêm slide thành công!');
die;
?>