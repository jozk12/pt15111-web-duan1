<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$getRoomSerives = "select * from room_services where status = 1";
$roomSers = queryExecute($getRoomSerives, true);
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
                            <h1 class="m-0 text-dark">Thêm Loại Phòng</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'room_types/save-add.php' ?>" method="post" id="add-room-form" enctype="multipart/form-data">
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
                                            <div class="row">
                                                <div class="col-md-5 offset-md-3">
                                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
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
                                            <label for="">Giá</label>
                                            <input type="text" name="price" class="form-control">
                                            <?php if (isset($_GET['priceerr'])) : ?><label for="" class="error"><?= $_GET['priceerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số người lớn</label>
                                            <input type="text" name="adult" class="form-control">
                                            <?php if (isset($_GET['adulterr'])) : ?><label for="" class="error"><?= $_GET['adulterr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số trẻ em</label>
                                            <input type="text" name="child" class="form-control">
                                            <?php if (isset($_GET['childerr'])) : ?><label for="" class="error"><?= $_GET['childerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Dịch vụ phòng</label>
                                            <select name="service[]" multiple="multiple" class="form-control select2" id="">
                                                <?php foreach ($roomSers as $ser) : ?>
                                                    <option value="<?= $ser['id'] ?>"><?= $ser['name'] ?></option>
                                                <?php endforeach ?>
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
                                            <textarea name="short_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                                            <?php if (isset($_GET['short_descerr'])) : ?><label for="" class="error"><?= $_GET['short_descerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả chi tiết</label>
                                            <textarea name="desc" id="" cols="30" rows="20" class="form-control"></textarea>
                                            <?php if (isset($_GET['descerr'])) : ?><label for="" class="error"><?= $_GET['descerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'room_types' ?>" class="btn btn-danger">Hủy</a>
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
        $('#add-room-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'room_types/verify-name-existed.php' ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $("input[name='name']").val();
                            }
                        }
                    }
                },
                short_desc: {
                    required: true
                },
                desc: {
                    required: true,
                },
                price: {
                    required: true,
                    number: true
                },
                adult: {
                    required: true,
                    number: true
                },
                child: {
                    required: true,
                    number: true
                },
                image: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tiêu đề",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tiêu đề đã tồn tại, vui lòng sử dụng tiêu đề khác"
                },
                short_desc: {
                    required: "Hãy nhập mô tả ngắn"
                },
                desc: {
                    required: "Hãy nhập mô tả chi tiết"
                },
                price: {
                    required: "Hãy nhập giá",
                    number: "Hãy nhập định dạng số"
                },
                adult: {
                    required: "Hãy nhập số lượng người lớn",
                    number: "Hãy nhập định dạng số"
                },
                child: {
                    required: "Hãy nhập số lượng trẻ em",
                    number: "Hãy nhập định dạng số"
                },
                image: {
                    required: "Hãy nhập ảnh",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>