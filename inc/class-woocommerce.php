<?php
/**
 * WooCommerce integration.
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
 * Declares WooCommerce support and loads unobtrusive storefront styles.
 */
final class WooCommerce implements ServiceInterface {

	/**
	 * {@inheritDoc}
	 */
	public function register(): void {
		add_action( 'after_setup_theme', array( $this, 'declare_support' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 20 );
	}

	/**
	 * Declare WooCommerce theme support when the plugin is active.
	 *
	 * @return void
	 */
	public function declare_support(): void {
		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		add_theme_support(
			'woocommerce',
			array(
				'thumbnail_image_width' => 400,
				'single_image_width'    => 600,
				'product_grid'          => array(
					'default_rows'    => 3,
					'min_rows'        => 1,
					'max_rows'        => 6,
					'default_columns' => 3,
					'min_columns'     => 1,
					'max_columns'     => 4,
				),
			)
		);

		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	/**
	 * Enqueue minimal WooCommerce overrides on shop pages.
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
			return;
		}

		$woocommerce_css = BLOGLITE_PATH . 'assets/css/woocommerce.css';

		if ( ! is_readable( $woocommerce_css ) ) {
			return;
		}

		wp_enqueue_style(
			'bloglite-woocommerce',
			BLOGLITE_URI . 'assets/css/woocommerce.css',
			array( 'bloglite-frontend' ),
			Helper::asset_version( $woocommerce_css )
		);
	}
}
