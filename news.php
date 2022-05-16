<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-content">
                            <ul class="nav">
                                <li><a href="index.php">หน้าหลัก</a></li>
                                <li>บทความข่าวสาร</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Breadcrumb Area End-->
    <!-- Shop Category Area End -->
    <div class="shop-category-area blog-grid mb-40px main-blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                    <div class="blog-posts">
                        <div class="row">
                            <?php
                            $s=$conn->query("SELECT `news_id`, `name`, `img`, `date_at`, `description`,   `view` FROM `news` ORDER BY `date_at` desc");
                            while ($row=$s->fetch_assoc()) {
                               ?>
                               <div class="col-md-4 mb-res-sm-30px">
                                <div class="single-blog-post mb-30px blog-grid-post">
                                    <div class="blog-post-media">
                                        <div class="blog-image">
                                            <a href="detail-news.php?id=<?=$row['news_id']?>"><img src="assets/images/news/<?=$row['img']?>" alt="blog" class="img-responsive" /></a>
                                        </div>
                                    </div>
                                    <div class="blog-post-content-inner mt-30px">
                                        <h4 class="blog-title"><a href="detail-news.php?id=<?=$row['news_id']?>"><?=$row['name']?></a></h4>
                                        <ul class="blog-page-meta">
                                            <li>
                                                <a href="#"><i class="ion-person"></i> แอดมิน</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-calendar"></i> <?=$row['date_at']?></a>
                                            </li>
                                        </ul>
                                        <p class="sub4"><?=$row['description']?> </p>
                                        <a class="read-more-btn" href="detail-news.php?id=<?=$row['news_id']?>"> อ่านต่อ... <i class="ion-android-arrow-dropright-circle"></i></a>
                                    </div>
                                </div>
                                <!-- single blog post -->
                            </div>
                               <?php
                            }

                            ?>
                            
                           
                        </div>
                    </div>
                     
                </div>
                
            </div>
        </div>
    </div>
<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>