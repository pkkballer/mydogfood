<?php
session_start();
include("conDB.php");
if($_GET['type']=="yes")
{
    $conn->query("INSERT INTO `wishlist`(  `recipe_id`, `user_id`) VALUES ('".$_GET['id']."','".$_SESSION['user-id']."')");
    echo "<script>alert('เก็บเป็นเมนูโปรดเรียบร้อยแล้ว');window.history.back();</script>";

}else{
    $conn->query("DELETE FROM `wishlist` WHERE `recipe_id`='".$_GET['id']."' AND `user_id`='".$_SESSION['user-id']."'");
    echo "<script>alert('ยกเลิกเมนูโปรดเรียบร้อยแล้ว');window.history.back();</script>";

}

?>