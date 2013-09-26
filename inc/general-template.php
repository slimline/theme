<?php
/**
 * General Template Functions
 *
 * Functions for outputting content general template content.
 *
 * @package Slimline
 * @subpackage Template
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_viewport_meta_tags function
 *
 * Outputs meta-viewport tags. Meant to be used in wp_head()
 *
 * @uses slimline_get_viewport_meta_tags
 * @since 0.1.0
 */
function slimline_viewport_meta_tags() {

	echo slimline_get_viewport_meta_tags();
}