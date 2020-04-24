<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getService = "select * from services where id = $id";
$service = queryExecute($getService, false);

if (!$service) {
    header('location:' . ADMIN_URL . 'services?msg=Dịch vụ không tồn tại');
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
                            <h1 class="m-0 text-dark">Sửa Dịch Vụ</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'services/save-edit.php' ?>" method="post" id="edit-service-form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $service['id'] ?>" id="">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên dịch vụ</label>
                                            <input type="text" name="name" class="form-control" value="<?=$service['name']?>">
                                            <?php if (isset($_GET['nameerr'])) : ?><label for="" class="error"><?= $_GET['nameerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả chi tiết</label>
                                            <textarea name="desc" id="" cols="30" rows="15" class="form-control"><?=$service['description']?></textarea>
                                            <?php if (isset($_GET['descerr'])) : ?><label for="" class="error"><?= $_GET['descerr'] ?></label>
                                            <?php endif ?>
                                        </div>
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
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5 offset-md-3">
                                                    <img src="<?= BASE_URL. $service['image'] ?>" id="preview-img" class="img-fluid">
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
                                            <label for="">Mô tả ngắn</label>
                                            <textarea name="short_desc" id="" cols="30" rows="8" class="form-control"><?=$service['short_desc']?></textarea>
                                            <?php if (isset($_GET['short_descerr'])) : ?><label for="" class="error"><?= $_GET['short_descerr'] ?></label>
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
                            <a href="<?= ADMIN_URL . 'services' ?>" class="btn btn-danger">Hủy</a>
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
                desc: {
                    required: true
                },
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'services/verify-name-existed.php' ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $("input[name='name']").val();
                            },
                            id:<?= $service['id']?>
                        }
                    }
                },
                short_desc: {
                    required: true,
                    maxlength: 191
                },
                image: {
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                desc: {
                    required: "Hãy nhập mô tả chi tiết"
                },
                name: {
                    required: "Hãy nhập tên dịch vụ",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Dịch vụ đã tồn tại, vui lòng sử dụng dịch vụ khác"
                },
                short_desc: {
                    required: "Hãy nhập mô tả ngắn",
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