<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = trim($_POST['id']);
$title = trim($_POST['title']);
$short_ct = trim($_POST['short_ct']);
$content = trim($_POST['content']);
$author =  $_SESSION[AUTH]['id'];
$category = $_POST['category'];
$image = $_FILES['image'];
$status = trim($_POST['status']);

$titleerr = "";
$short_cterr = "";
$contenterr = "";

$getBlog = "select * from blog where id = $id";
$blog = queryExecute($getBlog, false);
if(!$blog){
    header("location: ".ADMIN_URL."blog?msg=Blog không tồn tại");
    die;
}
if(strlen($title)<2 || strlen($title)>191){
    $titleerr = "Yêu cầu nhập tiêu đề nằm trong khoảng 2-191 ký tự";
}
$checkTitlesQuery = "select * from blog where title = '$title' and id!='$id'";
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
    header('location:'.ADMIN_URL. "blog/edit-form.php?id=$id&&titleerr=$titleerr&&short_cterr=$short_cterr&&contenterr=$contenterr");
    die;
}

$filename = $blog['image'];
if($image['size']>0){
    $filename = uniqid().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/images/".$filename);
    $filename = "public/images/".$filename;
}
$updateBlogQuery = "update blog 
                            set
                            title='$title', 
                                image='$filename',
                                short_ct='$short_ct',
                                content='$content',
                                author_id='$author',
                                status='$status'
                            where id = $id";
queryExecute($updateBlogQuery, false);

$getRemove = "delete from blog_cate_xref where blog_id='$id'";
queryExecute($getRemove,false);

for($i=0; $i<count($category); $i++){
    $insertBlogCateXref = "insert into blog_cate_xref
                                        (blog_id, cate_id)
                                    values
                                        ('$id','$category[$i]')";
    queryExecute($insertBlogCateXref, false);
};
header('location:'.ADMIN_URL .'blog?msg=Chỉnh sửa blog thành công!');
die;
