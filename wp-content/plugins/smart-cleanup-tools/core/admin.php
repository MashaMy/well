<?php

if (!defined('ABSPATH')) {
    exit;
}

class sct_admin {
    public $page_ids = array();

    function __construct() {
        add_action('admin_init', array($this, 'save_settings'));
        add_action('admin_menu', array($this, 'admin_menu'));

        add_filter('plugin_row_meta', array($this, 'plugin_row_meta'), 10, 2);
        add_filter('plugin_action_links_smart-cleanup-tools/smart-cleanup-tools.php', array($this, 'plugin_action_links'));

        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
    }

    public function save_settings() {
        if (isset($_POST['option_page']) && $_POST['option_page'] == 'smart-cleanup-tools-import') {
            check_admin_referer('smart-cleanup-tools-import-options');

            if (is_uploaded_file($_FILES['import_file']['tmp_name'])) {
                $data = file_get_contents($_FILES['import_file']['tmp_name']);
                $data = maybe_unserialize($data);

                if (is_object($data)) {
                    $import_done = false;

                    if (is_network_admin()) {
                        $settings = isset($_POST['import_settings']) && isset($data->{'smart-cleanup-tools-network'});
                        $jobs = isset($_POST['import_jobs']) && isset($data->{'smart-scheduled-jobs-network'});

                        if ($jobs) {
                            $import_done = true;
                            smart_sct_core()->import_scheduled_jobs($data->{'smart-scheduled-jobs-network'});
                        }

                        if ($settings) {
                            $import_done = true;

                            foreach ($data->{'smart-cleanup-tools-network'} as $key => $value) {
                                smart_sct_core()->network[$key] = $value;
                            }

                            smart_sct_core()->save_network();
                        }
                    } else {
                        $settings = isset($_POST['import_settings']) && isset($data->{'smart-cleanup-tools'});
                        $jobs = isset($_POST['import_jobs']) && isset($data->{'smart-scheduled-jobs-site'});

                        if ($jobs) {
                            $import_done = true;
                            smart_sct_core()->import_scheduled_jobs($data->{'smart-scheduled-jobs-site'});
                        }

                        if ($settings) {
                            $import_done = true;

                            foreach ($data->{'smart-cleanup-tools'} as $key => $value) {
                                smart_sct_core()->settings[$key] = $value;
                            }

                            smart_sct_core()->save();
                        }
                    }

                    if ($import_done) {
                        wp_redirect('admin.php?page=smart-cleanup-tools-impexp&settings-updated=true');
                    } else {
                        wp_redirect('admin.php?page=smart-cleanup-tools-impexp&import-nothing=true');
                    }

                    exit;
                }
            }

            wp_redirect('admin.php?page=smart-cleanup-tools-impexp&import-failed=true');
            exit;
        }

        if (isset($_POST['option_page']) && $_POST['option_page'] == 'smart-cleanup-tools-clearlogs') {
            check_admin_referer('smart-cleanup-tools-clearlogs-options');

            $scope = strip_tags(stripslashes($_POST['sct']['scope']));

            foreach (array_keys(smart_sct_core()->log_files) as $log) {
                smart_sct_core()->log_truncate($log, $scope);
            }

            wp_redirect('admin.php?page=smart-cleanup-tools-logs&logs-cleared=true');
            exit;
        }

        if (isset($_POST['option_page']) && $_POST['option_page'] == 'smart-cleanup-tools-job') {
            check_admin_referer('smart-cleanup-tools-job-options');

            $scopes = (array)$_POST['job_scope'];
            $task = in_array('site', $scopes) ? 'stc_runcleanup_site' : 'stc_runcleanup_network';

            $first_run = trim(strip_tags(stripslashes($_POST['first_run'])));
            $timestamp = $first_run == '' ? time() : sct_local_to_server_timestamp(strtotime($first_run));
            $job = $_POST['job_code'];

            $cron = array('job_scope' => array(), 'first_run' => $timestamp,
                'job_title' => strip_tags(stripslashes($_POST['job_title'])),
                'job_method' => strip_tags(stripslashes($_POST['job_method'])),
                'tools' => array(), 'args' => array(), 'labels' => array()
            );

            $run = false;
            foreach ($scopes as $scope) {
                if (isset($_POST['sct'][$scope]) && !empty($_POST['sct'][$scope])) {
                    $labels = $_POST['sct'][$scope];
                    $tools = array_keys($labels);
                    $run = true;

                    $cron['job_scope'][] = $scope;
                    $cron['labels'] = array_merge($cron['labels'], $labels);
                    $cron['tools'] = array_merge($cron['tools'], $tools);

                    foreach ($tools as $tool) {
                        if (isset($_POST['sct_args'][$scope][$tool])) {
                            $cron['args'][$tool] = $_POST['sct_args'][$scope][$tool];
                        } else {
                            $cron['args'][$tool] = array();
                        }
                    }
                }
            }

            if ($run) {
                if ($job != 'new') {
                    $parts = explode('-', $job);

                    sct_unschedule_job($task, $parts[0], $parts[1]);
                }

                if ($cron['job_method'] == 'once') {
                    wp_schedule_single_event($cron['first_run'], $task, array($cron));
                } else {
                    $period = substr($cron['job_method'], 5);
                    wp_schedule_event($cron['first_run'], $period, $task, array($cron));
                }

                wp_redirect('admin.php?page=smart-cleanup-tools-scheduler&job-saved=true');
            } else {
                wp_redirect('admin.php?page=smart-cleanup-tools-scheduler&job-empty=true');
            }

            exit;
        }

        if (isset($_POST['option_page']) && $_POST['option_page'] == 'smart-cleanup-tools') {
            check_admin_referer('smart-cleanup-tools-options');

            if ($_POST['cleanup_scope'] == 'site') {
                smart_sct_core()->settings['log_enabled'] = isset($_POST['log_enabled']);
                smart_sct_core()->settings['log_run_report'] = isset($_POST['log_run_report']);
                smart_sct_core()->settings['log_cron_report'] = isset($_POST['log_cron_report']);
                smart_sct_core()->settings['log_sql_run'] = isset($_POST['log_sql_run']);
                smart_sct_core()->settings['log_sql_check'] = isset($_POST['log_sql_check']);

                smart_sct_core()->settings['toolbar_menu_active'] = isset($_POST['toolbar_menu_active']);

                smart_sct_core()->settings['cleanup_summary'] = isset($_POST['cleanup_summary']);
                smart_sct_core()->settings['cleanup_show_inactive'] = isset($_POST['cleanup_show_inactive']);

                smart_sct_core()->settings['disabled'] = array('site' => array(), 'reset' => array(), 'removal' => array());

                if (!isset(smart_sct_core()->settings['disabled']['removal'])) {
                    smart_sct_core()->settings['disabled']['removal'] = array();
                }

                if (isset($_POST['disable_tools'])) {
                    if (isset($_POST['disable_tools']['site'])) {
                        smart_sct_core()->settings['disabled']['site'] = (array)$_POST['disable_tools']['site'];
                    }

                    if (isset($_POST['disable_tools']['reset'])) {
                        smart_sct_core()->settings['disabled']['reset'] = (array)$_POST['disable_tools']['reset'];
                    }

                    if (isset($_POST['disable_tools']['removal'])) {
                        smart_sct_core()->settings['disabled']['removal'] = (array)$_POST['disable_tools']['removal'];
                    }
                }

                smart_sct_core()->save();
            } else {
                smart_sct_core()->network['log_enabled'] = isset($_POST['log_enabled']);
                smart_sct_core()->network['log_run_report'] = isset($_POST['log_run_report']);
                smart_sct_core()->network['log_cron_report'] = isset($_POST['log_cron_report']);
                smart_sct_core()->network['log_sql_run'] = isset($_POST['log_sql_run']);
                smart_sct_core()->network['log_sql_check'] = isset($_POST['log_sql_check']);

                smart_sct_core()->network['toolbar_menu_active'] = isset($_POST['toolbar_menu_active']);

                smart_sct_core()->network['cleanup_summary'] = isset($_POST['cleanup_summary']);
                smart_sct_core()->network['cleanup_show_inactive'] = isset($_POST['cleanup_show_inactive']);

                smart_sct_core()->network['disabled'] = array('network' => array(), 'netreset' => array(), 'removal' => array());

                if (!isset(smart_sct_core()->network['disabled']['removal'])) {
                    smart_sct_core()->network['disabled']['removal'] = array();
                }

                if (isset($_POST['disable_tools'])) {
                    if (isset($_POST['disable_tools']['network'])) {
                        smart_sct_core()->network['disabled']['network'] = (array)$_POST['disable_tools']['network'];
                    }

                    if (isset($_POST['disable_tools']['netreset'])) {
                        smart_sct_core()->network['disabled']['netreset'] = (array)$_POST['disable_tools']['netreset'];
                    }

                    if (isset($_POST['disable_tools']['removal'])) {
                        smart_sct_core()->network['disabled']['removal'] = (array)$_POST['disable_tools']['removal'];
                    }
                }

                smart_sct_core()->save_network();
            }

            wp_redirect('admin.php?page=smart-cleanup-tools-settings&settings-updated=true');
            exit;
        }
    }

    public function admin_menu() {
        $icon = 'dashicons-trash';

        $this->page_ids[] = add_menu_page(__("Smart Cleanup Tools", "smart-cleanup-tools"), __("Smart Cleanup", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-front', array($this, 'menu_front'), $icon);
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Intro", "smart-cleanup-tools"), __("Intro", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-front', array($this, 'menu_front'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("About", "smart-cleanup-tools"), __("About", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-about', array($this, 'menu_about'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Cleanup Tools", "smart-cleanup-tools"), __("Cleanup Tools", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-cleanup', array($this, 'menu_cleanup'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Reset Tools", "smart-cleanup-tools"), __("Reset Tools", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-reset', array($this, 'menu_reset'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Removal Tools", "smart-cleanup-tools"), __("Removal Tools", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-removal', array($this, 'menu_removal'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Scheduler", "smart-cleanup-tools"), __("Scheduler", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-scheduler', array($this, 'menu_scheduler'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Statistics", "smart-cleanup-tools"), __("Statistics", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-statistics', array($this, 'menu_statistics'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("View Logs", "smart-cleanup-tools"), __("View Logs", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-logs', array($this, 'menu_log'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Settings", "smart-cleanup-tools"), __("Settings", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-settings', array($this, 'menu_settings'));
        $this->page_ids[] = add_submenu_page('smart-cleanup-tools-front', __("Smart Cleanup Tools", "smart-cleanup-tools").': '.__("Export / Import", "smart-cleanup-tools"), __("Export / Import", "smart-cleanup-tools"), 'activate_plugins', 'smart-cleanup-tools-impexp', array($this, 'menu_impexp'));

        foreach ($this->page_ids as $id) {
            add_action('load-'.$id, array($this, 'load_admin_page_shared'));
        }
    }

    public function load_admin_page_shared() {
        $screen = get_current_screen();

        $screen->set_help_sidebar('
            <p><strong>SMART Plugins:</strong></p>
            <p><a target="_blank" href="https://www.smartplugins.info/">'.__("Website", "smart-cleanup-tools").'</a></p>
            <p><a target="_blank" href="https://codecanyon.net/user/GDragoN/portfolio?ref=GDragoN">'.__("On CodeCanyon", "smart-cleanup-tools").'</a></p>
            <p><a target="_blank" href="https://twitter.com/smartplugins">'.__("On Twitter", "smart-cleanup-tools").'</a></p>
            <p><a target="_blank" href="https://facebook.com/smartplugins">'.__("On Facebook", "smart-cleanup-tools").'</a></p>');

        $screen->add_help_tab(array(
            'id' => 'sct-screenhelp-info',
            'title' => __("Information", "smart-cleanup-tools"),
            'content' => '<p>'.__("Add contact form to any and all pages on your website, descretly hidden on the left side of the screen behind the tab, sliding open when needed.", "smart-cleanup-tools").'</p>
                <h5>'.__("Useful Links", "smart-cleanup-tools").'</h5>
                <p><a target="_blank" href="https://www.smartplugins.info/plugin/wordpress/smart-cleanup-tools/">'.__("Plugin Homepage", "smart-cleanup-tools").'</a></p>
                <p><a target="_blank" href="https://d4p.me/ccsct">'.__("Plugin On CodeCanyon", "smart-cleanup-tools").'</a></p>'
        ));

        $screen->add_help_tab(array(
            'id' => 'sct-screenhelp-support',
            'title' => __("Support", "smart-cleanup-tools"),
            'content' => '<h5>'.__("Support Reources", "smart-cleanup-tools").'</h5>
                <p><a target="_blank" href="https://forum.smartplugins.info/forums/forum/simple/smart-cleanup-tools/">'.__("Official Support Forum", "smart-cleanup-tools").'</a></p>'
        ));
    }

    public function plugin_row_meta($links, $plugin_file) {
        if ($plugin_file == 'smart-cleanup-tools/smart-cleanup-tools.php') {
            $links[] = 'SMART Plugins: <a href="https://www.smartplugins.info/" target="_blank">Website</a>';
            $links[] = '<a href="https://codecanyon.net/user/GDragoN/portfolio?ref=GDragoN" target="_blank">On CodeCanyon</a>';
        }

        return $links;
    }

    public function plugin_action_links($links) {
        $links[] = '<a href="admin.php?page=smart-cleanup-tools-front">'.__("Cleanup", "smart-cleanup-tools").'</a>';

        return $links;
    }

    public function admin_enqueue_scripts($hook) {
        if ($hook == 'toplevel_page_smart-cleanup-tools-front' || substr($hook, 0, 39) == 'smart-cleanup_page_smart-cleanup-tools-') {
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-form');
            wp_enqueue_script('wpdialogs');
            wp_enqueue_style('wp-jquery-ui-dialog');

            $depend_js = array('jquery', 'jquery-form', 'wpdialogs', 'sct-sumoselect', 'sct-flatpickr');
            $depend_css = array('wp-jquery-ui-dialog', 'sct-sumoselect', 'sct-flatpickr');

            wp_enqueue_script('sct-sumoselect', SCT_URL.'libs/sumoselect/sumoselect.min.js', array('jquery'), null, true);
            wp_enqueue_style('sct-sumoselect', SCT_URL.'libs/sumoselect/sumoselect.min.css', array());

            wp_enqueue_script('sct-flatpickr', SCT_URL.'libs/flatpickr/flatpickr.min.js', array('jquery'), null, true);
            wp_enqueue_style('sct-flatpickr', SCT_URL.'libs/flatpickr/flatpickr.min.css', array());

            wp_enqueue_script('sct-admin', (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? SCT_URL.'js/admin.js' : SCT_URL.'js/admin.min.js'), $depend_js, null, true);
            wp_enqueue_style('sct-admin', (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? SCT_URL.'css/admin.css' : SCT_URL.'css/admin.min.css'), $depend_css);

            wp_localize_script('sct-admin', 'sct_admin_data', array(
                'confirm_areyousure' => __("Are you sure that you want to do this? Operation is not reversable.", "smart-cleanup-tools"),
                'dropdown_disabled_noneSelectedText' => __("Select tools to disable", "smart-cleanup-tools"),
                'dropdown_disabled_selectedText' => __("{0} tools disabled", "smart-cleanup-tools"),
                'dropdown_disabled_allSelectedText' => __("All tools disabled", "smart-cleanup-tools"),
                'dropdown_noneSelectedText' => __("All Post Types", "smart-cleanup-tools"),
                'dropdown_selectedText' => __("{0} post types", "smart-cleanup-tools"),
                'dropdown_allSelectedText' => __("All post types", "smart-cleanup-tools")
            ));
        }
    }

    public function menu_front() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'cleanup';
        $scope = is_network_admin() ? 'network' : 'site';

        if (isset($_GET['action'])) {
            $panel_title = __("Quick Cleanup", "smart-cleanup-tools");

            include(SCT_PATH.'forms/shared/header.php');
            include(SCT_PATH.'forms/panels/toolbar.php');
            include(SCT_PATH.'forms/shared/footer.php');
        } else {
            $panel_title = '';

            smart_sct_core()->init_cleanup_methods($scope);

            if (is_network_admin()) {
                $globals = smart_sct_core()->network['global'];
            } else {
                $globals = smart_sct_core()->settings['global'];
            }

            include(SCT_PATH.'forms/shared/header.php');
            include(SCT_PATH.'forms/panels/front.php');
            include(SCT_PATH.'forms/shared/footer.php');
        }
    }

    public function menu_about() {
        $about = smart_sct_core()->settings;

        $scope = 'site';
        $current = 'about';
        $panel_title = __("About", "smart-cleanup-tools");

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/about.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_cleanup() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'cleanup';
        $scope = is_network_admin() ? 'network' : 'site';
        smart_sct_core()->init_cleanup_methods($scope);

        $panel_title = __("Cleanup", "smart-cleanup-tools");

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/cleanup.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_reset() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'reset';
        $scope = is_network_admin() ? 'netreset' : 'reset';
        smart_sct_core()->init_cleanup_methods($scope);

        $panel_title = __("Reset", "smart-cleanup-tools");

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/reset.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_removal() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'removal';
        $scope = is_network_admin() ? 'network' : 'site';
        smart_sct_core()->init_removal_methods($scope);

        $panel_title = __("Removal", "smart-cleanup-tools");

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/removal.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_scheduler() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'scheduler';
        $scope = is_network_admin() ? 'network' : 'site';

        $r = smart_sct_core()->handle_menu_cron($scope);
        extract($r);

        if ($job == '') {
            $panel_title = __("Scheduler", "smart-cleanup-tools");

            include(SCT_PATH.'forms/shared/header.php');
            include(SCT_PATH.'forms/panels/scheduler.php');
        } else {
            $to_load = $scope == 'site' ? array('site', 'reset') : array('network', 'netreset');
            smart_sct_core()->init_cleanup_methods($to_load);

            $panel_title = __("Scheduler Job", "smart-cleanup-tools");

            include(SCT_PATH.'forms/shared/header.php');
            include(SCT_PATH.'forms/panels/scheduler.new.php');
        }

        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_statistics() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'statistics';
        $scope = is_network_admin() ? 'network' : 'site';

        $panel_title = __("Statistics", "smart-cleanup-tools");

        $scopes = is_network_admin() ? array('network', 'netreset') : array('site', 'reset');

        if (is_network_admin()) {
            $globals = smart_sct_core()->network['global'];
            $global_crons = smart_sct_core()->settings['cron'];
            $statistics = smart_sct_core()->network['statistics'];
        } else {
            $globals = smart_sct_core()->settings['global'];
            $global_crons = smart_sct_core()->settings['cron'];
            $statistics = smart_sct_core()->settings['statistics'];
        }

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/statistics.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_settings() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'settings';
        $scope = is_network_admin() ? 'network' : 'site';

        $panel_title = __("Settings", "smart-cleanup-tools");

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/settings.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_log() {
        $settings = smart_sct_core()->settings;

        $current = 'log';
        $scope = is_network_admin() ? 'network' : 'site';

        $panel_title = __("View Logs", "smart-cleanup-tools");

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/log.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }

    public function menu_impexp() {
        $settings = is_network_admin() ? smart_sct_core()->network : smart_sct_core()->settings;

        $current = 'impexp';
        $scope = is_network_admin() ? 'network' : 'site';

        $panel_title = __("Import / Export", "smart-cleanup-tools");

        include(SCT_PATH.'forms/shared/header.php');
        include(SCT_PATH.'forms/panels/impexp.php');
        include(SCT_PATH.'forms/shared/footer.php');
    }
}

global $sct_core_admin;
$sct_core_admin = new sct_admin();
