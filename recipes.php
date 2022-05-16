<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>

<div class="name-category">
    <div class="category-banner d-flex " data-bg-image="assets/images/banner-image/bg_breadcrumb.jpg">
        <div class="align-self-center w-100">
            <div class="text-center">
                <h2 class="color-white ">ค้นหาสูตรอาหาร</h2>
            </div>
        </div>
    </div>
</div>
 
<?php
if(empty($_GET['order']))
{
    $order=" `likes` desc";
    $txt="เลือก";
}else{
    if($_GET['order']=="new")
    {
        $order=" `date_at` desc";
        $txt="ใหม่ ไป เก่า";

    }else if($_GET['order']=="hot")
    {
    $order=" `likes` desc";
    $txt="ยอดนิยม";

    }else if($_GET['order']=="old")
    {
    $order=" `date_at` asc";
    $txt="เก่า ไป ใหม่";

    }else{
    $order=" `likes` desc";
    $txt="ยอดนิยม";

    }
}
if(empty($_GET['keyword']))
{
    $keyword="";
    $sqli=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe`   ORDER By  $order ");

}else{
    $keyword=$_GET['keyword'];
    $sqli=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe` where  `name` LIKE '%".$_GET['keyword']."%'  ORDER By  $order ");
}
?>
<div class="shop-category-area pt-50px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row justify-content-center  ">
                    <div class="col-md-6 ">
                        <form class="row g-3" method="get">
                            <h3 class="sidebar-title"><span>ค้นหาสูตรอาหาร</span></h3>

                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="ค้นหาสูตรอาหารที่นี่..." name="keyword"
                                    aria-label="ค้นหาสูตรอาหารที่นี่..." aria-describedby="button-addon2" value="<?=$keyword?>">
                                <button class="btn " style="background:#facf83;" type="button" id="button-addon2">ค้นหา</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="shop-top-bar mt-5">

                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                    <li> <span class="total-products text-capitalize">ค้นพบ <?=$sqli->num_rows?> รายการ</span></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6 position-relative">
                            <div class="shop-grid-button d-flex align-items-center">
                                <span class="sort-by">เรียงลำดับ:</span>
                                <button class="btn-dropdown d-flex justify-content-between" type="button"
                                    id="dropdownMenuButtons" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <?=$txt?> <span class="ion-android-arrow-dropdown"></span>
                                </button>
                                <div class="dropdown-menu shop-grid-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item " href="recipes.php?order=hot&keyword=<?=$keyword?>"> ยอดนิยม</a>
                                    <a class="dropdown-item" href="recipes.php?order=new&keyword=<?=$keyword?>"> ใหม่ ไป เก่า</a>
                                    <a class="dropdown-item" href="recipes.php?order=old&keyword=<?=$keyword?>"> เก่า ไป ใหม่</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Top Area End -->

                <!-- Bottom Area Start -->
                <div class="shop-bottom-area ">
                    <!-- Tab Content Start -->
                    <div class="tab-content jump">

                        <div id="shop-2" class="tab-pane active">
                            <div class="shop-list-wrap scroll-zoom">
                                <div class="slider-single-item">
                                    <div class="row list-product">
                                        <?php
                                        while ($row=$sqli->fetch_assoc()) {
                                           ?>
                                             <div class="col-md-12 padding-0px product-inner">
                                            <div class="row ">
                                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                                    <div class="left-img">
                                                        <div class="img-block">
                                                            <a href="detail.php?id=<?=$row['recipe_id']?>" class="thumbnail">
                                                                <img class="first-img"
                                                                    src="assets/images/food/<?=$row['img1']?>" alt="" />
                                                                <img class="second-img"
                                                                    src="assets/images/food/<?=$row['img1']?>" alt="" />
                                                            </a> 
                                                            <ul class="product-flag">
                                                                    <li class="new"><?php echo ($row['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก"?></li>
                                                                </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 d-flex">
                                                    <div class="product-desc-wrap align-self-center">
                                                        <div class="product-decs">
                                                            <h2><a href="detail.php?id=<?=$row['recipe_id']?>" class="product-link"><?=$row['name']?></a></h2>
                                                            <div class="rating-product  mt-2">
                                    <i class="fas fa-heart"></i> (<?=$row['likes']?>)
                                </div>
                                                            <div class="product-intro-info">
                                                                <p><?=$row['description']?></p>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-link">
                                                        <button  class="btn btn-outline-danger" type="button" onclick="window.location='detail.php?id=<?=$row['recipe_id']?>'">รายละเอียดเพิ่มเติม</button>
                                                        <?php
                                                        if(!empty($_SESSION['user-position']) && $_SESSION['user-position']=="admin")
                                                        {
                                                            ?>
                                                           <button type="button" onclick="how_delete_recipe(<?=$row['recipe_id']?>)" class="btn btn-outline-warning"><i class="fas fa-trash-alt"></i> ลบเมนูอาหาร</button>  
                                                            <?php
                                                        }
                                                        ?>
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <?php
                                        }

                                        ?>
                                       
                                    </div>
                                </div>
                            </div>

                        </div>






                        
                        <!-- Tab Two End -->
                    </div>
                   
                </div>
                <!-- Bottom Area End -->
            </div>
        </div>
    </div>
</div>
<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>
<script>
    function how_delete_recipe(recipe_id) {
    let text;
    if (confirm("ยืนยันการลบข้อมูลใช่หรือไม่?") == true) {
        window.location = "sql_delete_comment.php?id=" + recipe_id+"&type=recipe";
    }
}
</script>