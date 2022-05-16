<?php
session_start();
unset($_SESSION['user-id']);
unset($_SESSION['user-name']);
unset($_SESSION['user-position']);
echo "<script>alert('ออกจากระบบเรียบร้อยแล้ว');window.location='index.php';</script>";
