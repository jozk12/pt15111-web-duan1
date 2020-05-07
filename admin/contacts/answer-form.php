<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getContact = "select * from contacts where id = $id";
$contact = queryExecute($getContact, false);
if (!$contact) {
    header('location:' . ADMIN_URL . 'contacts?msg=Liên hệ không tồn tại');
    die;
}
$getReply = "select * from contacts where reply_for=$id";
$rep = queryExecute($getReply, false);
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
                            <h1 class="m-0 text-dark">Trả Lời Liên hệ</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'contacts/save-answer.php' ?>" id="answer-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $contact['id'] ?>" id="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên người gửi</label>
                                            <input type="text" name="name" class="form-control" readonly value="<?= $contact['name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" name="phone" class="form-control" readonly value="<?= $contact['phone_number'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control" readonly value="<?= $contact['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Chủ đề</label>
                                            <input type="text" name="subject" class="form-control" readonly value="<?= $contact['subject'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Lời nhắn</label>
                                            <textarea name="message" class="form-control" readonly id="" cols="30" rows="10"><?= $contact['message'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Trả lời</label>
                                            <textarea  name="reply" class="form-control content_mce"  id="" cols="30" rows="10"><?php if (isset($_GET['reply'])) : ?>
                                                    <?= $rep['message'] ?>
                                                <?php endif ?>
                                                </textarea>
                                            <?php if (isset($_GET['replyerr'])) : ?>
                                                <label for="" class="text-danger"><?= $_GET['replyerr'] ?></label>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="card-footer">
                            <?php if (!isset($_GET['reply'])) : ?>
                                <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;
                                <a href="<?= ADMIN_URL . 'contacts' ?>" class="btn btn-danger">Hủy</a>
                            <?php endif ?>
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
        $('#answer-form').validate({
            rules: {
                reply: {
                    required: true
                },
            },
            messages: {
                reply: {
                    required: "Hãy nhập phản hồi"
                },
            }
        });
    </script>
</body>

</html>