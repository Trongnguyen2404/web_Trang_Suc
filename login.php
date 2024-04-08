<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form đăng nhập</title>
<style>
    body {
        font-family: Arial, sans-serif;
        width: 100vw;
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
        top: 20%;
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
    
    <form action="xulylogin.php" method="post" id="frmlogin">
        <div class="form-group">
            <h4 class="border-bottom pb-2 text-center">LOG IN</h4>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" name="u" type="text" class="form-control">
        </div>
        <div class="form-group" style="position: relative;">
            <label for="password">Password</label>
            <input id="password" name="p" type="password" class="form-control">
        </div>
        <div class="form-group">
            <a href="dangky.php" class="text-secondary" style="
                margin: 0 0 0 4px;
            ">Register</a>
            <a href="quenpass.php" class="text-secondary text-right" style="
                position: absolute;
                right: 22px;
            ">Forgot password?</a>
        </div>
        <div class="form-group" style="margin: 0;">
            <input name="btn" type="submit" value="Log in" class="btn-primary">
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
        if (error === "ChuaNhapUsername") {
            displayErrorMessage("Vui lòng nhập tên tài khoản");
        } else if (error === "ChuaNhapPassword") {
            displayErrorMessage("Vui lòng nhập mật khẩu");
        } else if (error === "SaiMatKhau") {
            displayErrorMessage("Sai tên đăng nhập hoặc mật khẩu");
        }
    }
};


    </script>
</div>
</body>
</html>
