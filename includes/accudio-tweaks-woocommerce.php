<?php

/**
 * @link        https://accudio.com/development
 * @since       2.0.0
 * @package     Accudio_Tweaks
 * @subpackage  Accudio_Tweaks/WooCommerce
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// woocommerce mods
if(!function_exists('accudio_tweaks_woocomm')):
  add_action( 'plugins_loaded', 'accudio_tweaks_woocomm' );
  function accudio_tweaks_woocomm() {
    if(function_exists('get_field')) {
      $options = get_field('accudio_tweaks_woocomm', 'options');


      // returns true if woocommerce is enabled
      if(!function_exists('accudio_tweaks_woocomm_is_enabled')) :
        function accudio_tweaks_woocomm_is_enabled() {
          if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
          }
        }
      endif;


      // hide out of stock products from frontend
      if(!function_exists('accudio_tweaks_woocomm_outofstock')) :
        if($options['outofstock'] && accudio_tweaks_woocomm_is_enabled()) {
          add_action('pre_get_posts', 'accudio_tweaks_woocomm_outofstock');
        }
        function accudio_tweaks_woocomm_outofstock($q) {
          if(!$q->is_main_query() || is_admin()) {
            return;
          }
          if($outofstock_term = get_term_by('name', 'outofstock', 'product_visibility')) {
            $tax_query = (array) $q->get('tax_query');
            $tax_query[] = array(
              'taxonomy' => 'product_visibility',
              'field' => 'term_taxonomy_id',
              'terms' => array( $outofstock_term->term_taxonomy_id ),
              'operator' => 'NOT IN'
            );
            $q->set('tax_query', $tax_query);
          }
          remove_action('pre_get_posts', 'accudio_tweaks_woocomm_hide_outstock');
        }
      endif;


      // hide shipping dimensions from frontend
      if($options['shipping_dimensions'] && accudio_tweaks_woocomm_is_enabled()) {
        add_filter('wc_product_enable_dimensions_display', '__return_false');
      }


      // hide SKU on product pages
      if(!function_exists('accudio_tweaks_woocomm_hide_sku')) :
        if($options['sku'] && accudio_tweaks_woocomm_is_enabled()) {
          add_filter( 'wc_product_sku_enabled', 'accudio_tweaks_woocomm_hide_sku' );
        }
        function accudio_tweaks_woocomm_hide_sku( $enabled ) {
          if(!is_admin() && is_product()) {
            return false;
          }
          return $enabled;
        }
      endif;


      // remove woocommmerce sidebar
      if(!function_exists('accudio_tweaks_woocomm_remove_sidebar')) :
        if($options['sidebar'] && accudio_tweaks_woocomm_is_enabled()) {
          add_action('get_header', 'accudio_tweaks_woocomm_remove_sidebar');
        }
        function accudio_tweaks_woocomm_remove_sidebar() {
          if(is_woocommerce()) {
            remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
          }
          if(is_product()) {
            remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
          }
        }
      endif;


    }
  }
endif;
