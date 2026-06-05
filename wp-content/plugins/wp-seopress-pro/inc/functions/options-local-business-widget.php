<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

/**
 * Adds Local_Business_Widget widget.
 */
class Local_Business_Widget extends WP_Widget {
 
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'seopress_pro_lb_widget', // Base ID
			'Local Business', // Name
			[ 'description' => __( 'Display local business informations', 'wp-seopress-pro' )] // Args
		);
	}
 
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$title 					= isset($instance[ 'title' ]) ? esc_attr($instance[ 'title' ]) : NULL;
		$desc 					= isset($instance[ 'desc' ]) ? esc_html($instance[ 'desc' ]) : NULL;
		$street 				= isset($instance[ 'street' ]) ? esc_attr($instance[ 'street' ]) : NULL;
		$city 					= isset($instance[ 'city' ]) ? esc_attr($instance[ 'city' ]) : NULL;
		$state 					= isset($instance[ 'state' ]) ? esc_attr($instance[ 'state' ]) : NULL;
		$code 					= isset($instance[ 'code' ]) ? esc_attr($instance[ 'code' ]) : NULL;
		$country 				= isset($instance[ 'country' ]) ? esc_attr($instance[ 'country' ]) : NULL;
		$map 					= isset($instance[ 'map' ]) ? esc_attr($instance[ 'map' ]) : NULL;
		$phone 					= isset($instance[ 'phone' ]) ? esc_attr($instance[ 'phone' ]) : NULL;
		$opening_hours 			= isset($instance[ 'opening_hours' ]) ? esc_attr($instance[ 'opening_hours' ]) : NULL;
		$hide_opening_hours 	= isset($instance[ 'hide_opening_hours' ]) ? esc_attr($instance[ 'hide_opening_hours' ]) : NULL;

		$title 					= apply_filters( 'seopress_lb_widget_title', $title );
		$desc 					= apply_filters( 'seopress_lb_widget_desc', $desc );

		if (! empty( $street ) && function_exists('seopress_local_business_street_address_option') && (seopress_local_business_street_address_option() !='1' || seopress_local_business_street_address_option() !='')) {
			$street 			= seopress_local_business_street_address_option();
		}
		$street 				= apply_filters( 'seopress_lb_widget_street_address', $street );

		if (! empty( $city ) && function_exists('seopress_local_business_address_locality_option') && (seopress_local_business_address_locality_option() !='1' || seopress_local_business_address_locality_option() !='')) {
			$city 				= seopress_local_business_address_locality_option();
		}
		$city 					= apply_filters( 'seopress_lb_widget_city', $city );

		if (! empty( $state ) && function_exists('seopress_local_business_address_region_option') && (seopress_local_business_address_region_option() !='1' || seopress_local_business_address_region_option() !='')) {
			$state 				= seopress_local_business_address_region_option();
		}
		$state 					= apply_filters( 'seopress_lb_widget_state', $state );

		if (! empty( $code ) && function_exists('seopress_local_business_postal_code_option') && (seopress_local_business_postal_code_option() !='1' || seopress_local_business_postal_code_option() !='' )) {
			$code 				= seopress_local_business_postal_code_option();
		}
		$code 					= apply_filters( 'seopress_lb_widget_code', $code );

		if (! empty( $country ) && function_exists('seopress_local_business_address_country_option') && (seopress_local_business_address_country_option() !='1' || seopress_local_business_address_country_option() !='')) {
			$country 			= 	seopress_local_business_address_country_option();
		}
		$country 				= apply_filters( 'seopress_lb_widget_country', $country );
		
		if (! empty( $map ) && function_exists('seopress_local_business_lat_option') && (seopress_local_business_lat_option() !='' && seopress_local_business_lat_option() !='1') && function_exists('seopress_local_business_lon_option') && (seopress_local_business_lon_option() !='' && seopress_local_business_lon_option() !='1')) {
			$map = '<a href="https://www.google.com/maps/@' . seopress_local_business_lat_option() . ',' . seopress_local_business_lon_option() . ',13z" title="' . __('View this local business on Google Maps (new window)', 'wp-seopress-pro') . '" target="_blank">' . __('View on Google Maps', 'wp-seopress-pro') . '</a>';
		}
		$map 					= apply_filters( 'seopress_lb_widget_map', $map );

		if (! empty( $phone ) && function_exists('seopress_local_business_phone_option') && (seopress_local_business_phone_option() !='' || seopress_local_business_phone_option() !='1')) {
			$phone 				= seopress_local_business_phone_option();
		}
		$phone 					= apply_filters( 'seopress_lb_widget_phone', $phone );

		if (! empty( $opening_hours ) && function_exists('seopress_local_business_opening_hours_option') && (seopress_local_business_opening_hours_option() !='' || seopress_local_business_opening_hours_option() !='1')) {
			$opening_hours 		= seopress_local_business_opening_hours_option();
		}
		$opening_hours 			= apply_filters( 'seopress_lb_widget_opening_hours', $opening_hours );
 
		echo $before_widget;

		echo '<div class="widget_seopress_pro_wrap_lb">';//Fix for Page builders

		$css = '<style>.widget_seopress_pro_wrap_lb span{display:inline-block;width:100%}.widget_seopress_pro_wrap_lb span.sp-city,.widget_seopress_pro_wrap_lb span.sp-code{width:auto}</style>';

		$css = apply_filters('seopress_lb_widget_css', $css);

		echo $css;

		//Title
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}

		//Desc
		if ( ! empty( $desc ) ) {
			echo '<p>' . esc_html($desc) . '</p>';
		}

		if ( ! empty( $street ) || ! empty( $city ) || ! empty( $code ) || ! empty( $state ) || ! empty( $country ) || (! empty( $map ) && $map !='1' && $map !='') || ! empty( $phone ) ) {
			echo '<p>';
		}
		
		//Street
		if ( ! empty( $street ) ) {
			echo '<span class="sp-street">' . $street . '</span>';
		}

		//City
		if ( ! empty( $city ) ) {
			$comma = '';
			if ( ! empty( $code ) ) {
				$comma = ', ';
			}
			echo '<span class="sp-city">' . $city . $comma .'</span>';
		}

		//Code
		if ( ! empty( $code ) ) {
			echo '<span class="sp-code">' . $code . '</span>';
		}

		//State
		if ( ! empty( $state ) ) {
			echo '<span class="sp-state">' . $state . '</span>';
		}

		//Country
		if ( ! empty( $country ) ) {
			echo '<span class="sp-country">' . $country . '</span>';
		}

		//Map link
		if ( ! empty( $map ) && $map !='1' && $map !='') {
			echo '<span class="sp-map-link">'. $map . '</span>';
		}

		//Phone
		if ( ! empty( $phone ) ) {
			echo '<span class="sp-phone"><a href="tel:' . $phone . '">' . $phone . '</a></span>';
		}

		if ( ! empty( $street ) || ! empty( $city ) || ! empty( $code ) || ! empty( $state ) || ! empty( $country ) || (! empty( $map ) && $map !='1' && $map !='') || ! empty( $phone ) ) {
			echo '</p>';
		}

		//Opening hours
		if ( ! empty( $opening_hours ) ) {

			echo '<table class="sp-opening-hours"><tbody>';

				foreach($opening_hours as $key => $days) {
					
					if (!empty($days)) {

						switch ($key) {
							case 0:
								$day = __('Monday', 'wp-seopress-pro');
								break;
							case 1:
								$day = __('Tuesday', 'wp-seopress-pro');
								break;
							case 2:
								$day = __('Wednesday', 'wp-seopress-pro');
								break;
							case 3:
								$day = __('Thursday', 'wp-seopress-pro');
								break;
							case 4:
								$day = __('Friday', 'wp-seopress-pro');
								break;
							case 5:
								$day = __('Saturday', 'wp-seopress-pro');
								break;
							case 6:
								$day = __('Sunday', 'wp-seopress-pro');
								break;
						}

						//If Hide closed days ON
						if (!empty($hide_opening_hours)) {
							if (empty($days['open'])) {
								echo '<tr>';
								echo '<th scope="row">'. $day .'</th>';
							}
						} else {
							echo '<tr>';
							echo '<th scope="row">'. $day .'</th>';
						}
						if (!empty($days['open']) && $days['open'] =='1') {
							if (empty($hide_opening_hours)) {
								echo '<td>';
									_e('Closed', 'wp-seopress-pro');
								echo '</td>';
							}
						} else {
							if (!empty($days['start']) || !empty($days['end'])) {
								echo '<td>';
							}
							if (!empty($days['start'])) {
								echo $days['start']['hours'];
								_e(':', 'wp-seopress-pro');
								echo $days['start']['mins'];
							}
							if (!empty($days['end'])) {
								_e(' - ', 'wp-seopress-pro');
								echo $days['end']['hours'];
								_e(':', 'wp-seopress-pro');
								echo $days['end']['mins'];
							}
							if (!empty($days['start']) || !empty($days['end'])) {
								echo '</td>';
							}
						}
						
						if (!empty($hide_opening_hours)) {
							if (empty($days['open'])) {
								echo '</tr>';
							}
						} else {
							echo '</tr>';
						}
					}
				}
			echo '</tbody></table>';
		}

		echo '</div>';

		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$title 					= isset($instance[ 'title' ]) ? esc_attr($instance[ 'title' ]) : NULL;
		$desc 					= isset($instance[ 'desc' ]) ? esc_html($instance[ 'desc' ]) : NULL;
		$street 				= isset($instance[ 'street' ]) ? esc_attr($instance[ 'street' ]) : NULL;
		$city 					= isset($instance[ 'city' ]) ? esc_attr($instance[ 'city' ]) : NULL;
		$state 					= isset($instance[ 'state' ]) ? esc_attr($instance[ 'state' ]) : NULL;
		$code 					= isset($instance[ 'code' ]) ? esc_attr($instance[ 'code' ]) : NULL;
		$country 				= isset($instance[ 'country' ]) ? esc_attr($instance[ 'country' ]) : NULL;
		$map 					= isset($instance[ 'map' ]) ? esc_attr($instance[ 'map' ]) : NULL;
		$phone 					= isset($instance[ 'phone' ]) ? esc_attr($instance[ 'phone' ]) : NULL;
		$opening_hours 			= isset($instance[ 'opening_hours' ]) ? esc_attr($instance[ 'opening_hours' ]) : NULL;
		$hide_opening_hours 	= isset($instance[ 'hide_opening_hours' ]) ? esc_attr($instance[ 'hide_opening_hours' ]) : NULL;
		?>

		<p>
			<?php echo sprintf('<a href="%s">'.__('Edit your Local Business information here','wp-seopress-pro').'</a>', admin_url('admin.php?page=seopress-pro-page#tab=tab_seopress_local_business')); ?>
		</p>

		<!-- Title -->
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'wp-seopress-pro' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_name( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<!-- Desc -->
		<p>
			<label for="<?php echo $this->get_field_name( 'desc' ); ?>"><?php _e( 'Description:', 'wp-seopress-pro' ); ?></label>
			<textarea rows="12" class="widefat content" id="<?php echo $this->get_field_name( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text" aria-label="<?php esc_html(_e('Description about your local business','wp-seopress-pro')); ?>" placeholder="<?php esc_html(_e('Add additional information here.','wp-seopress-pro')); ?>" value="<?php echo esc_html( $desc ); ?>"><?php echo esc_html( $desc ); ?></textarea>
		</p>

		<!-- Street Address -->
		<p>
			<label for="<?php echo $this->get_field_name( 'street' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'street' ); ?>" name="<?php echo $this->get_field_name( 'street' ); ?>" type="checkbox" <?php if ('1' == $street) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show street address?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- City -->
		<p>
			<label for="<?php echo $this->get_field_name( 'city' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'city' ); ?>" name="<?php echo $this->get_field_name( 'city' ); ?>" type="checkbox" <?php if ('1' == $city) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show city?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- State -->
		<p>
			<label for="<?php echo $this->get_field_name( 'state' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'state' ); ?>" name="<?php echo $this->get_field_name( 'state' ); ?>" type="checkbox" <?php if ('1' == $state) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show state?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- Code -->
		<p>
			<label for="<?php echo $this->get_field_name( 'code' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" type="checkbox" <?php if ('1' == $code) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show postal code?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- Country -->
		<p>
			<label for="<?php echo $this->get_field_name( 'country' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'country' ); ?>" name="<?php echo $this->get_field_name( 'country' ); ?>" type="checkbox" <?php if ('1' == $country) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show country?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- Map -->
		<p>
			<label for="<?php echo $this->get_field_name( 'map' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'map' ); ?>" name="<?php echo $this->get_field_name( 'map' ); ?>" type="checkbox" <?php if ('1' == $map) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show map link (new window)?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- Phone -->
		<p>
			<label for="<?php echo $this->get_field_name( 'phone' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="checkbox" <?php if ('1' == $phone) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show phone number?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- Opening hours -->
		<p>
			<label for="<?php echo $this->get_field_name( 'opening_hours' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'opening_hours' ); ?>" name="<?php echo $this->get_field_name( 'opening_hours' ); ?>" type="checkbox" <?php if ('1' == $opening_hours) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Show opening hours?', 'wp-seopress-pro' ); ?>
			</label>
		</p>

		<!-- Hide opening hours -->
		<p>
			<label for="<?php echo $this->get_field_name( 'hide_opening_hours' ); ?>">
				<input class="widefat" id="<?php echo $this->get_field_name( 'hide_opening_hours' ); ?>" name="<?php echo $this->get_field_name( 'hide_opening_hours' ); ?>" type="checkbox" <?php if ('1' == $hide_opening_hours) echo 'checked="yes"' ?> value="1"/>
				<?php _e( 'Hide closed days?', 'wp-seopress-pro' ); ?>
			</label>
		</p>
	<?php
	}
 
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] 					= ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['desc'] 					= ( !empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		$instance['street'] 				= ( !empty( $new_instance['street'] ) ) ? strip_tags( $new_instance['street'] ) : '';
		$instance['city'] 					= ( !empty( $new_instance['city'] ) ) ? strip_tags( $new_instance['city'] ) : '';
		$instance['state'] 					= ( !empty( $new_instance['state'] ) ) ? strip_tags( $new_instance['state'] ) : '';
		$instance['code'] 					= ( !empty( $new_instance['code'] ) ) ? strip_tags( $new_instance['code'] ) : '';
		$instance['country'] 				= ( !empty( $new_instance['country'] ) ) ? strip_tags( $new_instance['country'] ) : '';
		$instance['map'] 					= ( !empty( $new_instance['map'] ) ) ? strip_tags( $new_instance['map'] ) : '';
		$instance['phone'] 					= ( !empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['opening_hours'] 			= ( !empty( $new_instance['opening_hours'] ) ) ? strip_tags( $new_instance['opening_hours'] ) : '';
		$instance['hide_opening_hours'] 	= ( !empty( $new_instance['hide_opening_hours'] ) ) ? strip_tags( $new_instance['hide_opening_hours'] ) : '';
 
		return $instance;
	}
 
} // class Local_Business_Widget