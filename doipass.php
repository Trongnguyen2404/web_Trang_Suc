<?php
if(session_id()=='') session_start();
if (isset($_SESSION['login_user'])==false) {
    header("location:login.php");
    exit();
}
$u = $_SESSION['login_user'];//username dang dang nhap
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./assets/fontawesome-free-6.2.1-web/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<title>Form đăng nhập</title>
<style>
.left {
    position: absolute;
    width: 550px;
    height: 600px;
    background: white;
    border: 2px solid;
    top: 0;
    bottom: 0;
    margin: auto;
    left: 80px;
}
.left1 {
    overflow: hidden;
    width: 100%;
    height: 100%;
    position: relative;
}
.right {
    position: absolute;
    width: 800px;
    height: 600px;
    background: white;
    top: 0;
    bottom: 0;
    margin: auto;
    right: 80px;
}
.condition {
    overflow-y: auto;
    width: 100%;
    height: 530px;
    border: 2px solid;
}
.log-out {
    width: 100%;
    height: 35px;
    border: 2px solid;
    position: absolute;
    bottom: 0;
}

.information-form {
    width: auto;
    font-size: 16px;
    font-weight: 300;
    padding-left: 37px;
    padding-right: 37px;
    transition: opacity 1.5s ease, transform 1.5s ease;
}
.change-form {
    font-size: 16px;
    font-weight: 300;
    position: relative;
    top: -500px;;
    left: 580px;
    opacity: 0;
    transition: all 1.5s ease;
}
.information-change li {
    list-style: none;
}
.information-change {
    height: 50px;
    width: auto;
    text-align: right;
    padding: 0 60px;
}
.information-change li {
    list-style: none;
    display: inline-block;
    margin: 20px 5px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    cursor: pointer;
}
.change-information-left{
    transform: translateX(-580px);
    opacity: .0;
}
.change-form-left{
    transform: translateX(-580px);
    opacity: 1;
}
.form1-left a {
    cursor: pointer;
    color: rgb(0 0 0 / 58%);
    text-decoration: none;
    transition: all 1.25s ease;

}
.form2-left a {
    cursor: pointer;
    color: rgb(0 0 0 / 58%);
    text-decoration: none;
    transition: all 1.25s ease;

}
a.f1-btn-a.active{
    border-bottom: solid 2px #1059FF;
    transition: all 1.25s ease;
    padding-bottom: 10px;
    cursor: pointer;
}
a.f2-btn-a.active{
    border-bottom: solid 2px #1059FF;
    transition: all 1.25s ease;
    padding-bottom: 10px;   
    cursor: pointer;
}
label {
    display: block;
    font-size: 17px;
    font-weight: 600;
    padding: 20px 0 10px;
}
.change-form label {
    display: block;
    font-size: 17px;
    font-weight: 600;
    padding: 10px 0 5px;
}
input {
    width: 100%;
    padding: 7px;
    font-size: 15px;
    outline: none;
    border: 1.4px solid;
}
.change-form input{
    width: 100%;
    padding: 5px;
    font-size: 13px;
    outline: none;
    border: 1.4px solid;
}
.codepro-custom-btn{
    font-size: 13px;
    width: 103%;
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
    background: #00e3ff;
    border: none;
    z-index: 1;
    margin: 20px 0;
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
.oder-list  {
    display: grid;
    grid-template-columns: 100px repeat(5, 1fr);
    border: 1px solid;
    margin: 20px;
    padding: 10px;
    font-size: 15px;
    border-radius: 50px;
    transition: all 0.3s ease-in-out 0s;
}
.oder-list:hover{
    box-shadow: rgba(0, 0, 0, 0.2) 4px 0.2rem 0.2rem 1px;
    transform: scale(1.02);
}
.magrin {
    text-align: center;
    position: relative;
    top: 0;
    bottom: 0;
    margin: auto;
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
.pad0 {
    padding: 0;
    width: auto;
    width: 100px;
    max-height: 30px;
    position: relative;
    top: 0;
    left: 0;
    margin: auto;
}
.exit{
    width: 100%;
    height: 100%;
    margin:0 ;
}
</style>
</head>
<body>
<div class="notifications">
        
        </div>
    <div style="
    ">
        <div class="left">
                <div style="
                        position: absolute;
                        top: -55px;
                        width: 290px;
                        background: white;
                        height: 110px;
                        left: -56px;
                        border: 2px solid;
                        border-radius: 15px;
                    ">
                    <img src="./icon_wed/JULY.png" alt="" style="
                        width: 100%;
                        height: 100%;
                    ">
            </div>
            <div class="left1">

                <div class="information-change">
                            <li class="form1 "><a class="f1-btn-a active">information</a></li>
                            <li class="form2 form2-left"><a class="f2-btn-a">change</a></li>
                </div>
                <?php
                        // Kết nối đến cơ sở dữ liệu
                        require_once 'connectdb.php';

                        // Lấy thông tin người dùng từ cơ sở dữ liệu
                        $u = $_SESSION['login_user']; // Lấy username từ session
                        $sql = "SELECT * FROM users WHERE username = :username";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':username', $u);
                        $stmt->execute();
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <div class="information-form">
                            <div class="form-group">
                                <h4 class="border-bottom pb-2 text-center" style="text-align: center; margin: 20px 0 15px 0; font-size: 20px;">
                                    Account information
                                </h4>
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input id="username" name="username0" type="text" class="form-control" value="<?php echo $user['username']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email0" value="<?php echo $user['email']; ?>" readonly>    
                            </div>
                            <div class="form-group">
                                <label for="SoDienThoai">Phone number:</label>
                                <input type="tel" class="form-control" id="SoDienThoai" name="SoDienThoai0" value="<?php echo $user['SoDIenTHoai']; ?>" readonly>    
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label for="password">Date created:</label>
                                <input id="password" name="date0" type="date" class="form-control" value="<?php echo $user['ngay']; ?>" readonly>
                            </div>
                            <a href="Forgotpassword.php" class="text-secondary text-right" style="float: right; position: relative; left: 16px; padding: 10px 0 0 0;">
                                Forgot password?
                            </a>
                            <button class="codepro-custom-btn codepro-btn-14" name="btn" onclick="window.location.href='page.php?page=0'" target="_blank">Go to home page</button>
                        </div>

                        <div class="information-form ng-pristine ng-valid change-form">
                        <form action="xulycapnhat.php" method="post" class="information-all">
                            <div class="form-group">
                                <h4 class="border-bottom pb-2 text-center" style="text-align: center; margin: 10px 0 0px 0; font-size: 20px;">
                                    Change the account information
                                </h4>
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input name="username" type="text" class="form-control" placeholder="<?php echo $user['username']; ?>" >
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label for="password">Old password:</label>
                                <input name="password" type="password" class="form-control" placeholder="Enter your old password">
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label for="password">Password:</label>
                                <input name="pass" type="password" class="form-control" placeholder="Enter your new password">
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label for="password">Confirm Password:</label>
                                <input name="repass" type="password" class="form-control"  placeholder="Confirm your new password">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" placeholder="<?php echo $user['email']; ?>">    
                            </div>
                            <div class="form-group">
                                <label for="SoDienThoai">Phone number:</label>
                                <input type="tel" class="form-control" name="SoDienThoai" placeholder="<?php echo $user['SoDIenTHoai']; ?>">    
                            </div>
                            <a href="Forgotpassword.php" class="text-secondary text-right" style="float: right; position: relative; left: 16px; padding: 5px 0 0 0;">
                                Forgot password?
                            </a>
                            <button type="submit" class="codepro-custom-btn codepro-btn-14" name="btn">
                                Go to home page
                            </button>
                        </form>
                    </div>
                </div>  
            </div>
        <div class="right">
            <div class="condition">
                <h4 style="
                text-align: center;
                font-size: 20px;
                border: 1px solid;
                width: 250px;
                position: relative;
                left: 0;
                right: 0;
                margin: auto;
                margin-bottom: 20px;
                margin-top: 20px;
                ">your order status</h4>
            <?php
                // Kết nối đến cơ sở dữ liệu
                require_once 'condition_ds.php';
                $idUser = $_SESSION['login_id']; // Lấy idUser từ session
                $sql = "SELECT * FROM productoder WHERE idUser = :idUser";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idUser', $idUser);
                $stmt->execute();
                $productoder = $stmt->fetch(PDO::FETCH_ASSOC);
                function displayUserOrders()
                    {
                        global $conn;
                        try {
                            // Truy vấn thông tin từ bảng productoder cho người dùng đăng nhập
                            $sql = "SELECT * FROM productoder WHERE idUser = :idUser";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':idUser', $_SESSION['login_id']);
                            $stmt->execute();
                            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $num=0;
                            $id=0;
                            // Kiểm tra xem có thông tin đơn hàng cho người dùng hiện tại không
                            if ($orders) {
                                foreach ($orders as $order) {
                                    echo "<div class='oder-list'>";
                                    // echo "<td>" . $order['idOder'] . "</td>";
                                    // echo "<td>" . $order['idHH'] . "</td>";
                                    $num+=1;
                                    $id = $order['idOder']; 
                                    $encryptedIdOder = urlencode(base64_encode($id)); 
                                    echo "<div class='oder-num magrin'>" . $num . "</div>";
                                    echo "<div class='oder-date magrin'>Date: " . $order['Date'] . "</div>";
                                    echo "<div class='oder-phone magrin'>Phone: " . $order['PhoneNumber'] . "</div>";
                                    echo "<div class='oder-price magrin'>TotalPrice: " . $order['TotalPrice'] . "</div>";
                                    echo "<div class='oder-tinhtrang magrin'>Delivery: " . getDeliveryStatus($order['TinhTrangGiaoHang']) . "</div>";
                                    echo "<button class='codepro-custom-btn codepro-btn-14 pad0' name='btn' onclick='window.location.href='condition.php?idOder=". $encryptedIdOder ."'' target='_blank'>view or edit</button>";
                                    echo "</div>";
                                }
                            } else {
                                echo "You don't have any orders yet";
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }

                    // Gọi hàm để hiển thị thông tin từ bảng productoder cho người dùng hiện đang đăng nhập
                    displayUserOrders();
                    ?>
            </div>
            <div class="log-out">       
                    <form action="xulydangxuat.php" method="post" class="col-5 m-auto bg-secondary p-2 text-white" id="logoutForm">
                        <button type="submit" class="codepro-custom-btn codepro-btn-14 exit" name="btn">
                                    log out
                        </button>
                    </form>
                </div>
        
                <script>
                    const continueButton = document.getElementById('continueButton');
                    const logoutForm = document.getElementById('logoutForm');
        
                    continueButton.addEventListener('click', function() {
                        // Khi nút "Tiếp tục" được nhấn, sử dụng form
                        logoutForm.submit();
                    });
                </script>
            </div>
        </div>

    </div>
    <script>
// Chọn các phần tử bằng cách sử dụng document.querySelector hoặc document.querySelectorAll
const form1 = document.querySelector(".form1");
const form2 = document.querySelector(".form2");
const information = document.querySelector(".information-form");
const change = document.querySelector(".change-form");
const btn2 = document.querySelector(".f2-btn-a");
const btn1 = document.querySelector(".f1-btn-a");
// Thêm sự kiện click cho form1 và form2
form2.addEventListener('click', () => {
    // Thêm lớp CSS 'change-information-left' vào information và change-form
    information.classList.add('change-information-left');
    change.classList.add('change-form-left');
    form2.classList.remove('form2-left');
    form1.classList.add('form1-left');
    btn1.classList.remove('active');
    btn2.classList.add('active');
});

form1.addEventListener('click', () => {
    // Loại bỏ lớp CSS 'change-information-left' khỏi information và change-form
    information.classList.remove('change-information-left');
    change.classList.remove('change-form-left');
    form2.classList.add('form2-left');
    form1.classList.remove('form1-left');
    btn1.classList.add('active');
    btn2.classList.remove('active');
});
let notifications = document.querySelector('.notifications');
let canShowToast = true; // Biến để kiểm tra xem có thể hiển thị thông báo mới hay không

function createToast(type, icon, title, text){
    if (canShowToast) { // Kiểm tra trạng thái hiển thị của thông báo
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
            canShowToast = true; // Thiết lập lại biến sau khi thông báo biến mất
        }, 5000);
        canShowToast = false; // Đặt biến để ngăn không hiển thị thông báo mới
    }
}
const changePasswordForm = document.querySelector(".information-all");
const oldPasswordInput = document.querySelector("input[name='password']");
const newPasswordInput = document.querySelector("input[name='pass']");
const confirmPasswordInput = document.querySelector("input[name='repass']");

const usernameInput = document.querySelector("input[name='username']"); // Sửa ở đây
const emailInput = document.querySelector("input[name='email']"); // Sửa ở đây
const SoDienThoaiInput = document.querySelector("input[name='SoDienThoai']"); // Sửa ở đây

changePasswordForm.addEventListener("submit", function(event) {
    event.preventDefault(); 
    const oldPassword = oldPasswordInput.value.trim();
    const newPassword = newPasswordInput.value.trim();
    const confirmPassword = confirmPasswordInput.value.trim();
    const username = usernameInput.value.trim();
    const email = emailInput.value.trim();
    const SoDienThoai = SoDienThoaiInput.value.trim();
    let isValid = true;
    if (!isValid) {
        return;
    }

    const formData = new FormData();
    formData.append('password', oldPassword);
    formData.append('pass', newPassword);
    formData.append('repass', confirmPassword);
    formData.append('username', username);
    formData.append('email', email);
    formData.append('SoDienThoai', SoDienThoai);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'xulycapnhat.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
            const response = xhr.responseText;
            notifications.innerHTML = response; // Hiển thị thông báo từ máy chủ
            if (!response.trim()) { // Kiểm tra nếu không có thông báo từ máy chủ
                let type = 'success';
            let icon = 'fa-solid fa-circle-check';
            let title = 'Success';
            let text = 'This is a success toast.';
            createToast(type, icon, title, text);
            oldPasswordInput.value = '';
            newPasswordInput.value = '';
            confirmPasswordInput.value = '';
            usernameInput.value = '';
            emailInput.value = '';
            SoDienThoaiInput.value = '';
            }

            setTimeout(() => {
                notifications.innerHTML = '';
            }, 5000);
        } else {
            createToast("error", "fa-solid fa-exclamation-circle", "Error", "An error occurred while changing password.");
            console.error('Error:', xhr.status);
        }
        }
    };
    xhr.send(formData);
});

</script>
</body>
</html>
