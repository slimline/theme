<?php
/**
 * Entry author and posted date
 *
 * @package    Slimline\Theme
 * @subpackage TemplateParts\Entry
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>

	<?php if ( is_multi_author() ) : ?>
		<?php _e( 'By', 'slimline' ); ?> <a class="entry-author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author(); ?></a>
	<?php endif; // if ( is_multi_author() ) ?>
	<time datetime="<?php echo get_the_date( DATE_ISO8601 ); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
	<meta itemprop="dateModified" content="<?php echo get_the_modified_date( DATE_ISO8601 ); ?>" />
