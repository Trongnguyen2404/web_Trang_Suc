<?php
$host = "localhost";
$dbname = "users";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

$u = $_POST['username'];
$SoDienThoai = $_POST['SoDienThoai'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$email = $_POST['email'];

$u = trim(strip_tags($u));
$pass = trim(strip_tags($pass));
$repass = trim(strip_tags($repass));
$email = trim(strip_tags($email));

// Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu chưa
$sql_check_username = "SELECT COUNT(*) AS count FROM users WHERE username = ?";
$stmt_check_username = $conn->prepare($sql_check_username);
$stmt_check_username->execute([$u]);
$result_username = $stmt_check_username->fetch(PDO::FETCH_ASSOC);

if ($result_username['count'] > 0) {
    echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Tên người dùng đã tồn tại trong hệ thống.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
    exit();
}

// Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
$sql_check_email = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
$stmt_check_email = $conn->prepare($sql_check_email);
$stmt_check_email->execute([$email]);
$result_email = $stmt_check_email->fetch(PDO::FETCH_ASSOC);

if ($result_email['count'] > 0) {
    echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Địa chỉ email đã được sử dụng.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
    exit();
}

// Tiến hành đăng ký nếu không có lỗi
$sql = "INSERT INTO users(username, pass, email, SoDienThoai, ngay) VALUES (?, ?, ?, ?, Now())";
$stmt = $conn->prepare($sql);
$stmt->execute([$u, $pass, $email, $SoDienThoai]);

if ($stmt->rowCount() == 1) {
    echo '<div class="toast success"><i class="fa-solid fa-check-circle"></i><div class="content"><div class="title">Thành công</div><span>Đăng ký thành công hãy chuyển qua form login và đăng nhập.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
    //gửi mail
} else {
    echo "Cập nhật không thành công";
}
?>
