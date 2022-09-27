require('@popperjs/core');
require('@coreui/coreui/dist/js/coreui.bundle.min');
require('bootstrap');
require('datatables.net-bs4');
require('datatables.net-buttons-bs4');
require('../../vendor/bastinald/laravel-livewire-modals/resources/js/modals');

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

import swal from 'sweetalert2';

window.Swal = swal;

import Alpine from 'alpinejs'
 
window.Alpine = Alpine;

Alpine.start();
