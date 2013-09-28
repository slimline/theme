<?php
/**
 * Template Loading Functions
 *
 * @package Slimline
 * @subpackage Includes
 */

/**
 * slimline_single_template filter
 *
 * Standardizes posts templates to allow custom templates, {post_type}.php templates,
 *
 * @since 0.1.0
 */
function slimline_single_template() {
	global $post;

	/**
	 * Set up basic template array.
	 */
	$templates = array(
		"{$post->post_type}-{post->post_name}.php",
		"{$post->post_type}-{$post->ID}.php",
		"single-{$post->post_type}-{$post->post_name}.php",
		"single-{$post->post_type}-{$post->ID}.php"
		"single-{$post->ID}.php",
		"{$post->post_type}.php",
		"single-{$post->post_type}.php",
		'single.php',
		'index.php' // this will never actually come up in a Slimline theme since the basic framework includes a single.php file.
	);

	/**
	 * allow custom templates. if found, prepend to the templates array
	 */
	if ( $custom_template = get_post_meta( get_queried_object_id(), "_wp_{$post_type}_template", true ) )
		array_unshift( $templates, $custom_template );

	return locate_template( $templates );
}