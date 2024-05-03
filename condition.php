<?php
require "./include/header.php";
?>

<style>
  body{
    margin: 0;
    color: black  !important;
    font-family: Poppins  !important;
    font-size: 12px  !important;
    background-size: cover;
    background-position: center;
  }
  #search {
    left: 0;
    position: absolute;
    margin: 2px 0px 0px;
    right: 0;
    text-align: center;
    height: 33px;
}
.search-container {
    margin: 0 45px 0 45px;
    position: relative;
    height: 33px;
}
#search input {
    text-align: center;
    background: #00000000;
    width: 700px;
    height: 100%;
    border: none;
    outline: none;
    border-bottom: 1px solid #000000;
    padding: 7px 25px;
    font-size: 16px;
    font-weight: 300;
}
.dropdown-list-item.active,
.dropdown-list1-item.active,
.dropdown-list2-item.active {
  background-color: #e6f7ff;
  font-weight: bold;
}
:root {
  --blue: #9ab3f5;
  --purple: #9a1663;
  --white: #ffffff;
  --shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
}
#nav {
    margin: auto;
}

.product-imgs img{
    width: 100%;
    display: block;

}
#userShop .Shopping img {
    width: 30px;
    height: 30px;
    vertical-align: inherit;
    border-style: none;
}
.pay-element {
    height: 100vh;
    max-width: 1240px;
    margin: auto;
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
.listCard0 li button {
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
button.btn.btn-primary {
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
</style>
<div class="notifications">
    <!-- Notification messages will be displayed here -->
</div>
<?php 
require "./include/card.php";

if(isset($_GET['idOder'])) {
    $encryptedIdOder = $_GET['idOder']; // Nhận encryptedIdOder từ URL
    $idOder = base64_decode(urldecode($encryptedIdOder)); // Giải mã encryptedIdOder

    // Gọi hàm getOrderInfo từ condition_ds.php
    require "./condition_ds.php";
    
    $orderInfo = getOrderInfo($idOder);
    $orderProducts = getOrderProducts($idOder);
    $orderProducts = getOrderProducts($idOder);
    // Hiển thị thông tin đơn hàng
    if($orderInfo !== false) {
?>
<div class="pay-element">
    <div style="
            height: 420px;
            margin: auto;
            position: relative;
            top: 210px;
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
                        echo '<div><img src="./icon_wed/' . $product['Anh1'] . '"></div>'; // Thay $product['ImagePath'] bằng $product['Anh1']
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
            min-width: 380px;
            height: 420px;
            border: 3px ridge #cc8344;
            padding: 10px 10px;
        ">
            <!-- Hiển thị thông tin người nhận -->
            <form action="condition_ds.php" method="post">
                <div class="form-group">
                    <label>Recipient's name:</label> 
                    <input name="NameUser" type="text" class="form-control" value="<?php echo $orderInfo['Name']; ?>">
                </div>
                <div class="form-group">
                    <label>Address:</label> 
                    <input name="Address" type="text" class="form-control" value="<?php echo $orderInfo['Address']; ?>">
                </div>
                <div class="form-group">
                    <label>Email:</label> 
                    <input name="Email" type="email" class="form-control" value="<?php echo $orderInfo['Email']; ?>">
                </div>
                <div class="form-group">
                    <label>Phone Number:</label> 
                    <input name="PhoneNumber" type="tel" class="form-control" value="<?php echo $orderInfo['PhoneNumber']; ?>">
                </div>
                <div class="form-group">
                    <?php 
                    if(isset($orderInfo['TinhTrangGiaoHang'])) {
                        $deliveryStatus = getDeliveryStatus($orderInfo['TinhTrangGiaoHang']);
                        echo '<div class="delivery-status">Condition: ' . $deliveryStatus . '</div>';
                    } else {
                        echo '<div class="delivery-status">Unknown status</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                <button class="codepro-custom-btn codepro-btn-14"  name="btn" target="blank" type="submit">Update recipient information</button>
                </div>
                <input type="hidden" name="idOder" value="<?php echo $idOder; ?>">
            </form>
            
        </div>
    </div>
    <div id="error-message" style="color: red;"></div>
</div>

<?php
    } else {
        echo 'Order not found';
    }
} else {
    echo 'Error';
}
?>

</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
let notifications = document.querySelector('.notifications');
let canShowToast = true; // Variable to check if new toast can be shown
function createToast(type, icon, title, text){
    if (canShowToast) { // Check if new toast can be shown
        let newToast = document.createElement('div');
        newToast.innerHTML = `
            <div class="toast ${type}">
                <i class="${icon}"></i>
                <div class="content">
                    <div class="title">${title}</div>
                    <span>${text}</span>
                </div>
                <i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i>
            </div>`;
        notifications.appendChild(newToast);
        newToast.timeOut = setTimeout(() => {
            newToast.remove();
            canShowToast = true; // Reset variable after toast disappears
        }, 5000);
        canShowToast = false; // Set variable to prevent showing new toast
    }
}
$(document).ready(function(){
    // Sử dụng AJAX để gửi dữ liệu form khi nhấn nút "Submit"
    $('form').submit(function(event){
        // Ngăn chặn hành động mặc định của form (chuyển hướng trang)
        event.preventDefault();
        
        // Kiểm tra biến canShowToast trước khi thực hiện AJAX request
        if (canShowToast) {
            // Lấy dữ liệu từ form
            var formData = $(this).serialize();
            
            // Gửi dữ liệu form bằng AJAX
            $.ajax({
                type: 'POST',
                url: 'condition_ds.php',
                data: formData,
                success: function(response){
                    let type = 'success';
                    let icon = 'fa-solid fa-check" style="color: #63E6BE;';
                    let title = 'success';
                    let text = 'You have edited your order information.';
                    createToast(type, icon, title, text);
                    console.log(response);
                    canShowToast = false; // Đặt canShowToast thành false sau khi thành công
                },
                error: function(xhr, status, error){
                    // Xử lý lỗi (nếu có)
                    console.error(error);
                }
            });
        }
    });
});

</script>