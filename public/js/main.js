const toggleBar = document.getElementById('toggle-bar');
const sideNav = document.getElementById('sidebar');
const btnClose = document.getElementById('btn-close');


toggleBar.addEventListener('click', ()=>{
    sideNav.classList.remove('close-nav');
    sideNav.classList.add('sidenav');
    
});
btnClose.addEventListener('click', ()=>{
    sideNav.classList.remove('sidenav');
    sideNav.classList.add('close-nav');

});