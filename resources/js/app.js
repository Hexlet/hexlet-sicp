import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
require('./bootstrap');

require('jquery-ujs');
import addHashActiveTab from './custom'

$('#flash-overlay-modal').modal();

// LINK TO TABS from https://github.com/twbs/bootstrap/issues/25220#issuecomment-535915733
addHashActiveTab();

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/codeEditor/index');


// require('./components/editor/index');
// require('./components/somethingElse'); // если появится что-то новое
