<?php
/**
 * General Theme Functions
 *
 * Functions related to themes, stylesheets etc.
 *
 * @package Slimline
 * @subpackage Template
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_get_base_theme function
 *
 * Returns information about the Slimline theme framework.
 *
 * @param string $property The specific property to return.
 * @return string|object $slimline_theme The specified theme property. If no property specified, will return the theme object.
 * @uses wp_get_theme()
 * @since 0.1.0
 */
function slimline_get_base_theme( $property = '' ) {

	$slimline_theme = wp_get_theme( 'slimline' );

	if ( $property )
		return $slimline_theme->get( $property );

	else
		return $slimline_theme;
}

/**
 * slimline_get_current_theme function
 *
 * Returns information about the current (child) theme. If not using a child theme, default 
 * Slimline theme framework information will be returned instead.
 *
 * @param string $property The specific property to return.
 * @return string|object $slimline_theme The specified theme property. If no property specified, will return the theme object.
 * @uses wp_get_theme()
 * @since 0.1.0
 */
function slimline_get_current_theme( $property = '' ) {

	$slimline_theme = wp_get_theme();

	if ( $property )
		return $slimline_theme->get( $property );

	else
		return $slimline_theme;
}
