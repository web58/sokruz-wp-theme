const debounce = ( cb, delay ) => {
  let timer;

  return function( ...args ) {
    clearTimeout( timer );
    timer = setTimeout( () => {
      cb.apply( this, args );
    }, delay );
  };
};

const disableSubmitBtn = ( form ) => {
  form.querySelector( '[type="submit"]' ).setAttribute( 'disabled', 'disabled' );
};

const enableSubmitBtn = ( form ) => {
  form.querySelector( '[type="submit"]' ).removeAttribute( 'disabled' );
};

const isEscKey = ( evt ) => evt.key === 'Escape';

const addLeadZero = ( number ) => ( number < 10 ) ? `0${number}` : number;

const showTabsSliderControl = ( controlSelector, tabs ) => {
  const CONTROLS = document.querySelectorAll( controlSelector );
  if ( !CONTROLS || !tabs ) return;
  const ACTIVE_INDEX = Array.from( tabs.tabsBtns ).findIndex( item => item.hasAttribute( 'aria-selected' ) ? item : false );
  CONTROLS.forEach( ( control, index ) => {
    ACTIVE_INDEX === index ? control.setAttribute( 'aria-hidden', 'false' ) : control.setAttribute( 'aria-hidden', 'true' );
  } );
};

export {
  debounce,
  disableSubmitBtn,
  enableSubmitBtn,
  isEscKey,
  addLeadZero,
  showTabsSliderControl,
};
