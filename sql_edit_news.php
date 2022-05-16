
<?php
session_start();
include("conDB.php");
if(isset($_POST['edit_news']))
{
     
    
    if(!empty($_FILES['img1']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img1']['name']);
        $img1 =  $datenow . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img1']['tmp_name'];
        copy($temp_file1, "assets/images/news/".$img1);
        $timg=",`img`='".$img1."'";
    }else{
        $timg="";
    }
    
    $conn->query("UPDATE `news` SET  `name`='".$_POST['name']."',`description`='".$_POST['description']."',`detail`='".$_POST['detail']."' $timg WHERE `news_id`='".$_POST['news_id']."'");
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='manage_news.php';</script>";

}
 