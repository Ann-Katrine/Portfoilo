window.onscroll = function() {myFunction()};    // gør at det virker når man begynder at scrolle

var navbar = document.getElementById("navbar"); // finder id navbar i html siden
var mellemrum = document.getElementById("sticky_hojde");    // finder id i html siden
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");  // gør at den tilføjer sticky i en class
        mellemrum.classList.add("sticky_hojde");    // tilføjer "sticky_hojde" i en class til main

    } else {
        navbar.classList.remove("sticky");  // fjerner sticky fra id'ets
        mellemrum.classList.add("sticky_hojde");    // fjerner "sticky_hojde" fra main
    }
}