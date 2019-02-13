<?php

/**
 * @link        https://accudio.com/development
 * @since       2.0.0
 * @package     Accudio_Tweaks
 * @subpackage  Accudio_Tweaks/Admin
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
  exit;
}

// admin mods
if(!function_exists('accudio_tweaks_admin')):
  add_action( 'plugins_loaded', 'accudio_tweaks_admin' );
  function accudio_tweaks_admin() {
    if(function_exists('get_field')) {
      $options = get_field('accudio_tweaks_admin', 'options');


      // returns true if elementor is enabled
      if(!function_exists('accudio_tweaks_admin_elementor_is_enabled')) :
        function accudio_tweaks_admin_elementor_is_enabled() {
          if(in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
          }
        }
      endif;


      // returns true if yoast is enabled
      if(!function_exists('accudio_tweaks_admin_yoast_is_enabled')) :
        function accudio_tweaks_admin_yoast_is_enabled() {
          if(in_array('wordpress-seo/wp-seo.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
          }
        }
      endif;


      // returns true if user role editor is enabled
      if(!function_exists('accudio_tweaks_admin_ure_is_enabled')) :
        function accudio_tweaks_admin_ure_is_enabled() {
          if(in_array('user-role-editor/user-role-editor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
          }
        }
      endif;


      // remove Quick Edit link in page manage
      if(!function_exists('accudio_tweaks_admin_quickedit')) :
        if($options['quickedit']) {
          add_filter('post_row_actions', 'accudio_tweaks_admin_quickedit', 10, 1);
          add_filter('page_row_actions', 'accudio_tweaks_admin_quickedit', 10, 1);
        }
        function accudio_tweaks_admin_quickedit($actions) {
          if(current_user_can('manage_options')) {
            return $actions;
          };
          unset(
            $actions['inline hide-if-no-js']
          );
          return $actions;
        }
      endif;


      // remove Edit button from admin bar
      if(!function_exists('accudio_tweaks_admin_bar')) :
        if($options['bar_edit']) {
          add_action('wp_before_admin_bar_render', 'accudio_tweaks_admin_bar');
        }
        function accudio_tweaks_admin_bar() {
          if(current_user_can('manage_options')) {
            return;
          };
          global $wp_admin_bar;
          $wp_admin_bar->remove_menu('edit');
        }
      endif;


      // remove Trash link in page manage
      if(!function_exists('accudio_tweaks_admin_trash')) :
        if($options['trash']) {
          add_filter('post_row_actions','accudio_tweaks_admin_trash',10,1);
          add_filter('page_row_actions','accudio_tweaks_admin_trash',10,1);
        }
        function accudio_tweaks_admin_trash( $actions ) {
          if(current_user_can('manage_options')) {
            return $actions;
          };
          unset(
            $actions['trash']
          );
          return $actions;
        }
      endif;


      // remove Author and Comments columns in page manage
      if(!function_exists('accudio_tweaks_admin_pages_columns')) :
        if($options['columns']) {
          add_filter('manage_pages_columns', 'accudio_tweaks_admin_pages_columns');
          add_filter('manage_posts_columns', 'accudio_tweaks_admin_pages_columns');
        }
        function accudio_tweaks_admin_pages_columns($columns) {
          unset(
            $columns['author'],
            $columns['comments']
          );
          return $columns;
        }
      endif;


      // modifying edit link for use with Elementor
      if(!function_exists('accudio_tweaks_admin_edit_link')) :
        if($options['elementor'] && accudio_tweaks_admin_elementor_is_enabled()) {
          add_action('admin_footer-edit.php', 'accudio_tweaks_admin_edit_link');
        }
        function accudio_tweaks_admin_edit_link() {
          if(current_user_can('manage_options') || ($_GET['post_type'] == 'product')) {
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
            jQuery('.wp-list-table .edit_with_elementor').each(function(i, obj) {
              jQuery(obj).append(' | ').show();
              jQuery(obj).prependTo(jQuery(obj).parent());
            });
            jQuery('.wp-list-table .view').each(function(i, obj) {
              jQuery(obj).html(function() { 
                return $(this).html().replace(" | ", "");
              });
            });
          </script>
          <?php
        }
      endif;


      // remove Yoast SEO columns in page manage
      if(!function_exists('accudio_tweaks_admin_yoast_cols')) :
        if($options['yoast_columns'] && accudio_tweaks_admin_yoast_is_enabled()) {
          add_filter('manage_edit-post_columns', 'accudio_tweaks_admin_yoast_cols', 10, 1);
          add_filter('manage_edit-page_columns', 'accudio_tweaks_admin_yoast_cols', 10, 1);
        }
        function accudio_tweaks_admin_yoast_cols( $columns ) {
          unset(
            $columns['wpseo-score'],
            $columns['wpseo-score-readability'],
            $columns['wpseo-links'],
            $columns['wpseo-linked']
          );
          return $columns;
        }
      endif;

      // remove Yoast SEO filters
      if(!function_exists('accudio_tweaks_admin_yoast_filters')) :
        if($options['yoast_filters'] && accudio_tweaks_admin_yoast_is_enabled()) {
          add_action('admin_init', 'accudio_tweaks_admin_yoast_filters', 20);
        }
        function accudio_tweaks_admin_yoast_filters() {
          global $wpseo_meta_columns;
          if($wpseo_meta_columns) {
            remove_action('restrict_manage_posts', array($wpseo_meta_columns, 'posts_filter_dropdown'));
            remove_action('restrict_manage_posts', array($wpseo_meta_columns, 'posts_filter_dropdown_readability'));
          }
        }
      endif;

      // remove Yoast dashboard widget
      if(!function_exists('accudio_tweaks_admin_yoast_dashboard')) :
        if($options['yoast_dashboard'] && accudio_tweaks_admin_yoast_is_enabled()) {
          add_action('wp_dashboard_setup', 'accudio_tweaks_admin_yoast_dashboard', 999);
        }
        function accudio_tweaks_admin_yoast_dashboard() {
          global $wp_meta_boxes;
          unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
        }
      endif;

      // lower Yoast SEO metabox priority
      if(!function_exists('accudio_tweaks_admin_yoast_metabox')) :
        if($options['yoast_metabox'] && accudio_tweaks_admin_yoast_is_enabled()) {
          add_filter('wpseo_metabox_prio', 'accudio_tweaks_admin_yoast_metabox');
        }
        function accudio_tweaks_admin_yoast_metabox() {
          return 'low';
        }
      endif;

      // add WordPress GDPR caps to User Role Editor
      if(!function_exists('accudio_tweaks_admin_gdpr_group_caps')) :
        if($options['ure_gdpr_caps'] && accudio_tweaks_admin_ure_is_enabled()) {
          add_filter('ure_built_in_wp_caps', 'accudio_tweaks_admin_gdpr_group_caps', 10, 1);
        }
        function accudio_tweaks_admin_gdpr_group_caps($caps) {
          $caps['manage_privacy_options'] = array('core', 'general');
          $caps['export_others_personal_data'] = array('core', 'general');
          $caps['erase_others_personal_data'] = array('core', 'general');
          $admin_role = get_role('administrator');    
          if (isset($admin_role->capabilities['manage_privacy_options'])) {
            return $caps;        
          }
          // add privacy caps to 'administrator' role
          $roles = wp_roles();
          $old_use_db = $roles->use_db;
          $roles->use_db = true;
          $admin_role = get_role('administrator');
          $admin_role->add_cap('manage_privacy_options', true);
          $admin_role->add_cap('export_others_personal_data', true);
          $admin_role->add_cap('erase_others_personal_data', true);
          $roles->use_db = $old_use_db;            
          return $caps;
        }
      endif;

      // map WordPress GDPR caps to assignable capabilities
      if(!function_exists('accudio_tweaks_admin_gdpr_map_caps')) :
        if($options['ure_gdpr_caps'] && accudio_tweaks_admin_ure_is_enabled()) {
          add_filter('map_meta_cap', 'accudio_tweaks_admin_gdpr_map_caps', 10, 2);
        }
        function accudio_tweaks_admin_gdpr_map_caps($caps, $cap) {
          $privacy_caps = array('manage_privacy_options', 'export_others_personal_data', 'erase_others_personal_data');
          if (!in_array($cap, $privacy_caps)) {
            return $caps;
          }
          $default_cap = is_multisite() ? 'manage_network' : 'manage_options';        
          foreach ($caps as $key => $value) {
            if ($value == $default_cap) {
              unset($caps[$key]);
              break;
            }
          }
          $caps[] = $cap;
          return $caps;
        }
      endif;

    }
  }
endif;


