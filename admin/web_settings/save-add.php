<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);
$email = trim($_POST['email']);
$map = trim($_POST['map']);
$fb = trim($_POST['fb']);
$tt = trim($_POST['tt']);
$ins = trim($_POST['ins']);
$gg = trim($_POST['gg']);
$about = trim($_POST['about']);
$service = trim($_POST['service']);
$gallery = trim($_POST['gallery']);
$blog = trim($_POST['blog']);
$feedback = trim($_POST['feedback']);
$logo = $_FILES['logo'];

$nameerr = "";
$phoneerr = "";
$addresserr = "";
$emailerr = "";
$abouterr = "";
$serviceerr = "";
$galleryerr = "";
$blogerr = "";
$feedbackerr = "";

if(strlen($phone) != 10){
    $phoneerr = "Hãy nhập số điện thoại với 10 ký tự";
}

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from web_settings where name = '$name'";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if(strlen($address)<2 || strlen($address)>191){
    $addresserr = "Yêu cầu nhập địa chỉ nằm trong khoảng 2-191 ký tự";
}
if(strlen($email)==0){
    $emailerr = "Yêu cầu nhập email";
}
if($emailerr==""&&!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerr = "Không đúng định dạng email";
}
if(strlen($about)==0){
    $abouterr = "Yêu cầu nhập giới thiệu";
}
if(strlen($service)==0){
    $serviceerr = "Yêu cầu nhập dịch vụ giới thiệu";
}
if(strlen($gallery)==0){
    $galleryerr = "Yêu cầu nhập ảnh giới thiệu";
}
if(strlen($blog)==0){
    $blogerr = "Yêu cầu nhập blog giới thiệu";
}
if(strlen($feedback)==0){
    $feedbackerr = "Yêu cầu nhập phản hồi giới thiệu";
}
if($phoneerr . $nameerr . $addresseer . $emailerr . $abouterr . $serviceerr . $galleryerr . $blogerr . $feedbackerr != ""){
    header('location:'.ADMIN_URL. "web_settings/add-form.php?phoneerr=$phoneerr&&nameerr=$nameerr&&addresserr=$addresserr&&emailerr=$emailerr&&abouterr=$abouterr&&serviceerr=$serviceerr&&galleryerr=$galleryerr&&blogerr=$blogerr&&feedbackerr=$feedbackerr");
    die;
}

$filename = "";
if($logo['size']>0){
    $filename = uniqid().'-'.$logo['name'];
    move_uploaded_file($logo['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertWebQuery = "insert into web_settings
                            (name, logo, phone_number, address, email, map_url, facebook_url, twitter_url, instagram_url, googleplus_url, intro_about, intro_service, intro_gallery, intro_blog, intro_testimonials)
                    values
                            ('$name','$filename','$phone','$address','$email','$map','$fb','$tt','$ins','$gg','$about','$service','$gallery','$blog','$feedback')";
queryExecute($insertWebQuery, false);
header('location:'.ADMIN_URL .'web_settings?msg=Thêm cài đặt thành công!');
die;
?>