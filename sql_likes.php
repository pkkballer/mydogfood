<?php
session_start();
include("conDB.php");
if($_GET['type']=="like")
{
    $conn->query("INSERT INTO `likes`(  `recipe_id`, `user_id`) VALUES ('".$_GET['id']."','".$_SESSION['user-id']."')");
    $conn->query("UPDATE `recipe` SET  `likes`=`likes`+'1' WHERE `recipe_id`='".$_GET['id']."'");

    echo "<script>alert('ถูกใจเรียบร้อยแล้ว');window.history.back();</script>";

}else{
    $conn->query("DELETE FROM `likes` WHERE `recipe_id`='".$_GET['id']."' AND `user_id`='".$_SESSION['user-id']."'");
    $conn->query("UPDATE `recipe` SET  `likes`=`likes`-'1' WHERE `recipe_id`='".$_GET['id']."'");

    echo "<script>alert('เลิกถูกใจเรียบร้อยแล้ว');window.history.back();</script>";

}

?>