/**
 * VARIABLES
 */
const backToTopBtn = document.querySelector('#up-btn');
const repairCards = document.querySelectorAll('.--repair-cards');

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

const learnMore = (e) => {
    const infoBox = e.target.querySelector('.--repair-info');
    infoBox.style.display = 'block';
};

const unlearnMore = (e) => {
    const infoBox = e.target.querySelector('.--repair-info');
    infoBox.style.display = 'none';
};

/**
 * EVENT LISTENERS
 */
backToTopBtn.addEventListener('click', backToTop);
repairCards.forEach((element) => {
    element.addEventListener('mouseenter', learnMore);
    element.addEventListener('mouseleave', unlearnMore);
});