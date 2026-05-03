import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

/* =========================
   FRONTEND ADDITIONS
   ========================= */

// Bootstrap
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

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










function showToast(message, type = 'success') {
    let toastEl = document.getElementById('appToast');
    let toastBody = document.getElementById('toastMessage');

    if (!toastEl || !toastBody) {
        console.error('Toast elements missing in layout');
        return;
    }

    toastBody.innerText = message;

    toastEl.className = 'toast align-items-center text-bg-' + type + ' border-0';

    let toast = new bootstrap.Toast(toastEl, {
        autohide: true,
        delay: 1500   // 👈 THIS is the key change
    });
    toast.show();
}

window.showToast = showToast;







