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

			<?php if ( has_excerpt() ) : ?>
				<div class="entry-summary" itemprop="description">
					<?php
						the_excerpt(); ?>
					?>
				</div><!-- .entry-summary -->
			<?php endif; // if ( has_excerpt() ) ?>

			<p class="entry-meta">
				<?php get_template_part( 'parts/entry/meta' ); ?>
			</p>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="text">
			<?php
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