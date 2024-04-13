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
</head>
<body>
    <div id="main">
        <div id="mainheader">
            <div id="header" class="header-zindex-2">
                <!-- begin nav -->
                <img src="./icon_wed/JULY.png" alt="" style="
                        position: absolute;
                        width: 180px;
                        height: 90px;
                        filter: drop-shadow(2px 1px 2px black);
                    ">
               <ul id="nav">
                <li><a href="./index.php">HOME</a></li>
                <li><a href="./ring.php">RINGS</a></li>
                <li><a href="./Lienhe.html">BRACELETS</a></li>
                <li><a href="./doitra.html">NECKLACES</a></li>
                <li><a href="./doitra.html">HAIRPINS</a></li>
                <li><a href="./doitra.html">ANKLETS</a></li>
                <li><a href="#product">EARRINGS</a></li>
               </ul>
               <div id="userShop" class="inlineBlock">  
                <div class="Shopping inlineBlock" >
                    <img src="./icon_wed/giỏ hàng.png" alt="">
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
                        <input placeholder="...Search product..." type="search" name="s" title="Tìm kiếm" value="">
                    </div>
                </div>
            </div>
        </div>