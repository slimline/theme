<?php
/**
 * Charset Meta tag
 *
 * Declares the character encoding used on the page.
 *
 * @package Slimline / Theme
 * @see     https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#attr-charset
 *          Description of the `charset` meta attribute
 * @since   0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />