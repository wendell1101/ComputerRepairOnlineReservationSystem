/**
 * VARIABLES
 */
let path = window.location.pathname;
const getActive = document.querySelectorAll('.active');
const dashboardPath = document.querySelector('#dashboard-link').pathname;
const productsPath = document.querySelector('#products-link').pathname;
const categoriesPath = document.querySelector('#categories-link').pathname;
const usersPath = document.querySelector('#users-link').pathname;
const sidenav = document.querySelector('#sidenav-ul');

/**
 * FUNCTIONS
 */

// To change the active navigation link in side bar
window.onload = () => {
    switch (path) {
        case dashboardPath:
            getActive[0].classList.remove('active');
            document.querySelector('#dashboard-link').classList.add('active');
            break;
    
        case productsPath:
            getActive[0].classList.remove('active');
            document.querySelector('#products-link').classList.add('active');
            break;
    
        case categoriesPath:
            getActive[0].classList.remove('active');
            document.querySelector('#categories-link').classList.add('active');
            break;
    
        case usersPath:
            getActive[0].classList.remove('active');
            document.querySelector('#users-link').classList.add('active');
            break;    

        default:
            break;
    }
}


