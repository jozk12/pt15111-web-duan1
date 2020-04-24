<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$intro = trim($_POST['intro']);
$title = trim($_POST['title']);
$location = trim($_POST['location']);
$status = trim($_POST['status']);
$image = $_FILES['image'];

$getSlide = "select * from slides where id = $id";
$slide = queryExecute($getSlide, false);

if(!$slide){
    header('location:'.ADMIN_URL.'slides?msg=Slide không tồn tại');
    die;
}

$introerr = "";
$titleerr = "";
$locerr = "";

if(strlen($intro)<2 || strlen($intro)>191){
    $introerr = "Hãy nhập tiêu đề giới thiệu nằm trong khoảng 2-191 ký tự";
}

if(strlen($title)<2 || strlen($title)>191){
    $titleerr = "Yêu cầu nhập tiêu đề nằm trong khoảng 2-191 ký tự";
}
$checkTitlesQuery = "select * from slides where title = '$title' and id !=$id";
$titles = queryExecute($checkTitlesQuery, true);

if($titleerr =="" && count($titles)>0){
    $titleerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if(strlen($location)<2 || strlen($location)>191){
    $locerr = "Yêu cầu nhập vị trí nằm trong khoảng 2-191 ký tự";
}
if($introerr . $titleerr . $locerr != ""){
    header('location:'.ADMIN_URL. "slides/edit-form.php?id=$id&&introerr=$introerr&&titleerr=$titleerr&&locerr=$locerr");
    die;
}

$filename = $slide['image'];
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateSlideQuery = "update slides 
                            set
                                intro_title='$intro', 
                                title='$title',
                                location='$location',
                                image='$filename',
                                status='$status'
                            where id = $id";
queryExecute($updateSlideQuery, false);
header('location:'.ADMIN_URL .'slides?msg=Chỉnh sửa Slide thành công!');
die;
?>