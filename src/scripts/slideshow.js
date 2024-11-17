let currentSlideIndex = 0;
startSlideshow();

function startSlideshow() {
    const slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    currentSlideIndex++;
    if (currentSlideIndex > slides.length) { currentSlideIndex = 1; }
    slides[currentSlideIndex - 1].style.display = "block";
    setTimeout(startSlideshow, 6000); // Change slide every 4 seconds
}
