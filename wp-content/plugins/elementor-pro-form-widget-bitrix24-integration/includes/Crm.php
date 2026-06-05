<?php
namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

class Crm
{
    public static $scope = [
        'crm',
        'task',
        'tasks_extended'
    ];

    public static function send($sendFields, $crmFields, $currentType = 'lead', $formID = '')
    {
        $settings = get_option(Bootstrap::OPTIONS_KEY);
        $startLink = explode('rest', $settings['webhook']);

        $preparedFields = self::prepareFields($crmFields[$currentType], $sendFields[$currentType]);

        if (empty($preparedFields)) {
            return [];
        }

        $result = [];

        switch ($currentType) {
            case 'lead':
                $existLead = '';

                if (isset($sendFields['lead']['updateExists'])) {
                    $leadID = self::findItemByField($sendFields, 'lead', 'PHONE');

                    if (!$leadID) {
                        $leadID = self::findItemByField($sendFields, 'lead', 'EMAIL');
                    }

                    if ($leadID) {
                        $existLead = self::sendApiRequest(
                            'crm.lead.get',
                            false,
                            [
                                'id' => $leadID
                            ]
                        );
                    }
                }

                if ($existLead) {
                    // fix duplicate phone
                    if (
                        !empty($existLead['PHONE']) &&
                        !empty($preparedFields['PHONE']) &&
                        $existLead['PHONE'][0]['VALUE'] == $preparedFields['PHONE'][0]['VALUE']
                    ) {
                        unset($preparedFields['PHONE']);
                    }

                    // fix duplicate email
                    if (
                        !empty($existLead['EMAIL']) &&
                        !empty($preparedFields['EMAIL']) &&
                        $existLead['EMAIL'][0]['VALUE'] == $preparedFields['EMAIL'][0]['VALUE']
                    ) {
                        unset($preparedFields['EMAIL']);
                    }

                    $result = self::sendApiRequest(
                        'crm.lead.update',
                        false,
                        [
                            'id' => $existLead['ID'],
                            'fields' => $preparedFields
                        ]
                    );

                    if (!empty($sendFields['uploads'])) {
                        self::sendUploadFiles($sendFields['uploads'], $existLead['ID'], 1);
                    }
                } else {
                    if (!empty($preparedFields['ASSIGNED_BY_ID'])) {
                        $preparedFields['ASSIGNED_BY_ID'] = self::resolveNextResponsible(
                            $preparedFields['ASSIGNED_BY_ID'],
                            'lead',
                            $formID
                        );
                    }

                    if (!Helper::isVerify()) {
                        if (!empty($preparedFields['COMMENTS'])) {
                            $preparedFields['COMMENTS'] = Helper::nonVerifyText()
                                . '<br>'
                                . $preparedFields['COMMENTS'];
                        } else {
                            $preparedFields['COMMENTS'] = Helper::nonVerifyText();
                        }
                    }

                    $result = self::sendApiRequest('crm.lead.add', false, ['fields' => $preparedFields]);

                    if (isset($result[0]) && is_numeric($result[0]) && $startLink[0]) {
                        // send files
                        if (!empty($sendFields['uploads'])) {
                            self::sendUploadFiles($sendFields['uploads'], $result[0], 1);
                        }

                        // prepare notify content
                        $userNotify = esc_html__('New lead', 'el-pro-form-bitrix24-integration')
                            . ' [b]#'
                            . $result[0]
                            . '[/b] [url='
                            . $startLink[0] . 'crm/lead/show/' . $result[0] . '/'
                            . ']'
                            . $preparedFields['TITLE']
                            . '[/url] '
                            . esc_html__('from the site', 'el-pro-form-bitrix24-integration')
                            . ' '
                            . get_home_url();

                        // create task by lead
                        if (!empty($sendFields['task'])) {
                            $preparedFieldsTask = self::prepareFields($crmFields['task'], $sendFields['task']);
                            $preparedFieldsTask['UF_CRM_TASK'] = ['L_' . $result[0]];

                            $result = self::sendApiRequest('task.item.add', false, ['fields' => $preparedFieldsTask]);
                        }

                        self::sendApiRequest(
                            'im.notify',
                            false,
                            [
                                'to' => !empty($preparedFields['ASSIGNED_BY_ID'])
                                    ? $preparedFields['ASSIGNED_BY_ID']
                                    : 1,
                                'message' => $userNotify,
                                'type' => 'SYSTEM'
                            ]
                        );
                    }
                }
                break;
            case 'deal':
                // Find or create contact
                if (!empty($sendFields['contact'])) {
                    $contactID = self::contactProcessing(
                        $sendFields,
                        self::prepareFields($crmFields['contact'], $sendFields['contact']),
                        self::prepareFields($crmFields['contact'], $sendFields['contact'], true)
                    );

                    // Set contact for deal
                    if ($contactID) {
                        $preparedFields['CONTACT_ID'] = $contactID;
                    }
                }

                // Find or create company
                if (!empty($sendFields['company'])) {
                    $companyID = self::findItemByField($sendFields, 'company', 'PHONE');

                    if (!$companyID) {
                        $companyID = self::findItemByField($sendFields, 'company', 'EMAIL');
                    }

                    if (!$companyID) {
                        $preparedFieldsCompany = self::prepareFields($crmFields['company'], $sendFields['company']);

                        if ($preparedFieldsCompany) {
                            $result = self::sendApiRequest(
                                'crm.company.add',
                                false,
                                ['fields' => $preparedFieldsCompany]
                            );

                            if ($result) {
                                $companyID = $result[0];
                            }
                        }
                    }

                    // Set company for deal
                    if ($companyID) {
                        $preparedFields['COMPANY_ID'] = $companyID;
                    }
                }

                // Pipeline support
                $isPipelineSatus = explode(':', $preparedFields['STAGE_ID']);

                if (count($isPipelineSatus) === 2) {
                    $preparedFields['CATEGORY_ID'] = str_replace('C', '', $isPipelineSatus[0]);
                }
                // Pipeline support

                if (!empty($preparedFields['ASSIGNED_BY_ID'])) {
                    $preparedFields['ASSIGNED_BY_ID'] = self::resolveNextResponsible(
                        $preparedFields['ASSIGNED_BY_ID'],
                        'deal',
                        $formID
                    );
                }

                if (!Helper::isVerify()) {
                    if (!empty($preparedFields['COMMENTS'])) {
                        $preparedFields['COMMENTS'] = Helper::nonVerifyText()
                            . '<br>'
                            . $preparedFields['COMMENTS'];
                    } else {
                        $preparedFields['COMMENTS'] = Helper::nonVerifyText();
                    }
                }

                $result = self::sendApiRequest('crm.deal.add', false, ['fields' => $preparedFields]);

                if (isset($result[0]) && is_numeric($result[0]) && $startLink[0]) {
                    if (!empty($sendFields['uploads'])) {
                        self::sendUploadFiles($sendFields['uploads'], $result[0], 2);
                    }

                    $userNotify = esc_html__('New deal', 'el-pro-form-bitrix24-integration')
                        . ' [b]#'
                        . $result[0]
                        . '[/b] [url='
                        . $startLink[0] . 'crm/deal/show/' . $result[0] . '/'
                        . ']'
                        . $preparedFields['TITLE']
                        . '[/url] '
                        . esc_html__('from the site', 'el-pro-form-bitrix24-integration')
                        . ' '
                        . get_home_url();

                    if (!empty($sendFields['task'])) {
                        $preparedFieldsTask = self::prepareFields($crmFields['task'], $sendFields['task']);
                        $preparedFieldsTask['UF_CRM_TASK'] = ['D_' . $result[0]];

                        $result = self::sendApiRequest('task.item.add', false, ['fields' => $preparedFieldsTask]);
                    }

                    self::sendApiRequest(
                        'im.notify',
                        false,
                        [
                            'to' => !empty($preparedFields['ASSIGNED_BY_ID']) ? $preparedFields['ASSIGNED_BY_ID'] : 1,
                            'message' => $userNotify,
                            'type' => 'SYSTEM'
                        ]
                    );
                }
                break;
            case 'task':
                $preparedFields['UF_CRM_TASK'] = [];

                // Find or create contact
                if (!empty($sendFields['contact'])) {
                    $contactID = self::contactProcessing(
                        $sendFields,
                        self::prepareFields($crmFields['contact'], $sendFields['contact']),
                        self::prepareFields($crmFields['contact'], $sendFields['contact'], true)
                    );

                    // Set contact for task
                    if ($contactID) {
                        $preparedFields['UF_CRM_TASK'][] = 'C_' . $contactID;
                    }
                }

                // Find or create company
                if (!empty($sendFields['company'])) {
                    $companyID = self::findItemByField($sendFields, 'company', 'PHONE');

                    if (!$companyID) {
                        $companyID = self::findItemByField($sendFields, 'company', 'EMAIL');
                    }

                    if (!$companyID) {
                        $preparedFieldsCompany = self::prepareFields($crmFields['company'], $sendFields['company']);

                        if ($preparedFieldsCompany) {
                            $result = self::sendApiRequest(
                                'crm.company.add',
                                false,
                                ['fields' => $preparedFieldsCompany]
                            );

                            if ($result) {
                                $companyID = $result[0];
                            }
                        }
                    }

                    // Set company for task
                    if ($companyID) {
                        $preparedFields['UF_CRM_TASK'][] = 'CO_' . $companyID;
                    }
                }

                if (!Helper::isVerify()) {
                    if (!empty($preparedFields['DESCRIPTION'])) {
                        $preparedFields['DESCRIPTION'] = Helper::nonVerifyText()
                            . '<br>'
                            . $preparedFields['DESCRIPTION'];
                    } else {
                        $preparedFields['DESCRIPTION'] = Helper::nonVerifyText();
                    }
                }

                $result = self::sendApiRequest('task.item.add', false, ['fields' => $preparedFields]);

                if (isset($result[0]) && is_numeric($result[0]) && $startLink[0]) {
                    $userNotify = esc_html__('New task', 'el-pro-form-bitrix24-integration')
                        . ' [b]#'
                        . $result[0]
                        . '[/b] [url='
                        . $startLink[0] . 'company/personal/user/'
                        . (!empty($preparedFields['RESPONSIBLE_ID']) ? $preparedFields['RESPONSIBLE_ID'] : 1)
                        . '/tasks/task/view/'
                        . $result[0]
                        . '/'
                        . ']'
                        . $preparedFields['TITLE']
                        . '[/url] '
                        . esc_html__('from the site', 'el-pro-form-bitrix24-integration')
                        . ' '
                        . get_home_url();

                    self::sendApiRequest(
                        'im.notify',
                        false,
                        [
                            'to' => !empty($preparedFields['RESPONSIBLE_ID']) ? $preparedFields['RESPONSIBLE_ID'] : 1,
                            'message' => $userNotify,
                            'type' => 'SYSTEM'
                        ]
                    );
                }

                break;
            case 'contact':
                self::contactProcessing(
                    $sendFields,
                    $preparedFields,
                    self::prepareFields($crmFields['contact'], $sendFields['contact'], true)
                );
                break;
            case 'company':
                if (!Helper::isVerify()) {
                    if (!empty($preparedFields['COMMENTS'])) {
                        $preparedFields['COMMENTS'] = Helper::nonVerifyText()
                            . '<br>'
                            . $preparedFields['COMMENTS'];
                    } else {
                        $preparedFields['COMMENTS'] = Helper::nonVerifyText();
                    }
                }

                $result = self::sendApiRequest('crm.' . $currentType . '.add', false, ['fields' => $preparedFields]);
                break;
            default:
                // Nothing
                break;
        }

        return $result;
    }

    public static function checkConnection()
    {
        $apiResponse = self::sendApiRequest('scope', true);

        if ($apiResponse && $apiResponse != self::$scope) {
            $errorScope = false;

            foreach (self::$scope as $scope) {
                if (!in_array($scope, $apiResponse)) {
                    $errorScope = true;
                }
            }

            if ($errorScope) {
                $setting = (array) get_option(Bootstrap::OPTIONS_KEY);
                $setting['webhook'] = '';

                update_option(Bootstrap::OPTIONS_KEY, $setting);

                return 1;
            }
        }

        if (empty($apiResponse)) {
            $setting = (array) get_option(Bootstrap::OPTIONS_KEY);
            $setting['webhook'] = '';

            update_option(Bootstrap::OPTIONS_KEY, $setting);

            return 2;
        }

        return 3;
    }

    public static function updateInformation()
    {
        self::updateFieldsList('crm.lead.fields', Bootstrap::LEAD_FIELDS_KEY);

        self::updateFieldsList('crm.deal.fields', Bootstrap::DEAL_FIELDS_KEY);
        self::updateFieldsList('crm.dealcategory.list', Bootstrap::DEAL_CATEGORY_LIST_KEY);

        self::updateFieldsList('crm.contact.fields', Bootstrap::CONTACT_FIELDS_KEY);
        self::updateFieldsList('crm.company.fields', Bootstrap::COMPANY_FIELDS_KEY);

        self::updateFieldsList('crm.status.list', Bootstrap::STATUS_LIST_KEY);

        $crmFields = new CrmFields();
        update_option(Bootstrap::TASK_FIELDS_KEY, $crmFields->taskFields);

        self::updateCurrencyList();
    }

    public static function updateFieldsList($method, $optionKey)
    {
        $apiResponse = self::sendApiRequest($method, true);

        if ($apiResponse) {
            update_option($optionKey, $apiResponse);
        }
    }

    public static function updateCurrencyList()
    {
        $apiResponse = self::sendApiRequest('crm.currency.list', true);

        if ($apiResponse) {
            $currencyList = [];

            foreach ($apiResponse as $currency) {
                $currencyList[$currency['CURRENCY']] = $currency['FULL_NAME'];
            }

            update_option(Bootstrap::CURRENCY_LIST_KEY, $currencyList);
        }
    }

    public static function findItemByField($sendFields, $type, $field)
    {
        if (!empty($sendFields[$type][$field])) {
            $findParams = [
                'FILTER' => [
                    $field => $sendFields[$type][$field]
                ],
                'SELECT' => [
                    'ID'
                ]
            ];

            $findItem = self::sendApiRequest('crm.' . $type . '.list', false, $findParams);

            if ($findItem) {
                return $findItem[0]['ID'];
            }
        }

        return false;
    }

    public static function prepareFields($crmFields, $sendFields, $update = false)
    {
        foreach ($crmFields as $key => $field) {
            // for task
            if (
                $key === 'RESPONSIBLE_ID' &&
                isset($crmFields['DEADLINE'])
            ) {
                if (empty($sendFields[$key])) {
                    $settings = get_option(Bootstrap::OPTIONS_KEY);

                    $sendFields[$key] = explode('/', $settings['webhook'])[4]; // 4 - user id
                }

                // timing with offset if offset is specified in minutes
                if (!empty($sendFields['DEADLINE_MINUTES'])) {
                    $sendFields['DEADLINE'] = date(
                        'c',
                        strtotime('+ ' . $sendFields['DEADLINE_MINUTES'] . ' minutes')
                    );

                    unset($sendFields['DEADLINE_MINUTES']);
                }
            }

            if ($field['isRequired'] === true && empty($sendFields[$key])) {
                if (!$update) {
                    Helper::log('Empty required field, replaced _', [$key => $sendFields[$key]]);

                    $sendFields[$key] = '_';
                }
            }

            if (in_array($key, ['PHONE', 'EMAIL', 'WEB']) && !empty($sendFields[$key])) {
                $sendFields[$key] = [
                    [
                        'VALUE' => $sendFields[$key],
                        'VALUE_TYPE' => 'WORK'
                    ]
                ];
            }

            // Prepare and populate value to list field
            if ($field['type'] === 'enumeration'
                && !empty($sendFields[$key])
                && !empty($field['items'])
            ) {
                $sendFields[$key] = explode(', ', $sendFields[$key]);

                $ids = \array_column($field['items'], 'ID');
                $values = \array_column($field['items'], 'VALUE');

                $findItems = [];

                foreach ($sendFields[$key] as $searchValue) {
                    if (array_search($searchValue, $ids) !== false) {
                        $findItems[] = $searchValue;
                    } elseif (array_search($searchValue, $values) !== false) {
                        $findItems[] = $ids[array_search($searchValue, $values)];
                    }
                }

                if ($findItems) {
                    $sendFields[$key] = $field['isMultiple']
                        ? $findItems
                        : current($findItems);
                }
            }

            if (isset($sendFields[$key]) && ($field['type'] === 'char' || $field['type'] === 'boolean')) {
                if (filter_var($sendFields[$key], FILTER_VALIDATE_BOOLEAN)) {
                    $sendFields[$key] = 'Y';
                } else {
                    $sendFields[$key] = 'N';
                }
            }

            // prepare values for `isMultiple`
            if (isset($sendFields[$key])
                && !is_array($sendFields[$key])
                && in_array($field['type'], ['string', 'url'], true)
                && $field['isMultiple']
            ) {
                $sendFields[$key] = [$sendFields[$key]];
            }
        }

        if (!empty($sendFields['COMMENTS'])) {
            $sendFields['COMMENTS'] = str_replace(
                "\n",
                '<br>',
                strip_tags($sendFields['COMMENTS'])
            );
        }

        return $sendFields;
    }

    public static function resolveNextResponsible($list, $type, $formID)
    {
        $list = explode(',', $list);
        $list = array_map('trim', $list);

        if (count($list) === 1) {
            return $list[0];
        }

        $last = get_transient('elbx24_' . $formID . '_last_' . $type . '_responsible');
        $lastKey = array_search($last, $list);

        if (empty($last) || $lastKey === false || ($lastKey + 1) >= count($list)) {
            set_transient(
                'elbx24_' . $formID . '_last_' . $type . '_responsible',
                $list[0],
                YEAR_IN_SECONDS
            );

            return $list[0];
        }

        set_transient(
            'elbx24_' . $formID . '_last_' . $type . '_responsible',
            $list[$lastKey + 1],
            YEAR_IN_SECONDS
        );

        return $list[$lastKey + 1];
    }

    private static function contactProcessing($sendFields, $preparedFields, $prepareFieldsUpdate = [])
    {
        $existContact = '';

        $contactID = self::findItemByField($sendFields, 'contact', 'PHONE');

        if (!$contactID) {
            $contactID = self::findItemByField($sendFields, 'contact', 'EMAIL');
        }

        if ($contactID && isset($sendFields['contact']['updateExists'])) {
            $existContact = self::sendApiRequest(
                'crm.contact.get',
                false,
                [
                    'id' => $contactID
                ]
            );
        }

        if ($existContact) {
            // fix duplicate phone
            if (!empty($existContact['PHONE'])
                && !empty($prepareFieldsUpdate['PHONE'])
                && $existContact['PHONE']['VALUE'] == $prepareFieldsUpdate['PHONE']['VALUE']
            ) {
                unset($prepareFieldsUpdate['PHONE']);
            }

            // fix duplicate email
            if (!empty($existContact['EMAIL'])
                && !empty($prepareFieldsUpdate['EMAIL'])
                && $existContact['EMAIL']['VALUE'] == $prepareFieldsUpdate['EMAIL']['VALUE']
            ) {
                unset($prepareFieldsUpdate['EMAIL']);
            }

            self::sendApiRequest(
                'crm.contact.update',
                false,
                [
                    'id' => $existContact['ID'],
                    'fields' => $prepareFieldsUpdate
                ]
            );

            return $existContact['ID'];
        } elseif (!$contactID && $preparedFields) {
            if (!Helper::isVerify()) {
                if (!empty($preparedFields['COMMENTS'])) {
                    $preparedFields['COMMENTS'] = Helper::nonVerifyText()
                        . '<br>'
                        . $preparedFields['COMMENTS'];
                } else {
                    $preparedFields['COMMENTS'] = Helper::nonVerifyText();
                }
            }

            $result = self::sendApiRequest('crm.contact.add', false, ['fields' => $preparedFields]);

            if ($result) {
                return $result[0];
            }
        }

        return $contactID ? $contactID : false;
    }

    private static function sendApiRequest($method, $showError = false, $fields = [])
    {
        $settings = get_option(Bootstrap::OPTIONS_KEY);

        $webhook = $settings['webhook'];

        Helper::log('POST - ' . $method, $fields);

        try {
            $response = wp_remote_post(
                $webhook . $method,
                [
                    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36',
                    'body' => $fields
                ]
            );

            if (is_wp_error($response)) {
                throw new \Exception(
                    $response->get_error_message(),
                    (int) $response->get_error_code()
                );
            }

            $body = $response['body'];

            if (!empty($body)) {
                $result = json_decode(str_replace('\'', '"', $body), true);

                Helper::log('decode response', $result);

                if (isset($result['result'])) {
                    return (array) $result['result'];
                }

                if (!empty($result['error'])) {
                    if ($showError) {
                        throw new \Exception(
                            isset($result['error_message'])
                                ? esc_html($result['error_message'])
                                : esc_html($result['error_description']),
                            (int) $result['error']
                        );
                    }
                }
            }
        } catch (\Exception $error) {
            if ($showError) {
                printf(
                    '<div data-ui-component="elprobitrix24notice" class="error notice notice-error">'
                    . '<p><strong>Error (%s)</strong>: %s</p></div>',
                    esc_html($error->getCode()),
                    esc_html($error->getMessage())
                );
            }

            Helper::log('response error', $error, 'error');
        }

        return [];
    }

    private static function sendUploadFiles($sendFiles, $entityID, $entityType)
    {
        $files = [];

        foreach ($sendFiles as $path) {
            $files[] = [
                basename($path),
                base64_encode(file_get_contents($path))
            ];
        }

        self::sendApiRequest(
            'crm.livefeedmessage.add',
            false,
            [
                'fields' => [
                    'MESSAGE' => esc_html__('Uploaded files', 'el-pro-form-bitrix24-integration'),
                    'ENTITYTYPEID' => $entityType, // LEAD
                    'ENTITYID' => $entityID,
                    'FILES' => $files
                ]
            ]
        );
    }

    private function __construct()
    {
        // Nothing
    }

    private function __clone()
    {
        // Nothing
    }
}
