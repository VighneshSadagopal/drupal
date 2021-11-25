var searchicon = document.getElementById('searchicon');
var secondary = document.getElementById('secondary');
var nav = document.getElementById('nav');
searchicon.addEventListener('click', () => {
    secondary.classList.toggle('hide');
});