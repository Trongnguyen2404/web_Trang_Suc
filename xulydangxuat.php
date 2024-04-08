<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['login_id']) && isset($_SESSION['login_user'])) {
    // Xóa hoặc unset các biến phiên đăng nhập
    unset($_SESSION['login_id']);
    unset($_SESSION['login_user']);

    // Hủy toàn bộ phiên
    session_destroy();

    // Chuyển hướng người dùng đến trang đăng nhập
    header("location: index.php");
    exit(); // Đảm bảo không có mã PHP thực thi tiếp sau khi chuyển hướng
} else {
     header("location: index.php");
}
?>
