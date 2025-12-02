document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const header = item.querySelector('.faq-header');
        const icon = item.querySelector('.faq-icon');
        const question = item.querySelector('.faq-qus');
        const content = item.querySelector('.faq-content');

        // Set initial styles
        if (!item.classList.contains('open')) {
            content.style.maxHeight = 0;
            content.style.paddingBottom = 0;
            question.style.color = 'black';
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
            content.style.paddingBottom = '20px';
            question.style.color = 'var(--text-red)';
        }

        header.addEventListener('click', () => {
            const isOpen = item.classList.contains('open');

            if (isOpen) {
                // Close FAQ
                item.classList.remove('open');
                content.style.maxHeight = 0;
                content.style.paddingBottom = 0;
                question.style.color = 'black';
                icon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0001 10.9997L22.0002 10.9995V12.9995L13.0001 12.9997V21.9996H11.0001V12.9997L2.00004 12.9999L2 10.9999L11.0001 10.9997L11 2.00001L13 2L13.0001 10.9997Z" fill="black"/>
                    </svg>`;
            } else {
                // Open FAQ
                item.classList.add('open');
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.paddingBottom = '20px';
                question.style.color = 'var(--text-red)';
                icon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 11.5H2V13.5H22V11.5Z" fill="#BC001A"/>
                    </svg>`;
            }

            // Accordion: Close other FAQs
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('open')) {
                    otherItem.classList.remove('open');
                    const otherContent = otherItem.querySelector('.faq-content');
                    const otherIcon = otherItem.querySelector('.faq-icon');
                    const otherQuestion = otherItem.querySelector('.faq-qus');

                    otherContent.style.maxHeight = 0;
                    otherContent.style.paddingBottom = 0;
                    otherIcon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0001 10.9997L22.0002 10.9995V12.9995L13.0001 12.9997V21.9996H11.0001V12.9997L2.00004 12.9999L2 10.9999L11.0001 10.9997L11 2.00001L13 2L13.0001 10.9997Z" fill="black"/>
                    </svg>`;
                    otherQuestion.style.color = 'black';
                }
            });
        });
    });
});
