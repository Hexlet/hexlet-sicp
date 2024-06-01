import $ from 'jquery';
import lodash from 'lodash';
import * as bootstrap from 'bootstrap';
import axios from 'axios';
import correctionListener from './correction';

import 'jquery-ujs';

window.bootstrap = bootstrap;
window.$ = $;
window.jQuery = $;
window._ = lodash;
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

correctionListener();
