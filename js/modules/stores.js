import {
  Options,
} from './options.js';

const storeMapNode = document.querySelector( `#${Options.Map.Store.ID}` );

const getStoreCoords = ( elem ) => {
  if ( !elem || !elem.dataset.store ) return false;
  return elem.dataset.store.split( ', ' );
};

const getZoomMap = ( elem ) => {
  if ( !elem || !elem.dataset.zoom ) return Options.Map.Store.zoom;
  return elem.dataset.zoom;
};

const getPointCoords = ( elem ) => {
  if ( !elem || !elem.dataset.point ) return false;
  return elem.dataset.point.split( ', ' );
};

const setPlacemarks = ( map ) => {
  const POINTS = document.querySelectorAll( '[data-point]' );
  POINTS.forEach( ( point, index ) => {
    const ICON_CONTENT = {
      iconContent: `${index+1}`
    };
    const PLACEMARK = new ymaps.Placemark( getPointCoords( point ), ICON_CONTENT, Options.Map.Store.icon );
    map.geoObjects.add( PLACEMARK );
  } );
};

const initStoreMap = () => {
  if ( !storeMapNode || !getStoreCoords( storeMapNode ) ) return;

  ymaps.ready( initYmap );

  function initYmap() {
    const MAP = new ymaps.Map( storeMapNode, {
      center: getStoreCoords( storeMapNode ),
      zoom: getZoomMap( storeMapNode ),
    } );
    storeMapNode.classList.remove( 'store-content__map--loading' );

    MAP.controls.remove( 'geolocationControl' ); // удаляем геолокацию
    MAP.controls.remove( 'searchControl' ); // удаляем поиск
    MAP.controls.remove( 'trafficControl' ); // удаляем контроль трафика
    MAP.controls.remove( 'typeSelector' ); // удаляем тип
    MAP.controls.remove( 'fullscreenControl' ); // удаляем кнопку перехода в полноэкранный режим
    MAP.controls.remove( 'rulerControl' ); // удаляем линейку
    MAP.behaviors.disable( 'scrollZoom' );

    setPlacemarks( MAP );
  }

};

initStoreMap( Options.Map.Store );
