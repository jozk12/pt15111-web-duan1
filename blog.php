<?php
session_start();
require_once "./config/utils.php";
$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$cateName = isset($_GET['cate']) ? $_GET['cate']:"";

$getWebSettingQuery = "select * from web_settings where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);

$total_blog_one_page = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page-1) * $total_blog_one_page;
$getBlogQuery = "select b.*,
                u.name author 
                from blog b
                join users u
                on b.author_id = u.id";
if ($keyword !== "") {
    $getBlogQuery .= " where (b.title like '%$keyword%'
                        or u.name like '%$keyword%')  ORDER BY b.id DESC";
} else {
    $getBlogQuery .= " ORDER BY b.id DESC 
                        LIMIT $offset, $total_blog_one_page";
}
$blogs = queryExecute($getBlogQuery, true);
for ($i = 0; $i < count($blogs); $i++) {
    $getCateQuery = "select c.id,
                    c.name
                    from blog_cate_xref cxr
                    join blog_categories c
                    on cxr.cate_id = c.id
                    where cxr.blog_id = " . $blogs[$i]['id'];
    $cates = queryExecute($getCateQuery, true);
    $blogs[$i]['blog_cate'] = $cates;
}
$getAllBlog = "select * from blog";
$allBlog = queryExecute($getAllBlog, true);
$total_rows = count($allBlog);
$total_page = ceil($total_rows/$total_blog_one_page);

$getBlogCateQuery = "select * from blog_categories where status = 1";
$allCates = queryExecute($getBlogCateQuery, true);

$getBlogRecentQuery = "select b.*,
                u.name author 
                from blog b
                join users u
                on b.author_id = u.id ORDER BY b.id DESC LIMIT 7";
$blogRec = queryExecute($getBlogRecentQuery, true);

?>

<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from preview.locotheme.com/grandium-html/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:25 GMT -->

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
        <!-- Section Blog -->
        <div class="section">
            <div class="wrapper-inner">
                <div class="row">
                    <div class="col-md-9">
                        <!-- Blog List -->
                        <div class="widget-blog-list">
                            <?php foreach ($blogs as $blog) : ?>
                                <div class="blog-item">
                                    <div class="item-media">
                                        <div class="media-photo">
                                            <a href="blog-single.php?id=<?= $blog['id'] ?>" data-background="<?= BASE_URL . $blog['image'] ?>"></a>
                                        </div>
                                    </div>
                                    <div class="item-desc">
                                        <h2><a href="blog-single.php"><?= $blog['title'] ?></a></h2>
                                        <h5>BY <a href="#"><?= $blog['author'] ?></a> <i class="fa fa-clock-o"></i><?= $blog['create_at'] ?><i class="fa fa-bars"></i>
                                            <?php foreach ($blog['blog_cate'] as $bCate) : ?>
                                                <a href="blog.php?<?= $bCate['name'] ?>"><?= $bCate['name'] ?>&nbsp &nbsp</a>
                                            <?php endforeach ?>
                                        </h5>
                                        <p><?= $blog['short_ct'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <!-- Blog List End -->
                        <!-- Pager -->
                        <div class="widget-pager">
                            <ul <?php if ($keyword!=""):?>
                                    style="display: none;"
                                <?php endif;?>>
                                <?php
                                    for ($i=1; $i<=$total_page; $i++){
                                        ?>
                                            <li<?php if($page==$i):?>
                                                class="active"
                                                <?php endif;?>><a href="<?= BASE_URL.'blog.php?keyword='."$keyword".'&&page='."$i"?>"><?=$i?></a>
                                            </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- Pager End -->
                    </div>
                    <div class="col-md-3">
                        <!-- Blog Sidebar -->
                        <div class="widget-blog-sidebar">
                            <!-- Sidebar Search -->
                            <div class="widget sidebar-search">
                                <h5>SEARCH</h5>
                                <form action="" method="get">
                                    <input type="text" placeholder="Enter title or author" value="<?= $keyword?>" required name="keyword">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Sidebar Search End -->
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
                                    <?php foreach ($blogRec as $bRec) : ?>
                                        <li><a href="blog-single.php?id=<?= $bRec['id'] ?>"><?= $bRec['title'] ?><span><i class="fa fa-calendar"></i><?= $bRec['create_at'] ?></span></a></li>
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
        <!-- Section Blog End -->
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

<!-- Mirrored from preview.locotheme.com/grandium-html/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 07:28:25 GMT -->

</html>