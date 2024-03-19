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
$phai = $_POST['phai'];
$sothich = $_POST['sothich'];

$u = trim(strip_tags($u));
$pass = trim(strip_tags($pass));
$repass = trim(strip_tags($repass));
$email = trim(strip_tags($email));
$phai = (int)$phai;
$sothich = (int)$sothich;

$loi = "";
if (strlen($SoDienThoai) != 10 || !is_numeric($SoDienThoai)) {
    $loi .= "Số điện thoại không hợp lệ<br>";
}
if ($sothich != 1 && $sothich != 0 && $sothich != 2) {
    $loi .= "Chọn sở thích đi nha bạn<br>";
}
if ($phai != 0 && $phai != 1) {
    $loi .= "Chọn phái đi nha bạn<br>";
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    $loi .= "Email không đúng<br>";
}
if ($pass != $repass) {
    $loi .= "Hai mật khẩu không giống nhau<br>";
}

if ($loi != "") {
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="col-8 m-auto">
        <div class="alert alert-danger mt-5 text-center ">
            <?=$loi?> 
            <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
        </div>
    </div>
    <?php
} else {
    // Kiểm tra tên đăng ký đã tồn tại hay chưa
    $sql_check_username = "SELECT COUNT(*) AS count FROM users WHERE username = ?";
    $stmt_check_username = $conn->prepare($sql_check_username);
    $stmt_check_username->execute([$u]);
    $result = $stmt_check_username->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        echo "Tên đăng ký đã tồn tại, vui lòng chọn tên khác.";
    } else {
        // Thêm người dùng mới vào cơ sở dữ liệu
        $sql = "INSERT INTO users(username, pass, email, SoDienThoai, phai, sothich, ngay, idgroup) VALUES (?, ?, ?, ?, ?, ?, Now(), 0)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$u, $pass, $email, $SoDienThoai, $phai, $sothich]);

        if ($stmt->rowCount() == 1) {
            header("location: http://localhost/TheCoffee/quantri/index.php?page=admin_ds");
            //gửi mail
        } else {
            echo "Cập nhật không thành công";
        }
    }
}
?>
