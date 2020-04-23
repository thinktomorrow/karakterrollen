/**
 * Smooth scroll
 * @version 0.1
 */

import smoothscroll from 'smoothscroll-polyfill';

// kick off the polyfill!
smoothscroll.polyfill();

window.SmoothScroller = {

    initForBookmarks: function() {
        SmoothScroller.init("[href^='#']");
    },

    init: function(selector) {

        let els = document.querySelectorAll(selector);

        for(let i =0; i < els.length; i++) {

            if( ! els.hasOwnProperty(i)) continue;

            els[i].addEventListener('click', SmoothScroller.listen);
        }
    },

    listen: function(e) {

        e.preventDefault();

        let target = document.getElementById(this.getAttribute('href').replace('#', ''));

        SmoothScroller.smoothScrollTo(target);
    },

    smoothScrollTo: function(el) {
        el.scrollIntoView({ behavior: 'smooth' });
    }
};
