<?php
/**
 * Site Header
 *
 * Contains the site <header>
 *
 * @package Slimline
 * @subpackage Templates
 */
?>

	<header <?php slimline_site_header_attributes(); ?>>

		<?php
			/**
			 * slimline_site_header hook
			 *
			 * @hook
			 */
			slimline_do_action( 'slimline_site_header' );
		?>

	</header><!-- .site-header -->