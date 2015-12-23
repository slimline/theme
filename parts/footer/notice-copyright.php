<?php
/**
 * Copyright Notice
 *
 * @package Slimline / Theme
 * @since   0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly
?>

	<p <?php slimline_copyright_attributes(); ?>>
		<?php printf( __( 'Copyright &copy %1$s %2$s', 'slimline' ), date( 'Y' ), get_bloginfo( 'name' ) ); ?>
	</p><!-- .copyright -->