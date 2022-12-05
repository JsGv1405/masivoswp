$(document).ready(function () {

    $('#btn-print').click(function () {
       let frame = document.getElementById('frame').contentWindow;
       frame.focus();
       frame.print();
    });
 
 
 });