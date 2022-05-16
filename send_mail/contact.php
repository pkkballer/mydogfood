<?php
session_start();
require_once "PHPMailer-5.2-stable/PHPMailerAutoload.php";
 
include("../conDB.php");
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

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
$mail->addAddress("615159090009@dpu.ac.th", "mydogfood.org - Contact Form ");
$mail->Subject = "mydogfood.org - Contact Form";

$mail->isHTML(true);


// rungcharoen@hotmail.com
$txt=''; 
$txt.='ชื่อ-นามสกุล : '.$name."<br>"; 
$txt.='อีเมล : '.$email."<br>"; 
$txt.='เรื่องที่ติดต่อ : '.$subject."<br>"; 
$txt.='ข้อความ : '.$message."<br>"; 

$mail->Body = $txt;
if(!$mail->send()){
   
   echo "<script>alert('ข้อความถูกส่งแล้ว ขอบคุณที่ติดต่อเข้ามา');window.location='../contact.php';</script>";

}else{
   echo "<script>alert('ข้อความถูกส่งแล้ว ขอบคุณที่ติดต่อเข้ามา ');window.location='../contact.php';</script>";

}
 
?>