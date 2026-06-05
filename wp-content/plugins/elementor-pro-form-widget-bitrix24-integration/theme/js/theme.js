(
  function ($) {
    'use strict';

    $(function() {
      var ajaxUrl = typeof ajaxurl !== 'undefined' ? ajaxurl : '/wp-admin/admin-ajax.php';
      var locationParams = window.location.search;

      if (!locationParams || locationParams.indexOf('utm_source=') === -1) {
        return;
      }

      $.post(ajaxUrl + locationParams, {
        action: 'elementorBitrix24AjaxSetUtm',
      });
    });
  }
)(jQuery);
