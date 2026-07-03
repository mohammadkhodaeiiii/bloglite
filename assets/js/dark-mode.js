/**
 * Dark and sepia reading mode toggle.
 *
 * Cycles through: default → dark → sepia → default.
 * Persists preference in localStorage.
 *
 * @package BlogLite
 */
( function () {
	'use strict';

	var STORAGE_KEY = 'bloglite-reading-mode';
	var MODES = [ '', 'bloglite-dark-mode', 'bloglite-sepia-mode' ];
	var MODE_LABELS = [ 'پیش‌فرض', 'تاریک', 'سپیا' ];

	/**
	 * Get the saved reading mode index.
	 *
	 * @return {number}
	 */
	function getSavedMode() {
		var saved = localStorage.getItem( STORAGE_KEY );

		if ( null === saved ) {
			return 0;
		}

		var index = parseInt( saved, 10 );

		return isNaN( index ) || index < 0 || index >= MODES.length ? 0 : index;
	}

	/**
	 * Apply a reading mode by index.
	 *
	 * @param {number} index Mode index.
	 * @return {void}
	 */
	function applyMode( index ) {
		var html = document.documentElement;

		MODES.forEach( function ( mode ) {
			if ( mode ) {
				html.classList.remove( mode );
			}
		} );

		if ( MODES[ index ] ) {
			html.classList.add( MODES[ index ] );
		}

		localStorage.setItem( STORAGE_KEY, String( index ) );

		document.querySelectorAll( '.bloglite-mode-toggle' ).forEach( function ( btn ) {
			btn.setAttribute( 'aria-label', 'حالت مطالعه: ' + MODE_LABELS[ index ] );
			btn.setAttribute( 'title', 'حالت مطالعه: ' + MODE_LABELS[ index ] );
		} );
	}

	/**
	 * Bind toggle buttons.
	 *
	 * @return {void}
	 */
	function bindToggles() {
		var current = getSavedMode();
		applyMode( current );

		document.querySelectorAll( '.bloglite-mode-toggle' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var next = ( getSavedMode() + 1 ) % MODES.length;
				applyMode( next );
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', bindToggles );
	} else {
		bindToggles();
	}
} )();
