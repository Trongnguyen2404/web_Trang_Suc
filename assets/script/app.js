// Get DOM elements
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');
let carouselDom = document.querySelector('.carousel');
let SliderDom = carouselDom.querySelector('.carousel .list');
let thumbnailBorderDom = document.querySelector('.carousel .thumbnail');
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
let timeDom = document.querySelector('.carousel .time');

thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
let timeRunning = 3000;
let timeAutoNext = 7000;

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
}, timeAutoNext)

// Function to show slider
function showSlider(type){
    let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');
    
    if(type === 'next'){
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
    }, timeAutoNext)
}

// Function to go to a specific slide
function goToSlide(slideNumber) {
    let SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');

    // Convert slideNumber to string to match data-slide attribute value
    slideNumber = String(slideNumber);

    // Find the slide with the corresponding data-slide attribute
    let targetSlide = null;
    SliderItemsDom.forEach(item => {
        if (item.getAttribute('data-slide') === slideNumber) {
            targetSlide = item;
        }
    });

    if (targetSlide) {
        // Move the target slide to the beginning of the list
        SliderDom.insertBefore(targetSlide, SliderDom.firstChild);

        // Move the corresponding thumbnail to the beginning as well
        let thumbnailIndex;
        thumbnailItemsDom.forEach((item, index) => {
            if (item.getAttribute('data-slide') === slideNumber) {
                thumbnailIndex = index;
            }
        });
        if (thumbnailIndex !== undefined) {
            thumbnailBorderDom.insertBefore(thumbnailItemsDom[thumbnailIndex], thumbnailBorderDom.firstChild);
        }

        // Add class to trigger CSS animation
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
        setTimeout(() => {
            carouselDom.classList.add('next');
            setTimeout(() => {
                carouselDom.classList.remove('next');
            }, 500); // Match with CSS transition duration
        }, 10); // Ensure class is added before removing it
    }
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('thumbnail');
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext)
}
