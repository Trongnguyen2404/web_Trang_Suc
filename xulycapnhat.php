<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['login_id'])) {
    exit("Bạn cần đăng nhập để truy cập trang này.");
}

// Kiểm tra xem phương thức của request là POST hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường cần thiết có được gửi đi hay không và chúng không rỗng
    if (!empty($_POST['username']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['SoDienThoai'])) {
        // Lấy dữ liệu từ form
        $username = $_POST['username'];
        $oldpass=$_POST['password'];
        $password = $_POST['pass']; // Lưu ý: bạn nên mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $email = $_POST['email'];
        $SoDienThoai = $_POST['SoDienThoai'];

        // Kiểm tra chiều dài tên người dùng
        if (strlen($username) < 5 || strlen($username) > 13) {
            echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Tên người dùng phải từ 5 đến 13 ký tự.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
            exit();
        }

        // Kiểm tra mật khẩu cũ
        // Thực hiện truy vấn để lấy mật khẩu của người dùng từ cơ sở dữ liệu, sau đó so sánh với mật khẩu cũ được gửi đi
        try {
            $host = "localhost";
            $dbname = "users";
            $password_db = "";
            $username_db = "root";

            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username_db, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

        // Kiểm tra sự giống nhau của hai mật khẩu mới
        if ($_POST['pass'] !== $_POST['repass']) {
            echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Hai mật khẩu mới không giống nhau.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
            exit();
        }

        // Kiểm tra mật khẩu mới
        if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/', $password)) {
            echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Mật khẩu mới phải có ít nhất 1 chữ số, 1 chữ hoa, 1 ký tự đặc biệt, 1 chữ thường và ít nhất 8 ký tự.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
            exit();
        }

        // Kiểm tra độ dài số điện thoại
        if (strlen($SoDienThoai) !== 10) {
            echo '<div class="toast error"><i class="fa-solid fa-exclamation-circle"></i><div class="content"><div class="title">Lỗi</div><span>Số điện thoại phải có độ dài 10 ký tự.</span></div><i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i></div>';
            exit();
        }

        // Nếu không có lỗi, thực hiện cập nhật thông tin
        try {
            // Kết nối đến cơ sở dữ liệu
            $host = "localhost";
            $dbname = "users";
            $password_db = "";
            $username_db = "root";

            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username_db, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Chuẩn bị và thực thi truy vấn
            $sql = "UPDATE users SET username = :username, pass = :pass, email = :email, SoDienThoai = :SoDienThoai WHERE idUser = :idUser";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':pass', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':SoDienThoai', $SoDienThoai);
            $stmt->bindParam(':idUser', $_SESSION['login_id']); // Thay đổi thành $_SESSION['login_id']

            $stmt->execute();

            // Kiểm tra xem dữ liệu có được cập nhật thành công hay không
            if ($stmt->rowCount() > 0) {
            } else {
                echo "Không thể cập nhật thông tin.";
            }
        } catch(PDOException $e) {
            // Xử lý lỗi kết nối hoặc truy vấn
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
