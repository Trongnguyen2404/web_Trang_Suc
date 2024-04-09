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
        background-attachment: fixed !important ;
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
    .form-group a{
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -o-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -ms-transition: 0.5s all;
        text-decoration: none;
    }
    .form-group a:hover{
        color: #537b35;
    }
    .form-group input{
        outline: none;
        background: #00000000;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-control {
        width: 98%;
        color: white;
        padding: 12px;
        border: 2px solid #537b35;
        border-radius: 4px;
        font-size: 14px;
    }
    .btn-primary {
        position: absolute;
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
        width: 30%;
        margin: 0 22px 0 30px;
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
    .container .icon_wed :hover{
        box-shadow: rgba(0, 0, 0, 0.2) 0px 0.2rem 1.2rem 0px;
        transform: scale(1.02);
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">
    <div class="icon_wed">
        <img src="./icon_wed/July1.png" alt="" style="
position: absolute;
    width: 130px;
    top: 1px;
    height: 80px;
    left: 1px;
    ">
    </div>
    
    <form action="xulydangky.php" method="post" onsubmit="return validateForm()">
        <div class="form-group" style="
    margin: 0 0 0 0;
">>
            <h4 class="border-bottom pb-2 text-center">sign up</h4>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" class="form-control">
        </div>
        <div class="form-group" style="position: relative;">
            <label for="password">Password</label>
            <input id="password" name="pass" type="password" class="form-control">
            
        </div>
        <div class="form-group">
            <label for="repass">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="repass" name="repass">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">    
        </div>
        <div class="form-group">
            <label for="SoDienThoai">Số điện thoại</label>
            <input type="tel" class="form-control" id="SoDienThoai" name="SoDienThoai">    
        </div>
        <div class="form-group" style="margin: 0 0 20px 0;width: 100%;height: 50px;">
            <input type="submit" class="btn btn-primary " value="Đăng ký" style="left: 0;"> 
            <input type="reset" class="btn btn-primary " value="Làm lại" style="right: 0;">
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
        if (error === "Saisodienthoai") {
            displayErrorMessage("Số điện thoại không hợp lệ");
        } else if (error === "EmailKhongdung") {
            displayErrorMessage("Email không đúng");
        } else if (error === "MatKhauQuaNgan") {
            displayErrorMessage("Mật khẩu phải dày hơn 5 ký tự");
        } else if (error === "HaiMatKhauKhongGiongNhau") {
            displayErrorMessage("Hai mật khẩu không giống nhau");
        } else if (error === "TenKhongDuDay") {
            displayErrorMessage("Tên đăng nhập phải có độ dài từ 5 đến 16 ký tự");
        } else if (error === "DoDaySoDienThaoi") {
            displayErrorMessage("Số điện thoại Phai La 10 chữ số");
        } else if (error === "DaTonTaiTen") {
           displayErrorMessage("Tên đăng ký đã tồn tại, vui lòng chọn tên khác.");
        } else if (error === "DaTonTaiEmail") {
            displayErrorMessage("Email đã được đăng ký, vui lòng sử dụng email khác.");
        }
    }
};
    </script>
</div>
</body>
</html>
