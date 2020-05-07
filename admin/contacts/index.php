<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

if (isset($_GET['reply'])) {
    $getContact = "select c.*, u.name replyer 
                    from contacts c 
                    join users u
                    on u.id = c.reply_by
                    where c.reply_for IS NULL and c.status = 0 ORDER BY u.id DESC";
} else {
    $getContact = "select c.*
                    from contacts c 
                    where c.reply_for IS NULL and c.status = 1 ORDER BY c.id DESC";
}
$contacts = queryExecute($getContact, true);

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
                            <h1 class="m-0 text-dark">Quản Lý Liên Hệ</h1>
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
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <?php if (isset($_GET['reply'])) : ?>
                                            <th>Trả lời bởi</th> 
                                            <?php endif ?>
                                            <th>
                                                <a href="<?= ADMIN_URL . 'contacts' ?>" class="btn btn-warning btn-sm"><i class="far fa-envelope"></i> Chưa trả lời</a>
                                                <a href="<?= ADMIN_URL . 'contacts?reply' ?>" class="btn btn-success btn-sm"><i class="far fa-envelope-open"></i> Đã trả lời</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($contacts as $contact) : ?>
                                            <tr>
                                                <td><?= $contact['id'] ?></td>
                                                <td><?= $contact['name'] ?></td>
                                                <td><?= $contact['phone_number'] ?></td>
                                                <td><?= $contact['email'] ?></td>
                                                <?php if (isset($_GET['reply'])) : ?>
                                                    <td><?= $contact['replyer'] ?></td>   
                                                <?php endif ?>
                                                <td>
                                                    <?php if (isset($_GET['reply'])) : ?>
                                                        <a href="<?= ADMIN_URL . 'contacts/answer-form.php?id=' . $contact['id'].'&&reply' ?>" class="btn btn-sm btn-info"><i class="far fa-comment-dots"></i></a>
                                                    <?php else:?>
                                                        <a href="<?= ADMIN_URL . 'contacts/answer-form.php?id=' . $contact['id']?>" class="btn btn-sm btn-info"><i class="far fa-comment-dots"></i></a>
                                                    <?php endif ?>
                                                    <a href="<?= ADMIN_URL . 'contacts/remove.php?id=' . $contact['id'] ?>" class="btn-remove btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    <!-- ./wrapper -->
    <?php include_once '../_share/scripts.php' ?>
    <script>
        $('.btn-remove').on('click', function() {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa liên hệ này?",
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