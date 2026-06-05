<?php

defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

///////////////////////////////////////////////////////////////////////////////////////////////////
//Restrict Structured Data Types metaboxes to user roles
///////////////////////////////////////////////////////////////////////////////////////////////////
function seopress_advanced_security_metaboxe_sdt_role_hook_option() {
	$seopress_advanced_security_metaboxe_sdt_role_hook_option = get_option("seopress_advanced_option_name");
	if ( ! empty ( $seopress_advanced_security_metaboxe_sdt_role_hook_option ) ) {
		foreach ($seopress_advanced_security_metaboxe_sdt_role_hook_option as $key => $seopress_advanced_security_metaboxe_sdt_role_hook_value)
			$options[$key] = $seopress_advanced_security_metaboxe_sdt_role_hook_value;
		 if (isset($seopress_advanced_security_metaboxe_sdt_role_hook_option['seopress_advanced_security_metaboxe_sdt_role'])) {
			return $seopress_advanced_security_metaboxe_sdt_role_hook_option['seopress_advanced_security_metaboxe_sdt_role'];
		 }
	}
}

/**
 * Function to recover old data from manual schemas
 * @since 3.9
 * @return array
 * @author Thomas Deneulin
 */
function seopress_get_rich_snippets_fallback($post){
	return [
		'_seopress_pro_rich_snippets_type' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_type',true),
		'_seopress_pro_rich_snippets_article_type' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_type',true),
		'_seopress_pro_rich_snippets_article_title' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_title',true),
		'_seopress_pro_rich_snippets_article_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_img',true),
		'_seopress_pro_rich_snippets_article_img_width' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_img_width',true),
		'_seopress_pro_rich_snippets_article_img_height' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_img_height',true),
		'_seopress_pro_rich_snippets_article_coverage_start_date' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_coverage_start_date',true),
		'_seopress_pro_rich_snippets_article_coverage_start_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_coverage_start_time',true),
		'_seopress_pro_rich_snippets_article_coverage_end_date' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_coverage_end_date',true),
		'_seopress_pro_rich_snippets_article_coverage_end_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_article_coverage_end_time',true),
		'_seopress_pro_rich_snippets_lb_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_name',true),
		'_seopress_pro_rich_snippets_lb_type' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_type',true),
		'_seopress_pro_rich_snippets_lb_cuisine' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_cuisine',true),
		'_seopress_pro_rich_snippets_lb_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_img',true),
		'_seopress_pro_rich_snippets_lb_img_width' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_img_width',true),
		'_seopress_pro_rich_snippets_lb_img_height' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_img_height',true),
		'_seopress_pro_rich_snippets_lb_street_addr' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_street_addr',true),
		'_seopress_pro_rich_snippets_lb_city' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_city',true),
		'_seopress_pro_rich_snippets_lb_state' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_state',true),
		'_seopress_pro_rich_snippets_lb_pc' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_pc',true),
		'_seopress_pro_rich_snippets_lb_country' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_country',true),
		'_seopress_pro_rich_snippets_lb_lat' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_lat',true),
		'_seopress_pro_rich_snippets_lb_lon' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_lon',true),
		'_seopress_pro_rich_snippets_lb_website' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_website',true),
		'_seopress_pro_rich_snippets_lb_tel' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_tel',true),
		'_seopress_pro_rich_snippets_lb_price' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_price',true),
		'_seopress_pro_rich_snippets_lb_opening_hours' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_lb_opening_hours',false),
		'_seopress_pro_rich_snippets_faq' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_faq'),
		'_seopress_pro_rich_snippets_courses_title' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_courses_title',true),
		'_seopress_pro_rich_snippets_courses_desc' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_courses_desc',true),
		'_seopress_pro_rich_snippets_courses_school' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_courses_school',true),
		'_seopress_pro_rich_snippets_courses_website' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_courses_website',true),
		'_seopress_pro_rich_snippets_recipes_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_name',true),
		'_seopress_pro_rich_snippets_recipes_desc' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_desc',true),
		'_seopress_pro_rich_snippets_recipes_cat' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_cat',true),
		'_seopress_pro_rich_snippets_recipes_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_img',true),
		'_seopress_pro_rich_snippets_recipes_prep_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_prep_time',true),
		'_seopress_pro_rich_snippets_recipes_cook_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_cook_time',true),
		'_seopress_pro_rich_snippets_recipes_calories' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_calories',true),
		'_seopress_pro_rich_snippets_recipes_yield' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_yield',true),
		'_seopress_pro_rich_snippets_recipes_keywords' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_keywords',true),
		'_seopress_pro_rich_snippets_recipes_cuisine' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_cuisine',true),
		'_seopress_pro_rich_snippets_recipes_ingredient' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_ingredient',true),
		'_seopress_pro_rich_snippets_recipes_instructions' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_recipes_instructions',true),
		'_seopress_pro_rich_snippets_jobs_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_name',true),
		'_seopress_pro_rich_snippets_jobs_desc' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_desc',true),
		'_seopress_pro_rich_snippets_jobs_date_posted' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_date_posted',true),
		'_seopress_pro_rich_snippets_jobs_valid_through' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_valid_through',true),
		'_seopress_pro_rich_snippets_jobs_employment_type' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_employment_type',true),
		'_seopress_pro_rich_snippets_jobs_identifier_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_identifier_name',true),
		'_seopress_pro_rich_snippets_jobs_identifier_value' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_identifier_value',true),
		'_seopress_pro_rich_snippets_jobs_hiring_organization' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_hiring_organization',true),
		'_seopress_pro_rich_snippets_jobs_hiring_same_as' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_hiring_same_as',true),
		'_seopress_pro_rich_snippets_jobs_hiring_logo' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_hiring_logo',true),
		'_seopress_pro_rich_snippets_jobs_hiring_logo_width' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_hiring_logo_width',true),
		'_seopress_pro_rich_snippets_jobs_hiring_logo_height' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_hiring_logo_height',true),
		'_seopress_pro_rich_snippets_jobs_address_street' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_address_street',true),
		'_seopress_pro_rich_snippets_jobs_address_locality' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_address_locality',true),
		'_seopress_pro_rich_snippets_jobs_address_region' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_address_region',true),
		'_seopress_pro_rich_snippets_jobs_postal_code' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_postal_code',true),
		'_seopress_pro_rich_snippets_jobs_country' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_country',true),
		'_seopress_pro_rich_snippets_jobs_remote' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_remote',true),
		'_seopress_pro_rich_snippets_jobs_salary' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_salary',true),
		'_seopress_pro_rich_snippets_jobs_salary_currency' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_salary_currency',true),
		'_seopress_pro_rich_snippets_jobs_salary_unit' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_jobs_salary_unit',true),
		'_seopress_pro_rich_snippets_videos_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_videos_name',true),
		'_seopress_pro_rich_snippets_videos_description' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_videos_description',true),
		'_seopress_pro_rich_snippets_videos_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_videos_img',true),
		'_seopress_pro_rich_snippets_videos_img_width' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_videos_img_width',true),
		'_seopress_pro_rich_snippets_videos_img_height' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_videos_img_height',true),
		'_seopress_pro_rich_snippets_videos_duration' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_videos_duration',true),
		'_seopress_pro_rich_snippets_videos_url' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_videos_url',true),
		'_seopress_pro_rich_snippets_events_type' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_type',true),
		'_seopress_pro_rich_snippets_events_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_name',true),
		'_seopress_pro_rich_snippets_events_desc' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_desc',true),
		'_seopress_pro_rich_snippets_events_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_img',true),
		'_seopress_pro_rich_snippets_events_start_date' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_start_date',true),
		'_seopress_pro_rich_snippets_events_start_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_start_time',true),
		'_seopress_pro_rich_snippets_events_end_date' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_end_date',true),
		'_seopress_pro_rich_snippets_events_end_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_end_time',true),
		'_seopress_pro_rich_snippets_events_previous_start_date' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_previous_start_date',true),
		'_seopress_pro_rich_snippets_events_previous_start_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_previous_start_time',true),
		'_seopress_pro_rich_snippets_events_location_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_location_name',true),
		'_seopress_pro_rich_snippets_events_location_url' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_location_url',true),
		'_seopress_pro_rich_snippets_events_location_address' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_location_address',true),
		'_seopress_pro_rich_snippets_events_offers_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_name',true),
		'_seopress_pro_rich_snippets_events_offers_cat' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_cat',true),
		'_seopress_pro_rich_snippets_events_offers_price' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_price',true),
		'_seopress_pro_rich_snippets_events_offers_price_currency' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_price_currency',true),
		'_seopress_pro_rich_snippets_events_offers_availability' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_availability',true),
		'_seopress_pro_rich_snippets_events_offers_valid_from_date' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_valid_from_date',true),
		'_seopress_pro_rich_snippets_events_offers_valid_from_time' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_valid_from_time',true),
		'_seopress_pro_rich_snippets_events_offers_url' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_offers_url',true),
		'_seopress_pro_rich_snippets_events_performer' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_performer',true),
		'_seopress_pro_rich_snippets_events_status' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_status',true),
		'_seopress_pro_rich_snippets_events_attendance_mode' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_events_attendance_mode',true),
		'_seopress_pro_rich_snippets_product_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_name',true),
		'_seopress_pro_rich_snippets_product_description' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_description',true),
		'_seopress_pro_rich_snippets_product_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_img',true),
		'_seopress_pro_rich_snippets_product_price' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_price',true),
		'_seopress_pro_rich_snippets_product_price_valid_date' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_price_valid_date',true),
		'_seopress_pro_rich_snippets_product_sku' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_sku',true),
		'_seopress_pro_rich_snippets_product_brand' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_brand',true),
		'_seopress_pro_rich_snippets_product_global_ids' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_global_ids',true),
		'_seopress_pro_rich_snippets_product_global_ids_value' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_global_ids_value',true),
		'_seopress_pro_rich_snippets_product_price_currency' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_price_currency',true),
		'_seopress_pro_rich_snippets_product_condition' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_condition',true),
		'_seopress_pro_rich_snippets_product_availability' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_product_availability',true),
		'_seopress_pro_rich_snippets_softwareapp_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_softwareapp_name',true),
		'_seopress_pro_rich_snippets_softwareapp_os' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_softwareapp_os',true),
		'_seopress_pro_rich_snippets_softwareapp_cat' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_softwareapp_cat',true),
		'_seopress_pro_rich_snippets_softwareapp_price' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_softwareapp_price',true),
		'_seopress_pro_rich_snippets_softwareapp_currency' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_softwareapp_currency',true),
		'_seopress_pro_rich_snippets_softwareapp_rating' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_softwareapp_rating',true),
		'_seopress_pro_rich_snippets_service_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_name',true),
		'_seopress_pro_rich_snippets_service_type' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_type',true),
		'_seopress_pro_rich_snippets_service_description' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_description',true),
		'_seopress_pro_rich_snippets_service_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_img',true),
		'_seopress_pro_rich_snippets_service_area' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_area',true),
		'_seopress_pro_rich_snippets_service_provider_name' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_provider_name',true),
		'_seopress_pro_rich_snippets_service_lb_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_lb_img',true),
		'_seopress_pro_rich_snippets_service_provider_mobility' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_provider_mobility',true),
		'_seopress_pro_rich_snippets_service_slogan' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_slogan',true),
		'_seopress_pro_rich_snippets_service_street_addr' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_street_addr',true),
		'_seopress_pro_rich_snippets_service_city' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_city',true),
		'_seopress_pro_rich_snippets_service_state' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_state',true),
		'_seopress_pro_rich_snippets_service_pc' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_pc',true),
		'_seopress_pro_rich_snippets_service_country' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_country',true),
		'_seopress_pro_rich_snippets_service_lat' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_lat',true),
		'_seopress_pro_rich_snippets_service_lon' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_lon',true),
		'_seopress_pro_rich_snippets_service_tel' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_tel',true),
		'_seopress_pro_rich_snippets_service_price' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_service_price',true),
		'_seopress_pro_rich_snippets_review_item' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_review_item',true),
		'_seopress_pro_rich_snippets_review_item_type' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_review_item_type',true),
		'_seopress_pro_rich_snippets_review_img' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_review_img',true),
		'_seopress_pro_rich_snippets_review_rating' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_review_rating',true),
		'_seopress_pro_rich_snippets_custom' => get_post_meta($post->ID,'_seopress_pro_rich_snippets_custom',true),
	];
}

/**
 * Function to save old data from manual schemas
 * @since 3.9
 * @return array
 * @author Thomas Deneulin
 */
function seopress_update_rich_snippets_fallback($post_id){

	if(isset($_POST['seopress_pro_rich_snippets_type'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_type', esc_html($_POST['seopress_pro_rich_snippets_type']));
	}

	//Article
	if(isset($_POST['seopress_pro_rich_snippets_article_type'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_type', esc_html($_POST['seopress_pro_rich_snippets_article_type']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_title'])){
	  update_post_meta($post_id, '_seopress_pro_rich_snippets_article_title', esc_html($_POST['seopress_pro_rich_snippets_article_title']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_img', esc_html($_POST['seopress_pro_rich_snippets_article_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_img_width'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_img_width', esc_html($_POST['seopress_pro_rich_snippets_article_img_width']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_img_height'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_img_height', esc_html($_POST['seopress_pro_rich_snippets_article_img_height']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_coverage_start_date'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_coverage_start_date', esc_html($_POST['seopress_pro_rich_snippets_article_coverage_start_date']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_coverage_start_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_coverage_start_time', esc_html($_POST['seopress_pro_rich_snippets_article_coverage_start_time']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_coverage_end_date'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_coverage_end_date', esc_html($_POST['seopress_pro_rich_snippets_article_coverage_end_date']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_article_coverage_end_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_article_coverage_end_time', esc_html($_POST['seopress_pro_rich_snippets_article_coverage_end_time']));
	}
	//Local Business
	if(isset($_POST['seopress_pro_rich_snippets_lb_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_name', esc_html($_POST['seopress_pro_rich_snippets_lb_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_type'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_type', esc_html($_POST['seopress_pro_rich_snippets_lb_type']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_cuisine'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_cuisine', esc_html($_POST['seopress_pro_rich_snippets_lb_cuisine']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_img', esc_html($_POST['seopress_pro_rich_snippets_lb_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_img_width'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_img_width', esc_html($_POST['seopress_pro_rich_snippets_lb_img_width']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_img_height'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_img_height', esc_html($_POST['seopress_pro_rich_snippets_lb_img_height']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_street_addr'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_street_addr', esc_html($_POST['seopress_pro_rich_snippets_lb_street_addr']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_city'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_city', esc_html($_POST['seopress_pro_rich_snippets_lb_city']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_state'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_state', esc_html($_POST['seopress_pro_rich_snippets_lb_state']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_pc'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_pc', esc_html($_POST['seopress_pro_rich_snippets_lb_pc']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_country'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_country', esc_html($_POST['seopress_pro_rich_snippets_lb_country']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_lat'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_lat', esc_html($_POST['seopress_pro_rich_snippets_lb_lat']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_lon'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_lon', esc_html($_POST['seopress_pro_rich_snippets_lb_lon']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_website'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_website', esc_html($_POST['seopress_pro_rich_snippets_lb_website']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_tel'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_tel', esc_html($_POST['seopress_pro_rich_snippets_lb_tel']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_price'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_price', esc_html($_POST['seopress_pro_rich_snippets_lb_price']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_lb_opening_hours'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_lb_opening_hours', $_POST['seopress_pro_rich_snippets_lb_opening_hours']);
	}
	//FAQ
	if(isset($_POST['seopress_pro_rich_snippets_faq'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_faq', $_POST['seopress_pro_rich_snippets_faq']);
	}
	//Course
	if(isset($_POST['seopress_pro_rich_snippets_courses_title'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_courses_title', esc_html($_POST['seopress_pro_rich_snippets_courses_title']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_courses_desc'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_courses_desc', esc_textarea($_POST['seopress_pro_rich_snippets_courses_desc']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_courses_school'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_courses_school', esc_html($_POST['seopress_pro_rich_snippets_courses_school']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_courses_website'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_courses_website', esc_html($_POST['seopress_pro_rich_snippets_courses_website']));
	}
	//Recipe
	if(isset($_POST['seopress_pro_rich_snippets_recipes_name'])){
	  update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_name', esc_html($_POST['seopress_pro_rich_snippets_recipes_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_desc'])){
	  update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_desc', esc_textarea($_POST['seopress_pro_rich_snippets_recipes_desc']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_cat'])){
	  update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_cat', esc_html($_POST['seopress_pro_rich_snippets_recipes_cat']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_img', esc_html($_POST['seopress_pro_rich_snippets_recipes_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_prep_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_prep_time', esc_html($_POST['seopress_pro_rich_snippets_recipes_prep_time']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_cook_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_cook_time', esc_html($_POST['seopress_pro_rich_snippets_recipes_cook_time']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_calories'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_calories', esc_html($_POST['seopress_pro_rich_snippets_recipes_calories']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_yield'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_yield', esc_html($_POST['seopress_pro_rich_snippets_recipes_yield']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_keywords'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_keywords', esc_html($_POST['seopress_pro_rich_snippets_recipes_keywords']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_cuisine'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_cuisine', esc_html($_POST['seopress_pro_rich_snippets_recipes_cuisine']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_ingredient'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_ingredient', esc_textarea($_POST['seopress_pro_rich_snippets_recipes_ingredient']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_recipes_instructions'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_recipes_instructions', esc_textarea($_POST['seopress_pro_rich_snippets_recipes_instructions']));
	}
	//Job
	if(isset($_POST['seopress_pro_rich_snippets_jobs_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_name', esc_html($_POST['seopress_pro_rich_snippets_jobs_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_desc'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_desc', esc_textarea($_POST['seopress_pro_rich_snippets_jobs_desc']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_date_posted'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_date_posted', esc_html($_POST['seopress_pro_rich_snippets_jobs_date_posted']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_valid_through'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_valid_through', esc_html($_POST['seopress_pro_rich_snippets_jobs_valid_through']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_employment_type'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_employment_type', esc_html($_POST['seopress_pro_rich_snippets_jobs_employment_type']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_identifier_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_identifier_name', esc_html($_POST['seopress_pro_rich_snippets_jobs_identifier_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_identifier_value'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_identifier_value', esc_html($_POST['seopress_pro_rich_snippets_jobs_identifier_value']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_hiring_organization'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_hiring_organization', esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_organization']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_hiring_same_as'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_hiring_same_as', esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_same_as']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_hiring_logo'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_hiring_logo', esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_logo']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_width'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_hiring_logo_width', esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_width']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_height'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_hiring_logo_height', esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_height']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_address_street'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_address_street', esc_html($_POST['seopress_pro_rich_snippets_jobs_address_street']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_address_locality'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_address_locality', esc_html($_POST['seopress_pro_rich_snippets_jobs_address_locality']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_address_region'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_address_region', esc_html($_POST['seopress_pro_rich_snippets_jobs_address_region']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_postal_code'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_postal_code', esc_html($_POST['seopress_pro_rich_snippets_jobs_postal_code']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_country'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_country', esc_html($_POST['seopress_pro_rich_snippets_jobs_country']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_remote'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_remote', esc_attr($_POST['seopress_pro_rich_snippets_jobs_remote']));
	} else {
		delete_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_remote');
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_salary'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_salary', esc_html($_POST['seopress_pro_rich_snippets_jobs_salary']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_salary_currency'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_salary_currency', esc_html($_POST['seopress_pro_rich_snippets_jobs_salary_currency']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_jobs_salary_unit'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_jobs_salary_unit', esc_html($_POST['seopress_pro_rich_snippets_jobs_salary_unit']));
	}
	//Video
	if(isset($_POST['seopress_pro_rich_snippets_videos_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_videos_name', esc_html($_POST['seopress_pro_rich_snippets_videos_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_videos_description'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_videos_description', esc_textarea($_POST['seopress_pro_rich_snippets_videos_description']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_videos_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_videos_img', esc_html($_POST['seopress_pro_rich_snippets_videos_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_videos_img_width'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_videos_img_width', esc_html($_POST['seopress_pro_rich_snippets_videos_img_width']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_videos_img_height'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_videos_img_height', esc_html($_POST['seopress_pro_rich_snippets_videos_img_height']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_videos_duration'])){
		$duration = $_POST['seopress_pro_rich_snippets_videos_duration'];
		$findme   = ':';
		$pos = strpos($duration, $findme);
		if ($pos === false) {
			$_POST['seopress_pro_rich_snippets_videos_duration'] = '00:'.$_POST['seopress_pro_rich_snippets_videos_duration'];
		}
		update_post_meta($post_id, '_seopress_pro_rich_snippets_videos_duration', esc_html($_POST['seopress_pro_rich_snippets_videos_duration']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_videos_url'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_videos_url', esc_html($_POST['seopress_pro_rich_snippets_videos_url']));
	}
	//Event
	if(isset($_POST['seopress_pro_rich_snippets_events_type'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_type', esc_html($_POST['seopress_pro_rich_snippets_events_type']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_name', esc_html($_POST['seopress_pro_rich_snippets_events_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_desc'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_desc', esc_html($_POST['seopress_pro_rich_snippets_events_desc']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_img', esc_html($_POST['seopress_pro_rich_snippets_events_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_desc'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_desc', esc_textarea($_POST['seopress_pro_rich_snippets_events_desc']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_start_date'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_start_date', esc_html($_POST['seopress_pro_rich_snippets_events_start_date']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_start_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_start_time', esc_html($_POST['seopress_pro_rich_snippets_events_start_time']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_end_date'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_end_date', esc_html($_POST['seopress_pro_rich_snippets_events_end_date']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_end_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_end_time', esc_html($_POST['seopress_pro_rich_snippets_events_end_time']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_previous_start_date'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_previous_start_date', esc_html($_POST['seopress_pro_rich_snippets_events_previous_start_date']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_previous_start_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_previous_start_time', esc_html($_POST['seopress_pro_rich_snippets_events_previous_start_time']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_location_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_location_name', esc_html($_POST['seopress_pro_rich_snippets_events_location_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_location_url'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_location_url', esc_html($_POST['seopress_pro_rich_snippets_events_location_url']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_location_address'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_location_address', esc_html($_POST['seopress_pro_rich_snippets_events_location_address']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_name', esc_html($_POST['seopress_pro_rich_snippets_events_offers_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_cat'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_cat', esc_html($_POST['seopress_pro_rich_snippets_events_offers_cat']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_price'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_price', esc_html($_POST['seopress_pro_rich_snippets_events_offers_price']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_price_currency'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_price_currency', esc_html($_POST['seopress_pro_rich_snippets_events_offers_price_currency']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_availability'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_availability', esc_html($_POST['seopress_pro_rich_snippets_events_offers_availability']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_valid_from_date'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_valid_from_date', esc_html($_POST['seopress_pro_rich_snippets_events_offers_valid_from_date']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_valid_from_time'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_valid_from_time', esc_html($_POST['seopress_pro_rich_snippets_events_offers_valid_from_time']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_offers_url'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_offers_url', esc_html($_POST['seopress_pro_rich_snippets_events_offers_url']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_performer'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_performer', esc_html($_POST['seopress_pro_rich_snippets_events_performer']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_status'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_status', esc_html($_POST['seopress_pro_rich_snippets_events_status']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_events_attendance_mode'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_events_attendance_mode', esc_html($_POST['seopress_pro_rich_snippets_events_attendance_mode']));
	}
	//Product
	if(isset($_POST['seopress_pro_rich_snippets_product_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_name', esc_html($_POST['seopress_pro_rich_snippets_product_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_description'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_description', esc_textarea($_POST['seopress_pro_rich_snippets_product_description']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_img', esc_html($_POST['seopress_pro_rich_snippets_product_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_price'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_price', esc_html($_POST['seopress_pro_rich_snippets_product_price']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_price_valid_date'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_price_valid_date', esc_html($_POST['seopress_pro_rich_snippets_product_price_valid_date']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_sku'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_sku', esc_html($_POST['seopress_pro_rich_snippets_product_sku']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_global_ids'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_global_ids', esc_html($_POST['seopress_pro_rich_snippets_product_global_ids']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_brand'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_brand', esc_html($_POST['seopress_pro_rich_snippets_product_brand']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_global_ids_value'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_global_ids_value', esc_html($_POST['seopress_pro_rich_snippets_product_global_ids_value']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_price_currency'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_price_currency', esc_html($_POST['seopress_pro_rich_snippets_product_price_currency']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_condition'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_condition', esc_html($_POST['seopress_pro_rich_snippets_product_condition']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_product_availability'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_product_availability', esc_html($_POST['seopress_pro_rich_snippets_product_availability']));
	}
	//Service
	if(isset($_POST['seopress_pro_rich_snippets_service_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_name', esc_html($_POST['seopress_pro_rich_snippets_service_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_type'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_type', esc_html($_POST['seopress_pro_rich_snippets_service_type']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_description'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_description', esc_textarea($_POST['seopress_pro_rich_snippets_service_description']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_img', esc_html($_POST['seopress_pro_rich_snippets_service_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_area'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_area', esc_html($_POST['seopress_pro_rich_snippets_service_area']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_provider_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_provider_name', esc_html($_POST['seopress_pro_rich_snippets_service_provider_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_lb_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_lb_img', esc_html($_POST['seopress_pro_rich_snippets_service_lb_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_provider_mobility'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_provider_mobility', esc_html($_POST['seopress_pro_rich_snippets_service_provider_mobility']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_slogan'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_slogan', esc_html($_POST['seopress_pro_rich_snippets_service_slogan']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_street_addr'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_street_addr', esc_html($_POST['seopress_pro_rich_snippets_service_street_addr']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_city'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_city', esc_html($_POST['seopress_pro_rich_snippets_service_city']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_state'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_state', esc_html($_POST['seopress_pro_rich_snippets_service_state']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_pc'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_pc', esc_html($_POST['seopress_pro_rich_snippets_service_pc']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_country'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_country', esc_html($_POST['seopress_pro_rich_snippets_service_country']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_lat'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_lat', esc_html($_POST['seopress_pro_rich_snippets_service_lat']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_lon'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_lon', esc_html($_POST['seopress_pro_rich_snippets_service_lon']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_tel'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_tel', esc_html($_POST['seopress_pro_rich_snippets_service_tel']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_service_price'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_service_price', esc_html($_POST['seopress_pro_rich_snippets_service_price']));
	}
	//Software App
	if(isset($_POST['seopress_pro_rich_snippets_softwareapp_name'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_softwareapp_name', esc_html($_POST['seopress_pro_rich_snippets_softwareapp_name']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_softwareapp_os'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_softwareapp_os', esc_html($_POST['seopress_pro_rich_snippets_softwareapp_os']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_softwareapp_cat'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_softwareapp_cat', esc_html($_POST['seopress_pro_rich_snippets_softwareapp_cat']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_softwareapp_price'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_softwareapp_price', esc_html($_POST['seopress_pro_rich_snippets_softwareapp_price']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_softwareapp_currency'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_softwareapp_currency', esc_html($_POST['seopress_pro_rich_snippets_softwareapp_currency']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_softwareapp_rating'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_softwareapp_rating', esc_html($_POST['seopress_pro_rich_snippets_softwareapp_rating']));
	}
	//Review
	if(isset($_POST['seopress_pro_rich_snippets_review_item'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_review_item', esc_html($_POST['seopress_pro_rich_snippets_review_item']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_review_item_type'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_review_item_type', esc_html($_POST['seopress_pro_rich_snippets_review_item_type']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_review_img'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_review_img', esc_html($_POST['seopress_pro_rich_snippets_review_img']));
	}
	if(isset($_POST['seopress_pro_rich_snippets_review_rating'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_review_rating', esc_html($_POST['seopress_pro_rich_snippets_review_rating']));
	}

	//Custom schema
	if(isset($_POST['seopress_pro_rich_snippets_custom'])){
		update_post_meta($post_id, '_seopress_pro_rich_snippets_custom', esc_textarea($_POST['seopress_pro_rich_snippets_custom']));
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Display Rich Snippets metabox in Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function seopress_pro_admin_std_metaboxe_display() {
	add_action('add_meta_boxes','seopress_pro_init_metabox', 20);
	function seopress_pro_init_metabox(){
		if (function_exists('seopress_advanced_appearance_metaboxe_position_option')) {
			$seopress_advanced_appearance_metaboxe_position_option = seopress_advanced_appearance_metaboxe_position_option();
		} else {
			$seopress_advanced_appearance_metaboxe_position_option = 'default';
		}

		if (function_exists('seopress_get_post_types')) {

			$seopress_get_post_types = seopress_get_post_types();

			$seopress_get_post_types = apply_filters('seopress_pro_metaboxe_sdt', $seopress_get_post_types);

			if (!empty($seopress_get_post_types)) {
				foreach ($seopress_get_post_types as $key => $value) {
					add_meta_box('seopress_pro_cpt', __('Structured Data Types','wp-seopress-pro'), 'seopress_pro_cpt', $key, 'normal', $seopress_advanced_appearance_metaboxe_position_option);
				}
			}
		}
	}

	function seopress_rich_snippets_publisher_logo_option() {
		$seopress_rich_snippets_publisher_logo_option = get_option("seopress_pro_option_name");
		if ( ! empty ( $seopress_rich_snippets_publisher_logo_option ) ) {
			foreach ($seopress_rich_snippets_publisher_logo_option as $key => $seopress_rich_snippets_publisher_logo_value)
				$options[$key] = $seopress_rich_snippets_publisher_logo_value;
			 if (isset($seopress_rich_snippets_publisher_logo_option['seopress_rich_snippets_publisher_logo'])) {
				return $seopress_rich_snippets_publisher_logo_option['seopress_rich_snippets_publisher_logo'];
			 }
		}
	}

	function seopress_advanced_appearance_advice_schema_option() {
		$seopress_advanced_appearance_advice_schema_option = get_option("seopress_advanced_option_name");
		if ( ! empty ( $seopress_advanced_appearance_advice_schema_option ) ) {
			foreach ($seopress_advanced_appearance_advice_schema_option as $key => $seopress_advanced_appearance_advice_schema_value)
				$options[$key] = $seopress_advanced_appearance_advice_schema_value;
			 if (isset($seopress_advanced_appearance_advice_schema_option['seopress_advanced_appearance_advice_schema'])) {
				return $seopress_advanced_appearance_advice_schema_option['seopress_advanced_appearance_advice_schema'];
			 }
		}
	}

	function seopress_pro_cpt($post){
		$prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_nonce_field( plugin_basename( __FILE__ ), 'seopress_pro_cpt_nonce' );

		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'seopress-pro-media-uploader-js', plugins_url('assets/js/seopress-pro-media-uploader' . $prefix . '.js', dirname(dirname( __FILE__ ))), array('jquery'), SEOPRESS_PRO_VERSION, false );
		wp_enqueue_script( 'seopress-pro-rich-snippets-js', plugins_url('assets/js/seopress-pro-rich-snippets' . $prefix . '.js', dirname(dirname( __FILE__ ))), array('jquery', 'jquery-ui-tabs'), SEOPRESS_PRO_VERSION, false );
		wp_enqueue_media();
		wp_enqueue_script('jquery-ui-datepicker');

		if( apply_filters('seopress_get_pro_schemas_manual', true) ){
			$seopress_pro_rich_snippets_data = get_post_meta($post->ID, '_seopress_pro_schemas_manual', true);
		}
		else {
			$seopress_pro_rich_snippets_data = seopress_get_rich_snippets_fallback($post);
		}


		$seopress_pro_rich_snippets_type                                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_type']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_type'] : "";

		//Article
		$seopress_pro_rich_snippets_article_type                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_type']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_type'] : "";
		$seopress_pro_rich_snippets_article_title                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_title']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_title'] : "";
		$seopress_pro_rich_snippets_article_img                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_img'] : "";
		$seopress_pro_rich_snippets_article_img_width                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_img_width']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_img_width'] : "";
		$seopress_pro_rich_snippets_article_img_height                  = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_img_height']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_img_height'] : "";
		$seopress_pro_rich_snippets_article_coverage_start_date         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_start_date']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_start_date'] : "";
		$seopress_pro_rich_snippets_article_coverage_start_time         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_start_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_start_time'] : "";
		$seopress_pro_rich_snippets_article_coverage_end_date           = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_end_date']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_end_date'] : "";
		$seopress_pro_rich_snippets_article_coverage_end_time           = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_end_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_article_coverage_end_time'] : "";

		//Local Business
		$seopress_pro_rich_snippets_lb_name                             = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_name'] : "";
		$seopress_pro_rich_snippets_lb_type                             = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_type']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_type'] : "";
		$seopress_pro_rich_snippets_lb_cuisine                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_cuisine']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_cuisine'] : "";
		$seopress_pro_rich_snippets_lb_img                              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_img'] : "";
		$seopress_pro_rich_snippets_lb_img_width                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_img_width']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_img_width'] : "";
		$seopress_pro_rich_snippets_lb_img_height                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_img_height']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_img_height'] : "";
		$seopress_pro_rich_snippets_lb_street_addr                      = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_street_addr']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_street_addr'] : "";
		$seopress_pro_rich_snippets_lb_city                             = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_city']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_city'] : "";
		$seopress_pro_rich_snippets_lb_state                            = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_state']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_state'] : "";
		$seopress_pro_rich_snippets_lb_pc                               = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_pc']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_pc'] : "";
		$seopress_pro_rich_snippets_lb_country                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_country']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_country'] : "";
		$seopress_pro_rich_snippets_lb_lat                              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_lat']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_lat'] : "";
		$seopress_pro_rich_snippets_lb_lon                              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_lon']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_lon'] : "";
		$seopress_pro_rich_snippets_lb_website                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_website']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_website'] : "";
		$seopress_pro_rich_snippets_lb_tel                              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_tel']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_tel'] : "";
		$seopress_pro_rich_snippets_lb_price                            = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_price']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_price'] : "";

		$seopress_pro_rich_snippets_lb_opening_hours                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_opening_hours']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_lb_opening_hours'] : [];

		// SEOPress < 3.9
		if(apply_filters('seopress_get_pro_schemas_manual', true)){
			// Double dimension required as a result of migration 3.9
			$seopress_pro_rich_snippets_lb_opening_hours = ['0' => $seopress_pro_rich_snippets_lb_opening_hours];
		}


		//FAQ
		$seopress_pro_rich_snippets_faq                                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_faq']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_faq'] : [];

		// SEOPress < 3.9
		if(apply_filters('seopress_get_pro_schemas_manual', true)){
			// Double dimension required as a result of migration 3.9
			$seopress_pro_rich_snippets_faq = ['0' => $seopress_pro_rich_snippets_faq];
		}


		//Course
		$seopress_pro_rich_snippets_courses_title                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_title']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_title'] : "";
		$seopress_pro_rich_snippets_courses_desc                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_desc']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_desc'] : "";
		$seopress_pro_rich_snippets_courses_school                      = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_school']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_school'] : "";
		$seopress_pro_rich_snippets_courses_website                     = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_website']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_courses_website'] : "";

		//Recipe
		$seopress_pro_rich_snippets_recipes_name                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_name'] : "";
		$seopress_pro_rich_snippets_recipes_desc                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_desc']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_desc'] : "";
		$seopress_pro_rich_snippets_recipes_cat                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_cat']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_cat'] : "";
		$seopress_pro_rich_snippets_recipes_img                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_img'] : "";
		$seopress_pro_rich_snippets_recipes_prep_time                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_prep_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_prep_time'] : "";
		$seopress_pro_rich_snippets_recipes_cook_time                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_cook_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_cook_time'] : "";
		$seopress_pro_rich_snippets_recipes_calories                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_calories']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_calories'] : "";
		$seopress_pro_rich_snippets_recipes_yield                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_yield']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_yield'] : "";
		$seopress_pro_rich_snippets_recipes_keywords                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_keywords']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_keywords'] : "";
		$seopress_pro_rich_snippets_recipes_cuisine                     = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_cuisine']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_cuisine'] : "";
		$seopress_pro_rich_snippets_recipes_ingredient                  = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_ingredient']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_ingredient'] : "";
		$seopress_pro_rich_snippets_recipes_instructions                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_instructions']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_recipes_instructions'] : "";

		//Job
		$seopress_pro_rich_snippets_jobs_name                           = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_name'] : "";
		$seopress_pro_rich_snippets_jobs_desc                           = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_desc']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_desc'] : "";
		$seopress_pro_rich_snippets_jobs_date_posted                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_date_posted']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_date_posted'] : "";
		$seopress_pro_rich_snippets_jobs_valid_through                  = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_valid_through']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_valid_through'] : "";
		$seopress_pro_rich_snippets_jobs_employment_type                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_employment_type']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_employment_type'] : "";
		$seopress_pro_rich_snippets_jobs_identifier_name                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_identifier_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_identifier_name'] : "";
		$seopress_pro_rich_snippets_jobs_identifier_value               = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_identifier_value']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_identifier_value'] : "";
		$seopress_pro_rich_snippets_jobs_hiring_organization            = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_organization']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_organization'] : "";
		$seopress_pro_rich_snippets_jobs_hiring_same_as                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_same_as']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_same_as'] : "";
		$seopress_pro_rich_snippets_jobs_hiring_logo                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_logo']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_logo'] : "";
		$seopress_pro_rich_snippets_jobs_hiring_logo_width              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_logo_width']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_logo_width'] : "";
		$seopress_pro_rich_snippets_jobs_hiring_logo_height             = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_logo_height']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_hiring_logo_height'] : "";
		$seopress_pro_rich_snippets_jobs_address_street                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_address_street']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_address_street'] : "";
		$seopress_pro_rich_snippets_jobs_address_locality               = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_address_locality']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_address_locality'] : "";
		$seopress_pro_rich_snippets_jobs_address_region                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_address_region']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_address_region'] : "";
		$seopress_pro_rich_snippets_jobs_postal_code                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_postal_code']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_postal_code'] : "";
		$seopress_pro_rich_snippets_jobs_country                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_country']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_country'] : "";
		$seopress_pro_rich_snippets_jobs_remote                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_remote']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_remote'] : "";
		$seopress_pro_rich_snippets_jobs_salary                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_salary']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_salary'] : "";
		$seopress_pro_rich_snippets_jobs_salary_currency                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_salary_currency']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_salary_currency'] : "";
		$seopress_pro_rich_snippets_jobs_salary_unit                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_salary_unit']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_jobs_salary_unit'] : "";

		//Video
		$seopress_pro_rich_snippets_videos_name                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_name'] : "";
		$seopress_pro_rich_snippets_videos_description                  = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_description']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_description'] : "";
		$seopress_pro_rich_snippets_videos_img                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_img'] : "";
		$seopress_pro_rich_snippets_videos_img_width                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_img_width']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_img_width'] : "";
		$seopress_pro_rich_snippets_videos_img_height                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_img_height']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_img_height'] : "";
		$seopress_pro_rich_snippets_videos_duration                     = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_duration']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_duration'] : "";
		$seopress_pro_rich_snippets_videos_url                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_url']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_videos_url'] : "";

		//Events
		$seopress_pro_rich_snippets_events_type                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_type']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_type'] : "";
		$seopress_pro_rich_snippets_events_name                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_name'] : "";
		$seopress_pro_rich_snippets_events_desc                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_desc']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_desc'] : "";
		$seopress_pro_rich_snippets_events_img                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_img'] : "";
		$seopress_pro_rich_snippets_events_start_date                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_start_date']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_start_date'] : "";
		$seopress_pro_rich_snippets_events_start_time                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_start_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_start_time'] : "";
		$seopress_pro_rich_snippets_events_end_date                     = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_end_date']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_end_date'] : "";
		$seopress_pro_rich_snippets_events_end_time                     = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_end_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_end_time'] : "";
		$seopress_pro_rich_snippets_events_previous_start_date          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_previous_start_date']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_previous_start_date'] : "";
		$seopress_pro_rich_snippets_events_previous_start_time          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_previous_start_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_previous_start_time'] : "";
		$seopress_pro_rich_snippets_events_location_name                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_location_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_location_name'] : "";
		$seopress_pro_rich_snippets_events_location_url                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_location_url']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_location_url'] : "";
		$seopress_pro_rich_snippets_events_location_address             = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_location_address']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_location_address'] : "";
		$seopress_pro_rich_snippets_events_offers_name                  = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_name'] : "";
		$seopress_pro_rich_snippets_events_offers_cat                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_cat']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_cat'] : "";
		$seopress_pro_rich_snippets_events_offers_price                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_price']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_price'] : "";
		$seopress_pro_rich_snippets_events_offers_price_currency        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_price_currency']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_price_currency'] : "";
		$seopress_pro_rich_snippets_events_offers_availability          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_availability']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_availability'] : "";
		$seopress_pro_rich_snippets_events_offers_valid_from_date       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_valid_from_date']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_valid_from_date'] : "";
		$seopress_pro_rich_snippets_events_offers_valid_from_time       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_valid_from_time']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_valid_from_time'] : "";
		$seopress_pro_rich_snippets_events_offers_url                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_url']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_offers_url'] : "";
		$seopress_pro_rich_snippets_events_performer                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_performer']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_performer'] : "";
		$seopress_pro_rich_snippets_events_status                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_status']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_status'] : "";
		$seopress_pro_rich_snippets_events_attendance_mode              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_attendance_mode']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_events_attendance_mode'] : "";

		//Products
		$seopress_pro_rich_snippets_product_name                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_name'] : "";
		$seopress_pro_rich_snippets_product_description                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_description']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_description'] : "";
		$seopress_pro_rich_snippets_product_img                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_img'] : "";
		$seopress_pro_rich_snippets_product_price                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_price']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_price'] : "";
		$seopress_pro_rich_snippets_product_price_valid_date            = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_price_valid_date']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_price_valid_date'] : "";
		$seopress_pro_rich_snippets_product_sku                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_sku']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_sku'] : "";
		$seopress_pro_rich_snippets_product_brand                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_brand']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_brand'] : "";
		$seopress_pro_rich_snippets_product_global_ids                  = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_global_ids']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_global_ids'] : "";
		$seopress_pro_rich_snippets_product_global_ids_value            = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_global_ids_value']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_global_ids_value'] : "";
		$seopress_pro_rich_snippets_product_price_currency              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_price_currency']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_price_currency'] : "";
		$seopress_pro_rich_snippets_product_condition                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_condition']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_condition'] : "";
		$seopress_pro_rich_snippets_product_availability                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_availability']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_product_availability'] : "";

		//Software app
		$seopress_pro_rich_snippets_softwareapp_name                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_name'] : "";
		$seopress_pro_rich_snippets_softwareapp_os                      = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_os']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_os'] : "";
		$seopress_pro_rich_snippets_softwareapp_cat                     = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_cat']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_cat'] : "";
		$seopress_pro_rich_snippets_softwareapp_price                   = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_price']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_price'] : "";
		$seopress_pro_rich_snippets_softwareapp_currency                = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_currency']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_currency'] : "";
		$seopress_pro_rich_snippets_softwareapp_rating                  = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_rating']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_softwareapp_rating'] : "";

		//Services
		$seopress_pro_rich_snippets_service_name                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_name'] : "";
		$seopress_pro_rich_snippets_service_type                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_type']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_type'] : "";
		$seopress_pro_rich_snippets_service_description                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_description']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_description'] : "";
		$seopress_pro_rich_snippets_service_img                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_img'] : "";
		$seopress_pro_rich_snippets_service_area                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_area']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_area'] : "";
		$seopress_pro_rich_snippets_service_provider_name               = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_provider_name']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_provider_name'] : "";
		$seopress_pro_rich_snippets_service_lb_img                      = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_lb_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_lb_img'] : "";
		$seopress_pro_rich_snippets_service_provider_mobility           = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_provider_mobility']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_provider_mobility'] : "";
		$seopress_pro_rich_snippets_service_slogan                      = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_slogan']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_slogan'] : "";
		$seopress_pro_rich_snippets_service_street_addr                 = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_street_addr']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_street_addr'] : "";
		$seopress_pro_rich_snippets_service_city                        = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_city']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_city'] : "";
		$seopress_pro_rich_snippets_service_state                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_state']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_state'] : "";
		$seopress_pro_rich_snippets_service_pc                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_pc']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_pc'] : "";
		$seopress_pro_rich_snippets_service_country                     = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_country']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_country'] : "";
		$seopress_pro_rich_snippets_service_lat                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_lat']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_lat'] : "";
		$seopress_pro_rich_snippets_service_lon                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_lon']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_lon'] : "";
		$seopress_pro_rich_snippets_service_tel                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_tel']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_tel'] : "";
		$seopress_pro_rich_snippets_service_price                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_price']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_service_price'] : "";

		//Review
		$seopress_pro_rich_snippets_review_item                         = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_item']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_item'] : "";
		$seopress_pro_rich_snippets_review_item_type                    = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_item_type']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_item_type'] : "";
		$seopress_pro_rich_snippets_review_img                          = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_img']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_img'] : "";
		$seopress_pro_rich_snippets_review_rating                       = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_rating']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_review_rating'] : "";

		//Custom
		$seopress_pro_rich_snippets_custom                              = isset($seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_custom']) ? $seopress_pro_rich_snippets_data['_seopress_pro_rich_snippets_custom'] : "";

		$tab1 = '<li><a href="#seopress-schemas-tabs-2">'. __( 'Automatic', 'wp-seopress-pro' ) .'</a></li>';
		$tab2 = '<li><a href="#seopress-schemas-tabs-1">'. __( 'Manual', 'wp-seopress-pro' ) .'</a></li>';
		$tabs = $tab1.$tab2;
		if (function_exists('seopress_advanced_appearance_schema_default_tab_option') && seopress_advanced_appearance_schema_default_tab_option()) {
			if (seopress_advanced_appearance_schema_default_tab_option() =='manual') {
				$tabs = $tab2.$tab1;
			}
		}

	echo
	'<div id="seopress-schemas-tabs">
		<ul class="wrap-schemas-list">
			<li><a href="#seopress-schemas-tabs-1">'. __( 'Manual', 'wp-seopress-pro' ) .'</a></li>
			<li><a id="sp-automatic-tab" href="#seopress-schemas-tabs-2">'. __( 'Automatic', 'wp-seopress-pro' ) .'<span></span></a></li>
		</ul>

		<div id="seopress-schemas-tabs-1">
			<div class="box-left">
				<div class="wrap-rich-snippets-type">
					<label for="seopress_pro_rich_snippets_type_meta">'. __( 'Select your data type', 'wp-seopress-pro' ) .'</label>
					<select id="seopress_pro_rich_snippets_type" name="seopress_pro_rich_snippets_type">
						<option ' . selected( 'none', $seopress_pro_rich_snippets_type, false ) . ' value="none">'. __( 'None', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'articles', $seopress_pro_rich_snippets_type, false ) . ' value="articles">'. __( 'Article (WebPage)', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'localbusiness', $seopress_pro_rich_snippets_type, false ) . ' value="localbusiness">'. __( 'Local Business', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'faq', $seopress_pro_rich_snippets_type, false ) . ' value="faq">'. __( 'FAQ', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'courses', $seopress_pro_rich_snippets_type, false ) . ' value="courses">'. __( 'Course', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'recipes', $seopress_pro_rich_snippets_type, false ) . ' value="recipes">'. __( 'Recipe', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'jobs', $seopress_pro_rich_snippets_type, false ) . ' value="jobs">'. __( 'Job', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'videos', $seopress_pro_rich_snippets_type, false ) . ' value="videos">'. __( 'Video', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'events', $seopress_pro_rich_snippets_type, false ) . ' value="events">'. __( 'Event', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'products', $seopress_pro_rich_snippets_type, false ) . ' value="products">'. __( 'Product', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'services', $seopress_pro_rich_snippets_type, false ) . ' value="services">'. __( 'Service', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'softwareapp', $seopress_pro_rich_snippets_type, false ) . ' value="softwareapp">'. __( 'Software Application', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'review', $seopress_pro_rich_snippets_type, false ) . ' value="review">'. __( 'Review', 'wp-seopress-pro' ) .'</option>
						<option ' . selected( 'custom', $seopress_pro_rich_snippets_type, false ) . ' value="custom">'. __( 'Custom', 'wp-seopress-pro' ) .'</option>
					</select>';

				if (seopress_advanced_appearance_advice_schema_option() !='1') {
					echo '<ul class="advice seopress-list notice notice-info">
						<li class="warning"><span class="dashicons dashicons-warning"></span>'.__('WARNING','wp-seopress-pro').'</li>
						<li>'.__('Be sure to select the right structure data type for your content.','wp-seopress-pro').'</li>
						<li>'.__('When you choose one, fill all fields with the right format.','wp-seopress-pro').'</li>
						<li>'.__('Make sure you don\'t have already included structured data type with a theme or plugin (eg: the default WooCommerce Theme, Storefront, already implements this for single page products).','wp-seopress-pro').'</li>
						<li>'.__('You can test your page with Google Data Structure Test tool.','wp-seopress-pro').' <a href="https://search.google.com/test/rich-results" target="_blank">'.__('Make a test','wp-seopress-pro').'</a></li>';

						if (function_exists('seopress_get_locale') && seopress_get_locale() =='fr') {
							$seopress_docs_link['support']['schema'] = 'https://www.seopress.org/fr/blog/comment-utiliser-les-schemas-dans-votre-site-wordpress-avec-seopress-pro-1';
						} else {
							$seopress_docs_link['support']['schema'] = 'https://www.seopress.org/blog/how-to-add-schema-to-wordpress-with-seopress-1';
						}
						echo '<li>'.sprintf(__('If you need help with schema, <a href="%s">read our full tutorial</a>.','wp-seopress-pro'), $seopress_docs_link['support']['schema']).'</li>
					</ul>';
				}
				echo '</div>
				<div class="wrap-rich-snippets-articles">
					<p class="seopress-notice notice notice-info">
						'.__('Proper structured data in your news, blog, and sports article page can enhance your appearance in Google Search results.','wp-seopress-pro').'
					</p>';
				if (seopress_rich_snippets_publisher_logo_option() !='') {
					echo '<p class="seopress-notice notice-info"><span class="dashicons dashicons-yes"></span>'.__('You have set a publisher logo. Good!','wp-seopress-pro').'</p>';
				} else {
					echo '<p class="seopress-notice notice-error"><span class="dashicons dashicons-no-alt"></span>';
					echo sprintf(__('You don\'t have set a <a href="%s">publisher logo</a>. It\'s required for Article content types.','wp-seopress-pro'), admin_url('admin.php?page=seopress-pro-page#tab=tab_seopress_rich_snippets'));
					echo '</p>';
				}

				echo'
					<p>
						<label for="seopress_pro_rich_snippets_article_type_meta">'. __( 'Select your article type', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_article_type_meta" name="seopress_pro_rich_snippets_article_type">
							<option ' . selected( 'Article', $seopress_pro_rich_snippets_article_type, false ) . ' value="Article">'. __( 'Article (generic)', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'AdvertiserContentArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="AdvertiserContentArticle">'. __( 'Advertiser Content Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'NewsArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="NewsArticle">'. __( 'News Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Report', $seopress_pro_rich_snippets_article_type, false ) . ' value="Report">'. __( 'Report', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SatiricalArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="SatiricalArticle">'. __( 'Satirical Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ScholarlyArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="ScholarlyArticle">'. __( 'Scholarly Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SocialMediaPosting', $seopress_pro_rich_snippets_article_type, false ) . ' value="SocialMediaPosting">'. __( 'Social Media Posting', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BlogPosting', $seopress_pro_rich_snippets_article_type, false ) . ' value="BlogPosting">'. __( 'Blog Posting', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'TechArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="TechArticle">'. __( 'Tech Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'AnalysisNewsArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="AnalysisNewsArticle">'. __( 'Analysis News Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'AskPublicNewsArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="AskPublicNewsArticle">'. __( 'Ask Public News Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BackgroundNewsArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="BackgroundNewsArticle">'. __( 'Background News Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'OpinionNewsArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="OpinionNewsArticle">'. __( 'Opinion News Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ReportageNewsArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="ReportageNewsArticle">'. __( 'Reportage News Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ReviewNewsArticle', $seopress_pro_rich_snippets_article_type, false ) . ' value="ReviewNewsArticle">'. __( 'Review News Article', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'LiveBlogPosting', $seopress_pro_rich_snippets_article_type, false ) . ' value="LiveBlogPosting">'. __( 'Live Blog Posting', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p style="margin-bottom:0">
						<label for="seopress_pro_rich_snippets_article_title_meta">
							'. __( 'Headline <em>(max limit: 110)</em>', 'wp-seopress-pro' ) .'</label>
							'.__('Default value if empty: Post title','wp-seopress-pro').'
						<input type="text" id="seopress_pro_rich_snippets_article_title_meta" name="seopress_pro_rich_snippets_article_title" placeholder="'.esc_html__('The headline of the article','wp-seopress-pro').'" aria-label="'.__('Headline <em>(max limit: 110)</em>','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_article_title.'" />
						<div class="wrap-seopress-counters">
							<div id="seopress_rich_snippets_articles_counters"></div>
							'.__(' (maximum limit)','wp-seopress-pro').'
						</div>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_article_img_meta">'. __( 'Image', 'wp-seopress-pro' ) .'</label>
						'.__('The representative image of the article. Only a marked-up image that directly belongs to the article should be specified. ','wp-seopress-pro').'<br>
						'.__('Default value if empty: Post thumbnail (featured image)','wp-seopress-pro').'
						<span class="advise">'. __('Minimum size: 696px wide, JPG, PNG or GIF, crawlable and indexable (default: post thumbnail if available)', 'wp-seopress-pro') .'</span>
						<input id="seopress_pro_rich_snippets_article_img_meta" type="text" name="seopress_pro_rich_snippets_article_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Image','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_article_img.'" />
						<input id="seopress_pro_rich_snippets_article_img_width" type="hidden" name="seopress_pro_rich_snippets_article_img_width" value="'.$seopress_pro_rich_snippets_article_img_width.'" />
						<input id="seopress_pro_rich_snippets_article_img_height" type="hidden" name="seopress_pro_rich_snippets_article_img_height" value="'.$seopress_pro_rich_snippets_article_img_height.'" />
						<input id="seopress_pro_rich_snippets_article_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress-date-picker8">
							'. __( 'Coverage Start Date', 'wp-seopress-pro' ) .'</label>
						<span class="description">'.__('To use with Live Blog Posting article type','wp-seopress-pro').'</span>
						<input type="text" id="seopress-date-picker8" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_article_coverage_start_date" placeholder="'.esc_html__('The beginning of live coverage. For example, "2017-01-24T19:33:17+00:00".','wp-seopress-pro').'" aria-label="'.__('Coverage Start Date','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_article_coverage_start_date.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_article_coverage_start_time_meta">
							'. __( 'Coverage Start Time', 'wp-seopress-pro' ) .'</label>
						<span class="description">'.__('To use with Live Blog Posting article type','wp-seopress-pro').'</span>
						<input type="text" id="seopress_pro_rich_snippets_article_coverage_start_time_meta" name="seopress_pro_rich_snippets_article_coverage_start_time" placeholder="'.esc_html__('Eg: HH:MM','wp-seopress-pro').'" aria-label="'.__('Coverage Start Time','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_article_coverage_start_time.'" />
					</p>
					<p>
						<label for="seopress-date-picker9">
							'. __( 'Coverage End Date', 'wp-seopress-pro' ) .'</label>
						<span class="description">'.__('To use with Live Blog Posting article type','wp-seopress-pro').'</span>
						<input type="text" id="seopress-date-picker9" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_article_coverage_end_date" placeholder="'.esc_html__('The end of live coverage. For example, "2017-01-24T19:33:17+00:00".','wp-seopress-pro').'" aria-label="'.__('Coverage End Date','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_article_coverage_end_date.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_article_coverage_end_time_meta">
							'. __( 'Coverage End Time', 'wp-seopress-pro' ) .'</label>
						<span class="description">'.__('To use with Live Blog Posting article type','wp-seopress-pro').'</span>
						<input type="text" id="seopress_pro_rich_snippets_article_coverage_end_time_meta" name="seopress_pro_rich_snippets_article_coverage_end_time" placeholder="'.esc_html__('Eg: HH:MM','wp-seopress-pro').'" aria-label="'.__('Coverage End Time','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_article_coverage_end_time.'" />
					</p>
				</div>
				<div class="wrap-rich-snippets-local-business">
					<p class="seopress-notice notice notice-info">
						'.__('When users search for businesses on Google Search or Maps, Search results may display a prominent Knowledge Graph card with details about a business that matched the query. ','wp-seopress-pro').'
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_name_meta">
							'. __( 'Name of your business', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_name_meta" name="seopress_pro_rich_snippets_lb_name" placeholder="'.esc_html__('eg: Miremont','wp-seopress-pro').'" aria-label="'.__('Name of your business','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_type_meta">'. __( 'Select a business type', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_lb_type_meta" name="seopress_pro_rich_snippets_lb_type">';

						$seopress_lb_types = [
							'LocalBusiness'						=> __( 'Local Business (default)', 'wp-seopress-pro' ),
							'AnimalShelter'						=> __( 'Animal Shelter', 'wp-seopress-pro' ),
							'AutomotiveBusiness'				=> __( 'Automotive Business', 'wp-seopress-pro' ),
							'AutoBodyShop'						=> __( '|-Auto Body Shop', 'wp-seopress-pro' ),
							'AutoDealer'						=> __( '|-Auto Dealer', 'wp-seopress-pro' ),
							'AutoPartsStore'					=> __( '|-Auto Parts Store', 'wp-seopress-pro' ),
							'AutoRental'						=> __( '|-Auto Rental', 'wp-seopress-pro' ),
							'AutoRepair'						=> __( '|-Auto Repair', 'wp-seopress-pro' ),
							'Auto Wash'							=> __( '|-AutoWash', 'wp-seopress-pro' ),
							'GasStation'						=> __( '|-Gas Station', 'wp-seopress-pro' ),
							'MotorcycleDealer'					=> __( '|-Motorcycle Dealer', 'wp-seopress-pro' ),
							'MotorcycleRepair'					=> __( '|-Motorcycle Repair', 'wp-seopress-pro' ),
							'ChildCare'							=> __( 'Child Care', 'wp-seopress-pro' ),
							'Dentist'							=> __( 'Dentist', 'wp-seopress-pro' ),
							'DryCleaningOrLaundry'				=> __( 'Dry Cleaning Or Laundry', 'wp-seopress-pro' ),
							'EmergencyService'					=> __( 'Emergency Service', 'wp-seopress-pro' ),
							'FireStation'						=> __( '|-Fire Station', 'wp-seopress-pro' ),
							'Hospital'							=> __( '|-Hospital', 'wp-seopress-pro' ),
							'PoliceStation'						=> __( '|-Police Station', 'wp-seopress-pro' ),
							'EmploymentAgency'					=> __( 'Employment Agency', 'wp-seopress-pro' ),
							'EntertainmentBusiness'				=> __( 'Entertainment Business', 'wp-seopress-pro' ),
							'AdultEntertainment'				=> __( '|-Adult Entertainment', 'wp-seopress-pro' ),
							'AmusementPark'						=> __( '|-Amusement Park', 'wp-seopress-pro' ),
							'ArtGallery'						=> __( '|-Art Gallery', 'wp-seopress-pro' ),
							'Casino'							=> __( '|-Casino', 'wp-seopress-pro' ),
							'ComedyClub'						=> __( '|-Comedy Club', 'wp-seopress-pro' ),
							'MovieTheater'						=> __( '|-Movie Theater', 'wp-seopress-pro' ),
							'NightClub'							=> __( '|-Night Club', 'wp-seopress-pro' ),
							'FinancialService'					=> __( 'Financial Service', 'wp-seopress-pro' ),
							'AccountingService'					=> __( '|-Accounting Service', 'wp-seopress-pro' ),
							'AutomatedTeller'					=> __( '|-Automated Teller', 'wp-seopress-pro' ),
							'BankOrCreditUnion'					=> __( '|-Bank Or Credit Union', 'wp-seopress-pro' ),
							'InsuranceAgency'					=> __( '|-Insurance Agency', 'wp-seopress-pro' ),
							'FoodEstablishment'					=> __( 'Food Establishment', 'wp-seopress-pro' ),
							'Bakery'							=> __( '|-Bakery', 'wp-seopress-pro' ),
							'BarOrPub'							=> __( '|-Bar Or Pub', 'wp-seopress-pro' ),
							'Brewery'							=> __( '|-Brewery', 'wp-seopress-pro' ),
							'CafeOrCoffeeShop' 					=> __( '|-Cafe Or Coffee Shop', 'wp-seopress-pro' ),
							'FastFoodRestaurant' 				=> __( '|-Fast Food Restaurant', 'wp-seopress-pro' ),
							'IceCreamShop' 						=> __( '|-Ice Cream Shop', 'wp-seopress-pro' ),
							'Restaurant' 						=> __( '|-Restaurant', 'wp-seopress-pro' ),
							'Winery' 							=> __( '|-Winery', 'wp-seopress-pro' ),
							'GovernmentOffice' 					=> __( 'Government Office', 'wp-seopress-pro' ),
							'PostOffice' 						=> __( '|-PostOffice', 'wp-seopress-pro' ),
							'HealthAndBeautyBusiness' 			=> __( 'Health And Beauty Business', 'wp-seopress-pro' ),
							'BeautySalon' 						=> __( '|-Beauty Salon', 'wp-seopress-pro' ),
							'DaySpa'							=> __( '|-Day Spa', 'wp-seopress-pro' ),
							'HairSalon'							=> __( '|-Hair Salon', 'wp-seopress-pro' ),
							'HealthClub'						=> __( '|-Health Club', 'wp-seopress-pro' ),
							'NailSalon'							=> __( '|-Nail Salon', 'wp-seopress-pro' ),
							'TattooParlor'						=> __( '|-Tattoo Parlor', 'wp-seopress-pro' ),
							'HomeAndConstructionBusiness'		=> __( 'Home And Construction Business', 'wp-seopress-pro' ),
							'Electrician'						=> __( '|-Electrician', 'wp-seopress-pro' ),
							'HVACBusiness'						=> __( '|-HVAC Business', 'wp-seopress-pro' ),
							'HousePainter'						=> __( '|-House Painter', 'wp-seopress-pro' ),
							'Locksmith'							=> __( '|-Locksmith', 'wp-seopress-pro' ),
							'MovingCompany'						=> __( '|-Moving Company', 'wp-seopress-pro' ),
							'Plumber'							=> __( '|-Plumber', 'wp-seopress-pro' ),
							'RoofingContractor'					=> __( '|-Roofing Contractor', 'wp-seopress-pro' ),
							'InternetCafe'						=> __( 'Internet Cafe', 'wp-seopress-pro' ),
							'MedicalBusiness'					=> __( 'Medical Business', 'wp-seopress-pro' ),
							'CommunityHealth'					=> __( '|-Community Health', 'wp-seopress-pro' ),
							'Dentist'							=> __( '|-Dentist', 'wp-seopress-pro' ),
							'Dermatology'						=> __( '|-Dermatology', 'wp-seopress-pro' ),
							'DietNutrition'						=> __( '|-Diet Nutrition', 'wp-seopress-pro' ),
							'Emergency'							=> __( '|-Emergency', 'wp-seopress-pro' ),
							'Gynecologic'						=> __( '|-Gynecologic', 'wp-seopress-pro' ),
							'MedicalClinic'						=> __( '|-Medical Clinic', 'wp-seopress-pro' ),
							'Midwifery'							=> __( '|-Midwifery', 'wp-seopress-pro' ),
							'Nursing'							=> __( '|-Nursing', 'wp-seopress-pro' ),
							'Obstetric'							=> __( '|-Obstetric', 'wp-seopress-pro' ),
							'Oncologic'							=> __( '|-Oncologic', 'wp-seopress-pro' ),
							'Optician'							=> __( '|-Optician', 'wp-seopress-pro' ),
							'Optometric'						=> __( '|-Optometric', 'wp-seopress-pro' ),
							'Otolaryngologic'					=> __( '|-Otolaryngologic', 'wp-seopress-pro' ),
							'Pediatric'							=> __( '|-Pediatric', 'wp-seopress-pro' ),
							'Pharmacy'							=> __( '|-Pharmacy', 'wp-seopress-pro' ),
							'Physician'							=> __( '|-Physician', 'wp-seopress-pro' ),
							'Physiotherapy'						=> __( '|-Physiotherapy', 'wp-seopress-pro' ),
							'PlasticSurgery'					=> __( '|-Plastic Surgery', 'wp-seopress-pro' ),
							'Podiatric'							=> __( '|-Podiatric', 'wp-seopress-pro' ),
							'PrimaryCare'						=> __( '|-Primary Care', 'wp-seopress-pro' ),
							'Psychiatric'						=> __( '|-Psychiatric', 'wp-seopress-pro' ),
							'PublicHealth'						=> __( '|-Public Health', 'wp-seopress-pro' ),
							'LegalService'						=> __( 'Legal Service', 'wp-seopress-pro' ),
							'Attorney'							=> __( '|-Attorney', 'wp-seopress-pro' ),
							'Notary'							=> __( '|-Notary', 'wp-seopress-pro' ),
							'Library'							=> __( 'Library', 'wp-seopress-pro' ),
							'LodgingBusiness'					=> __( 'Lodging Business', 'wp-seopress-pro' ),
							'BedAndBreakfast'					=> __( '|-Bed And Breakfast', 'wp-seopress-pro' ),
							'Campground'						=> __( '|-Campground', 'wp-seopress-pro' ),
							'Hostel'							=> __( '|-Hostel', 'wp-seopress-pro' ),
							'Hotel'								=> __( '|-Hotel', 'wp-seopress-pro' ),
							'Motel'								=> __( '|-Motel', 'wp-seopress-pro' ),
							'Resort'							=> __( '|-Resort', 'wp-seopress-pro' ),
							'ProfessionalService'				=> __( 'Professional Service', 'wp-seopress-pro' ),
							'RadioStation'						=> __( 'Radio Station', 'wp-seopress-pro' ),
							'RealEstateAgent'					=> __( 'Real Estate Agent', 'wp-seopress-pro' ),
							'RecyclingCenter'					=> __( 'Recycling Center', 'wp-seopress-pro' ),
							'SelfStorage'						=> __( 'Real Self Storage', 'wp-seopress-pro' ),
							'ShoppingCenter'					=> __( 'Shopping Center', 'wp-seopress-pro' ),
							'SportsActivityLocation'			=> __( 'Sports Activity Location', 'wp-seopress-pro' ),
							'BowlingAlley'						=> __( '|-Bowling Alley', 'wp-seopress-pro' ),
							'ExerciseGym'						=> __( '|-Exercise Gym', 'wp-seopress-pro' ),
							'GolfCourse'						=> __( '|-Golf Course', 'wp-seopress-pro' ),
							'HealthClub'						=> __( '|-Health Club', 'wp-seopress-pro' ),
							'PublicSwimmingPool'				=> __( '|-Public Swimming Pool', 'wp-seopress-pro' ),
							'SkiResort'							=> __( '|-Ski Resort', 'wp-seopress-pro' ),
							'SportsClub'						=> __( '|-Sports Club', 'wp-seopress-pro' ),
							'StadiumOrArena'					=> __( '|-Stadium Or Arena', 'wp-seopress-pro' ),
							'TennisComplex'						=> __( '|-Tennis Complex', 'wp-seopress-pro' ),
							'Store'								=> __( 'Store', 'wp-seopress-pro' ),
							'AutoPartsStore'					=> __( '|-Auto Parts Store', 'wp-seopress-pro' ),
							'BikeStore'							=> __( '|-Bike Store', 'wp-seopress-pro' ),
							'BookStore'							=> __( '|-Book Store', 'wp-seopress-pro' ),
							'ClothingStore'						=> __( '|-Clothing Store', 'wp-seopress-pro' ),
							'ComputerStore'						=> __( '|-Computer Store', 'wp-seopress-pro' ),
							'ConvenienceStore'					=> __( '|-Convenience Store', 'wp-seopress-pro' ),
							'DepartmentStore'					=> __( '|-Department Store', 'wp-seopress-pro' ),
							'ElectronicsStore'					=> __( '|-Electronics Store', 'wp-seopress-pro' ),
							'Florist'							=> __( '|-Florist', 'wp-seopress-pro' ),
							'FurnitureStore'					=> __( '|-Furniture Store', 'wp-seopress-pro' ),
							'GardenStore'						=> __( '|-Garden Store', 'wp-seopress-pro' ),
							'GroceryStore'						=> __( '|-Grocery Store', 'wp-seopress-pro' ),
							'HardwareStore'						=> __( '|-Hardware Store', 'wp-seopress-pro' ),
							'HobbyShop'							=> __( '|-Hobby Shop', 'wp-seopress-pro' ),
							'HomeGoodsStore'					=> __( '|-Home Goods Store', 'wp-seopress-pro' ),
							'JewelryStore'						=> __( '|-Jewelry Store', 'wp-seopress-pro' ),
							'LiquorStore'						=> __( '|-Liquor Store', 'wp-seopress-pro' ),
							'MensClothingStore'					=> __( '|-Mens Clothing Store', 'wp-seopress-pro' ),
							'MobilePhoneStore'					=> __( '|-Mobile Phone Store', 'wp-seopress-pro' ),
							'MovieRentalStore'					=> __( '|-Movie Rental Store', 'wp-seopress-pro' ),
							'MusicStore'						=> __( '|-Music Store', 'wp-seopress-pro' ),
							'OfficeEquipmentStore'				=> __( '|-Office Equipment Store', 'wp-seopress-pro' ),
							'OutletStore'						=> __( '|-Outlet Store', 'wp-seopress-pro' ),
							'PawnShop'							=> __( '|-Pawn Shop', 'wp-seopress-pro' ),
							'PetStore'							=> __( '|-Pet Store', 'wp-seopress-pro' ),
							'ShoeStore'							=> __( '|-Shoe Store', 'wp-seopress-pro' ),
							'SportingGoodsStore'				=> __( '|-Sporting Goods Store', 'wp-seopress-pro' ),
							'TireShop'							=> __( '|-Tire Shop', 'wp-seopress-pro' ),
							'ToyStore'							=> __( '|-Toy Store', 'wp-seopress-pro' ),
							'WholesaleStore'					=> __( '|-Wholesale Store', 'wp-seopress-pro' ),
							'TelevisionStation'					=> __( '|-Wholesale Store', 'wp-seopress-pro' ),
							'TouristInformationCenter'			=> __( 'Tourist Information Center', 'wp-seopress-pro' ),
							'TravelAgency'						=> __( 'Travel Agency', 'wp-seopress-pro' ),
						];

						foreach ($seopress_lb_types as $type_value => $type_i18n) {
							echo '<option ' . selected( $type_value, $seopress_pro_rich_snippets_lb_type, false ) . ' value="'.$type_value.'">'. __( $type_i18n, 'wp-seopress-pro' ) .'</option>';
						}
				echo '</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_img_meta">'. __( 'Image', 'wp-seopress-pro' ) .'</label>
						<p>'.__('An image of the business.','wp-seopress-pro').'</p>
						<span class="advise">'. __('Every page must contain at least one image (whether or not you include markup). Google will pick the best image to display in Search results based on the aspect ratio and resolution.<br>
Image URLs must be crawlable and indexable.<br>
Images must represent the marked up content.<br>
Images must be in .jpg, .png, or. gif format.<br>
For best results, provide multiple high-resolution images (minimum of 50K pixels when multiplying width and height) with the following aspect ratios: 16x9, 4x3, and 1x1.', 'wp-seopress-pro') .'</span>
						<input id="seopress_pro_rich_snippets_lb_img_meta" type="text" name="seopress_pro_rich_snippets_lb_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Image','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_img.'" />
						<input id="seopress_pro_rich_snippets_lb_img_width" type="hidden" name="seopress_pro_rich_snippets_lb_img_width" value="'.$seopress_pro_rich_snippets_lb_img_width.'" />
						<input id="seopress_pro_rich_snippets_lb_img_height" type="hidden" name="seopress_pro_rich_snippets_lb_img_height" value="'.$seopress_pro_rich_snippets_lb_img_height.'" />
						<input id="seopress_pro_rich_snippets_lb_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_street_addr_meta">
							'. __( 'Street Address', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_street_addr_meta" name="seopress_pro_rich_snippets_lb_street_addr" placeholder="'.esc_html__('eg: Place Bellevue','wp-seopress-pro').'" aria-label="'.__('Street Address','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_street_addr.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_city_meta">
							'. __( 'City', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_city_meta" name="seopress_pro_rich_snippets_lb_city" placeholder="'.esc_html__('eg: Biarritz','wp-seopress-pro').'" aria-label="'.__('City','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_city.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_state_meta">
							'. __( 'State', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_state_meta" name="seopress_pro_rich_snippets_lb_state" placeholder="'.esc_html__('eg: Pyrenees Atlantiques','wp-seopress-pro').'" aria-label="'.__('State','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_state.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_pc_meta">
							'. __( 'Postal code', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_pc_meta" name="seopress_pro_rich_snippets_lb_pc" placeholder="'.esc_html__('eg: 64200','wp-seopress-pro').'" aria-label="'.__('Postal code','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_pc.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_country_meta">
							'. __( 'Country', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_country_meta" name="seopress_pro_rich_snippets_lb_country" placeholder="'.esc_html__('eg: France','wp-seopress-pro').'" aria-label="'.__('Country','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_country.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_lat_meta">
							'. __( 'Latitude', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_lat_meta" name="seopress_pro_rich_snippets_lb_lat" placeholder="'.esc_html__('eg: 43.4831389','wp-seopress-pro').'" aria-label="'.__('Latitude','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_lat.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_lon_meta">
							'. __( 'Longitude', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_lon_meta" name="seopress_pro_rich_snippets_lb_lon" placeholder="'.esc_html__('eg: -1.5630987','wp-seopress-pro').'" aria-label="'.__('Longitude','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_lon.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_website_meta">
							'. __( 'URL', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_website_meta" name="seopress_pro_rich_snippets_lb_website" placeholder="'.get_home_url().'" aria-label="'.__('URL','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_website.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_tel_meta">
							'. __( 'Telephone', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_tel_meta" name="seopress_pro_rich_snippets_lb_tel" placeholder="'.esc_html__('eg: +33559240138','wp-seopress-pro').'" aria-label="'.__('Telephone','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_tel.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_price_meta">
							'. __( 'Price range', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_price_meta" name="seopress_pro_rich_snippets_lb_price" placeholder="'.esc_html__('eg: $$, €€€, or ££££...','wp-seopress-pro').'" aria-label="'.__('Price','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_price.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_cuisine_meta">
							'. __( 'Cuisine served', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_lb_cuisine_meta" name="seopress_pro_rich_snippets_lb_cuisine" placeholder="'.esc_html__('eg: French, Italian, Indian, American','wp-seopress-pro').'" aria-label="'.__('The type of cuisine the restaurant serves.','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_lb_cuisine.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_lb_opening_hours_meta">
							'. __( 'Opening hours', 'wp-seopress-pro' ) .'</label>
					</p>';

					$options = $seopress_pro_rich_snippets_lb_opening_hours;

					$days = array(__('Monday','wp-seopress-pro'), __('Tuesday','wp-seopress-pro'), __('Wednesday','wp-seopress-pro'), __('Thursday','wp-seopress-pro'), __('Friday','wp-seopress-pro'), __('Saturday','wp-seopress-pro'), __('Sunday','wp-seopress-pro') );

					$hours = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23');

					$mins = array('00', '15', '30', '45', '59');

					echo '<ul class="wrap-opening-hours">';

					foreach ($days as $key => $day) {

						$check_day = isset($options[0]['seopress_local_business_opening_hours'][$key]['open']);

						$check_day_am = isset($options[0]['seopress_local_business_opening_hours'][$key]['am']['open']);

						$check_day_pm = isset($options[0]['seopress_local_business_opening_hours'][$key]['pm']['open']);

						$selected_start_hours = isset($options[0]['seopress_local_business_opening_hours'][$key]['am']['start']['hours']) ? $options[0]['seopress_local_business_opening_hours'][$key]['am']['start']['hours'] : NULL;

						$selected_start_mins = isset($options[0]['seopress_local_business_opening_hours'][$key]['am']['start']['mins']) ? $options[0]['seopress_local_business_opening_hours'][$key]['am']['start']['mins'] : NULL;

						echo '<li>';

							echo '<span class="day"><strong>'.$day.'</strong></span>';

							echo '<ul>';
								 //Closed?
								echo '<li>';

									echo '<input id="seopress_local_business_opening_hours['.$key.'][open]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][open]" type="checkbox"';
										if ('1' == $check_day) echo 'checked="yes"';
										echo ' value="1"/>';

									echo '<label for="seopress_local_business_opening_hours['.$key.'][open]">'. __( 'Closed all the day?', 'wp-seopress-pro' ) .'</label> ';

									if (isset($options['seopress_local_business_opening_hours'][$key]['open'])) {
										esc_attr($options['seopress_local_business_opening_hours'][$key]['open']);
									}
								echo '</li>';

								//AM
								echo '<li>';
									echo '<input id="seopress_local_business_opening_hours['.$key.'][am][open]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][am][open]" type="checkbox"';
										if ('1' == $check_day_am) echo 'checked="yes"';
										echo ' value="1"/>';

									echo '<label for="seopress_local_business_opening_hours['.$key.'][am][open]">'. __( 'Open in the morning?', 'wp-seopress-pro' ) .'</label> ';

									if (isset($options['seopress_local_business_opening_hours'][$key]['am']['open'])) {
										esc_attr($options['seopress_local_business_opening_hours'][$key]['am']['open']);
									}

									echo '<select id="seopress_local_business_opening_hours['.$key.'][am][start][hours]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][am][start][hours]">';

										foreach ($hours as $hour) {
											echo '<option ';
											if ($hour == $selected_start_hours) echo 'selected="selected"';
											echo ' value="'.$hour.'">'. $hour .'</option>';
										}

									echo '</select>';

									echo ' : ';

									echo '<select id="seopress_local_business_opening_hours['.$key.'][am][start][mins]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][am][start][mins]">';

										foreach ($mins as $min) {
											echo '<option ';
											if ($min == $selected_start_mins) echo 'selected="selected"';
											echo ' value="'.$min.'">'. $min .'</option>';
										}

									echo '</select>';

									if (isset($options['seopress_local_business_opening_hours'][$key]['am']['start']['hours'])) {
										esc_attr( $options['seopress_local_business_opening_hours'][$key]['am']['start']['hours']);
									}

									if (isset($options['seopress_local_business_opening_hours'][$key]['am']['start']['mins'])) {
										esc_attr( $options['seopress_local_business_opening_hours'][$key]['am']['start']['mins']);
									}

									echo ' - ';

									$selected_end_hours = isset($options[0]['seopress_local_business_opening_hours'][$key]['am']['end']['hours']) ? $options[0]['seopress_local_business_opening_hours'][$key]['am']['end']['hours'] : NULL;

									$selected_end_mins = isset($options[0]['seopress_local_business_opening_hours'][$key]['am']['end']['mins']) ? $options[0]['seopress_local_business_opening_hours'][$key]['am']['end']['mins'] : NULL;

									echo '<select id="seopress_local_business_opening_hours['.$key.'][am][end][hours]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][am][end][hours]">';

										foreach ($hours as $hour) {
											echo '<option ';
											if ($hour == $selected_end_hours) echo 'selected="selected"';
											echo ' value="'.$hour.'">'. $hour .'</option>';
										}

									echo '</select>';

									echo ' : ';

									echo '<select id="seopress_local_business_opening_hours['.$key.'][am][end][mins]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][am][end][mins]">';

										foreach ($mins as $min) {
											echo '<option ';
											if ($min == $selected_end_mins) echo 'selected="selected"';
											echo ' value="'.$min.'">'. $min .'</option>';
										}

									echo '</select>';
								echo '</li>';

								//PM
								echo '<li>';
									$selected_start_hours2 = isset($options[0]['seopress_local_business_opening_hours'][$key]['pm']['start']['hours']) ? $options[0]['seopress_local_business_opening_hours'][$key]['pm']['start']['hours'] : NULL;

									$selected_start_mins2 = isset($options[0]['seopress_local_business_opening_hours'][$key]['pm']['start']['mins']) ? $options[0]['seopress_local_business_opening_hours'][$key]['pm']['start']['mins'] : NULL;

									echo '<input id="seopress_local_business_opening_hours['.$key.'][pm][open]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][pm][open]" type="checkbox"';
										if ('1' == $check_day_pm) echo 'checked="yes"';
										echo ' value="1"/>';

									echo '<label for="seopress_local_business_opening_hours['.$key.'][pm][open]">'. __( 'Open in the afternoon?', 'wp-seopress-pro' ) .'</label> ';

									if (isset($options['seopress_local_business_opening_hours'][$key]['pm']['open'])) {
										esc_attr($options['seopress_local_business_opening_hours'][$key]['pm']['open']);
									}

									echo '<select id="seopress_local_business_opening_hours['.$key.'][pm][start][hours]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][pm][start][hours]">';

										foreach ($hours as $hour) {
											echo '<option ';
											if ($hour == $selected_start_hours2) echo 'selected="selected"';
											echo ' value="'.$hour.'">'. $hour .'</option>';
										}

									echo '</select>';

									echo ' : ';

									echo '<select id="seopress_local_business_opening_hours['.$key.'][pm][start][mins]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][pm][start][mins]">';

										foreach ($mins as $min) {
											echo '<option ';
											if ($min == $selected_start_mins2) echo 'selected="selected"';
											echo ' value="'.$min.'">'. $min .'</option>';
										}

									echo '</select>';

									if (isset($options['seopress_local_business_opening_hours'][$key]['pm']['start']['hours'])) {
										esc_attr( $options['seopress_local_business_opening_hours'][$key]['pm']['start']['hours']);
									}

									if (isset($options['seopress_local_business_opening_hours'][$key]['pm']['start']['mins'])) {
										esc_attr( $options['seopress_local_business_opening_hours'][$key]['pm']['start']['mins']);
									}

									echo ' - ';

									$selected_end_hours2 = isset($options[0]['seopress_local_business_opening_hours'][$key]['pm']['end']['hours']) ? $options[0]['seopress_local_business_opening_hours'][$key]['pm']['end']['hours'] : NULL;

									$selected_end_mins2 = isset($options[0]['seopress_local_business_opening_hours'][$key]['pm']['end']['mins']) ? $options[0]['seopress_local_business_opening_hours'][$key]['pm']['end']['mins'] : NULL;

									echo '<select id="seopress_local_business_opening_hours['.$key.'][pm][end][hours]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][pm][end][hours]">';

										foreach ($hours as $hour) {
											echo '<option ';
											if ($hour == $selected_end_hours2) echo 'selected="selected"';
											echo ' value="'.$hour.'">'. $hour .'</option>';
										}

									echo '</select>';

									echo ' : ';

									echo '<select id="seopress_local_business_opening_hours['.$key.'][pm][end][mins]" name="seopress_pro_rich_snippets_lb_opening_hours[seopress_local_business_opening_hours]['.$key.'][pm][end][mins]">';

										foreach ($mins as $min) {
											echo '<option ';
											if ($min == $selected_end_mins2) echo 'selected="selected"';
											echo ' value="'.$min.'">'. $min .'</option>';
										}

									echo '</select>';

								echo '</li>';
							echo '</ul>';

						if (isset($options['seopress_local_business_opening_hours'][$key]['pm']['end']['hours'])) {
							esc_attr( $options['seopress_local_business_opening_hours'][$key]['pm']['end']['hours']);
						}

						if (isset($options['seopress_local_business_opening_hours'][$key]['pm']['end']['mins'])) {
							esc_attr( $options['seopress_local_business_opening_hours'][$key]['pm']['end']['mins']);
						}

						$seopress_pro_rich_snippets_lb_opening_hours = $options;
					}

					echo '</ul>
				</div>
				<div class="wrap-rich-snippets-faq">
					<p class="seopress-notice notice notice-info">
						'.__('Mark up your Frequently Asked Questions page with JSON-LD to try to get the position 0 in search results. ','wp-seopress-pro').'
					</p>';

					//Init $seopress_faq array if empty
					if (empty($seopress_pro_rich_snippets_faq)) {
						$seopress_pro_rich_snippets_faq = array('0' => array(''));
					}

					$total = count($seopress_pro_rich_snippets_faq[0]);

					if($total > 0):
						echo '<div id="wrap-faq" data-count="'.$total.'">';
							foreach ($seopress_pro_rich_snippets_faq[0] as $key => $value) {
								$num = $key + 1;
								$check_question = isset($seopress_pro_rich_snippets_faq[0][$key]["question"]) ? esc_attr($seopress_pro_rich_snippets_faq[0][$key]["question"]) : NULL;
								$check_answer = isset($seopress_pro_rich_snippets_faq[0][$key]["answer"]) ? esc_textarea($seopress_pro_rich_snippets_faq[0][$key]["answer"]) : NULL;

							echo '<div class="faq">
									<h3 class="accordion-section-title" tabindex="0"> '.$check_question.'</h3>
									<div class="accordion-section-content">
										<div class="inside">
											<p>
												<label for="seopress_pro_rich_snippets_faq['.$key.'][question_meta]">'. __( 'Question (required)', 'wp-seopress-pro' ) .'</label>
												<input id="seopress_pro_rich_snippets_faq['.$key.'][question_meta]" type="text" name="seopress_pro_rich_snippets_faq['.$key.'][question]" placeholder="'.esc_html__('Enter your question','wp-seopress-pro').'" aria-label="'.__('Question','wp-seopress-pro').'" value="'.$check_question.'" />
											</p>
											<p>
												<label for="seopress_pro_rich_snippets_faq['.$key.'][answer_meta]">'. __( 'Answer (required)', 'wp-seopress-pro' ) .'</label>
												<textarea id="seopress_pro_rich_snippets_faq['.$key.'][answer_meta]" name="seopress_pro_rich_snippets_faq['.$key.'][answer]" placeholder="'.esc_html__('Enter your answer','wp-seopress-pro').'" aria-label="'.__('Answer','wp-seopress-pro').'" value="'.$check_answer.'" rows="8">'.$check_answer.'</textarea>
											</p>

											<p><a href="#" class="remove-faq button">'.__('Remove question','wp-seopress-pro').'</a></p>
										</div>
									</div>
								</div>
							';
						}
						echo '</div>';
					else:
						echo '<div id="wrap-faq" data-count="1">
							<div class="faq">
									<h3 class="accordion-section-title" tabindex="0"> Question</h3>
									<div class="accordion-section-content">
										<div class="inside">
											<p>
												<label for="seopress_pro_rich_snippets_faq[0][question_meta]">'. __( 'Question (required)', 'wp-seopress-pro' ) .'</label>
												<input id="seopress_pro_rich_snippets_faq[0][question_meta]" type="text" name="seopress_pro_rich_snippets_faq[0][question]" placeholder="'.esc_html__('Enter your question','wp-seopress-pro').'" aria-label="'.__('Question','wp-seopress-pro').'" value="" />
											</p>
											<p>
												<label for="seopress_pro_rich_snippets_faq[0][answer_meta]">'. __( 'Answer (required)', 'wp-seopress-pro' ) .'</label>
												<textarea id="seopress_pro_rich_snippets_faq[0][answer_meta]" name="seopress_pro_rich_snippets_faq[0][answer]" placeholder="'.esc_html__('Enter your answer','wp-seopress-pro').'" aria-label="'.__('Answer','wp-seopress-pro').'" value="" rows="8"></textarea>
											</p>

											<p><a href="#" class="remove-faq button">'.__('Remove question','wp-seopress-pro').'</a></p>
										</div>
									</div>
								</div>
							</div>
							';
					endif;
				   echo '<p><a href="#" id="add-faq" class="add-faq button button-primary">'.__('Add question','wp-seopress-pro').'</a></p>
				</div>
				<div class="wrap-rich-snippets-courses">
					<p class="seopress-notice notice notice-info">
						'.__('Mark up your course lists with structured data so prospective students find you through Google Search.','wp-seopress-pro').'
					</p>
					<ul class="seopress-list advice notice notice-error">
						<li>'.__('Only use course markup for educational content that fits the following definition of a course: A series or unit of curriculum that contains lectures, lessons, or modules in a particular subject and/or topic.','wp-seopress-pro').'</li>
						<li>'.__('A course must have an explicit educational outcome of knowledge and/or skill in a particular subject and/or topic, and be led by one or more instructors with a roster of students.','wp-seopress-pro').'</li>
						<li>'.__('A general public event such as "Astronomy Day" is not a course, and a single 2-minute "How to make a Sandwich Video" is not a course.','wp-seopress-pro').'</li>
					</ul>
					<p>
						<label for="seopress_pro_rich_snippets_courses_title_meta">
							'. __( 'Title', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_courses_title_meta" name="seopress_pro_rich_snippets_courses_title" placeholder="'.esc_html__('The title of your lesson, course...','wp-seopress-pro').'" aria-label="'.__('Title','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_courses_title.'" />
					</p>
					<p style="margin-bottom:0">
						<label for="seopress_pro_rich_snippets_courses_desc">'. __( 'Course description', 'wp-seopress-pro' ) .'</label>
						<textarea id="seopress_pro_rich_snippets_courses_desc" style="width:100%" name="seopress_pro_rich_snippets_courses_desc" placeholder="'.esc_html__('Enter your course/lesson description','wp-seopress-pro').'" aria-label="'.__('Course description','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_courses_desc.'">'.$seopress_pro_rich_snippets_courses_desc.'</textarea>
						<div class="wrap-seopress-counters">
							<div id="seopress_rich_snippets_courses_counters"></div>
							'.__('(maximum limit)','wp-seopress-pro').'
						</div>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_courses_school_meta">
							'. __( 'School/Organization', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_courses_school_meta" name="seopress_pro_rich_snippets_courses_school" placeholder="'.esc_html__('Name of university, organization...','wp-seopress-pro').'" aria-label="'.__('School/Organization','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_courses_school.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_courses_website_meta">
							'. __( 'School/Organization Website', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_courses_website_meta" name="seopress_pro_rich_snippets_courses_website" placeholder="'.esc_html__('Enter the URL like https://example.com/','wp-seopress-pro').'" aria-label="'.__('School/Organization Website','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_courses_website.'" />
					</p>
				</div>
				<div class="wrap-rich-snippets-recipes">
					<p class="seopress-notice notice notice-info">
						'.__('Mark up your recipe content with structured data to provide rich cards and host-specific lists for your recipes, such as cooking and preparation times, nutrition information...','wp-seopress-pro').'
					</p>
					<ul class="advice seopress-list notice notice-error">
						<li>'.__('Use recipe markup for content about preparing a particular dish. For example, "facial scrub" or "party ideas" are not valid names for a dish.','wp-seopress-pro').'</li>
					</ul>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_name_meta">
							'. __( 'Recipe name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_recipes_name_meta" name="seopress_pro_rich_snippets_recipes_name" placeholder="'.esc_html__('The name of your dish','wp-seopress-pro').'" aria-label="'.__('Recipe name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_desc_meta">'. __( 'Short recipe description', 'wp-seopress-pro' ) .'</label>
						<textarea id="seopress_pro_rich_snippets_recipes_desc_meta" style="width:100%" name="seopress_pro_rich_snippets_recipes_desc" placeholder="'.esc_html__('A short summary describing the dish.','wp-seopress-pro').'" aria-label="'.__('Short recipe description','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_desc.'">'.$seopress_pro_rich_snippets_recipes_desc.'</textarea>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_cat_meta">
							'. __( 'Recipe category', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_recipes_cat_meta" name="seopress_pro_rich_snippets_recipes_cat" placeholder="'.esc_html__('Eg: appetizer, entree, or dessert','wp-seopress-pro').'" aria-label="'.__('Recipe category','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_cat.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_img_meta">'. __( 'Image', 'wp-seopress-pro' ) .'</label>
						<span class="advise">'. __('Minimum size: 185px by 185px, aspect ratio 1:1', 'wp-seopress-pro') .'</span>
						<input id="seopress_pro_rich_snippets_recipes_img_meta" type="text" name="seopress_pro_rich_snippets_recipes_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Image','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_img.'" />
						<input id="seopress_pro_rich_snippets_recipes_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_prep_time_meta">
							'. __( 'Preparation time (in minutes)', 'wp-seopress-pro' ) .'</label>
						<input type="number" id="seopress_pro_rich_snippets_recipes_prep_time_meta" name="seopress_pro_rich_snippets_recipes_prep_time" placeholder="'.esc_html__('Eg: 30 min','wp-seopress-pro').'" aria-label="'.__('Preparation time (in minutes)','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_prep_time.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_cook_time_meta">
							'. __( 'Cooking time (in minutes)', 'wp-seopress-pro' ) .'</label>
						<input type="number" id="seopress_pro_rich_snippets_recipes_cook_time_meta" name="seopress_pro_rich_snippets_recipes_cook_time" placeholder="'.esc_html__('Eg: 45 min','wp-seopress-pro').'" aria-label="'.__('Cooking time (in minutes)','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_cook_time.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_calories_meta">
							'. __( 'Calories', 'wp-seopress-pro' ) .'</label>
						<input type="number" id="seopress_pro_rich_snippets_recipes_calories_meta" name="seopress_pro_rich_snippets_recipes_calories" placeholder="'.esc_html__('Number of calories','wp-seopress-pro').'" aria-label="'.__('Calories','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_calories.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_yield_meta">
							'. __( 'Recipe yield', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_recipes_yield_meta" name="seopress_pro_rich_snippets_recipes_yield" placeholder="'.esc_html__('Eg: number of people served, or number of servings','wp-seopress-pro').'" aria-label="'.__('Recipe yield','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_yield.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_keywords_meta">
							'. __( 'Keywords', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_recipes_keywords_meta" name="seopress_pro_rich_snippets_recipes_keywords" placeholder="'.esc_html__('Eg: winter apple pie, nutmeg crust (NOT recommended: dessert, American)','wp-seopress-pro').'" aria-label="'.__('Keywords','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_keywords.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_cuisine_meta">
							'. __( 'Recipe cuisine', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_recipes_cuisine_meta" name="seopress_pro_rich_snippets_recipes_cuisine" placeholder="'.esc_html__('The region associated with your recipe. For example, "French", Mediterranean", or "American".','wp-seopress-pro').'" aria-label="'.__('Recipe cuisine','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_cuisine.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_ingredient_meta">
							'. __( 'Recipe ingredients', 'wp-seopress-pro' ) .'</label>
						<textarea rows="12" id="seopress_pro_rich_snippets_recipes_ingredient_meta" name="seopress_pro_rich_snippets_recipes_ingredient" placeholder="'.esc_html__('Ingredients used in the recipe. One ingredient per line. Include only the ingredient text that is necessary for making the recipe. Don\'t include unnecessary information, such as a definition of the ingredient.','wp-seopress-pro').'" aria-label="'.__('Recipe ingredients','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_ingredient.'">'.$seopress_pro_rich_snippets_recipes_ingredient.'</textarea>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_recipes_instructions_meta">
							'. __( 'Recipe instructions', 'wp-seopress-pro' ) .'</label>
						<textarea rows="12" id="seopress_pro_rich_snippets_recipes_instructions_meta" name="seopress_pro_rich_snippets_recipes_instructions" placeholder="'.esc_html__('eg: Heat oven to 425°F. Include only text on how to make the recipe and don\'t include other text such as "Directions", "Watch the video", "Step 1".','wp-seopress-pro').'" aria-label="'.__('Recipe instructions','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_recipes_instructions.'">'.$seopress_pro_rich_snippets_recipes_instructions.'</textarea>
					</p>
				</div>
				<div class="wrap-rich-snippets-jobs">
					<p class="seopress-notice notice notice-info">
						'.__('Adding structured data makes your job postings eligible to appear in a special user experience in Google Search results.','wp-seopress-pro').'
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_name_meta">
							'. __( 'Job title', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_name_meta" name="seopress_pro_rich_snippets_jobs_name" placeholder="'.esc_html__('The title of the job (not the title of the posting). For example, "Software Engineer" or "Barista".','wp-seopress-pro').'" aria-label="'.__('Job title','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_desc_meta">
							'. __( 'Job description', 'wp-seopress-pro' ) .'</label>
						<textarea rows="12" id="seopress_pro_rich_snippets_jobs_desc_meta" name="seopress_pro_rich_snippets_jobs_desc" placeholder="'.esc_html__('The full description of the job in HTML format.','wp-seopress-pro').'" aria-label="'.__('Job description','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_desc.'">'.$seopress_pro_rich_snippets_jobs_desc.'</textarea>
						<span class="advise">
							'.__('<strong>Google Guidelines:</strong> You must format the description in HTML.','wp-seopress-pro').'
						</span>
						<span class="advise">
							'.esc_html__('At minimum, add paragraph breaks using <br>, <p>, or \n.','wp-seopress-pro').'
						</span>
						<span class="advise">
							'.esc_html__('The feature recognizes the following HTML tags: <p>, <ul>, and <li>.','wp-seopress-pro').'
						</span>
						<span class="advise">
							'.esc_html__('The feature doesn\'t recognize header and character-level tags, such as <h1>, <strong>, and <em>. While the tags won\'t affect the formatting in the feature, you can safely include them on the page.','wp-seopress-pro').'
						</span>
					</p>
					<p>
						<label for="seopress-date-picker4">
							'. __( 'Published date', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress-date-picker4" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_jobs_date_posted" placeholder="'.esc_html__('The original date that employer posted the job in ISO 8601 format. For example, "2017-01-24" or "2017-01-24T19:33:17+00:00".','wp-seopress-pro').'" aria-label="'.__('Published date','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_date_posted.'" />
					</p>
					<p>
						<label for="seopress-date-picker5">
							'. __( 'Expiration date', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress-date-picker5" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_jobs_valid_through" placeholder="'.esc_html__('The date when the job posting will expire in ISO 8601 format. For example, "2017-02-24" or "2017-02-24T19:33:17+00:00".','wp-seopress-pro').'" aria-label="'.__('Expiration date','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_valid_through.'" />
					</p>
					<p class="seopress_pro_rich_snippets_jobs_employment_type_p">
						<label for="seopress_pro_rich_snippets_jobs_employment_type_meta">
							'. __( 'Type of employment', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_employment_type_meta" name="seopress_pro_rich_snippets_jobs_employment_type" class="seopress_pro_rich_snippets_jobs_employment_type" placeholder="'.esc_html__('Type of employment, You can include more than one employmentType property.','wp-seopress-pro').'" aria-label="'.__('Type of employment','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_employment_type.'" />

						<span class="wrap-tags">';

						$employment_type = [
							'FULL_TIME' 	=> __('FULL TIME','wp-seopress-pro'),
							'PART_TIME' 	=> __('PART TIME','wp-seopress-pro'),
							'CONTRACTOR' 	=> __('CONTRACTOR','wp-seopress-pro'),
							'TEMPORARY'		=> __('TEMPORARY','wp-seopress-pro'),
							'INTERN' 		=> __('INTERN','wp-seopress-pro'),
							'VOLUNTEER' 	=> __('VOLUNTEER','wp-seopress-pro'),
							'PER_DIEM' 		=> __('PER_DIEM','wp-seopress-pro'),
							'OTHER' 		=> __('OTHER','wp-seopress-pro'),
						];
						$i = 1;
						foreach($employment_type as $key => $value) { ?>
							<span id="seopress-tag-employment-<?php echo $i; ?>" class="tag-title" data-tag="<?php echo $key; ?>"><span class="dashicons dashicons-plus"></span><?php echo $value; ?></span>
						<?php
							$i++;
						}
						echo '</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_identifier_name_meta">
							'. __( 'Identifier name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_identifier_name_meta" name="seopress_pro_rich_snippets_jobs_identifier_name" placeholder="'.esc_html__('The hiring organization\'s unique identifier name for the job','wp-seopress-pro').'" aria-label="'.__('Identifier name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_identifier_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_identifier_value_meta">
							'. __( 'Identifier value', 'wp-seopress-pro' ) .'</label>
						<input type="number" id="seopress_pro_rich_snippets_jobs_identifier_value_meta" min="0" name="seopress_pro_rich_snippets_jobs_identifier_value" placeholder="'.esc_html__('The hiring organization\'s value identifier value for the job','wp-seopress-pro').'" aria-label="'.__('Identifier value','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_identifier_value.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_hiring_organization_meta">
							'. __( 'Organization that hires', 'wp-seopress-pro' ) .'</label>
						<span class="advise">'. __('Default: Organization name from your Knowledge Graph (SEO > Social Networks > Knowledge Graph)', 'wp-seopress-pro') .'</span>
						<input type="text" id="seopress_pro_rich_snippets_jobs_hiring_organization_meta" name="seopress_pro_rich_snippets_jobs_hiring_organization" placeholder="'.esc_html__('The organization offering the job position. This should be the name of the company.','wp-seopress-pro').'" aria-label="'.__('Organization that hires','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_hiring_organization.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_hiring_same_as_meta">
							'. __( 'Organization website', 'wp-seopress-pro' ) .'</label>
						<span class="advise">'. __('Default: URL of your site', 'wp-seopress-pro') .'</span>
						<input type="text" id="seopress_pro_rich_snippets_jobs_hiring_same_as_meta" name="seopress_pro_rich_snippets_jobs_hiring_same_as" placeholder="'.esc_html__('The organization website URL offering the job position.','wp-seopress-pro').'" aria-label="'.__('Organization URL','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_hiring_same_as.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_hiring_logo_meta">'. __( 'Organization logo', 'wp-seopress-pro' ) .'</label>
						<span class="advise">'. __('Default: Logo from your Knowledge Graph (SEO > Social Networks > Knowledge Graph)', 'wp-seopress-pro') .'</span>
						<input id="seopress_pro_rich_snippets_jobs_hiring_logo_meta" type="text" name="seopress_pro_rich_snippets_jobs_hiring_logo" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Organization logo','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_hiring_logo.'" />
						<input id="seopress_pro_rich_snippets_jobs_hiring_logo_width" type="hidden" name="seopress_pro_rich_snippets_jobs_hiring_logo_width" value="'.$seopress_pro_rich_snippets_jobs_hiring_logo_width.'" />
						<input id="seopress_pro_rich_snippets_jobs_hiring_logo_height" type="hidden" name="seopress_pro_rich_snippets_jobs_hiring_logo_height" value="'.$seopress_pro_rich_snippets_jobs_hiring_logo_height.'" />
						<input id="seopress_pro_rich_snippets_jobs_hiring_logo" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_address_street_meta">
							'. __( 'Street address', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_address_street_meta" name="seopress_pro_rich_snippets_jobs_address_street" placeholder="'.esc_html__('Street address','wp-seopress-pro').'" aria-label="'.__('Street address','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_address_street.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_address_locality_meta">
							'. __( 'Locality address', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_address_locality_meta" name="seopress_pro_rich_snippets_jobs_address_locality" placeholder="'.esc_html__('Locality address','wp-seopress-pro').'" aria-label="'.__('Locality address','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_address_locality.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_address_region_meta">
							'. __( 'Region', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_address_region_meta" name="seopress_pro_rich_snippets_jobs_address_region" placeholder="'.esc_html__('Region','wp-seopress-pro').'" aria-label="'.__('Region','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_address_region.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_postal_code_meta">
							'. __( 'Postal code', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_postal_code_meta" name="seopress_pro_rich_snippets_jobs_postal_code" placeholder="'.esc_html__('Postal code','wp-seopress-pro').'" aria-label="'.__('Postal code','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_postal_code.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_country_meta">
							'. __( 'Country', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_country_meta" name="seopress_pro_rich_snippets_jobs_country" placeholder="'.esc_html__('Country','wp-seopress-pro').'" aria-label="'.__('Country','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_country.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_remote_meta">
							'. __( 'Remote job?', 'wp-seopress-pro' ) .'</label>
							<input type="checkbox" id="seopress_pro_rich_snippets_jobs_remote_meta" name="seopress_pro_rich_snippets_jobs_remote" aria-label="'.__('Remote job','wp-seopress-pro').'"';
							if ('1' == $seopress_pro_rich_snippets_jobs_remote) echo 'checked="yes"';
										echo ' value="1"/>';
					echo '</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_salary_meta">
							'. __( 'Salary', 'wp-seopress-pro' ) .'</label>
						<input type="number" id="seopress_pro_rich_snippets_jobs_salary_meta" step="0.01" min="0" name="seopress_pro_rich_snippets_jobs_salary" placeholder="'.esc_html__('eg: 50.00','wp-seopress-pro').'" aria-label="'.__('Currency','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_salary.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_salary_currency_meta">
							'. __( 'Currency', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_jobs_salary_currency_meta" name="seopress_pro_rich_snippets_jobs_salary_currency" placeholder="'.esc_html__('eg: USD','wp-seopress-pro').'" aria-label="'.__('Currency','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_jobs_salary_currency.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_jobs_salary_unit_meta">'. __( 'Select your unit text', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_jobs_salary_unit_meta" name="seopress_pro_rich_snippets_jobs_salary_unit">
							<option ' . selected( 'HOUR', $seopress_pro_rich_snippets_jobs_salary_unit, false ) . ' value="HOUR">'. __( 'HOUR', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DAY', $seopress_pro_rich_snippets_jobs_salary_unit, false ) . ' value="DAY">'. __( 'DAY', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'WEEK', $seopress_pro_rich_snippets_jobs_salary_unit, false ) . ' value="WEEK">'. __( 'WEEK', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MONTH', $seopress_pro_rich_snippets_jobs_salary_unit, false ) . ' value="MONTH">'. __( 'MONTH', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'YEAR', $seopress_pro_rich_snippets_jobs_salary_unit, false ) . ' value="YEAR">'. __( 'YEAR', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
				</div>
				<div class="wrap-rich-snippets-videos">
					<p class="seopress-notice notice notice-info">
						'.__('Mark up your video content with structured data to make Google Search an entry point for discovering and watching videos. ','wp-seopress-pro').'
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_videos_name_meta">
							'. __( 'Video name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_videos_name_meta" name="seopress_pro_rich_snippets_videos_name" placeholder="'.esc_html__('The title of your video','wp-seopress-pro').'" aria-label="'.__('Video name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_videos_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_videos_description_meta">'. __( 'Video description', 'wp-seopress-pro' ) .'</label>
						<textarea id="seopress_pro_rich_snippets_videos_description_meta" style="width:100%" name="seopress_pro_rich_snippets_videos_description" placeholder="'.esc_html__('The description of the video','wp-seopress-pro').'" aria-label="'.__('Video description','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_videos_description.'">'.$seopress_pro_rich_snippets_videos_description.'</textarea>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_videos_img_meta">'. __( 'Video thumbnail', 'wp-seopress-pro' ) .'</label>
						<span class="advise">'. __('Minimum size: 160px by 90px - Max size: 1920x1080px - crawlable and indexable', 'wp-seopress-pro') .'</span>
						<input id="seopress_pro_rich_snippets_videos_img_meta" type="text" name="seopress_pro_rich_snippets_videos_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Video thumbnail','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_videos_img.'" />
						<input id="seopress_pro_rich_snippets_videos_img_width" type="hidden" name="seopress_pro_rich_snippets_videos_img_width" value="'.$seopress_pro_rich_snippets_videos_img_width.'" />
						<input id="seopress_pro_rich_snippets_videos_img_height" type="hidden" name="seopress_pro_rich_snippets_videos_img_height" value="'.$seopress_pro_rich_snippets_videos_img_height.'" />
						<input id="seopress_pro_rich_snippets_videos_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_videos_duration_meta">
							'. __( 'Duration of your video (format: hh:mm:ss)', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_videos_duration_meta" name="seopress_pro_rich_snippets_videos_duration" placeholder="'.esc_html__('eg: 00:04:30 for 4 minutes and 30 seconds','wp-seopress-pro').'" aria-label="'.__('Duration of your video (format: hh:mm:ss)','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_videos_duration.'" />
						<span class="advise">'. __('You must respect the format of this field: hh:mm:ss','wp-seopress-pro') .'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_videos_url_meta">
							'. __( 'Video URL', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_videos_url_meta" name="seopress_pro_rich_snippets_videos_url" placeholder="'.esc_html__('Eg: https://example.com/video.mp4','wp-seopress-pro').'" aria-label="'.__('Video URL','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_videos_url.'" />
					</p>
				</div>
				<div class="wrap-rich-snippets-events">
					<p class="seopress-notice notice notice-info">
						'.__('Event markup describes the details of organized events. When you use it in your content, that event becomes relevant for enhanced search results for relevant queries.','wp-seopress-pro').'
					</p>
					<ul class="advice seopress-list notice notice-info">
						<li>'.__('<strong>Expired events.</strong> Events data for any feature will never be shown for expired events. However, you do not have to remove markup for expired events.','wp-seopress-pro').'</li>
						<li>'.__('<strong>Indicate the performer.</strong> Each event item must specify a performer property corresponding to the event\'s performer; that is, a musician, musical group, presenter, actor, and so on.','wp-seopress-pro').'</li>
						<li>'.__('<strong>Do not include promotional elements in the name.</strong>','wp-seopress-pro').'</li>
							<ul class="sublist">
								<li><span class="dashicons dashicons-no"></span>'.__('Promoting non-event products or services: "Trip package: San Diego/LA, 7 nights"','wp-seopress-pro').'</li>
								<li><span class="dashicons dashicons-no"></span>'.__('Prices in event titles: "Music festival - only $10!" Instead, highlight ticket prices using the tickets property in your markup.','wp-seopress-pro').'</li>
								<li><span class="dashicons dashicons-no"></span>'.__('Using a non-event for a title, such as: "Sale on dresses!"','wp-seopress-pro').'</li>
								<li><span class="dashicons dashicons-no"></span>'.__('Discounts or purchase opportunties, such as: "Concert - buy your tickets now," or "Concert - 50 percent off until Saturday!"','wp-seopress-pro').'</li>
							</ul>
						<li>'.__('<strong>Multi-day events.</strong> If your event/ticket info is for the festival itself, specify both the start and end date of the festival. If your event/ticket info is for a specific performance that is part of the festival, specify the specific date of the performance. If the specific date is unavailable, specify both the start and end date of the festival.','wp-seopress-pro').'</li>
					</ul>
					<p>
						<label for="seopress_pro_rich_snippets_events_type_meta">'. __( 'Select your event type', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_events_type_meta" name="seopress_pro_rich_snippets_events_type">
							<option ' . selected( 'BusinessEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="BusinessEvent">'. __( 'Business Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ChildrensEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="ChildrensEvent">'. __( 'Children\'s Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ComedyEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="ComedyEvent">'. __( 'Comedy Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CourseInstance', $seopress_pro_rich_snippets_events_type, false ) . ' value="CourseInstance">'. __( 'Course Instance', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DanceEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="DanceEvent">'. __( 'Dance Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DeliveryEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="DeliveryEvent">'. __( 'Delivery Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EducationEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="EducationEvent">'. __( 'Education Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ExhibitionEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="ExhibitionEvent">'. __( 'Exhibition Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Festival', $seopress_pro_rich_snippets_events_type, false ) . ' value="Festival">'. __( 'Festival', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'FoodEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="FoodEvent">'. __( 'Food Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'LiteraryEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="LiteraryEvent">'. __( 'Literary Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MusicEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="MusicEvent">'. __( 'Music Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PublicationEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="PublicationEvent">'. __( 'Publication Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SaleEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="SaleEvent">'. __( 'Sale Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ScreeningEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="ScreeningEvent">'. __( 'Screening Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SocialEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="SocialEvent">'. __( 'Social Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SportsEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="SportsEvent">'. __( 'Sports Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'TheaterEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="TheaterEvent">'. __( 'Theater Event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'VisualArtsEvent', $seopress_pro_rich_snippets_events_type, false ) . ' value="VisualArtsEvent">'. __( 'Visual Arts Event', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_name_meta">
							'. __( 'Event name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_name_meta" name="seopress_pro_rich_snippets_events_name" placeholder="'.esc_html__('The name of your event','wp-seopress-pro').'" aria-label="'.__('Event name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_desc">
							'. __( 'Event description (default excerpt, or beginning of the content)', 'wp-seopress-pro' ) .'</label>
						<textarea id="seopress_pro_rich_snippets_events_desc" style="width:100%" name="seopress_pro_rich_snippets_events_desc" placeholder="'.esc_html__('Enter your event description','wp-seopress-pro').'" aria-label="'.__('Event description','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_desc.'">'.$seopress_pro_rich_snippets_events_desc.'</textarea>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_img_meta">'. __( 'Image thumbnail', 'wp-seopress-pro' ) .'</label>
						<span class="advise">'. __('Minimum width: 720px - Recommended size: 1920px -  .jpg, .png, or. gif format - crawlable and indexable', 'wp-seopress-pro') .'</span>
						<input id="seopress_pro_rich_snippets_events_img_meta" type="text" name="seopress_pro_rich_snippets_events_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Image thumbnail','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_img.'" />
						<input id="seopress_pro_rich_snippets_events_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress-date-picker1">
							'. __( 'Start date', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress-date-picker1" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_events_start_date" placeholder="'.esc_html__('Eg: YYYY-MM-DD','wp-seopress-pro').'" aria-label="'.__('Start date','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_start_date.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_start_time_meta">
							'. __( 'Start time', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_start_time_meta" name="seopress_pro_rich_snippets_events_start_time" placeholder="'.esc_html__('Eg: HH:MM','wp-seopress-pro').'" aria-label="'.__('Start time','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_start_time.'" />
					</p>
					<p>
						<label for="seopress-date-picker2">
							'. __( 'End date', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress-date-picker2" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_events_end_date" placeholder="'.esc_html__('Eg: YYYY-MM-DD','wp-seopress-pro').'" aria-label="'.__('End date','wp-seopress-pro').'"  value="'.$seopress_pro_rich_snippets_events_end_date.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_end_time_meta">
							'. __( 'End time', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_end_time_meta" name="seopress_pro_rich_snippets_events_end_time" placeholder="'.esc_html__('Eg: HH:MM','wp-seopress-pro').'" aria-label="'.__('End time','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_end_time.'" />
					</p>
					<p>
						<label for="seopress-date-picker7">
							'. __( 'Previous start date', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress-date-picker7" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_events_previous_start_date" placeholder="'.esc_html__('Eg: YYYY-MM-DD','wp-seopress-pro').'" aria-label="'.__('Previous start date','wp-seopress-pro').'"  value="'.$seopress_pro_rich_snippets_events_previous_start_date.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_previous_start_time_meta">
							'. __( 'Previous start time', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_previous_start_time_meta" name="seopress_pro_rich_snippets_events_previous_start_time" placeholder="'.esc_html__('Eg: HH:MM','wp-seopress-pro').'" aria-label="'.__('Previous start time','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_previous_start_time.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_location_name_meta">
							'. __( 'Location name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_location_name_meta" name="seopress_pro_rich_snippets_events_location_name" placeholder="'.esc_html__('Eg: Hotel du Palais','wp-seopress-pro').'" aria-label="'.__('Location name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_location_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_location_url_meta">
							'. __( 'Location Website', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_location_url_meta" name="seopress_pro_rich_snippets_events_location_url" placeholder="'.esc_html__('Eg: http://www.hotel-du-palais.com/','wp-seopress-pro').'" aria-label="'.__('Location Website','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_location_url.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_location_address_meta">
							'. __( 'Location Address', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_location_address_meta" name="seopress_pro_rich_snippets_events_location_address" placeholder="'.esc_html__('Eg: 1 Avenue de l\'Imperatrice, 64200 Biarritz','wp-seopress-pro').'" aria-label="'.__('Location Address','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_location_address.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_offers_name_meta">
							'. __( 'Offer name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_offers_name_meta" name="seopress_pro_rich_snippets_events_offers_name" aria-label="'.__('Offer name','wp-seopress-pro').'" placeholder="'.esc_html__('Eg: General admission','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_offers_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_offers_cat_meta">'. __( 'Select your offer category', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_events_offers_cat_meta" name="seopress_pro_rich_snippets_events_offers_cat">
							<option ' . selected( 'Primary', $seopress_pro_rich_snippets_events_offers_cat, false ) . ' value="Primary">'. __( 'Primary', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Secondary', $seopress_pro_rich_snippets_events_offers_cat, false ) . ' value="Secondary">'. __( 'Secondary', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Presale', $seopress_pro_rich_snippets_events_offers_cat, false ) . ' value="Presale">'. __( 'Presale', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Premium', $seopress_pro_rich_snippets_events_offers_cat, false ) . ' value="Premium">'. __( 'Premium', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_offers_price_meta">
							'. __( 'Price', 'wp-seopress-pro' ) .'</label>
							<p>'.__('The lowest available price, including service charges and fees, of this type of ticket.','wp-seopress-pro').'</p>
						<input type="text" id="seopress_pro_rich_snippets_events_offers_price_meta" name="seopress_pro_rich_snippets_events_offers_price" placeholder="'.esc_html__('Eg: 10','wp-seopress-pro').'" aria-label="'.__('Price','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_offers_price.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_offers_price_currency_meta">'. __( 'Select your currency', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_events_offers_price_currency_meta" name="seopress_pro_rich_snippets_events_offers_price_currency">
							<option ' . selected( 'none', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="none">'. __( 'Select a Currency', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'USD', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="USD">'. __( 'U.S. Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'GBP', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="GBP">'. __( 'Pound Sterling', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EUR', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="EUR">'. __( 'Euro', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ARS', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="ARS">'. __( 'Argentina Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'AUD', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="AUD">'. __( 'Australian Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BRL', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="BRL">'. __( 'Brazilian Real', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BGN', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="BGN">'. __( 'Bulgarian lev', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CAD', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="CAD">'. __( 'Canadian Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CLP', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="CLP">'. __( 'Chilean Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CZK', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="CZK">'. __( 'Czech Koruna', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DKK', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="DKK">'. __( 'Danish Krone', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'HKD', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="HKD">'. __( 'Hong Kong Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'HUF', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="HUF">'. __( 'Hungarian Forint', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'INR', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="INR">'. __( 'Indian rupee', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ILS', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="ILS">'. __( 'Israeli New Sheqel', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'JPY', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="JPY">'. __( 'Japanese Yen', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MYR', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="MYR">'. __( 'Malaysian Ringgit', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MXN', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="MXN">'. __( 'Mexican Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'NOK', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="NOK">'. __( 'Norwegian Krone', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'NZD', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="NZD">'. __( 'New Zealand Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PHP', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="PHP">'. __( 'Philippine Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PLN', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="PLN">'. __( 'Polish Zloty', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'IDR', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="IDR">'. __( 'Indonesian rupiah', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'RUB', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="RUB">'. __( 'Russian Ruble', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SGD', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="SGD">'. __( 'Singapore Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PEN', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="PEN">'. __( 'Sol', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ZAR', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="ZAR">'. __( 'South African Rand', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SEK', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="SEK">'. __( 'Swedish Krona', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CHF', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="CHF">'. __( 'Swiss Franc', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'TWD', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="TWD">'. __( 'Taiwan New Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'THB', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="THB">'. __( 'Thai Baht', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'UAH', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="UAH">'. __( 'Ukrainian hryvnia', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'VND', $seopress_pro_rich_snippets_events_offers_price_currency, false ) . ' value="VND">'. __( 'Vietnamese đồng', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_offers_availability_meta">'. __( 'Availability', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_events_offers_availability_meta" name="seopress_pro_rich_snippets_events_offers_availability">
							<option ' . selected( 'InStock', $seopress_pro_rich_snippets_events_offers_availability, false ) . ' value="InStock">'. __( 'In Stock', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SoldOut', $seopress_pro_rich_snippets_events_offers_availability, false ) . ' value="SoldOut">'. __( 'Sold Out', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PreOrder', $seopress_pro_rich_snippets_events_offers_availability, false ) . ' value="PreOrder">'. __( 'Pre Order', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress-date-picker3">'. __( 'Valid From', 'wp-seopress-pro' ) .'</label>
						'.__('The date when tickets go on sale','wp-seopress-pro').'
						<input type="text" id="seopress-date-picker3" class="seopress-date-picker" autocomplete="off" name="seopress_pro_rich_snippets_events_offers_valid_from_date" aria-label="'.__('The date when tickets go on sale','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_offers_valid_from_date.'" />
						<label for="seopress_pro_rich_snippets_events_offers_valid_from_meta_time">'. __( 'Time', 'wp-seopress-pro' ) .'</label>
						'.__('The time when tickets go on sale','wp-seopress-pro').'
						<input type="time" id="seopress_pro_rich_snippets_events_offers_valid_from_meta_time" name="seopress_pro_rich_snippets_events_offers_valid_from_time" aria-label="'.__('The time when tickets go on sale','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_offers_valid_from_time.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_offers_url_meta">
							'. __( 'Website to buy tickets', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_offers_url_meta" name="seopress_pro_rich_snippets_events_offers_url" placeholder="'.esc_html__('Eg: https://fnac.com/','wp-seopress-pro').'" aria-label="'.__('Website to buy tickets','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_offers_url.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_performer_meta">
							'. __( 'Performer name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_events_performer_meta" name="seopress_pro_rich_snippets_events_performer" placeholder="'.esc_html__('Eg: Lana Del Rey','wp-seopress-pro').'" aria-label="'.__('Performer name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_events_performer.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_status_meta">'. __( 'Select your event status', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_events_status_meta" name="seopress_pro_rich_snippets_events_status">
							<option ' . selected( 'none', $seopress_pro_rich_snippets_events_status, false ) . ' value="none">'. __( 'Select a status event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EventCancelled', $seopress_pro_rich_snippets_events_status, false ) . ' value="EventCancelled">'. __( 'Event cancelled', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EventMovedOnline', $seopress_pro_rich_snippets_events_status, false ) . ' value="EventMovedOnline">'. __( 'Event moved online', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EventPostponed', $seopress_pro_rich_snippets_events_status, false ) . ' value="EventPostponed">'. __( 'Event postponed', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EventRescheduled', $seopress_pro_rich_snippets_events_status, false ) . ' value="EventRescheduled">'. __( 'Event rescheduled', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EventScheduled', $seopress_pro_rich_snippets_events_status, false ) . ' value="EventScheduled">'. __( 'Event scheduled', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_events_attendance_mode_meta">'. __( 'Select your event attendance mode', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_events_attendance_mode_meta" name="seopress_pro_rich_snippets_events_attendance_mode">
							<option ' . selected( 'none', $seopress_pro_rich_snippets_events_attendance_mode, false ) . ' value="none">'. __( 'Select your event attendance mode', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'OfflineEventAttendanceMode', $seopress_pro_rich_snippets_events_attendance_mode, false ) . ' value="OfflineEventAttendanceMode">'. __( 'Offline event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'OnlineEventAttendanceMode', $seopress_pro_rich_snippets_events_attendance_mode, false ) . ' value="OnlineEventAttendanceMode">'. __( 'Online event', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MixedEventAttendanceMode', $seopress_pro_rich_snippets_events_attendance_mode, false ) . ' value="MixedEventAttendanceMode">'. __( 'Mixed event', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
				</div>
				<div class="wrap-rich-snippets-products">
					<p class="seopress-notice notice notice-info">
						'.__('Add markup to your product pages so Google can provide detailed product information in rich Search results - including Image Search. Users can see price, availability... right on Search results.','wp-seopress-pro').'
					</p>
					<ul class="advice seopress-list notice notice-error">
						<li>'.__('<strong>Use markup for a specific product, not a category or list of products.</strong> For example, "shoes in our shop" is not a specific product.','wp-seopress-pro').'</li>
						<li>'.__('<strong>Adult-related products are not supported.</strong>','wp-seopress-pro').'</li>
						<li>'.__('<strong>Works best with WooCommerce: we automatically add aggregateRating properties from user reviews (you have to enable this option from WooCommerce settings).</strong>','wp-seopress-pro').'</li>
					</ul>
					<p>
						<label for="seopress_pro_rich_snippets_product_name_meta">
							'. __( 'Product name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_product_name_meta" name="seopress_pro_rich_snippets_product_name" placeholder="'.esc_html__('The name of your product','wp-seopress-pro').'" aria-label="'.__('Product name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_product_name.'" />
						<span class="description">'.__('Default: product title','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_description_meta">'. __( 'Product description', 'wp-seopress-pro' ) .'</label>
						<textarea id="seopress_pro_rich_snippets_product_description_meta" style="width:100%" name="seopress_pro_rich_snippets_product_description" placeholder="'.esc_html__('The description of the product','wp-seopress-pro').'" aria-label="'.__('Product description','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_product_description.'">'.$seopress_pro_rich_snippets_product_description.'</textarea>
							<span class="description">'.__('Default: product excerpt','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_img_meta">'. __( 'Thumbnail', 'wp-seopress-pro' ) .'</label>
						<span class="advise">'. __('Pictures clearly showing the product, e.g. against a white background, are preferred.', 'wp-seopress-pro') .'</span>
						<input id="seopress_pro_rich_snippets_product_img_meta" type="text" name="seopress_pro_rich_snippets_product_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Thumbnail','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_product_img.'" />
						<input id="seopress_pro_rich_snippets_product_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
						<span class="description">'.__('Default: product image','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_price_meta">
							'. __( 'Product price', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_product_price_meta" name="seopress_pro_rich_snippets_product_price" placeholder="'.esc_html__('Eg: 30','wp-seopress-pro').'" aria-label="'.__('Product price','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_product_price.'" />
						<span class="description">'.__('Default: active product price','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress-date-picker6">
							'. __( 'Product price valid until', 'wp-seopress-pro' ) .'</label>
						<input id="seopress-date-picker6" type="text" name="seopress_pro_rich_snippets_product_price_valid_date" class="seopress-date-picker" placeholder="'.esc_html__('Eg: YYYY-MM-DD','wp-seopress-pro').'" aria-label="'.__('Product price valid until','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_product_price_valid_date.'" />
						<span class="description">'.__('Default: sale price dates To field','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_sku_meta">
							'. __( 'Product SKU', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_product_sku_meta" name="seopress_pro_rich_snippets_product_sku" placeholder="'.esc_html__('Eg: 0446310786','wp-seopress-pro').'" aria-label="'.__('Product SKU','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_product_sku.'" />
						<span class="description">'.__('Default: product SKU','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_global_ids_meta">
							'. __( 'Product Global Identifiers type', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_product_global_ids_meta" name="seopress_pro_rich_snippets_product_global_ids">
							<option ' . selected( 'none', $seopress_pro_rich_snippets_product_global_ids, false ) . ' value="none">'. __( 'Select a global identifier', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'gtin8', $seopress_pro_rich_snippets_product_global_ids, false ) . ' value="gtin8">'. __( 'gtin8', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'gtin13', $seopress_pro_rich_snippets_product_global_ids, false ) . ' value="gtin13">'. __( 'gtin13', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'gtin14', $seopress_pro_rich_snippets_product_global_ids, false ) . ' value="gtin14">'. __( 'gtin14', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'mpn', $seopress_pro_rich_snippets_product_global_ids, false ) . ' value="mpn">'. __( 'mpn', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'isbn', $seopress_pro_rich_snippets_product_global_ids, false ) . ' value="isbn">'. __( 'isbn', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_global_ids_value_meta">
							'. __( 'Product Global Identifier value', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_product_global_ids_value_meta" name="seopress_pro_rich_snippets_product_global_ids_value" placeholder="'.esc_html__('Eg: 925872','wp-seopress-pro').'" aria-label="'.__('Product Global Identifiers','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_product_global_ids_value.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_brand_meta">
							'. __( 'Product Brand', 'wp-seopress-pro' ) .'</label>';

							if (function_exists('seopress_get_taxonomies')) {
								$seopress_get_taxonomies = seopress_get_taxonomies();
								if (!empty(seopress_get_taxonomies())) {
									echo '<select id="seopress_pro_rich_snippets_product_brand_meta" name="seopress_pro_rich_snippets_product_brand">';
										echo '<option ' . selected( 'none', $seopress_pro_rich_snippets_product_brand, false ) . ' value="none">'. __( 'Select a taxonomy', 'wp-seopress-pro' ) .'</option>';

										foreach ($seopress_get_taxonomies as $key => $value) {
											echo '<option ' . selected( $key, $seopress_pro_rich_snippets_product_brand, false ) . ' value="'.$key.'">'. $key .'</option>';
										}
									echo '</select>';
								}
							}
					echo '</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_price_currency_meta">
							'. __( 'Product currency', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_product_price_currency_meta" name="seopress_pro_rich_snippets_product_price_currency">
							<option ' . selected( 'none', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="none">'. __( 'Select a Currency', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'USD', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="USD">'. __( 'U.S. Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'GBP', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="GBP">'. __( 'Pound Sterling', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EUR', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="EUR">'. __( 'Euro', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ARS', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="ARS">'. __( 'Argentina Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'AUD', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="AUD">'. __( 'Australian Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BRL', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="BRL">'. __( 'Brazilian Real', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BGN', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="BGN">'. __( 'Bulgarian lev', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CAD', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="CAD">'. __( 'Canadian Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CLP', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="CLP">'. __( 'Chilean Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CZK', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="CZK">'. __( 'Czech Koruna', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DKK', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="DKK">'. __( 'Danish Krone', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'HKD', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="HKD">'. __( 'Hong Kong Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'HUF', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="HUF">'. __( 'Hungarian Forint', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'INR', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="INR">'. __( 'Indian rupee', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ILS', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="ILS">'. __( 'Israeli New Sheqel', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'JPY', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="JPY">'. __( 'Japanese Yen', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MYR', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="MYR">'. __( 'Malaysian Ringgit', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MXN', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="MXN">'. __( 'Mexican Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'NOK', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="NOK">'. __( 'Norwegian Krone', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'NZD', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="NZD">'. __( 'New Zealand Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PHP', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="PHP">'. __( 'Philippine Peso', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PLN', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="PLN">'. __( 'Polish Zloty', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'IDR', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="IDR">'. __( 'Indonesian rupiah', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'RUB', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="RUB">'. __( 'Russian Ruble', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SGD', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="SGD">'. __( 'Singapore Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PEN', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="PEN">'. __( 'Sol', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ZAR', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="ZAR">'. __( 'South African Rand', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SEK', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="SEK">'. __( 'Swedish Krona', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CHF', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="CHF">'. __( 'Swiss Franc', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'TWD', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="TWD">'. __( 'Taiwan New Dollar', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'THB', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="THB">'. __( 'Thai Baht', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'UAH', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="UAH">'. __( 'Ukrainian hryvnia', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'VND', $seopress_pro_rich_snippets_product_price_currency, false ) . ' value="VND">'. __( 'Vietnamese đồng', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_condition_meta">'. __( 'Product Condition', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_product_condition_meta" name="seopress_pro_rich_snippets_product_condition">
							<option ' . selected( 'NewCondition', $seopress_pro_rich_snippets_product_condition, false ) . ' value="NewCondition">'. __( 'New', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'UsedCondition', $seopress_pro_rich_snippets_product_condition, false ) . ' value="UsedCondition">'. __( 'Used', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DamagedCondition', $seopress_pro_rich_snippets_product_condition, false ) . ' value="DamagedCondition">'. __( 'Damaged', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'RefurbishedCondition', $seopress_pro_rich_snippets_product_condition, false ) . ' value="RefurbishedCondition">'. __( 'Refurbished', 'wp-seopress-pro' ) .'</option>
						</select>
						<span class="description">'.__('Default: new','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_product_availability_meta">'. __( 'Product Availability', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_product_availability_meta" name="seopress_pro_rich_snippets_product_availability">
							<option ' . selected( 'InStock', $seopress_pro_rich_snippets_product_availability, false ) . ' value="InStock">'. __( 'In Stock', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'InStoreOnly', $seopress_pro_rich_snippets_product_availability, false ) . ' value="InStoreOnly">'. __( 'In Store Only', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'OnlineOnly', $seopress_pro_rich_snippets_product_availability, false ) . ' value="OnlineOnly">'. __( 'Online Only', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'LimitedAvailability', $seopress_pro_rich_snippets_product_availability, false ) . ' value="LimitedAvailability">'. __( 'Limited Availability', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SoldOut', $seopress_pro_rich_snippets_product_availability, false ) . ' value="SoldOut">'. __( 'Sold Out', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'OutOfStock', $seopress_pro_rich_snippets_product_availability, false ) . ' value="OutOfStock">'. __( 'Out Of Stock', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Discontinued', $seopress_pro_rich_snippets_product_availability, false ) . ' value="Discontinued">'. __( 'Discontinued', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PreOrder', $seopress_pro_rich_snippets_product_availability, false ) . ' value="PreOrder">'. __( 'Pre Order', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'PreSale', $seopress_pro_rich_snippets_product_availability, false ) . ' value="PreSale">'. __( 'Pre Sale', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
				</div>
				<div class="wrap-rich-snippets-software-app">
					<p class="seopress-notice notice notice-info">
						'.__('Mark up software application information so that Google can provide detailed service information in rich Search results.','wp-seopress-pro').'
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_softwareapp_name_meta">
							'. __( 'Software name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_softwareapp_name_meta" name="seopress_pro_rich_snippets_softwareapp_name" placeholder="'.esc_html__('The name of your app','wp-seopress-pro').'" aria-label="'.__('App name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_softwareapp_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_softwareapp_os_meta">
							'. __( 'Operating system', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_softwareapp_os_meta" name="seopress_pro_rich_snippets_softwareapp_os" placeholder="'.esc_html__('The operating system(s) required to use the app','wp-seopress-pro').'" aria-label="'.__('Operating system','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_softwareapp_os.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_softwareapp_cat_meta">'. __( 'Application category', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_softwareapp_cat_meta" name="seopress_pro_rich_snippets_softwareapp_cat">
							<option ' . selected( 'GameApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="GameApplication">'. __( 'GameApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SocialNetworkingApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="SocialNetworkingApplication">'. __( 'SocialNetworkingApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'TravelApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="TravelApplication">'. __( 'TravelApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ShoppingApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="ShoppingApplication">'. __( 'ShoppingApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SportsApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="SportsApplication">'. __( 'SportsApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'LifestyleApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="LifestyleApplication">'. __( 'LifestyleApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BusinessApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="BusinessApplication">'. __( 'BusinessApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DesignApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="DesignApplication">'. __( 'DesignApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DeveloperApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="DeveloperApplication">'. __( 'DeveloperApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DriverApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="DriverApplication">'. __( 'DriverApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EducationalApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="EducationalApplication">'. __( 'EducationalApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'HealthApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="HealthApplication">'. __( 'HealthApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'FinanceApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="FinanceApplication">'. __( 'FinanceApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'SecurityApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="SecurityApplication">'. __( 'SecurityApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'BrowserApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="BrowserApplication">'. __( 'BrowserApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CommunicationApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="CommunicationApplication">'. __( 'CommunicationApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'DesktopEnhancementApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="DesktopEnhancementApplication">'. __( 'DesktopEnhancementApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'EntertainmentApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="EntertainmentApplication">'. __( 'EntertainmentApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MultimediaApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="MultimediaApplication">'. __( 'MultimediaApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'HomeApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="HomeApplication">'. __( 'HomeApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'UtilitiesApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="UtilitiesApplication">'. __( 'UtilitiesApplication', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'ReferenceApplication', $seopress_pro_rich_snippets_softwareapp_cat, false ) . ' value="ReferenceApplication">'. __( 'ReferenceApplication', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_softwareapp_price_meta">
							'. __( 'Price of your app', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_softwareapp_price_meta" name="seopress_pro_rich_snippets_softwareapp_price" placeholder="'.esc_html__('The price of your app (set "0" if the app is free of charge)','wp-seopress-pro').'" aria-label="'.__('Price','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_softwareapp_price.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_softwareapp_currency_meta">
							'. __( 'Currency', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_softwareapp_currency_meta" name="seopress_pro_rich_snippets_softwareapp_currency" placeholder="'.esc_html__('Currency: USD, EUR...','wp-seopress-pro').'" aria-label="'.__('Currency','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_softwareapp_currency.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_softwareapp_rating_meta">
							'. __( 'Your rating', 'wp-seopress-pro' ) .'</label>
						<input type="number" id="seopress_pro_rich_snippets_softwareapp_rating_meta" max="5" min="1" step="0.1" name="seopress_pro_rich_snippets_softwareapp_rating" placeholder="'.esc_html__('The item rating','wp-seopress-pro').'" aria-label="'.__('Your rating','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_softwareapp_rating.'" />
					</p>
				</div>
				<div class="wrap-rich-snippets-services">
					<p class="seopress-notice notice notice-info">
						'.__('Add markup to your service pages so that Google can provide detailed service information in rich Search results.','wp-seopress-pro').'
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_name_meta">
							'. __( 'Service name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_name_meta" name="seopress_pro_rich_snippets_service_name" placeholder="'.esc_html__('The name of your service','wp-seopress-pro').'" aria-label="'.__('Service name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_name.'" />
						<span class="description">'.__('Default: post title','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_type_meta">
							'. __( 'Service type', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_type_meta" name="seopress_pro_rich_snippets_service_type" placeholder="'.esc_html__('The type of your service','wp-seopress-pro').'" aria-label="'.__('Service type','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_type.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_description_meta">
							'. __( 'Service description', 'wp-seopress-pro' ) .'</label>
						<textarea style="width:100%" id="seopress_pro_rich_snippets_service_description_meta" name="seopress_pro_rich_snippets_service_description" placeholder="'.esc_html__('The description of your service','wp-seopress-pro').'" aria-label="'.__('Service description','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_description.'" >'.$seopress_pro_rich_snippets_service_description.'</textarea>
						<span class="description">'.__('Default: post excerpt','wp-seopress-pro').'</span>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_img_meta">'. __( 'Thumbnail', 'wp-seopress-pro' ) .'</label>
						<input id="seopress_pro_rich_snippets_service_img_meta" type="text" name="seopress_pro_rich_snippets_service_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Thumbnail','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_img.'" />
						<span class="description">'.__('Default: post thumbnail','wp-seopress-pro').'</span>
						<input id="seopress_pro_rich_snippets_service_img" class="button" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_area_meta">
							'. __( 'Area served', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_area_meta" name="seopress_pro_rich_snippets_service_area" placeholder="'.esc_html__('The area served by your service','wp-seopress-pro').'" aria-label="'.__('Area served','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_area.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_provider_name_meta">
							'. __( 'Provider name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_provider_name_meta" name="seopress_pro_rich_snippets_service_provider_name" placeholder="'.esc_html__('The provider name of your service','wp-seopress-pro').'" aria-label="'.__('Provider name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_provider_name.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_lb_img_meta">'. __( 'Location image', 'wp-seopress-pro' ) .'</label>
						<input id="seopress_pro_rich_snippets_service_lb_img_meta" type="text" name="seopress_pro_rich_snippets_service_lb_img" placeholder="'.esc_html__('Select your location image','wp-seopress-pro').'" aria-label="'.__('Location image','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_lb_img.'" />
						<input id="seopress_pro_rich_snippets_service_lb_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_provider_mobility_meta">
							'. __( 'Provider mobility (static or dynamic)', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_provider_mobility_meta" name="seopress_pro_rich_snippets_service_provider_mobility" placeholder="'.esc_html__('The provider mobility of your service','wp-seopress-pro').'" aria-label="'.__('Provider mobility','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_provider_mobility.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_slogan_meta">
							'. __( 'Slogan', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_slogan_meta" name="seopress_pro_rich_snippets_service_slogan" placeholder="'.esc_html__('The slogan of your service','wp-seopress-pro').'" aria-label="'.__('Slogan','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_slogan.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_street_addr_meta">
							'. __( 'Street Address', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_street_addr_meta" name="seopress_pro_rich_snippets_service_street_addr" placeholder="'.esc_html__('The street address of your service','wp-seopress-pro').'" aria-label="'.__('Street Address','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_street_addr.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_city_meta">
							'. __( 'City', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_city_meta" name="seopress_pro_rich_snippets_service_city" placeholder="'.esc_html__('The city of your service','wp-seopress-pro').'" aria-label="'.__('City','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_city.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_state_meta">
							'. __( 'State', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_state_meta" name="seopress_pro_rich_snippets_service_state" placeholder="'.esc_html__('The state of your service','wp-seopress-pro').'" aria-label="'.__('State','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_state.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_pc_meta">
							'. __( 'Postal code', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_pc_meta" name="seopress_pro_rich_snippets_service_pc" placeholder="'.esc_html__('The postal code of your service','wp-seopress-pro').'" aria-label="'.__('Postal code','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_pc.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_country_meta">
							'. __( 'Country', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_country_meta" name="seopress_pro_rich_snippets_service_country" placeholder="'.esc_html__('The country of your service','wp-seopress-pro').'" aria-label="'.__('Country','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_country.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_lat_meta">
							'. __( 'Latitude', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_lat_meta" name="seopress_pro_rich_snippets_service_lat" placeholder="'.esc_html__('The latitude of your service','wp-seopress-pro').'" aria-label="'.__('Latitude','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_lat.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_lon_meta">
							'. __( 'Longitude', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_lon_meta" name="seopress_pro_rich_snippets_service_lon" placeholder="'.esc_html__('The longitude of your service','wp-seopress-pro').'" aria-label="'.__('Longitude','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_lon.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_tel_meta">
							'. __( 'Telephone', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_tel_meta" name="seopress_pro_rich_snippets_service_tel" placeholder="'.esc_html__('The telephone of your service','wp-seopress-pro').'" aria-label="'.__('Telephone','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_tel.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_service_price_meta">
							'. __( 'Price range', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_service_price_meta" name="seopress_pro_rich_snippets_service_price" placeholder="'.esc_html__('The price range of your service','wp-seopress-pro').'" aria-label="'.__('Price range','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_service_price.'" />
					</p>
				</div>
				<div class="wrap-rich-snippets-review">
					<p class="seopress-notice notice notice-info">
						'.__('A simple review about something. When Google finds valid reviews or ratings markup, they may show a rich snippet that includes stars and other summary info from reviews or ratings.','wp-seopress-pro').'
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_review_item_meta">
							'. __( 'Review item name', 'wp-seopress-pro' ) .'</label>
						<input type="text" id="seopress_pro_rich_snippets_review_item_meta" name="seopress_pro_rich_snippets_review_item" placeholder="'.esc_html__('The item name reviewed','wp-seopress-pro').'" aria-label="'.__('Review item name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_review_item.'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_review_item_type_meta">'. __( 'Review item type', 'wp-seopress-pro' ) .'</label>
						<select id="seopress_pro_rich_snippets_review_item_type_meta" name="seopress_pro_rich_snippets_review_item_type">
							<option ' . selected( 'CreativeWorkSeason', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="CreativeWorkSeason">'. __( 'CreativeWorkSeason', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'CreativeWorkSeries', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="CreativeWorkSeries">'. __( 'CreativeWorkSeries', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Episode', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="Episode">'. __( 'Episode', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Game', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="Game">'. __( 'Game', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MediaObject', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="MediaObject">'. __( 'MediaObject', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MusicPlaylist', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="MusicPlaylist">'. __( 'MusicPlaylist', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'MusicRecording', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="MusicRecording">'. __( 'MusicRecording', 'wp-seopress-pro' ) .'</option>
							<option ' . selected( 'Organization', $seopress_pro_rich_snippets_review_item_type, false ) . ' value="Organization">'. __( 'Organization', 'wp-seopress-pro' ) .'</option>
						</select>
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_review_img_meta">'. __( 'Review item image', 'wp-seopress-pro' ) .'</label>
						<input id="seopress_pro_rich_snippets_review_img_meta" type="text" name="seopress_pro_rich_snippets_review_img" placeholder="'.esc_html__('Select your image','wp-seopress-pro').'" aria-label="'.__('Review item name','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_review_img.'" />
						<input id="seopress_pro_rich_snippets_review_img" class="button seopress_media_upload" type="button" value="'.__('Upload an Image','wp-seopress-pro').'" />
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_review_rating_meta">
							'. __( 'Your rating', 'wp-seopress-pro' ) .'</label>
						<input type="number" id="seopress_pro_rich_snippets_review_rating_meta" max="5" min="1" step="0.1" name="seopress_pro_rich_snippets_review_rating" placeholder="'.esc_html__('The item rating','wp-seopress-pro').'" aria-label="'.__('Your rating','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_review_rating.'" />
					</p>
				</div>
				<div class="wrap-rich-snippets-custom">
					<p class="seopress-notice notice notice-info">';
					$pre = '<pre>'.htmlspecialchars('<script type="application/ld+json">your custom schema</script>').'</pre>';
					echo sprintf(__('Build your custom schema. Don\'t forget to include the script tag: %s','wp-seopress-pro'),$pre).'
					</p>
					<p>
						<label for="seopress_pro_rich_snippets_custom_meta">
							'. __( 'Custom schema', 'wp-seopress-pro' ) .'</label>
						<textarea rows="25" id="seopress_pro_rich_snippets_custom_meta" name="seopress_pro_rich_snippets_custom" placeholder="'.esc_html__('eg: <script type="application/ld+json">{
							"@context": "https://schema.org/",
							"@type": "Review",
							"itemReviewed": {
							  "@type": "Restaurant",
							  "image": "http://www.example.com/seafood-restaurant.jpg",
							  "name": "Legal Seafood",
							  "servesCuisine": "Seafood",
							  "telephone": "1234567",
							  "address" :{
								"@type": "PostalAddress",
								"streetAddress": "123 William St",
								"addressLocality": "New York",
								"addressRegion": "NY",
								"postalCode": "10038",
								"addressCountry": "US"
							  }
							},
							"reviewRating": {
							  "@type": "Rating",
							  "ratingValue": "4"
							},
							"name": "A good seafood place.",
							"author": {
							  "@type": "Person",
							  "name": "Bob Smith"
							},
							"reviewBody": "The seafood is great.",
							"publisher": {
							  "@type": "Organization",
							  "name": "Washington Times"
							}
						  }</script>','wp-seopress-pro').'" aria-label="'.__('Custom schema','wp-seopress-pro').'" value="'.$seopress_pro_rich_snippets_custom.'">'.$seopress_pro_rich_snippets_custom.'</textarea>
					</p>';
					if (function_exists('seopress_get_locale') && seopress_get_locale() =='fr') {
						$global_var = 'https://www.seopress.org/fr/support/guides/gerez-vos-balises-titres-metas/';
					} else {
						$global_var = 'https://www.seopress.org/support/guides/manage-titles-meta-descriptions/';
					}
					echo '<p class="description"><span class="seopress-help dashicons dashicons-external"></span>' . sprintf( __( '<a href="%s" target="_blank">You can use dynamic variables in your schema.</a>', 'wp-seopress-pro' ), $global_var ) . '</p>
				</div>
				<p><a href="https://search.google.com/test/rich-results?url='.get_permalink().'" target="_blank" class="button">'.__('Validate my schema','wp-seopress-pro').'</a></p>
			</div>
		</div>
		<div id="seopress-schemas-tabs-2">';
			include_once ( dirname( __FILE__ ) . '/admin-metaboxes-schemas.php');
		echo '</div>
	</div>';
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////
	//Save datas
	///////////////////////////////////////////////////////////////////////////////////////////////////
	add_action('save_post', 'seopress_pro_save_metabox', 10, 2);
	function seopress_pro_save_metabox($post_id, $post){
		//Nonce
		if ( !isset( $_POST['seopress_pro_cpt_nonce'] ) || !wp_verify_nonce( $_POST['seopress_pro_cpt_nonce'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		//Post type object
		$post_type = get_post_type_object( $post->post_type );

		//Check permission
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
			return $post_id;

		if ( 'attachment' !== get_post_type($post_id) && 'seopress_schemas' !== get_post_type($post_id)) {


			//Automatic
			if(isset($_POST['seopress_pro_schemas'])){
				update_post_meta($post_id, '_seopress_pro_schemas', $_POST['seopress_pro_schemas']);
			}

			//Disable all automatic schemas
			if(isset($_POST['seopress_pro_rich_snippets_disable_all'])){
				update_post_meta($post_id, '_seopress_pro_rich_snippets_disable_all', esc_attr($_POST['seopress_pro_rich_snippets_disable_all']));
			} else {
				delete_post_meta( $post_id, '_seopress_pro_rich_snippets_disable_all', '' );
			}

			//Disable automatic schemas individually
			if(isset($_POST['seopress_pro_rich_snippets_disable'])){
				update_post_meta($post_id, '_seopress_pro_rich_snippets_disable', $_POST['seopress_pro_rich_snippets_disable']);
			} else {
				delete_post_meta($post_id, '_seopress_pro_rich_snippets_disable', '');
			}

			// SEOPress >= 3.9
			if( apply_filters('seopress_get_pro_schemas_manual', true) ){

				$_seopress_pro_rich_snippets_videos_duration = null;
				if(isset($_POST['seopress_pro_rich_snippets_videos_duration'])){
					$duration = $_POST['seopress_pro_rich_snippets_videos_duration'];
					$findme   = ':';
					$pos = strpos($duration, $findme);
					if ($pos === false) {
						$_POST['seopress_pro_rich_snippets_videos_duration'] = '00:'.$_POST['seopress_pro_rich_snippets_videos_duration'];
					}
					$_seopress_pro_rich_snippets_videos_duration = esc_html($_POST['seopress_pro_rich_snippets_videos_duration']);
				}

				$data_pro_rich_snippets = [
					'_seopress_pro_rich_snippets_type' => isset($_POST['seopress_pro_rich_snippets_type']) ? esc_html($_POST['seopress_pro_rich_snippets_type']) : null,
					'_seopress_pro_rich_snippets_article_type' => isset($_POST['seopress_pro_rich_snippets_article_type']) ? esc_html($_POST['seopress_pro_rich_snippets_article_type']) : null,
					'_seopress_pro_rich_snippets_article_title' => isset($_POST['seopress_pro_rich_snippets_article_title']) ? esc_html($_POST['seopress_pro_rich_snippets_article_title']) : null,
					'_seopress_pro_rich_snippets_article_img' => isset($_POST['seopress_pro_rich_snippets_article_img']) ? esc_html($_POST['seopress_pro_rich_snippets_article_img']) : null,
					'_seopress_pro_rich_snippets_article_img_width' => isset($_POST['seopress_pro_rich_snippets_article_img_width']) ? esc_html($_POST['seopress_pro_rich_snippets_article_img_width']) : null,
					'_seopress_pro_rich_snippets_article_img_height' => isset($_POST['seopress_pro_rich_snippets_article_img_height']) ? esc_html($_POST['seopress_pro_rich_snippets_article_img_height']) : null,
					'_seopress_pro_rich_snippets_article_coverage_start_date' => isset($_POST['seopress_pro_rich_snippets_article_coverage_start_date']) ? esc_html($_POST['seopress_pro_rich_snippets_article_coverage_start_date']) : null,
					'_seopress_pro_rich_snippets_article_coverage_start_time' => isset($_POST['seopress_pro_rich_snippets_article_coverage_start_time']) ? esc_html($_POST['seopress_pro_rich_snippets_article_coverage_start_time']) : null,
					'_seopress_pro_rich_snippets_article_coverage_end_date' => isset($_POST['seopress_pro_rich_snippets_article_coverage_end_date']) ? esc_html($_POST['seopress_pro_rich_snippets_article_coverage_end_date']) : null,
					'_seopress_pro_rich_snippets_article_coverage_end_time' => isset($_POST['seopress_pro_rich_snippets_article_coverage_end_time']) ? esc_html($_POST['seopress_pro_rich_snippets_article_coverage_end_time']) : null,
					'_seopress_pro_rich_snippets_lb_name' => isset($_POST['seopress_pro_rich_snippets_lb_name']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_name']) : null,
					'_seopress_pro_rich_snippets_lb_type' => isset($_POST['seopress_pro_rich_snippets_lb_type']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_type']) : null,
					'_seopress_pro_rich_snippets_lb_cuisine' => isset($_POST['seopress_pro_rich_snippets_lb_cuisine']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_cuisine']) : null,
					'_seopress_pro_rich_snippets_lb_img' => isset($_POST['seopress_pro_rich_snippets_lb_img']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_img']) : null,
					'_seopress_pro_rich_snippets_lb_img_width' => isset($_POST['seopress_pro_rich_snippets_lb_img_width']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_img_width']) : null,
					'_seopress_pro_rich_snippets_lb_img_height' => isset($_POST['seopress_pro_rich_snippets_lb_img_height']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_img_height']) : null,
					'_seopress_pro_rich_snippets_lb_street_addr' => isset($_POST['seopress_pro_rich_snippets_lb_street_addr']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_street_addr']) : null,
					'_seopress_pro_rich_snippets_lb_city' => isset($_POST['seopress_pro_rich_snippets_lb_city']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_city']) : null,
					'_seopress_pro_rich_snippets_lb_state' => isset($_POST['seopress_pro_rich_snippets_lb_state']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_state']) : null,
					'_seopress_pro_rich_snippets_lb_pc' => isset($_POST['seopress_pro_rich_snippets_lb_pc']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_pc']) : null,
					'_seopress_pro_rich_snippets_lb_country' => isset($_POST['seopress_pro_rich_snippets_lb_country']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_country']) : null,
					'_seopress_pro_rich_snippets_lb_lat' => isset($_POST['seopress_pro_rich_snippets_lb_lat']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_lat']) : null,
					'_seopress_pro_rich_snippets_lb_lon' => isset($_POST['seopress_pro_rich_snippets_lb_lon']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_lon']) : null,
					'_seopress_pro_rich_snippets_lb_website' => isset($_POST['seopress_pro_rich_snippets_lb_website']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_website']) : null,
					'_seopress_pro_rich_snippets_lb_tel' => isset($_POST['seopress_pro_rich_snippets_lb_tel']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_tel']) : null,
					'_seopress_pro_rich_snippets_lb_price' => isset($_POST['seopress_pro_rich_snippets_lb_price']) ? esc_html($_POST['seopress_pro_rich_snippets_lb_price']) : null,
					'_seopress_pro_rich_snippets_lb_opening_hours' => isset($_POST['seopress_pro_rich_snippets_lb_opening_hours']) ? $_POST['seopress_pro_rich_snippets_lb_opening_hours'] : null,
					'_seopress_pro_rich_snippets_faq' => isset($_POST['seopress_pro_rich_snippets_faq']) ? $_POST['seopress_pro_rich_snippets_faq'] : [],
					'_seopress_pro_rich_snippets_courses_title' => isset($_POST['seopress_pro_rich_snippets_courses_title']) ? esc_html($_POST['seopress_pro_rich_snippets_courses_title']) : null,
					'_seopress_pro_rich_snippets_courses_desc' => isset($_POST['seopress_pro_rich_snippets_courses_desc']) ? esc_textarea($_POST['seopress_pro_rich_snippets_courses_desc']) : null,
					'_seopress_pro_rich_snippets_courses_school' => isset($_POST['seopress_pro_rich_snippets_courses_school']) ? esc_html($_POST['seopress_pro_rich_snippets_courses_school']) : null,
					'_seopress_pro_rich_snippets_courses_website' => isset($_POST['seopress_pro_rich_snippets_courses_website']) ? esc_html($_POST['seopress_pro_rich_snippets_courses_website']) : null,
					'_seopress_pro_rich_snippets_recipes_name' => isset($_POST['seopress_pro_rich_snippets_recipes_name']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_name']) : null,
					'_seopress_pro_rich_snippets_recipes_desc' => isset($_POST['seopress_pro_rich_snippets_recipes_desc']) ? esc_textarea($_POST['seopress_pro_rich_snippets_recipes_desc']) : null,
					'_seopress_pro_rich_snippets_recipes_cat' => isset($_POST['seopress_pro_rich_snippets_recipes_cat']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_cat']) : null,
					'_seopress_pro_rich_snippets_recipes_img' => isset($_POST['seopress_pro_rich_snippets_recipes_img']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_img']) : null,
					'_seopress_pro_rich_snippets_recipes_prep_time' => isset($_POST['seopress_pro_rich_snippets_recipes_prep_time']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_prep_time']) : null,
					'_seopress_pro_rich_snippets_recipes_cook_time' => isset($_POST['seopress_pro_rich_snippets_recipes_cook_time']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_cook_time']) : null,
					'_seopress_pro_rich_snippets_recipes_calories' => isset($_POST['seopress_pro_rich_snippets_recipes_calories']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_calories']) : null,
					'_seopress_pro_rich_snippets_recipes_yield' => isset($_POST['seopress_pro_rich_snippets_recipes_yield']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_yield']) : null,
					'_seopress_pro_rich_snippets_recipes_keywords' => isset($_POST['seopress_pro_rich_snippets_recipes_keywords']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_keywords']) : null,
					'_seopress_pro_rich_snippets_recipes_cuisine' => isset($_POST['seopress_pro_rich_snippets_recipes_cuisine']) ? esc_html($_POST['seopress_pro_rich_snippets_recipes_cuisine']) : null,
					'_seopress_pro_rich_snippets_recipes_ingredient' => isset($_POST['seopress_pro_rich_snippets_recipes_ingredient']) ? esc_textarea($_POST['seopress_pro_rich_snippets_recipes_ingredient']) : null,
					'_seopress_pro_rich_snippets_recipes_instructions' => isset($_POST['seopress_pro_rich_snippets_recipes_instructions']) ? esc_textarea($_POST['seopress_pro_rich_snippets_recipes_instructions']) : null,
					'_seopress_pro_rich_snippets_jobs_name' => isset($_POST['seopress_pro_rich_snippets_jobs_name']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_name']) : null,
					'_seopress_pro_rich_snippets_jobs_desc' => isset($_POST['seopress_pro_rich_snippets_jobs_desc']) ? esc_textarea($_POST['seopress_pro_rich_snippets_jobs_desc']) : null,
					'_seopress_pro_rich_snippets_jobs_date_posted' => isset($_POST['seopress_pro_rich_snippets_jobs_date_posted']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_date_posted']) : null,
					'_seopress_pro_rich_snippets_jobs_valid_through' => isset($_POST['seopress_pro_rich_snippets_jobs_valid_through']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_valid_through']) : null,
					'_seopress_pro_rich_snippets_jobs_employment_type' => isset($_POST['seopress_pro_rich_snippets_jobs_employment_type']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_employment_type']) : null,
					'_seopress_pro_rich_snippets_jobs_identifier_name' => isset($_POST['seopress_pro_rich_snippets_jobs_identifier_name']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_identifier_name']) : null,
					'_seopress_pro_rich_snippets_jobs_identifier_value' => isset($_POST['seopress_pro_rich_snippets_jobs_identifier_value']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_identifier_value']) : null,
					'_seopress_pro_rich_snippets_jobs_hiring_organization' => isset($_POST['seopress_pro_rich_snippets_jobs_hiring_organization']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_organization']) : null,
					'_seopress_pro_rich_snippets_jobs_hiring_same_as' => isset($_POST['seopress_pro_rich_snippets_jobs_hiring_same_as']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_same_as']) : null,
					'_seopress_pro_rich_snippets_jobs_hiring_logo' => isset($_POST['seopress_pro_rich_snippets_jobs_hiring_logo']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_logo']) : null,
					'_seopress_pro_rich_snippets_jobs_hiring_logo_width' => isset($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_width']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_width']) : null,
					'_seopress_pro_rich_snippets_jobs_hiring_logo_height' => isset($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_height']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_hiring_logo_height']) : null,
					'_seopress_pro_rich_snippets_jobs_address_street' => isset($_POST['seopress_pro_rich_snippets_jobs_address_street']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_address_street']) : null,
					'_seopress_pro_rich_snippets_jobs_address_locality' => isset($_POST['seopress_pro_rich_snippets_jobs_address_locality']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_address_locality']) : null,
					'_seopress_pro_rich_snippets_jobs_address_region' => isset($_POST['seopress_pro_rich_snippets_jobs_address_region']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_address_region']) : null,
					'_seopress_pro_rich_snippets_jobs_postal_code' => isset($_POST['seopress_pro_rich_snippets_jobs_postal_code']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_postal_code']) : null,
					'_seopress_pro_rich_snippets_jobs_country' => isset($_POST['seopress_pro_rich_snippets_jobs_country']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_country']) : null,
					'_seopress_pro_rich_snippets_jobs_remote' => isset($_POST['seopress_pro_rich_snippets_jobs_remote']) ? esc_attr($_POST['seopress_pro_rich_snippets_jobs_remote']) : null,
					'_seopress_pro_rich_snippets_jobs_salary' => isset($_POST['seopress_pro_rich_snippets_jobs_salary']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_salary']) : null,
					'_seopress_pro_rich_snippets_jobs_salary_currency' => isset($_POST['seopress_pro_rich_snippets_jobs_salary_currency']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_salary_currency']) : null,
					'_seopress_pro_rich_snippets_jobs_salary_unit' => isset($_POST['seopress_pro_rich_snippets_jobs_salary_unit']) ? esc_html($_POST['seopress_pro_rich_snippets_jobs_salary_unit']) : null,
					'_seopress_pro_rich_snippets_videos_name' => isset($_POST['seopress_pro_rich_snippets_videos_name']) ? esc_html($_POST['seopress_pro_rich_snippets_videos_name']) : null,
					'_seopress_pro_rich_snippets_videos_description' => isset($_POST['seopress_pro_rich_snippets_videos_description']) ? esc_textarea($_POST['seopress_pro_rich_snippets_videos_description']) : null,
					'_seopress_pro_rich_snippets_videos_img' => isset($_POST['seopress_pro_rich_snippets_videos_img']) ? esc_html($_POST['seopress_pro_rich_snippets_videos_img']) : null,
					'_seopress_pro_rich_snippets_videos_img_width' => isset($_POST['seopress_pro_rich_snippets_videos_img_width']) ? esc_html($_POST['seopress_pro_rich_snippets_videos_img_width']) : null,
					'_seopress_pro_rich_snippets_videos_img_height' => isset($_POST['seopress_pro_rich_snippets_videos_img_height']) ? esc_html($_POST['seopress_pro_rich_snippets_videos_img_height']) : null,
					'_seopress_pro_rich_snippets_videos_duration' => $_seopress_pro_rich_snippets_videos_duration,
					'_seopress_pro_rich_snippets_videos_url' => isset($_POST['seopress_pro_rich_snippets_videos_url']) ? esc_html($_POST['seopress_pro_rich_snippets_videos_url']) : null,
					'_seopress_pro_rich_snippets_events_type' => isset($_POST['seopress_pro_rich_snippets_events_type']) ? esc_html($_POST['seopress_pro_rich_snippets_events_type']) : null,
					'_seopress_pro_rich_snippets_events_name' => isset($_POST['seopress_pro_rich_snippets_events_name']) ? esc_html($_POST['seopress_pro_rich_snippets_events_name']) : null,
					'_seopress_pro_rich_snippets_events_desc' => isset($_POST['seopress_pro_rich_snippets_events_desc']) ? esc_html($_POST['seopress_pro_rich_snippets_events_desc']) : null,
					'_seopress_pro_rich_snippets_events_img' => isset($_POST['seopress_pro_rich_snippets_events_img']) ? esc_html($_POST['seopress_pro_rich_snippets_events_img']) : null,
					'_seopress_pro_rich_snippets_events_desc' => isset($_POST['seopress_pro_rich_snippets_events_desc']) ? esc_textarea($_POST['seopress_pro_rich_snippets_events_desc']) : null,
					'_seopress_pro_rich_snippets_events_start_date' => isset($_POST['seopress_pro_rich_snippets_events_start_date']) ? esc_html($_POST['seopress_pro_rich_snippets_events_start_date']) : null,
					'_seopress_pro_rich_snippets_events_start_time' => isset($_POST['seopress_pro_rich_snippets_events_start_time']) ? esc_html($_POST['seopress_pro_rich_snippets_events_start_time']) : null,
					'_seopress_pro_rich_snippets_events_end_date' => isset($_POST['seopress_pro_rich_snippets_events_end_date']) ? esc_html($_POST['seopress_pro_rich_snippets_events_end_date']) : null,
					'_seopress_pro_rich_snippets_events_end_time' => isset($_POST['seopress_pro_rich_snippets_events_end_time']) ? esc_html($_POST['seopress_pro_rich_snippets_events_end_time']) : null,
					'_seopress_pro_rich_snippets_events_previous_start_date' => isset($_POST['seopress_pro_rich_snippets_events_previous_start_date']) ? esc_html($_POST['seopress_pro_rich_snippets_events_previous_start_date']) : null,
					'_seopress_pro_rich_snippets_events_previous_start_time' => isset($_POST['seopress_pro_rich_snippets_events_previous_start_time']) ? esc_html($_POST['seopress_pro_rich_snippets_events_previous_start_time']) : null,
					'_seopress_pro_rich_snippets_events_location_name' => isset($_POST['seopress_pro_rich_snippets_events_location_name']) ? esc_html($_POST['seopress_pro_rich_snippets_events_location_name']) : null,
					'_seopress_pro_rich_snippets_events_location_url' => isset($_POST['seopress_pro_rich_snippets_events_location_url']) ? esc_html($_POST['seopress_pro_rich_snippets_events_location_url']) : null,
					'_seopress_pro_rich_snippets_events_location_address' => isset($_POST['seopress_pro_rich_snippets_events_location_address']) ? esc_html($_POST['seopress_pro_rich_snippets_events_location_address']) : null,
					'_seopress_pro_rich_snippets_events_offers_name' => isset($_POST['seopress_pro_rich_snippets_events_offers_name']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_name']) : null,
					'_seopress_pro_rich_snippets_events_offers_cat' => isset($_POST['seopress_pro_rich_snippets_events_offers_cat']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_cat']) : null,
					'_seopress_pro_rich_snippets_events_offers_price' => isset($_POST['seopress_pro_rich_snippets_events_offers_price']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_price']) : null,
					'_seopress_pro_rich_snippets_events_offers_price_currency' => isset($_POST['seopress_pro_rich_snippets_events_offers_price_currency']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_price_currency']) : null,
					'_seopress_pro_rich_snippets_events_offers_availability' => isset($_POST['seopress_pro_rich_snippets_events_offers_availability']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_availability']) : null,
					'_seopress_pro_rich_snippets_events_offers_valid_from_date' => isset($_POST['seopress_pro_rich_snippets_events_offers_valid_from_date']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_valid_from_date']) : null,
					'_seopress_pro_rich_snippets_events_offers_valid_from_time' => isset($_POST['seopress_pro_rich_snippets_events_offers_valid_from_time']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_valid_from_time']) : null,
					'_seopress_pro_rich_snippets_events_offers_url' => isset($_POST['seopress_pro_rich_snippets_events_offers_url']) ? esc_html($_POST['seopress_pro_rich_snippets_events_offers_url']) : null,
					'_seopress_pro_rich_snippets_events_performer' => isset($_POST['seopress_pro_rich_snippets_events_performer']) ? esc_html($_POST['seopress_pro_rich_snippets_events_performer']) : null,
					'_seopress_pro_rich_snippets_events_status' => isset($_POST['seopress_pro_rich_snippets_events_status']) ? esc_html($_POST['seopress_pro_rich_snippets_events_status']) : null,
					'_seopress_pro_rich_snippets_events_attendance_mode' => isset($_POST['seopress_pro_rich_snippets_events_attendance_mode']) ? esc_html($_POST['seopress_pro_rich_snippets_events_attendance_mode']) : null,
					'_seopress_pro_rich_snippets_product_name' => isset($_POST['seopress_pro_rich_snippets_product_name']) ? esc_html($_POST['seopress_pro_rich_snippets_product_name']) : null,
					'_seopress_pro_rich_snippets_product_description' => isset($_POST['seopress_pro_rich_snippets_product_description']) ? esc_textarea($_POST['seopress_pro_rich_snippets_product_description']) : null,
					'_seopress_pro_rich_snippets_product_img' => isset($_POST['seopress_pro_rich_snippets_product_img']) ? esc_html($_POST['seopress_pro_rich_snippets_product_img']) : null,
					'_seopress_pro_rich_snippets_product_price' => isset($_POST['seopress_pro_rich_snippets_product_price']) ? esc_html($_POST['seopress_pro_rich_snippets_product_price']) : null,
					'_seopress_pro_rich_snippets_product_price_valid_date' => isset($_POST['seopress_pro_rich_snippets_product_price_valid_date']) ? esc_html($_POST['seopress_pro_rich_snippets_product_price_valid_date']) : null,
					'_seopress_pro_rich_snippets_product_sku' => isset($_POST['seopress_pro_rich_snippets_product_sku']) ? esc_html($_POST['seopress_pro_rich_snippets_product_sku']) : null,
					'_seopress_pro_rich_snippets_product_global_ids' => isset($_POST['seopress_pro_rich_snippets_product_global_ids']) ? esc_html($_POST['seopress_pro_rich_snippets_product_global_ids']) : null,
					'_seopress_pro_rich_snippets_product_brand' => isset($_POST['seopress_pro_rich_snippets_product_brand']) ? esc_html($_POST['seopress_pro_rich_snippets_product_brand']) : null,
					'_seopress_pro_rich_snippets_product_global_ids_value' => isset($_POST['seopress_pro_rich_snippets_product_global_ids_value']) ? esc_html($_POST['seopress_pro_rich_snippets_product_global_ids_value']) : null,
					'_seopress_pro_rich_snippets_product_price_currency' => isset($_POST['seopress_pro_rich_snippets_product_price_currency']) ? esc_html($_POST['seopress_pro_rich_snippets_product_price_currency']) : null,
					'_seopress_pro_rich_snippets_product_condition' => isset($_POST['seopress_pro_rich_snippets_product_condition']) ? esc_html($_POST['seopress_pro_rich_snippets_product_condition']) : null,
					'_seopress_pro_rich_snippets_product_availability' => isset($_POST['seopress_pro_rich_snippets_product_availability']) ? esc_html($_POST['seopress_pro_rich_snippets_product_availability']) : null,
					'_seopress_pro_rich_snippets_service_name' => isset($_POST['seopress_pro_rich_snippets_service_name']) ? esc_html($_POST['seopress_pro_rich_snippets_service_name']) : null,
					'_seopress_pro_rich_snippets_service_type' => isset($_POST['seopress_pro_rich_snippets_service_type']) ? esc_html($_POST['seopress_pro_rich_snippets_service_type']) : null,
					'_seopress_pro_rich_snippets_service_description' => isset($_POST['seopress_pro_rich_snippets_service_description']) ? esc_textarea($_POST['seopress_pro_rich_snippets_service_description']) : null,
					'_seopress_pro_rich_snippets_service_img' => isset($_POST['seopress_pro_rich_snippets_service_img']) ? esc_html($_POST['seopress_pro_rich_snippets_service_img']) : null,
					'_seopress_pro_rich_snippets_service_area' => isset($_POST['seopress_pro_rich_snippets_service_area']) ? esc_html($_POST['seopress_pro_rich_snippets_service_area']) : null,
					'_seopress_pro_rich_snippets_service_provider_name' => isset($_POST['seopress_pro_rich_snippets_service_provider_name']) ? esc_html($_POST['seopress_pro_rich_snippets_service_provider_name']) : null,
					'_seopress_pro_rich_snippets_service_lb_img' => isset($_POST['seopress_pro_rich_snippets_service_lb_img']) ? esc_html($_POST['seopress_pro_rich_snippets_service_lb_img']) : null,
					'_seopress_pro_rich_snippets_service_provider_mobility' => isset($_POST['seopress_pro_rich_snippets_service_provider_mobility']) ? esc_html($_POST['seopress_pro_rich_snippets_service_provider_mobility']) : null,
					'_seopress_pro_rich_snippets_service_slogan' => isset($_POST['seopress_pro_rich_snippets_service_slogan']) ? esc_html($_POST['seopress_pro_rich_snippets_service_slogan']) : null,
					'_seopress_pro_rich_snippets_service_street_addr' => isset($_POST['seopress_pro_rich_snippets_service_street_addr']) ? esc_html($_POST['seopress_pro_rich_snippets_service_street_addr']) : null,
					'_seopress_pro_rich_snippets_service_city' => isset($_POST['seopress_pro_rich_snippets_service_city']) ? esc_html($_POST['seopress_pro_rich_snippets_service_city']) : null,
					'_seopress_pro_rich_snippets_service_state' => isset($_POST['seopress_pro_rich_snippets_service_state']) ? esc_html($_POST['seopress_pro_rich_snippets_service_state']) : null,
					'_seopress_pro_rich_snippets_service_pc' => isset($_POST['seopress_pro_rich_snippets_service_pc']) ? esc_html($_POST['seopress_pro_rich_snippets_service_pc']) : null,
					'_seopress_pro_rich_snippets_service_country' => isset($_POST['seopress_pro_rich_snippets_service_country']) ? esc_html($_POST['seopress_pro_rich_snippets_service_country']) : null,
					'_seopress_pro_rich_snippets_service_lat' => isset($_POST['seopress_pro_rich_snippets_service_lat']) ? esc_html($_POST['seopress_pro_rich_snippets_service_lat']) : null,
					'_seopress_pro_rich_snippets_service_lon' => isset($_POST['seopress_pro_rich_snippets_service_lon']) ? esc_html($_POST['seopress_pro_rich_snippets_service_lon']) : null,
					'_seopress_pro_rich_snippets_service_tel' => isset($_POST['seopress_pro_rich_snippets_service_tel']) ? esc_html($_POST['seopress_pro_rich_snippets_service_tel']) : null,
					'_seopress_pro_rich_snippets_service_price' => isset($_POST['seopress_pro_rich_snippets_service_price']) ? esc_html($_POST['seopress_pro_rich_snippets_service_price']) : null,
					'_seopress_pro_rich_snippets_softwareapp_name' => isset($_POST['seopress_pro_rich_snippets_softwareapp_name']) ? esc_html($_POST['seopress_pro_rich_snippets_softwareapp_name']) : null,
					'_seopress_pro_rich_snippets_softwareapp_os' => isset($_POST['seopress_pro_rich_snippets_softwareapp_os']) ? esc_html($_POST['seopress_pro_rich_snippets_softwareapp_os']) : null,
					'_seopress_pro_rich_snippets_softwareapp_cat' => isset($_POST['seopress_pro_rich_snippets_softwareapp_cat']) ? esc_html($_POST['seopress_pro_rich_snippets_softwareapp_cat']) : null,
					'_seopress_pro_rich_snippets_softwareapp_price' => isset($_POST['seopress_pro_rich_snippets_softwareapp_price']) ? esc_html($_POST['seopress_pro_rich_snippets_softwareapp_price']) : null,
					'_seopress_pro_rich_snippets_softwareapp_currency' => isset($_POST['seopress_pro_rich_snippets_softwareapp_currency']) ? esc_html($_POST['seopress_pro_rich_snippets_softwareapp_currency']) : null,
					'_seopress_pro_rich_snippets_softwareapp_rating' => isset($_POST['seopress_pro_rich_snippets_softwareapp_rating']) ? esc_html($_POST['seopress_pro_rich_snippets_softwareapp_rating']) : null,
					'_seopress_pro_rich_snippets_review_item' => isset($_POST['seopress_pro_rich_snippets_review_item']) ? esc_html($_POST['seopress_pro_rich_snippets_review_item']) : null,
					'_seopress_pro_rich_snippets_review_item_type' => isset($_POST['seopress_pro_rich_snippets_review_item_type']) ? esc_html($_POST['seopress_pro_rich_snippets_review_item_type']) : null,
					'_seopress_pro_rich_snippets_review_img' => isset($_POST['seopress_pro_rich_snippets_review_img']) ? esc_html($_POST['seopress_pro_rich_snippets_review_img']) : null,
					'_seopress_pro_rich_snippets_review_rating' => isset($_POST['seopress_pro_rich_snippets_review_rating']) ? esc_html($_POST['seopress_pro_rich_snippets_review_rating']) : null,
					'_seopress_pro_rich_snippets_custom' => isset($_POST['seopress_pro_rich_snippets_custom']) ? esc_textarea($_POST['seopress_pro_rich_snippets_custom']) : null,
				];

				update_post_meta($post_id, '_seopress_pro_schemas_manual', $data_pro_rich_snippets);
			}
			else{
				seopress_update_rich_snippets_fallback($post_id);
			}

		}
	}
}

if (seopress_get_toggle_option('rich-snippets') =='1' && seopress_rich_snippets_enable_option() =='1') {
	if (is_user_logged_in()) {
		if (is_super_admin()) {
			echo seopress_pro_admin_std_metaboxe_display();
		} else {
			global $wp_roles;

			//Get current user role
			if(isset(wp_get_current_user()->roles[0])) {
				$seopress_user_role = wp_get_current_user()->roles[0];
				//If current user role matchs values from Security settings then apply
				if (function_exists('seopress_advanced_security_metaboxe_sdt_role_hook_option') && seopress_advanced_security_metaboxe_sdt_role_hook_option() !='') {
					if( array_key_exists( $seopress_user_role, seopress_advanced_security_metaboxe_sdt_role_hook_option())) {
						//do nothing
					} else {
						echo seopress_pro_admin_std_metaboxe_display();
					}
				} else {
					echo seopress_pro_admin_std_metaboxe_display();
				}
			}
		}
	}
}
