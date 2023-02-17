import {
  Options,
} from './options.js';

import {
  showTabsSliderControl,
} from './utils.js';

const initTabs = ( tabsName, tabsOptions ) => {
  const tabsEl = document.querySelector( `[data-tabs=${tabsName}]` );
  if ( !tabsEl ) return;
  return new JustTabs( tabsName, tabsOptions );
};

const productTabs = initTabs( 'product-tabs', Options.Tabs.Product );
initTabs( 'action-tabs', Options.Tabs.Actions );

showTabsSliderControl( '.tabs-products__slider-control', productTabs );
