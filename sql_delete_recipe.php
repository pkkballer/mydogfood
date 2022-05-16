
<?php
session_start();
include("conDB.php");
$conn->query("DELETE FROM `recipe` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `wishlist` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `sub_comment` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `comment` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `likes` WHERE `recipe_id`='".$_GET['id']."'");
    echo "<script>alert('ลบข้อมูลสำเร็จ');window.location='myrecipe.php';</script>";