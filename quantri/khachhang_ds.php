
<link href= "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet" />
<h4 class="col-10 m-auto p-2 text-center">DANH SÁCH KHÁCH HÀNG</h4>
<form method="GET" action="">
    <div class="form-group">
        <label for="search">Tìm kiếm theo tên khách hàng:</label>
        <input type="text" class="form-control" id="search" name="search" placeholder="Nhập tên khách hàng">
    </div>
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
</form>
<table class="table table-bordered">
    <tr class="table tablebordered">
        <th>Tên khách hàng</th>
        <th>email</th>
        <th>Số điện thoại</th>
        <th>Giới tính</th>
        <th>Sở Thích</th>
        <th>Tạo ngày</th>
        <th>Hành động</th>
    </tr>
    <?php
    require_once "connectdb.php";
    // Kiểm tra xem có từ khóa tìm kiếm được gửi từ URL hay không
    if(isset($_GET['search'])) {
        $keyword = $_GET['search'];
        $listKhachHang = layDanhSachKhachhangByKeyword($keyword); // Gọi hàm tìm kiếm với từ khóa
    } else {
        $listKhachHang = layDanhSachKhachhang(); // Nếu không có từ khóa, hiển thị tất cả hàng hóa
    }
    foreach ($listKhachHang as $row ) { ?>
    <tr>
        <td> <?=$row['username']?> </td>
        <td> <?=$row['email']?> </td>
        <td> <?=($row['SoDienThoai'])?> </td>
        <td> <?=($row['phai'])?"Nam ":"Nu";?> </td>
        <td> <?= $soThich = $row['SoThich'];
        if ($soThich == 2) {
            echo " :Cà phê đen";
        } elseif ($soThich == 1) {
            echo " :Cà phê sữa";
        } elseif ($soThich == 0) {
            echo " :Cả hai";
        }?> </td>
        <td> <?=$row['ngay']?> </td>
        <td>
            <a href="index.php?page=khachhang_sua&idUser=<?=$row['idUser']?>">Sửa</a>
            <a href="khachhang_xoa.php?idUser=<?=$row['idUser']?>">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const keyword = searchInput.value.trim();
            const currentURL = window.location.href.split('?')[0]; // Lấy đường dẫn hiện tại trước dấu ?

            if (keyword !== '') {
                window.location.href = `${currentURL}?page=khachhang_ds&search=${keyword}`;
            } else {
                window.location.href = `${currentURL}?page=khachhang_ds`;
            }
        });
    });
</script>
