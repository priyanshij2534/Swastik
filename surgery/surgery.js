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


// review slider
var indexValue = 1;
showText(indexValue);

function btm_slide(e) {
  showText(indexValue = e);
}

function side_slide(e) {
  showText(indexValue += e);
}

function showText(e) {
  var i;
  const text = document.getElementsByClassName('review-text');

  if (e > text.length) {
    indexValue = 1
  }

  if (e < 1) {
    indexValue = text.length
  }

  for (i = 0; i < text.length; i++) {
    text[i].style.display = "none";
  }

  text[indexValue - 1].style.display = "block";
}

// popup
function togglePopup(idname) {
  document.getElementById(idname).classList.toggle("active");
}

function login(){
  window.location.href = "../sign-up/login.php";
}