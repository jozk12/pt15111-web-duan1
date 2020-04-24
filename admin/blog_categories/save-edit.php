<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$status = trim($_POST['status']);

$getCate = "select * from blog_categories where id = $id";
$cate = queryExecute($getCate, false);

if (!$cate) {
    header('location:' . ADMIN_URL . 'blog_categories?msg=Thể loại không tồn tại');
    die;
}
$nameerr = "";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from blog_categories where name = '$name' and id != $id";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if($nameerr != ""){
    header('location:'.ADMIN_URL. "blog_categories/edit-form.php?id=$id&&nameerr=$nameerr");
    die;
}
$updateCateQuery = "update blog_categories 
                            set
                                name='$name',
                                status='$status'
                            where id = $id";
queryExecute($updateCateQuery, false);
header('location:'.ADMIN_URL .'blog_categories?msg=Chỉnh sửa dịch vụ thành công!');
die;
?>