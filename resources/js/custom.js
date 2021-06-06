/* eslint-disable */

import $ from 'jquery';

const addHashActiveTab = () => $(document).ready(() => {
  const url = window.location.href;
  if (url.indexOf('#') > 0) {
    const activeTab = url.substring(url.indexOf('#') + 1);
    $(`.nav[role="tablist"] a[href="#${activeTab}"]`).tab('show');
  }

  $('a[role="tab"]').on('click', function () {
    const hash = $(this).attr('href');
    const newUrl = url.split('#')[0] + hash;
    history.replaceState(null, null, newUrl);
  });
});

export default addHashActiveTab;
