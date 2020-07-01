/**
 * Vendor Libraries
 */
import './vendor';

/**
 * Components
 */
import './components/core';

/**
 * Initialise JS
 */
window.$ = window.jQuery;

$(document).ready((event) => {
    $(document).foundation();
    $('a[data-rel^=lightcase]').lightcase();
});


