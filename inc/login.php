<?php
/**
 * Login Functions
 *
 * Functions and filters that run only on the WordPress login screen.
 *
 * @package Slimline
 * @subpackage Login
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_login_headertitle function
 *
 * Replaces the default WordPress login logo title attribute with the site name.
 *
 * @return string Site name
 * @uses get_bloginfo() to return the blog `name` property
 * @uses esc_attr_x() to sanitize the name for inclusion in an html attribute and allow for translation
 * @since 0.1.0
 */
function slimline_login_headertitle() {

	return esc_attr_x( get_bloginfo( 'name' ), 'link title', 'slimline' );
}

/**
 * slimline_login_headerurl function
 *
 * Replaces the default WordPress login logo href attribute with the home url.
 *
 * @return string Home url
 * @uses home_url() to return the root URL for the site
 * @uses esc_url() to sanitize the url
 * @since 0.1.0
 */
function slimline_login_headerurl() {

	return esc_url( home_url( '/' ) );
}

/**
 * slimline_login_logo function
 *
 * Outputs CSS that styles the logo based on the uploaded header image.
 *
 * @return string CSS for styling the logo
 * @uses get_custom_header() to retrieve header image info
 * @since 0.1.0
 */
function slimline_login_logo() {

	$logo = get_custom_header();

	if ( empty( $logo ) )
		return; // stop processing if there is no custom header to use

	$margin_left = ceil( $logo->width / 2 );

	$padding_bottom = ceil ( $logo->height / 2 );

	echo "
		<style>
			.login h1 a {
				background-image: url( '{$logo->url}' );
				background-size: 100%;
				height: {$logo->height}px;
				left: 50%;
				margin-left: -{$margin_left}px;
				padding-bottom: {$padding_bottom}px;
				position: relative;
				top: 0;
				width: {$logo->width}px;
			}
		</style>
	";

}