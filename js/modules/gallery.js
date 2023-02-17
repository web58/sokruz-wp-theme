const initProductsGalleries = () => {
  const GALLERIES = document.querySelectorAll( '[data-gallery]' );
  if ( GALLERIES.length < 1 ) return;
  GALLERIES.forEach( ( gallery, index ) => {
    gallery.querySelectorAll( '[data-fslightbox]' ).forEach( item => {
      item.dataset.fslightbox = `gallery-id-${index}`;
    } );
  } );
  refreshFsLightbox(); // eslint-disable-line
};

initProductsGalleries();
