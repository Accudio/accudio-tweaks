<?php

/**
 * @link        https://accudio.com/development
 * @since       1.0.0
 * @package     Accudio_Tweaks
 *
 * @wordpress-plugin
 * Plugin Name:       Accudio Tweaks
 * Plugin URI:        https://accudio.com/development
 * Description:       Custom tweaks to Wordpress, Woocommerce and Wordpress security.
 * Version:           2.2.0
 * Author:            Alistair Shepherd — Accudio
 * Author URI:        https://accudio.com/about
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * GitHub Plugin URI: https://github.com/accudio/accudio-tweaks
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-admin.php';
include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-security.php';
include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-woocommerce.php';

include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-settings.php';


// plugin activation and acf dependency check
if(!function_exists('accudio_tweaks_install')) {
  function accudio_tweaks_install() {
    // check if acf pro or free is active
    if(!in_array('advanced-custom-fields-pro/acf.php', apply_filters('active_plugins', get_option( 'active_plugins' )))) {
      
      // deactivate the plugin
      deactivate_plugins(__FILE__);
      
      // throw error
      $error_message = sprintf(__('This plugin requires <a href="%s" target="_blank" rel="noopener noreferrer">Advanced Custom Fields Pro</a> installed and active.', 'accudio-tweaks'), 'https://www.advancedcustomfields.com/');
      die($error_message);
    }
  }
}
register_activation_hook( __FILE__, 'accudio_tweaks_install' );