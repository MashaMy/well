(
  function ($) {
    "use strict";

    $(document).on("ready", function () {
      $('[data-ui-component="validate-webhook"]').on('click', function () {
        var $element = $(this);
        var ajaxUrl = typeof ajaxurl !== 'undefined' ? ajaxurl : '/wp-admin/admin-ajax.php';

        $element.attr('disabled', 'true');

        $('[data-ui-component="elprobitrix24notice"]').remove();

        $.post(ajaxUrl, {
          action: 'elementorBitrix24AjaxValidateWebhook',
          webhook: $('[name="webhook"]').val(),
          enabled_logging: $('[name="enabled_logging"]').is(':checked') ? 1 : 0,
          dataType: 'json'
        })
          .success(function (response) {
            $element.removeAttr('disabled');
            $('#poststuff').before(response);
          })
          .error(function (xhr, status, error) {
            $element.removeAttr('disabled');

            $('#poststuff').before(
              '<div data-ui-component="elprobitrix24notice" class="error notice notice-error"><p><strong>Error!</strong>: ' +
              'Server status code ' +
              xhr.status +
              ' - ' +
              error +
              '</p></div>'
            );
          });

        return false;
      });
    });
  }
)(jQuery);
