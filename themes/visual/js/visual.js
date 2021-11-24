var searchicon = document.getElementById('searchicon');
var secondary = document.getElementById('secondary');
var nav = document.getElementById('nav');
searchicon.addEventListener('click', () => {
    secondary.classList.toggle('hide');

});

window.onscroll = function() {
    if (window.pageYOffset > 100) {
        nav.style.background = "cadetblue";
        nav.style.margin = "-43px 0px 20px 0px";
        nav.style.position = "0";
        nav.style.borderBottom = "2px solid white";
    } else {
        nav.style.background = "transparent"
        nav.style.margin = "0px 0px 20px 0px";
        nav.style.color = "#fff"
        nav.style.borderBottom = "none";
    }
}