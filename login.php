<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li>เข้าสู่ระบบ / สมัครสมาชิก</li>
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
                            <h4>เข้าสู่ระบบ</h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4>สมัครสมาชิก</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form   method="post" action="sql_login.php">
                                    <label for="file">อีเมล</label>
                                        <input type="email" name="email" class="form-control" required   />
                                        <label for="file">รหัสผ่าน</label>
                                        <input type="password" name="password" class="form-control" required   />
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                            <button type="submit" name="button_login"><span>เข้าสู่ระบบ</span></button>
                                                <a href="forget_password.php">ลืมรหัสผ่าน?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form   method="post" action="sql_login.php">
                                        <label for="file">ชื่อ - นามสกุล</label>
                                        <input type="text" name="name" class="form-control" required placeholder="" />
                                        <label for="file">อีเมล</label>
                                        <input name="email" class="form-control mb-3" placeholder="" required type="email" />
                                        <label for="file">รหัสผ่าน</label>
                                        <input type="password" name="password" required placeholder="" />
                                        <div class="button-box">
                                            <button type="submit" name="button_register"><span>สมัครสมาชิก</span></button>
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

