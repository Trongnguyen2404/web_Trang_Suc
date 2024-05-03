<?php
require_once "customer_db.php";

// Kiểm tra xem có id_review được gửi từ URL không
if(isset($_GET['id_review'])) {
    $id_review = $_GET['id_review'];
    
    try {
        // Xóa đánh giá dựa trên id_review
        $query = "DELETE FROM review_table WHERE id_review = :id_review";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id_review', $id_review, PDO::PARAM_INT);
        $statement->execute();

        // Điều hướng người dùng trở lại trang danh sách khách hàng
        header("Location: http://localhost/web_Trang_Suc/quantri/index.php?page=customer_ds");
        exit();
    } catch(PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "Không có id_review được chỉ định để xóa.";
}
?>
