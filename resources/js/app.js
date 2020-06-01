import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'

require('./bootstrap');
require('jquery-ujs');

import hljs from 'highlight.js/lib/core';
import scheme from 'highlight.js/lib/languages/scheme';
import 'highlight.js/styles/googlecode.css';
hljs.registerLanguage('scheme', scheme);

$('#flash-overlay-modal').modal();
hljs.initHighlightingOnLoad();

