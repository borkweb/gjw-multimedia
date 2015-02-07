var mm = {};

(function( $ ) {
	'use strict';

	mm.init = function() {
		var s = skrollr.init({
			edgeStrategy: 'set',
			easing: {
				WTF: Math.random,
				inverted: function(p) {
					return 1-p;
				}
			}
		});
	};

	$( function() {
		mm.init();
	} );
})( jQuery );
