import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'

require('./bootstrap');
require('jquery-ujs');

import hljs from 'highlight.js/lib/core';
import scheme from 'highlight.js/lib/languages/scheme';
import vbnet from 'highlight.js/lib/languages/vbnet';
import awk from 'highlight.js/lib/languages/awk';
import sql from 'highlight.js/lib/languages/sql';
import 'highlight.js/styles/github.css';
import addHashActiveTab from './custom'


hljs.registerLanguage('scheme', scheme);
hljs.registerLanguage('asciidoc', awk);
hljs.registerLanguage('vbnet', vbnet);
hljs.registerLanguage('sql', sql);

$('#flash-overlay-modal').modal();
hljs.highlightAll();

// LINK TO TABS from https://github.com/twbs/bootstrap/issues/25220#issuecomment-535915733
addHashActiveTab();
