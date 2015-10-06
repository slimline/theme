<?php
/**
 * Header File
 *
 * The header contains all the information that needs to be at the top — i.e. inside
 * the <head> tag — of the web page. It also includes the opening <body> tag and the
 * visible header of the site, as well as the opening <main> tag.
 *
 * @package Slimline / Theme
 * @see     http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 *          WordPress Theme Development Guidelines for header.php
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

?><!doctype html>
<html <?php slimline_html_attributes(); ?> <?php language_attributes(); ?>>
	<head>

		<?php
			/**
			 * Fire the `wp_head` action
			 *
			 * @hook slimline_get_charset_tag  - 0 (gets tag-charset.php template part)
			 * @hook slimline_get_viewport_tag - 1 (gets tag-viewport.php template part)
			 * @hook slimline_get_pingback_tag - 2 (gets tag-pingback.php template part)
			 * @see  https://developer.wordpress.org/reference/functions/wp_head/
			 *       Documentation of the `wp_head` function
			 * @see  https://developer.wordpress.org/reference/hooks/wp_head/
			 *       Documentation of the `wp_head` action
			 */
			wp_head();
		?>
	</head>

	<body <?php body_class(); ?> <?php slimline_body_attributes(); ?>>

		<?php
			/**
			 * slimline_body_top hook
			 *
			 * @see https://github.com/slimline/theme/wiki/slimline_body_top
			 */
			do_action( 'slimline_body_top' );
		?>

		<?php
			/**
			 * Load the site-header.php template part
			 *
			 * The site-header.php file contains the <header> tag for the site and
			 * the following action hooks:
			 * slimline_header_before
			 * slimline_header_top
			 * slimline_header_bottom
			 * slimline_header_after
			 *
			 * @see https://developer.wordpress.org/reference/functions/get_template_part/
			 *      Documentation of the `get_template_part` function
			 */
			slimline_get_template_part( 'site-header', slimline_get_context() );
		?>

		<main <?php slimline_main_attributes(); ?>>

			<?php
				/**
				 * slimline_content_before hook
				 *
				 * @see https://github.com/slimline/theme/wiki/slimline_content_before
				 */
				do_action( 'slimline_content_before' );
			?>