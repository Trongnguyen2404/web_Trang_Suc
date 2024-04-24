<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium coffee</title>
    <link rel="icon" type="image/x-icon" href="./icon wed/iconweb.png">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./hang hoa/details.html">
    <link rel="stylesheet" href="./assets/css/style1.css">
</head>
<body style="height: 100%;">
    <div class="row">
        <div class="rightcolumn">
                <div class="logo">
                    <img src="../icon_wed/JULY.png" alt="" style="
    width: 100%;
    height: 120px;">
                </div>
                <div style="width: 80%;
                margin: 0px 10%;
                border: 1px solid #ddd;"></div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                      <li class="active ">
                        <a href="index.php?page=admin_ds">
                          <p>admin list</p>
                        </a>
                      </li>
                      <li>
                        <a href="index.php?page=khachhang_ds">
                          <p>list of customers</p>
                        </a>
                      </li>
                      <li>
                        <a href="index.php?page=yeucau_ds">
                          <p>customer's request</p>
                        </a>
                      </li>
                      <li>
                        <a href="index.php?page=hanghoa_ds">
                          <p>list of products</p>
                        </a>
                      </li>
                      <li>
                        <a href="index.php?page=oder_ds">
                          <p>order status</p>
                        </a>
                      </li>
                    </ul>
                  </div>
        </div>
        <div class="leftcolumn">
          <?php
          require_once "connectdb.php";
          session_start();
          $page = isset($_GET['page']) ? trim(strip_tags($_GET['page'])) : '';
          switch($page){
              case "hanghoa_ds": require_once 'hanghoa_ds.php';break;
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
          </div>
      </div>
</body>
</html>