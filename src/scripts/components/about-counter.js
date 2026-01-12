document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".stat-number");

    counters.forEach(counter => {
        const target = parseInt(counter.dataset.target, 10);
        const suffix = counter.dataset.suffix || "";
        let current = 0;

        // যদি target number NaN হয় (e.g. fraction like 12/7), animation skip
        if (isNaN(target)) {
            counter.textContent = counter.dataset.target + suffix;
            return;
        }

        const duration = 1500; // ms
        const step = target / (duration / 16);

        const updateCounter = () => {
            current += step;
            if (current < target) {
                counter.textContent = Math.ceil(current) + suffix;
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target + suffix;
            }
        };

        updateCounter();
    });
});
