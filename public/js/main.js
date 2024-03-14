const toggleBar = document.getElementById('toggle-bar');
const sideNav = document.getElementById('sidebar');
const btnClose = document.getElementById('btn-close');
const mainContent = document.getElementById('main-content');

toggleBar.addEventListener('click', ()=>{
    sideNav.classList.remove('close-nav');
    sideNav.classList.add('sidenav');
    mainContent.style.right = '0%';
});
btnClose.addEventListener('click', ()=>{
    sideNav.classList.remove('sidenav');
    sideNav.classList.add('close-nav');
    
});