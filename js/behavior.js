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

		$( document ).on( 'click', '#auto-play', function( e ) {
			e.preventDefault();

			$( 'body' ).simplyScroll( {
				orientation: 'vertical'
			} );
		});

		$( '#intro' ).waypoint( function( direction ) {
			if ( 'up' === direction ) {
				mm.force( false );
			} else {
				mm.force( true );
				mm.fates( false );
			}//end else
		}, {
			offset: 0
		});

		$( '#battle' ).waypoint( function( direction ) {
			if ( 'up' === direction ) {
				mm.fates( false );
				mm.force( true );
			} else {
				mm.fates( true );
			}//end else
		}, {
			offset: -13800
		});
	};

	mm.force = function( mode ) {
		if ( mode ) {
			$( '#force' ).get( 0 ).play();
		} else {
			$( '#force' ).get( 0 ).pause();
		}//end else
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
