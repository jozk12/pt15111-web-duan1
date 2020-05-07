<?php
session_start();
require_once "./config/utils.php";

$id = isset($_SESSION[BOOK]['id']) ? $_SESSION[BOOK]['id'] : "";
$checkin = $_SESSION[BOOK]['checkin'];
$checkout = $_SESSION[BOOK]['checkout'];
$getRoomQuery = "select * from room_types where id = '$id'";
$room = queryExecute($getRoomQuery, false);
$total_date = $_SESSION[BOOK]['total_date'];
$total_price=$total_date*$room['price'];
$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

if ($room == "") {
    header('location: ' . BASE_URL . 'rooms.php?msg=Bạn cần chọn phòng trước khi đặt, HÃY CHỌN PHÒNG!');
    die;
}
?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:25 GMT -->

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
        <!-- Section Booking -->
        <div class="section">
            <div class="widget-booking-form">
                <div class="wrapper-inner">
                    <div class="widget-inner">
                        <div class="row">
                            <div class="col-lg-8 col-md-7">
                                <!-- Booking Complete -->
                                <div class="booking-complete">
                                    <h5>BOOKING</h5>
                                    <h2>Your Reservation Completed</h2>
                                    <div class="complete-message">
                                        <i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget commodo orci. Integer varius nibh eu mattis porta. Pellentesque dictum sem eget cursus semper.
                                    </div>
                                </div>
                                <!-- Booking Complete End -->
                                <!-- Booking Form -->
                                <div class="booking-form">
                                    <h5>BOOKING FORM</h5>
                                    <h2>Personal Info</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget commodo orci. Integer varius nibh eu mattis porta. Pellentesque dictum sem eget cursus semper.</p>
                                    <div class="data-form">
                                        <form action="save-book.php" id="add-book-form" method="post">
                                            <input type="hidden" name="form-room" value="Royal Single Room">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <i class="fa fa-calendar-plus-o"></i>
                                                    <input type="text" name="checkin" id="form-checkin" value="<?= $_SESSION[BOOK]['checkin']?>" placeholder="CHECK IN" class="datepicker" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="fa fa-calendar-plus-o"></i>
                                                    <input type="text" name="checkout" id="form-checkout" value="<?= $_SESSION[BOOK]['checkout'] ?>" placeholder="CHECK OUT" class="datepicker" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="fa fa-male"></i>
                                                    <input type="text" name="adults" id="form-adults" value="<?= $room['adults'] ?> NGƯỜI LỚN" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="fa fa-child"></i>
                                                    <input type="text" name="children" id="form-childrens" value="<?= $room['children'] ?> TRẺ CON" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="form-name" placeholder="TÊN CỦA BẠN">
                                                    <?php if(isset($_GET['nameerr'])):?>
                                                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                                                    <?php endif?>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="email" id="form-email" placeholder="ĐỊA CHỈ EMAIL CỦA BẠN">
                                                    <?php if(isset($_GET['emailerr'])):?>
                                                        <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                                                    <?php endif?>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="phone" id="form-phone" placeholder="SỐ ĐIỆN THOẠI CỦA BẠN">
                                                    <?php if(isset($_GET['phoneerr'])):?>
                                                        <span class="text-danger"><?= $_GET['phoneerr'] ?></span>
                                                    <?php endif?>
                                                </div>
                                                <div class="col-md-12">
                                                    <textarea cols="6" rows="8" name="request" id="form-requirements" placeholder="YÊU CẦU ĐẶC BIỆT"></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="submit" value="ĐẶT PHÒNG NGAY" class="btn">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Booking Form End -->
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <!-- Booking Detail -->
                                <div class="booking-detail">
                                    <h5>BOOKING DETAILS</h5>
                                    <h2>Selected Room</h2>
                                    <div class="detail-room">
                                        <div class="room-photo">
                                            <a href="rooms-detail.php" data-background="<?= BASE_URL . $room['image'] ?>"></a>
                                        </div>
                                        <div class="room-desc">
                                            <h3><a href="rooms-detail.php?id=<?= $_SESSION[BOOK]['id']?>"><?= $room['name'] ?></a></h3>
                                            <h4><?= number_format($room['price'],0,",",".")?> VNĐ <small>PER NIGHT</small></h4>
                                        </div>
                                    </div>
                                    <div class="detail-info">
                                        <ul>
                                            <li>
                                                <label>CHECK IN</label>
                                                <p><?= $checkin ?></p>
                                            </li>
                                            <li>
                                                <label>CHECK OUT</label>
                                                <p><?= $checkout ?></p>
                                            </li>
                                            <li>
                                                <label>Người lớn</label>
                                                <p><?= $room['adults'] ?> Người</p>
                                            </li>
                                            <li>
                                                <label>Trẻ con</label>
                                                <p><?= $room['children'] ?> Người</p>
                                            </li>
                                            <li>
                                                <label>NIGHT</label>
                                                <p><?=$total_date?> NIGHT</p>
                                            </li>
                                            <li class="total">
                                                <label>TOTAL PRICE</label>
                                                <p><?= number_format($total_price,0,",",".")?> VNĐ</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Booking Detail End -->
                                <!-- Booking Help -->
                                <div class="booking-help">
                                    <h5>HELP</h5>
                                    <h2>Need Booking Help?</h2>
                                    <p>If you need help with booking, Our advisor team are 24/7 at your service to help you.</p>
                                    <p><a href="mailto:<?= $webSetting['email'] ?>"><?= $webSetting['email'] ?></a></p>
                                    <h3><i class="fa fa-phone-square"></i><?= $webSetting['phone_number'] ?></h3>
                                </div>
                                <!-- Booking Help End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Booking End -->
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
        $('#add-book-form').validate({
            rules: {
                name: {
                    required: true
                },
                phone: {
                    required: true
                },
                email:{
                    required: true,
                    email: true
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tên"
                },
                phone: {
                    required: "Hãy nhập số điện thoại"
                },
                email: {
                    required: "Hãy nhập email",
                    email: "Hãy nhập đúng định dạng email"
                }
            }
        });
    </script>
</body>

<!-- Mirrored from preview.locotheme.com/grandium-html/booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:25 GMT -->

</html>