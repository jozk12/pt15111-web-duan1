<?php
session_start();
require_once '../../config/utils.php';
$name = $_POST['name'];
$id = isset($_POST['id']) ? $_POST['id'] : false;
$checkNameQuery = "select * from room_types where name = '$name'";
if($id !== false){
    $checkNameQuery .= " and id !=$id";
}
$names = queryExecute($checkNameQuery, true);
echo count($names)==0 ? "true" : "false";
?>