import $ from 'jquery';
import lodash from 'lodash';
import 'bootstrap';
import axios from 'axios';
import correctionListener from './correction';

window.$ = $;
window.jQuery = $;
window._ = lodash;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('jquery-ujs');
require('./correction');

correctionListener();
