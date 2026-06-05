<?php
namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

class CrmFields
{
    public $fields;

    public $taskFields;

    public static $breakFields = [
        'lead' => [
            'STATUS_SEMANTIC_ID',
            'ADDRESS_COUNTRY_CODE',
            'ORIGINATOR_ID',
            'ORIGIN_ID'
        ],
        'deal' => [
            'CATEGORY_ID',
            'STAGE_SEMANTIC_ID',
            'IS_NEW',
            'IS_RECURRING',
            'IS_RETURN_CUSTOMER',
            'IS_REPEATED_APPROACH',
            'TAX_VALUE',
            'COMPANY_ID',
            'CONTACT_ID',
            'CONTACT_IDS',
            'BEGINDATE',
            'CLOSEDATE',
            'CLOSED',
            'ADDITIONAL_INFO',
            'LOCATION_ID',
            'ORIGINATOR_ID',
            'ORIGIN_ID'
        ],
        'contact' => [
            'PHOTO',
            'ADDRESS_COUNTRY_CODE',
            'EXPORT',
            'COMPANY_ID',
            'COMPANY_IDS',
            'ORIGINATOR_ID',
            'ORIGIN_ID',
            'ORIGIN_VERSION',
            'FACE_ID'
        ],
        'company' => [
            'ADDRESS_COUNTRY_CODE',
            'ADDRESS_LEGAL',
            'REG_ADDRESS',
            'REG_ADDRESS_2',
            'REG_ADDRESS_CITY',
            'REG_ADDRESS_POSTAL_CODE',
            'REG_ADDRESS_REGION',
            'REG_ADDRESS_PROVINCE',
            'REG_ADDRESS_COUNTRY',
            'REG_ADDRESS_COUNTRY_CODE',
            'LOGO',
            'IS_MY_COMPANY',
            'CONTACT_ID',
            'ORIGINATOR_ID',
            'ORIGIN_ID',
            'ORIGIN_VERSION'
        ],
        'task' => []
    ];

    public function __construct()
    {
        $this->fields = [
            'ADDRESS' => esc_html__('Street, building', 'el-pro-form-bitrix24-integration'),
            'ADDRESS_2' => esc_html__('Suite / Apartment', 'el-pro-form-bitrix24-integration'),
            'ADDRESS_CITY' => esc_html__('City', 'el-pro-form-bitrix24-integration'),
            'ADDRESS_POSTAL_CODE' => esc_html__('Zip', 'el-pro-form-bitrix24-integration'),
            'ADDRESS_REGION' => esc_html__('Region', 'el-pro-form-bitrix24-integration'),
            'ADDRESS_PROVINCE' => esc_html__('State / Province', 'el-pro-form-bitrix24-integration'),
            'ADDRESS_COUNTRY' => esc_html__('Country', 'el-pro-form-bitrix24-integration'),
            'BIRTHDATE' => esc_html__('Birth date', 'el-pro-form-bitrix24-integration'),
            'BANKING_DETAILS' => esc_html__('Payment details', 'el-pro-form-bitrix24-integration'),
            'INDUSTRY' => esc_html__('Industry', 'el-pro-form-bitrix24-integration'),
            'EMPLOYEES' => esc_html__('Employees', 'el-pro-form-bitrix24-integration'),
            'REVENUE' => esc_html__('Annual income', 'el-pro-form-bitrix24-integration'),
            'COMPANY_TITLE' => esc_html__('Company Name', 'el-pro-form-bitrix24-integration'),
            'COMPANY_TYPE' => esc_html__('Company type', 'el-pro-form-bitrix24-integration'),
            'OPENED' => esc_html__('Visible to everyone', 'el-pro-form-bitrix24-integration'),
            'TITLE' => esc_html__('Title', 'el-pro-form-bitrix24-integration'),
            'TYPE_ID' => esc_html__('Type', 'el-pro-form-bitrix24-integration'),
            'STAGE_ID' => esc_html__('Stage', 'el-pro-form-bitrix24-integration'),
            'PROBABILITY' => esc_html__('Probability, %', 'el-pro-form-bitrix24-integration'),
            'NAME' => esc_html__('First name', 'el-pro-form-bitrix24-integration'),
            'HONORIFIC' => esc_html__('Honorific', 'el-pro-form-bitrix24-integration'),
            'LAST_NAME' => esc_html__('Last name', 'el-pro-form-bitrix24-integration'),
            'SECOND_NAME' => esc_html__('Middle name', 'el-pro-form-bitrix24-integration'),
            'POST' => esc_html__('Position', 'el-pro-form-bitrix24-integration'),
            'RESPONSIBLE_ID' => esc_html__('Responsible user ID', 'el-pro-form-bitrix24-integration'),
            'COMMENTS' => esc_html__('Comments', 'el-pro-form-bitrix24-integration'),
            'DESCRIPTION' => esc_html__('Description', 'el-pro-form-bitrix24-integration'),
            'SOURCE_DESCRIPTION' => esc_html__('Source Description', 'el-pro-form-bitrix24-integration'),
            'STATUS_DESCRIPTION' => esc_html__('Status description', 'el-pro-form-bitrix24-integration'),
            'OPPORTUNITY' => esc_html__('Opportunity', 'el-pro-form-bitrix24-integration'),
            'CURRENCY_ID' => esc_html__('Currency', 'el-pro-form-bitrix24-integration'),
            'PRODUCT_ID' => esc_html__('Product ID from CRM', 'el-pro-form-bitrix24-integration'),
            'SOURCE_ID' => esc_html__('Source', 'el-pro-form-bitrix24-integration'),
            'STATUS_ID' => esc_html__('Status', 'el-pro-form-bitrix24-integration'),
            'PHONE' => esc_html__('Phone', 'el-pro-form-bitrix24-integration'),
            'EMAIL' => esc_html__('E-mail', 'el-pro-form-bitrix24-integration'),
            'WEB' => esc_html__('Site', 'el-pro-form-bitrix24-integration'),
            'TAGS' => esc_html__('Tags', 'el-pro-form-bitrix24-integration'),
            'DEADLINE' => esc_html__('Deadline', 'el-pro-form-bitrix24-integration'),
            'DEADLINE_MINUTES' => esc_html__('Number of minutes for deadline', 'el-pro-form-bitrix24-integration'),
            'PRIORITY' => esc_html__('Priority', 'el-pro-form-bitrix24-integration'),
            'ALLOW_CHANGE_DEADLINE' => esc_html__(
                'Responsible person can change deadline',
                'el-pro-form-bitrix24-integration'
            ),
            'TASK_CONTROL' => esc_html__('Approve task when completed', 'el-pro-form-bitrix24-integration'),
            'ALLOW_TIME_TRACKING' => esc_html__('Task planned time', 'el-pro-form-bitrix24-integration'),
            'ASSIGNED_BY_ID' => esc_html__('Responsible', 'el-pro-form-bitrix24-integration')
        ];

        $this->taskFields = [
            'TITLE' => [
                'type' => 'string',
                'isRequired' => true,
                'isReadOnly' => false
            ],
            'DESCRIPTION' => [
                'type' => 'string',
                'isRequired' => false,
                'isReadOnly' => false
            ],
            'RESPONSIBLE_ID' => [
                'type' => 'user',
                'isRequired' => true,
                'isReadOnly' => false
            ],
            'TAGS' => [
                'type' => 'string',
                'isRequired' => false,
                'isReadOnly' => false
            ],
            'DEADLINE' => [
                'type' => 'date',
                'isRequired' => false,
                'isReadOnly' => false,
                'description' => esc_html__('use the date field type', 'el-pro-form-bitrix24-integration')
            ],
            'PRIORITY' => [
                'type' => 'enumeration',
                'isRequired' => false,
                'isReadOnly' => false,
                'items' => [
                    [
                        'ID' => 1,
                        'VALUE' => esc_html__('Default', 'el-pro-form-bitrix24-integration')
                    ],
                    [
                        'ID' => 2,
                        'VALUE' => esc_html__('High Priority', 'el-pro-form-bitrix24-integration')
                    ]
                ]
            ],
            'ALLOW_CHANGE_DEADLINE' => [
                'type' => 'char',
                'isRequired' => false,
                'isReadOnly' => false
            ],
            'TASK_CONTROL' => [
                'type' => 'char',
                'isRequired' => false,
                'isReadOnly' => false
            ],
            'ALLOW_TIME_TRACKING' => [
                'type' => 'char',
                'isRequired' => false,
                'isReadOnly' => false
            ]
        ];
    }

    private function __clone()
    {
    }
}
