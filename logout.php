<?php

// เริ่มใช้งาน Session เพื่อเข้าถึง Session ปัจจุบัน
session_start(); 

// ล้างค่าตัวแปร Session ทั้งหมดออก
session_unset(); 

// ทำลาย Session ปัจจุบันทิ้งเพื่อออกจากระบบโดยสมบูรณ์
session_destroy(); 

// ย้ายผู้ใช้กลับไปยังหน้า login.php
header("location: login.php"); 
// หยุดการทำงานของสคริปต์ทันที
exit;