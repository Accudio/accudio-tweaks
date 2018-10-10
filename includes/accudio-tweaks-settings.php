<?php

/**
 * @link        https://accudio.com/development
 * @since       2.0.0
 * @package     Accudio_Tweaks
 * @subpackage  Accudio_Tweaks/Settings
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// add options page
if(!function_exists('accudio_tweaks_settings_page')):
  add_action( 'plugins_loaded', 'accudio_tweaks_settings_page' );
  function accudio_tweaks_settings_page() {
    if(function_exists('acf_add_options_sub_page')) {
      acf_add_options_sub_page(array(
        'page_title'  => 'Accudio Tweaks',
        'capability'  => 'manage_options',
        'parent_slug' => 'options-general.php',
        'menu_slug'   => 'accudio-tweaks'
      ));
    }
  }
endif;


// enqueue styles for settings page
if(!function_exists('accudio_tweaks_settings_assets')):
  add_action('admin_head', 'accudio_tweaks_settings_assets');
  function accudio_tweaks_settings_assets() {
    if ( !current_user_can('manage_options') ) {
      return;
    };
    wp_enqueue_style('settings_style' , plugin_dir_url( __FILE__ ) . '../assets/css/settings.css' );
    wp_enqueue_script('settings_script' , plugin_dir_url( __FILE__ ) . '../assets/js/settings.js' );
  }
endif;


// add options
if(!function_exists('accudio_tweaks_settings_options')):
  add_action( 'plugins_loaded', 'accudio_tweaks_settings_options', 0 );
  function accudio_tweaks_settings_options() {

    if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
      'key' => 'group_5bbe1a307bb35',
      'title' => 'Admin Tweaks',
      'fields' => array(
        array(
          'key' => 'field_5bbe1bc70b300',
          'label' => '',
          'name' => 'accudio_tweaks_admin',
          'type' => 'group',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => 'check-table',
            'id' => '',
          ),
          'layout' => 'row',
          'sub_fields' => array(
            array(
              'key' => 'field_5bbe1a4709b80',
              'label' => 'Remove \'Quick Edit\' link from page manager',
              'name' => 'quickedit',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1a9009b81',
              'label' => 'Remove \'Edit\' link from admin bar',
              'name' => 'bar_edit',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1ab109b82',
              'label' => 'Remove \'Trash\' link from page manager',
              'name' => 'trash',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1ac109b83',
              'label' => 'Remove \'Author\' and \'Comments\' columns from page manager',
              'name' => 'columns',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1ada09b85',
              'label' => 'Change \'Edit\' link in page manager to edit with Elementor',
              'name' => 'elementor',
              'type' => 'true_false',
              'instructions' => '<a href="https://elementor.com/" target="_blank" rel="noopener noreferrer">Elementor</a> is required for this setting to have any effect.',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1b3109b86',
              'label' => 'Remove Yoast SEO columns in page manager',
              'name' => 'yoast_columns',
              'type' => 'true_false',
              'instructions' => '<a href="https://yoast.com/wordpress/plugins/seo/" target="_blank" rel="noopener noreferrer">Yoast SEO</a> is required for this setting to have any effect.',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1b9209b87',
              'label' => 'Remove Yoast SEO filters in page manager',
              'name' => 'yoast_filters',
              'type' => 'true_false',
              'instructions' => '<a href="https://yoast.com/wordpress/plugins/seo/" target="_blank" rel="noopener noreferrer">Yoast SEO</a> is required for this setting to have any effect.',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1ba109b88',
              'label' => 'Remove Yoast SEO widget on Dashboard',
              'name' => 'yoast_dashboard',
              'type' => 'true_false',
              'instructions' => '<a href="https://yoast.com/wordpress/plugins/seo/" target="_blank" rel="noopener noreferrer">Yoast SEO</a> is required for this setting to have any effect.',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
          ),
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'accudio-tweaks',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => 1,
      'description' => '',
    ));

    acf_add_local_field_group(array(
      'key' => 'group_5bbe128f9d82c',
      'title' => 'Security Tweaks',
      'fields' => array(
        array(
          'key' => 'field_5bbe29725ced4',
          'label' => '',
          'name' => 'accudio_tweaks_security',
          'type' => 'group',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => 'fill',
            'id' => '',
          ),
          'layout' => 'block',
          'sub_fields' => array(
            array(
              'key' => 'field_5bbe12a926fa3',
              'label' => 'Enforce HTTPS',
              'name' => 'enforce_https',
              'type' => 'true_false',
              'instructions' => '<a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security" target="_blank" rel="noopener noreferrer">More info</a>',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe14542d6bf',
              'label' => 'Frame Options',
              'name' => 'frame_options',
              'type' => 'group',
              'instructions' => '<a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options" target="_blank" rel="noopener noreferrer">More info</a>',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => 'expand',
                'id' => '',
              ),
              'layout' => 'block',
              'sub_fields' => array(
                array(
                  'key' => 'field_5bbe134ba4359',
                  'label' => '',
                  'name' => 'select',
                  'type' => 'select',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'choices' => array(
                    'ALLOWALL' => 'All Allowed',
                    'ALLOW-FROM' => 'Whitelist',
                    'SAMEORIGIN' => 'Same Origin',
                    'DENY' => 'Deny',
                  ),
                  'default_value' => array(
                    0 => 'SAMEORIGIN',
                  ),
                  'allow_null' => 0,
                  'multiple' => 0,
                  'ui' => 1,
                  'ajax' => 0,
                  'return_format' => 'value',
                  'placeholder' => '',
                ),
                array(
                  'key' => 'field_5bbe147e2d6c0',
                  'label' => '',
                  'name' => 'whitelist',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => array(
                    array(
                      array(
                        'field' => 'field_5bbe134ba4359',
                        'operator' => '==',
                        'value' => 'ALLOW-FROM',
                      ),
                    ),
                  ),
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => 'field_5bbe14a02d6c1',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe14a02d6c1',
                      'label' => '',
                      'name' => 'condition',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
              ),
            ),
            array(
              'key' => 'field_5bbe3e5a533b4',
              'label' => 'Referrer Policy',
              'name' => 'referrer_policy',
              'type' => 'select',
              'instructions' => '<a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Referrer-Policy" target="_blank" rel="noopener noreferrer">More info</a>',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'choices' => array(
                'no-referrer' => 'No referrer',
                'no-referrer-when-downgrade' => 'No referrer when downgrading',
                'origin' => 'Origin',
                'origin-when-cross-origin' => 'Origin when cross-origin',
                'same-origin' => 'Same origin',
                'strict-origin' => 'Strict origin',
                'strict-origin-when-cross-origin' => 'Strict origin when cross-origin',
              ),
              'default_value' => array(
                0 => 'no-referrer-when-downgrade',
              ),
              'allow_null' => 0,
              'multiple' => 0,
              'ui' => 1,
              'ajax' => 0,
              'return_format' => 'value',
              'placeholder' => '',
            ),
            array(
              'key' => 'field_5bbe17663df43',
              'label' => 'Content Security Policy',
              'name' => 'csp',
              'type' => 'group',
              'instructions' => '<a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy" target="_blank" rel="noopener noreferrer">More info</a>',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'layout' => 'block',
              'sub_fields' => array(
                array(
                  'key' => 'field_5bbe185f3df47',
                  'label' => 'Default Policy',
                  'name' => '',
                  'type' => 'accordion',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'open' => 0,
                  'multi_expand' => 0,
                  'endpoint' => 0,
                ),
                array(
                  'key' => 'field_5bbe187a3df48',
                  'label' => '',
                  'name' => 'primary_policy',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => '',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe18a03df49',
                      'label' => '',
                      'name' => 'source',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
                array(
                  'key' => 'field_5bbe1906d65ef',
                  'label' => 'Script Policy',
                  'name' => '',
                  'type' => 'accordion',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'open' => 0,
                  'multi_expand' => 0,
                  'endpoint' => 0,
                ),
                array(
                  'key' => 'field_5bbe195bd65f3',
                  'label' => '',
                  'name' => 'script_policy',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => '',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe195bd65f4',
                      'label' => '',
                      'name' => 'source',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
                array(
                  'key' => 'field_5bbe1905d65ee',
                  'label' => 'Style Policy',
                  'name' => '',
                  'type' => 'accordion',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'open' => 0,
                  'multi_expand' => 0,
                  'endpoint' => 0,
                ),
                array(
                  'key' => 'field_5bbe1969d65f5',
                  'label' => '',
                  'name' => 'style_policy',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => '',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe1969d65f6',
                      'label' => '',
                      'name' => 'source',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
                array(
                  'key' => 'field_5bbe1928d65f0',
                  'label' => 'Font Policy',
                  'name' => '',
                  'type' => 'accordion',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'open' => 0,
                  'multi_expand' => 0,
                  'endpoint' => 0,
                ),
                array(
                  'key' => 'field_5bbe196ed65f7',
                  'label' => '',
                  'name' => 'font_policy',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => '',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe196ed65f8',
                      'label' => '',
                      'name' => 'source',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
                array(
                  'key' => 'field_5bbe1901d65ed',
                  'label' => 'Image Policy',
                  'name' => '',
                  'type' => 'accordion',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'open' => 0,
                  'multi_expand' => 0,
                  'endpoint' => 0,
                ),
                array(
                  'key' => 'field_5bbe1972d65f9',
                  'label' => '',
                  'name' => 'image_policy',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => '',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe1972d65fa',
                      'label' => '',
                      'name' => 'source',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
                array(
                  'key' => 'field_5bbe1943d65f2',
                  'label' => 'Frame Policy',
                  'name' => '',
                  'type' => 'accordion',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'open' => 0,
                  'multi_expand' => 0,
                  'endpoint' => 0,
                ),
                array(
                  'key' => 'field_5bbe1976d65fb',
                  'label' => '',
                  'name' => 'frame_policy',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => '',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe1976d65fc',
                      'label' => '',
                      'name' => 'source',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
                array(
                  'key' => 'field_5bbe1942d65f1',
                  'label' => 'Object Policy',
                  'name' => '',
                  'type' => 'accordion',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'open' => 0,
                  'multi_expand' => 0,
                  'endpoint' => 0,
                ),
                array(
                  'key' => 'field_5bbe197ad65fd',
                  'label' => '',
                  'name' => 'object_policy',
                  'type' => 'repeater',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                  ),
                  'collapsed' => '',
                  'min' => 0,
                  'max' => 0,
                  'layout' => 'table',
                  'button_label' => 'Add Source',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_5bbe197ad65fe',
                      'label' => '',
                      'name' => 'source',
                      'type' => 'text',
                      'instructions' => '',
                      'required' => 0,
                      'conditional_logic' => 0,
                      'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                      ),
                      'default_value' => '',
                      'placeholder' => '',
                      'prepend' => '',
                      'append' => '',
                      'maxlength' => '',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'accudio-tweaks',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => 1,
      'description' => '',
    ));

    acf_add_local_field_group(array(
      'key' => 'group_5bbe1e81cefb0',
      'title' => 'WooCommerce Tweaks',
      'fields' => array(
        array(
          'key' => 'field_5bbe1e81d97f5',
          'label' => '',
          'name' => 'accudio_tweaks_woocomm',
          'type' => 'group',
          'instructions' => '<a href="https://woocommerce.com/" target="_blank" rel="noopener noreferrer">WooCommerce</a> is required for these settings to have any effect.',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => 'check-table',
            'id' => '',
          ),
          'layout' => 'row',
          'sub_fields' => array(
            array(
              'key' => 'field_5bbe1e81e18e7',
              'label' => 'Hide out of stock products from Frontend',
              'name' => 'outofstock',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1e81e1cdc',
              'label' => 'Hide shipping dimensions from Frontend',
              'name' => 'shipping_dimensions',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1e81e20b6',
              'label' => 'Hide SKU on product pages',
              'name' => 'sku',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
            array(
              'key' => 'field_5bbe1e81e249d',
              'label' => 'Force removal of Woocommerce sidebar',
              'name' => 'sidebar',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui' => 1,
              'ui_on_text' => '',
              'ui_off_text' => '',
            ),
          ),
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'accudio-tweaks',
          ),
        ),
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => 1,
      'description' => '',
    ));

    endif;
  }
endif;