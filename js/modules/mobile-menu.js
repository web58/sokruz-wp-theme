import {
  isEscKey,
} from './utils.js';

const mobileMenuNode = document.querySelector( '.mobile-menu' );
const MENU_ID = 'mobile-menu';
const BURGER_OPTIONS = {
  animationSpeed: 300,
  menuId: MENU_ID,
  isOpen: openMobileMenu,
  isClose: closeMobileMenu,
};
const siteBurger = new JustBurger( BURGER_OPTIONS );

function openMobileMenu() {
  document.documentElement.classList.add( 'is-open-menu' );
  toggleMenuVisibility();
}

function closeMobileMenu() {
  document.documentElement.classList.remove( 'is-open-menu' );
  toggleMenuVisibility();
}

const toggleMenuVisibility = () => {
  if ( !mobileMenuNode ) return;
  let isShow = mobileMenuNode.getAttribute( 'aria-hidden' ) === 'true';
  mobileMenuNode.setAttribute( 'aria-hidden', !isShow );
};

const initMobileMenu = () => {
  if ( !mobileMenuNode ) return;
  mobileMenuNode.id = MENU_ID;
  document.addEventListener( 'keydown', ( evt ) => {
    if ( isEscKey( evt ) && mobileMenuNode.getAttribute( 'aria-hidden' ) === 'false' ) {
      siteBurger.close();
    }
  } );
};

initMobileMenu();
