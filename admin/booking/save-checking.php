<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$reply = trim($_POST['reply']);
$email = trim($_POST['email']);
$check_in = trim($_POST['check_in']);
$idRep = trim($_SESSION[AUTH]['id']);
$getBooking = "select *from booking where id = $id";
$book = queryExecute($getBooking, false);
if(!$book){
    header("location: ".ADMIN_URL."booking?msg=Đơn đặt không tồn tại");
    die;
}
$subject ="";
if($check_in==2){
    $subject = "Đơn đặt của bạn không được chấp nhận";
}else{
    $subject = "Đơn đặt của bạn đã được chấp nhận";
}
$replyerr = "";
if(strlen($reply)==""){
    $replyerr = "Yêu cầu nhập lời nhắn";
}
if($replyerr != ""){
    header('location:'.ADMIN_URL. "booking/checking-form.php?id=$id&&replyerr=$replyerr");
    die;
}

$updateBookQuery = "update booking 
                                set
                                reply_by = '$idRep',
                                reply_message = '$reply',
                                check_in = '$check_in'
                                where id = $id";
queryExecute($updateBookQuery, false);

require './lib/PHPMailer/src/Exception.php';
require './lib/PHPMailer/src/PHPMailer.php';
require './lib/PHPMailer/src/SMTP.php';
$listReceiver = explode(",", $email);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();
    $mail->CharSet = 'utf8';                                         // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ducdinh0129@gmail.com';                     // SMTP username
    $mail->Password   = 'Doimatkhaungaychunhat';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('grandium@gmail.com', 'KHÁCH SẠN GRANDIUM');
    foreach($listReceiver as $receiverEmail){
        $mail->addAddress($receiverEmail);
    }
    $mail->addReplyTo('ducdinh0129@gmail.com', 'KHÁCH SẠN GRANDIUM');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $reply;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('location:'.ADMIN_URL .'booking?msg=Lưu thành công!');
die;
?>