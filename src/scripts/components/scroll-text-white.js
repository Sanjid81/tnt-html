document.addEventListener('DOMContentLoaded', function () {
    const title = document.querySelector('.who-we-are-right .main-title');
    if (!title) return;

    function wrapLetters(node) {
        let current = node;
        while (current && current !== title) {
            if (current.tagName === 'SPAN') return;
            current = current.parentElement;
        }

        if (node.nodeType === Node.TEXT_NODE) {
            const fragment = document.createDocumentFragment();
            let delay = 0;

            node.textContent.split('').forEach(char => {
                if (char === ' ' || char === '\u00A0') {
                    fragment.appendChild(document.createTextNode(char));
                } else {
                    const span = document.createElement('span');
                    span.className = 'char';
                    span.style.transitionDelay = `${delay}s`;
                    span.textContent = char;
                    fragment.appendChild(span);
                    delay += 0.2;
                }
            });

            node.replaceWith(fragment);
        } 
        else if (node.nodeType === Node.ELEMENT_NODE && node.tagName !== 'SPAN') {
            [...node.childNodes].forEach(wrapLetters);
        }
    }

    wrapLetters(title);

    setTimeout(() => {
        if (window.AOS) AOS.refresh();
    }, 150);
});
