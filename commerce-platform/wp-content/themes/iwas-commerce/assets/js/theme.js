(() => {
  const storageKey = 'iwas_theme';
  const root = document.documentElement;
  const meta = document.querySelector('#theme-color-meta');
  const media = window.matchMedia('(prefers-color-scheme: dark)');

  const apply = (preference) => {
    const dark = preference === 'dark' || (preference === 'system' && media.matches);
    root.dataset.theme = dark ? 'dark' : 'light';
    root.dataset.themePreference = preference;
    if (meta) meta.content = dark ? '#0f0c13' : '#fbfaf8';
    document.querySelectorAll('[data-theme-option]').forEach((button) => {
      button.setAttribute('aria-checked', String(button.dataset.themeOption === preference));
    });
  };

  const read = () => {
    try { return localStorage.getItem(storageKey) || 'system'; } catch (_) { return 'system'; }
  };

  document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.theme-toggle');
    const menu = document.querySelector('.theme-menu');
    apply(read());

    if (toggle && menu) {
      toggle.addEventListener('click', () => {
        const open = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!open));
        menu.hidden = open;
      });

      menu.addEventListener('click', (event) => {
        const button = event.target.closest('[data-theme-option]');
        if (!button) return;
        const value = button.dataset.themeOption;
        try { localStorage.setItem(storageKey, value); } catch (_) {}
        apply(value);
        menu.hidden = true;
        toggle.setAttribute('aria-expanded', 'false');
        toggle.focus();
      });

      document.addEventListener('click', (event) => {
        if (!menu.hidden && !menu.contains(event.target) && !toggle.contains(event.target)) {
          menu.hidden = true;
          toggle.setAttribute('aria-expanded', 'false');
        }
      });
    }
  });

  media.addEventListener?.('change', () => {
    if (read() === 'system') apply('system');
  });
})();
