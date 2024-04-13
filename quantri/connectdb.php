<?php
try {
    $host = "localhost";
    $dbname = "users";
    $password = "";
    $username = "root";
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Lỗi: " . $e->getMessage());
}
function layDanhSachKhachHang()
{
    global $conn;
    $sql = "SELECT idUser, pass, idgroup, username, email, ngay, SoDienThoai
            FROM users 
            WHERE idgroup = 1
            ORDER BY ngay";
    $kq = $conn->query($sql);
    return $kq->fetchAll(PDO::FETCH_ASSOC);
}
function layDanhSachadmin()
{
    global $conn;
    $sql = "SELECT idUser, pass, idgroup, username, email, ngay, SoDienThoai
            FROM users 
            WHERE idgroup = 0
            ORDER BY ngay";
    $kq = $conn->query($sql);
    return $kq->fetchAll(PDO::FETCH_ASSOC);
}
function xoaKhachHang($idUser){
    $sql = "DELETE FROM users WHERE idUser=$idUser";
    global $conn;
    $kq = $conn->exec($sql);
  }
  if(isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $listKhachHang = layDanhSachKhachhangByKeyword($keyword); // Gọi hàm tìm kiếm với từ khóa
} else {
    $listKhachHang = layDanhSachKhachHang(); // Nếu không có từ khóa, hiển thị tất cả hàng hóa
}
function layDanhSachKhachhangByKeyword($keyword)
{
    global $conn;
    $sql = "SELECT idUser, pass, idgroup, username, email, ngay, SoDienThoai 
            FROM users 
            WHERE username LIKE :keyword AND idgroup = 1
            ORDER BY ngay";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//admin
if(isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $listadmin = layDanhSachadminByKeyword($keyword); // Gọi hàm tìm kiếm với từ khóa
} else {
    $listadmin = layDanhSachadmin(); // Nếu không có từ khóa, hiển thị tất cả hàng hóa
}
function layDanhSachadminByKeyword($keyword)
{
    global $conn;
    $sql = "SELECT idUser, pass, idgroup, username, email, ngay, SoDienThoai
            FROM users 
            WHERE username LIKE :keyword AND idgroup = 0
            ORDER BY ngay";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>