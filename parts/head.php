<?php
/**
 * Meta tags for site <head>
 *
 * @package    Slimline\Theme
 * @subpackage TemplateParts
 * @since      0.3.0
 */

/**
 * exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // if ( ! defined( 'ABSPATH' ) )
?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />

	<?php
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
	<?php endif; // if ( is_singular() && pings_open( get_queried_object() ) )