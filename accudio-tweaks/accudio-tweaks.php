<?php

/**
 * @link				https://accudio.com/development
 * @since				1.0.0
 * @package				Accudio_Tweaks
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

include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-admin.php';
include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-security.php';
include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-woocommerce.php';

include_once plugin_dir_path( __FILE__ ) . 'includes/accudio-tweaks-settings.php';