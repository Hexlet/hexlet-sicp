import $ from 'jquery';
import lodash from 'lodash';
import 'bootstrap';
import axios from 'axios';
import addHashActiveTab from './custom';

window.$ = $;
window.jQuery = $;
window._ = lodash;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('jquery-ujs');

// LINK TO TABS from https://github.com/twbs/bootstrap/issues/25220#issuecomment-535915733
addHashActiveTab();
