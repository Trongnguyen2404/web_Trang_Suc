<?php
$host = "localhost";
$dbname = "hanghoa";
$userdb = "root";
$passdb = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $userdb, $passdb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function layDanhSachSanPham($keyword = "")
{
    global $conn;
    $sql = "SELECT idHH, TenHH, SoLuong, AnHien, LoaiHH, Anh FROM hanghoa";

    if ($keyword !== "") {
        $sql .= " WHERE TenHH LIKE :keyword OR LoaiHH LIKE :keyword";
    }

    $sql .= " ORDER BY SoLuong";

    $stmt = $conn->prepare($sql);

    if ($keyword !== "") {
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
