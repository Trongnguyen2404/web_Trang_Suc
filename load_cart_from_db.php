
<?php
include 'card_connect.php';

if (isUserLoggedIn()) {
    $idUser = $_SESSION['login_id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM cart WHERE idUser = ?");
        $stmt->execute([$idUser]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cartData = [];
        foreach ($result as $row) {
            $cartData[] = [
                'id' => $row['idHH'],
                'name' => $row['TenHH'],
                'image' => $row['Anh1'],
                'price' => $row['Gia'],
                'originalPrice' => $row['Gia'],
                'quantity' => $row['SoLuong']
            ];
        }

        echo json_encode($cartData);

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
