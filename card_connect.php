<?php
$host = "localhost";
$dbname = "cart";
$userdb = "root";
$passdb = "";

session_start();

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $userdb, $passdb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function addToCart($idHH, $TenHH, $SoLuong, $Gia, $Anh1) {
    global $conn;

    if (!isUserLoggedIn()) {
        return;
    }

    $idUser = $_SESSION['login_id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM cart WHERE idUser = ? AND idHH = ?");
        $stmt->execute([$idUser, $idHH]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $newQuantity = $row['SoLuong'] + $SoLuong;

            $stmt = $conn->prepare("UPDATE cart SET SoLuong = ? WHERE idUser = ? AND idHH = ?");
            $stmt->execute([$newQuantity, $idUser, $idHH]);
        } else {
            $totalPrice = $Gia; // Tính tổng giá dựa trên giá gốc và số lượng
            $stmt = $conn->prepare("INSERT INTO cart (idUser, idHH, TenHH, SoLuong, Gia, Anh1) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$idUser, $idHH, $TenHH, $SoLuong, $totalPrice, $Anh1]);
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function isUserLoggedIn() {
    return isset($_SESSION['login_id']);
}
?>
