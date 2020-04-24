<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();
if(isset($_GET['checked'])){
    $getBooking = "select b.*, r.name rName 
                        from booking b
                        join room_types r
                        on r.id = b.room_types
                        where b.check_in = 0
                        ORDER BY b.id DESC";
}elseif(isset($_GET['notchecked'])){
    $getBooking = "select b.*, r.name rName 
                        from booking b
                        join room_types r
                        on r.id = b.room_types
                        where b.check_in = 2
                        ORDER BY b.id DESC";
}else{
    $getBooking = "select b.*, r.name rName 
                        from booking b
                        join room_types r
                        on r.id = b.room_types
                        where b.check_in = 1
                        ORDER BY b.id DESC";
}
$bookings = queryExecute($getBooking, true);

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
                            <h1 class="m-0 text-dark">Quản Lý Đặt Phòng</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Loại phòng</th>
                                            <th>Giá hóa đơn</th>
                                            <th>
                                                <a href="<?= ADMIN_URL . 'booking' ?>" class="btn btn-warning btn-sm"><i class="far fa-circle"></i> Chưa duyệt</a>
                                                <a href="<?= ADMIN_URL . 'booking?notchecked' ?>" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Không duyệt</a>
                                                <a href="<?= ADMIN_URL . 'booking?checked' ?>" class="btn btn-success btn-sm"><i class="far fa-check-circle"></i> Đã duyệt</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bookings as $book) : ?>
                                            <tr>
                                                <td><?= $book['name'] ?></td>
                                                <td><?= $book['phone_number'] ?></td>
                                                <td><?= $book['email'] ?></td>
                                                <td><?= $book['rName'] ?></td>
                                                <td><?= $book['total_price'] ?></td>
                                                <td>
                                                    <a href="<?= ADMIN_URL . 'booking/checking-form.php?id=' . $book['id'] ?>" class="btn btn-sm btn-info"><i class="far fa-calendar-check"></i></a>
                                                    <a href="<?= ADMIN_URL . 'booking/remove.php?id=' . $book['id'] ?>" class="btn-remove btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
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
    <?php include_once '../_share/scripts.php' ?>
    <script>
        $('.btn-remove').on('click', function() {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa đơn đặt này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý'
            }).then((result) => { // arrow function es6 (es2015)
                if (result.value) {
                    window.location.href = redirectUrl;
                }
            });
            return false;
        });
    </script>
</body>

</html>