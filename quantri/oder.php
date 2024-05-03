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
.pay-element {
    max-width: 800px;
    position: relative;
}
ul.listCard0 {
    /* margin: 50px 0 0 0; */
    max-width: 800px;
    max-height: 300px;
    overflow-y: scroll;
    display: inline-block;
}
.listCard0 li {
    display: grid;
    grid-template-columns: 100px repeat(4, 1fr);
    color: #000;
    row-gap: 10px;
    margin: 10px 0;
    border: 1px solid #281f1b2b;
    max-width: 800px;
    min-width: 750px;
}
.listCard0 li div {
    display: flex;
    justify-content: center;
    align-items: center;
}
.listCard0 li img {
    width: 90%;
}
.listCard0 li input {
    background-color: #fff5;
    border: none;
    width: 16px;
    height: 16px;
    text-align: center;
}
.listCard0 .count {
    margin: 0 10px;
}
.total0 {
    display: inline-block;
    color: red;
}
input.form-control {
    width: 100%;
    font-size: 15px;
    padding: 7px;
    outline: none;
}
.form-group {
    margin-bottom: 20px;
}
label {
    font-size: 13px;
}
input.btn.btn-primary {
    display: inline-block;
    padding: 13px 30px;
    background-color: #00abd5 !important;
    border: none;
    border-radius: 4px;
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}
.notifications {
	position: fixed;
	top: 30px;
	right: 20px;
    z-index: 50;
}
.toast{
    position: relative;
    padding: 10px;
    margin-bottom: 10px;
    color: #fff;
    width: 400px;
    display: grid;
    grid-template-columns: 70px 1fr 70px;
    border-radius: 5px;
    --color: #0abf30;
    background-image: linear-gradient(to right, #0abf3055, #22242F 30%);
    animation: show_toast 0.3s ease forwards;
}
.toast i{
    color: var(--color);
}
.toast .title{
    font-size: x-large;
    font-weight: bold;
}
.toast i{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: x-large;
}
.toast span,
.toast .close{
    opacity: 0.6;
    color: #fff
}
.name li {
    display: grid;
    grid-template-columns: 100px repeat(4, 1fr);
    color: #000;
    row-gap: 10px;
    margin: 10px 0px;
    max-width: 800px;
    min-width: 750px;
    padding: 0 16px 0 5px;
}
.name li div {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 13px;
    font-weight: 600;
}
@keyframes show_toast {
	0% {
		transform: translateX(100%);
	}
	40% {
		transform: translateX(-5%);
	}
	80% {
		transform: translateX(0%);
	}
	100% {
		transform: translateX(-10%);
	}
}
.toast::before{
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: var(--color);
    box-shadow: 0 0 10px var(--color);
    content: '';
    width: 100%;
    height: 3px;
    animation: timeOut 5s linear 1 forwards;
}
@keyframes timeOut{
    to{
        width: 0%;  
    }
}
/* error */
.toast.error{
   --color: #f24d4c;
   background-image: linear-gradient(to right, #f24d4c55, #22242F 30%);
}
.totalPrice {
    display: inline-block;
    color: red;
}
.codepro-custom-btn{
    font-size: 13px;
    width: 100%;
    height: 40px;
    color: #1e1919;
    border-radius: 5px;
    padding: 10px 25px;
    font-family: 'Lato', sans-serif;
    font-weight: 600;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    box-shadow: inset 2px 2px 2px 0 rgba(255,255,255,.5), 7px 7px 20px 0 rgba(0,0,0,.1), 4px 4px 5px 0 rgba(0,0,0,.1);
    outline: none;
}
.codepro-btn-14{
    background:#00e3ff;
    border:none;z-index:1
    }
.codepro-btn-14:after{
    position:absolute;
    content:"";
    width:100%;
    height:0;
    top:0;
    left:0;
    z-index:-1;
    border-radius:5px;
    background-color:#00e3ff;
    background-image:linear-gradient(315deg,#00e3ff 0%,#defbff 74%);
    box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5);7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);transition:all 0.3s ease
}
.codepro-btn-14:hover{
    color:#000
}
.codepro-btn-14:hover:after{
    top:auto;bottom:0;height:100%
}
.codepro-btn-14:active
{
    top:2px
}
.notifications {
	position: fixed;
	top: 30px;
	right: 20px;
    z-index: 50;
}
.toast{
    position: relative;
    padding: 10px;
    margin-bottom: 10px;
    color: #fff;
    width: 400px;
    display: grid;
    grid-template-columns: 70px 1fr 70px;
    border-radius: 5px;
    --color: #0abf30;
    background-image: linear-gradient(to right, #0abf3055, #22242F 30%);
    animation: show_toast 0.3s ease forwards;
}
.toast i{
    color: var(--color);
}
.toast .title{
    font-size: x-large;
    font-weight: bold;
}
.toast i{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: x-large;
}
.toast span,
.toast .close{
    opacity: 0.6;
    color: #fff
}
.card {
    overflow-y: hidden;
    padding: 20px 0;
    position: relative;
    margin: 100px 0 0 0;
    background: #fff;
    width: 1200px;
    margin-left: auto;
    margin-right: auto;
    max-height: 700px;
    box-shadow: 1px 1px 18px 1px #00000059;
    border: 1px solid #00000038;
    border-radius: 15px;
    min-height: 500px;
}
.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px 0;
    position: relative;
    background: #fff0;
}
.leftcolumn {
    float: right;
    width: 84%;
    height: auto;
    background-color: #f9f9f9;
    position: relative;
}
.custom-select-menu{
    width: 100%;
    display: inline-block;
}
.custom-select-menu .custom-select-btn {
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
.custom-select-menu.active .custom-select-btn i{
    transform: rotate(-180deg);
}
.custom-select-menu .custom-options {
    position: absolute;
    margin-top: 10px;
    border-radius: 8px;
    background: #f6f6f6;
    box-shadow: 0 0 3px rgba(0,0,0,0.1);
    z-index: 50;
    width: 100%;
    height: 0px; /* Đặt chiều cao ban đầu là 0 */
    overflow: hidden; /* Ẩn nội dung khi không active */
    text-align: center;
    transition: height 0.4s ease; /* Thay đổi transition time thành 0.4s */
}
.custom-select-menu .custom-options.active {
    display: block;
    height: 100px;
}
.custom-options .custom-option {
    display: flex;
    height: 15px;
    cursor: pointer;
    margin: 15px 0;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    transition: margin 1s ease;
}
.custom-options .custom-option:hover{
    margin: 15px;
}
.custom-option i{
    font-size: 15px;
    margin-right: 12px;
}
.custom-option .custom-option-text{
    font-size: 15px;
    color: #333;
}
a.custom-option-link {
    text-decoration: none;
}
.TinhTrangGiaoHang {
    width: 100%;
    display: flex;
}
</style>
<body>
<div class ="top-card">
        <div class="Name-card">
        Delivery list
        </div>
            <div class="search">
                <form method="GET" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Nhập tên admin">
                    </div>
                </form>
            </div>
        <!-- Dropdown start -->
        <div class="select-menu">
            <div class="select-btn">
                <span class="sBtn-text">There are no options</span>
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

<div class="container">
<div class="notifications">
    <!-- Notification messages will be displayed here -->
</div>
<?php
// Gọi hàm getOrderList từ condition_ds.php
require "./oder_ds.php";

// Lấy danh sách tất cả các đơn hàng
$orderList = getOrderList();

// Hiển thị danh sách đơn hàng
if($orderList !== false) {
    foreach ($orderList as $orderInfo) {
        // Lấy thông tin của từng đơn hàng
        $idOder = $orderInfo['idOder'];
        $orderProducts = getOrderProducts($idOder);
?>
<div class ="card">
<div class="pay-element">
    <div style="
            height: 470px;
            margin: auto;
            position: relative;
            display: inline-block;
            border-bottom: 3px ridge #cc8344;
            border-top: 3px ridge #cc8344;
            border-left: 3px ridge #cc8344;
        ">
        <div style="
            display: inline-block;
        ">
                    <ul class="name">
                    <li>
                        <div>Image product</div>
                        <div>Product's name</div>
                        <div>Cost</div>
                        <div>Quantity</div>
                        <div>Total price</div>
                    </li>
                </ul>
            <ul class="listCard0">
                <?php 
                if($orderProducts !== false) {
                    foreach ($orderProducts as $product) {
                        echo '<li data-idhh="' . $product['idHH'] . '">';
                        echo '<div><img src="../icon_wed/' . $product['Anh1'] . '"></div>'; // Thay $product['ImagePath'] bằng $product['Anh1']
                        echo '<div>' . $product['TenHH'] . '</div>'; // Thay $product['ProductName'] bằng $product['tenHH']
                        echo '<div>' . $product['Gia'] . '</div>'; // Thay $product['Price'] bằng $product['gia']
                        echo '<div>';
                        echo '<div class="count">' . $product['soluong'] . '</div>';
                        echo '</div>';
                        echo '<div>' . ($product['soluong'] * $product['Gia']) . '</div>';
                        echo '</li>';
                    }
                } else {
                    echo 'Order not found';
                }
                ?>
            </ul>
            <div style="
                margin: 20px;
                font-size: 15px;
            ">
                Total cost of all product: <div style="
                    display: inline-block;
                    color: red;
                ">$</div><div class="total0"><?php echo $orderInfo['TotalPrice']; ?></div>
            </div>
        </div>
        <div style="
            display: inline-block;
            position: absolute;
            top: -3px;
            max-width: 400px;
            min-width: 390px;
            height: 470px;
            border: 3px ridge #cc8344;
            padding: 10px 10px;
        ">
            <!-- Hiển thị thông tin người nhận -->
            <form action="oder_ds.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Recipient's name:</label> 
                    <input name="NameUser" type="text" class="form-control" value="<?php echo $orderInfo['Name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Address:</label> 
                    <input name="Address" type="text" class="form-control" value="<?php echo $orderInfo['Address']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Email:</label> 
                    <input name="Email" type="email" class="form-control" value="<?php echo $orderInfo['Email']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Phone Number:</label> 
                    <input name="PhoneNumber" type="tel" class="form-control" value="<?php echo $orderInfo['PhoneNumber']; ?>" readonly>
                </div>
                <div class="form-group" >
                    <div>
                    <label >Delivery status: </label> 
                    </div>
                <div class="TinhTrangGiaoHang"><input name="TinhTrangGiaoHang" type="radio" <?php if($orderInfo['TinhTrangGiaoHang']==0) echo 'checked'?> value="0"/>product is being prepared </div>
                <div class="TinhTrangGiaoHang"><input name="TinhTrangGiaoHang" type="radio" <?php if($orderInfo['TinhTrangGiaoHang']==1) echo 'checked'?> value="1"/>The product is being delivered to you</div>
                <div class="TinhTrangGiaoHang"><input name="TinhTrangGiaoHang" type="radio" <?php if($orderInfo['TinhTrangGiaoHang']==2) echo 'checked'?> value="2"/>Successful delivery</div> 
            </div>
                <div class="form-group">
                    <input class="codepro-custom-btn codepro-btn-14"  name="btn" target="blank" type="submit" value="Update recipient information"/> 
                </div>
                
                <input type="hidden" name="idOder" value="<?php echo $idOder; ?>">
            </form>

            
        </div>
    </div>
    <div id="error-message" style="color: red;"></div>
    </div>
</div>

<?php
    }
} else {
    echo 'Error';
}
?>


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
                window.location.href = `${currentURL}?page=oder_ds&search=${keyword}`;
            } else {
                window.location.href = `${currentURL}?page=oder_ds`;
            }
        });
    });
</script>
</body>
</html>