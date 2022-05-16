
<?php
session_start();
include("conDB.php");
if(isset($_POST['update_profile']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $conn->query("UPDATE `user` SET  `name`='$name',`email`='$email' WHERE `user_id`='".$_SESSION['user-id']."'");

    if(!empty($_FILES['file']['name']))
    {
        $datenow = date("YmdHis");
        $temp = explode(".", $_FILES['file']['name']);
        $img_name =  $datenow . '.' . $temp[count($temp)-1];
        $temp_file1 = $_FILES['file']['tmp_name'];
        copy($temp_file1, "assets/images/user/".$img_name);
        $conn->query("UPDATE `user` SET  `profile`='$img_name'  WHERE `user_id`='".$_SESSION['user-id']."'");
         
    }
    $_SESSION['user-name']=$name;
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='profile.php';</script>";

}
if(isset($_POST['update_password']))
{
    $password=$_POST['password'];
    $conn->query("UPDATE `user` SET  `password`='$password'  WHERE `user_id`='".$_SESSION['user-id']."'");

    
    echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ');window.location='profile.php';</script>";

}