<?php
include 'card_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idHH = $_POST['idHH'];
    $TenHH = $_POST['TenHH'];
    $SoLuong = $_POST['SoLuong'];
    $Gia = $_POST['Gia'];
    $Anh1 = $_POST['Anh1'];

    addToCart($idHH, $TenHH, $SoLuong, $Gia, $Anh1);
}
?>
