<?php
/**
 * Index Main Header
 *
 * Contains the <header> tag for the blog home, archives, etc.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<header class="main-header index-header">

		<h1 <?php slimline_index_title_attributes(); ?>>
			<?php
				/**
				 * Output a title based on what type of page we are on
				 *
				 * @see   https://github.com/slimline/theme/wiki/slimline_index_title()
				 * @since 0.1.0
				 */
				slimline_index_title();
			?>
		</h1><!-- .index-title -->

		<div <?php slimline_index_description_attributes(); ?>>
			<?php
				/**
				 * Output a description based on what type of page we are on
				 *
				 * @see   https://github.com/slimline/theme/wiki/slimline_index_description()
				 * @since 0.1.0
				 */
				slimline_index_description();
			?>
		</div><!-- .index-description -->

	</header><!-- .index-header -->