<?php
session_start();
require_once "./config/utils.php";

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

$getServiceQuery = "select * from services where status = 1";
$services = queryExecute($getServiceQuery, true);

?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:19 GMT -->

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
        <!-- Section Services -->
        <div class="section">
            <div class="wrapper-inner">
                <!-- Services List -->
                <div class="widget-services-list">
                    <?php foreach ($services as $service) : ?>
                        <div class="services-item">
                            <div class="item-photo">
                                <div class="photo-big" data-background="<?= $service['image']?>"></div>
                            </div>
                            <div class="item-desc">
                                <h5>OUR FACILITIES</h5>
                                <h2><?= $service['name']?></h2>
                                <p><?= $service['description']?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- Services List End -->
            </div>
        </div>
        <!-- Section Services End -->
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

<!-- Mirrored from preview.locotheme.com/grandium-html/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:19 GMT -->

</html>