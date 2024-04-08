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
<title>Form đăng nhập</title>
<style>
    body {
        font-family: Arial, sans-serif;
        width: 100%;
        height: 100vh;
        margin: 0;
        background-repeat: no-repeat !important;
        background-attachment: fixed !important;
        background-position: center !important;
        background-size: cover;
        -webkit-background-size: cover !important;
        background: url('./icon_wed/b2.jpg');
    }
    .container {
        position: absolute;
        left: 0;
        top: 10%;
        right: 0;
        margin: 0 auto;
        width: 100%;
        max-width: 600px;
        padding: 30px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
    }
    .form-group {
        margin: 0 17px 20px 0;
    }
    .form-group a {
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -o-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -ms-transition: 0.5s all;
        text-decoration: none;
    }
    .form-group a:hover {
        color: #537b35;
    }
    .form-group input {
        outline: none;
        background: #00000000;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-control {
        width: 100%;
        color: white;
        padding: 12px;
        border: 2px solid #537b35;
        border-radius: 4px;
        font-size: 14px;
    }
    .btn-primary {
        display: inline-block;
        padding: 13px 30px;
        background-color: #537b35 !important;
        border: none;
        border-radius: 4px;
        color: #fff;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        width: 610px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .text-center {
        text-align: center;
    }
    .text-right {
        text-align: right;
    }
    .text-secondary {
        color: #ffffff;
    }
    .container .icon_wed :hover {
        box-shadow: rgba(0, 0, 0, 0.2) 0px 0.2rem 1.2rem 0px;
        transform: scale(1.02);
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">
    <div class="icon_wed">
        <img src="./icon_wed/JULY.png" alt="" style="
        position: absolute;
        width: 190px;
        top: 5px;
        left: -3px;
        height: 67px;
        background: #f7f7f7f5;
    ">
    </div>
    <div class="col-5 m-auto bg-secondary p-2 text-white">
            <div class="form-group" >
                <h4 class="border-bottom pb-2" style="text-align: center;">Đăng xuất</h4>
            </div>

            <form action="xulydangxuat.php" method="post" class="col-5 m-auto bg-secondary p-2 text-white" id="logoutForm">
                <!-- Các trường và nút submit trong form -->
                <input name="btn" type="submit" value="Tiếp tục" class="btn btn-primary" style="
    width: 100%;
"> 
            </form>
            <div class="form-group" style="
    margin: 0;
">
                <button class="btn btn-primary" onclick="history.back()" style="
    width: 100%;
    bottom: 50px;
">Trở lại</button>
            </div>
        </div>

        <script>
            const continueButton = document.getElementById('continueButton');
            const logoutForm = document.getElementById('logoutForm');

            continueButton.addEventListener('click', function() {
                // Khi nút "Tiếp tục" được nhấn, sử dụng form
                logoutForm.submit();
            });
        </script>
    <form action="xulydoipass.php" method="post" id="frmlogin" class="col-5 m-auto bg-secondary p-2 text-white">
        <div class="form-group">
        <h4 class="border-bottom pb-2"  style="text-align: center;">ĐỔI MẬT KHẨU</h4>
        </div>
        <div class="form-group">
            <label>Username</label> <input name="u" type="text" class="form-control" disabled value="<?=$u;?>" />
        </div>
        <div class="form-group">
            <label>Mật khẩu cũ</label> <input name="pass_old" type="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Mật khẩu mới</label> <input name="pass_new1" type="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu mới</label> <input name="pass_new2" type="password" class="form-control"/>
        </div>
        <div class="form-group">
            <a href="dangky.php" class="text-secondary" style="
                margin: 0 0 0 4px;
            "></a>
            <a href="quenpass.php" class="text-secondary text-right" style="
                position: absolute;
                right: 22px;
            ">Quên mật khẩu?</a>
        </div>
        <div class="form-group">
            <input name="btn" type="submit" value="Cập nhật" class="btn btn-primary"/> 
        </div>
    </form>

    <div id="error-message" style="color: red;"></div>

    <script>
// Hàm hiển thị thông báo lỗi
function displayErrorMessage(message) {
    document.getElementById('error-message').innerHTML = message;
}

// Kiểm tra query string và hiển thị thông báo lỗi
window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    var error = urlParams.get('error');

    // Kiểm tra nếu có lỗi
    if (error) {
        if (error === "MatKhauNgan") {
            displayErrorMessage("Mật khẩu phải dày hơn 5 ký tự");
        } else if (error === "HaiMatKhauKhongGiong") {
            displayErrorMessage("Hai mật khẩu phải giống nhau");
        }  else if (error === "SaiMatKhauCu") {
            displayErrorMessage("Mật khẩu cũ không đúng");
        } 
    }
};
    </script>
</div>
</body>
</html>
