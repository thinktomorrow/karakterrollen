import Errors from './_utilities/Errors';
import Form from './_utilities/Form';

window.Errors = Errors;
window.Form = Form;

// sticky polyfill init
// window.Stickyfill = require('stickyfilljs');
// Stickyfill.add(document.querySelectorAll('.sticky'));