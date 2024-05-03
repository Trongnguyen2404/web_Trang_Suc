<?php require "./include/header.php";
require "./functions.php";
?>
<style>
    html {
    scroll-behavior: smooth;

}
.dropdown-list-item.active,
.dropdown-list1-item.active,
.dropdown-list2-item.active, 
.dropdown-list3-item.active {
  background-color: #e6f7ff; /* Màu nền highlight */
  font-weight: bold; /* Đậm chữ */
}
    :root {
  --blue: #9ab3f5;
  --purple: #9a1663;
  --white: #ffffff;
  --shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
}
    .carousel {
    height: 70vh;
    margin-top: 90px;
    width: 100%;
    overflow: hidden;
    position: relative;
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
}
.line1 {
    background-color: black;
    height: 0.5px;
    position: absolute;
    top: 65px;
    transform: translateY(-50%);
    left: 0;
    width: 25%;
}
.line2 {
    background-color: black;
    height: 0.5px;
    position: absolute;
    top: 65px;
    transform: translateY(-50%);
    width: 25%;
    right: 0;
}
.card-news .product a
{
    display: block;
    float: left;
    text-decoration: none;
}
.card-news .product a.product-name {
    color: #000000;
    text-align: left;
    width: 100%;
    text-align: center;
    padding: 5px 10px 0px 10px;
    font-size: 15px;
    font-weight: 600;
    min-height: 55px;
    line-height: 1.3;
}
button.btn.float-right {
    float: right;
    border-bottom-right-radius: 15px;
    border-bottom-left-radius: 0;
    background: #464646;
    color: white;
}
button.btn {
    margin: 10px 0 0 0;
    padding: 8px;
    float: left;
    width: 49.5%;
    font-size: 13px;
    background: white;
    border: 1px solid;
    border-bottom-left-radius: 15px;
    border-color: #000;
}
.card-news .product a.mb-3 {
    width: 100%;
    text-align: center;
    padding: 0px;
    margin-bottom: 10px;
}
.card-news .product .product-price {
    color: #f86969;
    float: left;
    font-weight: 700;
    width: 100%;
    padding: 0px;
    font-size: 16px;
    text-align: center;
    margin-bottom: 10px;
}

/* Thêm định dạng thẻ cho bài viết */
.card-news 
{
    width: 23%;
    background-color: #0000000;
    margin: 9px calc(4%/4);
    float: left;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    position: relative;
    -webkit-box-pack: justify;
    justify-content: space-between;
    transition: all 0.3s ease-in-out 0s;
    cursor: pointer;
    border-bottom-right-radius: 15px;
    border-bottom-left-radius: 15px;
    border-top-right-radius: 15px;
    border-top-left-radius: 15px;
    border-width: 8px;
    border-color: #000;
}
.card-news:hover 
{
    box-shadow: rgba(0, 0, 0, 0.2) 0px 0.2rem 1.2rem 0px;
   transform: scale(1.02);
}
.image {
    width: 100%;
    border-radius: 15px 15px 0 0;
    height: 335px;
}
.search-bar {
  display: flex;
  align-items: center;
  max-width: 1140px;
  border-radius: 50px;
  background-color: var(--white);
  color: black;
  border:1px solid #000;
  z-index: 1;
  margin: 0px 0 20px;
}

.dropdown,
.dropdown1,
.dropdown2 {
  position: relative;
  width: 325px;
  border-radius: 50px;
  background-color: var(--white);
  border: 1px solid var(--white);
  box-shadow: 0px 0px 2px 0px black;
  cursor: pointer;
}

.dropdown-text,
.dropdown1 .dropdown-text,
.dropdown2 .dropdown-text {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 1rem;
  font-weight: 500;
  background-color: transparent;
  padding: 1rem 1.5rem;
  color: var(--black);
}

.dropdown-list,
.dropdown1 .dropdown-list,
.dropdown2 .dropdown-list {
    display: block;
    position: absolute;
    top: 4rem;
    left: 0;
    width: 100%;
    border-radius: 15px;
    max-height: 0;
    overflow: hidden;
    background-color: var(--white);
    transition: max-height 0.5s;
    box-shadow: 0px 0px 5px #5b5b5b;
}

.dropdown-list-item,
.dropdown1 .dropdown-list1-item,
.dropdown2 .dropdown-list2-item {
  font-size: 0.9rem;
  font-weight: 500;
  border-radius: 15px;
  padding: 1rem 0 1rem 1.5rem;
  cursor: pointer;
  transition: background-color 0.2s ease, color 0.3s ease, margin-left 0.2s ease;
}

.dropdown-list-item:hover,
.dropdown1 .dropdown-list1-item:hover,
.dropdown2 .dropdown-list2-item:hover {
  margin-left: 0.5rem;
  color: var(--purple);
}

#list.show,
#list1.show,
#list2.show {
  max-height: 300px;
}

.search-box {
    display: flex;
    align-items: center;
    padding-right: 1rem;
    width: 570px;
    color: var(--black);
}

.search-box input {
  padding: 1rem;
  width: 100%;
  font-size: 1rem;
  font-weight: 500;
  color: var(--black);
  border: 0;
  outline: 0;
}

.search-box i {
  font-size: 1.3rem;
  cursor: pointer;
}

.search-box input::placeholder {
  font-size: 1rem;
  font-weight: 500;
  color: var(--black);
}
.dropdown3 {
    position: absolute;
    width: 255px;
    border-radius: 50px;
    background-color: var(--white);
    border: 1px solid var(--white);
    box-shadow: 0px 0px 2px 0px black;
    cursor: pointer;
    right: 0;
    top: 136px;
    color: black;
    z-index: 1;
}

.dropdown-text3 {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 1rem;
  font-weight: 500;
  background-color: transparent;
  padding: 1rem 1.5rem;
  color: var(--black);
}

.dropdown-list3 {
  display: block;
  position: absolute;
  top: 4rem;
  left: 0;
  width: 100%;
  border-radius: 15px;
  max-height: 0;
  overflow: hidden;
  background-color: var(--white);
  transition: max-height 0.5s;
  box-shadow: 0px 0px 5px #5b5b5b;
}

.dropdown-list3-item {
  font-size: 0.9rem;
  font-weight: 500;
  border-radius: 15px;
  padding: 1rem 0 1rem 1.5rem;
  cursor: pointer;
  transition: background-color 0.2s ease, color 0.3s ease, margin-left 0.2s ease;
}

.dropdown-list3-item:hover {
  margin-left: 0.5rem;
  color: var(--purple);
}
.card-news .product a.mb-3 h1 {
    font-size: 10px;
    display: inline-block;
    color: #6b6b6b;
}
#list3.show {
    max-height: 500px;
}
</style>
<!-- main -->
    <!-- mainheader -->
        <div class="carousel" >
            <div style="background: url(./icon_wed/01.png); background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            background-position: center !important;
            background-size: cover;
            -webkit-background-size: cover !important; width: 100%;
            height: 100%;">
    
                <div class="text-carousel" style="
                    position: absolute;
                    transform: translate3d(100px, 20%, 0px);
                    color: black;
                    font-size: 50px;
                    width: 50%;
                    font-family: 'Poppins';
                    height: 80%;
                    ">
                    <div style="
                        padding: 30px;
                        text-align: center;
                        margin: auto;
                        max-width: 50%;
                    ">
                    All product
                    </div>
                    <div style="
                        font-size: 30px;
                        padding: 20px;
                        text-align: center;
                        max-width: 100%;
                    ">
                    All hihi
                    </div>
                </div>
            </div>
        </div>
        <div class="b" style="
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin-left: auto;
            max-width: 1420px;
            margin-right: auto;
        ">
            <div style="
                position: relative;
                height: 135px;
                ">
                <div style="
                    width: 85%;
                    margin: 0 auto;
                    position: relative;
                    ">
                        <div class="line1"></div>
                        <div class="line2"></div>
                </div>
                   
                <div style="
                    position: absolute;
                    top: 40px;
                    font-size: 32px;
                    left: 0;
                    font-weight: 500;
                    right: 0;
                    margin: auto;
                    width: 42%;
                    color: black;
                    text-align: center;
                    ">All
                </div>

            </div>
            <div class="search-bar">
                <!-- Dropdown start -->
                <div class="dropdown">
                  <div id="drop-text" class="dropdown-text">
                    <span id="span">all materials</span>
                    <i id="icon" class="fa-solid fa-chevron-down"></i>
                  </div>
                  <ul id="list" class="dropdown-list">
                  <li class="dropdown-list-item <?php echo ($material === "all materials") ? 'active' : ''; ?>">all materials</li>
                  <li class="dropdown-list-item <?php echo ($material === "made from silver") ? 'active' : ''; ?>">made from silver</li>
                  <li class="dropdown-list-item <?php echo ($material === "made from gold") ? 'active' : ''; ?>">made from gold</li>
                  </ul>
                </div>
            
                <div class="dropdown1" style="
                    margin: 0 4px;
                    ">
                  <div id="drop-text1" class="dropdown-text">
                    <span id="span1">single and double</span>
                    <i id="icon1" class="fa-solid fa-chevron-down"></i>
                  </div>
                  <ul id="list1" class="dropdown-list">
                  <li class="dropdown-list1-item <?php echo ($type === "single and double") ? 'active' : ''; ?>">single and double</li>
                  <li class="dropdown-list1-item <?php echo ($type === "single") ? 'active' : ''; ?>">single</li>
                  <li class="dropdown-list1-item <?php echo ($type === "double") ? 'active' : ''; ?>">double</li>
                  </ul>
                </div>
            
                <div class="dropdown2">
                  <div id="drop-text2" class="dropdown-text">
                    <span id="span2">All price ranges</span>
                    <i id="icon2" class="fa-solid fa-chevron-down"></i>
                  </div>
                  <ul id="list2" class="dropdown-list">
                  <li class="dropdown-list2-item <?php echo ($priceRange === "All price ranges") ? 'active' : ''; ?>">All price ranges</li>
                  <li class="dropdown-list2-item <?php echo ($priceRange === "under 500") ? 'active' : ''; ?>">under 500</li>
                  <li class="dropdown-list2-item <?php echo ($priceRange === "500 - 1,500") ? 'active' : ''; ?>">500 - 1,500</li>
                  <li class="dropdown-list2-item <?php echo ($priceRange === "over 1,500") ? 'active' : ''; ?>">over 1,500</li>
                  </ul>
                </div>
            
                <!-- Search box input start -->
                <div class="search-box">
                  <input type="text" id="search-input" placeholder="Search in all materials, single and double, All price ranges" />
                  <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!-- Search box input ends -->
            </div>
            <div class="dropdown3">
                <div id="drop-text3" class="dropdown-text3">
                    <span id="span3">sorted by</span>
                    <i id="icon3" class="fa-solid fa-chevron-down"></i>
                </div>
                <ul id="list3" class="dropdown-list">
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "newest") ? 'active' : ''; ?>">newest</li>
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "Latest") ? 'active' : ''; ?>">Latest</li>
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "low to high price") ? 'active' : ''; ?>">low to high price</li>
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "high to low price") ? 'active' : ''; ?>">high to low price</li>
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "number of purchases") ? 'active' : ''; ?>">number of purchases</li>
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "number of reviews") ? 'active' : ''; ?>">number of reviews</li>
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "number of stars") ? 'active' : ''; ?>">number of stars</li>
                    <li class="dropdown-list3-item <?php echo ($sortedBuy === "Buy name") ? 'active' : ''; ?>">Buy name</li>

                </ul>
            </div>

                <script src="./assets/script/find2.js"></script>
                <?php
    $material = $_GET['material'] ?? "all materials";
    $type = $_GET['type'] ?? "single and double";
    $priceRange = $_GET['priceRange'] ?? "All price ranges";
    $searchKeyword = $_GET['searchKeyword'] ?? "";
    $sortedBuy = $_GET['sortedBuy'] ?? "";
    $filteredProducts = filterProducts1($material, $type, $priceRange, $page, $sortedBuy, $searchKeyword);
                  ?>

                  <div>
                      <?php foreach ($filteredProducts as $product): ?>
                        <div class="card-news">
        <a href="./product.php?idHH=<?php echo $product['idHH']; ?>"><img src="./quantri/icon/<?php echo $product['Anh1']; ?>" class="image"></a>
        <div class="product">
            <a href="./product.php?idHH=<?php echo $product['idHH']; ?>" class="product-name"><?php echo $product['TenHH']; ?></a>
            <a href="./product.php?idHH=<?php echo $product['idHH']; ?>" class="mb-3">
              <div >
                <i class="fas fa-star star-light mr-1 main_star_<?php echo $product['idHH']; ?>"></i>
                <i class="fas fa-star star-light mr-1 main_star_<?php echo $product['idHH']; ?>"></i>
                <i class="fas fa-star star-light mr-1 main_star_<?php echo $product['idHH']; ?>"></i>
                <i class="fas fa-star star-light mr-1 main_star_<?php echo $product['idHH']; ?>"></i>
                <i class="fas fa-star star-light mr-1 main_star_<?php echo $product['idHH']; ?>"></i>
                <h1>(<span id="total_review_<?php echo $product['idHH']; ?>">0</span>)</h1>
              </div>
            </a>
            <a href="./product.php?idHH=<?php echo $product['idHH']; ?>" class="product-price">$<?php echo number_format($product['Gia']); ?></a>
            <button type="button" class="btn addcard" 
                    data-idHH="<?php echo $product['idHH']; ?>"
                    data-name="<?php echo $product['TenHH']; ?>"
                    data-image="<?php echo $product['Anh1']; ?>"
                    data-price="<?php echo $product['Gia']; ?>">
                Add to Cart 
            </button>
            <button type="button" class="btn float-right" onclick="redirectToPayPage('<?php echo $product['idHH']; ?>', '<?php echo $product['TenHH']; ?>', '<?php echo $product['Anh1']; ?>', '<?php echo $product['Gia']; ?>')">
                Buy Now
            </button>
        </div>
    </div>
                      <?php endforeach; ?>
                  </div>

        </div>

    </div>
    <!--end mainheader -->
    
</div>
<?php require "./include/footer.php";?>
<?php require "./include/card.php";?>
    <!--end main -->
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
      .notifications {
	position: fixed;
	top: 30px;
	right: 20px;
    z-index: 50;
}
.toast{
    position: relative;
    padding: 10px;
    margin-bottom: 10px;
    color: #fff;
    width: 400px;
    display: grid;
    grid-template-columns: 70px 1fr 70px;
    border-radius: 5px;
    --color: #0abf30;
    background-image: linear-gradient(to right, #0abf3055, #22242F 30%);
    animation: show_toast 0.3s ease forwards;
}
.toast i{
    color: var(--color);
}
.toast .title{
    font-size: x-large;
    font-weight: bold;
}
.toast i{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: x-large;
}
.toast span,
.toast .close{
    opacity: 0.6;
    color: #fff
}

@keyframes show_toast {
	0% {
		transform: translateX(100%);
	}
	40% {
		transform: translateX(-5%);
	}
	80% {
		transform: translateX(0%);
	}
	100% {
		transform: translateX(-10%);
	}
}
.toast::before{
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: var(--color);
    box-shadow: 0 0 10px var(--color);
    content: '';
    width: 100%;
    height: 3px;
    animation: timeOut 5s linear 1 forwards;
}
@keyframes timeOut{
    to{
        width: 0%;  
    }
}
/* error */
.toast.error{
   --color: #f24d4c;
   background-image: linear-gradient(to right, #f24d4c55, #22242F 30%);
}
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
.text-warning {
    color: #ffc107 !important;
}
</style>
<script>
function load_rating_data(products){
    // Lấy tất cả các thẻ <a> chứa idHH và duyệt qua từng sản phẩm
    $(products).each(function(){
        var productId = $(this).find('a[href*="product.php?idHH="]').attr('href').split('idHH=')[1];
        var container = $(this); // Lưu lại đối tượng jQuery của container này

        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{
                action:'load_data',
                idHH: productId
            },
            dataType:"JSON",
            success:function(data){
                console.log(data);

                // Cập nhật thông tin số đánh giá và số sao trung bình
                container.find('#total_review_' + productId).text(data.total_review);

                // Cập nhật trạng thái sao
                var count_star = 0;
                container.find('.main_star_' + productId).each(function(){
                    count_star++;
                    if (count_star <= Math.floor(data.average_rating)) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    } else if (count_star - 0.5 <= data.average_rating) {
                        $(this).removeClass('star-light');
                        $(this).removeClass('fas fa-star star-light submit_star mr-1');
                        $(this).addClass('fa-solid fa-star-half-stroke text-warning');
                    } else {
                        $(this).removeClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });
            }
        });
    });
}

load_rating_data('.v .card-news');  
load_rating_data('.b .card-news');

</script>
