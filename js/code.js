document.addEventListener('DOMContentLoaded', function () {
    var navbar = document.querySelector('nav');

    function checkScroll() {
        if (window.scrollY === 0) {
            navbar.classList.add('navbar-top');
        } else {
            navbar.classList.remove('navbar-top');
        }
    }

    window.addEventListener('scroll', checkScroll);
    checkScroll();
});

window.addEventListener('scroll', reveal);
function reveal() {
    var reveals = document.querySelectorAll('.reveal');

    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 0;

        if (revealtop < windowheight - revealpoint) {
            reveals[i].classList.add('active');
        }
        else {
            reveals[i].classList.remove('active');
        }
    }
}

window.addEventListener('scroll', reveal2);

function reveal2() {
    var reveals = document.querySelectorAll('.reveal2');

    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if (revealtop < windowheight - revealpoint) {
            reveals[i].classList.add('active');
            setTimeout(() => {
                reveals[i].classList.add('active-end');
            }, 900);
        } else {
            reveals[i].classList.remove('active');
            reveals[i].classList.remove('active-end');
        }
    }
}

window.addEventListener('scroll', reveal3);
function reveal3() {
    var reveals = document.querySelectorAll('.reveal3');
    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if (revealtop < windowheight - revealpoint) {
            reveals[i].style.transitionDelay = `${i * 10}s`;
            reveals[i].classList.add('active');
        } else {
            reveals[i].classList.remove('active');
            reveals[i].style.transitionDelay = '0s';
        }
    }
}

const carousel = document.querySelector('.carousel');
const carouselImages = document.querySelectorAll('.carousel-image');

carouselImages.forEach(image => {
    const clone = image.cloneNode(true);
    carousel.appendChild(clone);
});


document.addEventListener("DOMContentLoaded", function () {
    const contentWrapper = document.querySelector(".scrollable-right .content-wrapper");
    const scrollableRight = document.querySelector(".scrollable-right");

    function adjustContent() {
        if (contentWrapper.clientHeight >= scrollableRight.clientHeight) {
            contentWrapper.style.display = "flex";
            contentWrapper.style.justifyContent = "center";
            contentWrapper.style.alignItems = "center";
        } else {
            contentWrapper.style.display = "flex";
            contentWrapper.style.justifyContent = "center";
            contentWrapper.style.alignItems = "flex-start";
        }
    }

    adjustContent();
    window.addEventListener("resize", adjustContent);
});