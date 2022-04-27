// use this snippets only if you don't have any item positioned absolute


var myNav = document.getElementById('myNav');
var navItems = document.getElementById("nav_items");
window.onscroll = function () { 
    "use strict";
    if (window.scrollY >= 200) {
        myNav.classList.add("bg-gray-50");

    } 
    else {
        myNav.classList.remove("bg-gray-50");

    }
};