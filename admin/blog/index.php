<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$getBlogs = "select b.*, u.name name
                    from blog b
                    join users u
                    on b.author_id = u.id
                    ORDER BY b.id DESC";
$blogs = queryExecute($getBlogs, true);

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
                            <h1 class="m-0 text-dark">Quản Lý Blog</h1>
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
                                            <th>Tiêu đề</th>
                                            <th>Ảnh</th>
                                            <th>Tác giả</th>
                                            <th>Trạng thái</th>
                                            <th><a href="<?= ADMIN_URL . 'blog/add-form.php' ?>" class="btn btn-primary btn-m"><i class="fa fa-plus"></i> Thêm</a>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($blogs as $blog) : ?>
                                            <tr>
                                                <td><?= $blog['title'] ?></td>
                                                <td><img src="<?= BASE_URL . $blog['image'] ?>" width="70px" alt=""></td>
                                                <td><?= $blog['name'] ?></td>
                                                <td><?php if ($blog['status'] == 1) : ?>
                                                        Hoạt động
                                                    <?php else : ?>
                                                        Không hoạt động
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a href="<?= ADMIN_URL . 'blog/edit-form.php?id=' . $blog['id']  ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                    <a href="<?= ADMIN_URL . 'blog/remove.php?id=' . $blog['id'] ?>" class="btn-remove btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                text: "Bạn có chắc chắn muốn xóa blog này?",
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