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
function getRecommendedProductsByPage1($page) {
    global $conn;

    $sql = "SELECT idHH, TenHH, LoaiHH, Gia, Anh1 FROM hanghoa WHERE AnHien = 1 AND LoaiHH = :page ORDER BY SoLuong";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':page', $page, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRecommendedProductsByPage($page) {
    global $conn;
    $sql = "SELECT idHH, TenHH, LoaiHH, Gia, Anh1 FROM hanghoa WHERE AnHien = 1 AND DeXuat = 1 AND LoaiHH = :page ORDER BY SoLuong";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':page', $page, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function filterProducts($material, $type, $priceRange, $page) {
    global $conn;
    
    $searchKeyword = isset($_GET['searchKeyword']) ? $_GET['searchKeyword'] : "";
    $sortedBuy = $_GET['sortedBuy'] ?? "newest";  // Giá trị mặc định là "newest"

    $sql = "SELECT idHH, TenHH, LoaiHH, Gia, Anh1 FROM hanghoa WHERE AnHien = 1 AND LoaiHH = :page";
    $params = [];

    if ($material != "all materials") {
        $sql .= " AND ChatLieu = :material";
        $params[':material'] = $material == "made from silver" ? 0 : 1;
    }

    if ($type != "single and double") {
        $sql .= " AND DonDoi = :type";
        $params[':type'] = $type == "single" ? 0 : 1;
    }

    if ($priceRange != "All price ranges") {
        if ($priceRange == "under 500") {
            $sql .= " AND Gia < 500";
        } elseif ($priceRange == "500 - 1,500") {
            $sql .= " AND Gia BETWEEN 500 AND 1500";
        } else {
            $sql .= " AND Gia > 1500";
        }
    }

    if (!empty($searchKeyword)) {
        $sql .= " AND (TenHH LIKE :keyword OR LoaiHH LIKE :keyword)";
        $params[':keyword'] = '%' . $searchKeyword . '%';
    }

    switch (strtolower($sortedBuy)) {
        case "buy name": // Thêm sắp xếp theo tên sản phẩm
            $sql .= " ORDER BY TenHH ASC";
            break;
        case "number of purchases": // Thêm sắp xếp theo tên sản phẩm
            $sql .= " ORDER BY total_purchases DESC";
            break;
        case "number of reviews":
            $sql .= " ORDER BY total_review DESC";
            break;
        case "number of stars":
            $sql .= " ORDER BY average_rating DESC";
            break;
        case "low to high price":
            $sql .= " ORDER BY Gia ASC";
            break;
        case "high to low price":
            $sql .= " ORDER BY Gia DESC";
            break;
        case "newest":
            $sql .= " ORDER BY idHH DESC"; // Sắp xếp theo idHH từ cao xuống thấp (mới nhất)
            break;
        case "latest":
            $sql .= " ORDER BY idHH ASC"; // Sắp xếp theo idHH từ thấp lên cao (củ nhất)
            break;
        default:
            echo "Invalid sortedBuy value";
            break;
    }
    

    $stmt = $conn->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->bindParam(':page', $page, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function filterProducts1($material, $type, $priceRange, $page) {
    global $conn;
    
    $searchKeyword = isset($_GET['searchKeyword']) ? $_GET['searchKeyword'] : "";
    $sortedBuy = $_GET['sortedBuy'] ?? "newest";  // Giá trị mặc định là "newest"

    $sql = "SELECT idHH, TenHH, LoaiHH, Gia, Anh1 FROM hanghoa WHERE AnHien = 1"; // Loại bỏ điều kiện LoaiHH
    $params = [];

    if ($material != "all materials") {
        $sql .= " AND ChatLieu = :material";
        $params[':material'] = $material == "made from silver" ? 0 : 1;
    }

    if ($type != "single and double") {
        $sql .= " AND DonDoi = :type";
        $params[':type'] = $type == "single" ? 0 : 1;
    }

    if ($priceRange != "All price ranges") {
        if ($priceRange == "under 500") {
            $sql .= " AND Gia < 500";
        } elseif ($priceRange == "500 - 1,500") {
            $sql .= " AND Gia BETWEEN 500 AND 1500";
        } else {
            $sql .= " AND Gia > 1500";
        }
    }

    if (!empty($searchKeyword)) {
        $sql .= " AND (TenHH LIKE :keyword OR LoaiHH LIKE :keyword)";
        $params[':keyword'] = '%' . $searchKeyword . '%';
    }

    switch (strtolower($sortedBuy)) {
        case "buy name": // Thêm sắp xếp theo tên sản phẩm
            $sql .= " ORDER BY TenHH ASC";
            break;
        case "number of purchases": // Thêm sắp xếp theo tên sản phẩm
            $sql .= " ORDER BY total_purchases DESC";
            break;
        case "number of reviews":
            $sql .= " ORDER BY total_review DESC";
            break;
        case "number of stars":
            $sql .= " ORDER BY average_rating DESC";
            break;
        case "low to high price":
            $sql .= " ORDER BY Gia ASC";
            break;
        case "high to low price":
            $sql .= " ORDER BY Gia DESC";
            break;
        case "newest":
            $sql .= " ORDER BY idHH DESC"; // Sắp xếp theo idHH từ cao xuống thấp (mới nhất)
            break;
        case "latest":
            $sql .= " ORDER BY idHH ASC"; // Sắp xếp theo idHH từ thấp lên cao (củ nhất)
            break;
        default:
            echo "Invalid sortedBuy value";
            break;
    }
    

    $stmt = $conn->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    // Chỉ bind tham số page nếu page khác 7
    if ($page != 7) {
        $stmt->bindParam(':page', $page, PDO::PARAM_INT);
    }
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getProductById($idHH) {
    global $conn;
    $sql = "SELECT idHH, TenHH, Gia, LoaiHH, Anh1, Anh2, Anh3, Anh4, NoiDung, DonDoi, ChatLieu, DeXuat FROM hanghoa WHERE idHH = :idHH";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idHH', $idHH, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTypeName($LoaiHH) {
    $types = [
        1 => "Rings",
        2 => "Bracelets",
        3 => "Necklaces",
        4 => "Hairpins",
        5 => "Anklets",
        6 => "Earrings"
    ];
    return $types[$LoaiHH] ?? "";
}

function getMaterialName($ChatLieu) {
    return $ChatLieu == 0 ? "Silver" : "Gold";
}

function getDoubleType($DonDoi) {
    return $DonDoi == 0 ? "Single" : "Double";
}

$filteredProducts = filterProducts($material, $type, $priceRange, $page, $sortedBuy);
?>

