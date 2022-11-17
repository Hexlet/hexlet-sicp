import $ from 'jquery';
import lodash from 'lodash';
import 'bootstrap';
import axios from 'axios';
import addHashActiveTab from './custom';
import correctionListener from './correction.js';
import 'jquery-ujs';
import '../sass/app.scss';
import '../sass/_activity_chart.scss';
import '../sass/_custom.scss';

import.meta.glob([
  '../assets/img/**',
  '../assets/img/exercises/**',
]);


window.$ = $;
window.jQuery = $;
window._ = lodash;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// LINK TO TABS from https://github.com/twbs/bootstrap/issues/25220#issuecomment-535915733
addHashActiveTab();
correctionListener();
