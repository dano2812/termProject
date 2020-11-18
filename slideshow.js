var slideIndex = -1;
var slidesArr = ["building1.jpg", "building2.jpg", "building3.jpg", "building4.jpg"];
var stopLastTime = 0;
showSlides();

// Next/previous controls
function plusSlides(n) {
    showSlides(n);
    stopLastTime = stopLastTime+1;
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";

    if(stopLastTime == 0)
    {
        setTimeout(showSlides, 4000);
    }
    if( stopLastTime > 0)
        stopLastTime--;
}