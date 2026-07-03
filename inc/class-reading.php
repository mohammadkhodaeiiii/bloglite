<?php
/**
 * Reading experience features.
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
 * Provides reading time, word count, progress bar markup and reading meta.
 */
final class Reading implements ServiceInterface {

	/**
	 * Average reading speed in words per minute.
	 */
	private const WORDS_PER_MINUTE = 200;

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_action( 'wp_body_open', array( $this, 'render_progress_bar' ), 10 );
		add_filter( 'the_content', array( $this, 'prepend_reading_meta' ), 5 );
	}

	/**
	 * Output the reading progress bar landmark on singular content.
	 *
	 * @return void
	 */
	public function render_progress_bar(): void {
		if ( ! Helper::is_reading_context() ) {
			return;
		}

		printf(
			'<div class="bloglite-reading-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" aria-label="%s"><span class="bloglite-reading-progress__bar"></span></div>',
			esc_attr__( 'پیشرفت خواندن', 'bloglite' )
		);
	}

	/**
	 * Prepend estimated reading time and word count before post content.
	 *
	 * @param string $content Post content.
	 * @return string
	 */
	public function prepend_reading_meta( string $content ): string {
		if ( ! is_singular( 'post' ) || ! in_the_loop() || ! is_main_query() ) {
			return $content;
		}

		$post = get_post();

		if ( ! $post instanceof \WP_Post ) {
			return $content;
		}

		$text       = wp_strip_all_tags( $post->post_content );
		$word_count = str_word_count( $text );

		if ( $word_count < 1 ) {
			return $content;
		}

		$minutes = max( 1, (int) ceil( $word_count / self::WORDS_PER_MINUTE ) );

		$meta = sprintf(
			'<div class="bloglite-reading-meta" aria-label="%1$s"><span class="bloglite-reading-meta__time">%2$s</span><span class="bloglite-reading-meta__separator" aria-hidden="true">&middot;</span><span class="bloglite-reading-meta__words">%3$s</span></div>',
			esc_attr__( 'اطلاعات مطالعه', 'bloglite' ),
			esc_html(
				sprintf(
					/* translators: %s: estimated reading time in minutes */
					__( '%s دقیقه مطالعه', 'bloglite' ),
					number_format_i18n( $minutes )
				)
			),
			esc_html(
				sprintf(
					/* translators: %s: formatted word count */
					__( '%s واژه', 'bloglite' ),
					number_format_i18n( $word_count )
				)
			)
		);

		return $meta . $content;
	}

	/**
	 * Calculate estimated reading time in minutes for a post.
	 *
	 * @param int $post_id Post ID.
	 * @return int
	 */
	public static function reading_time( int $post_id ): int {
		$post = get_post( $post_id );

		if ( ! $post instanceof \WP_Post ) {
			return 0;
		}

		$text       = wp_strip_all_tags( $post->post_content );
		$word_count = str_word_count( $text );

		if ( $word_count < 1 ) {
			return 0;
		}

		return max( 1, (int) ceil( $word_count / self::WORDS_PER_MINUTE ) );
	}

	/**
	 * Count words in a post.
	 *
	 * @param int $post_id Post ID.
	 * @return int
	 */
	public static function word_count( int $post_id ): int {
		$post = get_post( $post_id );

		if ( ! $post instanceof \WP_Post ) {
			return 0;
		}

		return str_word_count( wp_strip_all_tags( $post->post_content ) );
	}
}
