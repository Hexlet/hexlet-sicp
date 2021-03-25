import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'

require('./bootstrap');
require('./hljs');
require('jquery-ujs');


import addHashActiveTab from './custom'

$('#flash-overlay-modal').modal();

// LINK TO TABS from https://github.com/twbs/bootstrap/issues/25220#issuecomment-535915733
addHashActiveTab();
