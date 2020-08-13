window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar"); // finder id navbar i html siden
	var mellemrum = document.getElementById("sticky_hojde");
    var sticky = navbar.offsetTop;
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky");  // gør at den tilføjer sticky i en class
			mellemrum.classList.add("sticky_hojde");
			//mellemrum.classList.add("slideshow");
			
        } else {
            navbar.classList.remove("sticky");  // fjerner sticky fra id'ets
			mellemrum.classList.add("sticky_hojde");
        }
    }