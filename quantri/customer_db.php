<?php
$host = "localhost";   // Địa chỉ MySQL server sẽ kết nối đến
$dbname = "product_review_db"; // Tên database sẽ kết nối đến
$userdb = "root";    // Username để kết nối đến database
$passdb = "";        // Mật khẩu để kết nối đến database

// Kết nối đến MySQL server
$conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $userdb, $passdb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Hàm lấy thông tin tất cả các hàng hóa
function layDanhSach()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM review_table");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Hàm tìm kiếm hàng hóa bằng từ khóa
function layDanhSachByKeyword($keyword)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM review_table WHERE user_name LIKE :keyword OR email LIKE :keyword OR user_review LIKE :keyword OR datetime LIKE :keyword");
    $stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>
