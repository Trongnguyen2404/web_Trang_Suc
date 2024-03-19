<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Thể Loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h4 class="col-10 m-auto p-2 text-center">THÊM HÀNG HÓA</h4>
    <form action="process.php" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên hàng hóa</label> 
            <input name="TenHH" type="text" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Số lượng</label> 
            <input name="SoLuong" type="number" class="form-control"/>
        </div> 
        <div class="form-group">
            <label>Ẩn hiện: </label> 
            <input name="AnHien" type="radio" value="0"/> Ẩn 
            <input name="AnHien" type="radio" value="1" checked/> Hiện
        </div> 
        <div class="form-group">
            <label>Loại hàng hóa </label> 
            <input name="LoaiHH" type="radio" value="0"/> Cà phê hòa tan
            <input name="LoaiHH" type="radio" value="1" checked/> Cà phê fin 
        </div>
        <div class="form-group">
            <label for="Anh">Hình</label>
            <input type="file" class="form-control" id="Anh" name="Anh">
        </div>      
        <div class="form-group">
            <input name="btn" type="submit" value="Thêm" class="btn btn-primary"/> 
        </div>
    </form>
</body>
</html>
