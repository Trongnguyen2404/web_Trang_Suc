<?php
try {
    $connect = new PDO("mysql:host=localhost;dbname=hanghoa", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Thiết lập PDO để ném ra ngoại lệ
} catch(PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
    exit();
}

if(isset($_POST["rating_data"]) && isset($_POST["idHH"])){
    try {
        session_start();
        $idHH = $_POST["idHH"];
        $idUser = $_SESSION['login_id'];

        if(empty($idHH) || empty($idUser)){
            echo "Please select a product to review or log in.";
            exit();
        }

        // Kiểm tra xem idUser đã đánh giá cho idHH chưa
        $checkQuery = "SELECT * FROM review_table WHERE idHH = :idHH AND idUser = :idUser";
        $checkStmt = $connect->prepare($checkQuery);
        $checkStmt->bindParam(':idHH', $idHH, PDO::PARAM_INT);
        $checkStmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $checkStmt->execute();

        if($checkStmt->rowCount() > 0){
            echo "You have already rated this product.";
            exit();
        }

        $data = array(
            ':user_name'    =>  $_SESSION['login_user'],
            ':user_rating'  =>  $_POST["rating_data"],
            ':user_review'  =>  $_POST["user_review"],
            ':datetime'     =>  time(),
            ':idHH'         =>  $idHH,
            ':idUser'       =>  $idUser
        );

        $query = "
        INSERT INTO review_table 
        (user_name, user_rating, user_review, datetime, idHH, idUser) 
        VALUES (:user_name, :user_rating, :user_review, :datetime, :idHH, :idUser)
        ";

        $statement = $connect->prepare($query);
        $statement->execute($data);
        require "./functions1.php";
        updateRatingAndReview($idHH);
        echo "Your review and rating have been submitted successfully";
    } catch(PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

if(isset($_POST["action"])){
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();

    $idHH = $_POST['idHH']; // Lấy idHH từ POST data

    $query = "
    SELECT * FROM review_table 
    WHERE idHH = ?  
    ORDER BY review_id DESC
    ";

    if($stmt = $connect->prepare($query)){
        $stmt->bindParam(1, $idHH, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $review_content[] = array(
                'user_name' =>  $row["user_name"],
                'user_review' =>  $row["user_review"],
                'rating' =>  $row["user_rating"],
                'datetime' =>  date('l jS, F Y h:i:s A', $row["datetime"])
            );

            switch($row["user_rating"]){
                case '5': $five_star_review++; break;
                case '4': $four_star_review++; break;
                case '3': $three_star_review++; break;
                case '2': $two_star_review++; break;
                case '1': $one_star_review++; break;
            }

            $total_review++;
            $total_user_rating += $row["user_rating"];
        }

        if($total_review > 0){
            $average_rating = $total_user_rating / $total_review;
        }

        $output = array(
            'average_rating' => number_format($average_rating, 1),
            'total_review' => $total_review,
            'five_star_review' => $five_star_review,
            'four_star_review' => $four_star_review,
            'three_star_review' => $three_star_review,
            'two_star_review' => $two_star_review,
            'one_star_review' => $one_star_review,
            'review_data' => $review_content
        );

        echo json_encode($output);
    } else {
        echo json_encode(['error' => 'Lỗi thực thi truy vấn']);
    }
}
?>
