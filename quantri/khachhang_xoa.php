<?php
    require_once 'connectdb.php';
    $idUser = $_GET['idUser'];
    settype($idUser, "int");
    xoaKhachHang($idUser);
    header("location:index.php?page=khachhang_ds"); //chuyển về trang danh sách record
?>
