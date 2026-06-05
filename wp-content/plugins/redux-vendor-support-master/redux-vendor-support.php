<?php
    /**
     * The Reduk Framework Plugin
     * A simple, truly extensible and fully responsive options framework
     * for WordPress themes and plugins. Developed with WordPress coding
     * standards and PHP best practices in mind.
     * Plugin Name:     Redux Vendor Support
     * Plugin URI:      http://reduxframeworks.com/vendor-support
     * Description:     Registration of Reduk support libraries for local installations.
     * Author:          Team Reduk
     * Author URI:      http://reduxframework.com
     * Version:         1.0.1
     * Text Domain:     reduk-framework
     * License:         GPL3+
     * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
     * Domain Path:     /RedukFramework/RedukCore/languages
     * Depends:         RedukFramework
     *
     * @copyright       2012-2015 Reduk Framework
     */

// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        die;
    }

    if ( ! class_exists( 'RedukFramework_extension_vendor_support' ) ) {
        if ( file_exists( dirname( __FILE__ ) . '/vendor_support/extension_vendor_support.php' ) ) {
            require dirname( __FILE__ ) . '/vendor_support/extension_vendor_support.php';
            new RedukFramework_extension_vendor_support();
        }
    }