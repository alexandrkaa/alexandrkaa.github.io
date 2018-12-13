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
var map = document.querySelector('.map--nojs');

main_nav.classList.remove('main-nav--nojs');
main_nav.classList.add('main-nav--js');
main_nav.classList.remove('main-nav--opened');
main_nav.classList.add('main-nav--closed');
if(map) {
  map.classList.remove('map--nojs');
  map.classList.add('map--js');
}

main_nav_toggler.addEventListener('click', function() {
  if(main_nav.classList.contains('main-nav--opened')) {
    main_nav.classList.remove('main-nav--opened');
    main_nav.classList.add('main-nav--closed');
  } else {
    main_nav.classList.add('main-nav--opened');
    main_nav.classList.remove('main-nav--closed');
  }
});

//=require node_modules/picturefill/dist/picturefill.min.js
//=require node_modules/jquery/dist/jquery.min.js

(function($) {
    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top + 'px'
        }, 'fast');
        return this; // for chaining...
    }
})(jQuery);

//=require node_modules/slick-carousel/slick/slick.min.js

$(document).ready(function() {
  $('.advantages__slider').slick({
    "accessibility": true,
    "autoplay": true,
    "autoplaySpeed": 2000,
    "dots": false,
    "pauseOnFocus": true,
    "pauseOnHover": true,
    "centerMode": true,
    "slidesToShow": 3,
    "slidesToScroll": 1,
    "responsive": [
    {
      "breakpoint": "1081",
      settings: {
        "slidesToShow": 2,
        "slidesToScroll": 2,
        "infinite": true,
      }
    },
    {
      "breakpoint": "769",
      settings: {
        "slidesToShow": 2,
        "slidesToScroll": 1
      }
    },
    {
      "breakpoint": "415",
      settings: {
        "slidesToShow": 1,
        "slidesToScroll": 1
      }
    }]
  });
});
