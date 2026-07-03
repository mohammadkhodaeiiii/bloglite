/**
 * Reading progress bar.
 *
 * Updates a fixed progress bar based on scroll position on singular content.
 * Respects prefers-reduced-motion.
 *
 * @package BlogLite
 */
( function () {
	'use strict';

	var progressBar = null;
	var progressFill = null;
	var ticking = false;
	var reducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/**
	 * Calculate and update the progress percentage.
	 *
	 * @return {void}
	 */
	function updateProgress() {
		if ( ! progressBar || ! progressFill ) {
			return;
		}

		var main = document.getElementById( 'main-content' );

		if ( ! main ) {
			return;
		}

		var rect = main.getBoundingClientRect();
		var mainTop = rect.top + window.scrollY;
		var mainHeight = main.offsetHeight;
		var windowHeight = window.innerHeight;
		var scrollY = window.scrollY;

		var start = mainTop;
		var end = mainTop + mainHeight - windowHeight;
		var percent = 0;

		if ( end > start ) {
			percent = Math.min( 100, Math.max( 0, ( ( scrollY - start ) / ( end - start ) ) * 100 ) );
		} else if ( scrollY >= start ) {
			percent = 100;
		}

		progressFill.style.width = percent + '%';
		progressBar.setAttribute( 'aria-valuenow', String( Math.round( percent ) ) );

		ticking = false;
	}

	/**
	 * Request an animation frame update.
	 *
	 * @return {void}
	 */
	function onScroll() {
		if ( ! ticking ) {
			window.requestAnimationFrame( updateProgress );
			ticking = true;
		}
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		progressBar = document.querySelector( '.bloglite-reading-progress' );
		progressFill = progressBar ? progressBar.querySelector( '.bloglite-reading-progress__bar' ) : null;

		if ( ! progressBar || ! progressFill ) {
			return;
		}

		if ( reducedMotion ) {
			progressBar.style.display = 'none';
			return;
		}

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		updateProgress();
	} );
} )();
