<?php

namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

use ElementorPro\Modules\Forms\Classes\Action_Base;

class TaskActionAfterSubmit extends Action_Base
{
    public function get_name()
    {
        return 'bitrix24_task';
    }

    public function get_tabs_name()
    {
        return $this->get_name() . '_tabs';
    }

    public function get_label()
    {
        return esc_html__('Bitrix24 (Task)', 'el-pro-form-bitrix24-integration');
    }

    public function run($record, $ajax_handler)
    {
        $sendFields = [];
        $crmFields = [];

        $crmFields['task'] = (array) get_option(Bootstrap::TASK_FIELDS_KEY);
        $crmFields['contact'] = (array) get_option(Bootstrap::CONTACT_FIELDS_KEY);
        $crmFields['company'] = (array) get_option(Bootstrap::COMPANY_FIELDS_KEY);

        $sendFields['task'] = Helper::resolveFieldValues($crmFields['task'], $record, 'task_');
        $sendFields['contact'] = Helper::resolveFieldValues($crmFields['contact'], $record, 'task_contact_');
        $sendFields['company'] = Helper::resolveFieldValues($crmFields['company'], $record, 'task_company_');

        if (empty($sendFields['task'])) {
            Helper::log('Empty data - task', $sendFields);

            return;
        }

        $recordSettings = $record->get('form_settings');

        if (
            isset($recordSettings['el_pro_bx_task_contact_update_exists'])
            && $recordSettings['el_pro_bx_task_contact_update_exists'] === 'yes'
        ) {
            $sendFields['contact']['updateExists'] = true;
        }

        Crm::send($sendFields, $crmFields, 'task');
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

        $widget->start_controls_tabs($this->get_tabs_name());

        $widget->start_controls_tab(
            $this->get_tabs_name() . '_task_fields',
            [
                'label' => esc_html__('Task', 'el-pro-form-bitrix24-integration'),
            ]
        );

        $renderFields = new RenderFields('task_');

        $taskFields = (array) get_option(Bootstrap::TASK_FIELDS_KEY);

        $crmFields = new CrmFields();
        $crmFields = $crmFields->fields;

        foreach ($taskFields as $key => $field) {
            // Not show fields
            if (in_array($key, CrmFields::$breakFields['task'])) {
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
            } elseif (in_array($key, ['DESCRIPTION'])) {
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

        $widget->end_controls_tab();

        $widget->start_controls_tab(
            $this->get_tabs_name() . '_contact_fields',
            [
                'label' => esc_html__('Contact', 'el-pro-form-bitrix24-integration'),
            ]
        );

        $renderFields = new RenderFields('task_contact_');
        $renderFields->inputCheckboxField(
            $widget,
            'update_exists',
            esc_html__('Update an existing', 'el-pro-form-bitrix24-integration'),
            [
                'isRequired' => false,
                'description' => esc_html__(
                    'Update an existing contact (search by phone and mail)',
                    'el-pro-form-bitrix24-integration'
                )
            ]
        );

        $contactFields = (array) get_option(Bootstrap::CONTACT_FIELDS_KEY);

        $crmFields = new CrmFields();
        $crmFields = $crmFields->fields;

        foreach ($contactFields as $key => $field) {
            // Not show fields
            if (in_array($key, CrmFields::$breakFields['contact'])) {
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
            } elseif ($key === 'TYPE_ID') {
                $renderFields->statusField(
                    $widget,
                    'CONTACT_TYPE',
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
            } elseif ($key === 'HONORIFIC') {
                $renderFields->statusField(
                    $widget,
                    'HONORIFIC',
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
            } elseif (in_array($key, ['COMMENTS', 'SOURCE_DESCRIPTION', 'STATUS_DESCRIPTION'])) {
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

        $widget->end_controls_tab();

        $widget->start_controls_tab(
            $this->get_tabs_name() . '_company_fields',
            [
                'label' => esc_html__('Company', 'el-pro-form-bitrix24-integration'),
            ]
        );

        $renderFields = new RenderFields('task_company_');
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

        $widget->end_controls_tab();

        $widget->end_controls_tabs();

        $widget->end_controls_section();
    }

    public function on_export($element)
    {
        // Nothing
    }
}
