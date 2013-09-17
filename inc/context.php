<?php
/**
 * Context Functions
 *
 * Allows actions, filters and other functions to run specific to current context. Mad props
 * to Justin Tadlock and his Hybrid Core for the ideas.
 *
 * @package Slimline
 * @subpackage Includes
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_apply_filters function
 *
 * Allows theme developers to apply context-specific filters without having to run conditional
 * checks in their callback functions.
 *
 * For example, on a single, standard-format post page the filter "slimline_class" will apply
 * "slimline_class", "slimline_class-post", "slimline_class-single", "slimline_class-post-single"
 * and "slimline_class-post-single-{ID}". Filters run from most generic to most specific to allow
 * developers to define broad filters that are later fine-tuned by more specific filters.
 *
 * @global obj $Slimline The Slimline theme object.
 * @param string $tag The base name of the filter hook.
 * @param mixed $value The value which the filters hooked to $tag may modify.
 * @param mixed $args All additional arguments for the filter.
 * @return mixed The result after all filter hooks are applied to $value
 * @since 0.0.0
 */
function slimline_apply_filters( $tag, $value, $args = '' ) {
	global $Slimline;

	// retrieve the action arguments, minus the $tag
	$args = func_get_args();
	$args = array_splice( $args, 0, 1 );

	$args[ 0 ] = apply_filters_ref_array( $tag, $args ); // apply the generic filter first

	// apply context-specific filters after
	foreach ( $Slimline->context as $context )
		$args[ 0 ] = apply_filters_ref_array( "{$tag}-{$context}", $args );

	return $args[ 0 ];
}

/**
 * slimline_do_action function
 *
 * Allows theme developers to run hooks in conditional contexts without having to add
 * conditional checks to their callback function.
 *
 * For example, on a WordPress site that uses the posts home page as the front page, the 
 * "slimline_main_before" action hook will run "slimline_main_before-front-page", 
 * "slimline_main_before-home", and "slimline_main_before". Developers could then choose to
 * hook into "slimline_main_before-front-page" to run an action only on the front page even
 * though the only action declared is "slimline_main_before".
 *
 * Actions run from most specific to most generic so developers can modify or interrupt
 * generic hooks with more specific ones (for example, removing a "slimline_main_before" hook
 * via a function hooked to "slimline_main_before-front-page").
 * 
 * @global obj $Slimline The Slimline theme object.
 * @param string $tag The base name of the action hook.
 * @param mixed $args All additional arguments for the action.
 * @since 0.0.0
 */
function slimline_do_action( $tag, $args = '' ) {
	global $Slimline;

	// retrieve the action arguments, minus the $tag
	$args = func_get_args();
	$args = array_splice( $args, 0, 1 );

	// do context-specific actions first
	foreach ( $Slimline->context as $context )
		do_action_ref_array( "{$tag}-{$context}", $args );

	do_action_ref_array( $tag, $args ); // do the generic action last
}

/**
 * slimline_get_context function
 *
 * Retrieves the current context and stores it in the $Slimline->context property.
 *
 * @global obj $Slimline The Slimline theme object
 * @since 0.0.0
 */
function slimline_get_context() {
	global $Slimline;

	$Slimline->context = array();
}