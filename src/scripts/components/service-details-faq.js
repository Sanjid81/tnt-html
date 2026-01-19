document.addEventListener('DOMContentLoaded', () => {
    const headers = document.querySelectorAll('.accordion-header');

    headers.forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            const isActive = item.classList.contains('active');

            // Close all others (accordion behavior)
            document.querySelectorAll('.accordion-item.active').forEach(el => {
                if (el !== item) el.classList.remove('active');
            });

            // Toggle current
            item.classList.toggle('active');
        });
    });
});