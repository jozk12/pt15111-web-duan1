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
                            <h1 class="m-0 text-dark">Thêm Cài Đặt</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'web_settings/save-add.php' ?>" method="post" id="add-web-form" enctype="multipart/form-data">
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
                                            <label for="">Số điện thoại</label>
                                            <input type="text" name="phone" class="form-control">
                                            <?php if (isset($_GET['phoneerr'])) : ?><label for="" class="error"><?= $_GET['phoneerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" name="address" class="form-control">
                                            <?php if (isset($_GET['addresserr'])) : ?><label for="" class="error"><?= $_GET['addresserr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                            <?php if (isset($_GET['emailerr'])) : ?><label for="" class="error"><?= $_GET['emailerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Map_URL</label>
                                            <input type="text" name="map" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Facebook_URL</label>
                                            <input type="text" name="fb" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Twitter_URL</label>
                                            <input type="text" name="tt" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Instagram_URL</label>
                                            <input type="text" name="ins" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">GooglePlus_URL</label>
                                            <input type="text" name="gg" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giới thiệu web</label>
                                            <textarea name="about"  class="form-control content_mce" cols="30" rows="7"></textarea>
                                            <?php if (isset($_GET['abouterr'])) : ?><label for="" class="error"><?= $_GET['abouterr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giới thiệu dịch vụ</label>
                                            <textarea name="service"  class="form-control content_mce" cols="30" rows="7"></textarea>
                                            <?php if (isset($_GET['serviceerr'])) : ?><label for="" class="error"><?= $_GET['serviceerr'] ?></label>
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
                                                <label for="">Logo</label>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="logo" onchange="encodeImageFileAsURL(this)" class="custom-file-input">
                                                <label for="" class="custom-file-label">Chọn Ảnh</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giới thiệu ảnh</label>
                                            <textarea name="gallery"   class="form-control content_mce" cols="30" rows="7"></textarea>
                                            <?php if (isset($_GET['galleryerr'])) : ?><label for="" class="error"><?= $_GET['galleryerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giới thiệu blog</label>
                                            <textarea name="blog"   class="form-control content_mce" cols="30" rows="7"></textarea>
                                            <?php if (isset($_GET['blogerr'])) : ?><label for="" class="error"><?= $_GET['blogerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Giới thiệu phản hồi</label>
                                            <textarea name="feedback"   class="form-control content_mce" cols="30" rows="7"></textarea>
                                            <?php if (isset($_GET['feedbackerr'])) : ?><label for="" class="error"><?= $_GET['feedbackerr'] ?></label>
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
                            <a href="<?= ADMIN_URL . 'web_settings' ?>" class="btn btn-danger">Hủy</a>
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
        $('#add-web-form').validate({
            rules: {
                phone: {
                    required: true,
                    number: true
                },
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'web_settings/verify-name-existed.php' ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $("input[name='name']").val();
                            }
                        }
                    }
                },
                address: {
                    required: true,
                    maxlength: 191
                },
                email: {
                    required: true,
                    maxlength: 191,
                    email: true
                },
                map: {
                    required: true,
                    maxlength: 191
                },
                fb: {
                    required: true,
                    maxlength: 191
                },
                tt: {
                    required: true,
                    maxlength: 191
                },
                ins: {
                    required: true,
                    maxlength: 191
                },
                gg: {
                    required: true,
                    maxlength: 191
                },
                about: {
                    required: true
                },
                service: {
                    required: true
                },
                gallery: {
                    required: true
                },
                blog: {
                    required: true
                },
                feedback: {
                    required: true
                },
                logo: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                phone: {
                    required: "Hãy nhập số điện thoại",
                    number: "Nhập định dạng số"
                },
                name: {
                    required: "Hãy nhập tên",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    remote: "Tên đã tồn tại, vui lòng sử dụng tên khác"
                },
                address: {
                    required: "Hãy nhập địa chỉ",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                email: {
                    required: "Hãy nhập email",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    email: "Hãy nhập đúng định dạng email"
                },
                map: {
                    required: "Hãy nhập map",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                fb: {
                    required: "Hãy nhập địa chỉ facebook",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                tt: {
                    required: "Hãy nhập địa chỉ twitter",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                ins: {
                    required: "Hãy nhập địa chỉ instagram",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                gg: {
                    required: "Hãy nhập địa chỉ google plus",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                about: {
                    required: "Hãy nhập giới thiệu trang web"
                },
                service: {
                    required: "Hãy nhập dịch vụ giới thiệu"
                },
                gallery: {
                    required: "Hãy nhập ảnh giới thiệu"
                },
                blog: {
                    required: "Hãy nhập blog giới thiệu"
                },
                feedback: {
                    required: "Hãy nhập phản hồi giới thiệu"
                },
                logo: {
                    required: "Hãy nhập ảnh",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>