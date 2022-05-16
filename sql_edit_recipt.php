
<?php
session_start();
include("conDB.php");
if(isset($_POST['edit_recipe']))
{
     
    
    if(!empty($_FILES['img1']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img1']['name']);
        $img1 =  $datenow."-1" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img1']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img1);
        $u_img1=",`img1`='$img1'";
    }else{
        $u_img1="";
    }
    if(!empty($_FILES['img2']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img2']['name']);
        $img2 =  $datenow."-2" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img2']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img2);
        $u_img2=",`img2`='$img2'";

    }else{
        $u_img2="";
    }
    if(!empty($_FILES['img3']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img3']['name']);
        $img3 =  $datenow."-3" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img3']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img3);
        $u_img3=",`img3`='$img3'";

    }else{
        $u_img3="";
    }
    if(!empty($_FILES['img4']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img4']['name']);
        $img4 =  $datenow."-4" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img4']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img4);
        $u_img4=",`img4`='$img4'";

    }else{
        $u_img4="";
    }
    if(!empty($_FILES['img5']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img5']['name']);
        $img5 =  $datenow."-5" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img5']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img5);
        $u_img5=",`img5`='$img5'";

    }else{
        $u_img5="";
    }
    if(!empty($_FILES['img6']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['img6']['name']);
        $img6 =  $datenow."-6" . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['img6']['tmp_name'];
        copy($temp_file1, "assets/images/food/".$img6);
        $u_img6=",`img6`='$img6'";

    }else{
        $u_img6="";
    }
    $conn->query("UPDATE `recipe` SET `name`='".$_POST['name']."',`type`='".$_POST['type']."',`description`='".$_POST['description']."',`detail`='".$_POST['detail']."',`ingredints`='".$_POST['ingredints']."',`directions`='".$_POST['directions']."',`cook_note`='".$_POST['cook_note']."',`nutrition`='".$_POST['nutrition']."' $u_img1 $u_img2 $u_img3 $u_img4 $u_img5 $u_img6 WHERE `recipe_id`='".$_POST['recipe_id']."'");
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='myrecipe.php';</script>";

}
 