<?php
session_start();

// Kết nối đến cơ sở dữ liệu
try {
    $host = "localhost";
    $dbname = "hanghoa";
    $userdb = "root";
    $passdb = "";
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $userdb, $passdb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Lỗi: " . $e->getMessage());
}

// Lấy thông tin sản phẩm từ form
$idHHList = $_POST['idHHList'] ?? '';
$quantityList = $_POST['quantityList'] ?? '';
$totalPrice = $_POST['totalPrice'] ?? '';
$name = $_POST['NameUser'] ?? '';
$address = $_POST['Address'] ?? '';
$email = $_POST['Email'] ?? '';
$phoneNumber = $_POST['PhoneNumber'] ?? '';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(isset($_SESSION['login_id'])) {
    $idUser = $_SESSION['login_id'];
} else {
    $idUser = 0; // Nếu chưa đăng nhập, gán idUser bằng 0
}
$idHHArray = explode(",", $idHHList);
$idHHString = implode(" ", $idHHArray);
$SoLuongArray = explode(",", $quantityList);
$SoLuongString = implode(" ", $SoLuongArray);
// Lưu thông tin vào bảng productoder
try {
    $stmt = $conn->prepare("INSERT INTO productoder (idHH, soluong, TotalPrice, Name, Address, Email, PhoneNumber, TinhTrangGiaoHang, idUser) VALUES (:idHH, :soluong, :totalPrice, :name, :address, :email, :phoneNumber, 0, :idUser)");
    $stmt->bindParam(':idHH', $idHHString);
    $stmt->bindParam(':soluong', $SoLuongString);
    $stmt->bindParam(':totalPrice', $totalPrice);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phoneNumber', $phoneNumber);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->execute();

    // Lấy idOder mới nhất và trả về là phản hồi
    $lastInsertedId = $conn->lastInsertId();
    echo $lastInsertedId;

    // Cập nhật cột total_purchases trong bảng hanghoa
    // Lặp qua từng idhh và tăng giá trị của cột total_purchases lên 1
    for ($i = 0; $i < count($idHHArray); $i++) {
        $idHH = $idHHArray[$i];
        
        // Truy vấn để cập nhật total_purchases
        $stmt = $conn->prepare("UPDATE hanghoa SET total_purchases = total_purchases + 1 WHERE idHH = :idHH");
        $stmt->bindParam(':idHH', $idHH);
        $stmt->execute();
    }
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
