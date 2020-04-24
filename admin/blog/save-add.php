<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$title = trim($_POST['title']);
$short_ct = trim($_POST['short_ct']);
$content = trim($_POST['content']);
$author =  $_SESSION[AUTH]['id'];
$category = $_POST['category'];
$image = $_FILES['image'];

$titleerr = "";
$short_cterr = "";
$contenterr = "";

if(strlen($title)<2 || strlen($title)>191){
    $titleerr = "Yêu cầu nhập tiêu đề nằm trong khoảng 2-191 ký tự";
}
$checkTitlesQuery = "select * from blog where title = '$title'";
$titles = queryExecute($checkTitlesQuery, true);

if($titleerr =="" && count($titles)>0){
    $titleerr = "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác khác";
}
if(strlen($short_ct)==0){
    $short_cterr = "Yêu cầu nhập nội dung ngắn";
}
if(strlen($content)==0){
    $contenterr = "Yêu cầu nhập nội dung chính";
}
if($titleerr . $short_cterr . $contenterr != ""){
    header('location:'.ADMIN_URL. "blog/add-form.php?titleerr=$titleerr&&short_cterr=$short_cterr&&contenterr=$contenterr");
    die;
}

$filename = "";
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$insertBlogQuery = "insert into blog
                            (title, image, short_ct, content,author_id)
                    values
                            ('$title','$filename','$short_ct','$content','$author')";
queryExecute($insertBlogQuery, false);

$blogId = "select id from blog where title = '$title'";
$idArr = queryExecute($blogId, false);
$id = $idArr[0];

for($i=0; $i<count($category); $i++){
    $insertBlogCateXref = "insert into blog_cate_xref
                                        (blog_id, cate_id)
                                    values
                                        ('$id','$category[$i]')";
    queryExecute($insertBlogCateXref, false);
};

header('location:'.ADMIN_URL .'blog?msg=Thêm blog thành công!');
die;
