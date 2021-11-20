/**
 * VARIABLES
 */
const backToTopBtn = document.querySelector('#up-btn');

/**
 * FUNCTIONS
 */
window.onscroll = () => {
    if(document.body.scrollTop > 300 || document.documentElement.scrollTop >300){

        backToTopBtn.style.display = "block";
    }else{
        backToTopBtn.style.display = "none";
    }
}

const backToTop = () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

/**
 * EVENT LISTENERS
 */
backToTopBtn.addEventListener('click', backToTop);