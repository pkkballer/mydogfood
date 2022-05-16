<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li><a href="manage_news.php">จัดการข่าวสาร</a></li>
                        <li>แก้ไขข่าวสาร</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$s=$conn->query("SELECT * FROM `news` WHERE `news_id`='".$_GET['id']."'");
while ($row=$s->fetch_assoc()) {
    ?>
    <div class="checkout-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="billing-info-wrap">
                    <h3>แก้ไขข่าวสาร</h3>
                    <form action="sql_edit_news.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="billing-info mb-20px">
                                    <label>ชื่อเรื่อง *</label>
                                    <input type="text" name="name" value="<?=$row['name']?>" required />
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
                            
                        </div>
                        <div class="row justify-content-center">
                           
                            <div class="col-lg-8 col-md-8">
                            <h4>รูปภาพ</h4>
                                
                                <div class="show1 mt-2">
                                    <img src="assets/images/news/<?=$row['img']?>" class="img100" alt="" >
                                </div>
                                <div class="billing-info mb-20px mt-20px">
                                    <input type="file" name="img1" id="img1"  onchange="show_img(1)">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="hidden" name="news_id" value="<?=$row['news_id']?>">
                            <button type="submit" class="btnmain" name="edit_news">บันทึกข้อมูล</button>

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
?>


<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>


<script>
//ฟังชั่น แสดงรูปภาพเมื่อเลือกรูป
function show_img(id) {
    var total_file = document.getElementById("img"+id).files.length;
    var total_file1 = document.getElementById("img"+id);
    if (total_file > 0) {
        $('.show'+id ).html("");
        for (var j = 0; j < total_file; j++) {
            var arr = total_file1.files[j].name.split(".");
            if (arr[arr.length - 1] == "png" || arr[arr.length - 1] == "jpg" || arr[arr.length - 1] == "jpeg") {
                var total_file = document.getElementById("img"+id).files.length;
                $('.show'+id).append("<img src='" + URL.createObjectURL(event.target.files[j]) + "' class='img100 ' >");
            } else {
                var total_file = document.getElementById("img"+id).files.length;
                $('.show'+id).html("");
            }
        }
    } else {
        var total_file = document.getElementById("img"+id).files.length;
        $('.show'+id).html("");
    }
}
</script>
