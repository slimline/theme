(function($) {
	wp.customize( 'color_scheme', function(value) {
		value.bind(function(to) {
			$('body').removeClass(function(index,css){
				return (css.match (/(^|\s)slimline-\S+/g) || []).join(' ');
			});
			$('body').addClass(to);
		});
	});
})(jQuery);