<?php
include 'card_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idHH = $_POST['idHH'];
    $TenHH = $_POST['TenHH'];
    $SoLuong = $_POST['SoLuong'];
    $Gia = $_POST['Gia'];
    $Anh1 = $_POST['Anh1'];

    try {
        $stmt = $conn->prepare("UPDATE cart SET TenHH = ?, SoLuong = ?, Gia = ?, Anh1 = ? WHERE idHH = ?");
        $stmt->execute([$TenHH, $SoLuong, $Gia, $Anh1, $idHH]);
        echo "Product updated in database.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
