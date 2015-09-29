<?php
/**
 * Modified date meta tag
 *
 * Displays the entry modified / edited date for use by search engines.
 *
 * @package Slimline / Theme
 * @see     http://schema.org/dateModified
 *          Description of the `dateModified` property
 * @since   0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Only show modified date if is different than publish date
 */
if ( get_the_modified_date( 'U' ) !== get_the_date( 'U' ) ) :
?>

	<meta content="<?php echo get_the_modified_date( DATE_ATOM ); ?>" itemprop="dateModified" />

<?php endif; // if ( get_the_modified_date( 'U' ) !== get_the_date( 'U' ) ) ?>