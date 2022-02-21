<?php
/**
 * Plugin Name: JetEngine - Dynamic Visibility - Woocommerce - Has User Purchased Product
 * Plugin URI:  https://github.com/rtpHarry/jet-engine-dynamic-visibility-woo-user-purchased
 * Description: Add custom conditions for displaying elements if the user has purchased a product
 * Version:     0.5.0
 * Author:      Matthew Harris, runthings.dev
 * Author URI:  https://runthings.dev/
 * Text Domain: rtp-woo-user-purchased
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

// Init plugin after loading
add_action( 'plugins_loaded', 'runthings_setup_woo_user_purchased' );

/**
 * Initialize plugin
 */
function runthings_setup_woo_user_purchased() {

	define( 'RTP_USER_PURCHASED__FILE__', __FILE__ );
	define( 'RTP_USER_PURCHASED_PATH', plugin_dir_path( RTP_USER_PURCHASED__FILE__ ) );

	add_action( 'jet-engine/modules/dynamic-visibility/conditions/register', function( $conditions_manager ) {

		require RTP_USER_PURCHASED_PATH . 'conditions/user-purchased.php';

		$conditions_manager->register_condition( new Runthings_Woo_User_Purchased\WooUserPurchased() );

	} );

}
