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
                        <li>เพิ่มเมนู</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="checkout-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="billing-info-wrap">
                    <h3>เพิ่มเมนู</h3>
                    <form action="sql_add_recipt.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="billing-info mb-20px">
                                    <label>ชื่อ *</label>
                                    <input type="text" name="name" required />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="billing-select mb-20px">
                                    <label>หมวดหมู่ * </label>
                                    <select name="type" required>
                                        <option value="">เลือก</option>
                                        <option value="1">สุนัขใหญ่</option>
                                        <option value="2">สุนัขเล็ก</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="additional-info-wrap">
                                    <div class="additional-info">
                                        <label>รายละเอียดย่อ *</label>
                                        <textarea name="description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-5">
                                <div class="additional-info-wrap">
                                    <div class="additional-info">
                                        <label>รายละเอียด *</label>
                                        <textarea name="detail" required class="summernote" rows="20"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-5">
                                <div class="additional-info-wrap">
                                    <div class="additional-info">
                                        <label>ส่วนผสม *</label>
                                        <textarea name="ingredints" required class="summernote" rows="20"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-5">
                                <div class="additional-info-wrap">
                                    <div class="additional-info">
                                        <label>คำแนะนำ</label>
                                        <textarea name="directions" required class="summernote" rows="20"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-5">
                                <div class="additional-info-wrap">
                                    <div class="additional-info">
                                        <label>ตำรา *</label>
                                        <textarea name="cook_note" required class="summernote" rows="20"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-5">
                                <div class="additional-info-wrap">
                                    <div class="additional-info">
                                        <label>ข้อมูลโภชนาการ *</label>
                                        <textarea name="nutrition" required class="summernote" rows="20"></textarea>
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
                                    <img src="assets/images/picture.png" class="img100" alt="" >
                                </div>
                                <div class="billing-info mb-20px mt-20px">
                                    <input type="file" name="img1" id="img1" required onchange="show_img(1)">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <label>รูป 2 *</label>
                                <div class="show2">
                                    <img src="assets/images/picture.png" class="img100" alt="">
                                </div>
                                <div class="billing-info mb-20px mt-20px">
                                    <input type="file" name="img2" id="img2" required onchange="show_img(2)">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <label>รูป 3</label>
                                <div class="show3">
                                    <img src="assets/images/picture.png" class="img100" alt="">
                                </div>
                                <div class="billing-info mb-20px mt-20px">
                                    <input type="file" name="img3" id="img3" onchange="show_img(3)">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <label>รูป 4</label>
                                <div class="show4">
                                    <img src="assets/images/picture.png" class="img100" alt="">
                                </div>
                                <div class="billing-info mb-20px mt-20px">
                                    <input type="file" name="img4" id="img4" onchange="show_img(4)">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <label>รูป 5</label>
                                <div class="show5">
                                    <img src="assets/images/picture.png" class="img100" alt="">
                                </div>
                                <div class="billing-info mb-20px mt-20px">
                                    <input type="file" name="img5" id="img5" onchange="show_img(5)">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <label>รูป 6</label>
                                <div class="show6">
                                    <img src="assets/images/picture.png" class="img100" alt="">
                                </div>
                                <div class="billing-info mb-20px mt-20px">
                                    <input type="file" name="img6" id="img6" onchange="show_img(6)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <button type="submit" class="btnmain" name="add_recipe">บันทึกข้อมูล</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
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
