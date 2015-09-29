<?php
/**
 * Entry Header
 *
 * Contains the <header> tag for the entry.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<header class="entry-header">

		<?php
			/**
			 * Show entry title
			 *
			 * If on a singular post, this will be an <h1> tag. On an archive
			 * page we will use an <h2> and include a link to the singular post.
			 *
			 * @see   https://github.com/slimline/theme/wiki/slimline_the_entry_title_before()
			 * @see   https://github.com/slimline/theme/wiki/slimline_the_entry_title_after()
			 * @since 0.2.0
			 */
			the_title( slimline_the_entry_title_before(), slimline_the_entry_title_after() );
		?>

		<?php
			/**
			 * Show entry summary
			 *
			 * Shows the excerpt if on a singular post and a custom excerpt exists.
			 *
			 * @see   https://github.com/slimline/theme/wiki/slimline_show_entry_header_excerpt()
			 * @see   https://github.com/slimline/theme/wiki/slimline_entry_description_attributes()
			 * @since 0.2.0
			 */
			if ( slimline_show_entry_header_excerpt() ) :
		?>

			<div <?php slimline_entry_description_attributes(); ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-description -->

		<?php endif; // if ( slimline_show_entry_header_excerpt() ) ?>

	</header><!-- .entry-header -->