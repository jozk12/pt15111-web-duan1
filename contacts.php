<?php
session_start();
require_once "./config/utils.php";

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/contactus.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:28 GMT -->

<head>
    <?php include_once './_share/styles.php' ?>
</head>

<body>

    <!-- Site Back Top -->
    <?php include_once './_share/back_top.php' ?>
    <!-- Site Back Top End -->

    <!-- Site Header -->
    <?php include_once './_share/header.php' ?>
    <!-- Site Header End -->

    <!-- Site Main -->
    <div class="site-main">


        <!-- Section Contact -->
        <div class="section">
            <div class="wrapper-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Contact Info -->
                        <div class="widget-contact-info">
                            <ul>
                                <li>
                                    <h5>THE GRANDIUM HOTEL</h5>
                                    <ul>
                                        <li><?= $webSetting['address'] ?></li>
                                        <li><?= $webSetting['phone_number'] ?></li>
                                        <li><a href="mailto:<?= $webSetting['email'] ?>"><?= $webSetting['email'] ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Contact Info End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Contact Form -->
                        <div class="widget-contact-form">
                            <h5>CONTACT FORM</h5>
                            <p>We are eager to hear from you; please fill in your contact information and one of our staff members will contact you shortly.</p>
                            <div class="data-form">
                                <form action="save-contact.php" method="post" id="add-contact-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="YOUR NAME">
                                            <?php if (isset($_GET['nameerr'])) : ?>
                                                <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" placeholder="YOUR PHONE">
                                            <?php if (isset($_GET['phoneerr'])) : ?>
                                                <span class="text-danger"><?= $_GET['phoneerr'] ?></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="email" placeholder="YOUR EMAIL ADDRESS">
                                            <?php if (isset($_GET['emailerr'])) : ?>
                                                <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="subject" placeholder="YOUR SUBJECT">
                                            <?php if (isset($_GET['sjerr'])) : ?>
                                                <span class="text-danger"><?= $_GET['sjerr'] ?></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea cols="6" rows="8" name="message" placeholder="YOUR MESSAGE"></textarea>
                                            <?php if (isset($_GET['msgerr'])) : ?>
                                                <span class="text-danger"><?= $_GET['msgerr'] ?></span>  
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6 align-right">
                                            <input type="submit" value="SEND FORM" class="btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Contact End -->

        <!-- Section Map -->
        <div class="section">
            <div class="wrapper-full">
                <div class="widget-google-map">
                    <!-- Google Map Title -->
                    <div class="map-title">
                        <i class="fa fa-map-marker"></i>
                        <h5>MAP</h5>
                    </div>
                    <!-- Google Map Title End -->
                    <!-- Google Map -->
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639810443333!2d105.74459841475552!3d21.038127785993332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sen!2s!4v1584850838954!5m2!1sen!2s" width="100%" height="600px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!-- Google Map End -->
                </div>
            </div>
        </div>
        <!-- Section Map End -->
    </div>
    <!-- Site Main End -->

    <!-- Site Footer -->
    <?php include_once './_share/footer.php' ?>
    <!-- Site Footer End -->

    <!-- Scripts -->
    <?php include_once './_share/scripts.php' ?>
    <!-- Map Scripts -->
    <?php include_once './_share/map_scripts.php' ?>

    <!-- Custom Scripts -->
    <?php include_once './_share/custom_scripts.php' ?>
    <?php include_once './admin/_share/scripts.php'?>
    <script>
        $('#add-contact-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191
                },
                email: {
                    required: true,
                    maxlength: 191,
                    email: true,
                    remote: {
                        url: "<?= BASE_URL . 'verify-email-contact-existed.php' ?>",
                        type: "post",
                        data: {
                            email: function() {
                                return $("input[name='email']").val();
                            }
                        }
                    }
                },
                phone: {
                    required: true,
                    number: true
                },
                subject: {
                    required: true,
                    maxlength: 191
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tên",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                email: {
                    required: "Hãy nhập email",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    email: "Yêu cầu nhập đúng định dạng email",
                    remote: "Email đã tồn tại, yêu cầu nhập email khác"
                },
                phone: {
                    required: "Hãy nhập số điện thoại",
                    number: "Ký tự nhập phải là số"
                },
                subject: {
                    required: "Hãy nhập chủ đề",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                message: {
                    required: "Hãy nhập lời nhắn"
                }
            }
        });
    </script>
</body>

<!-- Mirrored from preview.locotheme.com/grandium-html/contactus.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:28 GMT -->

</html>