<?php
require "./include/header.php";
?>

<style>
  body{
    margin: 0;
    color: black  !important;
    font-family: Poppins  !important;
    font-size: 12px  !important;
    background-size: cover;
    background-position: center;
  }
  #search {
    left: 0;
    position: absolute;
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
  background-color: #e6f7ff;
  font-weight: bold;
}
:root {
  --blue: #9ab3f5;
  --purple: #9a1663;
  --white: #ffffff;
  --shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
}
#nav {
    margin: auto;
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
.pay-element {
    height: 100vh;
    max-width: 1240px;
    margin: auto;
    position: relative;
}
ul.listCard0 {
    /* margin: 50px 0 0 0; */
    max-width: 800px;
    max-height: 300px;
    overflow-y: auto;
    display: inline-block;
    padding: 10px;
}
.listCard0 li {
    display: grid;
    grid-template-columns: 100px repeat(3, 1fr);
    color: #000;
    row-gap: 10px;
    margin: 10px 0;
    border: 1px solid #281f1b2b;
    max-width: 800px;
    min-width: 750px;
}
.listCard0 li div {
    display: flex;
    justify-content: center;
    align-items: center;
}
.listCard0 li img {
    width: 90%;
}
.listCard0 li button {
    background-color: #fff5;
    border: none;
    width: 16px;
    height: 16px;
    text-align: center;
}
.listCard0 .count {
    margin: 0 10px;
}
.total0 {
    display: inline-block;
    color: red;
}
input.form-control {
    width: 100%;
    font-size: 15px;
    padding: 7px;
    outline: none;
}
.form-group {
    margin-bottom: 20px;
}
label {
    font-size: 13px;
}
input.btn.btn-primary {
    display: inline-block;
    padding: 13px 30px;
    background-color: #00abd5 !important;
    border: none;
    border-radius: 4px;
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}
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
.totalPrice {
    display: inline-block;
    color: red;
}
.name li {
    display: grid;
    grid-template-columns: 100px repeat(3, 1fr);
    color: #000;
    row-gap: 10px;
    margin: 10px 0px;
    max-width: 800px;
    min-width: 750px;
    padding: 0 16px 0 5px;
}
.name li div {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 13px;
    font-weight: 600;
}
</style>
<div class="notifications">
    <!-- Notification messages will be displayed here -->
</div>
<?php require "./include/card.php";?>

<?php
// Check if the current page is not pay.php
if ($_SERVER['REQUEST_URI'] !== '/web_Trang_Suc/pay.php') {
    // Get product details from query parameters
    $idHH = $_GET['idHH'] ?? '';
    $name = $_GET['name'] ?? '';
    $image = $_GET['image'] ?? '';
    $price = $_GET['price'] ?? '';

    // Check if any product details are missing
    if (empty($idHH) || empty($name) || empty($image) || empty($price)) {
        // Handle missing product details here
    }
?>
<form action="order_product.php" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
    <div class="pay-element">
        <div style="
                    height: 380px;
                    margin: auto;
                    position: relative;
                    top: 210px;
                    display: inline-block;
                    border-bottom: 3px ridge #cc8344;
                    border-top: 3px ridge #cc8344;
                    border-left: 3px ridge #cc8344;
                ">
                <div style="
                    display: inline-block;
                ">
                <ul class="name">
                    <li>
                        <div>Image product</div>
                        <div>Product's name</div>
                        <div>Cost</div>
                        <div>Quantity</div>
                    </li>
                </ul>
                    <ul class="listCard0">
                        <li data-idhh="<?php echo $idHH;?>">
                            <div><img src="quantri/icon/<?php echo $image; ?>"></div>
                            <div><?php echo $name; ?></div>
                            <div>$<?php echo number_format($price); ?></div>
                            <div>
                                <button onclick="changeQuantity1('minus')">-</button>
                                <div class="count">1</div>
                                <button onclick="changeQuantity1('plus')">+</button>
                            </div>
                        </li>
                    </ul>
                    <div style="
                    margin: 20px;
                    font-size: 15px;
                    ">
                        Total price: <div style="
                            display: inline-block;
                            color: red;
                        ">$</div><div class="total0">0</div>
                    </div>
                </div>
                <div style="
                display: inline-block;
                position: absolute;
                top: -3px;
                max-width: 400px;
                min-width: 380px;
                height: 380px;
                border: 3px ridge #cc8344;
                padding: 10px 10px;
                ">
                        <div class="form-group">
                            <label>Recipient's name:</label> 
                            <input name="NameUser" type="text" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Address:</label> 
                            <input name="Address" type="text" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Email:</label> 
                            <input name="Email" type="email" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Phone Number:</label> 
                            <input name="PhoneNumber" type="tel"class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input name="btn"  type="button" value="Place an Order" class="btn btn-primary"> 
                        </div>
            </div>
        </div>
        <div id="error-message" style="color: red;"></div>
    </div>
</form>
<script>
    // JavaScript code for changing quantity and updating total price
    let countElement = document.querySelector('.count');
    let total0 = document.querySelector('.total0');
    let totalPrice = 0;
    let quantity1 = 1;
    let price = <?php echo $price; ?>;

    function changeQuantity1(action) {
        event.preventDefault(); 
        if (action === 'minus' && quantity1 > 1) {
            quantity1--;
        } else if (action === 'plus') {
            quantity1++;
        }
        updateDisplay();
    }
    function updateDisplay() {
        countElement.innerText = quantity1;
        total0.innerText = (quantity1 * price).toLocaleString();
        totalPrice=quantity1 * price;
    }

    updateDisplay();
</script>

<?php
// If the current page is pay.php
} else {
?>
<form action="order_product.php" method="post" class="border border-primary col-10 m-auto p-2" enctype="multipart/form-data">
    <div class="pay-element">
        <div style="
                height: 400px;
                margin: auto;
                position: relative;
                top: 210px;
                display: inline-block;
                border-bottom: 3px ridge #cc8344;
                border-top: 3px ridge #cc8344;
                border-left: 3px ridge #cc8344;
            ">
            <div style="
                display: inline-block;
            ">
            <ul class="name">
                    <li>
                        <div>Image product</div>
                        <div>Product's name</div>
                        <div>Total price</div>
                        <div>Quantity</div>
                    </li>
                </ul>
                <ul class="listCard0">
                    <li>
                    </li>
                </ul>
                <div style="
                    margin: 20px;
                    font-size: 15px;
                ">
                    Total cost of all product: <div style="
                        display: inline-block;
                        color: red;
                    ">$</div><div class="total0">0</div>
                </div>
            </div>
            <div style="
                display: inline-block;
                position: absolute;
                top: -3px;
                max-width: 400px;
                min-width: 380px;
                height: 400px;
                border: 3px ridge #cc8344;
                padding: 10px 10px;
            " >
                <div class="form-group">
                    <label>Recipient's name:</label> 
                    <input name="NameUser" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Address:</label> 
                    <input name="Address" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Email:</label> 
                    <input name="Email" type="email" class="form-control"/>
                        </div>
                <div class="form-group">
                    <label>Phone Number:</label> 
                    <input name="PhoneNumber" type="tel"class="form-control"/>
                    </div>
                <div class="form-group">
                    <input name="btn" type="button" value="Place an Order" class="btn btn-primary"> 
                </div>
            </div>
        </div>
        <div id="error-message" style="color: red;"></div>
    </div>
</form>
<script>
    // JavaScript code for reloading card and copying listCard to listCard0
    let total0 = document.querySelector('.total0');
    let listCard0 = document.querySelector('.listCard0');
    let totalPrice = 10;
    function reloadCard() {
        listCard.innerHTML = '';
        let count = 0;

        Object.values(listCards).forEach(product => {
                count += product.quantity;
                
                let newDiv = document.createElement('li');
                newDiv.setAttribute('data-idHH', product.id); 
                newDiv.innerHTML = `
                    <div><img src="quantri/icon/${product.image}"/></div>
                    <div>${product.name}</div>
                    <div>${product.price.toLocaleString()}</div>
                    <div>
                        <button onclick="changeQuantity(${product.id}, 'minus', this)">-</button>
                        <div class="count">${product.quantity}</div>
                        <button onclick="changeQuantity(${product.id}, 'plus', this)">+</button>
                    </div>`;
                listCard.appendChild(newDiv);
            });

            quantity.innerText = count;

            // Update total price
            totalPrice = calculateTotalPrice();
            total.innerText = totalPrice.toLocaleString();
            total0.innerText = total.innerText;

            // Update product list in listCard0
            copyListCardToPay();
        }
function copyListCardToPay() {
    const listCard0 = document.querySelector('.listCard0');
    listCard0.innerHTML = ''; // Clear old content of listCard0 before copying

    // Loop through the products in listCards and copy them to listCard0
    Object.values(listCards).forEach(product => {
        const newLi = document.createElement('li');
        newLi.setAttribute('data-idHH', product.id); // Add data-idHH attribute for each product
        newLi.innerHTML = `
            <div><img src="quantri/icon/${product.image}"/></div>
            <div>${product.name}</div>
            <div>${product.price.toLocaleString()}</div>
            <div>
                <button onclick="changeQuantity(${product.id}, 'minus', this)">-</button>
                <div class="count">${product.quantity}</div>
                <button onclick="changeQuantity(${product.id}, 'plus', this)">+</button>
            </div>`;
        listCard0.appendChild(newLi);
    });
}
</script>
<?php
}
?>

  <?php require "./include/footer.php";?>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script>
let notifications = document.querySelector('.notifications');
let canShowToast = true; // Variable to check if new toast can be shown


function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function createToast(type, icon, title, text){
    if (canShowToast) { // Check if new toast can be shown
        let newToast = document.createElement('div');
        newToast.innerHTML = `
            <div class="toast ${type}">
                <i class="${icon}"></i>
                <div class="content">
                    <div class="title">${title}</div>
                    <span>${text}</span>
                </div>
                <i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i>
            </div>`;
        notifications.appendChild(newToast);
        newToast.timeOut = setTimeout(() => {
            newToast.remove();
            canShowToast = true; // Reset variable after toast disappears
        }, 5000);
        canShowToast = false; // Set variable to prevent showing new toast
    }
}

function sendIdHHList(idHHList) {
    // Send idHH list to order_product.php
    fetch('order_product.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'idHHList=' + encodeURIComponent(idHHList), // Không cần chuyển đổi thành chuỗi và encode
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        // Handle response from order_product.php
        console.log(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}


    function sendFormData(formData) {
        // Send form data to order_product.php
        fetch('order_product.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (response.ok) {
                return response.text();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            // Handle response from order_product.php
            console.log(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
    document.querySelector('input[name="btn"]').addEventListener('click', function(event) {
    event.preventDefault();

    let name = document.querySelector('input[name="NameUser"]').value.trim();
    let address = document.querySelector('input[name="Address"]').value.trim();
    let email = document.querySelector('input[name="Email"]').value.trim();
    let phoneNumber = document.querySelector('input[name="PhoneNumber"]').value.trim();

    if (name === '' || address === '' || email === '' || phoneNumber === '') {
        let type = 'error';
        let icon = 'fa-solid fa-circle-exclamation';
        let title = 'Log in';
        let text = 'Bạn cần điền vào tất cả các trường.';
        createToast(type, icon, title, text);
        return;
    }

    if (!validateEmail(email)) {
        let type = 'error';
        let icon = 'fa-solid fa-circle-exclamation';
        let title = 'Email không hợp lệ';
        let text = 'Vui lòng nhập địa chỉ email hợp lệ.';
        createToast(type, icon, title, text);
        return;
    }

    let idHHList = [];
    let quantityList = []; // Thêm mảng này để lưu trữ số lượng sản phẩm

    document.querySelectorAll('.listCard0 li').forEach(item => {
        idHHList.push(item.getAttribute('data-idHH'));
        quantityList.push(item.querySelector('.count').innerText); // Lấy số lượng của từng sản phẩm và thêm vào mảng
    });

    let formData = new FormData(document.querySelector('form'));
    formData.append('totalPrice', totalPrice);
    formData.append('idHHList', idHHList.join(',')); 
    formData.append('quantityList', quantityList.join(',')); // Thêm số lượng vào dữ liệu gửi đi

    fetch('order_product.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        let encryptedIdOder = encodeURIComponent(btoa(data)); 
        window.location.href = 'http://localhost/web_Trang_Suc/condition.php?idOder=' + encryptedIdOder;
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
});


</script>
