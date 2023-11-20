

//au scroll, animation titre des sections qui apparait en mode animation swipeup
const observer = new IntersectionObserver(entries => {
    // Loop over the entries
    entries.forEach(entry => {
        // If the element is visible
        if (entry.isIntersecting) {
            // Add the animation class
            if (entry.target == document.querySelector("#studio_koukaki")) { 
                entry.target.classList.add('swipup-animation2')
                //animation koukaki lente
            } else {
                entry.target.classList.add('swipeUp-animation');
            }
        }
    });
});

//elements à cibler pour l'animation swipe up
const elements = document.querySelectorAll(".story h2 div, h3 div, #studio_koukaki, #studio_titre");
//pour chaque element on déclenche l'animation
elements.forEach((el) => {
    observer.observe(el);
});



//integration skrollR pour effet parallax
var s = skrollr.init();
var _skrollr = skrollr.get(); // get() returns the skrollr instance or undefined
var windowWidth = $(window).width();

if (windowWidth <= 750 && _skrollr !== undefined) {
    _skrollr.destroy();
}

//swiper slider effet cover-flow

//Initialize Swiper
var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
    },

});

//MENU BURGER 

var burgerMenu = document.getElementById('burger-menu');

var overlay = document.getElementById('menu');

burgerMenu.addEventListener('click', function () {
    this.classList.toggle("close");
    overlay.classList.toggle("overlay");
});

//click sur un lien, close le menu
var liens = document.querySelectorAll('.lien_burger');
liens.forEach(lien => {
    lien.addEventListener('click', function () {
        burgerMenu.classList.toggle("close");
        overlay.classList.toggle("overlay");
    });
})

