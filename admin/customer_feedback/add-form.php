<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();
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
                            <h1 class="m-0 text-dark">Thêm Phản Hồi</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'customer_feedback/save-add.php' ?>" method="post" id="add-fb-form" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên</label>
                                            <input type="text" name="name" class="form-control">
                                            <?php if (isset($_GET['nameerr'])) : ?><label for="" class="error"><?= $_GET['nameerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thành phố</label>
                                            <input type="text" name="city" class="form-control">
                                            <?php if (isset($_GET['cityerr'])) : ?><label for="" class="error"><?= $_GET['cityerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nội dung</label>
                                            <textarea name="content" class="form-control content_mce" id="" cols="30" rows="10"></textarea>
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
                                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
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
        $('#add-fb-form').validate({
            rules: {
                city: {
                    required: true,
                    maxlength: 191
                },
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'customer_feedback/verify-name-existed.php' ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $("input[name='name']").val();
                            }
                        }
                    }
                },
                content: {
                    required: true
                },
                avatar: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                city: {
                    required: "Hãy nhập thành phố",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                name: {
                    required: "Hãy nhập tên",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tên đã tồn tại, vui lòng sử dụng tên khác"
                },
                content: {
                    required: "Hãy nhập nội dung"
                },
                avatar: {
                    required: "Hãy nhập ảnh",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>