<?php
require_once "functions.php";

if (isset($_GET['search'])) {
     $keyword = $_GET['search'];
    $listTheLoai = layDanhSachLoaiHangByKeyword($keyword);
} else {
    $listTheLoai = layDanhSachLoaiHang();
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
<title>Danh sách hàng hóa</title>
<link rel="stylesheet" href="./assets/css/style1.css">
</head>
<body>

<div class="container">
    <h4 class="col-10 m-auto p-2 text-center">DANH SÁCH HÀNG HÓA</h4>
    <form method="GET" action="">
    <div class="form-group">
            <label for="search">Tìm kiếm theo tên hàng hóa hoặc loại hàng hóa:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Nhập tên hàng hóa hoặc loại hàng hóa (0:Cà phê hòa tan, 1:Cà phê fin)">
        </div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    <table class="table table-bordered">
        <tr class="table tablebordered">
        <th>Tên hàng hóa</th>
                <th>Số lượng</th>
                <th>Ẩn-Hiện</th>
                <th>Loại hàng hóa</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
        </tr>
        <?php foreach ($listTheLoai as $row) { ?>
                <tr>
                    <td><?= $row['TenHH'] ?></td>
                    <td><?= $row['SoLuong'] ?></td>
                    <td><?= ($row['AnHien']) ? "Đang hiện" : "Đang ẩn"; ?></td>
                    <td><?= ($row['LoaiHH']) ? "Cà phê fin" : "Cà phê hòa tan"; ?></td>
                    <td>
                        <img src="./icon/<?= $row['Anh'] ?>" alt="<?= $row['TenHH'] ?>" width="100">
                    </td>
                    <td>
                        <a href="index.php?page=theloai_sua&idHH=<?= $row['idHH'] ?>">Sửa</a>
                        <a href="theloai_xoa.php?idHH=<?= $row['idHH'] ?>">Xóa</a>
                    </td>
                </tr>
        <?php } ?>
    </table>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search');
            const form = document.querySelector('form');

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const keyword = searchInput.value.trim();
                const currentURL = window.location.href.split('?')[0];

                if (keyword !== '') {
                    window.location.href = `${currentURL}?page=theloai_ds&search=${keyword}`;
                } else {
                    window.location.href = `${currentURL}?page=theloai_ds`;
                }
            });
        });
    </script>
</body>
</html>






