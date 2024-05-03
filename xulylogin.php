<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem dữ liệu đã được gửi từ form chưa
    if (isset($_POST['u']) && isset($_POST['p'])) {
        // Tiếp nhận user và pass từ form
        $u = $_POST['u'];
        $p = $_POST['p']; 
        // Validate dữ liệu tiếp nhận
        $u = trim(strip_tags($u));
        $p = trim(strip_tags($p));
        // Truy vấn CSDL

        require_once "connectdb.php";
        $sql="SELECT idUser, username, idgroup FROM users WHERE username='{$u}' AND pass ='{$p}'";
        $kq = $conn->query($sql);

        if ($kq->rowCount()==0){
            // Sai tên đăng nhập hoặc mật khẩu
            echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Sai tên đăng nhập hoặc mật khẩu.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
            exit();
        }

        // Lấy thông tin người dùng
        $row_user = $kq->fetch();
        
        // Lưu thông tin người dùng vào session
        $_SESSION['login_id'] = $row_user['idUser'];
        $_SESSION['login_user'] = $row_user['username'];
        $_SESSION['login_group'] = $row_user['idgroup'];
        
    }
}
?>
