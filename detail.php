<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<?php
    $conn->query("UPDATE `recipe` SET  `view`=`view`+'1' WHERE `recipe_id`='".$_GET['id']."'");

$sqli=$conn->query("SELECT * FROM `recipe` WHERE `recipe_id`='".$_GET['id']."'");
$sqli2=$conn->query("SELECT * FROM `comment` WHERE `recipe_id`='".$_GET['id']."'");
while ($row=$sqli->fetch_assoc()) {
    $my_id=$row['post_by'];
       $s=$conn->query("SELECT `name` FROM `user` WHERE `user_id`='".$row['post_by']."'");
                     list($user_name)=mysqli_fetch_row($s);
    ?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li><a href="recipes.php">เมนูอาหาร</a></li>
                        <li><?=$row['name']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->
<!-- Shop details Area start -->
<div class="product-details-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="product-details-img product-details-tab position-relative">
                    <div class="zoompro-wrap  ">
                        <?php
                        for ($i=1; $i <7 ; $i++) { 
                           if(!empty($row['img'.$i]))
                           {
                               ?>
                        <div class=" ">
                            <img class=" w-100" src="assets/images/food/<?=$row['img'.$i]?>"
                                data-zoom-image="assets/images/food/<?=$row['img'.$i]?>" alt="" />
                        </div>
                        <?php
                           }
                        }
                        ?>
                    </div>
                    <div id="gallery" class="product-dec-slider-2">
                        <?php
                        for ($i=1; $i <7 ; $i++) { 
                           if(!empty($row['img'.$i]))
                           {
                               ?>

                        <div class="single-slide-item">
                            <img class="img-responsive" data-image="assets/images/food/<?=$row['img'.$i]?>"
                                data-zoom-image="assets/images/food/<?=$row['img'.$i]?>"
                                src="assets/images/food/<?=$row['img'.$i]?>" alt="" />
                        </div>
                        <?php
                           }
                        }
                        ?>

                    </div>

                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="product-details-content">
                
                    <h2><?=$row['name']?></h2>
                    <p class="reference">โดย :<span> <?=$user_name?></span></p>
                    <p> <i class="fas fa-heart"></i> (<?=$row['likes']?>) </p>
                    <div class="pro-details-list">
                        <p><?=$row['description']?></p>
                    </div>

                    <div class="pro-details-quality mt-0px">
                        <?php
                        if(!empty($_SESSION['user-id']))
                        {
                            $sqli3=$conn->query("SELECT * FROM `wishlist` WHERE `recipe_id`='".$_GET['id']."' AND `user_id`='".$_SESSION['user-id']."'");
                    
                            if( $sqli3->num_rows==0)
                            {
                                ?>
                                <a href="sql_wishlist.php?type=yes&id=<?=$_GET['id']?>" class="btnmain text-center">
                                    เก็บเป็นเมนูโปรด</a>
                                <?php

                            }else{
                                ?>
                                <a href="sql_wishlist.php?type=no&id=<?=$_GET['id']?>" class="btnmain text-center" style="background-color: #dfdfdf; color: #727272;">
                                    ยกเลิกเป็นเมนูโปรด</a>
                                <?php
                            }
                        }else{
                        ?>
                        <a href="#" class="btnmain text-center">
                        เก็บเป็นเมนูโปรด</a>
                        <?php
                    }
                    ?>



                    </div>

                    <p class="reference">หมวดหมู่ :<span>
                            <?php echo ($row['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก"?></span></p>

                    <div class="pro-details-wish-com mt-3">
                        <div class="pro-details-wishlist">
                            <?php
                            if(!empty($_SESSION['user-id']))
                            {
                                $sqli4=$conn->query("SELECT * FROM `likes` WHERE `recipe_id`='".$_GET['id']."' AND `user_id`='".$_SESSION['user-id']."'");

                         
                        if($sqli4->num_rows==0)
                        {
                            ?>
                            <a href="sql_likes.php?type=like&id=<?=$_GET['id']?>"><i class="las la-heart"></i> </a>
                            <?php
                        }else{
                            ?>
                            <a href="sql_likes.php?type=unlike&id=<?=$_GET['id']?>" style="color:#facf83;"><i
                                    class="las la-heart"></i> </a>

                            <?php
                        }
                        

                    }else{
                        ?>
                            <a href="#"  ><i class="las la-heart"></i> </a>

                            <?php
                    }
                    ?>
                        </div>
                        <!-- <div class="pro-details-compare">
                            <a href="#"><i class="las la-print"></i></a>
                        </div> -->
                    </div>
                    <?php
                if(!empty($_SESSION['user-position']) && $_SESSION['user-position']=="admin")
                {
                    ?>
                    <div class="text-left mt-5">  <a onclick="how_delete_recipe(<?=$_GET['id']?>)"><i class="fas fa-trash-alt"></i> ลบเมนูอาหาร</a></div>
                    <?php
                }
                ?>


                </div>
            </div>
        </div>
    </div>
</div>


<div class="description-review-area mb-50px bg-light-gray-3 ptb-50px">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a class="active" data-bs-toggle="tab" href="#des-1">รายละเอียด</a>
                <a class="" data-bs-toggle="tab" href="#des-2">ส่วนผสม</a>
                <a class="" data-bs-toggle="tab" href="#des-3">คำแนะนำ</a>
                <a class="" data-bs-toggle="tab" href="#des-4">ตำรา</a>
                <a class="" data-bs-toggle="tab" href="#des-5">ข้อมูลโภชนาการ</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-1" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <?=$row['detail']?>
                    </div>
                </div>
                <div id="des-2" class="tab-pane">
                    <div class="product-description-wrapper">
                        <?=$row['ingredints']?>
                    </div>
                </div>
                <div id="des-3" class="tab-pane">
                    <div class="product-description-wrapper">
                        <?=$row['directions']?>
                    </div>
                </div>
                <div id="des-4" class="tab-pane">
                    <div class="product-description-wrapper">
                        <?=$row['cook_note']?>
                    </div>
                </div>
                <div id="des-5" class="tab-pane">
                    <div class="product-description-wrapper">
                        <?=$row['nutrition']?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
}
?>

<div class="description-review-area mb-50px bg-light-gray-3 " id="comment">
    <div class="container ">
        <div class="description-review-bottom">
            <?php
            if(!empty($_SESSION['user-id']))
            {
                ?>
            <div class="row mb-5">
                <div class="col-lg-12  ">

                    <div class="ratting-form-wrapper ">
                        <h2 class="mb-3">แสดงความคิดเห็น</h2>
                            <div class="ratting-form">
                                <form action="sql_comment.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="rating-form-style form-submit">
                                                <textarea required name="comment"
                                                    placeholder="กรอกความคิดเห็นที่นี่..."></textarea>
                                                <input type="hidden" name="recipe_id" value="<?=$_GET['id']?>">
                                                <input type="submit" name="add_comment" value="Submit" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>



            <div class="row">
                <div class="col-md-">
                    <div class="comment-area">
                        <h2 class="comment-heading">ความคิดเห็น (<?=$sqli2->num_rows?>)</h2>
                        <div class="review-wrapper">
                            <?php
                            while ($row2=$sqli2->fetch_assoc()) {
                                $s=$conn->query("SELECT `name`,`profile` FROM `user` WHERE `user_id`='".$row2['user_id']."'");
                                list($user_name,$user_img)=mysqli_fetch_row($s);
                                ?>
                            <div class="single-review">
                                <div class="review-img">
                                    <img src="assets/images/user/<?=$user_img?>" class="profile" alt="" />
                                </div>
                                <div class="review-content">
                                    <?php
                                   if(!empty($_SESSION['user-id']) && ($my_id==$_SESSION['user-id'] || $row2['user_id']==$_SESSION['user-id'] || $_SESSION['user-position']=="admin"))
                                   {
                                       ?>
                                    <div class="text-right"> <a onclick="how_delete(<?=$row2['id']?>,'comment')"><i
                                                class="fas fa-trash-alt"></i> </a></div>
                                    <?php
                                   }
                                   ?>
                                    <div class="review-top-wrap">
                                        <div class="review-left">
                                            <div class="review-name">
                                                <h4><?=$user_name?></h4>
                                                <span class="date text-right"><?=$row2['date_at']?></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="review-bottom">
                                        <p><?=$row2['txt']?></p>
                                    </div>


                                    <?php
                                     $sqli5=$conn->query("SELECT * FROM `sub_comment` WHERE `comment_id`='".$row2['id']."'  ORDER BY `date_at` asc");
                                     while ($row3=$sqli5->fetch_assoc()) {
                                        $s=$conn->query("SELECT `name`,`profile` FROM `user` WHERE `user_id`='".$row3['user_id']."'");
                                        list($user_name,$user_img)=mysqli_fetch_row($s);
                                         ?>
                                    <br>
                                    <div class="single-review mb-0">
                                        
                                        <div class="review-img">
                                            <img src="assets/images/user/<?=$user_img?>" class="profile" alt="" />
                                        </div>
                                        <div class="review-content review-content2">
                                        <?php
                                            if(!empty($_SESSION['user-id']) && ($my_id==$_SESSION['user-id'] || $row3['user_id']==$_SESSION['user-id'] || $_SESSION['user-position']=="admin"))
                                            {
                                                ?>
                                                    <div class="text-right">  <a onclick="how_delete(<?=$row3['id']?>,'sub')"><i class="fas fa-trash-alt"></i> </a></div>
                                                <?php
                                            }
                                            ?>
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4><?=$user_name?></h4>
                                                        <span class="date"><?=$row3['date_at']?></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="review-bottom">
                                                <p><?=$row3['txt']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                     }
                                     ?>

                                    <div class="row mt-3">
                                        <?php
                                        if(!empty($_SESSION['user-id']))
                                        {
                                            ?>
                                            <div class="col-md-12">
                                            <form action="sql_comment.php" method="post">
                                                <input type="text" class="form-control bd-0"
                                                    placeholder="ตอบกลับความคิดเห็น..." name="comment" required>
                                                <input type="hidden" name="recipe_id" value="<?=$_GET['id']?>">
                                                <input type="hidden" name="comment_id" value="<?=$row2['id']?>">
                                                <input type="submit" name="sub_comment" style="display:none;">
                                            </form>
                                        </div>
                                            <?php
                                        }
                                        ?>
                                        

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
        </div>



    </div>
</div>




<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>

<script>
function how_delete(recipe_id, type) {
    let text;
    if (confirm("ยืนยันการลบข้อมูลใช่หรือไม่?") == true) {
        window.location = "sql_delete_comment.php?id=" + recipe_id + "&type=" + type+"&recipe_id=<?=$_GET['id']?>";
    }
}


function how_delete_recipe(recipe_id) {
    let text;
    if (confirm("ยืนยันการลบข้อมูลใช่หรือไม่?") == true) {
        window.location = "sql_delete_comment.php?id=" + recipe_id+"&type=recipe";
    }
}
</script>