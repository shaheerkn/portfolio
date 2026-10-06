/**
 * Cursor-tracking mascot. Vanilla port of the page-mascot React component --
 * swaps background-position on two 3x3 sprite sheets, no per-frame JS.
 */
( function () {
	'use strict';

	var DIRECTIONS = [ 'up-left', 'up', 'up-right', 'left', 'center', 'right', 'down-left', 'down', 'down-right' ];
	var REACTIONS = [ 'blink', 'heart', 'sparkle', 'surprised', 'wink', 'bashful', 'sleepy', 'dizzy', 'delighted' ];

	// Clockwise from the right, matching atan2 with y pointing down.
	var CLOCKWISE = [ 'right', 'down-right', 'down', 'down-left', 'left', 'up-left', 'up', 'up-right' ];
	var SECTOR = ( Math.PI * 2 ) / CLOCKWISE.length;
	var HYSTERESIS = 0.12;
	var DEAD_ZONE = 70;

	var PAYOFFS = [ 'heart', 'sparkle', 'delighted' ];
	var BOOP_PAYOFF = 120;
	var BOOP_END = 560;
	var SQUASH_MS = 420;
	var DIZZY_AFTER = 4;
	var DIZZY_WINDOW = 1600;
	var DIZZY_END = 1100;

	var SQUASH = [
		{ transform: 'scale(1, 1)', easing: 'ease-in' },
		{ transform: 'scale(1.10, 0.86)', offset: 0.18, easing: 'ease-out' },
		{ transform: 'scale(0.95, 1.08)', offset: 0.45, easing: 'ease-in-out' },
		{ transform: 'scale(1.03, 0.97)', offset: 0.72, easing: 'ease-in-out' },
		{ transform: 'scale(1, 1)' },
	];

	function wrap( angle ) {
		return Math.atan2( Math.sin( angle ), Math.cos( angle ) );
	}

	function cellPosition( index ) {
		return ( index % 3 ) * 50 + '% ' + Math.floor( index / 3 ) * 50 + '%';
	}

	function initMascot( root ) {
		var directionsLayer = root.querySelector( '.mascot-layer--directions' );
		var reactionsLayer = root.querySelector( '.mascot-layer--reactions' );
		var squash = root.querySelector( '.mascot-squash' );

		directionsLayer.style.backgroundImage = 'url(' + root.getAttribute( 'data-directions' ) + ')';
		reactionsLayer.style.backgroundImage = 'url(' + root.getAttribute( 'data-reactions' ) + ')';
		directionsLayer.style.backgroundPosition = cellPosition( DIRECTIONS.indexOf( 'center' ) );
		reactionsLayer.style.backgroundPosition = cellPosition( REACTIONS.indexOf( 'blink' ) );

		var timers = [];

		function setDirection( direction ) {
			directionsLayer.style.backgroundPosition = cellPosition( DIRECTIONS.indexOf( direction ) );
		}

		function setReaction( reaction ) {
			if ( reaction ) {
				reactionsLayer.style.backgroundPosition = cellPosition( REACTIONS.indexOf( reaction ) );
				reactionsLayer.style.opacity = '1';
				directionsLayer.style.opacity = '0';
			} else {
				reactionsLayer.style.opacity = '0';
				directionsLayer.style.opacity = '1';
			}
		}

		if ( window.matchMedia( '(hover: hover) and (pointer: fine)' ).matches ) {
			var sector = -1;
			var pointer = null;

			var aim = function () {
				if ( ! pointer ) {
					return;
				}

				var box = root.getBoundingClientRect();
				var dx = pointer.x - ( box.left + box.width / 2 );
				var dy = pointer.y - ( box.top + box.height / 2 );

				if ( Math.hypot( dx, dy ) < DEAD_ZONE ) {
					sector = -1;
					setDirection( 'center' );
					return;
				}

				// Hold the current sector until the pointer is well past its edge.
				var angle = Math.atan2( dy, dx );
				if ( sector !== -1 && Math.abs( wrap( angle - sector * SECTOR ) ) < SECTOR / 2 + HYSTERESIS ) {
					return;
				}

				sector = ( Math.round( angle / SECTOR ) + CLOCKWISE.length ) % CLOCKWISE.length;
				setDirection( CLOCKWISE[ sector ] );
			};

			window.addEventListener( 'pointermove', function ( event ) {
				pointer = { x: event.clientX, y: event.clientY };
				aim();
			}, { passive: true } );

			window.addEventListener( 'scroll', aim, { passive: true } );
		}

		var boops = { count: 0, at: 0 };

		root.addEventListener( 'click', function () {
			timers.forEach( window.clearTimeout );
			timers = [];

			var later = function ( ms, next ) {
				timers.push( window.setTimeout( function () {
					setReaction( next );
				}, ms ) );
			};

			var now = Date.now();
			boops.count = now - boops.at < DIZZY_WINDOW ? boops.count + 1 : 1;
			boops.at = now;

			if ( boops.count >= DIZZY_AFTER ) {
				boops.count = 0;
				setReaction( 'dizzy' );
				later( DIZZY_END, null );
			} else {
				setReaction( 'blink' );
				later( BOOP_PAYOFF, PAYOFFS[ ( boops.count - 1 ) % PAYOFFS.length ] );
				later( BOOP_END, null );
			}

			if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
				return;
			}

			// Per-keyframe easing with the effect itself linear: an easing on the effect
			// would reinterpret every offset and front-load the whole bounce.
			if ( squash && squash.animate ) {
				squash.animate( SQUASH, { duration: SQUASH_MS, easing: 'linear' } );
			}
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		var mascots = document.querySelectorAll( '.mascot' );
		for ( var i = 0; i < mascots.length; i++ ) {
			initMascot( mascots[ i ] );
		}
	} );
} )();
