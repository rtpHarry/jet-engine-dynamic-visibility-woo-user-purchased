<?php

namespace Runthings_Woo_User_Purchased;

use Elementor\Controls_Manager;

class WooUserPurchased extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base
{

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id()
	{
		return 'runthings-woo-user-purchased';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name()
	{
		return __('User has purchased product', 'rtp-woo-user-purchased');
	}

	/**
	 * Returns group for current operator
	 *
	 * @return string
	 */
	public function get_group()
	{
		return 'user';
	}

	/**
	 * Check condition by passed arguments
	 *
	 * @param array $args
	 *
	 * @return bool
	 */
	public function check($args = array())
	{
		$type = !empty($args['type']) ? $args['type'] : 'show';

		$settings = $args['condition_settings'];

		$product_id = !empty( $settings['product_id'] ) ? $settings['product_id'] : null;

		$is_purchased = false;
        if (function_exists('wc_customer_bought_product')) {
            $is_purchased = wc_customer_bought_product('', get_current_user_id(), $product_id);
        }

		return $this->get_result($type, $is_purchased);
	}

	/**
	 * Return condition check status depends on condition type
	 *
	 * @param  [type] $type   [description]
	 * @param  [type] $result [description]
	 * @return [type]         [description]
	 */
	public function get_result($type, $result)
	{
		if ('hide' === $type) {
			return !$result;
		} else {
			return $result;
		}
	}

	/**
	 * Check if is condition available for meta fields control
	 *
	 * @return boolean
	 */
	public function is_for_fields()
	{
		return false;
	}

	/**
	 * Check if is condition available for meta value control
	 *
	 * @return boolean
	 */
	public function need_value_detect()
	{
		return false;
	}

	/**
	 * Returns custom controls for this visibity
	 */
	public function get_custom_controls()
	{
		return array(
			'product_id' => array(
				'label' => esc_html__( 'Product Id', 'rtp-woo-user-purchased' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'description' => __('WooCommerce product id', 'rtp-woo-user-purchased'),
			),
		);
	}
}
