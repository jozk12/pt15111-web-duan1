<?php
session_start();
require_once '../../config/utils.php';
$name = $_POST['name'];
$id = isset($_POST['id']) ? $_POST['id'] : false;
$checkNamesQuery = "select * from blog_categories where name = '$name'";
if($id !== false){
    $checkNamesQuery .= " and id !=$id";
}
$cates = queryExecute($checkNamesQuery, true);
echo count($cates)==0 ? "true" : "false";
?>