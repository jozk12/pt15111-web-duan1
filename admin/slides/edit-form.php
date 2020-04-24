<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getSlide = "select * from slides where id = $id";
$slide = queryExecute($getSlide, false);

if (!$slide) {
    header('location:' . ADMIN_URL . 'slides?msg=Slide không tồn tại');
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
                            <h1 class="m-0 text-dark">Sửa Slide</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'slides/save-edit.php' ?>" method="post" id="edit-slide-form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $slide['id'] ?>" id="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tiêu đề giới thiệu</label>
                                            <input type="text" name="intro" class="form-control" value="<?= $slide['intro_title'] ?>">
                                            <?php if (isset($_GET['introerr'])) : ?><label for="" class="error"><?= $_GET['introerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tiêu đề</label>
                                            <input type="text" name="title" class="form-control" value="<?= $slide['title'] ?>">
                                            <?php if (isset($_GET['titleerr'])) : ?><label for="" class="error"><?= $_GET['titleerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Vị trí</label>
                                            <input type="text" name="location" class="form-control" value="<?= $slide['location'] ?>">
                                            <?php if (isset($_GET['locerr'])) : ?><label for="" class="error"><?= $_GET['locerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option <?php if ($slide['status'] == 1) : ?> selected <?php endif ?> value="1">Hoạt động</option>
                                                <option <?php if ($slide['status'] == 0) : ?> selected <?php endif ?> value="0">Không hoạt động</option>
                                            </select>
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
                                                    <img src="<?= BASE_URL . $slide['image'] ?>" id="preview-img" class="img-fluid">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'slides' ?>" class="btn btn-danger">Hủy</a>
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
        $('#edit-slide-form').validate({
            rules: {
                intro: {
                    required: true,
                    maxlength: 191
                },
                title: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'slides/verify-title-existed.php' ?>",
                        type: "post",
                        data: {
                            title: function() {
                                return $("input[name='title']").val();
                            },
                            id: <?= $slide['id'] ?>
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