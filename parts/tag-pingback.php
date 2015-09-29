<?php
/**
 * Pingback URL tag
 *
 * Displays the URL for accepting pingbacks from other sites.
 *
 * @package Slimline / Theme
 * @see     https://codex.wordpress.org/Introduction_to_Blogging#Pingbacks
 *          Description of pingbacks
 * @since   0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Only show the pingback link on individual posts
 *
 * We only want to display the link if we are on a singular post and if the post
 * accepts pingbacks. Here we are using `get_queried_object` to retrieve the current
 * post object and pass it to `pings_open` to see if it accepts pingbacks.
 *
 * @see https://developer.wordpress.org/reference/functions/is_singular/
 *      Documentation of `is_singular` function
 * @see https://developer.wordpress.org/reference/functions/pings_open/
 *      Documentation of `pings_open` function
 * @see https://developer.wordpress.org/reference/functions/get_queried_object/
 *      Documentation of `get_queried_object` function
 */
if ( is_singular() && pings_open( get_queried_object() ) ) :
?>

	<meta content="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />

<?php endif; // if ( is_singular() && pings_open( get_queried_object() ) ) ?>