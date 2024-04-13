<?php
require_once "connectdb.php";

// Kiểm tra xem có từ khóa tìm kiếm được gửi từ URL hay không
if(isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $listadmin = layDanhSachadminByKeyword($keyword); // Gọi hàm tìm kiếm với từ khóa
} else {
    $listadmin = layDanhSachadmin(); // Nếu không có từ khóa, hiển thị tất cả hàng hóa
}
if (isset($_SESSION['login_id'])==false){
    $_SESSION['thongbao']="Bạn chưa đăng nhập";
    header("Location: login.php");
    exit();
}
if ($_SESSION['login_group']!=0){
    $_SESSION['thongbao']="Bạn không phải là admin";
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DANH SÁCH Admin</title>
<link rel="stylesheet" href="./assets/css/style1.css">
</head>
<body>

<div class="container">
    <h4 class="col-10 m-auto p-2 text-center">DANH SÁCH Admin</h4>
    <form method="GET" action="">
        <div class="form-group">
            <label for="search">Tìm kiếm theo tên admin:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Nhập tên admin">
        </div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    <table class="table table-bordered">
        <tr class="table tablebordered">
            <th>Tên admin</th>
            <th>email</th>
            <th>Số điện thoại</th>
            <th>Tạo ngày</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($listadmin as $row) { ?>
        <tr>
            <td> <?= $row['username'] ?> </td>
            <td> <?= $row['email'] ?> </td>
            <td> <?= ($row['SoDienThoai']) ?> </td>
            <td> <?= $row['ngay'] ?> </td>
            <td>
                <!-- <a href="index.php?page=theloai_sua&idUser=<?= $row['idUser'] ?>">Sửa</a> -->
                <a href="khachhang_xoa.php?idUser=<?= $row['idUser'] ?>">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const keyword = searchInput.value.trim();
            const currentURL = window.location.href.split('?')[0]; // Lấy đường dẫn hiện tại trước dấu ?

            if (keyword !== '') {
                window.location.href = `${currentURL}?page=admin_ds&search=${keyword}`;
            } else {
                window.location.href = `${currentURL}?page=admin_ds`;
            }
        });
    });
</script>
</body>
</html>
