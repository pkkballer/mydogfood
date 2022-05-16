
<?php
session_start();
include("conDB.php");
if($_GET['type']=="comment")
{
    $conn->query("DELETE FROM `sub_comment` WHERE `comment_id`='".$_GET['id']."'");
    $conn->query("DELETE FROM `comment` WHERE `id`='".$_GET['id']."'");
echo "<script>alert('ลบความคิดเห็นเรียบร้อยแล้ว');window.location='detail.php?id=".$_GET['recipe_id']."#comment';</script>";

}else if($_GET['type']=="sub"){
    $conn->query("DELETE FROM `sub_comment` WHERE `id`='".$_GET['id']."'");
echo "<script>alert('ลบความคิดเห็นเรียบร้อยแล้ว');window.location='detail.php?id=".$_GET['recipe_id']."#comment';</script>";


}else if($_GET['type']=="recipe"){
    $conn->query("DELETE FROM `recipe` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `wishlist` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `sub_comment` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `comment` WHERE `recipe_id`='".$_GET['id']."'");
$conn->query("DELETE FROM `likes` WHERE `recipe_id`='".$_GET['id']."'");
echo "<script>alert('ลบเมนูอาหารเรียบร้อยแล้ว');window.location='recipes.php';</script>";


}
