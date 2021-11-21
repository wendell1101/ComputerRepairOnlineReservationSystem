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

// To preview image and show image file name in CREATE PAGE
const productImgUpload = (e) => {
    // Prevent submission
    e.preventDefault(); 
    // Show image file name
    const imgLabel = e.target.nextElementSibling;
    imgLabel.innerHTML = e.target.files[0].name;
    // Select img element
    const imgElement = document.querySelector('#product-img');

    if(path == '/admin/products/create'){
        // Style img element
        imgElement.style.display = 'block';
        imgElement.style.width = '100%';
        imgElement.style.height = 'auto';
        imgElement.style.objectFit = 'scale-down';
        // Hide alt icon
        document.querySelector('#product-img-alt').style.display = 'none';
    }
    
    // Set file reader
    const reader = new FileReader();
    reader.onload = () => {
        imgElement.src = reader.result;
    }
    // Set img src attribute to image path
    reader.readAsDataURL(e.target.files[0]);
};

/**
 * EVENT LISTENERS
 */
imgUploadBtn.addEventListener('change', productImgUpload);

