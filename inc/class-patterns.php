<?php
/**
 * Block pattern registration.
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
 * Registers the BlogLite pattern category and bundled patterns.
 */
final class Patterns implements ServiceInterface {

	/**
	 * Pattern category slug.
	 */
	private const CATEGORY = 'bloglite';

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_action( 'init', array( $this, 'register_category' ) );
		add_action( 'init', array( $this, 'register_patterns' ) );
	}

	/**
	 * Register the BlogLite pattern category.
	 *
	 * @return void
	 */
	public function register_category(): void {
		register_block_pattern_category(
			self::CATEGORY,
			array(
				'label' => __( 'بلاگ‌لایت', 'bloglite' ),
			)
		);
	}

	/**
	 * Load and register every pattern file in /patterns.
	 *
	 * @return void
	 */
	public function register_patterns(): void {
		$directory = BLOGLITE_PATH . 'patterns/';

		if ( ! is_dir( $directory ) ) {
			return;
		}

		$files = glob( $directory . '*.php' );

		if ( false === $files ) {
			return;
		}

		foreach ( $files as $file ) {
			$pattern = require $file;

			if ( ! is_array( $pattern ) || empty( $pattern['content'] ) ) {
				continue;
			}

			$pattern['categories'] = $pattern['categories'] ?? array( self::CATEGORY );

			register_block_pattern(
				'bloglite/' . basename( $file, '.php' ),
				$pattern
			);
		}
	}
}
