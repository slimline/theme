<?php
/**
 * Blog post template
 *
 * @package    Slimline\Theme
 * @subpackage TemplateParts\Blog
 * @see        https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#content-slug-php
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<article <?php post_class(); ?> <?php slimline_blog_entry_attributes(); ?>>

		<?php get_template_part( 'parts/entry/thumbnail' ); ?>

		<header class="entry-header">
			<h1 class="entry-title" itemprop="headline">
				<?php the_title(); ?>
			</h1><!-- .entry-title -->

			<?php
				/**
				 * If a custom excerpt is set, use it as an introductory summary
				 *
				 * @link https://developer.wordpress.org/reference/functions/has_excerpt/
				 *       Documentation of the `has_excerpt` function
				 */
				if ( has_excerpt() ) {

					/**
					 * Include the summary content
					 *
					 * @link https://developer.wordpress.org/reference/functions/get_template_part/
					 *       Documentation of the `get_template_part` function
					 */
					get_template_part( 'parts/entry/summary' );

				} // if ( has_excerpt() )
			?>


			<p class="entry-meta">
				<?php get_template_part( 'parts/entry/meta' ); ?>
			</p>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="text">
			<?php
				/**
				 * Output post content
				 *
				 * @link https://developer.wordpress.org/reference/functions/the_content/
				 *       Documentation of the `the_content` function
				 */
				the_content();
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php _e( 'Posted in', 'slimline' ); ?> <?php the_category( ', ' ); ?>
			<?php
				the_tags(
					__( 'Tagged ', 'slimline' ),
					', '
				);
			?>

		</footer>

	</article><!-- .entry -->