<?php
/**
 * Header Template
 *
 * The header file serves as a sort of wrapper for the rest of the site along with the
 * footer file. It contains the doctype declaration and everything from the opening html
 * tag to the beginning of the main content area.
 *
 * @package Slimline
 * @subpackage Template
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?><!doctype html>
<!--[if IE]><![endif]--><!-- fix for conditional comment CSS blocking: http://www.phpied.com/conditional-comments-block-downloads/ -->
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 ie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 gt-ie6 ie7 ie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9 gt-ie6 gt-ie7 ie8 ie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10 gt-ie6 gt-ie7 gt-ie8 ie9 ie" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js gt-ie6 gt-ie7 gt-ie8 gt-ie9 no-ie" <?php language_attributes(); // {@see http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29} ?>><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); // {@see http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29} ?>" />

		<title><?php wp_title( '|' ); // {@see http://codex.wordpress.org/Function_Reference/wp_title} ?></title>

		<?php
			/**
			 * wp_head function
			 *
			 * The wp_head function calls a default WordPress hook and is required by the Theme Repository Guidelines. Many themes
			 * and plugins use this hook for outputting content that should appear between the <head></head> tags of the site.
			 * Note that there are many other hooks that are also used to modify the wp_head output, such as wp_enqueue_scripts,
			 * wp_enqueue_styles, wp_print_scripts and so on.
			 *
			 * @see http://codex.wordpress.org/Function_Reference/wp_head
			 *
			 * @hook slimline_viewport_meta_tag - 10 (outputs the viewport meta tag) | inc/hooks.php
			 */
			wp_head();
		?>
	</head>

	<body <?php body_class(); // @see http://codex.wordpress.org/Function_Reference/body_class ?> <?php slimline_body_attributes(); ?>>

		<?php
			/**
			 * slimline_main_before hook
			 *
			 * @hook slimline_site_wrapper - 10 (outputs opening div for the site wrapper) | inc/hooks.php
			 * @hook slimline_get_site_header - 20 (gets the site-header template part) | inc/hooks.php
			 * @hook slimline_content_wrapper - 30 (outputs opening div for the content wrapper) | inc/hooks.php
			 * @hook slimline_yoast_breadcrumbs - 40 (outputs breadcrumbs if the WordPress SEO plugin is installed and breadcrumbs are active) | inc/vendor.php
			 */
			do_action( 'slimline_main_before' );
		?>