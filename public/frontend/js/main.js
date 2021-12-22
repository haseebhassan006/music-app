/**slider**/

  new Swiper('.song-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 5.5,
        spaceBetween: 20
      }
    }
  });

  /**play slider**/

  new Swiper('.play-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 4500,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 10.5,
        spaceBetween: 10
      }
    }
  });

/**bottom slider**/

  new Swiper('.btm-song-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 4.5,
        spaceBetween: 20
      }
    }
  });
