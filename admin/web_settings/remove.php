<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getWeb = "select * from web_settings where id = $id";
$web = queryExecute($getWeb, false);

if(!$web){
    header("location: ".ADMIN_URL."web_settings?msg=Cài đặt không tồn tại");
    die;
}
$removeWeb = "delete from web_settings where id = $id";
queryExecute($removeWeb, false);
unlink("../../".$web['logo']);
header("location: ".ADMIN_URL."web_settings?msg=Xóa cài đặt thành công!")
?>