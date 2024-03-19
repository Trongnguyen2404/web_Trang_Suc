<?php 
session_start();
if (isset($_POST['btn'])){
    //tiếp nhận user, pass từ form
    $u = $_POST['u'];
    $p = $_POST['p']; 
    //validate dữ liệu tiếp nhận
    $u = trim(strip_tags($u));
    $p = trim(strip_tags($p));
    //truy xuất db
    require_once "connectdb.php";
    $sql="SELECT idgroup,username,idUser FROM users WHERE username='{$u}'";
    $kq = $conn->query($sql);
    $loi = "";
    if ($kq->rowCount()==0){
        $_SESSION['thongbao']="Username không tồn tại";
        $loi .="Username không tồn tại<br>";
        if ($loi != "") {
            ?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <div class="col-8 m-auto">
                <div class="alert alert-danger mt-5 text-center ">
                    <?=$loi?> 
                    <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
                </div>
            </div>
            <?php
        }
        
        exit();
    }
    $sql="SELECT idgroup, username,idUser FROM users WHERE username='{$u}' AND pass ='{$p}'";
    $kq = $conn->query($sql);
    if ($kq->rowCount()==0){
        $_SESSION['thongbao']="Sai mật khẩu";
        $loi .="Sai mật khẩu<br>";
        if ($loi != "") {
            ?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <div class="col-8 m-auto">
                <div class="alert alert-danger mt-5 text-center ">
                    <?=$loi?> 
                    <button class="btn btn-primary" onclick="history.back()">Trở lại</button>
                </div>
            </div>
            <?php
        }
        
        exit();
    }
    $row_user = $kq->fetch();
    $_SESSION['login_id'] = $row_user['idUser'];//tạo biến ghi nhận user đã login
     $_SESSION['login_user'] = $row_user['username'];//tạo biến ghi nhận user đã login
     $_SESSION['login_group'] = $row_user['idgroup'];//tạo biến ghi nhận user là admin
     header("location: index.php");
}   

?>