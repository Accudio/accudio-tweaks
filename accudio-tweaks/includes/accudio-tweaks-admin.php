<?php

/**
 * @link						https://accudio.com/development
 * @since					1.0.0
 * @package					Accudio_Tweaks
 * @subpackage				Accudio_Tweaks/WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:			Accudio Tweaks
 * Plugin URI:				https://accudio.com/development
 * Description:			Custom tweaks to Wordpress, Woocommerce and Wordpress security.
 * Version:					1.0.0
 * Author:					Alistair Shepherd — Accudio
 * Author URI:				https://accudio.com/about
 * License:					GPL-3.0+
 * License URI:			http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	 exit;
}


/* returns true if elementor is enabled */
function accudio_tweaks_admin_elementor_is_enabled() {
	if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		 return true;
	}
}
/* returns true if yoast is enabled */
function accudio_tweaks_admin_yoast_is_enabled() {
	if ( in_array( 'wordpress-seo/wp-seo.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		 return true;
	}
}

/* custom styling for custom admin panel */
function accudio_tweaks_admin_styles() {
	if ( current_user_can('manage_options') ) {
		return;
	};
	wp_enqueue_style('style_admin' , plugin_dir_url( __FILE__ ) . 'admin.css' );
}
add_action('admin_head', 'accudio_tweaks_admin_styles');


/* remove Edit button from admin bar */
function accudio_tweaks_admin_bar() {
	if ( current_user_can('manage_options') ) {
		return;
	};
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('edit');
}

/* remove Quick Edit link in page manage */
function accudio_tweaks_admin_quickedit( $actions ) {
	if ( current_user_can('manage_options') ) {
		return $actions;
	};
	unset(
		$actions['inline hide-if-no-js']
	);
	return $actions;
}

/* remove Trash link in page manage */
function accudio_tweaks_admin_trash( $actions ) {
	if ( current_user_can('manage_options') ) {
		return $actions;
	};
	unset(
		$actions['trash']
	);
	return $actions;
}

/* modifying edit link */
function accudio_tweaks_admin_edit_link() {
	if ( current_user_can('manage_options') || ($_GET['post_type'] == 'product')) {
		return;
	};
	?>
	<script type="text/javascript">
		jQuery('.wp-list-table a.row-title').each(function(i, obj) {
			var newLink = jQuery(obj).attr('href').slice(0,-4).concat('elementor')
			jQuery(obj).attr('href', newLink);
		});
		jQuery('.wp-list-table .edit a').each(function(i, obj) {
			jQuery(obj).text('Advanced Edit')
		});
		jQuery('.wp-list-table .edit_with_elementor a').each(function(i, obj) {
			jQuery(obj).text('Simple Edit')
		});
	</script>
	<?php
}

/* remove Author and Comments columns in page manage */
function accudio_tweaks_admin_pages_columns( $columns ) {
	unset(
		$columns['author'],
		$columns['comments']
	);
	return $columns;
}

/* remove Yoast SEO columns in page manage */
function accudio_tweaks_admin_yoast_cols( $columns ) {
	unset(
		$columns['wpseo-score'],
		$columns['wpseo-score-readability'],
		$columns['wpseo-links'],
		$columns['wpseo-linked']
	);
	return $columns;
}

/* remove Yoast SEO filters */
function accudio_tweaks_admin_yoast_filters() {
	global $wpseo_meta_columns;

	if ( $wpseo_meta_columns ) {
		remove_action( 'restrict_manage_posts', array( $wpseo_meta_columns, 'posts_filter_dropdown' ) );
		remove_action( 'restrict_manage_posts', array( $wpseo_meta_columns, 'posts_filter_dropdown_readability' ) );
	}
}


/* remove Quick Edit link in page manage */
if ( get_option('accudio_tweaks_admin_quickedit', '0') == '1' ) {
	add_filter('post_row_actions','accudio_tweaks_admin_quickedit',10,1);
	add_filter('page_row_actions','accudio_tweaks_admin_quickedit',10,1);
}

/* remove Edit button from admin bar */
if ( get_option('accudio_tweaks_admin_bar_edit', '0') == '1' ) {
	add_action( 'wp_before_admin_bar_render', 'accudio_tweaks_admin_bar' );
}

/* remove Trash link in page manage */
if ( get_option('accudio_tweaks_admin_trash', '0') == '1' ) {
	add_filter('post_row_actions','accudio_tweaks_admin_trash',10,1);
	add_filter('page_row_actions','accudio_tweaks_admin_trash',10,1);
}

/* remove Author and Comments columns in page manage */
if ( get_option('accudio_tweaks_admin_authorcomments', '0') == '1' ) {
	add_filter( 'manage_pages_columns', 'accudio_tweaks_admin_pages_columns' );
}

/* modifying edit link with Elementor */
if ((get_option('accudio_tweaks_admin_elementor', '0') == '1') && accudio_tweaks_admin_elementor_is_enabled()) {
	add_action( 'admin_footer-edit.php', 'accudio_tweaks_admin_edit_link' );
}

/* remove Yoast SEO columns in page manage */
if ((get_option('accudio_tweaks_admin_yoast_cols', '0') == '1') && accudio_tweaks_admin_yoast_is_enabled()) {
	add_filter ( 'manage_edit-page_columns', 'accudio_tweaks_admin_yoast_cols' );
}

/* remove Yoast SEO filters */
if ((get_option('accudio_tweaks_admin_yoast_filters', '0') == '1') && accudio_tweaks_admin_yoast_is_enabled()) {
	add_action( 'admin_init', 'accudio_tweaks_admin_yoast_filters', 20 );
}