var menu = document.getElementById('menu');
var nav = document.getElementById('nav');
var exit = document.getElementById('exit');
var searchBar = document.getElementById('searchBar');
var search = document.getElementById('search');

menu.addEventListener('click', function(e) {
    nav.classList.toggle('hide-mobile');
    e.preventDefault();
});

exit.addEventListener('click', function(e) {
    nav.classList.toggle('hide-mobile');
    e.preventDefault();
});


search.addEventListener('click', function(e) {
    
    if (searchBar.style.display === "none") {
        searchBar.style.display = "block";
    }
    else searchBar.style.display = "none";

    e.preventDefault();
});