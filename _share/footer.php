<div class="site-footer">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h5>SOCIAL MEDIA</h5>
                    <h6>FOLLOW THE GRADIUM</h6>
                    <div class="widget-social-icons">
                        <ul>
                            <li><a href="<?= $webSetting['facebook_url'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= $webSetting['twitter_url'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?= $webSetting['googleplus_url'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?= $webSetting['instagram_url'] ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>NEWSLETTER</h5>
                    <h6>WE LOVE TO SHARE NEW OFFERS AND EXLUSIVE PROMOTIONS</h6>
                    <div class="widget-newsletter">
                        <form>
                            <input type="text" placeholder="ENTER YOUR E-MAIL ADDRESS" required>
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="wrapper">
            <div class="footer-logo">
                <img src="<?= BASE_URL. $webSetting['logo'] ?>" alt="The Grandium Hotel">
            </div>
            <div class="footer-copyright">
                <p>COPYRIGHT © THE GRANDIUM HOTEL</p>
            </div>
            <div class="footer-contact">
                <ul>
                    <li><i class="fa fa-map-marker"></i><?= $webSetting['address']?></li>
                    <li><i class="fa fa-phone"></i><?= $webSetting['phone_number']?></li>
                    <li><a href="mailto:<?= $webSetting['email']?>"><i class="fa fa-paper-plane"></i><?= $webSetting['email']?></a></li>
                </ul>
            </div>
            <div class="footer-nav">
                <ul>
                    <li><a href="<?= $webSetting['map_url']?>">SITEMAP</a></li>
                    <li><a href="#">PRIVACY POLICY</a></li>
                    <li><a href="#">TERMS OF USE</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</div>