<?php
session_start();
include_once './config/utils.php';

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

$nameerr ="";
$phoneerr ="";
$emailerr ="";
$sjerr ="";
$msgerr ="";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên khoảng 2->191 ký tự";
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
$getEmail = "select * from contacts where email='$email'";
$emails = queryExecute($getEmail, true);
if($emailerr=="" && count($emails)>0){
    $emailerr = "Email đã tồn tại, yêu cầu nhập email khác";
}
if(strlen($subject)<2 || strlen($subject)>191){
    $sjerr = "Yêu cầu nhập chủ đề khoảng 2->191 ký tự";
}
if(strlen($message)==0){
    $msgerr = "Yêu cầu nhập lời nhắn";
}
if($nameerr. $phoneerr. $emailerr. $sjerr. $msgerr!=""){
    header('location: '.BASE_URL."contacts.php?nameerr=$nameerr&&phoneerr=$phoneerr&&emailerr=$emailerr&&sjerr=$sjerr&&msgerr=$msgerr");
    die;
}
$insertContactQuery = "insert into contacts
                                    (name,phone_number,email,subject,message)
                                values
                                    ('$name','$phone','$email','$subject','$message')";
queryExecute($insertContactQuery, false);
header('location: '.BASE_URL."index.php?msg=Gửi lời nhắn thành công");
die;
?>
