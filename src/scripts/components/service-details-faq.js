// document.addEventListener('DOMContentLoaded', () => {
//     const faqItems = document.querySelectorAll('.faq-item');

//     faqItems.forEach(item => {
//         const header = item.querySelector('.faq-header');

//         header.addEventListener('click', () => {
//             const isActive = item.classList.contains('active');

//             faqItems.forEach(faq => {
//                 if (faq !== item) {
//                     faq.classList.remove('active');
//                 }
//             });

//             item.classList.toggle('active', !isActive);
//         });
//     });
// });



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