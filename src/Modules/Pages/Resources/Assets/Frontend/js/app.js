/**
 * Vendor Libraries
 */
import './vendor';

/**
 * Initialise JS
 */
window.$ = window.jQuery;

$(document).ready((event) => {
    $(document).foundation();
    $('a[data-rel^=lightcase]').lightcase();
});

try {
    window.Swal = require('sweetalert2');
} catch (e) {

}

/**
 * Custom
 */
// jQuery UI - Autocomplete
$('#autocomplete').autocomplete({
    source: [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ]
});

// jQuery UI - Sortable
$("#sortable").sortable();

// Slick.js
$('#slides').slick({
    accessibility: true,
    adaptiveHeight: true,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    centerMode: false,
    cssEase: 'ease',
    dots: false,
    dotsClass: 'slick-dots',
    draggable: true,
    edgeFriction: 0.15,
    fade: false,
    infinite: true,
    initialSlide: 0,
    lazyLoad: 'ondemand',
    mobileFirst: false,
    pauseOnDotsHover: false,
    pauseOnFocus: true,
    pauseOnHover: true,
    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
    nextArrow: '<button type="button" class="slick-next">Next</button>',
    responsive: null,
    slidesToScroll: 1,
    slidesToShow: 1,
    speed: 300,
    swipe: true,
    touchMove: true
});

// ES6 Examples
// import ES6Examples from './es6-examples';
// ES6Examples();


