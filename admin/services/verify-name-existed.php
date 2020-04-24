<?php
session_start();
require_once '../../config/utils.php';
$name = $_POST['name'];
$id = isset($_POST['id']) ? $_POST['id'] : false;
$checkNameQuery = "select * from services where name = '$name'";
if($id !== false){
    $checkNameQuery .= " and id !=$id";
}
$services = queryExecute($checkNameQuery, true);
echo count($services)==0 ? "true" : "false";
?>