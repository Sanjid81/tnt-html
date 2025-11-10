    document.addEventListener('DOMContentLoaded', function () {
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
          disableOnInteraction: false,  // autoplay off hobe na click/swipe korleo
          reverseDirection: true,
        },
        freeMode: true,
        freeModeMomentum: false,
      });

      // Slide click listener
      swiper.slides.forEach(slide => {
        slide.addEventListener('click', () => {
          swiper.slideNext();  // click korle next slide e jabe
        });
      });

      // Note: slides may be duplicated by loop mode, so to catch all slides dynamically:
      swiper.on('slidesLengthChange', () => {
        swiper.slides.forEach(slide => {
          slide.addEventListener('click', () => {
            swiper.slideNext();
          });
        });
      });
    });

  





