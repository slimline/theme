(function($) {
	wp.customize( 'color_scheme', function(value) {
		$('body').class(value);
	});
})(jQuery);