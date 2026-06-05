<?php
namespace ElementorTables\Modules\Tables\Widgets;

use Elementor\Element_Base;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Table_Quad extends Widget_Base {

	/**
	 * @var \WP_Query
	 */
	private $query = null;

	protected $_has_template_content = false;
	
	public function get_name() {
		return 'quad-table';
	}

	public function get_title() {
		return __( '4 Column Table', 'elementor-tables' );
	}

	public function get_icon() {
		return 'eicon-table';
	}

	public function get_categories() {
		return [ 'table-elements' ];
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'column_1_title',
			[
				'label' => __( 'First Title Settings', 'elementor-tables' ),
			]
		);

		$this->add_control(
			'title1',
			[
				'label' => __( 'Title', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor-tables' ),
				'default' => __( 'Elementor', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'title1_margin',
			[
				'label' => __( 'Title Margins', 'elementor' ),
				'description' => __( 'Use this option to adjust the margins if you have removed the CTA button.', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} #el-tables .table-cell h3.column-table-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title1_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.first-column h3.column-table-title',
			]
		);

		$this->add_control(
			'title_view',
			[
				'label' => __( 'View', 'elementor-tables' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'option_1_button',
			[
				'label' => __( 'CTA Button 1 Options', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'enable_button1',
			[
				'label' => __( 'Enable CTA Button 1', 'elementor-tables' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'prefix_class' => '',
				'label_on' => 'Yes',
				'label_off' => 'No',
				'return_value' => 'yes',
				'description' => __( 'You can show/hide the CTA button for this option.', 'elementor-tables' ),				
			]
		);
		
		$this->add_control(
			'button1_cta',
			[
				'label' => __( 'CTA Text', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Download Now', 'elementor-tables' ),
				'default' => __( 'Download Now!', 'elementor-tables' ),
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);

		$this->add_control(
			'btn1_link',
			[
				'label' => __( 'Link', 'elementor-tables' ),
				'type' => Controls_Manager::URL,
				'condition' => [
					'enable_button1' => 'yes',
				],
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border1',
				'label' => __( 'Border', 'elementor-tables' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .table-cell.first-column a.btn',
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);

		$this->add_control(
			'border1_radius',
			[
				'label' => __( 'Border Radius', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button1_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.first-column a.btn',
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'column_2_title',
			[
				'label' => __( 'Second Title Settings', 'elementor-tables' ),
			]
		);

		$this->add_control(
			'title2',
			[
				'label' => __( 'Title', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor-tables' ),
				'default' => __( 'Elementor Pro', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'title2_margin',
			[
				'label' => __( 'Title Margins', 'elementor' ),
				'description' => __( 'Use this option to adjust the margins if you have removed the CTA button.', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} #el-tables .table-cell h3.column-table-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title2_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.second-column h3.column-table-title',
			]
		);

		$this->add_control(
			'title2_view',
			[
				'label' => __( 'View', 'elementor-tables' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'option_2_button',
			[
				'label' => __( 'CTA Button 2 Options', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'enable_button2',
			[
				'label' => __( 'Enable CTA Button 2', 'elementor-tables' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'prefix_class' => '',
				'label_on' => 'Yes',
				'label_off' => 'No',
				'return_value' => 'yes',
				'description' => __( 'You can show/hide the CTA button for this option.', 'elementor-tables' ),
				
			]
		);
		
		$this->add_control(
			'button2_cta',
			[
				'label' => __( 'CTA Text', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'View Details', 'elementor-tables' ),
				'default' => __( 'View Details!', 'elementor-tables' ),
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);

		$this->add_control(
			'btn2_link',
			[
				'label' => __( 'Link', 'elementor-tables' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button2_border',
				'label' => __( 'Border', 'elementor-tables' ),
				'placeholder' => '2px',
				'default' => '2px',
				'selector' => '{{WRAPPER}} .table-cell.second-column a.btn',
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);

		$this->add_control(
			'button2_radius',
			[
				'label' => __( 'Border Radius', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button2_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.second-column a.btn',
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'column_3_title',
			[
				'label' => __( 'Second Title Settings', 'elementor-tables' ),
			]
		);

		$this->add_control(
			'title3',
			[
				'label' => __( 'Title', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor-tables' ),
				'default' => __( 'Elementor Extra', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'title3_margin',
			[
				'label' => __( 'Title Margins', 'elementor' ),
				'description' => __( 'Use this option to adjust the margins if you have removed the CTA button.', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} #el-tables .table-cell h3.column-table-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title3_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.third-column h3.column-table-title',
			]
		);

		$this->add_control(
			'title3_view',
			[
				'label' => __( 'View', 'elementor-tables' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'option_3_button',
			[
				'label' => __( 'CTA Button 3 Options', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'enable_button3',
			[
				'label' => __( 'Enable CTA Button 3', 'elementor-tables' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'prefix_class' => '',
				'label_on' => 'Yes',
				'label_off' => 'No',
				'return_value' => 'yes',
				'description' => __( 'You can show/hide the CTA button for this option.', 'elementor-tables' ),
				
			]
		);
		
		$this->add_control(
			'button3_cta',
			[
				'label' => __( 'CTA Text', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'View Details', 'elementor-tables' ),
				'default' => __( 'View Details!', 'elementor-tables' ),
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);

		$this->add_control(
			'btn3_link',
			[
				'label' => __( 'Link', 'elementor-tables' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button3_border',
				'label' => __( 'Border', 'elementor-tables' ),
				'placeholder' => '2px',
				'default' => '2px',
				'selector' => '{{WRAPPER}} .table-cell.third-column a.btn',
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);

		$this->add_control(
			'button3_radius',
			[
				'label' => __( 'Border Radius', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button3_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.third-column a.btn',
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'column_4_title',
			[
				'label' => __( 'Fourth Title Settings', 'elementor-tables' ),
			]
		);

		$this->add_control(
			'title4',
			[
				'label' => __( 'Title', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor-tables' ),
				'default' => __( 'Elementor Extra+', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'title3_margin',
			[
				'label' => __( 'Title Margins', 'elementor' ),
				'description' => __( 'Use this option to adjust the margins if you have removed the CTA button.', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} #el-tables .table-cell h3.column-table-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title3_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.fourth-column h3.column-table-title',
			]
		);

		$this->add_control(
			'title3_view',
			[
				'label' => __( 'View', 'elementor-tables' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'option_4_button',
			[
				'label' => __( 'CTA Button 4 Options', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'enable_button4',
			[
				'label' => __( 'Enable CTA Button 4', 'elementor-tables' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'prefix_class' => '',
				'label_on' => 'Yes',
				'label_off' => 'No',
				'return_value' => 'yes',
				'description' => __( 'You can show/hide the CTA button for this option.', 'elementor-tables' ),
				
			]
		);
		
		$this->add_control(
			'button4_cta',
			[
				'label' => __( 'CTA Text', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'View Details', 'elementor-tables' ),
				'default' => __( 'View Details!', 'elementor-tables' ),
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);

		$this->add_control(
			'btn4_link',
			[
				'label' => __( 'Link', 'elementor-tables' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button4_border',
				'label' => __( 'Border', 'elementor-tables' ),
				'placeholder' => '2px',
				'default' => '2px',
				'selector' => '{{WRAPPER}} .table-cell.fourth-column a.btn',
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);

		$this->add_control(
			'button4_radius',
			[
				'label' => __( 'Border Radius', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button4_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.fourth-column a.btn',
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'table_features',
			[
				'label' => __( 'Features', 'elementor-tables' ),
			]
		);

		$this->add_control(
			'features_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => __( 'Feature #1', 'elementor-tables' ),
						'option1_icon' => 'fa fa-check',
						'option2_icon' => 'fa fa-check',
						'option3_icon' => 'fa fa-check',
						'option4_icon' => 'fa fa-check',
					],
					[
						'text' => __( 'Feature #2', 'elementor-tables' ),
						'option1_icon' => 'fa fa-check',
						'option2_icon' => 'fa fa-check',
						'option3_icon' => 'fa fa-check',
						'option4_icon' => 'fa fa-check',
					],
					[
						'text' => __( 'Feature #3', 'elementor-tables' ),
						'option1_icon' => '',
						'option2_icon' => 'fa fa-check',
						'option3_icon' => 'fa fa-check',
						'option4_icon' => 'fa fa-check',
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Feature Name', 'elementor-tables' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Feature Name', 'elementor-tables' ),
						'default' => __( 'Feature Name', 'elementor-tables' ),
					],
					[
						'name' => 'option1_text',
						'label' => __( 'Option 1 Text', 'elementor-tables' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => '',
					],
					[
						'name' => 'option1_icon',
						'label' => __( 'Option 1 Icon', 'elementor-tables' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'option2_text',
						'label' => __( 'Option 2 Text', 'elementor-tables' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => '',
					],
					[
						'name' => 'option2_icon',
						'label' => __( 'Option 2 Icon', 'elementor-tables' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'option3_text',
						'label' => __( 'Option 3 Text', 'elementor-tables' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => '',
					],
					[
						'name' => 'option3_icon',
						'label' => __( 'Option 3 Icon', 'elementor-tables' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'option4_text',
						'label' => __( 'Option 4 Text', 'elementor-tables' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => '',
					],
					[
						'name' => 'option4_icon',
						'label' => __( 'Option 4 Icon', 'elementor-tables' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);		

		$this->end_controls_section();
		
		$this->start_controls_section(
			'features_style',
			[
				'label' => __( 'Features', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'features_color',
			[
				'label' => __( 'Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.cell-feature' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'features_bg',
			[
				'label' => __( 'Background', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.cell-feature' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'features_outline_color',
			[
				'label' => __( 'Outline Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#f2f2f2',
				'selectors' => [
					'{{WRAPPER}} .table-cell.cell-feature' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'features_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.cell-feature',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'column1_title_style',
			[
				'label' => __( 'First Option', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title1_bg',
			[
				'label' => __( 'Background Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#f2f2f2',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #el-tables-quad .table-cell:nth-child(2)' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title1_color',
			[
				'label' => __( 'Title Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column h3.column-table-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button1_color',
			[
				'label' => __( 'Button Text', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button1_hover',
			[
				'label' => __( 'Button Text Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button1_bg',
			[
				'label' => __( 'Button BG', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button1_bg_hover',
			[
				'label' => __( 'Button BG Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button1_border_hover',
			[
				'label' => __( 'Button Border Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button1' => 'yes',
				],
			]
		);

		$this->add_control(
			'icon1_color',
			[
				'label' => __( 'Icon & Text Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .table-cell.first-icon p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon1_bg',
			[
				'label' => __( 'Column Background', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'outline1_color',
			[
				'label' => __( 'Outline Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#f2f2f2',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-icon' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'column2_title_style',
			[
				'label' => __( 'Second Option', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title2_bg',
			[
				'label' => __( 'Background Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #el-tables-quad .table-cell:nth-child(3)' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title2_color',
			[
				'label' => __( 'Title Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column h3.column-table-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button2_color',
			[
				'label' => __( 'Button Text', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button2_hover',
			[
				'label' => __( 'Button Text Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button2_bg',
			[
				'label' => __( 'Button BG', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button2_bg_hover',
			[
				'label' => __( 'Button BG Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button2_border_hover',
			[
				'label' => __( 'Button Border Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button2' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'icon2_color',
			[
				'label' => __( 'Icon & Text Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .table-cell.second-icon p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon2_bg',
			[
				'label' => __( 'Column Background', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'outline2_color',
			[
				'label' => __( 'Outline Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#f2f2f2',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-icon' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'column3_title_style',
			[
				'label' => __( 'Third Option', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title3_bg',
			[
				'label' => __( 'Background Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#890550',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #el-tables-quad .table-cell:nth-child(4)' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title3_color',
			[
				'label' => __( 'Title Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column h3.column-table-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button3_color',
			[
				'label' => __( 'Button Text', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column a.btn' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button3_hover',
			[
				'label' => __( 'Button Text Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column a.btn:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button3_bg',
			[
				'label' => __( 'Button BG', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column a.btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button3_bg_hover',
			[
				'label' => __( 'Button BG Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column a.btn:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button3_border_hover',
			[
				'label' => __( 'Button Border Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-column a.btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button3' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'icon3_color',
			[
				'label' => __( 'Icon & Text Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .table-cell.third-icon p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon3_bg',
			[
				'label' => __( 'Column Background', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'outline3_color',
			[
				'label' => __( 'Outline Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#f2f2f2',
				'selectors' => [
					'{{WRAPPER}} .table-cell.third-icon' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'column4_title_style',
			[
				'label' => __( 'Fourth Option', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title4_bg',
			[
				'label' => __( 'Background Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #el-tables-quad .table-cell:nth-child(5)' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title4_color',
			[
				'label' => __( 'Title Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column h3.column-table-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button4_color',
			[
				'label' => __( 'Button Text', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column a.btn' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button4_hover',
			[
				'label' => __( 'Button Text Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column a.btn:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button4_bg',
			[
				'label' => __( 'Button BG', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column a.btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button4_bg_hover',
			[
				'label' => __( 'Button BG Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column a.btn:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'button4_border_hover',
			[
				'label' => __( 'Button Border Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-column a.btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'enable_button4' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'icon4_color',
			[
				'label' => __( 'Icon & Text Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .table-cell.fourth-icon p' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon4_bg',
			[
				'label' => __( 'Column Background', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'outline4_color',
			[
				'label' => __( 'Outline Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#f2f2f2',
				'selectors' => [
					'{{WRAPPER}} .table-cell.fourth-icon' => 'outline: 1px solid {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();

	}
		
	protected function render() {
		$settings = $this->get_settings();
		$title1 = $settings['title1'];
		$title2 = $settings['title2'];
		$title3 = $settings['title3'];
		$title4 = $settings['title4'];
		
		$features = $settings['features_list'];
		
		$btn1_on 	= $settings['enable_button1'];
		$button1 	= $settings['button1_cta'];
		$btn1_url 	= $settings['btn1_link']['url'];
		if ( ! empty( $settings['btn1_link']['is_external'] ) ) {
			$btn1_target = '_blank';
		} else {
			$btn1_target = '_self';
		}
		
		$btn2_on 	= $settings['enable_button2'];
		$button2 	= $settings['button2_cta'];
		$btn2_url 	= $settings['btn2_link']['url'];
		if ( ! empty( $settings['btn2_link']['is_external'] ) ) {
			$btn2_target = '_blank';
		} else {
			$btn2_target = '_self';
		}
		
		$btn3_on 	= $settings['enable_button3'];
		$button3 	= $settings['button3_cta'];
		$btn3_url 	= $settings['btn3_link']['url'];
		if ( ! empty( $settings['btn3_link']['is_external'] ) ) {
			$btn3_target = '_blank';
		} else {
			$btn3_target = '_self';
		}
		
		$btn4_on 	= $settings['enable_button4'];
		$button4 	= $settings['button4_cta'];
		$btn4_url 	= $settings['btn4_link']['url'];
		if ( ! empty( $settings['btn4_link']['is_external'] ) ) {
			$btn4_target = '_blank';
		} else {
			$btn4_target = '_self';
		}

	?>
	<div id="el-tables-quad" class="table">
		<div class="table-cell"></div>
		
		<div class="table-cell first-column">
			<h3 class="column-table-title">
				<?php echo $title1; ?>
			</h3>
			<?php if ( $settings['enable_button1'] == 'yes' && ! empty( $settings['button1_cta'] ) ) : ?>
				<a href="<?php echo $btn1_url; ?>" target="<?php echo $btn1_target; ?>" class="btn">
					<?php echo $button1; ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="table-cell second-column">
			<h3 class="column-table-title">
				<?php echo $title2; ?>
			</h3>
			<?php if ( $settings['enable_button2'] == 'yes' && ! empty( $settings['button2_cta'] ) ) : ?>
				<a href="<?php echo $btn2_url; ?>" target="<?php echo $btn2_target; ?>" class="btn">
					<?php echo $button2; ?>
				</a>
			<?php endif; ?>
		</div>
		
		<div class="table-cell third-column">
			<h3 class="column-table-title">
				<?php echo $title3; ?>
			</h3>
			<?php if ( $settings['enable_button3'] == 'yes' && ! empty( $settings['button3_cta'] ) ) : ?>
				<a href="<?php echo $btn3_url; ?>" target="<?php echo $btn3_target; ?>" class="btn">
					<?php echo $button3; ?>
				</a>
			<?php endif; ?>
		</div>
		
		<div class="table-cell fourth-column">
			<h3 class="column-table-title">
				<?php echo $title4; ?>
			</h3>
			<?php if ( $settings['enable_button4'] == 'yes' && ! empty( $settings['button4_cta'] ) ) : ?>
				<a href="<?php echo $btn4_url; ?>" target="<?php echo $btn4_target; ?>" class="btn">
					<?php echo $button4; ?>
				</a>
			<?php endif; ?>
		</div>
		
		<?php foreach ( $features as $feature ) : ?>
			<div class="table-cell cell-feature">
				<?php echo $feature['text']; ?>
			</div>
			<div class="table-cell first-icon">
				<i class="<?php echo esc_attr( $feature['option1_icon'] ); ?>"></i>
				<p class="first-text"><?php echo esc_attr( $feature['option1_text'] ); ?></p>
			</div>
			<div class="table-cell second-icon">
				<i class="<?php echo esc_attr( $feature['option2_icon'] ); ?>"></i>
				<p class="second-text"><?php echo esc_attr( $feature['option2_text'] ); ?></p>
			</div>
			<div class="table-cell third-icon">
				<i class="<?php echo esc_attr( $feature['option3_icon'] ); ?>"></i>
				<p class="third-text"><?php echo esc_attr( $feature['option3_text'] ); ?></p>
			</div>
			<div class="table-cell fourth-icon">
				<i class="<?php echo esc_attr( $feature['option4_icon'] ); ?>"></i>
				<p class="fourth-text"><?php echo esc_attr( $feature['option4_text'] ); ?></p>
			</div>
		<?php endforeach; ?>			
			
	</div>
	<?php		
	}

	protected function render_btn1() {
		$settings = $this->get_settings();
		
		
	}
	
	protected function render_btn2() {
		$settings = $this->get_settings();
		
		
		
	}

	protected function _content_template() {}
}