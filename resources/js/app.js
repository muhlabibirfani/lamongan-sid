document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('[data-mobile-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (toggleButton && mobileMenu) {
        toggleButton.addEventListener('click', () => {
            const hidden = mobileMenu.classList.toggle('hidden');
            toggleButton.setAttribute('aria-expanded', String(!hidden));
        });
    }
});

