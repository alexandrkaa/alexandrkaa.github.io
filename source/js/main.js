var supportsWebP = (function () {
  'use strict';

  var canvas = typeof document === 'object' ? document.createElement('canvas') : {};
  canvas.width = canvas.height = 1;
  var index = canvas.toDataURL ? canvas.toDataURL('image/webp').indexOf('image/webp') === 5 : false;

  return index;

}());

if (supportsWebP) {
  var noWebpAll = document.querySelectorAll('.no-webp');
  for(var i = 0; i < noWebpAll.length; i++) {
    var noWebp = noWebpAll[i];
    noWebp.classList.remove('no-webp');
    noWebp.classList.add('webp');
  }
}

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
