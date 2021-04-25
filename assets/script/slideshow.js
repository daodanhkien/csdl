
//khai báo biến slideIndex đại diện cho slide hiện tại
var slideIndex;
// KHai bào hàm hiển thị slide

var list_slide_show = Array(
  "url('./assets/img/restaurant-mural-wallpaper_23-2148706052.jpg')",
  "url('./assets/img/1140x400---category----fastfood.jpg')",
  "url('./assets/img/bgrpic-copy-19.jpg')");
var slides = document.getElementsByClassName("slide-shows");
for (let i = 0; i < slides.length; ++i) {
  slides[i].style.backgroundImage = list_slide_show[i];
}
var timeOut;
function showSlides() {
    var i;
    slides = document.getElementsByClassName("slide-shows");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
       dots[i].style.backgroundColor = "#fff";
    }

    slides[slideIndex].style.display = "block";
    dots[slideIndex].style.backgroundColor = "#000";
    //chuyển đến slide tiếp theo
    slideIndex++;
    //nếu đang ở slide cuối cùng thì chuyển về slide đầu
    if (slideIndex > slides.length - 1) {
      slideIndex = 0
    }    
    //tự động chuyển đổi slide sau 5s
    timeOut = setTimeout(showSlides, 10000);
}
//mặc định hiển thị slide đầu tiên 
showSlides(slideIndex = 0);


function currentSlide(n) {
  clearTimeout(timeOut);
  showSlides(slideIndex = n);
}
