<?php
session_start();
require_once '../../config/utils.php';
$name = $_POST['name'];
$id = isset($_POST['id']) ? $_POST['id'] : false;
$checkNamesQuery = "select * from room_services where name = '$name'";
if($id !== false){
    $checkNamesQuery .= " and id !=$id";
}
$services = queryExecute($checkNamesQuery, true);
echo count($services)==0 ? "true" : "false";
?>