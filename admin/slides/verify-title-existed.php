<?php
session_start();
require_once '../../config/utils.php';
$title = $_POST['title'];
$id = isset($_POST['id']) ? $_POST['id'] : false;
$checkTitleQuery = "select * from slides where title = '$title'";
if($id !== false){
    $checkTitleQuery .= " and id !=$id";
}
$slides = queryExecute($checkTitleQuery, true);
echo count($slides)==0 ? "true" : "false";
?>