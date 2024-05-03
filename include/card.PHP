<div class="card1">
    <h1>Cart</h1>
    <ul class="listCard"></ul>
    <div class="checkOut">
        <a href="pay.php"><div class="total">0</div></a>
        <div class="closeShopping">Close</div>
    </div>
</div>

<script>
let openShopping = document.querySelector('.Shopping'); 
let closeShopping = document.querySelector('.closeShopping');
let card1 = document.querySelector('.card1');
let listCard = document.querySelector('.listCard');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

let listCards = {};

document.addEventListener('DOMContentLoaded', function() {
    if (isUserLoggedIn()) {
        loadCartFromDatabase();
    } else {
        if(sessionStorage.getItem('cart')){
            listCards = JSON.parse(sessionStorage.getItem('cart'));
            reloadCard();
        }
    }
});

openShopping.addEventListener('click', ()=>{
    card1.classList.add('active');
});

closeShopping.addEventListener('click', ()=>{
    card1.classList.remove('active');
});

function addToCard(idHH, name, image, price, quantity){
    if(!listCards[idHH]){
        listCards[idHH] = {
            id: idHH,
            name: name,
            image: image,
            originalPrice: price,
            quantity: quantity // Sử dụng giá trị số lượng từ product.php
        };
    } else {
        listCards[idHH].quantity += quantity; // Cộng thêm vào số lượng hiện có
    }

    updatePrice(listCards[idHH]);
    
    sessionStorage.setItem('cart', JSON.stringify(listCards));
    
    reloadCard();

    if (isUserLoggedIn()) {
        saveToDatabase(0, idHH, name, quantity, price, image); // Lưu vào cơ sở dữ liệu
    }
}

function isUserLoggedIn() {
    return <?php echo isset($_SESSION['login_id']) ? 'true' : 'false'; ?>;
}

function updatePrice(product) {
    product.price = product.originalPrice * product.quantity;
}

function calculateTotalPrice() {
    let totalPrice = 0;
    Object.values(listCards).forEach(product => {
        totalPrice += product.price;
    });
    return totalPrice;
}

function reloadCard(){
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

    // Cập nhật tổng giá trị
    const totalPrice = calculateTotalPrice();
    total.innerText = totalPrice.toLocaleString();
}

function changeQuantity(idHH, action, btnElement){
    let product = listCards[idHH];

    if(action === 'minus'){
        if(product && product.quantity > 1){
            product.quantity -= 1;
            updatePrice(product);
            updateDatabase(idHH, product.name, product.quantity, product.originalPrice, product.image);
        } else if(product && product.quantity === 1){
            delete listCards[idHH];
            removeFromDatabase(idHH);
        }
    } else if(action === 'plus'){
        if(product){
            product.quantity += 1;
            updatePrice(product);
            updateDatabase(idHH, product.name, product.quantity, product.originalPrice, product.image);
        } else {
            let newProduct = JSON.parse(JSON.stringify(products.find(p => p.id === idHH)));
            newProduct.quantity = 1;
            newProduct.price = newProduct.originalPrice;
            listCards[idHH] = newProduct;
            saveToDatabase(0, idHH, newProduct.name, 1, newProduct.originalPrice, newProduct.image);
        }
    }

    sessionStorage.setItem('cart', JSON.stringify(listCards));
    
    reloadCard();

    const countElements = document.querySelectorAll('.count');
    countElements.forEach(countElement => {
        const productId = countElement.parentElement.parentElement.getAttribute('data-idHH');
        if(productId == idHH){
            countElement.innerText = product.quantity;
        }
    });
}

const addToCartButtons = document.querySelectorAll('.addcard'); 

addToCartButtons.forEach(button => {
    button.addEventListener('click', () => {
        const idHH = button.getAttribute('data-idHH'); 
        const name = button.getAttribute('data-name'); 
        const image = button.getAttribute('data-image'); 
        const price = parseFloat(button.getAttribute('data-price')); 
        let quantity = 1; // Đặt số lượng mặc định là 1

        const quantityInput = button.parentElement.querySelector('input[type="number"]');
        if (quantityInput) {
            quantity = parseInt(quantityInput.value);
        }

        addToCard(idHH, name, image, price, quantity); // Gọi hàm thêm vào giỏ hàng với số lượng đã xác định
    });
});

function saveToDatabase(idUser, idHH, TenHH, SoLuong, Gia, Anh1) {
    fetch('save_to_db.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `idUser=${idUser}&idHH=${idHH}&TenHH=${TenHH}&SoLuong=${SoLuong}&Gia=${Gia}&Anh1=${Anh1}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function loadCartFromDatabase() {
    fetch('load_cart_from_db.php')
    .then(response => response.json())
    .then(data => {
        listCards = {};
        data.forEach(product => {
            product.originalPrice = product.price;
            updatePrice(product);
            listCards[product.id] = product;
        });
        reloadCard();
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function removeFromDatabase(idHH) {
    fetch('remove_from_db.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `idHH=${idHH}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function updateDatabase(idHH, TenHH, SoLuong, Gia, Anh1) {
    fetch('update_db.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `idHH=${idHH}&TenHH=${TenHH}&SoLuong=${SoLuong}&Gia=${Gia}&Anh1=${Anh1}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
function redirectToPayPage(idHH, name, image, price) {
    window.location.href = `pay.php?idHH=${idHH}&name=${name}&image=${image}&price=${price}`;
}
</script>



