# Accudio Tweaks - misc wordpress tweaks

[![GitHub](https://img.shields.io/badge/GitHub-Accudio-0366d6.svg)](https://github.com/Accudio) [![Twitter](https://img.shields.io/badge/Twitter-@accudio-1DA1F2.svg)](https://twitter.com/accudio) [![Website](https://img.shields.io/badge/Website-accudio.com-4B86AF.svg)](https://accudio.com) [![Donate](https://img.shields.io/badge/Donate-Paypal-009cde.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=alistair.shepherd@hotmail.co.uk&item_name=Supporting+open+source+projects+by+Alistair+Shepherd&currency_code=GBP)

Some basic tweaks and changes for [Wordpress][wordpressurl] built for sites built by [Accudio][accudiourl]. Rather than installing many plugins with a large number of features this is a simple plugin with tweaks to simplify the admin panel, enable security headers and to add further customisability to [WooCommerce][woocommerceurl].

## Features

### Admin Panel

All options can be enabled or disabled for users without the manage_options permission

* Remove 'Quick Edit' option in post and page manager.
* Remove 'Edit' option in Admin Bar when viewing a page.
* Remove 'Trash' option in post and page manager.
* Hide Author and Comment columns in post and page manager.
* Change 'Edit' link and title in page and post manager to instead edit the post with [Elementor Page Builder][elementorurl].
* Hide [Yoast SEO][yoastseourl] Columns and Filters

### Security

For all requests sets the headers:

* 'X-XSS-Protection: 1; mode=block';
* 'X-Content-Type-Options: nosniff';

Also has configurable options to:

* Forcing the use of HTTPS with the 'Strict-Transport-Security' header;
* Configurable Frame options with header 'X-Frame-Options';
* Content Security Options for default-src, script-src, style-src, font-src, img-src, frame-src, object-src;
* Referrer-Policy;

### WooCommerce

If [WooCommerce][woocommerceurl] is enabled:

* Hide any out of stock products from frontend shop interface;
* Hide shipping dimensions from product pages;
* Hide SKU on product pages;
* Force removal of Woocommerce sidebar (if this cannot be done in theme)

## Requirements

A working installation of [Wordpress][wordpressdownurl], v1.0.0 of the plugin has been tested with Version 4.9.4 but should work on many versions. v2.0.0 and above requires the plugin [Advanced Custom Fields Pro][acfurl], in order to simplify development. As this is a common plugin for Wordpress Professionals, this is believed to be a satisfactory compromise.

## Installation

1. Download the latest release zip file: ```wget https://github.com/Accudio/accudio-tweaks/releases/download/v1.1.0/accudio-tweaks-v1.1.0.zip```
2. Extract the zip in the /wp-content/plugins/ directory: ```unzip accudio-tweaks-v1.1.0.zip```.
3. Ensure ```plugins/``` includes the folder ```accudio-tweaks```.
4. Log in to Wordpress administration page:
	1. Go to 'Plugins';
	2. Enable plugin 'Accudio Tweaks';
5. For options go to 'Settings' > 'Accudio Tweaks'

## Version History

- v2.0.0 - Changed plugin to be dependent on Advanced Custom Fields for settings page
- v1.1.5 - Added option to disable Yoast Dashboard widget and made column/filter settings also apply to edit posts view
- v1.1.4 - Enhanced Elementor edit links to be easier to use
- v1.1.3 - Fixed Redirect URL to continue displaying current page in navigation.
- v1.1.2 - Changed formatting and styling in settings page to be easier to use.
- v1.1.1 - Restructured repo to allow easier cloning into 'wp-content/plugins/'.
- v1.1.0 - Added CSP 'object-src' to plugin options
- v1.0.0 - Initial public release

## License

Copyright &copy; 2018 [Alistair Shepherd][accudiourl]. Licensed under the [GPLv3 License][licenseurl].

[wordpressurl]:https://wordpress.org/
[wordpressdownurl]:https://wordpress.org/download/
[woocommerceurl]:https://woocommerce.com/
[elementorurl]:https://elementor.com/
[yoastseourl]:https://yoast.com/wordpress/plugins/seo/
[acfurl]:https://www.advancedcustomfields.com/
[accudiourl]:https://accudio.com
[licenseurl]:https://www.gnu.org/licenses/gpl-3.0.txt