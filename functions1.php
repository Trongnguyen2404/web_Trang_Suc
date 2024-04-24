<?php
$host = "localhost";
$dbname = "hanghoa";
$userdb = "root";
$passdb = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $userdb, $passdb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$material = $_GET['material'] ?? "all materials";
$type = $_GET['type'] ?? "single and double";
$priceRange = $_GET['priceRange'] ?? "All price ranges";
$searchKeyword = $_GET['searchKeyword'] ?? "";
$sortedBuy = $_GET['sortedBuy'] ?? "newest";
function updateRatingAndReview($idHH) {
    global $conn;

    // Tính toán average_rating và total_review từ các đánh giá
    $sql = "SELECT AVG(user_rating) as average_rating, COUNT(*) as total_review FROM review_table WHERE idHH = :idHH";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idHH', $idHH, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cập nhật vào bảng hanghoa
    $sqlUpdate = "UPDATE hanghoa SET average_rating = :average_rating, total_review = :total_review WHERE idHH = :idHH";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':average_rating', $result['average_rating'], PDO::PARAM_STR);
    $stmtUpdate->bindParam(':total_review', $result['total_review'], PDO::PARAM_INT);
    $stmtUpdate->bindParam(':idHH', $idHH, PDO::PARAM_INT);
    $stmtUpdate->execute();
}
?>

