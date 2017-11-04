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
			<h2 class="entry-title" itemprop="headline">
				<a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a>
			</h2>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="description">
			<?php
				the_excerpt();
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php get_template_part( 'parts/entry/meta' ); ?>
		</footer>

	</article><!-- .entry -->