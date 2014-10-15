<?php
/**
 * Plugin Name: Smart Varnish
 * Plugin URI:  http://www.smartpixels.net/products/
 * Description: Bypass varnish caching using cookies
 * Version:     1.0.0
 * Author:      Smartpixels
 * Author URI:  http://www.smartpixels.net
 * License:     GPLv2+
 * Text Domain: smart_varnish
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2014 Smartpixels (email : info@smartpixels.net)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Useful global constants
define( 'SMART_VARNISH_VERSION', '1.0.0' );
define( 'SMART_VARNISH_URL',     plugin_dir_url( __FILE__ ) );
define( 'SMART_VARNISH_PATH',    dirname( __FILE__ ) . '/' );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function smart_varnish_init() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'smart_varnish' );
	load_textdomain( 'smart_varnish', WP_LANG_DIR . '/smart_varnish/smart_varnish-' . $locale . '.mo' );
	load_plugin_textdomain( 'smart_varnish', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
		if (is_user_logged_in() && !isset($_COOKIE['smart_varnish_bypass'])) {
		setcookie('smart_varnish_bypass', 1, time()+3600*24, COOKIEPATH, COOKIE_DOMAIN, false);
		}
		if (!is_user_logged_in() && isset($_COOKIE['smart_varnish_bypass'])) {
		setcookie('smart_varnish_bypass', 1, time()-3600*24, COOKIEPATH, COOKIE_DOMAIN, false);
	}
}

/**
 * Activate the plugin
 */
function smart_varnish_activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	smart_varnish_init();

}
register_activation_hook( __FILE__, 'smart_varnish_activate' );

/**
 * Deactivate the plugin
 * Uninstall routines should be in uninstall.php
 */
function smart_varnish_deactivate() {

}
register_deactivation_hook( __FILE__, 'smart_varnish_deactivate' );

// Wireup actions
add_action( 'init', 'smart_varnish_init' );


