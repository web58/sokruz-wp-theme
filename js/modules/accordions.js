import {
  Options,
} from './options.js';

const initAccordion = ( selector, options ) => {
  const ACCORDION_NODE = document.querySelector( selector );
  if ( !ACCORDION_NODE ) return;
  new JustAccordion( selector, options );
};

const initAccordions = () => {
  const ACCORDION_NODES = document.querySelectorAll( '[data-accordion]' );
  if ( ACCORDION_NODES.lentgh < 1 ) return;
  ACCORDION_NODES.forEach( ( accordion, index ) => {
    accordion.dataset.accordion = index;
    new JustAccordion( `[data-accordion="${index}"]`, Options.Accordion.Materials );
  } );
};


initAccordion( '.filters', Options.Accordion.Filters );
initAccordion( '.product-layers__list', Options.Accordion.Layers );
initAccordions();
