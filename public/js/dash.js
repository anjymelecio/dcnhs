const toggleBurger = document.getElementById('burger');
const sideNav = document.getElementById('sidenav');
const closeNav = document.getElementById('close-x');

// Function to save the state to local storage
function saveStateToLocalStorage(state) {
    localStorage.setItem('navState', state);
}

// Function to retrieve the state from local storage
function getStateFromLocalStorage() {
    return localStorage.getItem('navState');
}

// Event listener for the burger menu
toggleBurger.addEventListener('click', () => {
    if (sideNav.classList.contains('close-nav')) {
        sideNav.classList.remove('close-nav');
        sideNav.classList.add('side-nav');
        saveStateToLocalStorage('open'); // Save open state to local storage
    } else {
        sideNav.classList.remove('side-nav');
        sideNav.classList.add('close-nav');
        saveStateToLocalStorage('closed'); // Save closed state to local storage
    }
    console.log('click');
    console.log(sideNav);
});

// Event listener for the close button
closeNav.addEventListener('click', () => {
    sideNav.classList.remove('side-nav');
    sideNav.classList.add('close-nav');
    saveStateToLocalStorage('closed'); // Save closed state to local storage
});

// Check if there's a previous state saved in local storage and apply it
document.addEventListener('DOMContentLoaded', () => {
    const prevState = getStateFromLocalStorage();
    if (prevState === 'open') {
        sideNav.classList.remove('close-nav');
        sideNav.classList.add('side-nav');
    } else {
        sideNav.classList.remove('side-nav');
        sideNav.classList.add('close-nav');
    }
});
