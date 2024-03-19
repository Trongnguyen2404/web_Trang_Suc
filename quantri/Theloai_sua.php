<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once("functions.php");
    $idHH = $_GET['idHH'];
    settype($idHH, "int");
    $TheLoai=layChiTietTheloai($idHH);
?>

    <meta charset="UTF-8">
    <title>Thêm Thể Loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
