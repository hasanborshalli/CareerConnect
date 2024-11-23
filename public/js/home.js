function scrollingLeft() {
    document
        .querySelector(".categories")
        .scrollBy({ left: -220, behavior: "smooth" });
}

function scrollRight() {
    document
        .querySelector(".categories")
        .scrollBy({ left: 220, behavior: "smooth" });
}
let currentIndex = 0;

function showNext() {
    const slides = document.querySelectorAll(".carousel-content .job-slide");
    if (currentIndex < slides.length - 1) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    updateCarousel();
}

function showPrev() {
    const slides = document.querySelectorAll(".carousel-content .job-slide");
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = slides.length - 1;
    }
    updateCarousel();
}

function updateCarousel() {
    const carouselContent = document.querySelector(".carousel-content");
    carouselContent.style.transform = `translateX(-${currentIndex * 100}%)`;
}
