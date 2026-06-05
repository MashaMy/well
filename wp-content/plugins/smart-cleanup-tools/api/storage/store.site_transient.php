<?php

/*
Name:    Smart Envato API: Storage - Site Transient
Version: 5.4
Author:  Milan Petrovic
Email:   support@smartplugins.info
Website: https://www.dev4press.com/

== Copyright ==
Copyright 2008 - 2020 Milan Petrovic (email: support@smartplugins.info)
*/

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('smart_envato_storage_site_transient')) {
    final class smart_envato_storage_site_transient extends smart_envato_api_storage {
        public function get($name) {
            return get_site_transient($name);
        }

        public function set($name, $value, $ttl = 0) {
            return set_site_transient($name, $value, $ttl);
        }

        public function delete($name) {
            return delete_site_transient($name);
        }

        public function clear($base) {
            global $wpdb;

            if (is_multisite()) {
                $sql = sprintf("DELETE FROM %s WHERE meta_key LIKE '%s' OR meta_key LIKE '%s'", $wpdb->sitemeta, '_site_transient_'.$base.'%', '_site_transient_timeout_'.$base.'%');
            } else {
                $sql = sprintf("DELETE FROM %s WHERE option_name LIKE '%s' OR option_name LIKE '%s'", $wpdb->options, '_site_transient_'.$base.'%', '_site_transient_timeout_'.$base.'%');
            }

            $wpdb->query($sql);
        }
    }
}
