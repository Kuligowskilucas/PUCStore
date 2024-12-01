document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper('.swiper-container', {
      loop: true,
      autoplay: {
          delay: 3000,
          disableOnInteraction: false,
      },
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      slidesPerView: 1,
      spaceBetween: 20,
      breakpoints: {
          640: {
              slidesPerView: 2,
              spaceBetween: 30,
          },
          1024: {
              slidesPerView: 3,
              spaceBetween: 40,
          },
      },
  });
});