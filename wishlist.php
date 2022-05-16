<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li>เมนูโปรด</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="cart-main-area pb-100px">
    <div class="container">
        <h3 class="cart-page-title">รายการเมนูโปรด</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>ชื่อ</th>
                                    <th>รายละเอียดย่อย</th>
                                    <th>ลบรายการโปรด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $s=$conn->query("SELECT * FROM `wishlist` WHERE `user_id`='".$_SESSION['user-id']."'");
                                    while ($r=$s->fetch_assoc()) {
                                         $sqli=$conn->query("SELECT `recipe_id`, `name`, `type`, `description`,  `img1`, `img2`,  `date_at`, `view`, `likes`, `post_by` FROM `recipe` where `recipe_id`='".$r['recipe_id']."' ");
                                         while ($row=$sqli->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="detail.php?id=<?=$row['recipe_id']?>"><img class="img-responsive" src="assets/images/food/<?=$row['img1']?>" alt="" /></a>
                                                </td>
                                                <td class="product-name"><a href="detail.php?id=<?=$row['recipe_id']?>"><?=$row['name']?></a></td>

                                                <td class="product-subtotal text-left">
                                                    <p><?=$row['description']?></p>
                                                </td>
                                                <td class="product-wishlist-cart">
                                                <a href="sql_wishlist.php?type=no&id=<?=$row['recipe_id']?>" class="btnmain text-center"> ยกเลิกเป็นเมนูโปรด</a>
                                                </td>
                                            </tr>
                                            <?php
                                         }
                                         
                                    }

                                    ?>


                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>