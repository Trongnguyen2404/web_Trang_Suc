<?php
include 'card_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idHH = $_POST['idHH'];

    try {
        $stmt = $conn->prepare("DELETE FROM cart WHERE idHH = ?");
        $stmt->execute([$idHH]);
        echo "Product removed from database.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
