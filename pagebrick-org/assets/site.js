// Small screens: the menu opens and closes with its button.
document.documentElement.classList.add('js');
document.querySelectorAll('.menu-toggle').forEach(button => button.addEventListener('click', () => {
    const open = button.closest('.site-header').classList.toggle('open');
    button.setAttribute('aria-expanded', String(open));
}));
