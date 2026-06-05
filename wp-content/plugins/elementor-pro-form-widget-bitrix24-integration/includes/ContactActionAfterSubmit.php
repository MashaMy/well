<?php

namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

use ElementorPro\Modules\Forms\Classes\Action_Base;

class ContactActionAfterSubmit extends Action_Base
{
    public function get_name()
    {
        return 'bitrix24_contact';
    }

    public function get_label()
    {
        return esc_html__('Bitrix24 (Contact)', 'el-pro-form-bitrix24-integration');
    }

    public function run($record, $ajax_handler)
    {
        $sendFields = [];
        $crmFields = [];

        $crmFields['contact'] = (array) get_option(Bootstrap::CONTACT_FIELDS_KEY);
        $sendFields['contact'] = Helper::resolveFieldValues($crmFields['contact'], $record, 'contact_');

        if (empty($sendFields['contact'])) {
            Helper::log('Empty data - contact', $sendFields);

            return;
        }

        $recordSettings = $record->get('form_settings');

        if (
            isset($recordSettings['el_pro_bx_contact_update_exists'])
            && $recordSettings['el_pro_bx_contact_update_exists'] === 'yes'
        ) {
            $sendFields['contact']['updateExists'] = true;
        }

        Crm::send($sendFields, $crmFields, 'contact');
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

        $renderFields = new RenderFields('contact_');

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

        $widget->end_controls_section();
    }

    public function on_export($element)
    {
        // Nothing
    }
}
