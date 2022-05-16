<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li>เมนูอาหารของฉัน</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="cart-main-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-12">
                <h3 class="cart-page-title">เมนูอาหารของฉัน</h3>

            </div>
            <div class="col-md-4 col-sm-8 col-8 mb-3 mt-2">
                <form method="get">
                    <div class="input-group">
                        <?php $select1="";$select2="";
                        if(!empty($_GET['type'])){
                            if($_GET['type']=="1"){$select1="selected";}
                            else if($_GET['type']=="2"){$select2="selected";}
                        }
                        ?>
                        <select class="form-select" id="inputGroupSelect04" name="type">
                            <option selected value="">ประเภทอาหารทั้งหมด</option>
                            <option value="1" <?=$select1?>>สุนัขใหญ่</option>
                            <option value="2" <?=$select2?>>สุนัขเล็ก</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="submit">แสดง</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4  col-sm-4 col-4  ">
                <div class="cart-shiping-update-wrapper ">
                    <div class="cart-clear ">
                        <a href="add_recipe.php" >เพิ่มเมนู</a>
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
                                <th>ชื่อเมนู</th>
                                <th>ประเภทอาหาร</th>
                                <th>วันที่เพิ่ม</th>
                                <th>จำนวนถูกใจ</th>
                                <th>แก้ไข/ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(empty($_GET['type'])){
                                $sqli=$conn->query("SELECT * FROM `recipe` WHERE `post_by`='".$_SESSION['user-id']."'");
                            }else{
                            $sqli=$conn->query("SELECT * FROM `recipe` WHERE `post_by`='".$_SESSION['user-id']."' and type='".$_GET['type']."'");

                            }
                            if($sqli->num_rows>0)
                            {
                                while ($row=$sqli->fetch_assoc()) {
                                    ?>
                            <tr>
                                <td class="product-thumbnail">
                                    <img class="img-responsive" src="assets/images/food/<?=$row['img1']?>" alt="" />
                                </td>
                                <td class="product-name"><a href="#"><?=$row['name']?></a></td>
                                <td class="product-subtotal"><?php echo ($row['type']=="1")?"สุนัขใหญ่":  "สุนัขเล็ก" ?></td>
                                <td class="product-subtotal"><?=$row['date_at']?></td>
                                <td class="product-subtotal"><?=$row['likes']?></td>
                                <td class="product-remove">
                                    <a href="edit_recipe.php?id=<?=$row['recipe_id']?>"><i
                                            class="fa fa-pencil-alt"></i></a>
                                    <a onclick="how_delete(<?=$row['recipe_id']?>)"><i class="fas fa-trash-alt"></i></a>
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
function how_delete(recipe_id) {
    let text;
    if (confirm("ยืนยันการลบข้อมูลใช่หรือไม่?") == true) {
        window.location = "sql_delete_recipe.php?id=" + recipe_id;
    }
}
</script>