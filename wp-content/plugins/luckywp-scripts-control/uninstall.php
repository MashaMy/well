<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('lwpsc_lwpsc_items');

delete_option('lwpsc_general');

delete_option('lwpsc_welcome_shown');
delete_option('lwpsc_rate_time');
