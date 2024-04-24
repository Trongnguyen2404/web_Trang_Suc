<?php
require_once "functions.php";

if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $listTheLoai = layDanhSachLoaiHangByKeyword($keyword);
} else {
    $listTheLoai = layDanhSachLoaiHang();
}
if (isset($_SESSION['login_id']) == false) {
    $_SESSION['thongbao'] = "Bạn chưa đăng nhập";
    header("Location: login.php");
    exit();
}
if ($_SESSION['login_group'] != 0) {
    $_SESSION['thongbao'] = "Bạn không phải là admin";
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
            <tr>
                <th>Tên hàng hóa</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ẩn-Hiện</th>
                <th>Loại hàng hóa</th>
                <th>Ảnh</th>
                <th>Ảnh 2</th>
                <th>Ảnh 3</th>
                <th>Ảnh 4</th>
                <th>Đơn đôi</th>
                <th>Chất liệu</th>
                <th>Đề xuất</th>
                <th>Thao tác</th>
            </tr>

            <?php foreach ($listTheLoai as $row) { ?>
                <tr>
                    <td><?= $row['TenHH'] ?></td>
                    <td><?= number_format($row['Gia'], 0, ',', '.') ?> $</td>
                    <td><?= $row['SoLuong'] ?></td>
                    <td><?= ($row['AnHien'] == 1) ? "Hiện" : "Ẩn"; ?></td>
                    <td><?= ($row['LoaiHH'] == 1) ? "Ring" : 
                            (($row['LoaiHH'] == 2) ? "Bracelet" : 
                            (($row['LoaiHH'] == 3) ? "Necklace" : 
                            (($row['LoaiHH'] == 4) ? "Hairpin" : 
                            (($row['LoaiHH'] == 5) ? "Anklet" : 
                            "Earrings")))); ?></td>
                    <td><img src="./icon/<?= $row['Anh1'] ?>" alt="<?= $row['TenHH'] ?>" width="100"></td>
                    <td><img src="./icon/<?= $row['Anh2'] ?>" alt="<?= $row['TenHH'] ?>" width="100"></td>
                    <td><img src="./icon/<?= $row['Anh3'] ?>" alt="<?= $row['TenHH'] ?>" width="100"></td>
                    <td><img src="./icon/<?= $row['Anh4'] ?>" alt="<?= $row['TenHH'] ?>" width="100"></td>
                    <td><?= ($row['DonDoi'] == 1) ? "Đôi" : "Đơn"; ?></td>
                    <td><?= ($row['ChatLieu'] == 1) ? "Vàng" : "Bạc"; ?></td>
                    <td><?= ($row['DeXuat'] == 1) ? "Có" : "Không"; ?></td>
                    <td>
                        <a href="index.php?page=theloai_sua&idHH=<?= $row['idHH'] ?>">Sửa</a>
                        <a href="Theloai_xoa.php?idHH=<?= $row['idHH'] ?>">Xóa</a>
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
                    window.location.href = `${currentURL}?page=hanghoa_ds&search=${keyword}`;
                } else {
                    window.location.href = `${currentURL}?page=hanghoa_ds`;
                }
            });
        });
    </script>
</body>

</html>
