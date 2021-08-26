// Service Worker for PWA Sistema Administrativo Sistema administrativo de Gulf
// Generated 26.11.2020 18:36:51 by PWAssist.php
// Author My name
// Copyright my little big company
// version: 1
var dataCacheName = 'data-myapp_cache-v1';
var cacheName = 'myapp_cache-1';

var filesToCache = [
  './'
];

self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell');
      return cache.addAll(filesToCache);
    })
  );
});

self.addEventListener('activate', function(e) {
  console.log('[ServiceWorker] Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) {
        if (key !== cacheName && key !== dataCacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  return self.clients.claim();
});

self.addEventListener('fetch', function(e) {
  console.log('[Service Worker] Fetch', e.request.url);
  // All requests with "dynamic parts" in parameter treated as non-cached, to be performed!
  var isDynamic = false;
  
  if(e.request.url.indexOf('?refresh=') > -1) isDynamic = true;
  if (isDynamic) {
    /* When the request URL contains "dynamic mark", the app is asking for fresh data */
    e.respondWith(
      caches.open(dataCacheName).then(function(cache) {
        return fetch(e.request).then(function(response){
          cache.put(e.request.url, response.clone());
          return response;
        });
      })
    );
  } /*else {
    /*
     * The app is asking for app shell files. In this scenario the app uses the
     * "Cache, falling back to the network" offline strategy
     *
    e.respondWith(
      caches.match(event.request).then(function(resp) {
        return resp || fetch(event.request).then(function(response) {
          return caches.open(dataCacheName).then(function(cache) {
            cache.put(event.request, response.clone());
            return response;
          });
        });
      })
    );
  }*/
});









/*
const CACHE_NAME = 'offline';

// Customize this with a different URL if needed.
const OFFLINE_URL = 'offline.html';

self.addEventListener('install', event => {
    event.waitUntil(
    (async () => {
        const cache = await caches.open(CACHE_NAME);


        // Setting {cache: 'reload'} in the new request will ensure that the
        // response isn't fulfilled from the HTTP cache; i.e., it will be from
        // the network.
        await cache.add(new Request(OFFLINE_URL, { cache: 'reload' }));
    })()
    );

    // Force the waiting service worker to become the active service worker.
    self.skipWaiting();
});

self.addEventListener('activate', event => {
    event.waitUntil(
    (async () => {
        // Enable navigation preload if it's supported.
        // See https://developers.google.com/web/updates/2017/02/navigation-preload
        if ('navigationPreload' in self.registration) {
            await self.registration.navigationPreload.enable();
        }
    })()
    );

    // Tell the active service worker to take control of the page immediately.
    self.clients.claim();
});

self.addEventListener('fetch', event => {
    // We only want to call event.respondWith() if this is a navigation request
    // for an HTML page.
    if (event.request.mode === 'navigate') {
        event.respondWith((async () => {
            try {
                // First, try to use the navigation preload response if it's supported.
                const preloadResponse = await event.preloadResponse;

                if (preloadResponse) {
                    return preloadResponse;
                }

                // Always try the network first.
                const networkResponse = await fetch(event.request);

                return networkResponse;
            } catch (error) {
                // catch is only triggered if an exception is thrown, which is likely
                // due to a network error.
                // If fetch() returns a valid HTTP response with a response code in
                // the 4xx or 5xx range, the catch() will NOT be called.
                console.log('Fetch failed; returning offline page instead.', error);

                const cache = await caches.open(CACHE_NAME);
                const cachedResponse = await cache.match(OFFLINE_URL);

                return cachedResponse;
            }
        })());
    }

    // If our if() condition is false, then this fetch handler won't intercept the
    // request. If there are any other fetch handlers registered, they will get a
    // chance to call event.respondWith(). If no fetch handlers call
    // event.respondWith(), the request will be handled by the browser as if there
    // were no service worker involvement.
});*/