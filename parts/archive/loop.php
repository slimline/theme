<?php
/**
 * Default loop
 *
 * @package    Slimline\Theme
 * @subpackage TemplateParts\Archive
 * @see        https://developer.wordpress.org/themes/basics/the-loop/
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<div class="archive-loop index-loop">

		<?php
			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();

					get_template_part( 'parts/archive/content', get_post_type() );

				} // while ( have_posts() )

				get_template_part( 'parts/archive/pagination' );

			} else { // if ( have_posts() )

				get_template_part( 'parts/content', 'none' );

			} // if ( have_posts() )
		?>

	</div><!-- .index-loop -->