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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/responsive.css">
</head>
<style>
  .card {
    overflow-y: scroll;
    padding: 20px 0;
    position: relative;
    margin: 100px 0 0 0;
    background: #fff;
    width: 1200px;
    margin-left: auto;
    margin-right: auto;
    max-height: 600px;
    box-shadow: 1px 1px 18px 1px #00000059;
    border: 1px solid #00000038;
    border-radius: 15px;
}
.top-card{
  width: 100%;
    height: 50px;
    position: absolute;
    border-bottom: 1px solid #614c003b;
}
.Name-card {
    font-size: 20px;
    font-weight: 600;
    float: left;
    display: inline-block;
    margin: 13px;
}
.search {
    min-width: 600px;
    display: inline-block;
    margin: 6px;
}
a{
  text-decoration: none;
  color:blue;
}
</style>
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
                        <a href="index.php?page=customer_ds">
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
                  case "customer_ds": require_once 'customer.php';break;
                  case "khachhang_ds": require_once 'khachhang_ds.php';break;
                  case "admin_ds": require_once 'admin_ds.php';break;
                  case "oder_ds": require_once 'oder.php';break;
                  case "admin_them": require_once 'admin_them.php';break;
                  case "Theloai_sua": require_once 'Theloai_sua.php';break;
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