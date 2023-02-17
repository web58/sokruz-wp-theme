let currentGroup;
const clearSelect = ( dataAttr ) => {
  document.querySelectorAll( `[${dataAttr}]` ).forEach( item => item.classList.remove( 'active' ) );
};

const changeGroup = ( evt, dataAttr ) => {
  if ( !evt.target.closest( `[${dataAttr}]` ) ) return;
  const currentElement = evt.target.closest( `[${dataAttr}]` );
  if ( currentElement.classList.contains( 'active' ) ) {
    clearSelect( dataAttr );
    return;
  }
  clearSelect( dataAttr );
  currentGroup = currentElement.dataset.group;
  document.querySelectorAll( `[${dataAttr}="${currentGroup}"]` ).forEach( item => item.classList.add( 'active' ) );
};

const initCalculatorFirmness = () => {
  const calcContainerNode = document.querySelector( '#table-firmness' );
  if ( !calcContainerNode ) return;
  calcContainerNode.addEventListener( 'click', ( evt ) => {
    changeGroup( evt, 'data-group' );
  } );
};

initCalculatorFirmness();
