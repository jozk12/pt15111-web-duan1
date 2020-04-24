<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getBlog = "select * from blog where id = $id";
$blog = queryExecute($getBlog, false);
if(!$blog){
    header("location: ".ADMIN_URL."blog?msg=Blog không tồn tại");
    die;
}
$removeBlog = "delete from blog where id = $id";
queryExecute($removeBlog, false);
unlink("../../".$blog['image']);
header("location: ".ADMIN_URL."blog?msg=Xóa loại phòng thành công!");
?>