<?php
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

function getOrderInfo($idOder) {
    global $conn;
    try {
        // Truy vấn thông tin đơn hàng từ cơ sở dữ liệu
        $stmt = $conn->prepare("SELECT * FROM productoder WHERE idOder = :idOder");
        $stmt->bindParam(':idOder', $idOder);
        $stmt->execute();
        $orderInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        return $orderInfo;
    } catch(PDOException $e) {
        return false;
    }
}
// Truy vấn thông tin đơn hàng từ cơ sở dữ liệu

// Hiển thị thông tin hàng hóa
// if($orderProducts !== false) {
//     foreach ($orderProducts as $product) {
//         // Hiển thị thông tin sản phẩm, ví dụ:
//         echo 'Product ID: ' . $product['idHH'] . ', Quantity: ' . $product['soluong'] . '<br>';
//     }
// } else {
//     echo 'Order not found';
// }
function getOrderProducts($idOder) {
    global $conn;
    try {
        // Truy vấn thông tin đơn hàng từ cơ sở dữ liệu
        $stmt = $conn->prepare("SELECT * FROM productoder WHERE idOder = :idOder");
        $stmt->bindParam(':idOder', $idOder);
        $stmt->execute();
        $orderInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra xem có thông tin đơn hàng không
        if ($orderInfo) {
            // Lấy danh sách idhh và soluong từ cơ sở dữ liệu
            $idHHArray = explode(' ', $orderInfo['idHH']);
            $soluongArray = explode(' ', $orderInfo['soluong']);

            // Tạo mảng kết quả
            $result = array();

            // Lặp qua từng idhh và soluong, và lấy thông tin từ bảng hanghoa
            for ($i = 0; $i < count($idHHArray); $i++) {
                $idHH = $idHHArray[$i];
                $soluong = $soluongArray[$i];

                // Truy vấn thông tin hàng hóa từ bảng hanghoa
                $stmt = $conn->prepare("SELECT * FROM hanghoa WHERE idHH = :idHH");
                $stmt->bindParam(':idHH', $idHH);
                $stmt->execute();
                $productInfo = $stmt->fetch(PDO::FETCH_ASSOC);

                // Thêm thông tin vào mảng kết quả
                if ($productInfo) {
                    $productInfo['soluong'] = $soluong;
                    $result[] = $productInfo;
                }
            }

            return $result;
        } else {
            return false; // Đơn hàng không tồn tại
        }
    } catch(PDOException $e) {
        return false; // Lỗi truy vấn
    }
}


// Hiển thị thông tin hàng hóa
function getDeliveryStatus($status) {
    switch ($status) {
        case 0:
            return "product is being prepared";
            break;
        case 1:
            return "The product is being delivered to you";
            break;
        case 2:
            return "Successful delivery";
            break;
        default:
            return "Unknown status";
            break;
    }
}
function updateRecipientInfo($idOder, $name, $address, $email, $phoneNumber) {
    global $conn;
    try {
        // Thực hiện câu lệnh SQL UPDATE để cập nhật thông tin người nhận
        $stmt = $conn->prepare("UPDATE productoder SET Name = :name, Address = :address, Email = :email, PhoneNumber = :phoneNumber WHERE idOder = :idOder");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':idOder', $idOder);
        $stmt->execute();
    } catch(PDOException $e) {
        return false;
    }
}

// Xử lý dữ liệu từ form nếu form đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idOder = $_POST['idOder'] ?? '';
    $name = $_POST['NameUser'] ?? '';
    $address = $_POST['Address'] ?? '';
    $email = $_POST['Email'] ?? '';
    $phoneNumber = $_POST['PhoneNumber'] ?? '';

    // Gọi hàm cập nhật thông tin người nhận
    updateRecipientInfo($idOder, $name, $address, $email, $phoneNumber);
}
?>