<?php
/**
 * Main content area
 *
 * Contains the site <main> tag
 *
 * @package    Slimline\Theme
 * @subpackage Template Parts
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<div class="index-loop">

		<?php
			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();

					get_template_part( 'parts/content', get_post_type() );

				} // while ( have_posts() )

				get_template_part( 'parts/nav', 'index' );

			} else { // if ( have_posts() )

				get_template_part( 'parts/content', 'none' );

			} // if ( have_posts() )
		?>

	</div><!-- .index-loop -->