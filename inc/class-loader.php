<?php
/**
 * Service loader and coordinator.
 *
 * @package BlogLite
 */

declare(strict_types=1);

namespace BlogLite;

use BlogLite\Interfaces\ServiceInterface;
use BlogLite\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolves and registers every theme service in a deterministic order.
 */
final class Loader {

	use Singleton;

	/**
	 * Registered services.
	 *
	 * @var array<int, ServiceInterface>
	 */
	private array $services = array();

	/**
	 * Register all theme services with WordPress.
	 *
	 * @return void
	 */
	public function register(): void {
		$this->services = $this->resolve_services();

		foreach ( $this->services as $service ) {
			$service->register();
		}
	}

	/**
	 * Build the ordered list of theme services.
	 *
	 * @return array<int, ServiceInterface>
	 */
	private function resolve_services(): array {
		return array(
			new Setup(),
			new Assets(),
			new Navigation(),
			new Accessibility(),
			new Editor(),
			new Patterns(),
			new Typography(),
			new Reading(),
			new Performance(),
			new WooCommerce(),
		);
	}
}
