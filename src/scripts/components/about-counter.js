document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');

    const options = {
        root: null,
        threshold: 0.3,
    };

    const startCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const suffix = counter.getAttribute('data-suffix') || '';
        let count = 0;

        const step = () => {
            const increment = target / 50; // smaller increment for smoother animation
            count += increment;

            if (count < target) {
                counter.innerText = Math.floor(count) + suffix;
                requestAnimationFrame(step); // smooth frame update
            } else {
                counter.innerText = target + suffix;
            }
        };
        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                startCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, options);

    counters.forEach(counter => observer.observe(counter));
});
