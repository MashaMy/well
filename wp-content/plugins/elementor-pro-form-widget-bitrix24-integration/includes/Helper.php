<?php
namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Helper
{
    public static $log;

    public static function log($message, $data = [], $type = 'info')
    {
        $settings = get_option(Bootstrap::OPTIONS_KEY);
        $enableLogging = isset($settings['enabled_logging']) && (int) $settings['enabled_logging'] === 1;

        if ($enableLogging) {
            try {
                if (empty(self::$log)) {
                    self::$log = new Logger('elprobitrix24');
                    self::$log->pushHandler(
                        new StreamHandler(EL_PRO_FORM_BITRIX24_PLUGIN_LOG_FILE, Logger::INFO)
                    );
                }

                self::$log->$type($message, (array) $data);
            } catch (\Exception $exception) {
                if (is_super_admin()) {
                    wp_die(
                        sprintf(
                            esc_html__(
                                'Error code (%s): %s.',
                                'el-pro-form-bitrix24-integration'
                            ),
                            $exception->getCode(),
                            $exception->getMessage()
                        ),
                        esc_html__(
                            'An error occurred while writing the log file.',
                            'el-pro-form-bitrix24-integration'
                        ),
                        [
                            'back_link' => true
                        ]
                    );
                    // escape ok
                }
            }
        }
    }

    public static function isActive()
    {
        $settings = get_option(Bootstrap::OPTIONS_KEY);

        if (empty($settings['webhook'])) {
            return false;
        }

        return true;
    }

    public static function isVerify()
    {
        $value = get_site_option(Bootstrap::PURCHASE_CODE_OPTIONS_KEY);

        if (!empty($value)) {
            return true;
        }

        return false;
    }

    public static function nonVerifyText()
    {
        return esc_html__(
            'Please verify the purchase code on the plugin integration settings page - ',
            'el-pro-form-bitrix24-integration'
            )
            . '<a href="'
            . admin_url()
            . 'admin.php?page=elementor-bitrix24-integration-settings">'
            . admin_url()
            . 'admin.php?page=elementor-bitrix24-integration-settings</a>';
    }

    public static function resolveFieldValues($crmFields, $record, $additionalKey = '')
    {
        $recordSettings = $record->get('form_settings');
        $sendFields = [];

        // for task
        if (isset($crmFields['DEADLINE'])) {
            $crmFields['DEADLINE_MINUTES'] = '';
        }

        foreach ($crmFields as $key => $_) {
            $populateValue = isset($recordSettings['el_pro_bx_' . $additionalKey . $key . '-populate'])
                ? $recordSettings['el_pro_bx_' . $additionalKey . $key . '-populate']
                : '';
            $value = isset($recordSettings['el_pro_bx_' . $additionalKey . $key])
                ? $recordSettings['el_pro_bx_' . $additionalKey . $key]
                : '';

            if ($populateValue) {
                $sendFields[$key] = $record->replace_setting_shortcodes(trim($populateValue));
            } elseif ($value) {
                $sendFields[$key] = $record->replace_setting_shortcodes(trim($value));
            }

            if (!isset($sendFields[$key])) {
                continue;
            }

            $sendFields[$key] = self::replaceAdditionalTags($sendFields[$key]);

            if (empty($sendFields[$key])) {
                unset($sendFields[$key]);
            }
        }

        return $sendFields;
    }

    public static function resolveFilesList($record)
    {
        $files = [];

        foreach ($record->get('files') as $file) {
            if (!empty($file['path'])) {
                foreach ($file['path'] as $path) {
                    $files[] = $path;
                }
            }
        }

        return $files;
    }

    private static function replaceAdditionalTags($value)
    {
        $replaceArray = [
            '[utm_source]' => '',
            '[utm_medium]' => '',
            '[utm_campaign]' => '',
            '[utm_term]' => '',
            '[utm_content]' => '',
            '[roistat_visit]' => isset($_COOKIE['roistat_visit'])
                ? $_COOKIE['roistat_visit']
                : '',
            '[gaClientID]' => ''
        ];

        if (!empty($_COOKIE['_ga'])) {
            $clientId = explode('.', wp_unslash($_COOKIE['_ga']));
            $replaceArray['[gaClientID]'] = $clientId[2] . '.' . $clientId[3];
        }

        if (!empty($_COOKIE[Bootstrap::UTM_COOKIES])) {
            $utmParams = json_decode(wp_unslash($_COOKIE[Bootstrap::UTM_COOKIES]), true);

            foreach ($utmParams as $key => $valueUtm) {
                $replaceArray['[' . $key . ']'] = rawurldecode(wp_unslash($valueUtm));
            }
        }

        $value = str_replace(array_keys($replaceArray), array_values($replaceArray), $value);

        return $value;
    }
}
