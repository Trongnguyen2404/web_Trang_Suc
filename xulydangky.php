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

$loi = "";
if (strlen($u) < 5 || strlen($u) > 16) {
    header("location: dangky.php?error=TenKhongDuDay");
    exit();
}
if ($pass <5) {
    header("location: dangky.php?error=MatKhauQuaNgan");
    exit();
}
if ($pass != $repass) {
    header("location: dangky.php?error=HaiMatKhauKhongGiongNhau");
    exit();
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    header("location: dangky.php?error=EmailKhongdung");
    exit();
}
if (strlen($SoDienThoai) > 10  ) {
    header("location: dangky.php?error=DoDaySoDienThaoi");
    exit();
}
if (strlen($SoDienThoai) != 10 || !is_numeric($SoDienThoai)) {
    header("location: dangky.php?error=Saisodienthoai");
    exit();
}
else {
    $sql_check_username = "SELECT COUNT(*) AS count FROM users WHERE username = ?";
    $stmt_check_username = $conn->prepare($sql_check_username);
    $stmt_check_username->execute([$u]);
    $result_username = $stmt_check_username->fetch(PDO::FETCH_ASSOC);

    if ($result_username['count'] > 0) {
        header("location: dangky.php?error=DaTonTaiTen");
        exit();
    }

    $sql_check_email = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
    $stmt_check_email = $conn->prepare($sql_check_email);
    $stmt_check_email->execute([$email]);
    $result_email = $stmt_check_email->fetch(PDO::FETCH_ASSOC);

    if ($result_email['count'] > 0) {
        header("location: dangky.php?error=DaTonTaiEmail");
        exit();
    }
    else {
        $sql = "INSERT INTO users(username, pass, email, SoDienThoai, ngay) VALUES (?, ?, ?, ?, Now())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$u, $pass, $email, $SoDienThoai]);

        if ($stmt->rowCount() == 1) {
            header("location: login.php");
            //gửi mail
        } else {
            echo "Cập nhật không thành công";
        }
    }
}
?>
