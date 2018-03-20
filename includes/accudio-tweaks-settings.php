<?php

/**
 * @link				https://accudio.com/development
 * @since				1.1.0
 * @package				Accudio_Tweaks
 * @subpackage			Accudio_Tweaks/Settings
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// enqueue styles for settings page
function accudio_tweaks_settings_assets() {
   if ( !current_user_can('manage_options') ) {
	  return;
   };
   wp_enqueue_style('settings_style' , plugin_dir_url( __FILE__ ) . '../assets/css/settings.css' );
   wp_enqueue_script('settings_script' , plugin_dir_url( __FILE__ ) . '../assets/js/settings.js' );
}

add_action('admin_head', 'accudio_tweaks_settings_assets');


// function to create option page in admin under 'settings'
function accudio_tweaks_settings_init() {

	$page_title = 'Accudio Tweaks';
	$menu_title = 'Accudio Tweaks';
	$capability = 'manage_options';
	$menu_slug = 'accudio-tweaks';
	$function = 'accudio_tweaks_settings_display';

	add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
}

add_action('admin_menu', 'accudio_tweaks_settings_init');


function accudio_tweaks_settings_update() {

	// nonce technology helps ensure form submission is legitimate 
	if (isset( $_POST['accudio_tweaks_settings_save'] ) && !wp_verify_nonce( $_POST['accudio_tweaks_settings_nonce'], 'accudio_tweaks_settings_save' )) {
		wp_die('Nonce verification failed');
	}

	// admin options
	if (isset($_POST['accudio_tweaks_admin_quickedit'])) {
		update_option('accudio_tweaks_admin_quickedit', $_POST['accudio_tweaks_admin_quickedit']);
	};
	if (isset($_POST['accudio_tweaks_admin_bar_edit'])) {
		update_option('accudio_tweaks_admin_bar_edit', $_POST['accudio_tweaks_admin_bar_edit']);
	};
	if (isset($_POST['accudio_tweaks_admin_trash'])) {
		update_option('accudio_tweaks_admin_trash', $_POST['accudio_tweaks_admin_trash']);
	};
	if (isset($_POST['accudio_tweaks_admin_authorcomments'])) {
		update_option('accudio_tweaks_admin_authorcomments', $_POST['accudio_tweaks_admin_authorcomments']);
	};
	if (isset($_POST['accudio_tweaks_admin_elementor'])) {
		update_option('accudio_tweaks_admin_elementor', $_POST['accudio_tweaks_admin_elementor']);
	};
	if (isset($_POST['accudio_tweaks_admin_yoast_cols'])) {
		update_option('accudio_tweaks_admin_yoast_cols', $_POST['accudio_tweaks_admin_yoast_cols']);
	};
	if (isset($_POST['accudio_tweaks_admin_yoast_filters'])) {
		update_option('accudio_tweaks_admin_yoast_filters', $_POST['accudio_tweaks_admin_yoast_filters']);
	};

	// security options
	if (isset($_POST['accudio_tweaks_security_https'])) {
		update_option('accudio_tweaks_security_https', $_POST['accudio_tweaks_security_https']);
	};
	if (isset($_POST['accudio_tweaks_security_frame'])) {
		update_option('accudio_tweaks_security_frame', $_POST['accudio_tweaks_security_frame']);
	};
	if (isset($_POST['accudio_tweaks_security_frame_whitelist'])) {
		update_option('accudio_tweaks_security_frame_whitelist', $_POST['accudio_tweaks_security_frame_whitelist']);
	};
	if (isset($_POST['accudio_tweaks_security_csp_default'])) {
		update_option('accudio_tweaks_security_csp_default', $_POST['accudio_tweaks_security_csp_default']);
	};
	if (isset($_POST['accudio_tweaks_security_csp_script'])) {
		update_option('accudio_tweaks_security_csp_script', $_POST['accudio_tweaks_security_csp_script']);
	};
	if (isset($_POST['accudio_tweaks_security_csp_style'])) {
		update_option('accudio_tweaks_security_csp_style', $_POST['accudio_tweaks_security_csp_style']);
	};
	if (isset($_POST['accudio_tweaks_security_csp_font'])) {
		update_option('accudio_tweaks_security_csp_font', $_POST['accudio_tweaks_security_csp_font']);
	};
	if (isset($_POST['accudio_tweaks_security_csp_img'])) {
		update_option('accudio_tweaks_security_csp_img', $_POST['accudio_tweaks_security_csp_img']);
	};
	if (isset($_POST['accudio_tweaks_security_csp_frame'])) {
		update_option('accudio_tweaks_security_csp_frame', $_POST['accudio_tweaks_security_csp_frame']);
	};
	if (isset($_POST['accudio_tweaks_security_csp_object'])) {
		update_option('accudio_tweaks_security_csp_object', $_POST['accudio_tweaks_security_csp_object']);
	};

	// woocommerce options
	if (isset($_POST['accudio_tweaks_woocomm_outstock'])) {
		update_option('accudio_tweaks_woocomm_outstock', $_POST['accudio_tweaks_woocomm_outstock']);
	};
	if (isset($_POST['accudio_tweaks_woocomm_shipping'])) {
		update_option('accudio_tweaks_woocomm_shipping', $_POST['accudio_tweaks_woocomm_shipping']);
	};
	if (isset($_POST['accudio_tweaks_woocomm_sku'])) {
		update_option('accudio_tweaks_woocomm_sku', $_POST['accudio_tweaks_woocomm_sku']);
	};
	if (isset($_POST['accudio_tweaks_woocomm_sidebar'])) {
		update_option('accudio_tweaks_woocomm_sidebar', $_POST['accudio_tweaks_woocomm_sidebar']);
	};


	wp_redirect(admin_url('admin.php?page=accudio-tweaks'), 303);
}
add_action('admin_post_accudio_tweaks_update_options', 'accudio_tweaks_settings_update');


// display option page
function accudio_tweaks_settings_display() {

	// check current user is authorised to access page
	if (!current_user_can('manage_options')) {
		wp_die('You are not authorised to access this page');
	};


	// get values for form

	// admin
	if (get_option('accudio_tweaks_admin_quickedit', '0') == '1') {
		$accudio_tweaks_admin_quickedit_value = ' checked';
	} else {
		$accudio_tweaks_admin_quickedit_value = '';
	};
	if (get_option('accudio_tweaks_admin_bar_edit', '0') == '1') {
		$accudio_tweaks_admin_bar_edit_value = ' checked';
	} else {
		$accudio_tweaks_admin_bar_edit_value = '';
	};
	if (get_option('accudio_tweaks_admin_trash', '0') == '1') {
		$accudio_tweaks_admin_trash_value = ' checked';
	} else {
		$accudio_tweaks_admin_trash_value = '';
	};
	if (get_option('accudio_tweaks_admin_authorcomments', '0') == '1') {
		$accudio_tweaks_admin_authorcomments_value = ' checked';
	} else {
		$accudio_tweaks_admin_authorcomments_value = '';
	};
	if (get_option('accudio_tweaks_admin_elementor', '0') == '1') {
		$accudio_tweaks_admin_elementor_value = ' checked';
	} else {
		$accudio_tweaks_admin_elementor_value = '';
	};
	if (get_option('accudio_tweaks_admin_yoast_cols', '0') == '1') {
		$accudio_tweaks_admin_yoast_cols_value = ' checked';
	} else {
		$accudio_tweaks_admin_yoast_cols_value = '';
	};
	if (get_option('accudio_tweaks_admin_yoast_filters', '0') == '1') {
		$accudio_tweaks_admin_yoast_filters_value = ' checked';
	} else {
		$accudio_tweaks_admin_yoast_filters_value = '';
	};

	// security
	if (get_option('accudio_tweaks_security_https', '1') == '1') {
		$accudio_tweaks_security_https_value = ' checked';
	} else {
		$accudio_tweaks_security_https_value = '';
	};
	$accudio_tweaks_security_frame_value = get_option('accudio_tweaks_security_frame', 'SAMEORIGIN');
	$accudio_tweaks_security_frame_whitelist_value = get_option('accudio_tweaks_security_frame_whitelist', '');
	$accudio_tweaks_security_csp_default_value = stripslashes( get_option('accudio_tweaks_security_csp_default', "'self'") );
	$accudio_tweaks_security_csp_script_value = stripslashes( get_option('accudio_tweaks_security_csp_script', "'self' 'unsafe-inline'") );
	$accudio_tweaks_security_csp_style_value = stripslashes( get_option('accudio_tweaks_security_csp_style', "'self' 'unsafe-inline'") );
	$accudio_tweaks_security_csp_font_value = stripslashes( get_option('accudio_tweaks_security_csp_font', "'self'") );
	$accudio_tweaks_security_csp_img_value = stripslashes( get_option('accudio_tweaks_security_csp_img', "'self'") );
	$accudio_tweaks_security_csp_frame_value = stripslashes( get_option('accudio_tweaks_security_csp_frame', "'self'") );
	$accudio_tweaks_security_csp_object_value = stripslashes( get_option('accudio_tweaks_security_csp_object', "'none'") );

	// woocommerce
	if (get_option('accudio_tweaks_woocomm_outstock', '0') == '1') {
		$accudio_tweaks_woocomm_outstock_value = ' checked';
	} else {
		$accudio_tweaks_woocomm_outstock_value = '';
	};
	if (get_option('accudio_tweaks_woocomm_shipping', '0') == '1') {
		$accudio_tweaks_woocomm_shipping_value = ' checked';
	} else {
		$accudio_tweaks_woocomm_shipping_value = '';
	};
	if (get_option('accudio_tweaks_woocomm_sku', '0') == '1') {
		$accudio_tweaks_woocomm_sku_value = ' checked';
	} else {
		$accudio_tweaks_woocomm_sku_value = '';
	};
	if (get_option('accudio_tweaks_woocomm_sidebar', '0') == '1') {
		$accudio_tweaks_woocomm_sidebar_value = ' checked';
	} else {
		$accudio_tweaks_woocomm_sidebar_value = '';
	};

	

	// load form
	include 'accudio-tweaks-settings-display.php';
}
