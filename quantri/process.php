<?php
require_once("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn'])) {
    $TenHH = $_POST['TenHH'];
    $SoLuong = $_POST['SoLuong'];
    $AnHien = $_POST['AnHien'];
    $LoaiHH = $_POST['LoaiHH'];
    $Anh = $_FILES['Anh']['name']; // Tên tệp tin được tải lên

    $tenHH = trim(strip_tags($TenHH));
    $SoLuong = (int)$SoLuong;
    $AnHien = (int)$AnHien;
    $LoaiHH = (int)$LoaiHH;

    $target_dir = "./icon/"; // Đường dẫn tương đối đúng tới thư mục "icon web"
    $target_file = $target_dir . basename($_FILES["Anh"]["name"]);

    // Di chuyển tệp tải lên vào thư mục được chỉ định
    if (move_uploaded_file($_FILES["Anh"]["tmp_name"], $target_file)) {
        echo "Tệp " . htmlspecialchars(basename($_FILES["Anh"]["name"])) . " đã được tải lên thành công.";

        // Thực hiện thêm dữ liệu vào cơ sở dữ liệu
        $kq = themTheLoai($tenHH, $SoLuong, $AnHien, $LoaiHH, $Anh);

        if ($kq) {
            header("location: index.php?page=theloai_ds");
            exit();
        } else {
            echo "Có lỗi khi thêm dữ liệu vào cơ sở dữ liệu.";
        }
    } else {
        echo "Có lỗi khi tải lên tệp.";
    }
}
?>
