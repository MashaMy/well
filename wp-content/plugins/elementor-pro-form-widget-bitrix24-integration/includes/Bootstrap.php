<?php
namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

class Bootstrap
{
    const OPTIONS_KEY = 'elementor-bitrix24-integration-settings';
    const PURCHASE_CODE_OPTIONS_KEY = 'elementor-bitrix24-purchase-code';
    const META_KEY = '_elementor-bitrix24-integration';

    const LEAD_FIELDS_KEY = '_elementor-bitrix24-lead-fields';

    const DEAL_FIELDS_KEY = '_elementor-bitrix24-deal-fields';
    const DEAL_CATEGORY_LIST_KEY = '_elementor-bitrix24-deal-category-list';

    const TASK_FIELDS_KEY = '_elementor-bitrix24-task-fields';
    const CONTACT_FIELDS_KEY = '_elementor-bitrix24-contact-fields';
    const COMPANY_FIELDS_KEY = '_elementor-bitrix24-company-fields';
    const STATUS_LIST_KEY = '_elementor-bitrix24-status-list';
    const CURRENCY_LIST_KEY = '_elementor-bitrix24-currency-list';

    const UTM_COOKIES = 'elementor-bitrix24-utm-cookie';

    public static $plugin = '';

    private static $instance = false;

    protected function __construct($file)
    {
        self::$plugin = $file;

        register_activation_hook(
            self::$plugin,
            ['IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\Bootstrap', 'pluginActivation']
        );
        register_deactivation_hook(
            self::$plugin,
            ['IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\Bootstrap', 'pluginDeactivation']
        );
        register_uninstall_hook(
            self::$plugin,
            ['IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\Bootstrap', 'pluginUninstall']
        );

        add_action('init', [$this, 'utmCookies']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);

        add_action('wp_ajax_elementorBitrix24AjaxSetUtm', [$this, 'utmCookies']);
        add_action('wp_ajax_nopriv_elementorBitrix24AjaxSetUtm', [$this, 'utmCookies']);
    }

    public static function getInstance($file)
    {
        if (!self::$instance) {
            self::$instance = new self($file);
        }

        return self::$instance;
    }

    public function utmCookies()
    {
        if (isset($_GET['utm_source'])) {
            setcookie(
                self::UTM_COOKIES,
                wp_json_encode([
                    'utm_source' => isset($_GET['utm_source']) ? wp_unslash($_GET['utm_source']) : '',
                    'utm_medium' => isset($_GET['utm_medium']) ? wp_unslash($_GET['utm_medium']) : '',
                    'utm_campaign' => isset($_GET['utm_campaign']) ? wp_unslash($_GET['utm_campaign']) : '',
                    'utm_term' => isset($_GET['utm_term']) ? wp_unslash($_GET['utm_term']) : '',
                    'utm_content' => isset($_GET['utm_content']) ? wp_unslash($_GET['utm_content']) : ''
                ]),
                time() + 86400,
                '/'
            );
        }
    }

    public function enqueueScripts()
    {
        if (!defined('WP_CACHE') || !WP_CACHE) {
            return;
        }

        wp_enqueue_script(
            'elementor-bitrix24-theme-js',
            EL_PRO_FORM_BITRIX24_PLUGIN_URL . 'theme/js/theme.js',
            ['jquery'],
            EL_PRO_FORM_BITRIX24_PLUGIN_VERSION,
            true
        );
    }

    public static function pluginActivation()
    {
        $roles = new \WP_Roles();

        foreach (self::capabilities() as $capGroup) {
            foreach ($capGroup as $cap) {
                $roles->add_cap('administrator', $cap);

                if (is_multisite()) {
                    $roles->add_cap('super_admin', $cap);
                }
            }
        }
    }

    public static function pluginDeactivation()
    {
        // Nothing
    }

    public static function pluginUninstall()
    {
        // Nothing
    }

    public static function capabilities()
    {
        $capabilities = [];
        $capabilities['core'] = ['manage_' . self::OPTIONS_KEY];
        flush_rewrite_rules(true);

        return $capabilities;
    }

    private function __clone()
    {
    }
}
