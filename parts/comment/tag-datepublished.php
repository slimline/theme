<?php
/**
 * Publish date meta tag
 *
 * Displays the comment publish date for use by search engines.
 *
 * @package Slimline / Theme
 * @see     http://schema.org/datePublished
 *          Description of the `datePublished` property
 * @since   0.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<meta content="<?php comment_time( DATE_ATOM ); ?>" itemprop="datePublished" />