<?php

/**
 * @link				https://accudio.com/development
 * @since				1.1.0
 * @package				Accudio_Tweaks
 * @subpackage			Accudio_Tweaks/Security
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function accudio_tweaks_security_init(){
	/* ~~~~~ VARIABLE ~~~~~ */

	// Enforce the use of HTTPS
	if (get_option('accudio_tweaks_security_https', '1') == '1') {
		header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
	}

	// Prevent Clickjacking
	if (get_option('accudio_tweaks_security_frame', 'SAMEORIGIN') == 'ALLOW-FROM') {
		$x_frame_options = get_option('accudio_tweaks_security_frame', 'SAMEORIGIN').' '.get_option('accudio_tweaks_security_frame_whitelist', '');
	} else {
		$x_frame_options = get_option('accudio_tweaks_security_frame', 'SAMEORIGIN');
	}
	header('X-Frame-Options: '.$x_frame_options);

	// Prevent XSS Attack
	$content_security_policy = 'default-src '.stripslashes( get_option('accudio_tweaks_security_csp_default', "'self'") ).'; script-src '.stripslashes( get_option('accudio_tweaks_security_csp_script', "'self' 'unsafe-inline'") ).'; style-src '.stripslashes( get_option('accudio_tweaks_security_csp_style', "'self' 'unsafe-inline'") ).'; font-src '.stripslashes( get_option('accudio_tweaks_security_csp_font', "'self'") ).'; img-src '.stripslashes( get_option('accudio_tweaks_security_csp_img', "'self'") ).'; frame-src '.stripslashes( get_option('accudio_tweaks_security_csp_frame', "'self'") ).'; object-src '.stripslashes( get_option('accudio_tweaks_security_csp_object', "'none'") ).';';
	header('Content-Security-Policy: '.$content_security_policy); // FF Chrome Safari Opera
	header('X-Content-Security-Policy: '.$content_security_policy); // IE


	/* ~~~~~ STATIC ~~~~~ */

	// Block Access If XSS Attack Is Suspected
	header("X-XSS-Protection: 1; mode=block");

	// Prevent MIME-Type Sniffing
	header("X-Content-Type-Options: nosniff");

	// Referrer Policy
	header("Referrer-Policy: no-referrer-when-downgrade");
}

add_action('send_headers', 'accudio_tweaks_security_init', 1);
