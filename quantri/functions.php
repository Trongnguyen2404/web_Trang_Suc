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
      $sql = "SELECT idHH, TenHH,Gia , SoLuong, AnHien, LoaiHH, Anh1, Anh2, Anh3, Anh4, NoiDung, DonDoi, ChatLieu, DeXuat FROM hanghoa ORDER BY SoLuong";
      $kq = $conn->query($sql);
      return $kq->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function themHangHoa($tenHH, $gia, $soLuong, $noiDung, $anhArray, $loaiHH, $anHien, $deXuat, $chatLieu, $donDoi)
  {
      global $conn;
      
      // Chuyển mảng $anhArray thành chuỗi để lưu vào cơ sở dữ liệu
      $anh1 = isset($anhArray[0]) ? $anhArray[0] : null;
      $anh2 = isset($anhArray[1]) ? $anhArray[1] : null;
      $anh3 = isset($anhArray[2]) ? $anhArray[2] : null;
      $anh4 = isset($anhArray[3]) ? $anhArray[3] : null;
  
      $sql = "INSERT INTO hanghoa (TenHH, Gia, SoLuong, NoiDung, Anh1, Anh2, Anh3, Anh4, LoaiHH, AnHien, DeXuat, ChatLieu, DonDoi) 
              VALUES (:tenHH, :gia, :soLuong, :noiDung, :anh1, :anh2, :anh3, :anh4, :loaiHH, :anHien, :deXuat, :chatLieu, :donDoi)";
      
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':tenHH', $tenHH);
      $stmt->bindParam(':gia', $gia);
      $stmt->bindParam(':soLuong', $soLuong);
      $stmt->bindParam(':noiDung', $noiDung);
      $stmt->bindParam(':anh1', $anh1);
      $stmt->bindParam(':anh2', $anh2);
      $stmt->bindParam(':anh3', $anh3);
      $stmt->bindParam(':anh4', $anh4);
      $stmt->bindParam(':loaiHH', $loaiHH);
      $stmt->bindParam(':anHien', $anHien);
      $stmt->bindParam(':deXuat', $deXuat);
      $stmt->bindParam(':chatLieu', $chatLieu);
      $stmt->bindParam(':donDoi', $donDoi);
  
      return $stmt->execute();
  }
  function xoaTheLoai($idHH){
    $sql = "DELETE FROM hanghoa WHERE idHH=$idHH";
    global $conn;
    $kq = $conn->exec($sql);
  }
  function layChiTietTheLoai($idHH){
    $sql="SELECT idHH, TenHH, Gia, SoLuong, AnHien, LoaiHH, Anh1, Anh2, Anh3, Anh4, NoiDung, DonDoi, ChatLieu, DeXuat FROM hanghoa WHERE idHH=:idHH ";
    
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idHH', $idHH, PDO::PARAM_INT);
    $stmt->execute();

    $kq = $stmt->fetch(PDO::FETCH_ASSOC);
    if($kq==null) return false;
    else return $kq;
}

function capnhatTheLoai($idHH, $tenHH, $gia, $soLuong, $noiDung, $anhArray, $loaiHH, $anHien, $deXuat, $chatLieu, $donDoi){
  global $conn;

  // Chuyển mảng $anhArray thành chuỗi để lưu vào cơ sở dữ liệu
  $anh1 = isset($anhArray[0]) ? $anhArray[0] : null;
  $anh2 = isset($anhArray[1]) ? $anhArray[1] : null;
  $anh3 = isset($anhArray[2]) ? $anhArray[2] : null;
  $anh4 = isset($anhArray[3]) ? $anhArray[3] : null;

  $sql = "UPDATE hanghoa SET TenHH = :tenHH, Gia = :gia, SoLuong = :soLuong, NoiDung = :noiDung, Anh1 = :anh1, Anh2 = :anh2, Anh3 = :anh3, Anh4 = :anh4, LoaiHH = :loaiHH, AnHien = :anHien, DeXuat = :deXuat, ChatLieu = :chatLieu, DonDoi = :donDoi WHERE idHH = :idHH";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':tenHH', $tenHH);
  $stmt->bindParam(':gia', $gia);
  $stmt->bindParam(':soLuong', $soLuong);
  $stmt->bindParam(':noiDung', $noiDung);
  $stmt->bindParam(':anh1', $anh1);
  $stmt->bindParam(':anh2', $anh2);
  $stmt->bindParam(':anh3', $anh3);
  $stmt->bindParam(':anh4', $anh4);
  $stmt->bindParam(':loaiHH', $loaiHH);
  $stmt->bindParam(':anHien', $anHien);
  $stmt->bindParam(':deXuat', $deXuat);
  $stmt->bindParam(':chatLieu', $chatLieu);
  $stmt->bindParam(':donDoi', $donDoi);
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
    $sql = "SELECT idHH, TenHH, Gia, SoLuong, AnHien, LoaiHH, Anh1, Anh2, Anh3, Anh4, NoiDung, DonDoi, ChatLieu, DeXuat FROM hanghoa WHERE TenHH LIKE :keyword OR LoaiHH = :loaiHH ORDER BY SoLuong";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':keyword', '%' . $keyword . '%');
    $stmt->bindValue(':loaiHH', $keyword); // Sử dụng $keyword cho cả hai tham số
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

