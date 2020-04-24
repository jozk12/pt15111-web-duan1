<?php
session_start();
require_once "./config/utils.php";
// dd($_SESSION[AUTH]['name']);
$getSlideQuery = "select * from slides where status = 1";
$slides = queryExecute($getSlideQuery, true);

$getRoomQuery = "select * from room_types where status = 1";
$rooms = queryExecute($getRoomQuery, true);

$getServiceQuery = "select * from services where status = 1";
$services = queryExecute($getServiceQuery, true);

$getGalleryQuery = "select * from galleries where status = 1";
$galleries = queryExecute($getGalleryQuery, true);

$getBlogQuery = "select * from blog";
$blogs = queryExecute($getBlogQuery, true);

$getFeedbackQuery = "select * from customer_feedback where status = 1";
$feedbacks = queryExecute($getFeedbackQuery, true);

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:27:55 GMT -->

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
        <!-- Section Slider -->
        <div class="section">
            <div class="widget-slider">
                <div class="wrapper-full">
                    <!-- Slider Carousel -->
                    <div class="widget-carousel owl-carousel owl-theme">
                        <?php foreach ($slides as $slide) : ?>
                            <div class="slider-item" data-background="<?= BASE_URL . $slide['image'] ?>">
                                <div class="wrapper">
                                    <div class="item-inner">
                                        <h5><?= $slide['intro_title'] ?></h5>
                                        <h1><?= $slide['title'] ?></h1>
                                        <h2><?= $slide['location'] ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Slider Carousel End -->

                    <!-- Slider Booking -->
                    <div class="slider-booking">
                        <div class="wrapper">
                            <h5>ĐẶT PHÒNG NGAY</h5>
                            <form action="rooms.php" method="get">
                                <ul>
                                    <li>
                                        <i class="fa fa-calendar-plus-o"></i>
                                        <input type="text" name="checkin" placeholder="CHECK IN" class="datepicker">
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar-plus-o"></i>
                                        <input type="text" name="checkout" placeholder="CHECK OUT" class="datepicker">
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-down"></i>
                                        <select name="adults">
                                            <option value="">Người lớn</option>
                                            <option value="1">1 NGƯỜI</option>
                                            <option value="2">2 NGƯỜI</option>
                                            <option value="2">3 NGƯỜI</option>
                                            <option value="2">4 NGƯỜI</option>
                                            <option value="2">5 NGƯỜI</option>
                                        </select>
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-down"></i>
                                        <select name="children">
                                            <option value="">Trẻ con</option>
                                            <option value="1">1 NGƯỜI</option>
                                            <option value="2">2 NGƯỜI</option>
                                            <option value="2">3 NGƯỜI</option>
                                            <option value="2">4 NGƯỜI</option>
                                            <option value="2">5 NGƯỜI</option>
                                        </select>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn">TÌM KIẾM</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- Slider Booking End -->
                </div>
            </div>
        </div>
        <!-- Section Slider End -->

        <!-- Section Rooms -->
        <div class="section">
            <div class="widget-rooms-carousel top-over">
                <div class="wrapper-inner">
                    <!-- Rooms Carousel -->
                    <div class="widget-carousel owl-carousel owl-theme">
                        <?php foreach ($rooms as $room) : ?>
                            <div class="rooms-item">
                                <div class="item-inner">
                                    <div class="item-photo">
                                        <a href="rooms-detail.php?id=<?= $room['id'] ?>" data-background="<?= BASE_URL . $room['image'] ?>"></a>
                                    </div>
                                    <div class="item-desc">
                                        <h2><a href="rooms-detail.php"><?= $room['name'] ?></a></h2>
                                        <h3><?= $room['price'] ?> VNĐ</h3>
                                        <p><?= $room['short_desc'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Rooms Carousel End -->
                </div>
            </div>
        </div>
        <!-- Section Rooms End -->

        <!-- Section About Promo -->
        <div class="section">
            <div class="widget-about-promo" data-background="<?= THEME_ASSET_URL ?>assets/img/photo-blog-big-3.jpg">
                <div class="wrapper-inner">
                    <div class="widget-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>ABOUT THE GRANDIUM</h5>
                                <h2>Your Perfect Escape</h2>
                                <p><?= $webSetting['intro_about'] ?></p>
                                <a href="aboutus.php" class="btn">LEARN MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section About Promo End -->

        <!-- Section Features -->
        <div class="section">
            <div class="widget-features-grid">
                <div class="wrapper-inner">
                    <!-- Features Title -->
                    <div class="widget-title">
                        <h5>OUR FACILITIES</h5>
                        <h2>Explore The Grandium</h2>
                        <p><?= $webSetting['intro_service'] ?></p>
                    </div>
                    <!-- Features Title End -->
                    <!-- Features Content -->
                    <div class="widget-inner">
                        <div class="row">
                            <?php foreach ($services as $service) : ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="features-item" data-background="<?= BASE_URL . $service['image'] ?>">
                                        <a href="services.php">
                                            <h3><?= $service['name'] ?></h3>
                                            <p><?= $service['short_desc'] ?></p>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!-- Features Content End -->
                </div>
            </div>
        </div>
        <!-- Section Features End -->

        <!-- Section Gallery -->
        <div class="section">
            <div class="widget-gallery-carousel">
                <div class="wrapper-full-inner">
                    <!-- Gallery Title -->
                    <div class="widget-title">
                        <h5>GALLERY</h5>
                        <h2>Discover The Grandium</h2>
                        <p><?= $webSetting['intro_gallery'] ?></p>
                    </div>
                    <!-- Gallery Title End -->
                    <!-- Gallery Carousel -->
                    <div class="widget-carousel owl-carousel owl-theme">
                        <?php foreach ($galleries as $gallery) : ?>
                            <div class="gallery-item">
                                <a href="<?= BASE_URL . $gallery['image'] ?>" data-background="<?= BASE_URL . $gallery['image'] ?>" title="Photo Name" class="popup-gallery">
                                    <span class="item-text"><?= $gallery['name'] ?></span>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Gallery Carousel End -->
                </div>
            </div>
        </div>
        <!-- Section Gallery End -->

        <!-- Section Blog -->
        <div class="section">
            <div class="widget-blog-carousel">
                <div class="wrapper-full-inner">
                    <!-- Blog Title -->
                    <div class="widget-title">
                        <h5>BLOG</h5>
                        <h2>Latest News</h2>
                        <p><?= $webSetting['intro_blog'] ?></p>
                    </div>
                    <!-- Blog Title End -->
                    <!-- Blog Carousel -->
                    <div class="widget-carousel owl-carousel owl-theme">
                        <?php foreach ($blogs as $blog) : ?>
                            <div class="blog-item">
                                <div class="item-media">
                                    <div class="item-date"><b><?= date('d',strtotime($blog['create_at'])) ?></b><?= date('D',strtotime($blog['create_at'])) ?></div>
                                    <div class="media-photo">
                                        <a href="blog-single.php?id=<?= $blog['id'] ?>" data-background="<?= BASE_URL . $blog['image'] ?>"></a>
                                    </div>
                                </div>
                                <div class="item-desc">
                                    <h3><a href="blog-single.php"><?= $blog['title'] ?></a></h3>
                                    <p><?= $blog['short_ct'] ?></p>
                                    <a href="blog-single.php?id=<?= $blog['id'] ?>" class="btn-link">READ MORE</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!-- Blog Carousel End -->
                    </div>
                </div>
            </div>
            <!-- Section Blog End -->

            <!-- Section Testimonials -->
            <div class="section">
                <div class="widget-testimonials-carousel">
                    <div class="wrapper-inner">
                        <!-- Testimonials Title -->
                        <div class="widget-title">
                            <h5>TESTIMONIALS</h5>
                            <h2>Happy Clients</h2>
                            <p><?= $webSetting['intro_testimonials'] ?></p>
                        </div>
                        <!-- Testimonials Title End -->
                        <!-- Testimonials Carousel -->
                        <div class="widget-carousel owl-carousel owl-theme">
                            <?php foreach ($feedbacks as $feedback) : ?>
                                <div class="testimonials-item">
                                    <div class="item-comment">
                                        <?= $feedback['content'] ?>
                                    </div>
                                    <div class="item-customer">
                                        <div class="customer-photo" data-background="<?= BASE_URL . $feedback['avatar'] ?>"></div>
                                        <h5><?= $feedback['name'] ?></h5>
                                        <h6><?= $feedback['city'] ?></h6>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <!-- Testimonials Carousel End -->
                    </div>
                </div>
            </div>
            <!-- Section Testimonials End -->
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
        <!-- Message Scripts -->
        <?php include_once './_share/msg_succ.php' ?>
</body>

<!-- Mirrored from preview.locotheme.com/grandium-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:11 GMT -->

</html>