<?php
/**
 * Login Functions
 *
 * Functions and filters that run only on the WordPress login screen.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Replace the default WordPress login logo title attribute with the site name.
 *
 * @return string Site name escaped for use as an HTML attribute
 * @link   https://github.com/slimline/theme/wiki/slimline_login_headertitle()
 * @since  0.1.0
 */
function slimline_login_headertitle() {

	/**
	 * Return site name
	 *
	 * @link https://developer.wordpress.org/reference/functions/get_bloginfo/
	 *       Description of `get_bloginfo` function
	 * @link https://developer.wordpress.org/reference/functions/esc_attr/
	 *       Description of `esc_attr` function
	 */
	return esc_attr( get_bloginfo( 'name' ) );
}

/**
 * Replace the default WordPress login logo href attribute with the home url.
 *
 * @return string Home url
 * @link   https://github.com/slimline/theme/wiki/slimline_login_headerurl()
 * @since  0.1.0
 */
function slimline_login_headerurl() {

	/**
	 * Return site URL
	 *
	 * @link https://developer.wordpress.org/reference/functions/home_url/
	 *       Description of `home_url` function
	 * @link https://developer.wordpress.org/reference/functions/esc_url/
	 *       Description of `esc_url` function
	 */
	return esc_url( home_url( '/' ) );
}

/**
 * Outputs login logo CSS
 *
 * Styles the logo based on the uploaded image.
 *
 * @return string CSS for styling the logo
 * @uses get_custom_header() to retrieve header image info
 * @since 0.1.0
 */
function slimline_login_logo_css() {

	/**
	 * Retrive logo information
	 *
	 * @see slimline_get_logo_src()
	 */
	$logo = slimline_get_logo_src( 'slimline-login-logo' );

	/**
	 * Stop processing if there is no custom header to use
	 */
	if ( empty( $logo ) ) {
		return;
	} // if ( empty( $logo ) )

	/**
	 * Get height as percent of width
	 */
	$padding_bottom = ( $logo['height'] / $logo['width'] ) * 100;

	/**
	 * Output CSS
	 *
	 * We are outputting directly instead of enqueueing a stylesheet so we can
	 * include dynamic URL and padding.
	 */
	echo "
		<style>
			.login h1 a {
				background-image: url('{$logo['url']}');
				background-size: cover;
				height: 0;
				padding: 0 0 {$padding_bottom}%;
				width: 100%;
			}
		</style>
	";

}