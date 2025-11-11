document.addEventListener('DOMContentLoaded', function () {
  // -------- Desktop Swiper --------
  const autoSwiper = new Swiper('.company-swiper', {
    loop: true,
    spaceBetween: 30,
    slidesPerView: 'auto',
    allowTouchMove: true,
    grabCursor: true,
    simulateTouch: true,
    speed: 10000,
    autoplay: {
      delay: 0,
      disableOnInteraction: false, // autoplay off hobe na click/swipe korleo
      reverseDirection: true, // left e scroll hobe
    },
    freeMode: true,
    freeModeMomentum: false,
  });

  // Slide click listener (desktop)
  autoSwiper.slides.forEach(slide => {
    slide.addEventListener('click', () => {
      autoSwiper.slideNext();
    });
  });

  autoSwiper.on('slidesLengthChange', () => {
    autoSwiper.slides.forEach(slide => {
      slide.addEventListener('click', () => {
        autoSwiper.slideNext();
      });
    });
  });


});


document.addEventListener('DOMContentLoaded', function () {
  // -------- Desktop Swiper --------
  const autoSwiper_two = new Swiper('.company-swiper-two', {
    loop: true,
    spaceBetween: 30,
    slidesPerView: 'auto',
    allowTouchMove: true,
    grabCursor: true,
    simulateTouch: true,
    speed: 10000,
    autoplay: {
      delay: 0,
      disableOnInteraction: false, // autoplay off hobe na click/swipe korleo
      reverseDirection: true, // left e scroll hobe
    },
    freeMode: true,
    freeModeMomentum: false,
  });

  // Slide click listener (desktop)
  autoSwiper_two.slides.forEach(slide => {
    slide.addEventListener('click', () => {
      autoSwiper_two.slideNext();
    });
  });

  autoSwiper_two.on('slidesLengthChange', () => {
    autoSwiper_two.slides.forEach(slide => {
      slide.addEventListener('click', () => {
        autoSwiper_two.slideNext();
      });
    });
  });


});


