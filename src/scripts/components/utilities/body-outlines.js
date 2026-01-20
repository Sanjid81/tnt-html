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
    const navbar = document.querySelector('.navbar'); // আপনার navbar এর selector
    const footer = document.querySelector('.footer'); // আপনার footer এর selector

    if (!outline) return;

    const scrollTop = window.scrollY || window.pageYOffset;
    const windowHeight = window.innerHeight;

    // Navbar touch check
    if (navbar) {
        const navbarRect = navbar.getBoundingClientRect();

        // যখন navbar screen এর top এ আছে (sticky/fixed)
        if (navbarRect.top <= 0 && navbarRect.bottom > 0) {
            outline.classList.add('top-offset');
        } else {
            outline.classList.remove('top-offset');
        }
    } else {
        // যদি navbar না থাকে
        if (scrollTop <= 80) {
            outline.classList.add('top-offset');
        } else {
            outline.classList.remove('top-offset');
        }
    }

    // Footer touch check - CORRECTED
    if (footer) {
        const footerRect = footer.getBoundingClientRect();

        // যখন footer screen এর bottom এ touch করছে বা screen এ visible
        // windowHeight থেকে footer এর top position বের করছি
        if (footerRect.top <= windowHeight) {
            outline.classList.add('bottom-offset');
        } else {
            outline.classList.remove('bottom-offset');
        }
    } else {
        // যদি footer না থাকে, document এর bottom check করুন
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

// Resize এ আবার check করুন
window.addEventListener('resize', handleOutlineScroll);