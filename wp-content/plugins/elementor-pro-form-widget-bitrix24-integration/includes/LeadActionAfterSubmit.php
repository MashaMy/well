<?php

namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

use ElementorPro\Modules\Forms\Classes\Action_Base;

class LeadActionAfterSubmit extends Action_Base
{
    public function get_name()
    {
        return 'bitrix24_lead';
    }

    public function get_tabs_name()
    {
        return $this->get_name() . '_tabs';
    }

    public function get_label()
    {
        return esc_html__('Bitrix24 (Lead)', 'el-pro-form-bitrix24-integration');
    }

    public function run($record, $ajax_handler)
    {
        $sendFields = [];
        $crmFields = [];

        $crmFields['lead'] = (array) get_option(Bootstrap::LEAD_FIELDS_KEY);
        $sendFields['lead'] = Helper::resolveFieldValues($crmFields['lead'], $record, 'lead_');

        if (empty($sendFields['lead'])) {
            Helper::log('Empty data - lead', $sendFields);

            return;
        }

        $recordSettings = $record->get('form_settings');

        if (
            isset($recordSettings['el_pro_bx_lead_send_files'])
            && $recordSettings['el_pro_bx_lead_send_files'] === 'yes'
            && !empty($record->get('files'))
        ) {
            $sendFields['uploads'] = Helper::resolveFilesList($record);
        }

        if (
            isset($recordSettings['el_pro_bx_lead_create_task'])
            && $recordSettings['el_pro_bx_lead_create_task'] === 'yes'
        ) {
            $crmFields['task'] = (array) get_option(Bootstrap::TASK_FIELDS_KEY);
            $sendFields['task'] = Helper::resolveFieldValues($crmFields['task'], $record, 'lead_task_');
        }

        Crm::send($sendFields, $crmFields, 'lead', $record->get('form_settings')['id']);
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
            $this->get_tabs_name() . '_lead_fields',
            [
                'label' => esc_html__('Lead fields', 'el-pro-form-bitrix24-integration'),
            ]
        );

        $renderFields = new RenderFields('lead_');

        $renderFields->inputCheckboxField(
            $widget,
            'send_files',
            esc_html__('Send uploaded files', 'el-pro-form-bitrix24-integration'),
            ['isRequired' => false]
        );

        $renderFields->inputCheckboxField(
            $widget,
            'create_task',
            esc_html__('Create task', 'el-pro-form-bitrix24-integration'),
            ['isRequired' => false]
        );

        $leadFields = (array) get_option(Bootstrap::LEAD_FIELDS_KEY);

        $crmFields = new CrmFields();
        $crmFields = $crmFields->fields;

        foreach ($leadFields as $key => $field) {
            // Not show fields
            if (in_array($key, CrmFields::$breakFields['lead'])) {
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
            } elseif ($key === 'SOURCE_ID') {
                $renderFields->statusField(
                    $widget,
                    'SOURCE',
                    $key,
                    $title,
                    $field
                );
            } elseif ($key === 'STATUS_ID') {
                $renderFields->statusField(
                    $widget,
                    'STATUS',
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
                if (in_array($key, ['ASSIGNED_BY_ID', 'RESPONSIBLE_ID'])) {
                    $field['description'] = esc_html__(
                        'you can specify several, separated by commas, then the requests will be distributed sequentially',
                        'el-pro-form-bitrix24-integration'
                    );
                }

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
            $this->get_tabs_name() . '_task_fields',
            [
                'label' => esc_html__('Task fields', 'el-pro-form-bitrix24-integration'),
            ]
        );

        $renderFields = new RenderFields('lead_task_');
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

        $widget->end_controls_tabs();

        $widget->end_controls_section();
    }

    public function on_export($element)
    {
        // Nothing
    }
}
