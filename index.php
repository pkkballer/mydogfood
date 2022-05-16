<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>

<div class="offcanvas-overlay"></div>


<div class="slider-area">
    <div class="hero-slider-wrapper">

        <div class="single-slide slider-height-1 bg-img d-flex" data-bg-image="assets/images/1.jpg">
        </div>

        <div class="single-slide slider-height-1 bg-img d-flex" data-bg-image="assets/images/2.jpg">
        </div>

    </div>
</div>


<div class="category-tab-slider-area ptb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>เกี่ยวกับเรา</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-center">
                <img src="assets/images/3.jpg" alt="">
                <h4 class="mb-2">วัตถุดิบสดใหม่</h4>
                <p>เราคัดสรรวัตถุดิบที่มีคุณภาพ เพื่อตอบโจทย์เจ้าตูบหลายๆบ้าน</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-center">
                <img src="assets/images/4.jpg" alt="">
                <h4 class="mb-2">เมนูอาหารสุดฮิต</h4>
                <p>เมนูยอดนิยม ในโลกคนรักสุนัข ที่บ้านไหนๆก็ต้องทำเป็น</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-center">
                <img src="assets/images/5.jpg" alt="">
                <h4 class="mb-2">น้องหมามีความสุข</h4>
                <p>เราใส่ใจอาหารและการกินของเขา จะช่วยให้เขามีความสุขในทุกๆวัน</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 text-center">
                <img src="assets/images/6.jpg" alt="">
                <h4 class="mb-2">เมนูเพื่อสุขภาพ</h4>
                <p>สุขภาพเป็นสิ่งสำคัญสำหรับน้องหมา เพราะเขาไม่สามารถรักษาตัวเองได้หายขาด</p>
            </div>
        </div>
    </div>
</div>


<div class="hot-deal-area pt-100px pb-100px" style="background:#facf83;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h1>เมนูยอดนิยม</h1>

            </div>
        </div>
        <div class="hot-deal-content">
            <!-- Tab Slider Start -->
            <div class="hot-deal-slider slider-nav-style-1">
                <?php
                $sqli1=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe` ORDER By  `likes` desc LIMIT 0,4");
                while ($row1=$sqli1->fetch_assoc()) {
                    $s=$conn->query("SELECT `name` FROM `user` WHERE `user_id`='".$row1['post_by']."'");
                    list($user_name)=mysqli_fetch_row($s);
                    ?>
                     <div class="arrval-slider-item">
                    <article class="list-product text-left">
                        <div class="product-inner">
                            <div class="img-block">
                                <a href="detail.php?id=<?=$row1['recipe_id']?>" class="thumbnail">
                                    <img class="first-img" src="assets/images/food/<?=$row1['img1']?>" alt="" />
                                    <img class="second-img" src="assets/images/food/<?=$row1['img2']?>" alt="" />
                                </a>
                                <div class="add-to-link">
                                    <ul>
                                        <li>
                                            <a class="quick_view" href="detail.php?id=<?=$row1['recipe_id']?>">
                                                <i class="las la-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="product-flag">
                                    <li class="new"><?php echo ($row1['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก"?></li>
                                </ul>

                            </div>
                            <div class="product-decs">
                                <h2><a href="detail.php?id=<?=$row1['recipe_id']?>" class="product-link mb-2"><?=$row1['name']?></a></h2>
                                <div class="rating-product mb-3">
                                    <i class="fas fa-heart"></i> (<?=$row1['likes']?>)
                                </div>
                                <p class="mb-1"><?=$row1['description']?></p>
                                <i>โดย <?=$user_name?></i>
                            </div>

                        </div>
                    </article>
                </div>
                    <?php
                }
               
               ?>

            </div>
            <!-- Tab Slider End -->
        </div>
    </div>
</div>






<div class="feature-atea pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>เมนูแนะนำประจำวัน</h2>
                </div>
            </div>
        </div>
        <div class="row hidden-md-down">
            <div class="col-xl-8 col-lg-8">
                <div class="feature-slider-content">
                    <div class="feature-wrapper">
                        <?php
                         $sqli2=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe` ORDER By   RAND() LIMIT 0,4");
                         while ($row2=$sqli2->fetch_assoc()) {
                             $s=$conn->query("SELECT `name` FROM `user` WHERE `user_id`='".$row2['post_by']."'");
                             list($user_name)=mysqli_fetch_row($s);
                           ?>
                            <div class="slider-single-item">
                                <article class="list-product list-product2 text-left">
                                    <div class="product-inner">
                                        <div class="img-block">
                                            <a href="detail.php?id=<?=$row2['recipe_id']?>" class="thumbnail">
                                                <img class="first-img" src="assets/images/food/<?=$row2['img1']?>"
                                                    alt="" />
                                                <img class="second-img" src="assets/images/food/<?=$row2['img2']?>"
                                                    alt="" />
                                            </a>
                                            <div class="add-to-link">
                                                <ul>
                                                    <li>
                                                        <a class="quick_view" href="detail.php?id=<?=$row2['recipe_id']?>">
                                                            <i class="las la-search"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <ul class="product-flag">
                                        <li class="new"><?php echo ($row2['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก"?></li>
                                    </ul>
                                        </div>
                                        <div class="product-decs pt-0">
                                            <h2><a href="detail.php?id=<?=$row2['recipe_id']?>" class="product-link mb-2 sub1"><?=$row2['name']?></a></h2>
                                            <div class="rating-product mb-3">
                                                <i class="fas fa-heart"></i> (<?=$row2['likes']?>)
                                            </div>
                                            <p class="mb-1 sub1"><?=$row2['description']?></p>
                                            <i>โดย <?=$user_name?></i>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php
                       }
                       ?>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="feature-product-slider slider-nav-style-1">
                    <img src="assets/images/product-image/1.jpg" class="img100" alt="">
                </div>
            </div>
        </div>



        <div class="row hidden-lg-up">
            <div class="feature-product-slider-2 slider-nav-style-1">
                <?php
                $sqli3=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe` ORDER By  RAND() LIMIT 0,4");
                while ($row3=$sqli3->fetch_assoc()) {
                    $s=$conn->query("SELECT `name` FROM `user` WHERE `user_id`='".$row3['post_by']."'");
                    list($user_name)=mysqli_fetch_row($s);
                    ?>
                    <div class="arrval-slider-item">
                    <article class="list-product list-product2 text-left">
                        <div class="product-inner">
                            <div class="img-block">
                                <a href="detail.php?id=<?=$row3['recipe_id']?>" class="thumbnail">
                                    <img class="first-img" src="assets/images/food/<?=$row3['img1']?>" alt="" />
                                    <img class="second-img" src="assets/images/food/<?=$row3['img2']?>" alt="" />
                                </a>
                                <div class="add-to-link">
                                    <ul>
                                        <li>
                                            <a class="quick_view" href="detail.php?id=<?=$row3['recipe_id']?>"  >
                                                <i class="las la-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                 <ul class="product-flag">
                                    <li class="new"><?php echo ($row3['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก"?></li>
                                </ul>
                                
                            </div>
                            <div class="product-decs">
                            <h2><a href="detail.php?id=<?=$row3['recipe_id']?>" class="product-link mb-2"><?=$row3['name']?></a></h2>
                                    <div class="rating-product mb-3">
                                        <i class="fas fa-heart"></i> (<?=$row3['likes']?>)
                                    </div>
                                    <p class="mb-1"><?=$row3['description']?></p>
                                    <i>โดย <?=$user_name?></i>
                            </div>
                            
                        </div>
                    </article>
                </div>
                
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>





<div class="hot-deal-area pt-100px pb-100px" style="background:#f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h1>น้องหมาตัวใหญ่</h1>
            </div>
        </div>
        <div class="hot-deal-content">
            <!-- Tab Slider Start -->
            <div class="hot-deal-slider slider-nav-style-1">
                <?php
                 $sqli4=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe` where `type`='1' ORDER By   RAND() LIMIT 0,6");
                 while ($row4=$sqli4->fetch_assoc()) {
                     $s=$conn->query("SELECT `name` FROM `user` WHERE `user_id`='".$row4['post_by']."'");
                     list($user_name)=mysqli_fetch_row($s);
                    ?>
                    <div class="arrval-slider-item">
                    <article class="list-product text-left">
                        <div class="product-inner">
                            <div class="img-block">
                                <a href="detail.php?id=<?=$row4['recipe_id']?>" class="thumbnail">
                                    <img class="first-img" src="assets/images/food/<?=$row4['img1']?>" alt="" />
                                    <img class="second-img" src="assets/images/food/<?=$row4['img2']?>" alt="" />
                                </a>
                                <div class="add-to-link">
                                    <ul>
                                        <li>
                                            <a class="quick_view" href="detail.php?id=<?=$row4['recipe_id']?>">
                                                <i class="las la-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="product-flag">
                                    <li class="new"><?php echo ($row4['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก"?></li>
                                </ul>
                            </div>
                            <div class="product-decs">
                                <h2><a href="detail.php?id=<?=$row4['recipe_id']?>" class="product-link mb-2"><?=$row4['name']?></a></h2>
                                <div class="rating-product mb-3">
                                    <i class="fas fa-heart"></i> (<?=$row4['likes']?>)
                                </div>
                                <p class="mb-1"><?=$row4['description']?></p>
                                <i>โดย <?=$user_name?></i>
                            </div>

                        </div>
                    </article>
                </div>
                    <?php
                }
                ?>
                
            </div>
            
        </div>
    </div>
</div>

<div class="hot-deal-area pt-100px pb-100px" style="background:#f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h1>น้องหมาตัวเล็ก</h1>
            </div>
        </div>
        <div class="hot-deal-content">
            <!-- Tab Slider Start -->
            <div class="hot-deal-slider slider-nav-style-1">
            <?php
                 $sqli5=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe` where `type`='2' ORDER By   RAND() LIMIT 0,6");
                 while ($row5=$sqli5->fetch_assoc()) {
                     $s=$conn->query("SELECT `name` FROM `user` WHERE `user_id`='".$row5['post_by']."'");
                     list($user_name)=mysqli_fetch_row($s);
                    ?>
                    <div class="arrval-slider-item">
                    <article class="list-product text-left">
                        <div class="product-inner">
                            <div class="img-block">
                                <a href="detail.php?id=<?=$row5['recipe_id']?>" class="thumbnail">
                                    <img class="first-img" src="assets/images/food/<?=$row5['img1']?>" alt="" />
                                    <img class="second-img" src="assets/images/food/<?=$row5['img2']?>" alt="" />
                                </a>
                                <div class="add-to-link">
                                    <ul>
                                        <li>
                                            <a class="quick_view" href="detail.php?id=<?=$row5['recipe_id']?>">
                                                <i class="las la-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                 <ul class="product-flag">
                                    <li class="new"><?php echo ($row5['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก"?></li>
                                </ul>
                            </div>
                            <div class="product-decs">
                                <h2><a href="detail.php?id=<?=$row5['recipe_id']?>" class="product-link mb-2"><?=$row5['name']?></a></h2>
                                <div class="rating-product mb-3">
                                    <i class="fas fa-heart"></i> (<?=$row5['likes']?>)
                                </div>
                                <p class="mb-1"><?=$row5['description']?></p>
                                <i>โดย <?=$user_name?></i>
                            </div>

                        </div>
                    </article>
                </div>
                    <?php
                }
                ?>
                
            </div>
            
        </div>
    </div>
</div>





<div class="main-blog-area ptb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>ข่าวสารล่าสุด</h2>
                </div>
            </div>
        </div>
        <!-- Blog Slider Start -->
        <div class="main-blog-slider-wrapper slider-nav-style-1">
            <!-- Blog Slider Silgle Item -->
            <?php
              $sqli6=$conn->query("SELECT `news_id`, `name`, `img`, `date_at`, `description`  FROM `news` ORDER BY `date_at` desc limit 0,4");
              while ($row6=$sqli6->fetch_assoc()) {
                

            ?>
            <div class="blog-slider-item">
                <div class="blog-slider-inner">
                    <div class="aritcles-image">
                        <a href="detail-news.php?id=<?=$row6['news_id']?>"><img src="assets/images/news/<?=$row6['img']?>" alt="blog-img"></a>
                    </div>
                    <div class="aritcles-content">
                        <div class="content-inner">
                            <a class="articles-name" href="detail-news.php?id=<?=$row6['news_id']?>"><?=$row6['name']?></a>
                            <p class="author-name">โดย แอดมิน <span
                                    class="date"><?=$row6['date_at']?></span></p>
                            <div class="articles-intro">
                                <p><?=$row6['description']?> </p>
                            </div>
                            <a class="read-more" href="detail-news.php?id=<?=$row6['news_id']?>">อ่านต่อ... <i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
              }
            ?>
           
        </div>
        <!-- Blog Slider End -->
    </div>
</div>



<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>