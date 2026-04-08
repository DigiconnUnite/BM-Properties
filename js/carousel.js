(function ($) {
  var Spanizer = (function () {
    var settings = {
      letters: $(".js-letters"),
    };
    return {
      init: function () {
        this.bind();
      },
      bind: function () {
        Spanizer.doSpanize();
      },
      doSpanize: function () {
        settings.letters.html(function (i, el) {
          var spanize = $.trim(el).split("");
          var template = "<span>" + spanize.join("</span><span>") + "</span>";
          return template;
        });
      },
    };
  })();

  if (matchMedia("only screen and (min-width: 991px)").matches) {
    Spanizer.init();
  }
})(jQuery);

if ($(".thumbs-swiper-column").length > 0) {
  var swiperthumbs = new Swiper(".thumbs-swiper-column1", {
    spaceBetween: 0,
    slidesPerView: 4,
    freeMode: true,
    direction: "vertical",
    watchSlidesProgress: true,
  });

  var swiper2 = new Swiper(".thumbs-swiper-column", {
    spaceBetween: 0,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    speed: 500,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    thumbs: {
      swiper: swiperthumbs,
    },
  });
}

if ($(".slider-sw-home2").length > 0) {
  var swiper2 = new Swiper(".slider-sw-home2", {
    spaceBetween: 0,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    speed: 2000,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
  });
}

if ($(".tf-sw-location").length > 0) {
  $(".tf-sw-location").each(function () {
    var $swiper = $(this);
    var preview = Number($swiper.data("preview")) || 1;
    var tablet = Number($swiper.data("tablet")) || preview;
    var mobile = Number($swiper.data("mobile")) || 1;
    var mobileSm = Number($swiper.data("mobile-sm")) || mobile;
    var spacingLg = Number($swiper.data("space-lg")) || 0;
    var spacingMd = Number($swiper.data("space-md")) || spacingLg;
    var spacing = Number($swiper.data("space")) || spacingMd;
    var perGroup = Number($swiper.data("pagination-sm")) || 1;
    var perGroupSm = Number($swiper.data("pagination")) || perGroup;
    var perGroupMd = Number($swiper.data("pagination-md")) || perGroupSm;
    var perGroupLg = Number($swiper.data("pagination-lg")) || perGroupMd;
    var loop = $swiper.data("loop") === true;
    var autoplay = $swiper.data("autoplay") === true;
    var delay = Number($swiper.data("delay")) || 2800;

    new Swiper(this, {
      slidesPerView: mobile,
      spaceBetween: spacing,
      loop: loop,
      autoplay: autoplay
        ? {
            delay: delay,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          }
        : false,
      pagination: {
        el: $swiper.find(".sw-pagination-location")[0],
        clickable: true,
      },
      slidesPerGroup: perGroup,
      navigation: {
        clickable: true,
        nextEl: $swiper.find(".nav-prev-location")[0],
        prevEl: $swiper.find(".nav-next-location")[0],
      },
      breakpoints: {
        575: {
          slidesPerView: mobileSm,
          spaceBetween: spacing,
          slidesPerGroup: perGroupSm,
        },
        768: {
          slidesPerView: tablet,
          spaceBetween: spacingMd,
          slidesPerGroup: perGroupMd,
        },
        1150: {
          slidesPerView: preview,
          spaceBetween: spacingLg,
          slidesPerGroup: perGroupLg,
        },
      },
    });
  });
}

if ($(".tf-sw-latest").length > 0) {
  var preview = $(".tf-sw-latest").data("preview");
  var tablet = $(".tf-sw-latest").data("tablet");
  var mobile = $(".tf-sw-latest").data("mobile");
  var mobileSm = $(".tf-sw-latest").data("mobile-sm");
  var spacingLg = $(".tf-sw-latest").data("space-lg");
  var spacingMd = $(".tf-sw-latest").data("space-md");
  var spacing = $(".tf-sw-latest").data("space");
  var swiper = new Swiper(".tf-sw-latest", {
    slidesPerView: mobile,
    spaceBetween: spacing,
    pagination: {
      el: ".sw-pagination-latest",
      clickable: true,
    },
    navigation: {
      clickable: true,
      nextEl: ".nav-prev-latest",
      prevEl: ".nav-next-latest",
    },
    breakpoints: {
      575: {
        slidesPerView: mobileSm,
        spaceBetween: spacing,
      },
      768: {
        slidesPerView: tablet,
        spaceBetween: spacingMd,
      },
      1150: {
        slidesPerView: preview,
        spaceBetween: spacingLg,
      },
    },
  });
}

if ($(".tf-sw-testimonial").length > 0) {
  $(".tf-sw-testimonial").each(function () {
    var $swiper = $(this);
    var mobile = Number($swiper.data("mobile")) || 1;
    var mobileSm = Number($swiper.data("mobile-sm")) || mobile;
    var tablet = Number($swiper.data("tablet")) || mobileSm;
    var preview = Number($swiper.data("preview")) || tablet;
    var spacing = Number($swiper.data("space")) || 0;
    var spacingMd = Number($swiper.data("space-md")) || spacing;
    var spacingLg = Number($swiper.data("space-lg")) || spacingMd;
    var centered = $swiper.data("centered") === true;
    var loop = $swiper.data("loop") !== false;
    var autoplay = $swiper.data("autoplay") !== false;
    var delay = Number($swiper.data("delay")) || 3000;

    new Swiper(this, {
      slidesPerView: mobile,
      spaceBetween: spacing,
      navigation: {
        clickable: true,
        nextEl: $swiper.find(".nav-prev-testimonial")[0],
        prevEl: $swiper.find(".nav-next-testimonial")[0],
      },
      pagination: {
        el: $swiper.find(".sw-pagination-testimonial")[0],
        clickable: true,
      },
      loop: loop,
      autoplay: autoplay
        ? {
            delay: delay,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          }
        : false,
      breakpoints: {
        575: {
          slidesPerView: mobileSm,
          spaceBetween: spacing,
        },
        800: {
          slidesPerView: tablet,
          spaceBetween: spacingMd,
          centeredSlides: false,
        },
        1440: {
          slidesPerView: preview,
          spaceBetween: spacingLg,
          centeredSlides: centered,
        },
      },
    });
  });
}

if ($(".tf-sw-partner").length > 0) {
  var preview = $(".tf-sw-partner").data("preview");
  var tablet = $(".tf-sw-partner").data("tablet");
  var mobile = $(".tf-sw-partner").data("mobile");
  var mobileSm = $(".tf-sw-partner").data("mobile-sm");

  var spacing = $(".tf-sw-partner").data("space");
  var spacingMd = $(".tf-sw-partner").data("space-md");
  var spacingLg = $(".tf-sw-partner").data("space-lg");

  var swiper = new Swiper(".tf-sw-partner", {
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    slidesPerView: mobile,
    spaceBetween: spacing,
    loop: true,
    speed: 3000,
    navigation: {
      clickable: true,
      nextEl: ".nav-prev-partner",
      prevEl: ".nav-next-partner",
    },
    pagination: {
      el: ".sw-pagination-partner",
      clickable: true,
    },
    breakpoints: {
      575: {
        slidesPerView: mobileSm,
        spaceBetween: spacing,
      },
      768: {
        slidesPerView: tablet,
        spaceBetween: spacingMd,
      },

      1200: {
        slidesPerView: preview,
        spaceBetween: spacingLg,
      },
    },
  });
  $(".tf-sw-partner").hover(
    function () {
      this.swiper.autoplay.stop();
    },
    function () {
      this.swiper.autoplay.start();
    }
  );
}

if ($(".tf-sw-categories").length > 0) {
  var preview = $(".tf-sw-categories").data("preview");
  var tablet = $(".tf-sw-categories").data("tablet");
  var mobile = $(".tf-sw-categories").data("mobile");
  var mobileSm = $(".tf-sw-categories").data("mobile-sm");

  var spacing = $(".tf-sw-categories").data("space");
  var spacingMd = $(".tf-sw-categories").data("space-md");
  var spacingLg = $(".tf-sw-categories").data("space-lg");
  var swiper = new Swiper(".tf-sw-categories", {
    slidesPerView: mobile,
    spaceBetween: spacing,
    navigation: {
      clickable: true,
      nextEl: ".nav-prev-category",
      prevEl: ".nav-next-category",
    },
    pagination: {
      el: ".sw-pagination-category",
      clickable: true,
    },
    breakpoints: {
      575: {
        slidesPerView: mobileSm,
        spaceBetween: spacing,
      },
      768: {
        slidesPerView: tablet,
        spaceBetween: spacingMd,
      },

      1200: {
        slidesPerView: preview,
        spaceBetween: spacingLg,
      },
    },
  });
}




if ($(".tf-sw-auto").length > 0) {
  var loop = $(".tf-sw-auto").data("loop");

  var swiper = new Swiper(".tf-sw-auto", {
    // autoplay: {
    //   delay: 1500,
    //   disableOnInteraction: false,
    //   pauseOnMouseEnter: true,
    // },
    speed: 2000,
    slidesPerView: "auto",
    spaceBetween: 20,
    loop: loop,
    navigation: {
      clickable: true,
      nextEl: ".nav-prev-category",
      prevEl: ".nav-next-category",
    },
  });
}

var pagithumbs = new Swiper(".thumbs-sw-pagi", {
  spaceBetween: 14,
  slidesPerView: "auto",
  freeMode: true,
  watchSlidesProgress: true,
  breakpoints: {
    375: {
      slidesPerView: 3,
      spaceBetween: 14,
    },
    500: {
      slidesPerView: "auto",
    },
  },
});

var swiperSingle = new Swiper(".sw-single", {
  spaceBetween: 16,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  speed: 500,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
  thumbs: {
    swiper: pagithumbs,
  },
  navigation: {
    clickable: true,
    nextEl: ".nav-prev-single",
    prevEl: ".nav-next-single",
  },
});

if ($(".tf-sw-result").length > 0) {
  var swiper = new Swiper(".tf-sw-result", {
    slidesPerView: 1,
    spaceBetween: 15,
    navigation: {
      clickable: true,
      nextEl: ".nav-next-result",
      prevEl: ".nav-prev-result",
    },
    loop: true,
    pagination: {
      el: ".sw-pagination-result",
      clickable: true,
    },
    breakpoints: {
      600: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 30,
      },

      1550: {
        slidesPerView: 5.2,
        spaceBetween: 30,
      },
    },
  });
}

if ($(".tf-sw-mobile").length > 0) {
  var swiperMb;
  var screenWidth = $('.tf-sw-mobile').data('screen');
  function initSwiper() {
    if (matchMedia(`only screen and (max-width: ${screenWidth}px)`).matches) {
      if (!swiperMb) {
        var preview = $(".tf-sw-mobile").data("preview");
        var spacing = $(".tf-sw-mobile").data("space");

        swiperMb = new Swiper(".tf-sw-mobile", {
          slidesPerView: preview,
          spaceBetween: spacing,
          speed: 1000,
          pagination: {
            el: ".sw-pagination-mb",
            clickable: true,
          },
          navigation: {
            clickable: true,
            nextEl: ".nav-prev-mb",
            prevEl: ".nav-next-mb",
          },
        });
      }
    } else {
      if (swiperMb) {
        swiperMb.destroy(true, true); 
        swiperMb = null; 
        $(".tf-sw-mobile .swiper-wrapper").removeAttr('style');
        $(".tf-sw-mobile .swiper-slide").removeAttr('style');
      }
    }
  }

  initSwiper();
  window.addEventListener("resize", function () {
    initSwiper();
  });
}

if ($(".tf-sw-mobile-1").length > 0) {
  let swiperMb;
  let screenWidth = $('.tf-sw-mobile-1').data('screen');
  function initSwiperMb() {
    if (matchMedia(`only screen and (max-width: ${screenWidth}px)`).matches) {
      if (!swiperMb) {
        let preview = $(".tf-sw-mobile-1").data("preview");
        let spacing = $(".tf-sw-mobile-1").data("space");

        swiperMb = new Swiper(".tf-sw-mobile-1", {
          slidesPerView: preview,
          spaceBetween: spacing,
          speed: 1000,
          pagination: {
            el: ".sw-pagination-mb-1",
            clickable: true,
          },
          navigation: {
            clickable: true,
            nextEl: ".nav-prev-mb-1",
            prevEl: ".nav-next-mb-1",
          },
        });
      }
    } else {
      if (swiperMb) {
        swiperMb.destroy(true, true); 
        swiperMb = null; 
        $(".tf-sw-mobile-1 .swiper-wrapper").removeAttr('style');
        $(".tf-sw-mobile-1 .swiper-slide").removeAttr('style');
      }
    }
  }

  initSwiperMb();
  window.addEventListener("resize", function () {
    initSwiperMb();
  });
}
