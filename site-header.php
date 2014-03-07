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
			 * @hook slimline_get_custom_header - 10 (gets custom-header template part) | inc/hooks.php
			 * @hook slimline_get_header_nav - 20 (gets nav-header template part) | inc/hooks.php
			 */
			do_action( 'slimline_site_header' );
		?>

	</header><!-- .site-header -->