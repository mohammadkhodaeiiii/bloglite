<?php
/**
 * BlogLite bootstrap.
 *
 * This file intentionally contains no business logic. It defines the core
 * constants, registers the autoloader and boots the {@see \BlogLite\Theme}
 * application, which delegates service coordination to {@see \BlogLite\Loader}.
 *
 * @package BlogLite
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'BLOGLITE_VERSION' ) ) {
	/**
	 * Theme version, used for asset cache busting.
	 */
	define( 'BLOGLITE_VERSION', '1.0.0' );
}

if ( ! defined( 'BLOGLITE_PATH' ) ) {
	/**
	 * Absolute filesystem path to the theme root, with a trailing slash.
	 */
	define( 'BLOGLITE_PATH', trailingslashit( get_template_directory() ) );
}

if ( ! defined( 'BLOGLITE_URI' ) ) {
	/**
	 * Public URL to the theme root, with a trailing slash.
	 */
	define( 'BLOGLITE_URI', trailingslashit( get_template_directory_uri() ) );
}

require_once BLOGLITE_PATH . 'inc/autoload.php';

/**
 * Boot the theme as early as possible during after_setup_theme so that
 * integrations (e.g. WooCommerce) and editor features are available everywhere.
 *
 * @return void
 */
function bloglite(): void {
	\BlogLite\Theme::instance()->register();
}

add_action( 'after_setup_theme', 'bloglite', 0 );
