<?php
/**
 * Featured Image
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

$thumbnail_size = ( is_singular() ? 'full' : 'medium' );

if ( has_post_thumbnail() ) :
?>

	<figure <?php slimline_entry_thumbnail_attributes(); ?>>
		<?php the_post_thumbnail( $thumbnail_size, [ 'itemprop' => 'url', ] ); ?>
		<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumbnail_size, false ); ?>
		<meta itemprop="width" content="<?php echo $thumbnail[1]; ?>" />
		<meta itemprop="height" content="<?php echo $thumbnail[2]; ?>" />
	</figure><!-- .entry-thumbnail -->

<?php endif; // if ( has_post_thumbnail() )