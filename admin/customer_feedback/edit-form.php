<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getFb = "select * from customer_feedback where id = $id";
$fb = queryExecute($getFb, false);

if (!$fb) {
    header('location:' . ADMIN_URL . 'customer_feedback?msg=Phản hồi không tồn tại');
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
                            <h1 class="m-0 text-dark">Sửa Phản Hồi</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'customer_feedback/save-edit.php' ?>" method="post" id="edit-fb-form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $fb['id'] ?>" id="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên</label>
                                            <input type="text" name="name" class="form-control" value="<?= $fb['name'] ?>">
                                            <?php if (isset($_GET['nameerr'])) : ?><label for="" class="error"><?= $_GET['nameerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thành phố</label>
                                            <input type="text" name="city" class="form-control" value="<?= $fb['city'] ?>">
                                            <?php if (isset($_GET['cityerr'])) : ?><label for="" class="error"><?= $_GET['cityerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nội dung</label>
                                            <textarea name="content" class="form-control content_mce" id="" cols="30" rows="10"> <?= $fb['content'] ?></textarea>
                                            <?php if (isset($_GET['contenterr'])) : ?><label for="" class="error"><?= $_GET['contenterr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5 offset-md-3">
                                                    <img src="<?= BASE_URL . $fb['avatar'] ?>" id="preview-img" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="">Ảnh</label>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="avatar" onchange="encodeImageFileAsURL(this)" class="custom-file-input">
                                                <label for="" class="custom-file-label">Chọn Ảnh</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option <?php if ($fb['status'] == 1) : ?> selected <?php endif ?> value="1">Hoạt động</option>
                                                <option <?php if ($fb['status'] == 0) : ?> selected <?php endif ?> value="0">Không hoạt động</option>
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
                            <a href="<?= ADMIN_URL . 'customer_feedback' ?>" class="btn btn-danger">Hủy</a>
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
        $('#edit-fb-form').validate({
            rules: {
                intro: {
                    required: true,
                    maxlength: 191
                },
                title: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'customer_feedback/verify-title-existed.php' ?>",
                        type: "post",
                        data: {
                            title: function() {
                                return $("input[name='title']").val();
                            },
                            id: <?= $fb['id'] ?>
                        }
                    }
                },
                location: {
                    required: true,
                    maxlength: 191
                },
                image: {
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                intro: {
                    required: "Hãy nhập tiêu đề giới thiệu",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                title: {
                    required: "Hãy nhập tiêu đề",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác"
                },
                location: {
                    required: "Hãy nhập vị trí",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                image: {
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>