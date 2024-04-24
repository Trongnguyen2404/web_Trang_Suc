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
    <title>Thêm Thể Loại</title>
</head>
<body>
    <h4 class="col-10 m-auto p-2 text-center">THÊM HÀNG HÓA</h4>
    <form action="process.php" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên hàng hóa</label> 
            <input name="TenHH" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Gia</label> 
            <input name="Gia" type="number" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Số lượng</label> 
            <input name="SoLuong" type="number" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Nội dung</label> 
            <input name="NoiDung" type="text" class="form-control"/>
        </div> 
        <div class="form-group">
            <label for="Anh1">Hình 1</label>
            <input type="file" class="form-control" id="Anh1" name="Anh1">
        </div>      
        <div class="form-group">
            <label for="Anh2">Hình 2</label>
            <input type="file" class="form-control" id="Anh2" name="Anh2">
        </div>      
        <div class="form-group">
            <label for="Anh3">Hình 3</label>
            <input type="file" class="form-control" id="Anh3" name="Anh3">
        </div>      
        <div class="form-group">
            <label for="Anh4">Hình 4</label>
            <input type="file" class="form-control" id="Anh4" name="Anh4">
        </div>      

        <div class="form-group">
            <label>Loại hàng hóa: </label> 
            <input name="LoaiHH" type="radio" value="1" checked/> Ring
            <input name="LoaiHH" type="radio" value="2"/> Bracelet
            <input name="LoaiHH" type="radio" value="3"/> Necklace
            <input name="LoaiHH" type="radio" value="4"/> Hairpin
            <input name="LoaiHH" type="radio" value="5"/> Anklet
            <input name="LoaiHH" type="radio" value="6"/> Earrings
        </div>
        <div class="form-group">
            <label>Ẩn hiện: </label> 
            <input name="AnHien" type="radio" value="0"/> Ẩn 
            <input name="AnHien" type="radio" value="1" checked/> Hiện
        </div> 

        <div class="form-group">
            <label>Đề xuất: </label> 
            <input name="DeXuat" type="radio" value="0" checked/> Không 
            <input name="DeXuat" type="radio" value="1"/> có
        </div>
        <div class="form-group">
            <label>Chất Liệu: </label> 
            <input name="ChatLieu" type="radio" value="0" checked/> bạc 
            <input name="ChatLieu" type="radio" value="1"/> vàng
        </div>
        <div class="form-group">
            <label>Đơn Đôi: </label> 
            <input name="DonDoi" type="radio" value="0" checked/> Đơn 
            <input name="DonDoi" type="radio" value="1"/> Đôi
        </div>
        <div class="form-group">
            <input name="btn" type="submit" value="Thêm" class="btn btn-primary"/> 
        </div>
    </form>
</body>
</html>
