<?php
/**
 * Taxonomy Edit Screen Functions
 *
 * @package Slimline
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * slimline_add_taxonomy_tinymce function
 *
 * Adds the action hooks for replacing the term description textarea with a TinyMCE editor.
 * Using a separate function allows us to dynamically add the hooks to all taxonomies.
 *
 * @since 0.1.0
 */
function slimline_add_taxonomy_tinymce() {

	if ( ! isset( $_REQUEST[ 'taxonomy' ] ) )
		return; // need to know which taxonomy is being edited so we can set the proper hooks

	$taxonomy = $_REQUEST[ 'taxonomy' ];

	/**
	 * Add actions to priority 0 to hopefully fire before all other template and plugin actions.
	 */
	add_action( "{$taxonomy}_pre_add_form", 'insidetrack_pods_ob_start', 0 );
	add_action( "{$taxonomy}_add_form_fields", 'insidetrack_pods_tinymce_form_fields', 0 );
	add_action( "{$taxonomy}_pre_edit_form", 'insidetrack_pods_ob_start', 0 );
	add_action( "{$taxonomy}_edit_form_fields", 'insidetrack_pods_tinymce_form_fields', 0 );
}

/**
 * slimline_ob_start action
 *
 * Begins object buffering. Must be wrapped in a hooked function or it will not work.
 *
 * @since 0.1.0
 */
function slimline_ob_start() {

	ob_start();
}

/**
 * slimline_tinymce_taxonomy_description action
 *
 * Replaces default taxonomy description textarea with an instance of the TinyMCE editor.
 *
 * @param object $tag The term object being edited or the name of the taxonomy if on an edit screen. Used on the edit screens to retrieve the current term description.
 * @since 0.1.0
 */
function slimline_tinymce_taxonomy_description( $tag ) {

	/**
	 * End the buffering started in slimline_ob_start and get buffer contents
	 */
	$form_fields = ob_get_clean();

	/**
	 * Set up wp_editor parameters based on which screen we are on.
	 */
	if ( strpos( current_filter(), 'add' ) ) {

		$description_id = 'tag-description';

		$description_text = '';

	} else { // strpos( current_filter(), 'add' )
		
		$description_id = 'description';

		$description_text = $tag->description;

	} // strpos( current_filter(), 'add' )

	/**
	 * Use the object buffer to get the wp_editor markup
	 */
	ob_start();
	wp_editor( $description_text, $description_id ); // @see http://codex.wordpress.org/Function_Reference/wp_editor
	$wp_editor = ob_get_clean();

	/**
	 * Replace the description textarea with the editor instance
	 */
	echo preg_replace( '#<textarea name="description"([^>]+)>(.*)</textarea>#i', $wp_editor, $form_fields );
}