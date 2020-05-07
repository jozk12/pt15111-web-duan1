<?php
session_start();
require_once "./config/utils.php";
$id = isset($_GET['id']) ? $_GET['id'] : -1;
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : "";
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : "";

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

$getRoomQuery = "select *from room_types where id ='$id' and status = 1";
$room = queryExecute($getRoomQuery, false);

if (!$room) {
    header('location: rooms?msg=Phòng không tồn tại');
}
$getRoomGallsQuery = "select * from room_galleries where room_id='$id' and status = 1";
$roomGalls = queryExecute($getRoomGallsQuery, true);

$getServiceQuery = "select s.id, 
                        s.name
                        from room_service_xref sxr
                        join room_services s
                        on sxr.service_id = s.id
                        where sxr.room_id = " . $room['id'];
$services = queryExecute($getServiceQuery, true);
$room['room_sv'] = $services;

?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/rooms-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:17 GMT -->

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
        <!-- Section Page Title -->
        <div class="section">
            <div class="widget-page-title">
                <div class="widget-background" data-background="<?= BASE_URL.$room['image']?>"></div>
                <div class="wrapper-inner">
                    <!-- Title -->
                    <h5>EXPERIENCE THE FREEDOM</h5>
                    <h1><?= $room['name'] ?></h1>
                    <p><?= $room['short_desc'] ?></p>
                    <!-- Title End -->
                </div>
            </div>
        </div>
        <!-- Section Page Title End -->
        <!-- Section Rooms Detail -->
        <div class="section">
            <div class="wrapper-inner">
                <div class="widget-rooms-detail">
                    <div class="widget-inner">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Room Slider -->
                                <div class="room-slider">
                                    <div class="room-price"><?= $room['price'] ?> VNĐ<small>PER NIGHT</small></div>
                                    <div class="owl-carousel owl-theme owl-type1">
                                        <?php foreach ($roomGalls as $gall) : ?>
                                            <a href="<?= BASE_URL . $gall['image'] ?>" data-background="<?= BASE_URL . $gall['image'] ?>" title="<?= $room['name'] ?>" class="popup-gallery"></a>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <!-- Room Slider End -->
                                <!-- Room Thumbnails -->
                                <div class="room-thumbnails">
                                    <div class="owl-carousel">
                                        <?php foreach ($roomGalls as $gall) : ?>
                                            <a href="#" data-background="<?= BASE_URL . $gall['image'] ?>" title="<?= BASE_URL . $gall['room_id'] ?>"></a>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <!-- Room Thumbnails End -->
                                <!-- Room Description -->
                                <div class="room-desc">
                                    <h5>ROOM DESCRIPTION</h5>
                                    <p><?= $room['description'] ?></p>
                                </div>
                                <!-- Room Description End -->
                            </div>
                            <div class="col-md-4">
                                <!-- Room Booking -->
                                <div class="room-booking">
                                    <h5>BOOKING</h5>
                                    <h2>Book a Room</h2>
                                    <div class="data-form">
                                        <form action="save-pri-book.php" id="add-pri-book-form" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <i class="fa fa-calendar-plus-o"></i>
                                                    <input type="text" name="id" hidden id="" value="<?= $room['id'] ?>">
                                                    <input type="text" autocomplete="off" name="checkin" placeholder="CHECK IN" class="datepicker" value=<?= $checkin ?>>
                                                    <?php if (isset($_GET['checkinerr'])) : ?>
                                                        <span class="text-danger"><?= $_GET['checkinerr'] ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <i class="fa fa-calendar-plus-o"></i>
                                                    <input type="text" autocomplete="off" name="checkout" placeholder="CHECK OUT" class="datepicker" value="<?= $checkout ?>">
                                                    <?php if (isset($_GET['checkouterr'])) : ?>
                                                        <span class="text-danger"><?= $_GET['checkouterr'] ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <i class="fa fa-child"></i>
                                                    <input type="text" name="adults" value="<?= $room['adults'] ?> NGƯỜI LỚN" disabled></input>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <i class="fa fa-male"></i>
                                                    <input type="text" name="children" value="<?= $room['children'] ?> TRẺ EM" disabled> </input>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn">BOOK NOW THIS ROOM</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Room Booking End -->
                                <!-- Room Features -->
                                <div class="room-features">
                                    <h5>FEATURES</h5>
                                    <h2>Room Features</h2>
                                    <ul>
                                        <?php foreach ($room['room_sv'] as $rSer) : ?>
                                            <li><i class="fa fa-check"></i><?= $rSer['name'] ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <!-- Room Features End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Rooms Detail End -->
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
    <?php include_once './admin/_share/scripts.php' ?>
    <script>
        $('#add-pri-book-form').validate({
            rules: {
                checkin: {
                    required: true
                },
                checkout: {
                    required: true
                }
            },
            messages: {
                checkin: {
                    required: "Hãy nhập ngày đến khách sạn"
                },
                checkout: {
                    required: "Hãy nhập ngày rời khách sạn"
                }
            }
        });
    </script>
</body>

<!-- Mirrored from preview.locotheme.com/grandium-html/rooms-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:19 GMT -->

</html>