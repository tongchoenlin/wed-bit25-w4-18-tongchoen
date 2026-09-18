<?php
require_once 'condb.php';

// ตรวจสอบสิทธิ์เฉพาะ Admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM products ORDER BY products_id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="admin_products.php">⚙️ ระบบจัดการสินค้า (Admin: <?= htmlspecialchars($_SESSION['username']) ?>)</a>
    <div>
      <a href="index.php" class="btn btn-outline-light btn-sm me-2">ไปหน้าหน้าร้าน</a>
      <a href="logout.php" class="btn btn-light btn-sm text-danger fw-bold">ออกจากระบบ</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">รายการสินค้าทั้งหมด</h3>
        <a href="product_add.php" class="btn btn-success fw-bold">+ เพิ่มสินค้าใหม่</a>
    </div>

    <div class="card shadow-sm p-3">
        <table class="table table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th width="60">ID</th>
                    <th width="80">รูปภาพ</th>
                    <th>ชื่อสินค้า</th>
                    <th width="120">ราคา</th>
                    <th width="80">สต็อก</th>
                    <th width="160">การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="text-center"><?= $row['products_id'] ?></td>
                        <td class="text-center">
                            <?php 
                                $img_src = 'https://via.placeholder.com/80x80?text=No+Img';
                                if (!empty($row['image'])) {
                                    if (filter_var($row['image'], FILTER_VALIDATE_URL)) {
                                        $img_src = $row['image'];
                                    } else if (file_exists('uploads/' . $row['image'])) {
                                        $img_src = 'uploads/' . $row['image'];
                                    }
                                }
                            ?>
                            <img src="<?= $img_src ?>" style="width: 50px; height: 50px; object-fit: cover;" class="rounded border">
                        </td>
                        <td class="fw-bold"><?= htmlspecialchars($row['products_name']) ?></td>
                        <td>฿<?= number_format($row['price'], 2) ?></td>
                        <td class="text-center"><?= $row['stock'] ?></td>
                        <td class="text-center">
                            <!-- ปุ่มแก้ไข ชี้ไปที่ product_edit.php -->
                            <a href="product_edit.php?id=<?= $row['products_id'] ?>" class="btn btn-warning btn-sm me-1 fw-bold">ลบ</a>
                            
                            <!-- ปุ่มลบ ชี้ไปที่ product_delete.php -->
                            <a href="product_delete.php?id=<?= $row['products_id'] ?>" 
                               class="btn btn-danger btn-sm fw-bold" 
                               onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบสินค้านี้?');">แก้ไข</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-3 text-muted">ยังไม่มีรายการสินค้า</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>