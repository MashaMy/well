<?php
/**
 * Plugin Name: Elementor Pro Form Widget - Bitrix24 CRM - Integration
 * Description: Allows your to create lead, deal, task, contact or company in Bitrix24 when sending a message.
 * Version: 1.6.0
 * Author: itgalaxycompany
 * Author URI: https://codecanyon.net/user/itgalaxycompany
 * License: GPLv2
 * Text Domain: el-pro-form-bitrix24-integration
 * Domain Path: /languages/
 */

use ElementorPro\Plugin;

use IwantToBelive\Elementor\Form\Bitrix\Integration\Admin\IntegrationSettings;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\Bootstrap;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\CompanyActionAfterSubmit;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\ContactActionAfterSubmit;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\DealActionAfterSubmit;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\LeadActionAfterSubmit;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\TaskActionAfterSubmit;

if (!defined('ABSPATH')) {
    exit();
}

/*
 * Require for `is_plugin_active` function.
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';

define('EL_PRO_FORM_BITRIX24_PLUGIN_URL', plugin_dir_url(__FILE__));
define('EL_PRO_FORM_BITRIX24_PLUGIN_VERSION', '1.6.0');
define('EL_PRO_FORM_BITRIX24_PLUGIN_DIR', plugin_dir_path(__FILE__));

if (!defined('EL_PRO_FORM_BITRIX24_PLUGIN_LOG_FILE')) {
    define('EL_PRO_FORM_BITRIX24_PLUGIN_LOG_FILE', __DIR__ . '/logs/.elprobitrix24.log');
}

load_theme_textdomain('el-pro-form-bitrix24-integration', EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/languages');

require EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/vendor/autoload.php';

require EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/Bootstrap.php';
require EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/Helper.php';
require EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/CrmFields.php';
require EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/RenderFields.php';
require EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/Crm.php';

Bootstrap::getInstance(__FILE__);

if (is_admin()) {
    add_action(
        'elementor_pro/init',
        function () {
            include_once EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/admin/IntegrationSettings.php';

            IntegrationSettings::getInstance();
        }
    );
}

add_action(
    'elementor_pro/init',
    function () {
        $settings = get_option(Bootstrap::OPTIONS_KEY);

        // if webhook is not specified, then we do not load actions
        if (empty($settings['webhook'])) {
            return;
        }

        include_once EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/LeadActionAfterSubmit.php';
        include_once EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/DealActionAfterSubmit.php';
        include_once EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/TaskActionAfterSubmit.php';
        include_once EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/ContactActionAfterSubmit.php';
        include_once EL_PRO_FORM_BITRIX24_PLUGIN_DIR . '/includes/CompanyActionAfterSubmit.php';

        $leadAction = new LeadActionAfterSubmit();
        $dealAction = new DealActionAfterSubmit();
        $taskAction = new TaskActionAfterSubmit();
        $contactAction = new ContactActionAfterSubmit();
        $companyAction = new CompanyActionAfterSubmit();

        $formModule = Plugin::instance()->modules_manager->get_modules('forms');

        $formModule->add_form_action($leadAction->get_name(), $leadAction);
        $formModule->add_form_action($dealAction->get_name(), $dealAction);
        $formModule->add_form_action($taskAction->get_name(), $taskAction);
        $formModule->add_form_action($contactAction->get_name(), $contactAction);
        $formModule->add_form_action($companyAction->get_name(), $companyAction);
    }
);
