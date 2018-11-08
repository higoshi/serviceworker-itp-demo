const cacheName = 'v1';
self.addEventListener('install', event => {
  const timeStamp = Date.now();
  event.waitUntil(
    caches.open(cacheName).then(cache => {
      return cache.addAll([
        `/api/getDate.php`
      ]).then(() => {
        self.skipWaiting()
      });
    })
  );
});

self.addEventListener('activate', event => {
  event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', event => {
  const {request} = event;
  event.waitUntil(event.respondWith(new Promise(async resolve => {
    const cache = await caches.open(cacheName);
    let response = await cache.match(request, {ignoreSearch: true});
    if (!response) {
      response = await fetch(request)
      cache.add(request, response);
    }
    resolve(response);
  })));
});
