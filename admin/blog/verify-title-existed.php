<?php
session_start();
require_once '../../config/utils.php';
$title = $_POST['title'];
$id = isset($_POST['id']) ? $_POST['id'] : false;
$checkTitleQuery = "select * from blog where title = '$title'";
if($id !== false){
    $checkTitleQuery .= " and id !=$id";
}
$titles = queryExecute($checkTitleQuery, true);
echo count($titles)==0 ? "true" : "false";
?>