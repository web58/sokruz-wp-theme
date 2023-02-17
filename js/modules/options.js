import {
  addLeadZero,
  showTabsSliderControl
} from './utils.js';

export const Options = {
  Swiper: {
    Hero: {
      slidesPerView: 1,
      spaceBetween: 0,
      autoHeight: true,
      loop: true,
      effect: 'fade',
      fadeEffect: {
        crossFade: true,
      },
      navigation: {
        nextEl: '.hero-slider__next',
        prevEl: '.hero-slider__prev',
      },
      pagination: {
        el: '.hero-slider__pagination',
        clickable: false,
      },
    },
    Actions: {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.action-products__pagination',
        clickable: false,
      },
      navigation: {
        nextEl: '.action-products__next',
        prevEl: '.action-products__prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    },
    Recomended: {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.recomended__pagination',
        clickable: false,
      },
      navigation: {
        nextEl: '.recomended__next',
        prevEl: '.recomended__prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    },
    MainAbout: {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      pagination: {
        el: '.m-about__slider-pagination',
        type: 'fraction',
        formatFractionCurrent: addLeadZero,
        formatFractionTotal: addLeadZero,
      },
      navigation: {
        nextEl: '.m-about__next',
        prevEl: '.m-about__prev',
      },
    },
    Popular: {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.tabs-products__popular-bullets',
        clickable: false,
      },
      navigation: {
        nextEl: '.tabs-products__popular-next',
        prevEl: '.tabs-products__popular-prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    },
    Novelties: {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.tabs-products__novelties-bullets',
        clickable: false,
      },
      navigation: {
        nextEl: '.tabs-products__novelties-next',
        prevEl: '.tabs-products__novelties-prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    },
    About: {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      pagination: {
        el: '.about-top-slider__pagination',
        clickable: false,
      },
      navigation: {
        nextEl: '.about-top-slider__next',
        prevEl: '.about-top-slider__prev',
      },
    },
    Product: {
      slidesPerView: 1,
      spaceBetween: 6,
      preloadImages: false,
      loop: true,
      lazy: true,
      pagination: {
        el: '.product-images__pagination',
        clickable: false,
      },
      navigation: {
        nextEl: '.product-images__next',
        prevEl: '.product-images__prev',
      },
    },
    ProductThumbs: {
      slidesPerView: 3,
      spaceBetween: 10,
      preloadImages: false,
      lazy: true,
      watchSlidesProgress: true,
      breakpoints: {
        768: {
          slidesPerView: 5,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    },
  },
  SmoothScroll: {
    speed: 900,
    speedAsDuration: true,
    updateURL: false,
  },
  Modal: {
    linkAttributeName: false,
    catchFocus: true,
    closeOnEsc: true,
    backscroll: true,
  },
  ValidationErrors: {
    errorFieldCssClass: 'invalid',
    errorLabelStyle: {
      color: '#E30613',
      marginTop: '6px',
      fontSize: '12px',
      textAlign: 'left',
    },
  },
  Observer: {
    ScrollTop: {
      rootMargin: '600px',
      threshold: 1,
    },
    Map: {
      rootMargin: '0px',
      threshold: 0.15,
    },
  },
  RequestOptions: {
    HandlerURL: WP_Options.AJAX_URL,
    MethodGet: 'GET',
    MethodPost: 'POST',
  },
  Tabs: {
    Product: {
      activeBtnClass: 'tabs-products__title--active',
      isChanged: ( tabs ) => {
        showTabsSliderControl( '.tabs-products__slider-control', tabs );
      }
    },
  },
  Map: {
    Main: {
      ID: 'company-map',
      center: WP_Options.MAP_COORD,
      zoom: 16,
      customIcon: true,
      customIconProperties: {
        iconImageHref: `${WP_Options.THEME_PATH}/img/pin-map.svg`,
        iconImageSize: [ 40, 44 ],
        iconImageOffset: [ -20, -40 ]
      },
    },
    Store: {
      ID: 'stores-map',
      zoom: 12,
      icon: {
        preset: 'islands#redIcon'
      }
    },
  },
  Accordion: {
    Materials: {
      speed: 200,
    },
    Filters: {
      speed: 200,
      showFirst: Boolean( WP_Options.FILTER_HIDE )
    },
    Layers: {
      speed: 200,
      showFirst: Boolean( WP_Options.LAYER_SHOW_FIRST ),
      showOnlyOne: Boolean( WP_Options.LAYER_SHOW_ONLY_ONE )
    },
  },
};
