<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php
    // เริ่มใช้งาน Session เพื่อเช็กการเข้าสู่ระบบ
    session_start(); 

    // ตรวจสอบว่าไม่มีตัวแปร Session "fname" (ยังไม่ได้ล็อกอิน)
    if(!isset($_SESSION["fname"]) ) { 
    // ถ้ายังไม่ได้ล็อกอินให้เด้งกลับไปหน้า login.php
    header("location: login.php"); 
    }
    ?>

    <!-- แสดงข้อความทักทายพร้อมแสดงชื่อผู้ใช้จาก Session -->
    สวัสดี คุณ<?= $_SESSION["fname"] ?> 

    <!-- ลิงก์สำหรับกดออกจากระบบ -->
    <a href="logout.php">Logout</a> 

</body>
</html>