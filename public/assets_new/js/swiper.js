let space = 60;
if (window.innerWidth < 500) {
  space = 40;
}
let swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  autoplay: {
    delay: 3000,
  },
  initialSlide: 2,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2,
    slideShadows: false,
  },
  spaceBetween: space,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
