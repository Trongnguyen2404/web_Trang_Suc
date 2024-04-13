<?php require "./include/header.php";
?>
<style>
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
.card-news .product a.product-name
{
    color: #000000;
    text-align: left;
    width: 100%;
    height: 40px;
    padding: 10px;
    text-align: center;
}

.card-news .product .product-price
{
    color: #ff7878;
    float: left;
    font-weight: 600;
    height: 40px;
    width: 100%;
    padding: 10px;
}

/* Thêm định dạng thẻ cho bài viết */
.card-news 
{
    width: 23%;
    height: 420px;
    background-color: #f3f3f3;
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

#list3.show {
  max-height: 400px;
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
                    High quality rings
                    </div>
                    <div style="
                        font-size: 30px;
                        padding: 20px;
                        text-align: center;
                        max-width: 100%;
                    ">
                    Show off your charm with beautiful, high-end, charming LiLi rings. Are you ready to shine and attract all eyes with her?
                    </div>
                </div>
            </div>
        </div>
        <div class="a" style="
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
                ">RECOMMENDED PRODUCTS
                </div>

            </div>
            <div class="v">
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
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
                    ">RINGS
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
                    <li class="dropdown-list-item">all materials</li>
                    <li class="dropdown-list-item">made from silver</li>
                    <li class="dropdown-list-item">made from gold</li>
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
                    <li class="dropdown-list1-item">single and double</li>
                    <li class="dropdown-list1-item">single</li>
                    <li class="dropdown-list1-item">double</li>
                  </ul>
                </div>
            
                <div class="dropdown2">
                  <div id="drop-text2" class="dropdown-text">
                    <span id="span2">All price ranges</span>
                    <i id="icon2" class="fa-solid fa-chevron-down"></i>
                  </div>
                  <ul id="list2" class="dropdown-list">
                    <li class="dropdown-list2-item">All price ranges</li>
                    <li class="dropdown-list2-item">under 1,500,000</li>
                    <li class="dropdown-list2-item">1,500,000 - 2,000,000</li>
                    <li class="dropdown-list2-item">over 2,000,000</li>
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
                <ul id="list3" class="dropdown-list3">
                    <li class="dropdown-list3-item">low to high price</li>
                    <li class="dropdown-list3-item">high to low price</li>
                    <li class="dropdown-list3-item">number of purchases</li>
                    <li class="dropdown-list3-item">number of reviews</li>
                    <li class="dropdown-list3-item">number of stars</li>
                    <li class="dropdown-list3-item">Latest</li>
                    <li class="dropdown-list3-item">Buy name</li>
                </ul>
            </div>

                <script src="./assets/script/find.js"></script>
            <div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
                <div class="card-news">
                    <a href="./hang hoa/hoatan1.html"><img src="./icon_wed/02.jpg" class="image"></a>
                    <div class="product">
                        <a href="./hang hoa/hoatan1.html" class="product-name">Cà phê hòa tan Trung Nguyên 204g</a>
                        <a href="./hang hoa/hoatan1.html" class="product-price"> 52.000 Vnđ</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--end mainheader -->
</div>
<div id="footer">
                <div class="socials-list">
                    <a href=""><i class="fa-brands fa-square-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-snapchat" style="color: #616161;"></i></a>
                    <a href=""><i class="fa-brands fa-pinterest-p"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>

                </div>
                <p class="coppy">Powered by <a href="https://www.w3schools.com/w3css/default.asp">w3.css</a></p>
            </div>
    <!--end main -->
</body>
</html>