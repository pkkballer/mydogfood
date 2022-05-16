<?php
session_start();
include("conDB.php");
if(isset($_POST['add_comment']))
{
    $conn->query("INSERT INTO `comment`(  `recipe_id`, `txt`, `date_at`, `user_id`) VALUES ('".$_POST['recipe_id']."','".$_POST['comment']."','".date("Y-m-d H:i:s")."','".$_SESSION['user-id']."')");
    echo "<script>alert('แสดงความคิดเห็นเรียบร้อยแล้ว');window.location='detail.php?id=".$_POST['recipe_id']."#comment';</script>";

}
if(isset($_POST['sub_comment']))
{
    $conn->query("INSERT INTO `sub_comment`(  `recipe_id`, `comment_id`, `user_id`, `txt`, `date_at`) VALUES ('".$_POST['recipe_id']."','".$_POST['comment_id']."','".$_SESSION['user-id']."','".$_POST['comment']."','".date("Y-m-d H:i:s")."')");
    echo "<script>alert('แสดงความคิดเห็นเรียบร้อยแล้ว');window.location='detail.php?id=".$_POST['recipe_id']."#comment';</script>";
 
}

?>