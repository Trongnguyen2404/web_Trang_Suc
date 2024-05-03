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

function getOrderList() {
    global $conn;
    try {
        // Truy vấn danh sách các đơn hàng từ cơ sở dữ liệu
        $stmt = $conn->prepare("SELECT * FROM productoder");
        $stmt->execute();
        $orderList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $orderList;
    } catch(PDOException $e) {
        return false;
    }
}

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

function capNhatTinhTrangGiaoHang($idOder, $TinhTrangGiaoHang)
{
    global $conn;
    try {
        // Chuẩn bị câu lệnh SQL UPDATE
        $stmt = $conn->prepare("UPDATE productoder SET TinhTrangGiaoHang = :TinhTrangGiaoHang WHERE idOder = :idOder");
        // Bind tham số
        $stmt->bindParam(':TinhTrangGiaoHang', $TinhTrangGiaoHang);
        $stmt->bindParam(':idOder', $idOder);
        // Thực thi câu lệnh SQL
        $stmt->execute();
        return true; // Trả về true nếu cập nhật thành công
    } catch(PDOException $e) {
        return false; // Trả về false nếu có lỗi xảy ra
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn'])) {
    $TinhTrangGiaoHang = $_POST['TinhTrangGiaoHang'];
    $idOder = $_POST['idOder'];
    $TinhTrangGiaoHang = (int)$TinhTrangGiaoHang;
    // Thực hiện cập nhật dữ liệu vào cơ sở dữ liệu
    $kq = capNhatTinhTrangGiaoHang($idOder, $TinhTrangGiaoHang);

    if ($kq) {
        header("location: http://localhost/web_Trang_Suc/quantri/index.php?page=oder_ds");
        exit();
    } else {
        echo "Có lỗi khi cập nhật dữ liệu vào cơ sở dữ liệu.";
    }
}

?>
