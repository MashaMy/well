<?php
	/**
	 * Created by PhpStorm.
	 * User: Bestfreebie
	 * Date: 02/04/2020
	 * Time: 3:23 PM
	 */
	
	if ( ! defined( 'ABSPATH' ) ) {
		return;
	}
	
	$status='default';
	
	
	if (isset( $_POST['bestfreebie_nonce_field'] ) ) {
		if ( isset( $_POST['bestfreebie_icons_fonts'] ) && wp_verify_nonce( $_POST['bestfreebie_nonce_field'], 'bestfreebie-action' ) && current_user_can( 'manage_options' ) ) {
			update_option( 'bestfreebie_icons_fonts', sanitize_key( $_POST['bestfreebie_icons_fonts'] ) );
			$status = true;
		}else {
			$status = false;
		}
	}
	
	$options = get_option( 'bestfreebie_icons_fonts' );
?>

    <div class="wrap">
        <h2><?php echo esc_html__( 'Icon and CSS setup', 'bestfreebie-elementor' ) ?></h2>
        <div class="wrap">
            <form method="post" name="bestfreebie_custom_form" id="bestfreebie_custom_form"
                  action="admin.php?page=bestfreebie-elementor-custom-icons">
                <select name="bestfreebie_icons_fonts">
                    <option value="bestfreebie_default" <?php selected( $options, 'bestfreebie_default' ); ?>><?php echo esc_html__( 'Fontawesome', 'bestfreebie-elementor' ) ?></option>
                    <option value="free-ionicons" <?php selected( $options, 'free-ionicons' ); ?>><?php echo esc_html__( 'Ionicons', 'bestfreebie-elementor' ) ?></option>
                    <option value="free-simpleicon" <?php selected( $options, 'free-simpleicon' ); ?>><?php echo esc_html__( 'Simple Icons', 'bestfreebie-elementor' ) ?></option>
                    <option value="free-materialicon" <?php selected( $options, 'free-materialicon' ); ?>><?php echo esc_html__( 'Google Material Icons', 'bestfreebie-elementor' ) ?></option>
                    <option value="free-metrize" <?php selected( $options, 'free-metrize' ); ?>><?php echo esc_html__( 'Metrize Icons', 'bestfreebie-elementor' ) ?></option>
                </select>
                <span class="submit"><input name="save" type="submit" value="Save changes"/></span>
				<?php wp_nonce_field( 'bestfreebie-action', 'bestfreebie_nonce_field' ); ?>
            </form>
        </div>
    </div>
<?php
	if ( $status===true ) {
		echo '<div class="notice notice-success is-dismissible">
        			<p>' . esc_html__( 'Update Successful.', 'bestfreebie-elementor' ) . '</p>
    			 </div>';
	}elseif($status===false){
		echo '<div class="notice notice-error is-dismissible">
        			<p>' . esc_html__( 'Authentication Failed.', 'bestfreebie-elementor' ) . '</p>
    			 </div>';
    }
?>