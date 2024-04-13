// Get DOM elements
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');
let carouselDom = document.querySelector('.carousel');
let SliderDom = carouselDom.querySelector('.carousel .list');
let thumbnailBorderDom = document.querySelector('.carousel .thumbnail');
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
let timeDom = document.querySelector('.carousel .time');
let timeRunning = 3000;
let timeAutoNext = 70000;
thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
// Add event listeners for next and prev buttons
nextDom.onclick = function(){
    showSlider('next');    
}

prevDom.onclick = function(){
    showSlider('prev');    
}

// Add event listeners for thumbnail items
thumbnailItemsDom.forEach(item => {
    item.addEventListener('click', function() {
        let slideNumber = item.getAttribute('data-slide');
        goToSlide(slideNumber);
    });
});

let runTimeOut;
let runNextAuto = setTimeout(() => {
    next.click();
}, timeAutoNext);

// Function to show slider
// Function to show slider
function showSlider(type){
    let SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');

    // Lấy slide hiện tại
    let currentSlideIndex = Array.from(SliderItemsDom).findIndex(item => item.classList.contains('active'));
    let nextSlideIndex;

    // Nếu không tìm thấy slide nào được đánh dấu là active, mặc định chọn slide đầu tiên
    if (currentSlideIndex === -1) {
        currentSlideIndex = 0;
    }

    // Tính toán slide tiếp theo dựa trên type (next hoặc prev)
    if (type === 'next') {
        nextSlideIndex = (currentSlideIndex + 1) % SliderItemsDom.length; // Lặp lại từ slide 1 nếu đang ở slide cuối cùng
    } else {
        nextSlideIndex = (currentSlideIndex - 1 + SliderItemsDom.length) % SliderItemsDom.length; // Lặp lại từ slide cuối cùng nếu đang ở slide 1
    }

    // Chuyển slide kế tiếp hoặc trước đó
    if (type === 'next'){
        SliderDom.appendChild(SliderItemsDom[0]);
        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        carouselDom.classList.add('next');
    }else{
        SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
        thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]); 
        carouselDom.classList.add('prev');
    }
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext);
}



// Function to go to a specific slide
// Function to go to a specific slide
function goToSlide(slideNumber) {
    let SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailArray = Array.from(thumbnailItemsDom);

    // Find the index of the clicked slide in the thumbnail array
    let clickedIndex = thumbnailArray.findIndex(item => item.getAttribute('data-slide') === slideNumber);

    // Rearrange thumbnail items based on the clicked slide
    thumbnailArray = thumbnailArray.slice(clickedIndex).concat(thumbnailArray.slice(0, clickedIndex+1));
    
    // Remove existing thumbnails and append the rearranged ones
    thumbnailBorderDom.innerHTML = ''; // Clear existing thumbnails
    thumbnailArray.forEach(item => thumbnailBorderDom.appendChild(item));

    // Rearrange slider items based on the clicked thumbnail
    let sliderItemsArray = Array.from(SliderItemsDom);
    let clickedSlide = sliderItemsArray.find(item => item.getAttribute('data-slide') === slideNumber);
    let clickedIndexInSlider = sliderItemsArray.indexOf(clickedSlide);
    let rearrangedSliderItems = sliderItemsArray.slice(clickedIndexInSlider).concat(sliderItemsArray.slice(0, clickedIndexInSlider));
    SliderDom.innerHTML = ''; // Clear existing slider items
    rearrangedSliderItems.forEach(item => SliderDom.appendChild(item));

    // Add class to trigger CSS animation
    carouselDom.classList.remove('next');
    carouselDom.classList.remove('prev');
    setTimeout(() => {
        carouselDom.classList.add('next');
        setTimeout(() => {
            carouselDom.classList.remove('next');
        }, 500); // Match with CSS transition duration
    }, 10); // Ensure class is added before removing it

    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('thumbnail');
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext);
}


