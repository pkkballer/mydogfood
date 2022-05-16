<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li>จัดการข่าวสาร</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="cart-main-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6">
                <h3 class="cart-page-title">จัดการข่าวสาร</h3>

            </div>
            
            <div class="col-lg-6  col-sm-6 col-6  ">
                <div class="cart-shiping-update-wrapper ">
                    <div class="cart-clear ">
                        <a href="add_news.php" >เพิ่มข่าวสาร</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="table-content table-responsive cart-table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>รูปปก</th>
                                <th>ชื่อเรื่อง</th>
                                <th>วันที่เพิ่ม</th>
                                <th>แก้ไข/ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $sqli=$conn->query("SELECT * FROM `news` order by `date_at` desc");

                            if($sqli->num_rows>0)
                            {
                                while ($row=$sqli->fetch_assoc()) {
                                    ?>
                            <tr>
                                <td class="product-thumbnail">
                                    <img class="img-responsive" src="assets/images/news/<?=$row['img']?>" alt="" />
                                </td>
                                <td class="product-name"><a href="#"><?=$row['name']?></a></td>
                                <td class="product-subtotal"><?=$row['date_at']?></td>
                                <td class="product-remove">
                                    <a href="edit_news.php?id=<?=$row['news_id']?>"><i
                                            class="fa fa-pencil-alt"></i></a>
                                    <a onclick="how_delete(<?=$row['news_id']?>)"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
</div>

<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>

<script>
function how_delete(news_id) {
    let text;
    if (confirm("ยืนยันการลบข้อมูลใช่หรือไม่?") == true) {
        window.location = "sql_delete_news.php?id=" + news_id;
    }
}
</script>