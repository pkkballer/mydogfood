
<?php
session_start();
include("conDB.php");
if(isset($_POST['add_news']))
{
     
    
    if(!empty($_FILES['img1']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img1']['name']);
        $img1 =  $datenow . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img1']['tmp_name'];
        copy($temp_file1, "assets/images/news/".$img1);
    }else{
        $img1="";
    }
    
    $conn->query("INSERT INTO `news`(  `name`, `img`, `date_at`, `description`, `detail`, `view`) VALUES ('".$_POST['name']."','".$img1."','".date("Y-m-d H:i:s")."','".$_POST['description']."','".$_POST['detail']."','0')");
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='manage_news.php';</script>";

}
 