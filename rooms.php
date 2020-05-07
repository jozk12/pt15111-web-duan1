<?php
session_start();
require_once "./config/utils.php";
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : "";
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : "";
$adults = isset($_GET['adults']) ? $_GET['adults'] : "";
$children = isset($_GET['children']) ? $_GET['children'] : "";

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

$total_room_one_page = 4;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$offset = ($page-1)*$total_room_one_page;
$getRoomQuery = "select r.* from room_types r";
if ($adults !== "" && $children !== "") {
    $getRoomQuery .= " where (r.adults like'%$adults%'
                                    or r.children like '%$children%') 
                                    ORDER BY r.id DESC";
} else {
    $getRoomQuery .= " where status = 1 
                        ORDER BY r.id DESC
                        LIMIT $offset, $total_room_one_page";
}
$rooms = queryExecute($getRoomQuery, true);
for ($i = 0; $i < count($rooms); $i++) {
    $getServiceQuery = "select s.id, 
                        s.name
                        from room_service_xref sxr
                        join room_services s
                        on sxr.service_id = s.id
                        where sxr.room_id = " . $rooms[$i]['id'];
    $services = queryExecute($getServiceQuery, true);
    $rooms[$i]['room_sv'] = $services;
}
$getAllRoom = "select * from room_types";
$allRoom = queryExecute($getAllRoom, true);
$total_room = count($allRoom);
$total_page = ceil($total_room/$total_room_one_page)
?>

<!DOCTYPE html>
<html lang="en-US">
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
        <!-- Section Rooms -->
        <div class="section">
            <div class="wrapper-inner">
                <!-- Rooms List -->
                <div class="widget-rooms-list">
                    <?php foreach ($rooms as $room) : ?>
                        <div class="rooms-item">
                            <div class="item-photo">
                                <a href="rooms-detail.php?id=<?= $room['id'] ?>&&checkin=<?=$checkin?>&&checkout=<?=$checkout?>" data-background="<?= BASE_URL . $room['image'] ?>"></a>
                            </div>
                            <div class="item-desc">
                                <h2><a href="rooms-detail.php?id=<?= $room['id'] ?>&&checkin=<?=$checkin?>&&checkout=<?=$checkout?>"><?= $room['name'] ?></a><small></small></h2>
                                <p><?= $room['short_desc'] ?></p>
                                <div class="desc-features">
                                    <ul>
                                        <?php foreach ($room['room_sv'] as $rService) : ?>
                                            <li><i class="fa fa-check"></i><?= $rService['name'] ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="item-price">
                                <div class="price-inner">
                                    <h3><?= number_format($room['price'],0,",",".") ?> VNĐ</h3>
                                    <h5>PER NIGHT</h5>
                                    <h5><?= $room['adults']?> Người lớn & <?= $room['children']?> Trẻ em</h5>
                                    <a href="rooms-detail.php?id=<?= $room['id'] ?>&&checkin=<?=$checkin?>&&checkout=<?=$checkout?>" class="btn">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- Rooms List End -->
                <!-- Pager -->
                <div class="widget-pager">
                    <ul <?php if ($adults!=""&&$children!=""):?>
                            style="display: none;"
                        <?php endif;?>>
                        <?php
                        for ($i=1; $i<=$total_page; $i++){
                            ?>
                            <li<?php if($page==$i):?>
                                class="active"
                            <?php endif;?>><a href="<?= BASE_URL.'rooms.php?checkin='."$checkin".'&&checkout='."$checkout".'&&adutls='."$adults".'&&children='."$children".'&&page='."$i"?>"><?=$i?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- Pager End -->
            </div>
        </div>
        <!-- Section Rooms End -->
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
    <?php include_once './_share/msg_info.php'?>
</body>

<!-- Mirrored from preview.locotheme.com/grandium-html/rooms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:17 GMT -->

</html>