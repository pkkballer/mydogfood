<!-- เรียกหน้า header.php มาแสดง (เป็นส่วนของ Menu Bar) -->
<?php include("header.php");?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-area pb-100px">
        <div class="container">
      <div class="row">
          <div class="col-md-2"></div>
     <div class="col-md-8">
     <div class="section-title">
                            <h2>ติดต่อเรา</h2>
                             
                        </div>
     </div>
      </div>
            <div class="custom-row-2 justify-content-center">
          
 
                <div class="col-lg-8">
                    <div class="contact-form">
                        <div class="contact-title mb-3">
                            <h5 >ส่งข้อความหาแอดมิน</h5>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="send_mail/contact.php" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input name="name" placeholder="ชื่อ-นามสกุล *" type="text" required />
                                </div>
                                <div class="col-lg-6">
                                    <input name="email" placeholder="อีเมล *" type="email" required />
                                </div>
                                <div class="col-lg-12">
                                    <input name="subject" placeholder="เรื่องที่ติดต่อ *" type="text" required />
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="กรอกข้อความที่นี่...*" required rows="3"></textarea>
                                    <button class="submit" type="submit">SEND</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
<!-- เรียกหน้า footer.php มาแสดง (เป็นส่วนแสดงของ ด้าน menu footer) -->
<?php include("footer.php");?>