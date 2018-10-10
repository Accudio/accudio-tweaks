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
  }
endif;
