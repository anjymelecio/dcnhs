const ham = document.querySelector('#toggle-btn');
const sidebar = document.querySelector("#sidebar");


ham.addEventListener('click', function(){
    sidebar.classList.toggle("expand");
});
