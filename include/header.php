<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JULY JEWELRY</title>
    <link rel="icon" type="image/x-icon" href="./icon_wed/JULY.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/slide.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="./aos-master/dist/aos.css">
    <script src="./aos-master/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./assets/css/responsive.css">
</head>
<body class="">
    <div id="main">
        <div id="mainheader">
        
            <div id="header" class="header-zindex-2">
                <!-- begin nav -->
                <a href="./page.php?page=0">
                    <img class="img-web" src="./icon_wed/JULY.png" alt="July">
                </a>
                    <label for="menu-toggle" class="menu-icon">&#9776;</label>
               <ul id="nav">
                <li><a href="./page.php?page=0">HOME</a></li>
                <li><a href="./page.php?page=1">RINGS</a></li>
                <li><a href="./page.php?page=2">BRACELETS</a></li>
                <li><a href="./page.php?page=3">NECKLACES</a></li>
                <li><a href="./page.php?page=4">HAIRPINS</a></li>
                <li><a href="./page.php?page=5">ANKLETS</a></li>
                <li><a href="./page.php?page=6">EARRINGS</a></li>
               </ul>
               <div id="userShop" class="inlineBlock">  
                    <div class="Shopping inlineBlock" >
                        <img src="./icon_wed/giỏ hàng.svg" alt="">
                        <span class="quantity" >0</span>
                    </div>
                    <div class="user inlineBlock" onclick="redirectToLink()" style="cursor: pointer;">
                            <?php
                                session_start();

                                if (isset($_SESSION['login_id']) && isset($_SESSION['login_user'])) {
                                    echo '<a href="doipass.php">' . $_SESSION['login_user'] . '</a>';
                                } else {
                                    echo '<i class="fa-regular fa-user"><a href="./login.php"> login</a></i>';
                                }
                            ?>
                    </div>

                    <script>
                        function redirectToLink() {
                            var link = document.querySelector('.user a').getAttribute('href');
                            window.location.href = link;
                        }
                    </script>
                
                </div>
                <!-- end nav -->

                <div id="search" class="inlineBlock">
                    <div class="search-container">
                        <input id="searchInput" placeholder="...Search product..." type="search" name="s" title="Tìm kiếm" value="">
                    </div>
                </div>

                    <script>
                        document.getElementById("searchInput").addEventListener("keypress", function(event) {
                            // Kiểm tra xem phím nhấn là Enter không (mã 13)
                            if (event.key === "Enter") {
                                // Lấy giá trị từ ô input
                                var searchKeyword = this.value;
                                
                                // Tạo URL mới với các tham số
                                var url = "http://localhost/web_Trang_Suc/page.php?page=7&material=all%20materials&type=single%20and%20double&priceRange=All%20price%20ranges&searchKeyword=" + encodeURIComponent(searchKeyword) + "&sortedBuy=newest";
                                
                                // Chuyển hướng trình duyệt đến URL mới
                                window.location.href = url;
                            }
                        });
                    </script>

                
            </div>
        </div>
        
