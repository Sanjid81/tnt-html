// document.addEventListener('scroll', () => {
//     const outline = document.querySelector('.outline-container');

//     if (window.scrollY > 0) {
//         outline.classList.add('full-height');
//     } else {
//         outline.classList.remove('full-height');
//     }
// });





// Optional: Polyfill-like helper for very old browsers (rarely needed in 2026)
function setRealVH() {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--real-vh', `${vh}px`);
}

window.addEventListener('resize', setRealVH);
window.addEventListener('orientationchange', setRealVH);
setRealVH(); // run once

// Main scroll logic
document.addEventListener('scroll', () => {
    const outline = document.querySelector('.outline-container');
    if (!outline) return;

    const scrollTop = window.scrollY || window.pageYOffset;
    const windowHeight = window.innerHeight;
    
    // More accurate document height (covers most edge cases)
    const docHeight = Math.max(
        document.body.scrollHeight,
        document.body.offsetHeight,
        document.documentElement.clientHeight,
        document.documentElement.scrollHeight,
        document.documentElement.offsetHeight
    );

    const isAtTop = scrollTop < 10; // small threshold for floating point / momentum scroll

    // At bottom: within 100px tolerance (helps with mobile overscroll / footer issues)
    const isAtBottom = (scrollTop + windowHeight) >= (docHeight - 100);

    if (isAtTop || isAtBottom) {
        outline.classList.remove('full-height');
    } else {
        outline.classList.add('full-height');
    }
});

// Optional: trigger once on load (in case page starts at bottom or very short content)
window.addEventListener('load', () => {
    // simulate scroll event to set correct initial state
    window.dispatchEvent(new Event('scroll'));
});
