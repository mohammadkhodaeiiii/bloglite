<?php
/**
 * Typography enhancements for the reading experience.
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
 * Applies comfortable reading typography to singular content.
 */
final class Typography implements ServiceInterface {

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_filter( 'body_class', array( $this, 'body_classes' ) );
		add_filter( 'render_block_core/post-content', array( $this, 'wrap_post_content' ), 10, 2 );
	}

	/**
	 * Add reading-context body classes on singular posts and pages.
	 *
	 * @param array<int, string> $classes Existing body classes.
	 * @return array<int, string>
	 */
	public function body_classes( array $classes ): array {
		if ( Helper::is_reading_context() ) {
			$classes[] = 'bloglite-reading';
		}

		return $classes;
	}

	/**
	 * Wrap post content in a readable container on singular views.
	 *
	 * @param string $block_content Rendered block HTML.
	 * @param array  $block         Block data.
	 * @return string
	 */
	public function wrap_post_content( string $block_content, array $block ): string {
		if ( ! Helper::is_reading_context() ) {
			return $block_content;
		}

		if ( false !== strpos( $block_content, 'bloglite-readable' ) ) {
			return $block_content;
		}

		return '<div class="bloglite-readable">' . $block_content . '</div>';
	}
}
