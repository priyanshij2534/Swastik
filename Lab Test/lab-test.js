// text slider
let slides = document.querySelectorAll('.banner-slide');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index+1) % slides.length;
    slides[index].classList.add('active');
}

setInterval(next, 7000);

// Our Service
$(".carousel").owlCarousel({
  margin: 20,
  loop: true,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
      nav: false
    },
    600: {
      items: 2,
      nav: false
    },
    1000: {
      items: 2,
      nav: false
    },
  },
});

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

// searching
$(document).ready(function () {
  $("#search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "action.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });

  $(document).on("click", "a", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});