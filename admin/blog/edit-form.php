<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getBlog = "select * from blog where id = $id";
$blog = queryExecute($getBlog, false);
if (!$blog) {
    header("location: " . ADMIN_URL . "blog?msg=Blog không tồn tại");
    die;
}
$getCateQuery = "select c.id,
                    c.name
                    from blog_cate_xref cxr
                    join blog_categories c
                    on cxr.cate_id = c.id
                    where cxr.blog_id = " . $blog['id'];
$cates = queryExecute($getCateQuery, true);
$blog['blog_cate'] = $cates;

$getCategories = "select * from blog_categories where status = 1";
$allCates = queryExecute($getCategories, true);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/styles.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include_once '../_share/nav.php' ?>

        <?php include_once '../_share/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Sửa Blog</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'blog/save-edit.php' ?>" method="post" id="edit-blog-form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $blog['id'] ?>" id="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tiêu đề</label>
                                            <input type="text" name="title" class="form-control" value="<?= $blog['title'] ?>">
                                            <?php if (isset($_GET['titleerr'])) : ?><label for="" class="error"><?= $_GET['titleerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5 offset-md-3">
                                                    <img src="<?= BASE_URL . $blog['image'] ?>" id="preview-img" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="">Ảnh</label>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image" onchange="encodeImageFileAsURL(this)" class="custom-file-input">
                                                <label for="" class="custom-file-label">Chọn Ảnh</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thể loại blog</label>
                                            <select name="category[]" multiple="multiple" class="form-control select2" id="">
                                                <?php foreach ($blog['blog_cate'] as $cate) : ?>
                                                    <option value="<?= $cate['id'] ?>" selected><?= $cate['name'] ?></option>
                                                <?php endforeach ?>
                                                <?php foreach ($allCates as $cates) : ?>
                                                    <option value="<?= $cates['id'] ?>"><?= $cates['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option <?php if ($blog['status'] == 1) : ?> selected <?php endif ?> value="1">Hoạt động</option>
                                                <option <?php if ($blog['status'] == 0) : ?> selected <?php endif ?> value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Mô tả ngắn</label>
                                            <textarea name="short_ct" id="" cols="30" rows="10" class="form-control content_mce"><?= $blog['short_ct'] ?></textarea>
                                            <?php if (isset($_GET['short_cterr'])) : ?><label for="" class="error"><?= $_GET['short_cterr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả chính</label>
                                            <textarea name="content" id="" cols="30" rows="20" class="form-control content_mce"><?= $blog['content'] ?></textarea>
                                            <?php if (isset($_GET['contenterr'])) : ?><label for="" class="error"><?= $_GET['contenterr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'blog' ?>" class="btn btn-danger">Hủy</a>
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once '../_share/footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once '../_share/scripts.php' ?>
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if (file === undefined) {
                $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        };
        $('#edit-blog-form').validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'blog/verify-title-existed.php' ?>",
                        type: "post",
                        data: {
                            title: function() {
                                return $("input[name='title']").val();
                            },
                            id:<?=$blog['id']?>
                        }
                    }
                },
                short_ct: {
                    required: true
                },
                content: {
                    required: true,
                },
                image: {
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                title: {
                    required: "Hãy nhập tiêu đề",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác"
                },
                short_ct: {
                    required: "Hãy nhập nội dung ngắn"
                },
                content: {
                    required: "Hãy nhập nội dung chính"
                },
                image: {
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>