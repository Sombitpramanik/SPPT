let bannerItems = document.getElementsByClassName("bannerItem");
bannerItems[0].style.backgroundImage = "url('Assets/BANNER IMAGES/b1.jpeg')";
bannerItems[1].style.backgroundImage = "url('Assets/BANNER IMAGES/b2.jpeg')";
bannerItems[2].style.backgroundImage = "url('Assets/BANNER IMAGES/b3.jpeg')";
bannerItems[3].style.backgroundImage = "url('Assets/BANNER IMAGES/b4.jpeg')";
let currentSlide = 0;

// Set initial slide
showSlide(currentSlide);

// Function to show slide
function showSlide(slideIndex) {
    // Hide all slides
    for (let i = 0; i < bannerItems.length; i++) {
        bannerItems[i].classList.remove("active");
    }

    // Show the current slide
    bannerItems[slideIndex].classList.add("active");
}

// Function to switch to next slide
function nextSlide() {
    currentSlide = (currentSlide + 1) % bannerItems.length;
    showSlide(currentSlide);
}

// Automatically switch to next slide every 20 seconds
setInterval(nextSlide, 20000);

let banner2 = document.getElementsByClassName("bannerItem2");
banner2[0].style.backgroundImage = "url('Assets/BANNER IMAGES/banner2/img1.jpg')";
banner2[1].style.backgroundImage = "url('Assets/BANNER IMAGES/banner2/img2.jpg')";
banner2[2].style.backgroundImage = "url('Assets/BANNER IMAGES/banner2/img3.jpg')";
banner2[3].style.backgroundImage = "url('Assets/BANNER IMAGES/banner2/img4.jpg')";
let banner2CurrentSlide = 0;

b2showSlide(banner2CurrentSlide)

function b2showSlide(slideIndex) {
    // Hide all slides
    for (let i = 0; i < banner2.length; i++) {
        banner2[i].classList.remove("active");
    }

    // Show the current slide
    banner2[slideIndex].classList.add("active");
}

function banner2NextSlide(){
    banner2CurrentSlide = (banner2CurrentSlide +1) % banner2.length;
    b2showSlide(banner2CurrentSlide);
}
setInterval(banner2NextSlide,10000);