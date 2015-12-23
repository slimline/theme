<?php
/**
 * Opening <html> tag
 *
 * This is kept in a separate template part to make it easier to edit (for example,
 * if you want to include multiple <html> tags enclosed by IE conditional comments).
 *
 * @package Slimline / Theme
 * @see     https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html
 *          Description of the `<html>` element
 * @since   0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>
<html <?php slimline_html_attributes(); ?> <?php language_attributes(); ?>>