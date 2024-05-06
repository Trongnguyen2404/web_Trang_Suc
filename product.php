<?php
require "./functions_product.php";
require "./include/header.php";
$idHH = $_GET['idHH'] ?? ""; // Lấy idHH từ URL, nếu không có thì mặc định là chuỗi rỗng

// Sử dụng idHH để lấy thông tin sản phẩm
$productDetail = getProductById($idHH); // Giả sử hàm getProductById đã được định nghĩa trong functions.php

// Kiểm tra nếu không tìm thấy sản phẩm, bạn có thể chuyển hướng hoặc hiển thị thông báo lỗi
if (!$productDetail) {
    header("Location: ./error.php"); // Chuyển hướng đến trang lỗi
    exit; // Dừng kịch bản PHP
}
$materialName = getMaterialName($productDetail['ChatLieu']);
$typeName = getTypeName($productDetail['LoaiHH']);
$doubleType = getDoubleType($productDetail['DonDoi']);
$link=getLinkName($productDetail['LoaiHH']);
?>
<style>
  body{
    margin: 0;
    /* background: url(./a-majestic-stag-stands-at-the-center-of-a-snowy-enchanted-forest-with-a-glowing-djfjmj2x.jpeg); */
    color: black  !important;
    font-family: Poppins  !important;
    font-size: 12px  !important;
    background-size: cover;
    background-position: center;
  }
  #search {
    left: 0;
    position: absolute;
    /* max-width: 988px; */
    margin: 2px 0px 0px;
    right: 0;
    text-align: center;
    height: 33px;
}
.search-container {
    margin: 0 45px 0 45px;
    position: relative;
    height: 33px;
}
#search input {
    text-align: center;
    background: #00000000;
    width: 700px;
    height: 100%;
    border: none;
    outline: none;
    border-bottom: 1px solid #000000;
    padding: 7px 25px;
    font-size: 16px;
    font-weight: 300;
}
  .dropdown-list-item.active,
.dropdown-list1-item.active,
.dropdown-list2-item.active {
  background-color: #e6f7ff; /* Màu nền highlight */
  font-weight: bold; /* Đậm chữ */
}
    :root {
  --blue: #9ab3f5;
  --purple: #9a1663;
  --white: #ffffff;
  --shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
}
    #header {
    --height: 90px;
    height: var(--height);
    backdrop-filter: blur(5px);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 3;
    margin: auto;
    max-width: 100%;
    background: white;
    backdrop-filter: none;
}#nav {
    margin: auto;
}
.card0-wrapper{
    margin: 110px 0 0 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}
.product-imgs img{
    width: 100%;
    display: block;

}
#userShop .Shopping img {
    width: 30px;
    height: 30px;
    vertical-align: inherit;
    border-style: none;
}
.img-display{
    overflow: hidden;
    height: 100%;
}
.img-showcase{
    display: flex;
    width: 100%;
    transition: all 0.5s ease;
    height: 100%;
}
.img-showcase img{
    min-width: 100%;
}
.img-select{
    display: flex;
}
.img-item{
    margin: 0.3rem;
}
.img-item:nth-child(1),
.img-item:nth-child(2),
.img-item:nth-child(3){
    margin-right: 0;
}
.img-item:hover{
    opacity: 0.8;
}
.product-content{
    padding-top: 0;
    max-width: 50%;
    width: 50%;
}
.product-title{
    text-transform: capitalize;
    position: relative;
    margin: 1rem 0;
    max-height: 100px;
    color: #000;
    font-size: 24px;
    font-weight: 500;
    line-height: 1.2em;
}
.product-title::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: -5px;
    height: 4px;
    width: 80px;
    background: #12263a;
}
.product-link{
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 400;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 0.5rem;
    background: #256eff;
    color: #fff;
    padding: 0 0.3rem;
    transition: all 0.5s ease;
}
.product-link:hover{
    opacity: 0.9;
}
.product-rating{
    color: #ffc107;
}
.product-rating span{
    font-weight: 600;
    color: #252525;
}
.product-price{
    margin: 1rem 0;
    font-size: 1rem;
    font-weight: 700;
}
.product-price span{
    font-weight: 400;
}
.last-price span{
    color: #f64749;
    text-decoration: line-through;
}
.new-price span{
    color: #256eff;
}
.product-detail h2{
    text-transform: capitalize;
    color: #12263a;
    padding-bottom: 0.6rem;
}
.product-detail p{
    font-size: 16px;
    padding: 0.3rem;
    opacity: 0.8;
    min-height: 130px;
    max-height: 150px;
}
.product-detail ul{
    margin: 1rem 0;
    font-size: 0.9rem;
}
.product-detail ul li{
    margin: 0;
    list-style: none;
    background: url(./icon_wed/checked.png) left center no-repeat;
    background-size: 18px;
    padding-left: 1.7rem;
    margin: 0.4rem 0;
    font-weight: 600;
    opacity: 0.9;
}
.product-detail ul li span{
    font-weight: 400;
}
.purchase-info{
    margin: 1.5rem 0;
}
.purchase-info input,
.purchase-info .btn{
    vertical-align: bottom;
    border: 1.5px solid #ddd;
    border-radius: 25px;
    text-align: center;
    padding: 0.45rem 0.8rem;
    outline: 0;
    margin-right: 0.2rem;
    margin-bottom: 1rem;
}
.purchase-info input{
    width: 60px;
}
.purchase-info .btn{
    cursor: pointer;
    color: #fff;
}
.purchase-info .btn:first-of-type{
    background: #256eff;
}
.purchase-info .btn:last-of-type{
    background: #f64749;
}
.purchase-info .btn:hover{
    opacity: 0.9;
}
.policy li{
    position: relative;
    color: black;
    width: 30%;
    font-size: 19px;
    display: inline-block;
}
.policy li span{
    position: relative;
    color: black;
    width: 30%;
    font-size: 19px;
    display: inline-block;
}
.policy li i{
    position: relative;
    color: black;
    width: 30%;
    font-size: 19px;
    display: inline-block;
}

.policy li i:before, .policy li svg:before {
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
}
@media screen and (min-width: 992px){
    .card0{
        top: 0;
        position: absolute;
        min-height: 750px;
        max-width: 1400px;
        display: flex;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
    .card0-wrapper{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .product-imgs{
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 50%;
    }
    .product-content{
        padding-top: 0;
    }
}
@keyframes modalFadein {
    from{
        opacity: 0;
        transform: translateY(-150px);
    }
    to{
        opacity: 1;
        transform: translateY(0);
    }
    
}
.modal-content{
    animation: modalFadein ease 0.5s;
}
</style>
  <!-- main -->
  <!--end main -->
  <div class="card0-wrapper">
    <div class="card0">
        <!-- card left -->
        <div class="product-imgs">
            <div class="img-display">
                <div class="img-showcase">
                    <!-- Hiển thị hình ảnh sản phẩm -->
                    <?php
                    $images = ["./quantri/icon/" . $productDetail['Anh1'], "./quantri/icon/" . $productDetail['Anh2'], "./quantri/icon/" . $productDetail['Anh3'], "./quantri/icon/" . $productDetail['Anh4']];
                    foreach ($images as $img) : 
                    ?>
                        <img src="<?php echo $img; ?>" alt="product image">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="img-select">
                <!-- Chọn hình ảnh sản phẩm -->
                <?php 
                foreach ($images as $index => $img) : 
                ?>
                    <div class="img-item">
                        <a href="#" data-id="<?php echo $index + 1; ?>">
                            <img src="<?php echo $img; ?>" alt="product image">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- card right -->
        <div class="product-content">
            <h2 class="product-title"><?php echo $productDetail['TenHH']; ?></h2>
            <a href="<?php echo $link; ?>" class="product-link">Visit <?php echo $typeName; ?> store</a>
            <div class="product-rating">
                <!-- ... -->
            </div>

            <div class="product-price">
                <p class="new-price" style="
                    font-size: 20px;
                ">Price: <span style="
                    color: #ff5656f0;
                    font-weight: 800;
                ">$<?php echo $productDetail['Gia']; ?></span></p>
            </div>

            <div class="product-detail">
                <h2>About This Item: </h2>
                <p><?php echo $productDetail['NoiDung']; ?></p>
                <ul>
                    <li>Type: <span><?php echo $typeName; ?></span></li>
                    <li>Material: <span><?php echo $materialName; ?></span></li>
                    <li>single or double: <span><?php echo $doubleType; ?></span></li>
                </ul>
            </div>

            <div class="purchase-info">
                <input  type="number" min="1" value="1">
                <button type="button" class="btn addcard" 
                    data-idHH="<?php echo $productDetail['idHH']; ?>"
                    data-name="<?php echo $productDetail['TenHH']; ?>"
                    data-image="<?php echo $productDetail['Anh1']; ?>"
                    data-price="<?php echo $productDetail['Gia']; ?>">
                    Add to Cart <i class="fas fa-shopping-cart"></i>
            </button>
                <button type="button" class="btn" onclick="redirectToPayPage('<?php echo $productDetail['idHH']; ?>', '<?php echo $productDetail['TenHH']; ?>', '<?php echo $productDetail['Anh1']; ?>', '<?php echo $productDetail['Gia']; ?>')">
                Buy Now
            </button>
            </div>
        </div>
      </div>
    </div>

    
    <script src="./assets/script/product.js"></script>
  </div>
  <div class="rating">
    <?php require "./rating.php"; ?>
    <?php require "./include/card.php";?>
  </div>
  <?php require "./include/footer.php";?>
</body>
</html>
