<?php
session_start();
require_once './config/utils.php';
$email = $_POST['email'];
$checkEmailQuery = "select * from users where email = '$email'";
$emails = queryExecute($checkEmailQuery, true);
echo count($emails)==0 ? "true" : "false";
?>
