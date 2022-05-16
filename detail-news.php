<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>

<?php
$conn->query("UPDATE `news` SET  `view`=`view`+'1' WHERE `news_id`='".$_GET['id']."'");
$s=$conn->query("SELECT * FROM `news` WHERE `news_id`='".$_GET['id']."'");
while ($row=$s->fetch_assoc()) {
    ?>
    <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li><a href="news.php">บทความข่าวสาร</a></li>
                        <li><?=$row['name']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="shop-category-area single-blog-page pb-100px main-blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  ">
                <div class="blog-posts ">
                    <div class="single-blog-post blog-grid-post">
                        <div class="blog-post-media">
                            <div class="blog-image single-blog">
                                <img src="assets/images/news/<?=$row['img']?>" class="mimg100" alt="blog" />
                            </div>
                        </div>
                        <div class="blog-post-content-inner mt-30px">
                            <h4 class="blog-title"><a href="#"><?=$row['name']?></a></h4>
                            <ul class="blog-page-meta">
                                <li>
                                    <a href="#"><i class="ion-person"></i> แอดมิน</a>
                                </li>
                                <li>
                                    <a href="#"><i class="ion-calendar"></i> <?=$row['date_at']?></a>
                                </li>
                            </ul>
                            <p><?=$row['description']?></p>
                        </div>
                        <div class="single-post-content"><?=$row['detail']?></div>
                    </div>
                    <!-- single blog post -->
                </div>
                

            </div>

        </div>
    </div>
</div>
    <?php
}
?>


<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>