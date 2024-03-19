<?php
  $host = "localhost";   //địa chỉ mysql server sẽ kết nối đến
  $dbname = "hanghoa"; //tên database sẽ kết nối đến
  $userdb = "root";    //username để kết nối đến database
  $passdb = "";        // mật khẩu để kết nối đến database
  $conn=new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $userdb, $passdb);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  function layDanhSachLoaiHang()
  {
    global $conn;
    $sql = "SELECT idHH, TenHH, SoLuong, AnHien, LoaiHH,Anh FROM hanghoa ORDER BY SoLuong";
    $kq = $conn->query($sql);
    return $kq->fetchAll(PDO::FETCH_ASSOC);
  }
  function themTheLoai($tenHH, $SoLuong, $AnHien, $LoaiHH, $Anh)
  {
      global $conn;
      $sql = "INSERT INTO hanghoa (TenHH, SoLuong, AnHien, LoaiHH, Anh) VALUES (:tenHH, :SoLuong, :AnHien, :LoaiHH, :Anh)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':tenHH', $tenHH);
      $stmt->bindParam(':SoLuong', $SoLuong);
      $stmt->bindParam(':AnHien', $AnHien);
      $stmt->bindParam(':LoaiHH', $LoaiHH);
      $stmt->bindParam(':Anh', $Anh);
      return $stmt->execute();
  }
  function xoaTheLoai($idHH){
    $sql = "DELETE FROM hanghoa WHERE idHH=$idHH";
    global $conn;
    $kq = $conn->exec($sql);
  }
  function layChiTietTheLoai($idHH){
    $sql="SELECT idHH, TenHH, SoLuong, AnHien, LoaiHH,Anh FROM hanghoa WHERE idHH=$idHH ";
    global $conn;
    $kq = $conn->query($sql);
    if($kq==null) return false;
    else return $kq->fetch();
}
function capnhatTheLoai($idHH, $tenHH, $SoLuong, $AnHien, $LoaiHH, $Anh){
  global $conn;
  $sql = "UPDATE hanghoa SET TenHH = :tenHH, SoLuong = :SoLuong, AnHien = :AnHien, LoaiHH = :LoaiHH, Anh = :Anh WHERE idHH = :idHH";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':tenHH', $tenHH);
  $stmt->bindParam(':SoLuong', $SoLuong);
  $stmt->bindParam(':AnHien', $AnHien);
  $stmt->bindParam(':LoaiHH', $LoaiHH);
  $stmt->bindParam(':Anh', $Anh);
  $stmt->bindParam(':idHH', $idHH);
  return $stmt->execute();
}
if(isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $listTheLoai = layDanhSachLoaiHangByKeyword($keyword); // Gọi hàm tìm kiếm với từ khóa
} else {
    $listTheLoai = layDanhSachLoaiHang(); // Nếu không có từ khóa, hiển thị tất cả hàng hóa
}

function layDanhSachLoaiHangByKeyword($keyword)
{
    global $conn;
    $sql = "SELECT idHH, TenHH, SoLuong, AnHien, LoaiHH, Anh FROM hanghoa WHERE TenHH LIKE :keyword OR LoaiHH LIKE :keyword ORDER BY SoLuong";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

