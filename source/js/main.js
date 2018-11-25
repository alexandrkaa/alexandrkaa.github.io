var main_nav = document.querySelector('.main-nav--nojs');
var main_nav_toggler = document.querySelector('.main-nav__toggler');

main_nav.classList.remove('main-nav--nojs');
main_nav.classList.add('main-nav--js');
main_nav.classList.remove('main-nav--opened');
main_nav.classList.add('main-nav--closed');

main_nav_toggler.addEventListener('click', function() {
  if(main_nav.classList.contains('main-nav--opened')) {
    main_nav.classList.remove('main-nav--opened');
    main_nav.classList.add('main-nav--closed');
  } else {
    main_nav.classList.add('main-nav--opened');
    main_nav.classList.remove('main-nav--closed');
  }
});
