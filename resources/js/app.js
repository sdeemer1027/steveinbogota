import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

/* =========================
   FRONTEND ADDITIONS
   ========================= */

// Bootstrap
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

// Bootstrap Icons
import 'bootstrap-icons/font/bootstrap-icons.css';

// jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

// Test hook (safe for now)
$(document).ready(function () {
    console.log('jQuery loaded successfully');
});

$(document).on('click', '.btn', function () {
    console.log('Button clicked:', this);
});
