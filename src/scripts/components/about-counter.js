
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".stat-number");
    const section = document.querySelector(".company-section");

    if (!section || counters.length === 0) return;

    const animateCounters = () => {
        counters.forEach(el => {
            const target = Number(el.dataset.target);
            const suffix = el.dataset.suffix || "";
            if (!target) return;

            el.textContent = "0" + suffix;

            let start = null;
            const duration = 1800;

            function step(ts) {
                if (!start) start = ts;
                const prog = ts - start;
                const perc = Math.min(prog / duration, 1);
                const eased = 1 - Math.pow(1 - perc, 3); // smooth ease-out

                el.textContent = Math.floor(target * eased) + suffix;

                if (prog < duration) {
                    requestAnimationFrame(step);
                } else {
                    el.textContent = target + suffix;
                }
            }

            requestAnimationFrame(step);
        });
    };

   
    setTimeout(animateCounters, 400);  
    const observer = new IntersectionObserver(
        entries => {
            if (entries[0].isIntersecting) {
                animateCounters();
            }
        },
        { threshold: 0.1 }
    );
    observer.observe(section);
});