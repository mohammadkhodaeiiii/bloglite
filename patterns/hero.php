<?php
/**
 * Hero pattern.
 *
 * @package BlogLite
 */

return array(
	'title'       => __( 'بخش قهرمان', 'bloglite' ),
	'description' => __( 'بخش قهرمان تمام‌عرض با عنوان، توضیحات و دکمه‌های فراخوان عمل.', 'bloglite' ),
	'categories'  => array( 'bloglite', 'banner' ),
	'keywords'    => array( 'hero', 'banner', 'cta', 'blog' ),
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"color":{"gradient":"var:preset|gradient|primary-to-secondary"}},"textColor":"primary-foreground","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-foreground-color has-text-color" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30);background:var(--wp--preset--gradient--primary-to-secondary)">
	<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xx-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size">داستان‌هایی که ارزش خواندن دارند</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size">یک قالب بلاگ سبک با تمرکز بر خوانایی، تایپوگرافی و تجربه مطالعه‌ای راحت.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">شروع مطالعه</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">مرور دسته‌بندی‌ها</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
);
