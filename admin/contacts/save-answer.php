<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$reply = trim($_POST['reply']);
$email = trim($_POST['email']);
$idAns = trim($_SESSION[AUTH]['id']);
$nameAns = trim($_SESSION[AUTH]['name']);
$emailAns = trim($_SESSION[AUTH]['email']) ;
$phoneAns = trim($_SESSION[AUTH]['phone_number']) ;
$getContact = "select * from contacts where id = $id";
$contact = queryExecute($getContact, false);
if(!$contact){
    header('location:'.ADMIN_URL.'contacts?msg=Liên hệ không tồn tại không tồn tại');
    die;
}

$replyerr = "";
if(strlen($reply)==""){
    $replyerr = "Yêu cầu nhập câu trả lời";
}
if($replyerr != ""){
    header('location:'.ADMIN_URL. "contacts/answer-form.php?id=$id&&replyerr=$replyerr");
    die;
}

$insertAnswerQuery = "insert into contacts
                                (name, phone_number, email, message, reply_by, reply_for, status)
                            values
                                ('$nameAns','$phoneAns','$emailAns','$reply','$idAns','$id',0)";
queryExecute($insertAnswerQuery, false);
$updateContactQuery = "update contacts 
                                set
                                reply_by = '$idAns',
                                status = 0
                                where id = $id";
queryExecute($updateContactQuery, false);

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
    $mail->Subject = 'Cảm ơn bạn đã gửi thông tin cho Grandium';
    $mail->Body = $reply;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('location:'.ADMIN_URL .'contacts?msg=Trả lời thành công!');
die;
?>