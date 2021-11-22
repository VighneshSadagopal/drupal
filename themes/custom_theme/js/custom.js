var listicon = document.getElementById('listicon');
var gridicon = document.getElementById('gridicon');
var gridcontent = document.getElementById('block-custom-theme-content');
var listcontent = document.getElementById('block-views-block-list-frontpage-block-1');

listicon.addEventListener('click', () => {
    gridcontent.classList.add('hide');
    listcontent.classList.add('show');
    listicon.classList.add('hide');
    gridicon.classList.add('show');
});
gridicon.addEventListener('click', () => {
    gridcontent.classList.remove('hide');
    listcontent.classList.remove('show');
    gridicon.classList.remove('show');
    listicon.classList.remove('hide');
});