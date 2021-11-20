/**
 * Sidebar DOM
 */
let path = window.location.pathname;
const getActive = document.querySelectorAll('.active');
const dashboardPath = document.querySelector('#dashboard-link').pathname;
const productsPath = document.querySelector('#products-link').pathname;
const categoriesPath = document.querySelector('#categories-link').pathname;
const usersPath = document.querySelector('#users-link').pathname;

/**
 * Datatables
 */
let reservationsTable = new DataTable('#reservations-table', {
    responsive: true
});
let productsTable = new DataTable('#products-table', {
    responsive: true,
});
let categoriesTable = new DataTable('#categories-table', {
    responsive: true
});
let usersTable = new DataTable('#users-table', {
    responsive: true
});

/**
 * Button DOMs
 */
const imgUploadBtn = document.querySelector('#product-img-btn');

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

// To preview image and show image file name
const productCreateImg = (e) => {
    e.preventDefault(); 
    const imgLabel = e.target.nextElementSibling;
    imgLabel.innerHTML = e.target.files[0].name;
    const reader = new FileReader();

    reader.onload = () => {
        const img = document.querySelector('#product-img');
        img.src = reader.result;
    }

    reader.readAsDataURL(e.target.files[0]);
};

/**
 * EVENT LISTENERS
 */
imgUploadBtn.addEventListener('change', productCreateImg);

