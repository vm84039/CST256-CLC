require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// resources/assets/js/app.js
 $('.datepicker').datepicker();

 // e.g <input type="text" class="datepicker" />

/* PHONE DATA-API
 * ============== */

$(window).on('load', function () {
    $('form input[type="text"].bfh-phone, form input[type="tel"].bfh-phone, span.bfh-phone').each(function () {
        var $phone = $(this)
        if ($phone.val() != "") $phone.data("number", $phone.val())
        $phone.bfhphone($phone.data())
    })
})
