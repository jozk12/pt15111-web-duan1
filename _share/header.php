<div class="site-header">
    <!-- Header Top -->
    <div class="header-top">
        <div class="wrapper">
            <div class="header-contact">
                <ul>
                    <li><?= $webSetting['phone_number']?></li>
                    <li><a href="<?= $webSetting['facebook_url']?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?= $webSetting['twitter_url']?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?= $webSetting['googleplus_url']?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="<?= $webSetting['instagram_url']?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="header-lang">
                <ul>
                    <?php if (!isset($_SESSION[AUTH])) : ?>
                        <li class="active"><a href="login.php">LOG-IN</a></li>
                        <li><a href="register.php">REGISTER</a></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION[AUTH])) : ?>
                        <li>
                            <a href="#">Xin Chào: <?= $_SESSION[AUTH]['name']; ?></a>
                        </li>
                        <?php if($_SESSION[AUTH]['role_id'] >=2):?>
                            <li>
                                <a href="<?= ADMIN_URL .'dashboard'?>">ADMIN</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?= BASE_URL . 'logout.php' ?>">LOG-OUT</a>
                        </li>
                    <?php endif; ?>
            </ul>
            </div>
        </div>
    </div>
    <!-- Header Top End -->
    <!-- Header Bottom -->
    <div class="header-bottom">
        <div class="wrapper">
            <div class="header-logo">
                <a href="index.php"><img src="<?= BASE_URL. $webSetting['logo'] ?>" alt="The Grandium Hotel"></a>
            </div>
            <div class="header-nav">
                <ul class="nav-left">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                    <li><a href="rooms.php">ROOMS</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                </ul>
                <ul class="nav-right">
                    <li><a href="gallery.php">GALLERY</a></li>
                    <li><a href="booking.php">BOOKING</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="contacts.php">CONTACT</a></li>
                </ul>
            </div>
            <div class="header-toggle">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
    <!-- Header Bottom End -->
</div>