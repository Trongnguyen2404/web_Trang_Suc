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

<h4 class="col-10 m-auto p-2 text-center">SỬA HÀNG HÓA</h4>
<form action="xulysuatheloai.php?idHH=<?=$idHH?>" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên hàng hóa</label> 
        <input name="TenHH" type="text" value="<?=$TheLoai['TenHH']?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Gia</label> 
        <input name="Gia" type="number" value="<?=$TheLoai['Gia']?>" class="form-control"/>
    </div> 
    <div class="form-group">
        <label>Số lượng</label> 
        <input name="SoLuong" type="number" value="<?=$TheLoai['SoLuong']?>" class="form-control"/>
    </div> 
    <div class="form-group">
        <label>Nội dung</label> 
        <input name="NoiDung" type="text" value="<?=$TheLoai['NoiDung']?>" class="form-control"/>
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
        <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==1) echo 'checked'?> value="1"/> Ring
        <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==2) echo 'checked'?> value="2"/> Bracelet
        <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==3) echo 'checked'?> value="3"/> Necklace
        <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==4) echo 'checked'?> value="4"/> Hairpin
        <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==5) echo 'checked'?> value="5"/> Anklet
        <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==6) echo 'checked'?> value="6"/> Earrings
    </div>
    <div class="form-group">
        <label>Ẩn hiện: </label> 
        <input name="AnHien" type="radio" <?php if($TheLoai['AnHien']==0) echo 'checked'?> value="0"/> Ẩn 
        <input name="AnHien" type="radio" <?php if($TheLoai['AnHien']==1) echo 'checked'?> value="1"/> Hiện
    </div> 

    <div class="form-group">
        <label>Đề xuất: </label> 
        <input name="DeXuat" type="radio" <?php if($TheLoai['DeXuat']==0) echo 'checked'?> value="0"/> Không 
        <input name="DeXuat" type="radio" <?php if($TheLoai['DeXuat']==1) echo 'checked'?> value="1"/> có
    </div>
    <div class="form-group">
        <label>Chất Liệu: </label> 
        <input name="ChatLieu" type="radio" <?php if($TheLoai['ChatLieu']==0) echo 'checked'?> value="0"/> bạc 
        <input name="ChatLieu" type="radio" <?php if($TheLoai['ChatLieu']==1) echo 'checked'?> value="1"/> vàng
    </div>
    <div class="form-group">
        <label>Đơn Đôi: </label> 
        <input name="DonDoi" type="radio" <?php if($TheLoai['DonDoi']==0) echo 'checked'?> value="0"/> Đơn 
        <input name="DonDoi" type="radio" <?php if($TheLoai['DonDoi']==1) echo 'checked'?> value="1"/> Đôi
    </div>
    <div class="form-group">
        <input name="btn" type="submit" value="Cập Nhật" class="btn btn-primary"/> 
    </div>
</form>

</body>
</html>
