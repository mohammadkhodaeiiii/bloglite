<?php
/**
 * Theme asset loading.
 *
 * @package BlogLite
 */

declare(strict_types=1);

namespace BlogLite;

use BlogLite\Interfaces\ServiceInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues frontend assets conditionally.
 */
final class Assets implements ServiceInterface {

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_print' ), 99 );
	}

	/**
	 * Enqueue public-facing styles and scripts.
	 *
	 * @return void
	 */
	public function enqueue_frontend(): void {
		$frontend_css = BLOGLITE_PATH . 'assets/css/frontend.css';

		wp_enqueue_style(
			'bloglite-frontend',
			BLOGLITE_URI . 'assets/css/frontend.css',
			array(),
			Helper::asset_version( $frontend_css )
		);

		$navigation_js = BLOGLITE_PATH . 'assets/js/navigation.js';
		wp_enqueue_script(
			'bloglite-navigation',
			BLOGLITE_URI . 'assets/js/navigation.js',
			array(),
			Helper::asset_version( $navigation_js ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);

		$dark_mode_js = BLOGLITE_PATH . 'assets/js/dark-mode.js';
		wp_enqueue_script(
			'bloglite-dark-mode',
			BLOGLITE_URI . 'assets/js/dark-mode.js',
			array(),
			Helper::asset_version( $dark_mode_js ),
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);

		if ( Helper::is_reading_context() ) {
			$reading_js = BLOGLITE_PATH . 'assets/js/reading-progress.js';
			wp_enqueue_script(
				'bloglite-reading-progress',
				BLOGLITE_URI . 'assets/js/reading-progress.js',
				array(),
				Helper::asset_version( $reading_js ),
				array(
					'strategy'  => 'defer',
					'in_footer' => true,
				)
			);
		}
	}

	/**
	 * Enqueue print stylesheet for all public pages.
	 *
	 * @return void
	 */
	public function enqueue_print(): void {
		$print_css = BLOGLITE_PATH . 'assets/css/print.css';

		if ( ! is_readable( $print_css ) ) {
			return;
		}

		wp_enqueue_style(
			'bloglite-print',
			BLOGLITE_URI . 'assets/css/print.css',
			array(),
			Helper::asset_version( $print_css ),
			'print'
		);
	}
}
