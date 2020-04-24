<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getService = "select * from room_services where id = $id";
$service = queryExecute($getService, false);

if (!$service) {
    header('location:' . ADMIN_URL . 'room_services?msg=Dịch vụ không tồn tại');
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
                            <h1 class="m-0 text-dark">Sửa Dịch Vụ Phòng</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'room_services/save-edit.php' ?>" method="post" id="edit-service-form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $service['id'] ?>" id="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên</label>
                                            <input type="text" name="name" class="form-control" value="<?= $service['name'] ?>">
                                            <?php if (isset($_GET['nameerr'])) : ?><label for="" class="error"><?= $_GET['nameerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5 offset-md-3">
                                                    <img src="<?= BASE_URL . $service['icon'] ?>" id="preview-img" class="img-fluid">
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
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option <?php if ($service['status'] == 1) : ?> selected <?php endif ?> value="1">Hoạt động</option>
                                                <option <?php if ($service['status'] == 0) : ?> selected <?php endif ?> value="0">Không hoạt động</option>
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
                            <a href="<?= ADMIN_URL . 'room_services' ?>" class="btn btn-danger">Hủy</a>
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
        $('#edit-service-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'room_services/verify-name-existed.php' ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $("input[name='name']").val();
                            },
                            id: <?= $service['id']?>
                        }
                    }
                },
                icon: {
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập Tên",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tên đã tồn tại, vui lòng sử dụng tên khác"
                },
                icon: {
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>