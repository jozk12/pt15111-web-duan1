<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$name = trim($_POST['name']);

$nameerr = "";

if(strlen($name)<2 || strlen($name)>191){
    $nameerr = "Yêu cầu nhập tên nằm trong khoảng 2-191 ký tự";
}
$checkNamesQuery = "select * from blog_categories where name = '$name'";
$names = queryExecute($checkNamesQuery, true);

if($nameerr =="" && count($names)>0){
    $nameerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if($nameerr != ""){
    header('location:'.ADMIN_URL. "blog_categories/add-form.php?nameerr=$nameerr");
    die;
}
$insertCateQuery = "insert into blog_categories
                            (name)
                    values
                            ('$name')";
queryExecute($insertCateQuery, false);
header('location:'.ADMIN_URL .'blog_categories?msg=Thêm loại thành công!');
die;
?>