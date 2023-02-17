const observeSiteHeader = () => {
  const topNode = document.querySelector( '#site-top' );
  const siteHeaderNode = document.querySelector( '.site-header' );
  const siteHeaderFixedNode = document.querySelector( '.site-header-fixed' );
  if ( !siteHeaderNode || !siteHeaderFixedNode ) return;
  const OBSERVE_OPTIONS = {
    rootMargin: `${siteHeaderNode.clientHeight}px`,
    threshold: 0
  };

  const cb = ( entries ) => {
    entries.forEach( entry => {
      if ( !entry.isIntersecting && window.innerWidth >= 1200 ) {
        siteHeaderNode.classList.add( 'is-hidden' );
        siteHeaderFixedNode.classList.add( 'site-header-fixed--show' );
      } else {
        siteHeaderNode.classList.remove( 'is-hidden' );
        siteHeaderFixedNode.classList.remove( 'site-header-fixed--show' );
      }
    } );
  };
  new IntersectionObserver( cb, OBSERVE_OPTIONS ).observe( topNode );
};

observeSiteHeader();
