<?php
/**
 * Entry Footer
 *
 * Contains the <footer> tag for the entry.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<footer class="entry-footer">

		<?php
			/**
			 * Display tags only if at least one tag assigned to post.
			 *
			 * @link https://developer.wordpress.org/reference/functions/has_tag/
			 *       Documentation of `has_tag` function
			 */
			if ( has_tag() ) {

				/**
				 * Separate tags by space
				 *
				 * @link https://developer.wordpress.org/reference/functions/the_tags/
				 *       Documentation for `the_tags` function
				 */
				the_tags(
					sprintf( '<p class="entry-tags">%1$s', __( 'Tagged: ', 'slimline' ),
					' ',
					'</p><!-- .entry-tags -->'
				);

			} // if ( has_tag() )
		?>

		<?php
			/**
			 * Get date information for the entry
			 *
			 * Only show this if we are using Schema.org markup
			 *
			 * @see slimline_use_schema_org()
			 */
			if ( slimline_use_schema_org() ) {

				/**
				 * date published (i.e., WP_Post::post_date)
				 */
				get_template_part( 'parts/entry/tag-datepublished' );

				/**
				 * date modified (i.e., WP_Post::modified_date)
				 */
				get_template_part( 'parts/entry/tag-datemodified' );

			} // if ( slimline_use_schema_org() )
		?>

		<?php
			/**
			 * Display post edit link
			 *
			 * Note that we are adding a title attribute to the link via filter for
			 * accessibility.
			 *
			 * @link https://developer.wordpress.org/reference/functions/edit_post_link/
			 *       Documentation of the edit_post_link function
			 * @link https://developer.wordpress.org/reference/hooks/edit_post_link/
			 *       Documentation of the edit_post_link filter
			 * @see  slimline_edit_post_link_title()
			 */
			edit_post_link( __( 'Edit', 'slimline' ), '<span class="edit-link">[', ']</span>' );
		?>

	</footer><!-- .entry-footer -->