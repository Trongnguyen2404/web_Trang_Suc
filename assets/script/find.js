let dropdownBtnText = document.getElementById("drop-text");
let dropdownBtnText1 = document.getElementById("drop-text1");
let dropdownBtnText2 = document.getElementById("drop-text2");
let dropdownBtnText3 = document.getElementById("drop-text3");

let span = document.getElementById("span");
let span1 = document.getElementById("span1");
let span2 = document.getElementById("span2");
let span3 = document.getElementById("span3");

let icon = document.getElementById("icon");
let icon1 = document.getElementById("icon1");
let icon2 = document.getElementById("icon2");
let icon3 = document.getElementById("icon3");

let list = document.getElementById("list");
let list1 = document.getElementById("list1");
let list2 = document.getElementById("list2");
let list3 = document.getElementById("list3");

let input = document.getElementById("search-input");

let listItems = document.querySelectorAll(".dropdown-list-item");
let listItems1 = document.querySelectorAll(".dropdown-list1-item");
let listItems2 = document.querySelectorAll(".dropdown-list2-item");
let listItems3 = document.querySelectorAll(".dropdown-list3-item");

function saveScrollPosition() {
  localStorage.setItem('scrollPosition', window.scrollY.toString());
}

function restoreScrollPosition() {
  let scrollPosition = localStorage.getItem('scrollPosition');
  if (scrollPosition) {
    window.scrollTo(0, parseInt(scrollPosition));
    localStorage.removeItem('scrollPosition');
  }
}

function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, '\\$&');
  let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function saveSearchKeywordToLocalStorage(keyword) {
  localStorage.setItem('searchKeyword', keyword);
}

function getSearchKeywordFromLocalStorage() {
  return localStorage.getItem('searchKeyword') || "";
}

function restoreSearchKeyword() {
  input.value = getSearchKeywordFromLocalStorage();
}

function closeAllDropdowns() {
  list.classList.remove("show");
  icon.style.transform = "rotate(0deg)";
  list1.classList.remove("show");
  icon1.style.transform = "rotate(0deg)";
  list2.classList.remove("show");
  icon2.style.transform = "rotate(0deg)";
  list3.classList.remove("show");
  icon3.style.transform = "rotate(0deg)";
}

function saveToLocalStorage() {
  localStorage.setItem('spanValue', span.innerText);
  localStorage.setItem('span1Value', span1.innerText);
  localStorage.setItem('span2Value', span2.innerText);
  localStorage.setItem('span3Value', span3.innerText);
}


function addClickEvents(items, spanElement, updatePlaceholderFunc) {
  for (let item of items) {
    item.onclick = function (e) {
      spanElement.innerText = e.target.innerText;
      applyFilters();
      updatePlaceholderFunc();
      saveToLocalStorage();
    };
  }
}

addClickEvents(listItems, span, updatePlaceholder);
addClickEvents(listItems1, span1, updatePlaceholder);
addClickEvents(listItems2, span2, updatePlaceholder);
addClickEvents(listItems3, span3, updatePlaceholder);

function updatePlaceholder() {
  let placeholders = [];

  if (span.innerText !== "all materials") {
    placeholders.push(span.innerText);
  }

  if (span1.innerText !== "single and double") {
    placeholders.push(span1.innerText);
  }

  if (span2.innerText !== "All price ranges") {
    placeholders.push(span2.innerText);
  }

  if (span3.innerText !== "Sorted by") {
    placeholders.push(span3.innerText);
  }

  if (placeholders.length > 0) {
    input.placeholder = "Search in " + placeholders.join(", ");
  } else {
    input.placeholder = "Search in all materials, single and double, All price ranges";
  }
}

dropdownBtnText.onclick = function () {
  closeAllDropdowns();
  list.classList.toggle("show");
  icon.style.transform = icon.style.transform === "rotate(-180deg)" ? "rotate(0deg)" : "rotate(-180deg)";
  updatePlaceholder();
};

dropdownBtnText1.onclick = function () {
  closeAllDropdowns();
  list1.classList.toggle("show");
  icon1.style.transform = icon1.style.transform === "rotate(-180deg)" ? "rotate(0deg)" : "rotate(-180deg)";
  updatePlaceholder();
};

dropdownBtnText2.onclick = function () {
  closeAllDropdowns();
  list2.classList.toggle("show");
  icon2.style.transform = icon2.style.transform === "rotate(-180deg)" ? "rotate(0deg)" : "rotate(-180deg)";
  updatePlaceholder();
};

dropdownBtnText3.onclick = function () {
  closeAllDropdowns();
  list3.classList.toggle("show");
  icon3.style.transform = icon3.style.transform === "rotate(-180deg)" ? "rotate(0deg)" : "rotate(-180deg)";
  updatePlaceholder();
};

window.onclick = function (e) {
  if (
    e.target.id !== "drop-text" &&
    e.target.id !== "icon" &&
    e.target.id !== "span" &&
    e.target.id !== "drop-text1" &&
    e.target.id !== "icon1" &&
    e.target.id !== "span1" &&
    e.target.id !== "drop-text2" &&
    e.target.id !== "icon2" &&
    e.target.id !== "span2" &&
    e.target.id !== "drop-text3" &&
    e.target.id !== "icon3" &&
    e.target.id !== "span3"
  ) {
    closeAllDropdowns();
  }
};

document.addEventListener('DOMContentLoaded', function() {
  restoreFromLocalStorage();
  restoreScrollPosition();
});

function isDefaultURL() {
  let currentPage = new URL(window.location.href).searchParams.get('page') || '1'; // Mặc định là trang 1 nếu không có tham số page
  return window.location.href === 'http://localhost/web_Trang_Suc/page.php?page=${currentPage}';
}
function handleSearchInput() {
  let keyword = input.value.trim();

  if (keyword !== ' ') {
    let searchKeyword = `&searchKeyword=${encodeURIComponent(keyword)}`;
    applyFilters(searchKeyword);
  } else {
    applyFilters(""); 
  }
}


input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    handleSearchInput();
  }
});
function isDefaultPage() {
  let currentPage = new URL(window.location.href).searchParams.get('page');
  return ['1', '2', '3', '4', '5', '6'].includes(currentPage);
}

document.addEventListener('DOMContentLoaded', function() {
  restoreFromLocalStorage();
  restoreScrollPosition();
  
  if (isDefaultPage()) {
    span.innerText = "all materials";
    span1.innerText = "single and double";
    span2.innerText = "All price ranges";
    span3.innerText = "sorted by";
    
    updateDropdownValues();
    updatePlaceholder();
  }
});

addClickEventsForSorting(listItems3);
function applyFilters(searchKeyword = "", sortedBuy = "") {
  let material = span.innerText;
  let type = span1.innerText;
  let priceRange = span2.innerText;

  // Lấy trang hiện tại từ URL
  let currentPage = new URL(window.location.href).searchParams.get('page') || '1';

  // Kiểm tra và giữ lại searchKeyword nếu nó tồn tại
  let currentURL = new URL(window.location.href);
  let existingSearchKeyword = currentURL.searchParams.get('searchKeyword');
  
  if (existingSearchKeyword && !searchKeyword) {
    searchKeyword = `&searchKeyword=${encodeURIComponent(existingSearchKeyword)}`;
  } else if (!searchKeyword) {
    searchKeyword = ""; 
  }

  // Kiểm tra và giữ lại sortedBuy nếu nó tồn tại
  let existingSortedBuy = currentURL.searchParams.get('sortedBuy');
  
  if (existingSortedBuy && !sortedBuy) {
    sortedBuy = `&sortedBuy=${encodeURIComponent(existingSortedBuy)}`;
  } else if (!sortedBuy) {
    sortedBuy = `&sortedBuy=${encodeURIComponent("newest")}`; // Thiết lập mặc định cho sortedBuy là "Latest"
  }

  if (searchKeyword === "") {
    input.value = searchKeyword;
  } else {
    input.value = searchKeyword.substring("&searchKeyword=".length);
  }

  saveScrollPosition();

  // Tạo URL với trang hiện tại
  window.location.href = `page.php?page=${currentPage}&material=${material}&type=${type}&priceRange=${priceRange}${searchKeyword}${sortedBuy}`;

  saveSearchKeywordToLocalStorage(searchKeyword);
}

function updateDropdownValues() {
  span.innerText = getParameterByName('material') || span.innerText;
  span1.innerText = getParameterByName('type') || span1.innerText;
  span2.innerText = getParameterByName('priceRange') || span2.innerText;
  span3.innerText = getParameterByName('sortedBuy') || span3.innerText; // Cập nhật dòng này
}
function addClickEventsForSorting(items) {
  for (let item of items) {
    item.onclick = function (e) {
      let sortedBuy = e.target.innerText;
      span3.innerText = sortedBuy; // Cập nhật giá trị của span3
      applyFilters("", `&sortedBuy=${encodeURIComponent(sortedBuy)}`);
      updatePlaceholder(); // Cập nhật placeholder sau khi chọn
      saveToLocalStorage(); // Lưu giá trị đã chọn vào localStorage
    };
  }
}
function restoreFromLocalStorage() {
  if (isDefaultURL()) {
    span.innerText = "all materials";
    span1.innerText = "single and double";
    span2.innerText = "All price ranges";
    span3.innerText = "newest"; // Thiết lập mặc định cho sortedBuy là "Latest"
  } else {
    span.innerText = localStorage.getItem('spanValue') || "all materials";
    span1.innerText = localStorage.getItem('span1Value') || "single and double";
    span2.innerText = localStorage.getItem('span2Value') || "All price ranges";
    span3.innerText = localStorage.getItem('span3Value') || "sorted by"; // Thiết lập mặc định cho sortedBuy là "Latest"
  }
  
  updateDropdownValues();
  updatePlaceholder();
}
