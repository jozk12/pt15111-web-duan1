<?php
session_start();
include_once './config/utils.php';

$id = isset($_SESSION[BOOK]['id']) ? $_SESSION[BOOK]['id'] : "";
$getRoomQuery = "select * from room_types where id = '$id'";
$room = queryExecute($getRoomQuery, false);
if ($room == "") {
    header('location: ' . BASE_URL . 'rooms.php?msg=Bạn cần chọn phòng trước khi đặt, HÃY CHỌN PHÒNG!');
    die;
}
$checkin = $_SESSION[BOOK]['checkin'];
$checkout = $_SESSION[BOOK]['checkout'];
$total_date = $_SESSION[BOOK]['total_date'];
$total_price = $total_date*$room['price'];
$checkin_date = date("Y-m-d", strtotime($checkin));
$checkout_date = date("Y-m-d", strtotime($checkout));
$adults = $room['adults'];
$children = $room['children'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$request = trim($_POST['request']);
$room_type = $room['id'];

$nameerr ="";
$emailerr ="";
$phoneerr ="";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên từ 2->191 ký tự";
}
if(strlen($phone)!=10){
    $phoneerr = "Yêu cầu nhập số điện thoại với 10 ký tự";
}
if(strlen($email)==0){
    $emailerr = "Yêu cầu nhập email";
}
if($emailerr=="" && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerr = "Yêu cầu nhập đúng định dạng email";
}
if($nameerr. $phoneerr. $emailerr!=""){
    header('location: '.BASE_URL."booking.php?nameerr=$nameerr&&phoneerr=$phoneerr&&emailerr=$emailerr");
    die;
}
$insertBookQuery = "insert into booking
                                    (name,phone_number,email,checkin_date,checkout_date,adults,children,room_types,request,total_price)
                                values
                                    ('$name','$phone','$email','$checkin_date','$checkout_date','$adults','$children','$room_type','$request',$total_price)";
queryExecute($insertBookQuery, false);
unset($_SESSION[BOOK]);
header('location: '.BASE_URL."index.php?msg=Đặt phòng thành công");
die;
?>
