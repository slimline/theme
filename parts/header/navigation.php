<?php
/**
 * Header Navigation template part
 *
 * Primary menu for display in the header area of the site. This menu will only
 * show if the user has assigned a menu to the "Header Menu" location in the menus
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
		'container'       => 'nav',                                                             // wrap menu in a <nav> tag
		'container_class' => slimline_get_class( 'header-nav', 'site-nav' ),                    // class="site-nav header-nav"
		'container_id'    => 'header-nav',                                                      // id="header-nav"
		'menu_class'      => slimline_get_class( 'header-menu', array( 'menu', 'site-menu' ) ), // class="menu site-menu header-menu"
		'menu_id'         => 'header-menu',                                                     // id="header-menu"
		'fallback_cb'     => false,                                                             // only show menu if one is assigned to this location
		'theme_location'  => 'header-menu',                                                     // labeled as "Header Menu" in the menus UI
	)
);