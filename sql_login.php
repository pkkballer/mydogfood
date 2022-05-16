<?php
session_start();
include("conDB.php");
if(isset($_POST['button_register']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sqli1=$conn->query("SELECT * FROM `user` WHERE `email`='$email'");
    if($sqli1->num_rows>0)
    {
        echo "<script>alert('มีบัญชีในระบบแล้ว กรุณาเข้าสู่ระบบ');window.location='login.php';</script>";
    }else{
        $conn->query("INSERT INTO `user`(`name`, `email`, `password`, `position`) VALUES ('$name','$email','$password','user')");
        $sqli1=$conn->query("SELECT `user_id` FROM `user` WHERE `email`='$email'");
        list($user_id)=mysqli_fetch_row($sqli1);
        $_SESSION['user-id']=$user_id;
        $_SESSION['user-name']=$name;
        $_SESSION['user-position']="user";
        echo "<script>alert('สมัครสมาชิกสำเร็จ ยินดีต้อนรับเข้าสู่ระบบ');window.location='profile.php';</script>";

    }

}
if(isset($_POST['button_login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sqli1=$conn->query("SELECT `user_id`,`name`,`position` FROM `user` WHERE `email`='$email' and `password`='$password'");
    if($sqli1->num_rows==0)
    {
        echo "<script>alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง! กรุณาตรวจสอบข้อมูลอีกครั้ง');window.location='login.php';</script>";
    }else{
        list($user_id,$name,$position)=mysqli_fetch_row($sqli1);
        $_SESSION['user-id']=$user_id;
        $_SESSION['user-name']=$name;
        $_SESSION['user-position']=$position;
        echo "<script>alert('ยินดีต้อนรับเข้าสู่ระบบ');window.location='profile.php';</script>";
       

    }

}
?>