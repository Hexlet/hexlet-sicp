import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'

require('./bootstrap');
require('jquery-ujs');

import hljs from 'highlight.js/lib/core';
import scheme from 'highlight.js/lib/languages/scheme';
import 'highlight.js/styles/googlecode.css';
import addHashActiveTab from './custom'

hljs.registerLanguage('scheme', scheme);

$('#flash-overlay-modal').modal();
hljs.initHighlightingOnLoad();

// LINK TO TABS from https://github.com/twbs/bootstrap/issues/25220#issuecomment-535915733
addHashActiveTab();
