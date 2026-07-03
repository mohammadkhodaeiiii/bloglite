<?php
/**
 * Navigation enhancements.
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
 * Adds navigation-related filters and block enhancements.
 */
final class Navigation implements ServiceInterface {

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_filter( 'render_block_core/navigation', array( $this, 'enhance_navigation_block' ), 10, 2 );
		add_filter( 'wp_nav_menu_args', array( $this, 'nav_menu_args' ) );
	}

	/**
	 * Add an accessible label to the core navigation block when missing.
	 *
	 * @param string $block_content Rendered block HTML.
	 * @param array  $block         Block data.
	 * @return string
	 */
	public function enhance_navigation_block( string $block_content, array $block ): string {
		if ( false !== strpos( $block_content, 'aria-label=' ) ) {
			return $block_content;
		}

		$label = esc_attr__( 'ناوبری اصلی', 'bloglite' );

		return (string) preg_replace(
			'/<nav\b/',
			'<nav aria-label="' . $label . '"',
			$block_content,
			1
		);
	}

	/**
	 * Ensure classic menus receive sensible defaults.
	 *
	 * @param array<string, mixed> $args Menu arguments.
	 * @return array<string, mixed>
	 */
	public function nav_menu_args( array $args ): array {
		if ( empty( $args['container_aria_label'] ) ) {
			$args['container_aria_label'] = esc_attr__( 'منو', 'bloglite' );
		}

		return $args;
	}
}
