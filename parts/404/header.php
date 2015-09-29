<?php
/**
 * 404 Main Header
 *
 * Contains the <header> tag for the 404 error page.
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<header class="main-header 404-header">

		<h1 <?php slimline_404_title_attributes(); ?>>
			<?php
				/**
				 * Output a default 404 title
				 *
				 * @see   https://github.com/slimline/theme/wiki/slimline_404_title()
				 * @since 0.3.0
				 */
				slimline_404_title();
			?>
		</h1><!-- .404-title -->

		<div <?php slimline_404_description_attributes(); ?>>
			<?php
				/**
				 * Output a default 404 description
				 *
				 * @see   https://github.com/slimline/theme/wiki/slimline_404_description()
				 * @since 0.3.0
				 */
				slimline_404_description();
			?>
		</div><!-- .404-description -->

	</header><!-- .404-header -->