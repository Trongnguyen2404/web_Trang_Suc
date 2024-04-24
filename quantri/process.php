<?php
require_once("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn'])) {
    $TenHH = $_POST['TenHH'];
    $Gia = $_POST['Gia'];
    $SoLuong = $_POST['SoLuong'];
    $NoiDung = $_POST['NoiDung'];
    $LoaiHH = $_POST['LoaiHH'];
    $AnHien = $_POST['AnHien'];
    $DeXuat = $_POST['DeXuat'];
    $ChatLieu = $_POST['ChatLieu'];
    $DonDoi = $_POST['DonDoi'];
    
    $tenHH = trim(strip_tags($TenHH));
    $gia = (int)$Gia;
    $soLuong = (int)$SoLuong;
    $noiDung = trim(strip_tags($NoiDung)); // Chuyển kiểu dữ liệu và xóa các tag HTML
    $loaiHH = (int)$LoaiHH;
    $anHien = (int)$AnHien;
    $deXuat = (int)$DeXuat;
    $chatLieu = (int)$ChatLieu;
    $donDoi = (int)$DonDoi;

    // Upload multiple images
    $target_dir = "./icon/";
    $uploaded_images = [];

    foreach (['Anh1', 'Anh2', 'Anh3', 'Anh4'] as $fieldName) {
        $target_file = $target_dir . basename($_FILES[$fieldName]["name"]);
        if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $target_file)) {
            $uploaded_images[] = htmlspecialchars(basename($_FILES[$fieldName]["name"]));
        }
    }

    // Thực hiện thêm dữ liệu vào cơ sở dữ liệu
    $kq = themHangHoa($tenHH, $gia, $soLuong, $noiDung, $uploaded_images, $loaiHH, $anHien, $deXuat, $chatLieu, $donDoi);

    if ($kq) {
        header("location: index.php?page=hanghoa_ds");
        exit();
    } else {
        echo "Có lỗi khi thêm dữ liệu vào cơ sở dữ liệu.";
    }
}
?>
