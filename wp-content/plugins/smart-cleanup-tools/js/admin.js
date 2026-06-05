/*jslint regexp: true, nomen: true, sloppy: true, eqeq: true, vars: true, white: true, plusplus: true, maxerr: 50, indent: 4 */
/*global ajaxurl, sct_admin_data*/

var sct_admin = {
    current: null,
    close_message: function() {
        jQuery(".wrap #message").slideUp("slow");
    },
    init: function() {
        setTimeout(sct_admin.close_message, 5000);

        jQuery(".sct-quick-links-panel-toggle").click(function(e) {
            e.preventDefault();

            jQuery("#sct-quick-links-panel").slideToggle(400);
        });

        jQuery("#sct-dialog-tool-details").wpdialog({
            autoResize:true, resizable: true, modal: true, 
            width: 680, autoOpen: false, closeOnEscape: true, autoHeight: true,
            buttons: {
                OK: function() {
                    jQuery(this).wpdialog("close");
                }
            }
        });

        jQuery("#sct-dialog-tool-help").wpdialog({
            autoResize:true, resizable: true, modal: true, 
            width: 680, autoOpen: false, closeOnEscape: true, autoHeight: true,
            buttons: {
                OK: function() {
                    jQuery(this).wpdialog("close");
                }
            }
        });

        jQuery(".sct-auto-enabler").click(function(e) {
            e.preventDefault();

            var operation = jQuery(this).attr("href").substr(1);

            if (operation === "enable") {
                jQuery(".sct-checkbox").attr("checked", "checked").parent().parent().parent().addClass("sct-enabled");
            } else if (operation === "disable") {
                jQuery(".sct-checkbox").removeAttr("checked").parent().parent().parent().removeClass("sct-enabled");
            }
        });

        jQuery(".sct-dropdown-single").SumoSelect();

        jQuery(".sct-dropdown").SumoSelect({
            placeholder: sct_admin_data.dropdown_noneSelectedText,
            captionFormat: sct_admin_data.dropdown_selectedText,
            captionFormatAllSelected: sct_admin_data.dropdown_allSelectedText
        });

        jQuery(".sct-dropdown-disabled").SumoSelect({
            placeholder: sct_admin_data.dropdown_disabled_noneSelectedText,
            captionFormat: sct_admin_data.dropdown_disabled_selectedText,
            captionFormatAllSelected: sct_admin_data.dropdown_disabled_allSelectedText
        });

        jQuery(".sct-cleanup-checkbox input").click(function() {
            if (jQuery(this).is(":checked")) {
                jQuery(this).parent().parent().parent().addClass("sct-enabled");
            } else {
                jQuery(this).parent().parent().parent().removeClass("sct-enabled");
            }
        });

        jQuery(".sct-tool-detail").click(function(e) {
            e.preventDefault();

            var id = jQuery(this).attr("href").substr(1),
                dialog = jQuery("#sct-dialog-tool-details"),
                details = jQuery("#sct-details-" + id);

            jQuery("#sct-details-content").html(details.html());

            dialog.wpdialog("option", "title", details.attr("title"));
            dialog.wpdialog("open");
        });

        jQuery(".sct-tool-help").click(function(e) {
            e.preventDefault();

            var id = jQuery(this).attr("href").substr(1),
                dialog = jQuery("#sct-dialog-tool-help"),
                details = jQuery("#sct-help-" + id);

            jQuery("#sct-help-content").html(details.html());

            dialog.wpdialog("option", "title", details.attr("title"));
            dialog.wpdialog("open");
        });

        jQuery("#sct-remove-load").click(function(e) {
            e.preventDefault();

            var load = jQuery("#sct-remove-type").val();
            jQuery(".sct-remove-panel").hide();
            jQuery("#remove-type").val(load);
            jQuery("#remove-" + load).show();

            var active = jQuery("#remove-" + load + " .sct-tool-active").val();

            jQuery("#sct-removal-block").html("");

            if (load === "nothing" || active === "no") {
                jQuery("#sct-removal-preview-run").hide();
            } else {
                jQuery("#sct-removal-preview-run").show();
            }
        });

        jQuery(document).on("click", "#sct-removal-action-run", function(e) {
            e.preventDefault();

            if (sct_admin.confirm()) {
                sct_admin.dim_remove.open("removal");

                jQuery("#sct-removal-action").ajaxSubmit({
                    success: function(html) {
                        jQuery("#sct-removal-block").html(html);

                        sct_admin.dim_remove.close();
                    },
                    dataType: "html", type: "post", timeout: 15 * 60 * 1000,
                    url: ajaxurl + "?action=smart_removal_action"
                });
            }
        });

        jQuery("#sct-removal-preview-run").click(function(e) {
            e.preventDefault();

            sct_admin.dim_remove.open("analyze");

            jQuery("#sct-removal-block").html("");

            jQuery("#sct-removal-preview").ajaxSubmit({
                success: function(html) {
                    jQuery("#sct-removal-block").html(html);

                    sct_admin.dim_remove.close();
                },
                dataType: "html", type: "post", timeout: 15 * 60 * 1000,
                url: ajaxurl + "?action=smart_removal_preview"
            });
        });

        jQuery("#sct-cleanup-quick").click(function(e) {
            e.preventDefault();

            sct_admin.dim_cleanup.open();

            jQuery("#sct-cleanup-form-quick").ajaxSubmit({
                success: function(html) {
                    jQuery("#sct-quick-cleanup-results").html(html);

                    sct_admin.dim_cleanup.close();
                },
                dataType: "html", type: "post", timeout: 15 * 60 * 1000,
                url: ajaxurl + "?action=smart_cleanup_quick"
            });
        });

        jQuery("#sct-cleanup-run").click(function(e) {
            e.preventDefault();

            sct_admin.dim_cleanup.open();

            jQuery("#sct-cleanup-form").ajaxSubmit({
                success: function(html) {
                    jQuery("#ddw-panel").html(html);

                    sct_admin.dim_cleanup.close();
                },
                dataType: "html", type: "post", timeout: 15 * 60 * 1000,
                url: ajaxurl + "?action=smart_cleanup_run"
            });
        });

        jQuery("#run-export").click(function() {
            var url = jQuery(this).data("url"), exp = [];

            jQuery("[name^=export_]").each(function() {
                if (jQuery(this).is(":checked")) {
                    exp.push(jQuery(this).attr("id").substr(7));
                }
            });

            url+= "&export=" + exp.join(",");
            window.location = url;
        });
    },
    dim_remove: {
        open: function(name) {
            jQuery(".dim-remove").hide();
            jQuery("#dim-remove-" + name).show();

            sct_admin.dim_cleanup.open();
        },
        close: function() {
            sct_admin.dim_cleanup.close();
        }
    },
    dim_cleanup: {
        open: function() {
            jQuery(".sct-dim").show();
            jQuery("html").css("overflow", "hidden");
            sct_admin.current = new Date();
        },
        close: function() {
            jQuery(".sct-dim").hide();
            jQuery("html").css("overflow", "auto");
        }
    },
    pad_time_string: function(number) {
        if (number < 10) {
            return "0" + number;
        } else {
            return number;
        }
    },
    timer: function() {
        if (jQuery("#sct-load-timer").length > 0) {
            sct_admin.current = new Date();

            setInterval(function() {
                var total_miliseconds = new Date() - sct_admin.current;   

                var hours = Math.floor(total_miliseconds / 3600000);
                total_miliseconds = total_miliseconds % 3600000;

                var minutes = Math.floor(total_miliseconds / 60000);
                total_miliseconds = total_miliseconds % 60000;

                var seconds = Math.floor(total_miliseconds / 1000);
                total_miliseconds = total_miliseconds % 1000;

                var miliseconds = Math.floor(total_miliseconds);

                hours = sct_admin.pad_time_string(hours);
                minutes = sct_admin.pad_time_string(minutes);
                seconds = sct_admin.pad_time_string(seconds);
                miliseconds = sct_admin.pad_time_string(miliseconds);

                var currentTimeString = hours + ":" + minutes + ":" + seconds + "." + miliseconds;

                jQuery("#sct-load-timer").html(currentTimeString);
            }, 200);
        }
    },
    job: function() {
        jQuery("#job_first_run").flatpickr({
            enableTime: true,
            enableSeconds: true,
            altInput: true,
            dateFormat: "Y-m-d H:i:S"
        });
    },
    confirm: function() {
        return confirm(sct_admin_data.confirm_areyousure);
    },
    scroller: function() {
        var $sidebar = jQuery("#scs-scroll-sidebar"), 
            $window = jQuery(window);

        if ($sidebar.length > 0) {
            var offset = $sidebar.offset(),
                topPadding = 40;

            $window.scroll(function() {
                if ($window.scrollTop() > offset.top) {
                    $sidebar.stop().animate({
                        marginTop: $window.scrollTop() - offset.top + topPadding
                    });
                } else {
                    $sidebar.stop().animate({
                        marginTop: 0
                    });
                }
            });
        }
    }
};

jQuery(document).ready(function() {
    sct_admin.timer();
    sct_admin.init();
    sct_admin.scroller();
});
