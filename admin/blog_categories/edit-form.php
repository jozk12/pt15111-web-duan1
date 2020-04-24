<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getCate = "select * from blog_categories where id = $id";
$cate = queryExecute($getCate, false);

if (!$cate) {
    header('location:' . ADMIN_URL . 'blog_categories?msg=Thể loại không tồn tại');
    die;
}
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
                            <h1 class="m-0 text-dark">Sửa Thể Loại</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'blog_categories/save-edit.php' ?>" method="post" id="edit-cate-form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $cate['id'] ?>" id="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên</label>
                                            <input type="text" name="name" class="form-control" value="<?= $cate['name'] ?>">
                                            <?php if (isset($_GET['nameerr'])) : ?><label for="" class="error"><?= $_GET['nameerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option <?php if ($cate['status'] == 1) : ?> selected <?php endif ?> value="1">Hoạt động</option>
                                                <option <?php if ($cate['status'] == 0) : ?> selected <?php endif ?> value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'blog_categories' ?>" class="btn btn-danger">Hủy</a>
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
        $('#edit-cate-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'blog_categories/verify-name-existed.php' ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $("input[name='name']").val();
                            },
                            id: <?= $cate['id']?>
                        }
                    }
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập Tên",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tên đã tồn tại, vui lòng sử dụng tên khác"
                }
            }
        });
    </script>
</body>

</html>