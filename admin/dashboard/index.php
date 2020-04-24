<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$webSettings = "select * from web_settings where status = 1";
$webs = queryExecute($webSettings, true);

$getUsers = "select * from users where status = 1";
$users = queryExecute($getUsers, true);

$getSlides = "select * from slides where status = 1";
$slides = queryExecute($getSlides, true);

$getServices = "select * from services where status = 1";
$services = queryExecute($getServices, true);

$getRooms = "select * from room_types where status = 1";
$rooms = queryExecute($getRooms, true);

$getRoomServices = "select * from room_services where status = 1";
$roomServices = queryExecute($getRoomServices, true);

$getRoomGalleries = "select * from room_galleries";
$roomGalleries = queryExecute($getRoomGalleries, true);

$getGalleries = "select * from galleries where status = 1";
$galleries = queryExecute($getGalleries, true);

$getCustomerFeedback = "select * from customer_feedback where status = 1";
$customerFeedback = queryExecute($getCustomerFeedback, true);

$getContacts = "select * from contacts where reply_by IS NULL";
$contacts = queryExecute($getContacts, true);

$getBooking = "select * from booking";
$booking = queryExecute($getBooking, true);

$getBlog = "select * from blog";
$blog = queryExecute($getBlog, true);

$getBlogCate = "select * from blog_categories where status = 1";
$blogCate = queryExecute($getBlogCate);
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
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- user -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= count($users) ?></h3>
                                    <p>Tài khoản</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'users'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- contact -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= count($contacts) ?></h3>
                                    <p>Liên Hệ</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-id-card"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'contacts'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- feedback -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= count($customerFeedback) ?></h3>
                                    <p>Phản Hồi</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-comment-alt"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'customer_feedback'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- blog -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= count($blog) ?></h3>
                                    <p>Blog</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-blogger"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'blog'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- slide -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= count($slides) ?></h3>
                                    <p>Slides</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tv"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'slides'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- room_gallery -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= count($roomGalleries) ?></h3>
                                    <p>Bộ Ảnh Phòng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-image"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'room_galleries'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- gallery -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= count($galleries) ?></h3>
                                    <p>Bộ Ảnh Khách Sạn</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'galleries'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- blog_cate -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= count($blogCate) ?></h3>
                                    <p>Thể Loại Blog</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-list-alt"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'blog_categories'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- service -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= count($services) ?></h3>
                                    <p>Dịch Vụ Khách Sạn</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-spa"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'services'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- room -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= count($rooms) ?></h3>
                                    <p>Loại Phòng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-hotel"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'room_types'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- room_service -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= count($roomServices) ?></h3>
                                    <p>Dịch Vụ Phòng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-concierge-bell"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'room_services'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- booking -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= count($booking) ?></h3>
                                    <p>Đặt Phòng</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-first-order-alt"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'booking'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- web_settings -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= count($webs) ?></h3>
                                    <p>Cài Đặt Trang Chủ</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <a href="<?= ADMIN_URL. 'web_settings'?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
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
</body>

</html>