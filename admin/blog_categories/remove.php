<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getCate = "select * from blog_categories where id = $id";
$cate = queryExecute($getCate, false);

if (!$cate) {
    header('location:' . ADMIN_URL . 'blog_categories?msg=Thể loại không tồn tại');
    die;
}
$removeCate = "delete from blog_categories where id = $id";
queryExecute($removeCate, false);
header("location: ".ADMIN_URL."blog_categories?msg=Xóa thể loạithành công!")
?>