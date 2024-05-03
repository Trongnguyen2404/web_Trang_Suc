<?php
require_once("functions.php");
$idHH = $_GET['idHH'];
settype($idHH, "int");
$TheLoai=layChiTietTheLoai($idHH);
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
<style>
.select-menu{
    width: 170px;
    display: inline-block;
}
.select-menu .select-btn {
    display: flex;
    height: 36px;
    background: #fff;
    padding: 8px;
    font-size: 15px;
    font-weight: 400;
    border-radius: 8px;
    align-items: center;
    cursor: pointer;
    justify-content: space-between;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}
.select-menu.active .select-btn i{
    transform: rotate(-180deg);
}
.select-menu .options {
    position: absolute;
    margin-top: 10px;
    border-radius: 8px;
    background: #f6f6f6;
    box-shadow: 0 0 3px rgba(0,0,0,0.1);
    z-index: 50;
    width: 170px;
    height: 0px; /* Đặt chiều cao ban đầu là 0 */
    overflow: hidden; /* Ẩn nội dung khi không active */
    text-align: center;
    transition: height 1s ease; /* Thay đổi transition time thành 0.4s */
}
.select-menu .options.active {
    display: block;
    height: 80px;
}
.options .option {
    display: flex;
    height: 15px;
    cursor: pointer;
    margin: 15px 0;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    transition: margin 1s ease;
}
.options .option:hover{
    margin: 15px;
}
.option i{
    font-size: 15px;
    margin-right: 12px;
}
.option .option-text{
    font-size: 15px;
    color: #333;
}
a.option-link {
    text-decoration: none;
}
label {
    float: left;
    margin: 5px;
    font-weight: 600;
    font-size: 15px;
}
.form-group {
    width: 95%;
    margin: auto;
    margin-bottom: 1rem;
}
</style>
<body>
<div class ="top-card">
        <div class="Name-card">
        Repair products
        </div>
            <div class="search">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                    </div>
            </div>
        <!-- Dropdown start -->
        <div class="select-menu">
            <div class="select-btn">
                <span class="sBtn-text">Select your option</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <ul class="options">
                <li class="option">
                    <a class="option-link" href="http://localhost/web_Trang_Suc/quantri/index.php?page=hanghoa_ds">
                        <span class="option-text">List</span>
                    </a>
                </li>
                <li class="option">
                    <a class="option-link" href="http://localhost/web_Trang_Suc/quantri/index.php?page=Theloai_them">
                        <span class="option-text">Add new</span>
                    </a>
                </li>
            </ul>
        </div>


                <script>
const optionMenu = document.querySelector(".select-menu");
const selectBtn = optionMenu.querySelector(".select-btn");
const option = optionMenu.querySelector(".options"); // Thay đổi từ querySelectorAll thành querySelector
const options = optionMenu.querySelectorAll(".option");
const sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () => {
    optionMenu.classList.toggle("active");
    option.classList.toggle("active"); // Kích hoạt lớp active cho phần tử .options
});

options.forEach(option => {
    option.addEventListener("click", (event) => {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;
        optionMenu.classList.remove("active");
        let link = option.querySelector(".option-link").getAttribute("href"); // Lấy đường dẫn từ thuộc tính href của thẻ a
        window.location.href = link; // Chuyển hướng đến đường dẫn
    });
});

</script>
    </div>
    <div class ="card">
<h4 class="col-10 m-auto p-2 text-center">Repair products</h4>
<form action="xulysuatheloai.php?idHH=<?=$idHH?>" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
    <div class="form-group">
        <label>Product name</label> 
        <input name="TenHH" type="text" value="<?=$TheLoai['TenHH']?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Price</label> 
        <input name="Gia" type="number" value="<?=$TheLoai['Gia']?>" class="form-control"/>
    </div> 
    <div class="form-group">
        <label>Quantity</label> 
        <input name="SoLuong" type="number" value="<?=$TheLoai['SoLuong']?>" class="form-control"/>
    </div> 
    <div class="form-group">
        <label>Content</label> 
        <input name="NoiDung" type="text" value="<?=$TheLoai['NoiDung']?>" class="form-control"/>
    </div> 
    <div class="form-group">
        <label for="Anh1">img 1</label>
        <input type="file" class="form-control" id="Anh1" name="Anh1">
    </div>      
    <div class="form-group">
        <label for="Anh2">img 2</label>
        <input type="file" class="form-control" id="Anh2" name="Anh2">
    </div>      
    <div class="form-group">
        <label for="Anh3">img 3</label>
        <input type="file" class="form-control" id="Anh3" name="Anh3">
    </div>      
    <div class="form-group">
        <label for="Anh4">img 4</label>
        <input type="file" class="form-control" id="Anh4" name="Anh4">
    </div>      

    <div class="form-group" style="
            display: flex;
            " >
        <label style="    min-width: 108px;">Product type: </label> 
        <div style="
                float: left;
                padding: 5px;
            ">
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==1) echo 'checked'?> value="1"/> Ring
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==2) echo 'checked'?> value="2"/> Bracelet
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==3) echo 'checked'?> value="3"/> Necklace
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==4) echo 'checked'?> value="4"/> Hairpin
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==5) echo 'checked'?> value="5"/> Anklet
            <input name="LoaiHH" type="radio" <?php if($TheLoai['LoaiHH']==6) echo 'checked'?> value="6"/> Earrings
        </div>
    </div>
    <div class="form-group" style="
            display: flex;
            " >
        <label style="    min-width: 108px;">Hide-Show: </label> 
        <div style="
                float: left;
                padding: 5px;
            ">
            <input name="AnHien" type="radio" <?php if($TheLoai['AnHien']==0) echo 'checked'?> value="0"/> Hide 
            <input name="AnHien" type="radio" <?php if($TheLoai['AnHien']==1) echo 'checked'?> value="1"/> Show
        </div>
    </div> 

    <div class="form-group" style="
            display: flex;
            " >
        <label style="    min-width: 108px;">Propose: </label> 
        <div style="
                float: left;
                padding: 5px;
            ">
            <input name="DeXuat" type="radio" <?php if($TheLoai['DeXuat']==0) echo 'checked'?> value="0"/> No 
            <input name="DeXuat" type="radio" <?php if($TheLoai['DeXuat']==1) echo 'checked'?> value="1"/> Yes
        </div>
    </div>
    <div class="form-group" style="
            display: flex;
            " >
        <label style="    min-width: 108px;">Material: </label> 
        <div style="
                float: left;
                padding: 5px;
            ">
            <input name="ChatLieu" type="radio" <?php if($TheLoai['ChatLieu']==0) echo 'checked'?> value="0"/> Sliver 
            <input name="ChatLieu" type="radio" <?php if($TheLoai['ChatLieu']==1) echo 'checked'?> value="1"/> Gold
        </div>
    </div>
    <div class="form-group" style="
            display: flex;
            " >
        <label style="    min-width: 108px;">Single/double: </label> 
        <div style="
                float: left;
                padding: 5px;
            ">
            <input name="DonDoi" type="radio" <?php if($TheLoai['DonDoi']==0) echo 'checked'?> value="0"/> Single 
            <input name="DonDoi" type="radio" <?php if($TheLoai['DonDoi']==1) echo 'checked'?> value="1"/> Double
        </div>
    </div>
    <div class="form-group">
        <input name="btn" type="submit" value="Update" class="btn btn-primary"/> 
    </div>
</form>
</div>
</body>
</html>
