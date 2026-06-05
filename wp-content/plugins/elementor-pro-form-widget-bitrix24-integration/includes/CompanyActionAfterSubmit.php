<?php

namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

use ElementorPro\Modules\Forms\Classes\Action_Base;

class CompanyActionAfterSubmit extends Action_Base
{
    public function get_name()
    {
        return 'bitrix24_company';
    }

    public function get_label()
    {
        return esc_html__('Bitrix24 (Company)', 'el-pro-form-bitrix24-integration');
    }

    public function run($record, $ajax_handler)
    {
        $sendFields = [];
        $crmFields = [];

        $crmFields['company'] = (array) get_option(Bootstrap::COMPANY_FIELDS_KEY);
        $sendFields['company'] = Helper::resolveFieldValues($crmFields['company'], $record, 'company_');

        if (empty($sendFields['company'])) {
            Helper::log('Empty data - company', $sendFields);

            return;
        }

        Crm::send($sendFields, $crmFields, 'company');
    }

    public function register_settings_section($widget)
    {
        $widget->start_controls_section(
            'section_' . $this->get_name(),
            [
                'label' => $this->get_label(),
                'condition' => [
                    'submit_actions' => $this->get_name()
                ]
            ]
        );

        $renderFields = new RenderFields('company_');

        $companyFields = (array) get_option(Bootstrap::COMPANY_FIELDS_KEY);

        $crmFields = new CrmFields();
        $crmFields = $crmFields->fields;

        foreach ($companyFields as $key => $field) {
            // Not show fields
            if (in_array($key, CrmFields::$breakFields['company'])) {
                continue;
            }

            // Not show read only fields
            if ($field['isReadOnly'] === true) {
                continue;
            }

            $title = isset($crmFields[$key])
                ? $crmFields[$key]
                : (
                isset($field['formLabel'])
                    ? $field['formLabel']
                    : $key
                );

            if ($field['type'] === 'enumeration' && !empty($field['items'])) {
                $selectItems = [];

                foreach ($field['items'] as $item) {
                    $selectItems[$item['ID']] = $item['VALUE'];
                }

                $renderFields->selectField(
                    $widget,
                    $selectItems,
                    $key,
                    $title,
                    $field
                );
            } elseif ($field['type'] === 'char' || $field['type'] === 'boolean') {
                $renderFields->inputCheckboxField(
                    $widget,
                    $key,
                    $title,
                    $field
                );
            } elseif ($key === 'COMPANY_TYPE') {
                $renderFields->statusField(
                    $widget,
                    'COMPANY_TYPE',
                    $key,
                    $title,
                    $field
                );
            } elseif ($key === 'SOURCE_ID') {
                $renderFields->statusField(
                    $widget,
                    'SOURCE',
                    $key,
                    $title,
                    $field
                );
            } elseif ($key === 'INDUSTRY') {
                $renderFields->statusField(
                    $widget,
                    'INDUSTRY',
                    $key,
                    $title,
                    $field
                );
            } elseif ($key === 'EMPLOYEES') {
                $renderFields->statusField(
                    $widget,
                    'EMPLOYEES',
                    $key,
                    $title,
                    $field
                );
            } elseif ($key === 'CURRENCY_ID') {
                $renderFields->selectField(
                    $widget,
                    get_option(Bootstrap::CURRENCY_LIST_KEY),
                    $key,
                    $title,
                    $field
                );
            } elseif (in_array($key, ['COMMENTS', 'BANKING_DETAILS'])) {
                $renderFields->textareaField(
                    $widget,
                    $key,
                    $title,
                    $field
                );
            } else {
                $renderFields->inputTextField(
                    $widget,
                    $key,
                    $title,
                    $field
                );
            }
        }

        $widget->end_controls_section();
    }

    public function on_export($element)
    {
        // Nothing
    }
}
