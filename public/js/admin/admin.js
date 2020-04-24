/*!
    * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
    */
(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);


document.getElementById('currentTime').textContent =  (new Date()).toString().split(' ').splice(1,3).join(' ');

function createNewCategory() {
    if(document.getElementById('name').value.length > 3){
        document.getElementById('createNewCategory').submit();
    } else {
        alert('Please enter a category name');
    }
}

function createNewRole() {
    if(document.getElementById('name').value.length > 3){
        document.getElementById('createNewRole').submit();
    } else {
        alert('Please enter a category name');
    }
}
