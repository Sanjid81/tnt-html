function setRealVH() {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--real-vh', `${vh}px`);
}
window.addEventListener('resize', setRealVH);
window.addEventListener('orientationchange', setRealVH);
setRealVH();

// Scroll logic
function handleOutlineScroll() {
    const outline = document.querySelector('.outline-container');
    const navbar = document.querySelector('.navbar'); 
    const footer = document.querySelector('.footer'); 

    if (!outline) return;

    const scrollTop = window.scrollY || window.pageYOffset;
    const windowHeight = window.innerHeight;

    if (navbar) {
        const navbarRect = navbar.getBoundingClientRect();

        if (navbarRect.top <= 0 && navbarRect.bottom > 0) {
            outline.classList.add('top-offset');
        } else {
            outline.classList.remove('top-offset');
        }
    } else {
        if (scrollTop <= 80) {
            outline.classList.add('top-offset');
        } else {
            outline.classList.remove('top-offset');
        }
    }

    if (footer) {
        const footerRect = footer.getBoundingClientRect();

        if (footerRect.top <= windowHeight && footerRect.top >= 0) {
            outline.classList.add('bottom-offset');
        } else {
            outline.classList.remove('bottom-offset');
        }
    } else {
        const docHeight = Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );

        if ((scrollTop + windowHeight) >= (docHeight - 120)) {
            outline.classList.add('bottom-offset');
        } else {
            outline.classList.remove('bottom-offset');
        }
    }
}

// Scroll event listener
document.addEventListener('scroll', handleOutlineScroll);

// Initial check on load
window.addEventListener('load', () => {
    handleOutlineScroll();
});

window.addEventListener('resize', handleOutlineScroll);