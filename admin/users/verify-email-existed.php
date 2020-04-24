<?php
session_start();
require_once '../../config/utils.php';
$email = $_POST['email'];
$id = isset($_POST['id']) ? $_POST['id'] : false;
$checkEmailQuery = "select * from users where email = '$email'";
if($id !== false){
    $checkEmailQuery .= " and id !=$id";
}
$users = queryExecute($checkEmailQuery, true);
echo count($users)==0 ? "true" : "false";
?>