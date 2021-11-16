var search = document.getElementById('edit-submit');
var searchbox = document.getElementById('edit-keys');
var nav = document.getElementById('nav');
search.addEventListener('click', () => {
  searchbox.classList.toggle('hide');
});

window.onscroll = function() {
  if (window.pageYOffset > 120) {
      nav.style.background = "cadetblue";
      nav.style.margin = "-36px 0px 20px 0px";
      nav.style.position = "0";
      nav.style.borderBottom = "2px solid white";
  } else {
      nav.style.background = "transparent"
      nav.style.margin = "0px 0px 20px 0px";
      nav.style.color = "#fff"
      nav.style.borderBottom = "none";
  }
}