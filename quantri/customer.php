<?php
require_once "customer_db.php";

// Kiểm tra xem có từ khóa tìm kiếm được gửi từ URL hay không
if(isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $list = layDanhSachByKeyword($keyword); // Gọi hàm tìm kiếm với từ khóa
} else {
    $list = layDanhSach(); // Nếu không có từ khóa, hiển thị tất cả hàng hóa
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
<title>DANH SÁCH KHÁCH HÀNG</title>
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
</style>
<body>
<div class ="top-card">
        <div class="Name-card">
        Customer requirements
        </div>
            <div class="search">
                <form method="GET" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                    </div>
                </form>
            </div>
        <!-- Dropdown start -->
        <div class="select-menu">
            <div class="select-btn">
                <span class="sBtn-text">There are no options </span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
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
<div class="container">
    <table class="table table-bordered">
        <tr class="table tablebordered">
        <th>user_name</th>
        <th>email</th>
        <th>user_review</th>
        <th>datetime</th>
        <th>Action</th>
        </tr>
        <?php foreach ($list as $row ) { ?>
        <tr>
            <td> <?=$row['user_name']?> </td>
            <td> <?=$row['email']?> </td>
            <td> <?=($row['user_review'])?> </td>
            <td> <?=$row['datetime']?> </td>
            <td>
                <a href="customer_xoa.php?id_review=<?=$row['id_review']?>">Del</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div> 
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const keyword = searchInput.value.trim();
            const currentURL = window.location.href.split('?')[0]; // Lấy đường dẫn hiện tại trước dấu ?

            if (keyword !== '') {
                window.location.href = `${currentURL}?page=customer_ds&search=${keyword}`;
            } else {
                window.location.href = `${currentURL}?page=customer_ds`;
            }
        });
    });
</script>
</body>
</html>
