<?php
/**
 * Publish date meta tag
 *
 * Displays the entry publish date for use by search engines.
 *
 * @package Slimline / Theme
 * @see     http://schema.org/datePublished
 *          Description of the `datePublished` property
 * @since   0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<meta content="<?php echo get_the_date( DATE_ATOM ); ?>" itemprop="datePublished" />