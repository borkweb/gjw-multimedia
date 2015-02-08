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

		$( '#battle' ).waypoint( function( direction ) {
			if ( 'up' === direction ) {
				mm.fates( false );
			} else {
				mm.fates( true );
			}//end else
		}, {
			offset: -13800
		});
	};

	mm.fates = function( mode ) {
		if ( mode ) {
			$( '#fates' ).get( 0 ).play();
		} else {
			$( '#fates' ).get( 0 ).pause();
		}//end else
	};

	$( function() {
		mm.init();
	} );
})( jQuery );
