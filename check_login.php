<?php
// Report all PHP errors
// รายงานข้อผิดพลาดของ PHP ทุกระดับ เพื่อใช้ตรวจเช็กบั๊ก
error_reporting(E_ALL); 

// Force errors to be displayed on the screen
// บังคับให้แสดงข้อผิดพลาดบนหน้าจอ
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 

// เชื่อมต่อฐานข้อมูล MySQL (host, username, password, database_name)
$con = mysqli_connect("localhost", "root", "", "BIT25_4_db"); 

// รับค่า username ที่ส่งมาจากฟอร์มผ่านวิธี POST
$username = $_POST['username']; 

// รับค่า password ที่ส่งมาจากฟอร์มผ่านวิธี POST
$password = $_POST['password']; 

// เริ่มใช้งานระบบ Session เพื่อจำสถานะผู้ใช้
session_start(); 

// คำสั่ง SQL สำหรับดึงข้อมูลผู้ใช้ที่ username และ password ตรงกับที่กรอกเข้ามา
$q = "SELECT * FROM users
        WHERE username = '$username'
        AND password = '$password' "; 

// ส่งคำสั่ง SQL ไปประมวลผลที่ฐานข้อมูล
$result = mysqli_query($con, $q); 

// login ถูก
// ตรวจสอบว่าพบข้อมูลในฐานข้อมูลหรือไม่ (ถ้ามากกว่า 0 แสดงว่าเจอข้อมูล)
if ( mysqli_num_rows($result) > 0 ){ 

    // ดึงข้อมูลผู้ใช้จากผลลัพธ์มาเก็บในรูปแบบ Array
    $user = mysqli_fetch_assoc($result); 
    // เก็บชื่อจริง (fname) ลงใน Session เพื่อนำไปใช้หน้าอื่น
    $_SESSION["fname"] = $user["fname"]; 
    // ย้ายผู้ใช้ไปยังหน้า index.php
    header("location: index.php"); 
    // หยุดการทำงานของสคริปต์ทันที
    exit; 

}else{
    // login ผิด
    // ถ้ารหัสผ่านหรือชื่อผู้ใช้ไม่ถูกต้อง ให้ย้ายกลับไปหน้า login.php
    header("location: login.php"); 
    // หยุดการทำงานของสคริปต์ทันที
    exit; 
}