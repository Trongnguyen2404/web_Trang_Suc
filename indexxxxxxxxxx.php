<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web mẫu</title>
    <link rel="icon" type="image/x-icon" href="./icon wed/iconweb.png">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./hang hoa/details.html">
    <style>
        .menu a {
            text-decoration: none;
            color: black;
            font-size: 17px;
            width: 130px;
            float: left;
            text-align: center;
            margin: 0px;
            padding: 7px 0px 7px 0px;
        }
        .box-san-pham {
            width: 21%;
            background: #fff;
            float: left;
            margin: 7px 7px;
            text-align: center;
            padding: 5px 5px;
        }
        .box-san-pham img{
            width: 100%;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="banner" style="margin: 0 0 -3px 0;">
            <object width="1000" height="200" data="icon wed/coffee cans.png" type=""></object>
        </div>
        <div class="menu">
            <a href="#">Trang chủ</a> 
            <a href="#">Giới thiệu</a> 
            <a href="#">Dịch vụ</a>
            <a href="#">Sản phẩm</a>
            <a href="#">Liên hệ</a> 
            <?php
                session_start();

                if (isset($_SESSION['login_id']) && isset($_SESSION['login_user'])) {
                    // Nếu đã đăng nhập, điều hướng đến trang đăng xuất khi nhấp vào tên người dùng
                    echo '<a href="dangxuat.php" style="float: right;">' . $_SESSION['login_user'] . '</a>';
                    echo '<a href="doipass.php"> Đổi mật khẩu </a>';
                } else {
                    // Nếu chưa đăng nhập, điều hướng đến trang đăng nhập khi nhấp vào "Đăng nhap"
                    echo '<a href="login.php" style="float: right;">Đăng Nhập</a>';
                }
            ?>
                
        </div>
        <div class="clear"></div>
        <div class="trai">
            <h3>Danh mục sản phẩm</h3>
            <ul>
                <li>
                    <a href="#">Cà phê pha phin</a>
                    <ul>
                        <li><a href="#">Cà phê rang xay</a></li>
                        <li><a href="#">Cà phê hạt</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">cà phê hòa tan</a>
                    <ul>
                        <li><a href="#">Cà phê sữa</a></li>
                        <li><a href="#">Cà phê đen</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="phai">
            <div class="slide"> <img src="icon wed/hoa tan.png" width="100%"></div>
            <div class="sanpham">
                <h1>sản phẩm nổi bật</h1>
                <?php
                // Include the database connection file and functions
                include 'functions.php';

                // Fetch products from the database
                $products = layDanhSachSanPham();

                // Display products dynamically
                foreach ($products as $product) {
                    echo '<div class="box-san-pham">';
                    echo '<img src="./quantri/icon/'. $product['Anh'] . '">';
                    echo '<p class="ten-san-pham" style="margin: 3px;">' . $product['TenHH'] . '</p>';
                    ?>
                    <p class="gia" style="margin: 3px;">120.000 đ</p> 
                    
                    <p style="margin: 0;"><img style="height:100%; width: 70%;" src="icon wed/pngtree-5-star-review-five-vector-png-image_5560551.png"></p> 
                    <p style="margin: 0; CURSOR: POINTER;"><img style="height:100%;" src="data:image/png;base64,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" ></p>
                    <?php
                    // Add other product details as needed
                    echo '</div>';
                }
                ?>
            </div><!-- het san pham -->
        </div> <!-- phai -->
        <div class="clear"></div>
        <div class="footer">
        </div>
    </div>
</body>
</html>