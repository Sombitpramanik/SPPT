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
