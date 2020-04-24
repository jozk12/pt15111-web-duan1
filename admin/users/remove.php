<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getUserQuery = "select * from users where id = $id";
$user = queryExecute($getUserQuery, false);

if(!$user){
    header("location: ".ADMIN_URL."user?msg=Tài khoản không tồn tại");
    die;
}
if($_SESSION[AUTH]['role_id'] <= $user['role_id']){
    header("location: ".ADMIN_URL."users?msg=Bạn không có quyền để thực hiện xóa");
    die;
}
$removeUserQuery = "delete from users where id = $id";
queryExecute($removeUserQuery, false);
unlink("../../".$user['avatar']);
header("location: ".ADMIN_URL."users?msg=Xóa tài khoản thành công!")
?>