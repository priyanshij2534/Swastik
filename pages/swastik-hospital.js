// text slider
let slides = document.querySelectorAll('.banner-slide');
let index = 0;

// next function
function next(){
    slides[index].classList.remove('active');
    index = (index+1) % slides.length;
    slides[index].classList.add('active');
}

// autoplay
setInterval(next, 7000);