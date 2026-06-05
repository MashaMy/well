<?php

/*
Plugin Name: Smart Cleanup Tools - Plugin for WordPress
Plugin URI: https://www.smartplugins.info/plugin/wordpress/smart-cleanup-tools/
Description: Powerful and easy to use plugin for cleaning the database from old and unused records, transient cache and overhead. Supports multisite mode.
Version: 4.9
Author: Milan Petrovic
Author URI: https://www.dev4press.com/

== Copyright ==
Copyright 2008 - 2020 Milan Petrovic (email: support@smartplugins.info)
*/

define('SCT_WP_CRON', defined('DOING_CRON') && DOING_CRON);

if (is_admin() || 
    is_network_admin() || 
    SCT_WP_CRON) {
        require_once('load.php');
}
