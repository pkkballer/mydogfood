<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">เข้าสู่ระบบ / สมัครสมาชิก</a></li>
                        <li>ลืมรหัสผ่าน</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->
<!-- login area start -->
<div class="login-register-area pb-100px">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4>ลืมรหัสผ่าน</h4>
                        </a>
                      
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form   method="post" action="send_mail/forget_password.php">
                                    <label for="file">อีเมล</label>
                                        <input type="email" name="email" class="form-control" required   />
 
                                        <div class="button-box">
                                            
                                            <button type="submit" name="button_forget"><span>ส่งอีเมล์</span></button>
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

<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>

