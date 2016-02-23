<?php
/**
 * Admin Functions
 *
 * Functions and filters that run only on the WordPress admin area.
 *
 * @package    Slimline / Theme
 * @subpackage Includes
 * @since      0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Enqueue scripts and styles for the WordPress admin area
 *
 * @link  https://github.com/slimline/theme/wiki/slimline_admin_enqueue_scripts()
 * @since 0.2.0
 */
if ( ! function_exists( 'slimline_admin_enqueue_scripts' ) ) {

	function slimline_admin_enqueue_scripts() {

		add_editor_style( slimline_get_css_file_uri( 'editor.css' ) );

	}

} // if ( ! function_exists( 'slimline_admin_enqueue_scripts' ) )