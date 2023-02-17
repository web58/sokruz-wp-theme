import {
  Options,
} from './options.js';

const initSlider = ( selector, options ) => {
  if ( !document.querySelector( selector ) ) return;
  const slider = new Swiper( document.querySelector( selector ), options );
  return slider;
};

initSlider( '.hero-slider', Options.Swiper.Hero );
initSlider( '.action-products__slider', Options.Swiper.Actions );
initSlider( '.m-about__slider', Options.Swiper.MainAbout );
initSlider( '.tabs-products__popular', Options.Swiper.Popular );
initSlider( '.tabs-products__novelties', Options.Swiper.Novelties );
initSlider( '.about-top-slider', Options.Swiper.About );
initSlider( '.recomended__slider', Options.Swiper.Recomended );
initSlider( '.product-images__slider', Object.assign( Options.Swiper.Product, {
  thumbs: {
    swiper: initSlider( '.product-images__thumbs', Options.Swiper.ProductThumbs ),
  },
} ) );
