import Swiper from 'swiper';
export default {
  init() {
    new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      loop: true,
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
