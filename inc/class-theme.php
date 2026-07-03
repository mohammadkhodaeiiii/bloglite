<?php
/**
 * Theme application container.
 *
 * @package BlogLite
 */

declare(strict_types=1);

namespace BlogLite;

use BlogLite\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Boots the theme by delegating service registration to the Loader.
 */
final class Theme {

	use Singleton;

	/**
	 * Register all theme services with WordPress.
	 *
	 * @return void
	 */
	public function register(): void {
		Loader::instance()->register();
	}
}
