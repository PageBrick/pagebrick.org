// pagebrick.org: menu, language, and a little motion. Everything works without it; motion respects
// "reduce motion" in the visitor's system settings.
document.documentElement.classList.add('js', 'motion');
const calm = matchMedia('(prefers-reduced-motion: reduce)').matches;

// Small screens: the menu opens and closes with its button.
document.querySelectorAll('.menu-toggle').forEach(button => button.addEventListener('click', () => {
    const open = button.closest('.site-header').classList.toggle('open');
    button.setAttribute('aria-expanded', String(open));
}));

// Language: choosing one goes to this page in that language.
document.querySelectorAll('[data-language]').forEach(select => select.addEventListener('change', () => {
    location.href = select.value;
}));

// The header gets a hairline shadow once the page scrolls.
const header = document.querySelector('.site-header');
const onScroll = () => header?.classList.toggle('scrolled', scrollY > 8);
addEventListener('scroll', onScroll, {passive: true});
onScroll();

// Sections fade in as they reach the screen.
const reveal = !('IntersectionObserver' in window) ? {observe: el => el.classList.add('visible')} : new IntersectionObserver(entries => entries.forEach(entry => {
    if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        reveal.unobserve(entry.target);
        entry.target.querySelector('[data-type]') && typeCode(entry.target.querySelector('[data-type]'));
    }
}), {rootMargin: '0px 0px -8% 0px'});
document.querySelectorAll('[data-reveal]').forEach(el => calm ? el.classList.add('visible') : reveal.observe(el));

// The code sample types itself once, the first time it is seen.
function typeCode(code) {
    if (calm || code.dataset.typed) return;
    const text = code.textContent;
    code.dataset.typed = '1';
    code.dataset.full = text;
    code.textContent = '';
    code.classList.add('typing');
    let i = 0;
    const tick = () => {
        i = Math.min(text.length, i + 3);
        code.textContent = text.slice(0, i);
        i < text.length ? setTimeout(tick, 16) : code.classList.remove('typing');
    };
    setTimeout(tick, 350);
}

// Copy button of the code sample.
document.querySelectorAll('[data-copy]').forEach(button => button.addEventListener('click', async () => {
    const code = button.closest('.terminal').querySelector('code');
    try {
        await navigator.clipboard.writeText(code.dataset.full || code.textContent);
        const label = button.textContent;
        button.textContent = button.dataset.copied;
        setTimeout(() => { button.textContent = label; }, 1600);
    } catch (e) { /* no clipboard: nothing to do */ }
}));

// The screenshot leans a little towards the mouse.
document.querySelectorAll('[data-tilt]').forEach(el => {
    if (calm || !matchMedia('(hover: hover)').matches) return;
    el.addEventListener('mousemove', event => {
        const box = el.getBoundingClientRect();
        const x = (event.clientX - box.left) / box.width - .5;
        const y = (event.clientY - box.top) / box.height - .5;
        el.style.transform = `perspective(1200px) rotateY(${x * 5}deg) rotateX(${-y * 5}deg)`;
    });
    el.addEventListener('mouseleave', () => { el.style.transform = ''; });
});

// The update simulator: the promise, shown step by step.
document.querySelectorAll('[data-simulator]').forEach(box => {
    const texts = JSON.parse(box.dataset.simulator);
    const log = box.querySelector('.simulator-log');
    const buttons = box.querySelectorAll('[data-run]');
    const wait = ms => new Promise(done => setTimeout(done, calm ? 0 : ms));
    const line = (text, state) => {
        const li = document.createElement('li');
        li.className = state;
        li.textContent = text;
        log.append(li);
        return li;
    };
    buttons.forEach(button => button.addEventListener('click', async () => {
        buttons.forEach(b => { b.disabled = true; });
        log.replaceChildren();
        const broken = button.dataset.run === 'broken';
        for (const [n, step] of texts.steps.entries()) {
            const li = line(step, 'running');
            await wait(n === texts.steps.length - 1 ? 1100 : 550);
            li.className = broken && n === texts.steps.length - 1 ? 'failed' : 'done';
        }
        if (broken) {
            line(texts.failed, 'failed');
            await wait(500);
        }
        line(broken ? texts.broken : texts.ok, broken ? 'result rolled-back' : 'result ok');
        buttons.forEach(b => { b.disabled = false; });
    }));
});
