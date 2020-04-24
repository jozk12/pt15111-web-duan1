<?php
session_start();
require_once "./config/utils.php";

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

$getServiceQuery = "select * from services where status = 1";
$services = queryExecute($getServiceQuery, true);

$getFeedbackQuery = "select * from customer_feedback where status = 1";
$feedbacks = queryExecute($getFeedbackQuery, true);

$getRoomServiceQuery = "select * from room_services where status = 1";
$rService = queryExecute($getRoomServiceQuery, true);

?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/aboutus.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:17 GMT -->

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
        <!-- Section About Promo -->
        <div class="section">
            <div class="widget-about-promo" data-background="<?= PUBLIC_URL .'images/about.jpg'?>">
                <div class="wrapper-inner">
                    <div class="widget-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>ABOUT THE GRANDIUM</h5>
                                <h2>Your Perfect Escape</h2>
                                <p><?= $webSetting['intro_about'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section About Promo End -->

        <!-- Section About Grid -->
        <div class="section">
            <div class="widget-about-grid">
                <div class="wrapper-inner">
                    <div class="widget-inner">
                        <div class="widget-item">
                            <h5>ABOUT</h5>
                            <h2>Our Philosophy</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget commodo orci. Integer varius nibh eu mattis porta. Pellentesque dictum sem eget cursus semper. Nullam quis blandit lorem. Morbi blandit orci urna, eu congue magna faucibus at. In bibendum in mauris nec ultrices. Nunc et magna velit.</p>
                            <p>Nulla vel nisi felis. Vivamus vitae ex a magna cursus pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque nec ante euismod, posuere turpis facilisis, fringilla odio. Nunc eget purus at dolor venenatis cursus et non arcu.</p>
                        </div>
                        <div class="widget-item">
                            <h5>THE GRANDIUM</h5>
                            <h2>Our Mission</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget commodo orci. Integer varius nibh eu mattis porta. Pellentesque dictum sem eget cursus semper. Nullam quis blandit lorem. Morbi blandit orci urna, eu congue magna faucibus at. In bibendum in mauris nec ultrices. Nunc et magna velit.</p>
                            <p>Nulla vel nisi felis. Vivamus vitae ex a magna cursus pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque nec ante euismod, posuere turpis facilisis, fringilla odio. Nunc eget purus at dolor venenatis cursus et non arcu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section About Grid End -->

        <!-- Section Features -->
        <div class="section">
            <div class="widget-features-carousel">
                <div class="wrapper-inner">
                    <!-- Features Title -->
                    <div class="widget-title">
                        <h5>KEY FEATURES</h5>
                        <h2>Explore The Grandium</h2>
                        <p><?= $webSetting['intro_service'] ?></p>
                    </div>
                    <!-- Features Title End -->
                    <!-- Features Carousel -->
                    <div class="widget-carousel owl-carousel owl-theme">
                        <?php foreach ($rService as $rSer) : ?>
                            <div class="features-item">
                                <div class="item-inner" data-background="<?= BASE_URL . $rSer['icon'] ?>">
                                    <h5><?= $rSer['name'] ?></h5>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Features Carousel End -->
                </div>
            </div>
        </div>
        <!-- Section Features End -->
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
</body>

<!-- Mirrored from preview.locotheme.com/grandium-html/aboutus.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:17 GMT -->

</html>