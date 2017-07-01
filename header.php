<?php
/**
 * Header File
 *
 * The header contains all the information that needs to be at the top — i.e. inside
 * the <head> tag — of the web page. It also includes the opening <body> tag.
 *
 * @package Slimline\Theme
 * @see     http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 *          WordPress Theme Development Guidelines for header.php
 * @since   0.1.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )

?><!doctype html>
<html <?php slimline_html_attributes(); ?> <?php language_attributes(); ?>>

	<head>
		<?php
			/**
			 * Fire the `wp_head` action
			 *
			 * @hook slimline_get_meta_head - 0 (gets meta-head.php template part)
			 * @link https://developer.wordpress.org/reference/functions/wp_head/
			 *       Documentation of the `wp_head` function
			 * @link https://developer.wordpress.org/reference/hooks/wp_head/
			 *       Documentation of the `wp_head` action
			 */
			wp_head();
		?>
	</head>

	<body <?php body_class(); ?> <?php slimline_body_attributes(); ?>>
