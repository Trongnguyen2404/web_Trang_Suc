<?php 
session_start();
if (isset($_POST['btn'])){
    // Tiếp nhận user và pass từ form
    $u = $_POST['u'];
    $p = $_POST['p']; 
    // Validate dữ liệu tiếp nhận
    $u = trim(strip_tags($u));
    $p = trim(strip_tags($p));
    
    // Kiểm tra xem có trường nào trống không
    if (empty($u)) {
        // Chưa nhập tên người dùng
        header("location: login.php?error=ChuaNhapUsername");
        exit();
    }

    if (empty($p)) {
        // Chưa nhập mật khẩu
        header("location: login.php?error=ChuaNhapPassword");
        exit();
    }

    // Truy vấn CSDL
    require_once "connectdb.php";
    $sql="SELECT idUser, username, idgroup FROM users WHERE username='{$u}' AND pass ='{$p}'";
    $kq = $conn->query($sql);
    
    if ($kq->rowCount()==0){
        // Sai tên đăng nhập hoặc mật khẩu
        header("location: login.php?error=SaiMatKhau");
        exit();
    }

    // Lấy thông tin người dùng
    $row_user = $kq->fetch();
    
    // Lưu thông tin người dùng vào session
    $_SESSION['login_id'] = $row_user['idUser'];
    $_SESSION['login_user'] = $row_user['username'];
    $_SESSION['login_group'] = $row_user['idgroup'];
    
    // Chuyển hướng đến trang chính sau khi đăng nhập thành công
    header("location: index.php");
}   
?>
