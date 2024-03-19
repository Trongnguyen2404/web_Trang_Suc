<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách hàng hóa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h4 class="col-10 m-auto p-2 text-center">DANH SÁCH HÀNG HÓA</h4>
    <form method="GET" action="">
        <div class="form-group">
            <label for="search">Tìm kiếm theo tên hàng hóa hoặc loại hàng hóa:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Nhập tên hàng hóa hoặc loại hàng hóa (0:Cà phê hòa tan, 1:Cà phê fin)">
        </div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên hàng hóa</th>
                <th>Số lượng</th>
                <th>Ẩn-Hiện</th>
                <th>Loại hàng hóa</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "functions.php";

            if (isset($_GET['search'])) {
                $keyword = $_GET['search'];
                $listTheLoai = layDanhSachLoaiHangByKeyword($keyword);
            } else {
                $listTheLoai = layDanhSachLoaiHang();
            }

            foreach ($listTheLoai as $row) { ?>
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
        </tbody>
    </table>
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
