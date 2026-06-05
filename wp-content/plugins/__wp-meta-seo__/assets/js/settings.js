(function ($) {
    $(document).ready(function () {
        $('.ju-top-tabs .link-tab').on('click', function () {
            var href = $(this).attr('href').replace(/#/g, '');
            $('.wpms_hash').val(href);
        });

        $('.wpms-notice-dismiss').on('click', function () {
            $('.saved_infos').slideUp();
        });

        $('.tabs.ju-menu-tabs .tab a.link-tab').on('click', function () {
            var href = $(this).attr('href').replace(/#/g, '');
            window.location.hash='#' + href;
            setTimeout(function () {
                $('#' + href + ' ul.tabs').itabs();
            }, 100);
        });

        tippy('.wp-meta-seo_page_metaseo_settings .ju-setting-label', {
            animation: 'scale',
            duration: 0,
            arrow: false,
            placement: 'top',
            theme: 'metaseo-tippy tippy-rounded',
            onShow(instance) {
                instance.popper.hidden = instance.reference.dataset.tippy ? false : true;
                instance.setContent(instance.reference.dataset.tippy);
            }
        });

        $('.wpms-settings-dismiss').on('click', function() {
            $(this).parent('.save-settings-mess').hide('fade');
        });
    });
})(jQuery);