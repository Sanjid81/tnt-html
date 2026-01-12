document.addEventListener('DOMContentLoaded', function () {
  const autoSwiper = new Swiper('.company-swiper', {
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 13,
    speed: 5000,                    // Smooth slow movement – adjust 12000–25000 for speed
    autoplay: {
      delay: 0,                    // No pause = constant smooth scroll
      disableOnInteraction: false, // Keeps going even after touch
      reverseDirection: true,      // Scrolls left (change to false for right)
    },
    freeMode: true,
    freeModeMomentum: false,
    grabCursor: true,
    allowTouchMove: true,

    breakpoints: {
      0: {
        spaceBetween: 10,
      },
      801: {
        spaceBetween: 20,
      }
    }
  });

  // Optional: Click any logo to move forward
  autoSwiper.slides.forEach(slide => {
    slide.addEventListener('click', () => {
      autoSwiper.slideNext();
    });
  });

  // Re-attach listeners if slides change dynamically (rarely needed)
  autoSwiper.on('slidesLengthChange', () => {
    autoSwiper.slides.forEach(slide => {
      slide.addEventListener('click', () => {
        autoSwiper.slideNext();
      });
    });
  });
});