<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <!-- ฟอร์มส่งข้อมูลไปยังหน้า check_login.php ด้วยวิธี POST -->
    <form action="check_login.php" method="post"> 

    <!-- ข้อความกำกับช่องกรอก username -->
    <label for="">username</label> 
    <!-- ช่องกรอก username กำหนดชื่อ name="username" เพื่อส่งค่า -->
    <input type="text" name="username"> <br> 

     <!-- ข้อความกำกับช่องกรอก password -->
     <label for="">password</label> 
    <!-- ช่องกรอก password กำหนดชื่อ name="password" เพื่อส่งค่า -->
    <input type="text" name="password"> <br> 

    <!-- ปุ่มกดสำหรับส่งข้อมูลในฟอร์ม -->
    <button>HEhe</button> 

    </form>
    
</body>
</html>