/**
 * Navigation enhancements for the core navigation block.
 *
 * @package BlogLite
 */
( function () {
	'use strict';

	/**
	 * Close the responsive navigation container when a link is activated.
	 *
	 * @param {HTMLElement} container Navigation responsive container.
	 * @return {void}
	 */
	function bindLinkClose( container ) {
		var links = container.querySelectorAll( 'a' );

		links.forEach( function ( link ) {
			link.addEventListener( 'click', function () {
				var closeButton = container.querySelector(
					'.wp-block-navigation__responsive-container-close'
				);

				if ( closeButton && container.classList.contains( 'is-menu-open' ) ) {
					closeButton.click();
				}
			} );
		} );
	}

	/**
	 * Trap focus inside the open mobile navigation panel.
	 *
	 * @param {HTMLElement} container Navigation responsive container.
	 * @return {void}
	 */
	function bindFocusTrap( container ) {
		container.addEventListener( 'keydown', function ( event ) {
			if ( event.key !== 'Tab' || ! container.classList.contains( 'is-menu-open' ) ) {
				return;
			}

			var focusable = container.querySelectorAll(
				'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
			);

			if ( ! focusable.length ) {
				return;
			}

			var first = focusable[ 0 ];
			var last = focusable[ focusable.length - 1 ];

			if ( event.shiftKey && document.activeElement === first ) {
				event.preventDefault();
				last.focus();
			} else if ( ! event.shiftKey && document.activeElement === last ) {
				event.preventDefault();
				first.focus();
			}
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		document.documentElement.classList.remove( 'no-js' );
		document.documentElement.classList.add( 'js' );

		document
			.querySelectorAll( '.wp-block-navigation__responsive-container' )
			.forEach( function ( container ) {
				bindLinkClose( container );
				bindFocusTrap( container );
			} );

		var skipLink = document.querySelector( '.skip-link' );
		var main = document.getElementById( 'main-content' );

		if ( skipLink && main ) {
			skipLink.addEventListener( 'click', function ( event ) {
				event.preventDefault();

				if ( ! main.hasAttribute( 'tabindex' ) ) {
					main.setAttribute( 'tabindex', '-1' );
				}

				main.focus( { preventScroll: false } );
			} );
		}
	} );
} )();
