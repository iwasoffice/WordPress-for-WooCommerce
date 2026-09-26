(() => {
  if (!('serviceWorker' in navigator)) return;
  const secure = location.protocol === 'https:' || ['localhost', '127.0.0.1'].includes(location.hostname);
  if (!secure) return;
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/iwas-sw.js').catch(() => {});
  });
})();
