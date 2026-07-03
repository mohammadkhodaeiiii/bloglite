<?php
/**
 * Shared helper utilities.
 *
 * @package BlogLite
 */

declare(strict_types=1);

namespace BlogLite;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Stateless helper methods used across the theme.
 */
final class Helper {

	/**
	 * Resolve a cache-busting version string for an asset file.
	 *
	 * Uses file modification time when SCRIPT_DEBUG is enabled and the theme
	 * version otherwise.
	 *
	 * @param string $file Absolute path to the asset.
	 * @return string
	 */
	public static function asset_version( string $file ): string {
		if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG && is_readable( $file ) ) {
			return (string) filemtime( $file );
		}

		return BLOGLITE_VERSION;
	}

	/**
	 * Sanitize a class list string for output.
	 *
	 * @param array<int, string> $classes Class names.
	 * @return string
	 */
	public static function class_names( array $classes ): string {
		$filtered = array_filter( array_map( 'sanitize_html_class', $classes ) );

		return implode( ' ', $filtered );
	}

	/**
	 * Whether the current request is a singular post or page.
	 *
	 * @return bool
	 */
	public static function is_reading_context(): bool {
		return is_singular( array( 'post', 'page' ) );
	}
}
