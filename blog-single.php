<?php
session_start();
require_once "./config/utils.php";

$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

$getBlogQuery = "select b.*,
                u.name author 
                from blog b
                join users u
                on b.author_id = u.id where b.id='$id' ORDER BY b.id DESC";
$blogs = queryExecute($getBlogQuery, true);

$getBlogRecentQuery = "select b.*,
                u.name author 
                from blog b
                join users u
                on b.author_id = u.id ORDER BY b.id DESC LIMIT 7";
$blogRec = queryExecute($getBlogRecentQuery, true);

$getBlogCateQuery = "select * from blog_categories where status = 1";
$allCates = queryExecute($getBlogCateQuery, true);

for ($i = 0; $i < count($blogs); $i++) {
    $getCateQuery = "select c.id,
                    c.name
                    from blog_cate_xref cxr
                    join blog_categories c
                    on cxr.cate_id = c.id
                    where cxr.blog_id = " . $blogs[$i]['id'];
    $cates = queryExecute($getCateQuery, true);
    $blogs[$i]['blog_categories'] = $cates;
}

?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:25 GMT -->

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
        <!-- Section Blog Single -->
        <div class="section">
            <div class="wrapper-inner">
                <div class="row">
                    <div class="col-md-9">
                        <!-- Blog Single -->
                        <div class="widget-blog-single">
                            <?php foreach ($blogs as $blog) : ?>
                                <!-- Single Media -->
                                <div class="single-media">
                                    <div class="media-photo">
                                        <a href="<?= BASE_URL . $blog['image'] ?>" title="Post Title" class="popup-photo">
                                            <img src="<?= BASE_URL . $blog['image'] ?>" alt="Post Title">
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Media End -->
                                <!-- Single Detail -->
                                <div class="single-detail">
                                    <div class="detail-head">
                                        BY <a href="#"><?= $blog['author'] ?></a> <i class="fa fa-clock-o"></i><?= $blog['create_at'] ?><i class="fa fa-bars"></i>
                                        <?php foreach ($blog['blog_categories'] as $bCate) : ?>
                                            <a href="#">
                                                <?= $bCate['name'] ?>
                                            </a>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="detail-content">
                                        <p><?= $blog['title'] ?></p>
                                        <p><?= $blog['content'] ?></p>
                                    </div>
                                </div>
                                <!-- Single Detail End -->
                            <?php endforeach ?>
                        </div>
                        <!-- Blog Single End -->
                    </div>
                    <div class="col-md-3">
                        <!-- Blog Sidebar -->
                        <div class="widget-blog-sidebar">
                            <!-- Sidebar Categories -->
                            <div class="widget sidebar-categories">
                                <h5>CATEGORIES</h5>
                                <nav>
                                    <ul>
                                    <?php foreach ($allCates as $cate) : ?>
                                            <li><a href="#"><?= $cate['name'] ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Sidebar Categories End -->
                            <!-- Sidebar Recent -->
                            <div class="widget sidebar-recent">
                                <h5>RECENT POSTS</h5>
                                <ul>
                                    <?php foreach ($blogRec as $recent) : ?>
                                        <li><a href="blog-single.php?id=<?= $recent['id'] ?>"><?=$recent['title']?><span><i class="fa fa-calendar"></i><?= $recent['create_at']?></span></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <!-- Sidebar Recent End -->
                        </div>
                        <!-- Blog Sidebar End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Blog Single End -->
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

<!-- Mirrored from preview.locotheme.com/grandium-html/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:27 GMT -->

</html>