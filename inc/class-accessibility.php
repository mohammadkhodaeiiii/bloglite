<?php
/**
 * Accessibility enhancements.
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
 * Adds skip links, focus helpers and screen-reader improvements.
 */
final class Accessibility implements ServiceInterface {

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_action( 'wp_body_open', array( $this, 'render_skip_link' ), 5 );
		add_filter( 'body_class', array( $this, 'body_classes' ) );
		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'image_attributes' ), 10, 3 );
	}

	/**
	 * Output a skip link to the main content landmark.
	 *
	 * @return void
	 */
	public function render_skip_link(): void {
		printf(
			'<a class="skip-link screen-reader-text" href="#main-content">%s</a>',
			esc_html__( 'پرش به محتوا', 'bloglite' )
		);
	}

	/**
	 * Add accessibility-related body classes.
	 *
	 * @param array<int, string> $classes Existing body classes.
	 * @return array<int, string>
	 */
	public function body_classes( array $classes ): array {
		$classes[] = 'bloglite-theme';

		return $classes;
	}

	/**
	 * Ensure images without alt text receive an empty alt attribute.
	 *
	 * @param array<string, string> $attr       Image attributes.
	 * @param \WP_Post              $attachment Attachment post object.
	 * @param string|int[]          $size       Requested size.
	 * @return array<string, string>
	 */
	public function image_attributes( array $attr, \WP_Post $attachment, $size ): array {
		if ( ! isset( $attr['alt'] ) ) {
			$attr['alt'] = '';
		}

		if ( '' === $attr['alt'] && get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ) ) {
			$attr['alt'] = (string) get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
		}

		return $attr;
	}
}
