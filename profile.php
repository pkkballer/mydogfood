<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");
$sqli=$conn->query("SELECT `user_id`, `name`, `profile`, `email`, `password`, `position` FROM `user` WHERE `user_id`='".$_SESSION['user-id']."'");
while ($row=$sqli->fetch_assoc()) {
   $name=$row['name'];
   $profile=$row['profile'];
   $email=$row['email'];
   $password=$row['password'];
}
?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">หน้าหลัก</a></li>
                        <li>ข้อมูลส่วนตัว</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
 

<div class="login-register-area pb-100px">
        <div class="container">
            <div class="row justify-content-center ">
                
                <div class="ml-auto mr-auto col-lg-9">
                    <h2>จัดการข้อมูลส่วนตัว</h2>
                    <div class="checkout-wrapper mt-3">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default single-my-account">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span></span> <a data-bs-toggle="collapse" data-parent="#faq" href="#my-account-1">ข้อมูลส่วนตัว</a></h3>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            <form action="sql_profile.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-10 col-md-10">
                                                    <div class="billing-info">
                                                        <label>รูปโปรไฟล์ </label>
                                                        <input type="file" name="file" class="form-control" id="file" onchange="show_img()" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2">
                                                    <div class="showimg">
                                                        <img src="assets/images/user/<?=$profile?>" class="img100 profile" alt="">
                                                         
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>ชื่อ - นามสกุล *</label>
                                                        <input type="text" name="name" required value="<?=$name?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>อีเมล *</label>
                                                        <input type="email" name="email" required value="<?=$email?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="update_profile">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span></span> <a data-bs-toggle="collapse" data-parent="#faq" href="#my-account-2">เปลี่ยนรหัสผ่าน</a></h3>
                                </div>
                                <div id="my-account-2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="myaccount-info-wrapper">
                                            
                                            <form  action="sql_profile.php" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>รหัสผ่านใหม่</label>
                                                        <input type="password" name="password" required />
                                                    </div>
                                                </div>
                                                 
                                            </div>
                                            <div class="billing-back-btn">
                                                
                                                <div class="billing-btn">
                                                    <button type="submit" name="update_password">บันทึกการเปลี่ยนแปลง</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
//ฟังชั่น แสดงรูปภาพเมื่อเลือกรูป
function show_img() {
    var total_file = document.getElementById("file").files.length;
    var total_file1 = document.getElementById("file");
    if (total_file > 0) {
        $('.showimg' ).html("");
        for (var j = 0; j < total_file; j++) {
            var arr = total_file1.files[j].name.split(".");
            if (arr[arr.length - 1] == "png" || arr[arr.length - 1] == "jpg" || arr[arr.length - 1] == "jpeg") {
                var total_file = document.getElementById("file").files.length;
                $('.showimg').append("<img src='" + URL.createObjectURL(event.target.files[j]) + "' class='img100 profile' >");
            } else {
                var total_file = document.getElementById("file").files.length;
                $('.showimg').html("");
            }
        }
    } else {
        var total_file = document.getElementById("file").files.length;
        $('.showimg').html("");
    }
}
</script>

