/**
 * Primary Javascript File
 *
 * @package    Slimline / Theme
 * @subpackage Javascripts
 */
jQuery(function($){

	/**
	 * Start Foundation scripts
	 */
	$(document).foundation();

	/**
	 * Temporary stand-in for a true lightbox
	 *
	 * @todo Replace with Clearing once it is added back into Foundation
	 */
	var $slimlightbox = $('#slimline-lightbox');

	$(document).on('click','a[href$=".bmp"],a[href$=".gif"],a[href$=".jpeg"],a[href$=".jpg"],a[href$=".png"]',function(){
		$.ajax( $(this).attr('href') ).done(function(response){
			$slimlightbox.html(response.html).foundation('open');
		});
	});
});