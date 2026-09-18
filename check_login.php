<?php
require_once 'condb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['customers_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role']; // จะเก็บค่า 'admin' หรือ 'user'

        // แยกหน้าตามสิทธิ์ role
        if ($row['role'] == 'admin') {
            header("Location: admin_products.php"); // tongchoen จะถูกส่งมาหน้านี้ (เพิ่ม/แก้ไข/ลบสินค้าได้)
        } else {
            header("Location: index.php"); // eric จะถูกส่งมาหน้านี้ (ดูสินค้าสั่งซื้อได้)
        }
        exit();
    } else {
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'); window.location='login.php';</script>";
    }
}
?>