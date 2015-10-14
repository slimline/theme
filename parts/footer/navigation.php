<?php
/**
 * Footer Navigation template part
 *
 * Secondary menu for display in the footer area of the site. This menu will only
 * show if the user has assigned a menu to the "Footer Menu" location in the menus
 * UI (fallback_cb = FALSE).
 *
 * @package    Slimline / Theme
 * @subpackage Template Parts
 * @see        http://codex.wordpress.org/Navigation_Menus
 * @since      0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Output nav menu
 *
 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 *      Documentation of the `wp_nav_menu` function
 */
wp_nav_menu(
	array(
		'container'       => 'nav',                        // wrap menu in a <nav> tag
		'container-class' => 'site-nav footer-nav',        // class="site-nav footer-nav"
		'container_id'    => 'footer-nav',                 // id="footer-nav"
		'menu_class'      => 'menu site-menu footer-menu', // class="menu site-menu footer-menu"
		'menu_id'         => 'footer-menu',                // id="footer-menu"
		'fallback_cb'     => false,                        // only show menu if one is assigned to this location
		'theme_location'  => 'footer-menu',                // labeled as "Footer Menu" in the menus UI
	)
);