<?php
/**
 * Blog loop
 *
 * @package    Slimline\Theme
 * @subpackage TemplateParts\Blog
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

	<div class="archive-loop blog-loop">

		<?php
			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();

					get_template_part( 'parts/blog/content', get_post_format() );

				} // while ( have_posts() )

				get_template_part( 'parts/archive/pagination' );

			} else { // if ( have_posts() )

				get_template_part( 'parts/content', 'none' );

			} // if ( have_posts() )
		?>

	</div><!-- .blog-loop -->