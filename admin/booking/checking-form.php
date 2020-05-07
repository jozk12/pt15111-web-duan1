<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getBooking = "select b.* , r.name roomName
                from booking b
                join room_types r
                on r.id = b.room_types
                where b.id = $id";
$book = queryExecute($getBooking, false);
if(!$book){
    header("location: ".ADMIN_URL."booking?msg=Đơn không tồn tại");
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
                            <h1 class="m-0 text-dark">Kiểm Tra Đơn Đặt Phòng</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'booking/save-checking.php' ?>" id="checking-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $book['id'] ?>" id="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên người đặt</label>
                                            <input type="text" readonly name="name" class="form-control" value="<?= $book['name'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" readonly name="phone" class="form-control" value="<?= $book['phone_number'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" readonly name="email" class="form-control" value="<?= $book['email'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ngày đến</label>
                                            <input type="date" readonly name="checkin_date" class="form-control" value="<?= $book['checkin_date'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ngày rời</label>
                                            <input type="date" readonly name="checkout_date" class="form-control" value="<?= $book['checkout_date'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số người lớn</label>
                                            <input type="text" readonly name="adults" class="form-control" value="<?= $book['adults'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số trẻ em</label>
                                            <input type="text" readonly name="children" class="form-control" value="<?= $book['children'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Loại phòng</label>
                                            <input type="text" readonly name="roomName" class="form-control" value="<?= $book['roomName'] ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Yêu cầu đặc biệt</label>
                                            <textarea readonly name="request" class="form-control" id="" cols="30" rows="6"><?= $book['request'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tổng đơn giá</label>
                                            <input  readonly type="text" name="total" id="" class="form-control" value="<?= number_format($book['total_price'],0,",",".")?> VNĐ">
                                        </div>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <select name="check_in" id="" class="form-control">
                                            <option <?php if($book['check_in']==2):?> selected<?php endif?> value="2">Không Duyệt</option>
                                            <option <?php if($book['check_in']==0):?> selected<?php endif?> value="0">Duyệt</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lời nhắn</label>
                                        <textarea name="reply" class="form-control content_mce" id="" cols="30" rows="8"></textarea>
                                        <?php if(isset($_GET['replyerr'])):?>
                                            <?=$_GET['replyerr']?>
                                        <?php endif?>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'booking' ?>" class="btn btn-danger">Hủy</a>
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
        $('#checking-form').validate({
            rules: {
                reply: {
                    required: true
                },
            },
            messages: {
                reply: {
                    required: "Hãy nhập lời nhắn"
                },
            }
        });
    </script>
</body>

</html>