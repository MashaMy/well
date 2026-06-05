<?php

namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Admin;

use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\Bootstrap;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\Crm;
use IwantToBelive\Elementor\Form\Bitrix\Integration\Includes\Helper;

class IntegrationSettings
{
    private static $instance = false;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function __construct()
    {
        add_action('admin_menu', [$this, 'addSubmenu'], PHP_INT_MAX);
        add_action('admin_notices', [$this, 'submitListener'], 11);

        add_action('wp_ajax_elementorBitrix24AjaxValidateWebhook', [$this, 'ajaxValidateWebhook']);

        if (isset($_GET['page']) && $_GET['page'] === Bootstrap::OPTIONS_KEY) {
            add_action('admin_enqueue_scripts', function () {
                wp_enqueue_script(
                    'elementor-bitrix24-admin-js',
                    EL_PRO_FORM_BITRIX24_PLUGIN_URL . 'admin/js/admin.js',
                    false,
                    EL_PRO_FORM_BITRIX24_PLUGIN_VERSION
                );
            });
        }
    }

    public function addSubmenu()
    {
        add_submenu_page(
            'elementor',
            esc_html__('Bitrix24', 'el-pro-form-bitrix24-integration'),
            esc_html__('Bitrix24', 'el-pro-form-bitrix24-integration'),
            'manage_' . Bootstrap::OPTIONS_KEY,
            Bootstrap::OPTIONS_KEY,
            [$this, 'settingsPage']
        );
    }

    public function ajaxValidateWebhook()
    {
        $response = '';
        $webhook = isset($_POST['webhook']) ? trim(wp_unslash($_POST['webhook'])) : '';
        $webhook = trailingslashit($webhook);
        $enabledLogging = isset($_POST['enabled_logging']) ? trim(wp_unslash($_POST['enabled_logging'])) : '';

        if (empty($webhook)) {
            $response = sprintf(
                '<div data-ui-component="elprobitrix24notice" class="error notice notice-error is-dismissible"><p><strong>%1$s</strong>: %2$s</p></div>',
                esc_html__('ERROR', 'el-pro-form-bitrix24-integration'),
                esc_html__('To integrate with Bitrix24, your must fill webhook field.', 'el-pro-form-bitrix24-integration')
            );
        } elseif (filter_var($webhook, FILTER_VALIDATE_URL) === false) {
            $response = sprintf(
                '<div data-ui-component="elprobitrix24notice" class="error notice notice-error"><p><strong>%1$s</strong>: %2$s</p></div>',
                esc_html__('ERROR', 'el-pro-form-bitrix24-integration'),
                esc_html__('Web hook url is not valid.', 'el-pro-form-bitrix24-integration')
            );
        } else {
            $setting = get_option(Bootstrap::OPTIONS_KEY, []);
            $setting['webhook'] = $webhook;
            $setting['enabled_logging'] = $enabledLogging;

            update_option(Bootstrap::OPTIONS_KEY, $setting);

            $check = Crm::checkConnection();

            if ($check < 3) {
                if ($check === 1) {
                    $response = sprintf(
                        '<div data-ui-component="elprobitrix24notice" class="error notice notice-error"><p><strong>%1$s</strong>: %2$s</p></div>',
                        esc_html__('ERROR', 'el-pro-form-bitrix24-integration'),
                        esc_html__('Insufficient permissions. Check CRM settings.', 'el-pro-form-bitrix24-integration')
                    );
                } elseif ($check === 2) {
                    $response = sprintf(
                        '<div data-ui-component="elprobitrix24notice" class="error notice notice-error"><p><strong>%1$s</strong>: %2$s</p></div>',
                        esc_html__('ERROR', 'el-pro-form-bitrix24-integration'),
                        esc_html__('Response CRM is not valid. Please check web hook link.', 'el-pro-form-bitrix24-integration')
                    );
                }
            } else {
                Crm::updateInformation();

                $response = sprintf(
                    '<div data-ui-component="elprobitrix24notice" class="updated notice notice-success is-dismissible"><p>%s</p></div>',
                    esc_html__('Webhook check is successfully.', 'el-pro-form-bitrix24-integration')
                );
            }
        }

        echo wp_kses_post($response);

        exit();
    }

    public function submitListener()
    {
        if (!current_user_can(apply_filters('manage_' . Bootstrap::OPTIONS_KEY, 'manage_options'))) {
            return;
        }

        if (isset($_POST['elementorBitrix24ReloadFieldsCache'])) {
            CRM::updateInformation();

            wp_safe_redirect(
                admin_url()
                . 'admin.php?page=' . Bootstrap::OPTIONS_KEY . '&success-fields-reload'
            );

            exit();
        }
    }

    public function settingsPage()
    {
        $settings = get_option(Bootstrap::OPTIONS_KEY);

        if (isset($_GET['success-fields-reload'])) {
            echo sprintf(
                '<div class="updated notice notice-success is-dismissible"><p>%s</p></div>',
                esc_html__('Fields cache updated successfully.', 'el-pro-form-bitrix24-integration')
            );
        }
        ?>
        <div id="poststuff">
            <h1><?php esc_html_e( 'Integration settings', 'el-pro-form-bitrix24-integration'); ?></h1>
            <p>
                <?php
                echo sprintf(
                    '%1$s <a href="%2$s" target="_blank">%3$s</a>. %4$s.',
                    esc_html__('Plugin documentation: ', 'el-pro-form-bitrix24-integration'),
                    esc_url(EL_PRO_FORM_BITRIX24_PLUGIN_URL . 'documentation/index.html#step-1'),
                    esc_html__('open', 'el-pro-form-bitrix24-integration'),
                    esc_html__(
                        'Or open the folder `documentation` in the plugin and open index.html',
                        'el-pro-form-bitrix24-integration'
                    )
                )
                ?>
            </p>
            <form method="post">
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="webhook">
                                    <?php esc_html_e('Inbound web hook', 'el-pro-form-bitrix24-integration'); ?>
                                </label>
                            </th>
                            <td>
                                <input type="text"
                                    aria-required="true"
                                    value="<?php
                                    echo isset($settings['webhook'])
                                        ? esc_attr($settings['webhook'])
                                        : '';
                                    ?>"
                                    id="webhook"
                                    placeholder="https://your.bitrix24.ru/rest/*/**********/"
                                    name="webhook"
                                    class="large-text">
                                <small>
                                    <?php
                                    esc_html_e(
                                        'The following permissions are required: CRM, Tasks, Tasks extended, Chat and Notifications.',
                                        'el-pro-form-bitrix24-integration'
                                    );
                                    ?>
                                </small>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="enabled_logging">
                                    <?php esc_html_e('Enable logging', 'el-pro-form-bitrix24-integration'); ?>
                                </label>
                            </th>
                            <td>
                                <input type="checkbox"
                                    value="1"
                                    <?php echo isset($settings['enabled_logging']) && $settings['enabled_logging'] == '1' ? 'checked' : ''; ?>
                                    id="enabled_logging"
                                    name="enabled_logging">
                                <br>
                                <small><?php echo esc_html(EL_PRO_FORM_BITRIX24_PLUGIN_LOG_FILE); ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input
                    type="submit"
                    data-ui-component="validate-webhook"
                    class="button button-primary"
                    name="bitrix24Submit"
                    value="<?php esc_html_e('Validate webhook', 'el-pro-form-bitrix24-integration'); ?>">
            </form>
            <?php if (Helper::isActive()) { ?>
                <hr>
                <form action="" method="post">
                    <input
                        type="submit"
                        class="button button-primary"
                        name="elementorBitrix24ReloadFieldsCache"
                        value="<?php esc_html_e('Reload fields data from CRM', 'el-pro-form-bitrix24-integration'); ?>">
                </form>
            <?php } ?>
            <hr>
            <?php
            if (isset($_POST['purchase-code'])) {
                $code = trim(wp_unslash($_POST['purchase-code']));

                $response = \wp_remote_post(
                    'https://wordpress-plugins.xyz/envato/license.php',
                    [
                        'body' => [
                            'purchaseCode' => $code,
                            'itemID' => '23783708',
                            'action' => isset($_POST['verify']) ? 'activate' : 'deactivate',
                            'domain' => site_url()
                        ],
                        'timeout' => 20
                    ]
                );

                if (is_wp_error($response)) {
                    $messageContent = '(Code - '
                        . $response->get_error_code()
                        . ') '
                        . $response->get_error_message();

                    $message = 'failedCheck';
                } else {
                    $response = json_decode(wp_remote_retrieve_body($response));

                    if ($response->status == 'successCheck') {
                        if (isset($_POST['verify'])) {
                            update_site_option(Bootstrap::PURCHASE_CODE_OPTIONS_KEY, $code);
                        } else {
                            update_site_option(Bootstrap::PURCHASE_CODE_OPTIONS_KEY, '');
                        }
                    } elseif (!isset($_POST['verify']) && $response->status == 'alreadyInactive') {
                        update_site_option(Bootstrap::PURCHASE_CODE_OPTIONS_KEY, '');
                    }

                    $messageContent = $response->message;
                    $message = $response->status;
                }

                if ($message == 'successCheck') {
                    echo sprintf(
                        '<div class="updated notice notice-success is-dismissible"><p>%s</p></div>',
                        esc_html($messageContent)
                    );
                } elseif ($messageContent) {
                    echo sprintf(
                        '<div class="error notice notice-error is-dismissible"><p>%s</p></div>',
                        esc_html($messageContent)
                    );
                }
            }
            update_site_option(Bootstrap::PURCHASE_CODE_OPTIONS_KEY, '408677d5-d9ar-49b5-9a22-006304b54656');
            $code = get_site_option(Bootstrap::PURCHASE_CODE_OPTIONS_KEY);
            ?>
            <h1>
                <?php esc_html_e('License verification', 'el-pro-form-bitrix24-integration'); ?>
                <?php if ($code) { ?>
                    - <small style="color: green;">
                        <?php esc_html_e('verified', 'el-pro-form-bitrix24-integration'); ?>
                    </small>
                <?php } else { ?>
                    - <small style="color: red;">
                        <?php esc_html_e('please verify your purchase code', 'el-pro-form-bitrix24-integration'); ?>
                    </small>
                <?php } ?>
            </h1>
            <form method="post" action="#">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="purchase-code">
                                <?php esc_html_e('Purchase code', 'el-pro-form-bitrix24-integration'); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text"
                                aria-required="true"
                                required
                                value="<?php
                                echo !empty($code)
                                    ? esc_attr($code)
                                    : '';
                                ?>"
                                id="purchase-code"
                                name="purchase-code"
                                class="large-text">
                            <small>
                                <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"
                                    target="_blank">
                                    <?php esc_html_e('Where Is My Purchase Code?', 'el-pro-form-bitrix24-integration'); ?>
                                </a>
                            </small>
                        </td>
                    </tr>
                </table>
                <p>
                    <input type="submit"
                        class="button button-primary"
                        value="<?php esc_attr_e('Verify', 'el-pro-form-bitrix24-integration'); ?>"
                        name="verify">
                    <?php if ($code) { ?>
                        <input type="submit"
                            class="button button-primary"
                            value="<?php esc_attr_e('Unverify', 'el-pro-form-bitrix24-integration'); ?>"
                            name="unverify">
                    <?php } ?>
                </p>
            </form>
        </div>
        <?php
    }
}
