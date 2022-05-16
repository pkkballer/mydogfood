<?php
session_start();
require_once "PHPMailer-5.2-stable/PHPMailerAutoload.php";


include("../conDB.php");
if(isset($_POST['button_forget']))
{
    $email=$_POST['email'];
    $sqli1=$conn->query("SELECT `password`,`name` FROM `user` WHERE `email`='$email'");
    if($sqli1->num_rows==0)
    {
        echo "<script>alert('ไม่มีบัญชีในระบบ กรุณาตรวจสอบข้อมูลใหม่');window.location='../forget_password.php';</script>";
    }else{
 
        list($password,$name)=mysqli_fetch_row($sqli1);

        $mail = new PHPMailer;

        //Enable SMTP debugging. 
        // $mail->SMTPDebug = 3;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "thsv49.hostatom.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "support@mydogfood.org";                 
        $mail->Password = "oF759!zk4";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to 
        $mail->Port = 587;                                   
        //Set  sender account
        $mail->From = "support@mydogfood.org";
        $mail->FromName = "mydogfood.org";
        //Set  reciever account
        $mail->addAddress($email, "mydogfood.org - Forget Password");

        $mail->isHTML(true);
        
              

         
         // rungcharoen@hotmail.com
         $txt=''; 
         $txt.='เรียน คุณ'.$name."<br>"; 
         $txt.='รหัสผ่านของคุณคือ : '.$password."<br>"; 
        
         $mail->Subject = "mydogfood.org - Forget Password";


         $mail->Body = $txt;
         if(!$mail->send()){
            echo "<script>alert('ส่งรหัสผ่านสำเร็จ กรุณาตรวจสอบอีเมลอีกครั้ง');window.location='../login.php';</script>";

        }else{
            echo "<script>alert('ส่งรหัสผ่านสำเร็จ กรุณาตรวจสอบอีเมลอีกครั้ง');window.location='../login.php';</script>";

        }
         

    }

}
 
?>