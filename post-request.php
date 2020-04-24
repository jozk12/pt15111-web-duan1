<?php
session_start();
require_once './config/utils.php';
$email = trim($_POST['email']);
$emailerr = "";
if(strlen($email)==0){
    $emailerr = "Yêu cầu nhập email";
}
if($emailerr==""&&!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerr = "Không đúng định dạng email";
}
$getEmails = "select * from users where email='$email'";
$emails = queryExecute($getEmails, true);
if($emailerr==""&&count($emails)==0){
    $emailerr = "Không có tài khoản nào sử dụng email này";
}
if($emailerr!=""){
    header('location:'.BASE_URL."forgot-request.php?emailerr=$emailerr");
    die;
}
$timezone  = 'Asia/Ho_Chi_Minh';
date_default_timezone_set($timezone);
$expire_time = date_format(date_create(), 'Y-m-d H:i:s');
$token = substr(md5(uniqid(rand(),1)),3,10);
$insertForgot = "insert into forgot_password
                                (email, token, expire_time)
                                values 
                                ('$email','$token','$expire_time')";
queryExecute($insertForgot,false);

require './lib/PHPMailer/src/Exception.php';
require './lib/PHPMailer/src/PHPMailer.php';
require './lib/PHPMailer/src/SMTP.php';
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
    $mail->addAddress($email);
    $mail->addReplyTo('ducdinh0129@gmail.com', 'KHÁCH SẠN GRANDIUM');

    // Content
    $mail->isHTML(true);
    $mail->Subject = "PASSWORD RESET";
    $mail->Body = "
                    Hãy nhấn vào link này đề reset password: <a href='http://localhost/pt15111-web-duan1/reset-password.php?email=$email&&token=$token'>CLICK HERE TO RESET PASSWORD</a>
    ";
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('location: '.BASE_URL.'forgot-request.php?msg=Chúng tôi đã gửi email cho bạn, Hãy kiểm tra email!');
die;
?>