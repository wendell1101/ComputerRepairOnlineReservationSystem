// VARIABLES
const backToTopBtn = document.querySelector('#up-btn');

// FUNCTIONS
window.onscroll = function(){
    if(document.body.scrollTop > 300 || document.documentElement.scrollTop >300){

        backToTopBtn.style.display = "block";
    }else{
        backToTopBtn.style.display = "none";
    }
}

function backToTop(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// EVENT LISTENER
backToTopBtn.addEventListener('click', backToTop);