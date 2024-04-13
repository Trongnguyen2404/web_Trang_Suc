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

function updatePlaceholder() {
  let placeholders = [];

  if (span.innerText !== " ") {
    placeholders.push(span.innerText);
  }

  if (span1.innerText !== " ") {
    placeholders.push(span1.innerText);
  }

  if (span2.innerText !== " ") {
    placeholders.push(span2.innerText);
  }

  if (span3.innerText !== " ") {
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

for (item of listItems) {
  item.onclick = function (e) {
    span.innerText = e.target.innerText;
    updatePlaceholder();
  };
}

for (item of listItems1) {
  item.onclick = function (e) {
    span1.innerText = e.target.innerText;
    updatePlaceholder();
  };
}

for (item of listItems2) {
  item.onclick = function (e) {
    span2.innerText = e.target.innerText;
    updatePlaceholder();
  };
}

for (item of listItems3) {
  item.onclick = function (e) {
    span3.innerText = e.target.innerText;
    updatePlaceholder();
  };
}
