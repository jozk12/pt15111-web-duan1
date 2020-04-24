<?php
session_start();
require_once "./config/utils.php";

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

$getGalleryQuery = "select * from galleries where status = 1";
$galleries = queryExecute($getGalleryQuery, true);

?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:19 GMT -->

<head>
<?php include_once './_share/styles.php' ?>ư
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
        <!-- Section Gallery -->
        <div class="section">
            <div class="wrapper-inner">
                <!-- Gallery Filter -->
                <div class="widget-title">
                        <h5>OUR GALLERY</h5>
                        <br>
                        <h2>Discover The Grandium</h2>
                    </div>
                <!-- Gallery Filter End -->
                <!-- Gallery List -->
                <div class="widget-gallery-grid">
                    <div class="row">
                        <?php foreach ($galleries as $gallery) : ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 isotope-item">
                                <div class="gallery-item">
                                    <a href="<?=BASE_URL. $gallery['image']?>" data-background="<?=BASE_URL. $gallery['image']?>" title="<?= $gallery['name']?>" class="popup-gallery"></a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <!-- Gallery List End -->
            </div>
        </div>
        <!-- Section Gallery End -->
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

<!-- Mirrored from preview.locotheme.com/grandium-html/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:25 GMT -->

</html>