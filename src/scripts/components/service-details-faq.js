document.addEventListener('DOMContentLoaded', () => {
    const headers = document.querySelectorAll('.accordion-header');

    headers.forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            const body = item.querySelector('.accordion-body');
            const isActive = item.classList.contains('active');

            // Close all others
            document.querySelectorAll('.accordion-item.active').forEach(el => {
                if (el !== item) {
                    el.classList.remove('active');
                    const elBody = el.querySelector('.accordion-body');
                    elBody.style.maxHeight = null;
                }
            });

            // Toggle current
            if (!isActive) {
                item.classList.add('active');
                body.style.maxHeight = body.scrollHeight + 'px';
            } else {
                item.classList.remove('active');
                body.style.maxHeight = null;
            }
        });
    });
});
