
<?php
session_start();
include("conDB.php");
$conn->query("DELETE FROM `news` WHERE `news_id`='".$_GET['id']."'"); 
    echo "<script>alert('ลบข้อมูลสำเร็จ');window.location='manage_news.php';</script>";