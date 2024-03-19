  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản trị website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        header.row { height: 90px; }
        div.noidung > aside, div.noidung > main { min-height: 500px; }
    </style>
</head>
<body>
    <div class="container">
        <header class="row bg-info" style="display:block;"><h2 style="text-align: center; padding: 2% 0;">Xin chào admin</h2> </header>
        <div class="row noidung">
            <aside class="col-2 bg-dark text-white" style="padding: 0 0">
                <ul class="list-group" style="padding: 5px 5px 5px 5px; width: 100%; height: 100%;">
                    <li class="list-group-item"><a href="index.php?page=theloai_ds">Danh sách hàng hóa.</a></li>
                    <li class="list-group-item"><a href="index.php?page=Theloai_them">Thêm hàng hóa.</a></li>
                    <li class="list-group-item"><a href="index.php?page=khachhang_ds">Danh sách khách hàng.</a></li>
                    <li class="list-group-item"><a href="index.php?page=admin_ds">Danh sách admin.</a></li>
                    <li class="list-group-item"><a href="index.php?page=admin_them">Thêm admin.</a></li>
                </ul>

            </aside>
            <main class="col-10 border"> 
            <?php
                require_once "connectdb.php";
                session_start();
                $page = isset($_GET['page']) ? trim(strip_tags($_GET['page'])) : '';
                switch($page){
                    case "theloai_ds": require_once 'Theloai_ds.php';break;
                    case "Theloai_them": require_once 'Theloai_them.php';break;
                    case "theloai_sua": require_once 'Theloai_sua.php';break;
                    case "khachhang_ds": require_once 'khachhang_ds.php';break;
                    case "admin_ds": require_once 'admin_ds.php';break;
                    case "admin_them": require_once 'admin_them.php';break;
                }
                if (isset($_SESSION['login_id'])==false){
                    $_SESSION['thongbao']="Bạn chưa đăng nhập";
                    header("Location: login.php");
                    exit();
                }
                if ($_SESSION['login_group']!=0){
                    $_SESSION['thongbao']="Bạn không phải là admin";
                    header("Location: login.php");
                    exit();
                }
                ?>
            </main>
        </div>
    </div>
</body>
</html>
