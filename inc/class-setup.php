<?php
/**
 * Theme setup and feature support.
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
 * Registers theme supports, menus and the text domain.
 */
final class Setup implements ServiceInterface {

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
	}

	/**
	 * Configure theme supports and menus.
	 *
	 * @return void
	 */
	public function setup(): void {
		load_theme_textdomain( 'bloglite', BLOGLITE_PATH . 'languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'custom-spacing' );
		add_theme_support( 'custom-units', array( 'px', 'em', 'rem', '%', 'vw', 'vh' ) );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'               => 80,
				'width'                => 240,
				'flex-height'          => true,
				'flex-width'           => true,
				'unlink-homepage-logo' => false,
			)
		);

		register_nav_menus(
			array(
				'primary' => esc_html__( 'منوی اصلی', 'bloglite' ),
				'footer'  => esc_html__( 'منوی پاورقی', 'bloglite' ),
				'social'  => esc_html__( 'شبکه‌های اجتماعی', 'bloglite' ),
			)
		);

		add_editor_style( 'assets/css/editor.css' );
	}
}
