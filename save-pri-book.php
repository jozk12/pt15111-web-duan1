<?php 
session_start();
require_once "./config/utils.php";
$id = trim($_POST['id']);
$getRoomQuery = "select * from room_types where id = '$id'";
$room = queryExecute($getRoomQuery, false);
if ($room == "") {
    header('location: ' . BASE_URL . 'rooms.php?msg=Bạn cần chọn phòng trước khi đặt, HÃY CHỌN PHÒNG!');
    die;
}
$checkin = trim($_POST['checkin']);
$checkout = trim($_POST['checkout']);
$diff = strtotime($checkout)-strtotime($checkin);
$total_date = round($diff/(60*60*24));
$today = date("m/d/Y");
$diff_today = strtotime($checkin)-strtotime($today);
$total_today = round($diff_today/(60*60*24));
$_SESSION[BOOK]=$room;
$_SESSION[BOOK]['checkin']=$checkin;
$_SESSION[BOOK]['checkout']=$checkout;
$_SESSION[BOOK]['total_date']=$total_date;

$checkinerr = "";
$checkouterr = "";

if(strlen($checkin)==0){
    $checkinerr="Yêu cầu nhập ngày đến khách sạn";
}
if($checkinerr==""&&$total_date<=0){
    $checkinerr = "Yêu cầu nhập ngày đến nhỏ hơn ngày rời";
}
if($checkinerr==""&&$total_today<0){
    $checkinerr = "Yêu cầu nhập ngày đến lớn hơn hoặc bằng hiện tại";
}
if(strlen($checkout)==0){
    $checkouterr="Yêu cầu nhập ngày rời đi";
}
if($checkinerr.$checkouterr!=""){
    header("location: rooms-detail.php?id=$id&&checkinerr=$checkinerr&&checkouterr=$checkouterr");
    die;
}
else{
    header("location: booking.php");
    die;
}
?>