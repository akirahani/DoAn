const slideDetail = document.querySelectorAll('.slide-detail');
const slideAll = document.querySelector('.slide-all');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const dotsSlide = document.querySelector('dots-slide')


let numberImage = slideDetail.length;
let imageWidth = slideDetail[0].clientWidth;
let currentSlide = 0;

function init() {
    slideDetail.forEach((imgs, i) => {
        imgs.style.left = i * 100 + "%";
    });
}
init();


prevBtn.addEventListener("click", function() {
    if (currentSlide <= 0) {
        slideDo(numberImage - 1);
        currentSlide = numberImage - 1;
        return currentSlide;
    }

    currentSlide--;
    slideDo(currentSlide);

});



nextBtn.addEventListener("click", function() {
    if (currentSlide >= numberImage - 1) {
        slideDo(0);
        currentSlide = 0;
        return currentSlide;
    }

    currentSlide++;
    slideDo(currentSlide);
});

function slideDo(doImage) {
    slideAll.style.transform = "translateX(-" + imageWidth * doImage + "px)";

}