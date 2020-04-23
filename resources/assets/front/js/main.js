import bugsnag from "@bugsnag/js";
window.bugsnag = bugsnag;

// import './polyfills';

import CookieAccept from './cookie-accept.js';
window.CookieAccept = new CookieAccept({
    days: 7,
});

// import './toggle-class';
// import './smooth-scroll';