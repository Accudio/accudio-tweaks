<?php

/**
 * @link				https://accudio.com/development
 * @since				1.0.0
 * @package				Accudio_Tweaks
 * @subpackage			Accudio_Tweaks/WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:			Accudio Tweaks
 * Plugin URI:			https://accudio.com/development
 * Description:			Custom tweaks to Wordpress, Woocommerce and Wordpress security.
 * Version:				1.0.0
 * Author:				Alistair Shepherd — Accudio
 * Author URI:			https://accudio.com/about
 * License:				GPL-3.0+
 * License URI:			http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* returns true if woocommerce is enabled */
function accudio_tweaks_woocomm_is_enabled() {
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	}
}

/* hide out of stock products from frontend */
function accudio_tweaks_woocomm_hide_outstock( $q ) {
	if ( ! $q->is_main_query() || is_admin() ) {
		return;
	}
	if ( $outofstock_term = get_term_by( 'name', 'outofstock', 'product_visibility' ) ) {
		$tax_query = (array) $q->get('tax_query');
		$tax_query[] = array(
			'taxonomy' => 'product_visibility',
			'field' => 'term_taxonomy_id',
			'terms' => array( $outofstock_term->term_taxonomy_id ),
			'operator' => 'NOT IN'
		);
		$q->set( 'tax_query', $tax_query );
	}
	remove_action( 'pre_get_posts', 'accudio_tweaks_woocomm_hide_outstock' );
}

/* hide SKU on product pages */
function accudio_tweaks_woocomm_hide_sku( $enabled ) {
	if ( ! is_admin() && is_product() ) {
		return false;
	}
	return $enabled;
}

/* remove woocommmerce sidebar */
function accudio_tweaks_woocomm_remove_sidebar() {
  if ( is_woocommerce() ) {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
  }
  if ( is_product() ) {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
  }
}


/* hide out of stock products from frontend */
if ((get_option('accudio_tweaks_woocomm_hide_outstock', '0') == '1') && accudio_tweaks_woocomm_is_enabled()) {
	add_action( 'pre_get_posts', 'accudio_tweaks_woocomm_hide_outstock' );
}

/* hide display of shipping dimensions */
if ((get_option('accudio_tweaks_woocomm_shipping', '0') == '1') && accudio_tweaks_woocomm_is_enabled()) {
	add_filter( 'wc_product_enable_dimensions_display', '__return_false' );
}

/* hide SKU on product pages */
if ((get_option('accudio_tweaks_woocomm_sku', '0') == '1') && accudio_tweaks_woocomm_is_enabled()) {
	add_filter( 'wc_product_sku_enabled', 'accudiowoocommtweaks_hide_sku' );
}

/* remove woocommmerce sidebar */
if ((get_option('accudio_tweaks_woocomm_sidebar', '0') == '1') && accudio_tweaks_woocomm_is_enabled()) {
	add_action( 'get_header', 'accudio_tweaks_woocomm_remove_sidebar' );
}