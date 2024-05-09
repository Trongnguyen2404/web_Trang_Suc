<?php
session_start();

$host = "localhost";
$dbname = "users";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['login_id'])) {
    exit("Bạn cần đăng nhập để truy cập trang này.");
}

// Kiểm tra phương thức của request là POST hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra các trường cần thiết có được gửi đi hay không và chúng không rỗng
    if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['repass']) && isset($_POST['email']) && isset($_POST['SoDienThoai'])) {
        // Lấy dữ liệu từ form
        $username = $_POST['username'];
        $oldpass = $_POST['password'];
        $password = $_POST['pass']; // Lưu ý: bạn nên mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $email = $_POST['email'];
        $SoDienThoai = $_POST['SoDienThoai'];

        // Kiểm tra mật khẩu cũ
        try {
            $sql = "SELECT pass FROM users WHERE idUser = :idUser";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idUser', $_SESSION['login_id']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $old_password_db = $row['pass'];

                // Kiểm tra mật khẩu cũ
                if ($oldpass !== $old_password_db) {
                    echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Mật khẩu cũ không đúng.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
                    exit();
                }
            } else {
                echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Người dùng không tồn tại.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
                exit();
            }
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }

        // Check if the username already exists in the database
        $sql_check_username = "SELECT COUNT(*) AS count FROM users WHERE username = ?";
        $stmt_check_username = $conn->prepare($sql_check_username);
        $stmt_check_username->execute([$username]);
        $result_username = $stmt_check_username->fetch(PDO::FETCH_ASSOC);

        if ($result_username['count'] > 0) {
            echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Error</div><span>The username already exists in the system.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
            exit();
        }

        // Check if the email already exists in the database
        $sql_check_email = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
        $stmt_check_email = $conn->prepare($sql_check_email);
        $stmt_check_email->execute([$email]);
        $result_email = $stmt_check_email->fetch(PDO::FETCH_ASSOC);

        if ($result_email['count'] > 0) {
            echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Error</div><span>The email address has already been used.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
            exit();
        }

        // Nếu không có lỗi, thực hiện cập nhật thông tin
        try {
            $sql = "UPDATE users SET pass = :pass, email = :email, SoDienThoai = :SoDienThoai WHERE idUser = :idUser";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pass', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':SoDienThoai', $SoDienThoai);
            $stmt->bindParam(':idUser', $_SESSION['login_id']);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
            } else {
                echo "Không thể cập nhật thông tin.";
            }
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }

        // Đóng kết nối
        $conn = null;
    } else {
        echo "Vui lòng điền đầy đủ thông tin!";
    }
} else {
    echo "Đã xảy ra lỗi.";
}
?>
