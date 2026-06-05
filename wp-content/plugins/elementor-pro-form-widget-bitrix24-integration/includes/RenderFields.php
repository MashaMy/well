<?php
namespace IwantToBelive\Elementor\Form\Bitrix\Integration\Includes;

use Elementor\Controls_Manager;

class RenderFields
{
    public $namePrefix;

    public function __construct($prefix = '')
    {
        $this->namePrefix = $prefix;
    }

    public function selectField($widget, $list, $key, $title, $field)
    {
        if ($key === 'CURRENCY_ID' || $key === 'PRIORITY') {
            if ($key !== 'PRIORITY') {
                $list = array_merge(['' => esc_html__('Not chosen', 'el-pro-form-bitrix24-integration')], $list);
            }

            $widget->add_control(
                'el_pro_bx_' . $this->namePrefix . $key,
                [
                    'label' => $title,
                    'title' => 'key - ' . $key,
                    'required' => $field['isRequired'],
                    'type' => Controls_Manager::SELECT,
                    'options' => (array) $list,
                    'default' => ''
                ]
            );
        } else {
            $widget->add_control(
                'el_pro_bx_' . $this->namePrefix . $key,
                [
                    'label' => $title . ($field['isRequired'] ? '<span style="color:red;"> * </span>' : ''),
                    'title' => 'key - ' . $key,
                    'required' => $field['isRequired'],
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Possible values: ', 'el-pro-form-bitrix24-integration')
                        . implode(', ', array_values($list))
                ]
            );
        }
    }

    public function statusField($widget, $type, $key, $title, $field)
    {
        $list = $this->getStatusListByType($type);

        $widget->add_control(
            'el_pro_bx_' . $this->namePrefix . $key,
            [
                'label' => $title . ($field['isRequired'] ? '<span style="color:red;"> * </span>' : ''),
                'title' => 'key - ' . $key,
                'required' => $field['isRequired'],
                'type' => Controls_Manager::SELECT,
                'options' => (array) $list,
                'default' => ''
            ]
        );
    }

    public function inputTextField($widget, $key, $title, $field)
    {
        $default = [
            'UTM_SOURCE' => '[utm_source]',
            'UTM_MEDIUM' => '[utm_medium]',
            'UTM_CAMPAIGN' => '[utm_campaign]',
            'UTM_TERM' => '[utm_term]',
            'UTM_CONTENT' => '[utm_content]'
        ];

        $widget->add_control(
            'el_pro_bx_' . $this->namePrefix . $key,
            [
                'label' => $title . ($field['isRequired'] ? '<span style="color:red;"> * </span>' : ''),
                'title' => 'key - ' . $key,
                'required' => $field['isRequired'],
                'placeholder' => (isset($default[$key]) ? $default[$key] : ''),
                'type' => Controls_Manager::TEXT,
                'default' => (isset($default[$key]) ? $default[$key] : ''),
                'description' => (isset($field['description']) ? $field['description'] : '')
            ]
        );

        //DEADLINE_MINUTES

        if ($key === 'DEADLINE') {
            $crmFields = new CrmFields();
            $crmFields = $crmFields->fields;

            $widget->add_control(
                'el_pro_bx_' . $this->namePrefix . 'DEADLINE_MINUTES',
                [
                    'label' => $crmFields['DEADLINE_MINUTES'],
                    'title' => 'key - DEADLINE_MINUTES',
                    'required' => false,
                    'placeholder' => '60',
                    'type' => Controls_Manager::NUMBER,
                    'description' => esc_html__(
                        'after how many minutes after creation the task should be completed. You can use this field instead `Deadline`.',
                        'el-pro-form-bitrix24-integration'
                    )
                ]
            );
        }
    }

    public function inputCheckboxField($widget, $key, $title, $field)
    {
        $widget->add_control(
            'el_pro_bx_' . $this->namePrefix . $key,
            [
                'label' => $title,
                'title' => 'key - ' . $key,
                'required' => $field['isRequired'],
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'description' => (isset($field['description']) ? $field['description'] : '')
            ]
        );
    }

    public function textareaField($widget, $key, $title, $field)
    {
        $widget->add_control(
            'el_pro_bx_' . $this->namePrefix . $key,
            [
                'label' => $title . ($field['isRequired'] ? '<span style="color:red;"> * </span>' : ''),
                'title' => 'key - ' . $key,
                'required' => $field['isRequired'],
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true
            ]
        );
    }

    private function getStatusListByType($type)
    {
        $statusList = get_option(Bootstrap::STATUS_LIST_KEY);

        if ($type === 'DEAL_STAGE') {
            $returnList = [];

            // Default pipeline
            foreach ($statusList as $status) {
                if ($status['ENTITY_ID'] === $type) {
                    $returnList[$status['STATUS_ID']] =
                        esc_html__(
                            'Default pipeline',
                            'el-pro-form-bitrix24-integration'
                        )
                        . ' - '
                        . $status['NAME'];
                }
            }

            $pipelines = (array) get_option(Bootstrap::DEAL_CATEGORY_LIST_KEY);

            if ($pipelines) {
                foreach ($pipelines as $pipeline) {
                    foreach ($statusList as $status) {
                        if ($status['ENTITY_ID'] === $type . '_' . $pipeline['ID']) {
                            $returnList[$status['STATUS_ID']] = $pipeline['NAME'] . ' - ' . $status['NAME'];
                        }
                    }
                }
            }
        } else {
            $returnList = [
                '' => esc_html__('Not chosen', 'el-pro-form-bitrix24-integration')
            ];

            foreach ($statusList as $status) {
                if ($status['ENTITY_ID'] === $type) {
                    $returnList[$status['STATUS_ID']] = $status['NAME'];
                }
            }
        }

        return $returnList;
    }
}
