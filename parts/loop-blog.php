<?php
/**
 * Blog loop
 *
 * @package    Slimline/Theme
 * @subpackage Template Parts/Blog
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

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', get_post_format() ); ?>

			<?php endwhile; // while ( have_posts() ) ?>

			<?php
				get_template_part( 'parts/nav', 'index' );
			?>

		<?php else : // if ( have_posts() ) ?>

			<?php
				get_template_part( 'parts/content', 'none' );
			?>

		<?php endif; // if ( have_posts() ) ?>

	</div><!-- .blog-loop -->