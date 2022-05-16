
<?php
session_start();
include("conDB.php");
if(isset($_POST['add_recipe']))
{
     
    
    if(!empty($_FILES['img1']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img1']['name']);
        $img1 =  $datenow."-1" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img1']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img1);
    }else{
        $img1="";
    }
    if(!empty($_FILES['img2']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img2']['name']);
        $img2 =  $datenow."-2" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img2']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img2);
    }else{
        $img2="";
    }
    if(!empty($_FILES['img3']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img3']['name']);
        $img3 =  $datenow."-3" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img3']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img3);
    }else{
        $img3="";
    }
    if(!empty($_FILES['img4']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img4']['name']);
        $img4 =  $datenow."-4" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img4']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img4);
    }else{
        $img4="";
    }
    if(!empty($_FILES['img5']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img5']['name']);
        $img5 =  $datenow."-5" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img5']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img5);
    }else{
        $img5="";
    }
    if(!empty($_FILES['img6']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img6']['name']);
        $img6 =  $datenow."-6" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img6']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img6);
    }else{
        $img6="";
    }
    $conn->query("INSERT INTO `recipe`( `name`, `type`, `description`, `detail`, `ingredints`, `directions`, `cook_note`, `nutrition`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `date_at`, `view`, `likes`, `post_by`) VALUES ('".$_POST['name']."','".$_POST['type']."','".$_POST['description']."','".$_POST['detail']."','".$_POST['ingredints']."','".$_POST['directions']."','".$_POST['cook_note']."','".$_POST['nutrition']."','$img1','$img2','$img3','$img4','$img5','$img6','".date("Y-m-d H:i:s")."','0','0','".$_SESSION['user-id']."')");
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='myrecipe.php';</script>";

}
 