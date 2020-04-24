<?php
session_start();
require_once './config/utils.php';
$email = $_POST['email'];
$checkEmailQuery = "select * from contacts where email = '$email'";
$emails = queryExecute($checkEmailQuery, true);
echo count($emails)==0 ? "true" : "false";
?>