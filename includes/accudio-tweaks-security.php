<?php

/**
 * @link        https://accudio.com/development
 * @since       2.0.0
 * @package     Accudio_Tweaks
 * @subpackage  Accudio_Tweaks/Security
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// security mods
if(!function_exists('accudio_tweaks_security')):
  add_action( 'plugins_loaded', 'accudio_tweaks_security' );
  function accudio_tweaks_security() {
    if(function_exists('get_field')) {
      add_action('send_headers', 'accudio_tweaks_security_init');
      function accudio_tweaks_security_init() {
        $options = get_field('accudio_tweaks_security', 'options');
        /* ~~~~~ VARIABLE ~~~~~ */

        // enforce the use of HTTPS
        if($options['enforce_https']) {
          header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
        }

        // referrer policy
        if(!empty($options['referrer_policy'])) {
          header('Referrer-Policy: '.$options['referrer_policy']);
        }

        // set x-frame-options
        if(!empty($options['frame_options']['select'])) {
          $x_frame_options = $options['frame_options']['select'];
          if($x_frame_options == 'ALLOW-FROM') {
            foreach($options['frame_options']['whitelist'] as $source) {
              $x_frame_options .= ' '.$source['condition'];
            }
          }
          header('X-Frame-Options: '.$x_frame_options);
        }

        // content security policy
        $content_security_policy = '';
        if(!empty($options['csp']['primary_policy'])) {
          $content_security_policy .= 'default-src';
          foreach($options['csp']['primary_policy'] as $source) {
            $content_security_policy .= ' '.stripslashes($source['source']);
          }
          $content_security_policy .= '; ';
        }
        if(!empty($options['csp']['script_policy'])) {
          $content_security_policy .= 'script-src';
          foreach($options['csp']['script_policy'] as $source) {
            $content_security_policy .= ' '.stripslashes($source['source']);
          }
          $content_security_policy .= '; ';
        }
        if(!empty($options['csp']['style_policy'])) {
          $content_security_policy .= 'style-src';
          foreach($options['csp']['style_policy'] as $source) {
            $content_security_policy .= ' '.stripslashes($source['source']);
          }
          $content_security_policy .= '; ';
        }
        if(!empty($options['csp']['font_policy'])) {
          $content_security_policy .= 'font-src';
          foreach($options['csp']['font_policy'] as $source) {
            $content_security_policy .= ' '.stripslashes($source['source']);
          }
          $content_security_policy .= '; ';
        }
        if(!empty($options['csp']['image_policy'])) {
          $content_security_policy .= 'img-src';
          foreach($options['csp']['image_policy'] as $source) {
            $content_security_policy .= ' '.stripslashes($source['source']);
          }
          $content_security_policy .= '; ';
        }
        if(!empty($options['csp']['frame_policy'])) {
          $content_security_policy .= 'frame-src';
          foreach($options['csp']['frame_policy'] as $source) {
            $content_security_policy .= ' '.stripslashes($source['source']);
          }
          $content_security_policy .= '; ';
        }
        if(!empty($options['csp']['object_policy'])) {
          $content_security_policy .= 'object-src';
          foreach($options['csp']['object_policy'] as $source) {
            $content_security_policy .= ' '.stripslashes($source['source']);
          }
          $content_security_policy .= '; ';
        }
        if(!empty($content_security_policy)) {
          header('Content-Security-Policy: '.$content_security_policy); // FF Chrome Safari Opera
          header('X-Content-Security-Policy: '.$content_security_policy); // IE
        }

        /* ~~~~~ STATIC ~~~~~ */
        header("X-XSS-Protection: 1; mode=block"); // Block Access If XSS Attack Is Suspected
        header("X-Content-Type-Options: nosniff"); // Prevent MIME-Type Sniffing
      }
    }

    // disable XMLRPC
    add_filter('xmlrpc_enabled', '__return_false');

    // disable user REST endpoints
    if(!function_exists('accudio_tweaks_security_rest')) {
      add_filter( 'rest_endpoints', 'accudio_tweaks_security_rest');
      function accudio_tweaks_security_rest($endpoints) {
        if ( isset( $endpoints['/wp/v2/users'] ) ) {
          unset( $endpoints['/wp/v2/users'] );
        }
        if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
          unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
        }
        return $endpoints;
      }
    }

    // remove WordPress version from generator meta
    add_filter('the_generator', '__return_empty_string');

    // reverse query param for assets using WordPress version. Basic but covers automated checking
    if(!function_exists('accudio_tweaks_security_asset_ver')) {
      add_filter( 'style_loader_src', 'accudio_tweaks_security_asset_ver');
      add_filter( 'script_loader_src', 'accudio_tweaks_security_asset_ver');
      function accudio_tweaks_security_asset_ver($src) {
        if (strpos($src, 'ver=' . get_bloginfo('version'))) {
          $src_array = parse_url($src);
          parse_str($src_array['query'], $query_array);
          if(!empty($query_array['ver'])){
            $query_array['ver'] = strrev($query_array['ver']);
          }
          $src = $src_array['scheme'] . '://' . $src_array['host'] . '/' . $src_array['path'] . '?' . http_build_query($query_array);
        }

        return $src;
      }
    }

    // replace login error messages
    if ( ! function_exists( 'accudio_tweaks_login_error_message' ) ) {
      add_filter( 'login_errors', 'accudio_tweaks_login_error_message' );
      function accudio_tweaks_login_error_message($error) {
        if(strpos($error, 'password you entered for the username') !== false || strpos($error, 'Invalid username') !== false) {
          $error = '<strong>ERROR</strong>: Username or Password is incorrect. <a href="' . wp_lostpassword_url() . '">Lost your password?</a>';
        }
        return $error;
      }
    }
  }
endif;
