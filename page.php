<?php
$page = $_GET['page'] ?? 0; // Mặc định là trang 0 nếu không có tham số page được cung cấp

switch ($page) {
    case 0:
        include 'index.php';
        break;
    case 1:
        include 'ring.php'; // Trang cho RINGS
        break;
    case 2:
        include 'ring.php'; // Trang cho BRACELETS
        break;
    case 3:
        include 'ring.php'; // Trang cho NECKLACES
        break;
    case 4:
        include 'ring.php'; // Trang cho HAIRPINS
        break;
    case 5:
        include 'ring.php'; // Trang cho ANKLETS
        break;
    case 6:
        include 'ring.php'; // Trang cho EARRINGS
        break;
    case 7:
        include 'allproduct.php'; // Trang cho EARRINGS
        break;
    default:
        include 'error.php'; // Trang lỗi cho các giá trị khác
        break;
}
?>
