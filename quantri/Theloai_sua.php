<?php
require_once("functions.php");
$idHH = $_GET['idHH'];
settype($idHH, "int");
$TheLoai=layChiTietTheloai($idHH);
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
<title>SỬA THỂ LOẠI</title>
<link rel="stylesheet" href="./assets/css/style1.css">
</head>
<body>

<h4 class="col-10 m-auto p-2 text-center">SỬA THỂ LOẠI</h4>
    <form action="xulysuatheloai.php?idHH=<?=$idHH?>" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên hàng hóa</label> 
            <input name="TenHH" type="text" value="<?=$TheLoai['TenHH']?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Số Lượng</label> 
            <input name="SoLuong" type="number" value="<?=$TheLoai['SoLuong']?>" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Loại hàng hóa </label> 
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==0) echo 'checked'?> value="0"/> Cà phê fin 
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==1) echo 'checked'?> value="1" checked/> Cà phê hòa tan
        </div>
        <div class="form-group">
            <label>Ẩn hiện: </label> 
            <input name="AnHien" type="radio" <?php if($TheLoai['AnHien']==0) echo 'checked'?> value="0"/> Ẩn 
            <input name="AnHien" type="radio" <?php if($TheLoai['AnHien']==1) echo 'checked'?> value="1" checked/> Hiện
        </div> 
            
        <div class="form-group">
            <label for="Anh">Hình</label>
            <input type="text" class="form-control" value="<?=$TheLoai['Anh']?>" id="Anh" name="Anh">
            <input type="file" class="form-control" value="<?=$TheLoai['Anh']?>" id="Anh" name="Anh">
        </div>      
        <div class="form-group">
            <input name="btn" type="submit" value="Cập Nhật" class="btn btn-primary"/> 
        </div>
    </form>
</body>
</html>
