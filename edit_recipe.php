<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li><a href="myrecipe.php">เมนูอาหารของฉัน</a></li>
                        <li>แก้ไขเมนู</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$sqli=$conn->query("SELECT * FROM `recipe` WHERE  `recipe_id`='".$_GET['id']."'");
if($sqli->num_rows>0)
{
    while ($row=$sqli->fetch_assoc()) {
        ?>
        <div class="checkout-area pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="billing-info-wrap">
                            <h3>แก้ไขเมนู</h3>
                            <form action="sql_edit_recipt.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 ">
                                        <div class="billing-info mb-20px">
                                            <label>ชื่อ *</label>
                                            <input type="text" name="name" value="<?=$row['name']?>" required />
                                        </div>
                                    </div>
                                    <?php $select1="";$select2="";
                                    if($row['type']=="2"){$select1="selected";}else if($row['type']=="1"){$select2="selected";}
                                    ?>

                                    <div class="col-lg-6">
                                        <div class="billing-select mb-20px">
                                            <label>หมวดหมู่ * </label>
                                            <select name="type" required>
                                                <option value="">เลือก</option>
                                                <option value="2" <?=$select1?>>สุนัขเล็ก</option>
                                                <option value="1" <?=$select2?>>สุนัขใหญ่</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="additional-info-wrap">
                                            <div class="additional-info">
                                                <label>รายละเอียดย่อ *</label>
                                                <textarea name="description" required><?=$row['description']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-5">
                                        <div class="additional-info-wrap">
                                            <div class="additional-info">
                                                <label>รายละเอียด *</label>
                                                <textarea name="detail" required class="summernote" rows="20"><?=$row['detail']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-5">
                                        <div class="additional-info-wrap">
                                            <div class="additional-info">
                                                <label>ส่วนผสม *</label>
                                                <textarea name="ingredints" required class="summernote" rows="20"><?=$row['ingredints']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-5">
                                        <div class="additional-info-wrap">
                                            <div class="additional-info">
                                                <label>แนะนำ</label>
                                                <textarea name="directions" required class="summernote" rows="20"><?=$row['directions']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-5">
                                        <div class="additional-info-wrap">
                                            <div class="additional-info">
                                                <label>บันทึกเพิ่มเติม *</label>
                                                <textarea name="cook_note" required class="summernote" rows="20"><?=$row['cook_note']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-5">
                                        <div class="additional-info-wrap">
                                            <div class="additional-info">
                                                <label>ข้อมูลโภชนาการ *</label>
                                                <textarea name="nutrition" required class="summernote" rows="20"><?=$row['nutrition']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>รูปภาพ 1-6 รูป</h4>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <label>รูป 1 *</label>
                                        <div class="show1">
                                            <?php
                                            if(!empty($row['img1']))
                                            {
                                                ?>
                                                 <img src="assets/images/food/<?=$row['img1']?>" class="img100" alt="">
                                                <?php
                                            }else{
                                                ?>
                                                 <img src="assets/images/picture.png" class="img100" alt="">
                                                <?php
                                            }
                                            ?>
                                           
                                        </div>
                                        <div class="billing-info mb-20px mt-20px">
                                            <input type="file" name="img1" id="img1"  onchange="show_img(1)">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <label>รูป 2 *</label>
                                        <div class="show2">
                                        <?php
                                            if(!empty($row['img2']))
                                            {
                                                ?>
                                                 <img src="assets/images/food/<?=$row['img2']?>" class="img100" alt="">
                                                <?php
                                            }else{
                                                ?>
                                                 <img src="assets/images/picture.png" class="img100" alt="">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="billing-info mb-20px mt-20px">
                                            <input type="file" name="img2" id="img2"  onchange="show_img(2)">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <label>รูป 3</label>
                                        <div class="show3">
                                        <?php
                                            if(!empty($row['img3']))
                                            {
                                                ?>
                                                 <img src="assets/images/food/<?=$row['img3']?>" class="img100" alt="">
                                                <?php
                                            }else{
                                                ?>
                                                 <img src="assets/images/picture.png" class="img100" alt="">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="billing-info mb-20px mt-20px">
                                            <input type="file" name="img3" id="img3" onchange="show_img(3)">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <label>รูป 4</label>
                                        <div class="show4">
                                        <?php
                                            if(!empty($row['img4']))
                                            {
                                                ?>
                                                 <img src="assets/images/food/<?=$row['img4']?>" class="img100" alt="">
                                                <?php
                                            }else{
                                                ?>
                                                 <img src="assets/images/picture.png" class="img100" alt="">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="billing-info mb-20px mt-20px">
                                            <input type="file" name="img4" id="img4" onchange="show_img(4)">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <label>รูป 5</label>
                                        <div class="show5">
                                        <?php
                                            if(!empty($row['img5']))
                                            {
                                                ?>
                                                 <img src="assets/images/food/<?=$row['img5']?>" class="img100" alt="">
                                                <?php
                                            }else{
                                                ?>
                                                 <img src="assets/images/picture.png" class="img100" alt="">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="billing-info mb-20px mt-20px">
                                            <input type="file" name="img5" id="img5" onchange="show_img(5)">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <label>รูป 6</label>
                                        <div class="show6">
                                        <?php
                                            if(!empty($row['img6']))
                                            {
                                                ?>
                                                 <img src="assets/images/food/<?=$row['img6']?>" class="img100" alt="">
                                                <?php
                                            }else{
                                                ?>
                                                 <img src="assets/images/picture.png" class="img100" alt="">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="billing-info mb-20px mt-20px">
                                            <input type="file" name="img6" id="img6" onchange="show_img(6)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="recipe_id" value="<?=$row['recipe_id']?>">
                                        <button type="submit" class="btnmain" name="edit_recipe">บันทึกข้อมูล</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php
    }
}
?>
<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>


<script>
//ฟังชั่น แสดงรูปภาพเมื่อเลือกรูป
function show_img(id) {
    var total_file = document.getElementById("img" + id).files.length;
    var total_file1 = document.getElementById("img" + id);
    if (total_file > 0) {
        $('.show' + id).html("");
        for (var j = 0; j < total_file; j++) {
            var arr = total_file1.files[j].name.split(".");
            if (arr[arr.length - 1] == "png" || arr[arr.length - 1] == "jpg" || arr[arr.length - 1] == "jpeg") {
                var total_file = document.getElementById("img" + id).files.length;
                $('.show' + id).append("<img src='" + URL.createObjectURL(event.target.files[j]) +
                    "' class='img100 ' >");
            } else {
                var total_file = document.getElementById("img" + id).files.length;
                $('.show' + id).html("");
            }
        }
    } else {
        var total_file = document.getElementById("img" + id).files.length;
        $('.show' + id).html("");
    }
}
</script>