window.onscroll = function() {
    if (window.pageYOffset > 80) {
        nav.style.background = "cadetblue";
        nav.style.margin = "-43px 0px 20px 0px";
        nav.style.position = "0";
        nav.style.borderBottom = "2px solid white";
    } else {
        nav.style.margin = "0px 0px 20px 0px";
        nav.style.color = "#fff"
        nav.style.borderBottom = "none";
    }

}