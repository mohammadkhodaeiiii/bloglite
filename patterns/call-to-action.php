<?php
/**
 * Call to action pattern.
 *
 * @package BlogLite
 */

return array(
	'title'       => __( 'فراخوان عمل', 'bloglite' ),
	'description' => __( 'بخش فراخوان عمل با عنوان، متن و دکمه.', 'bloglite' ),
	'categories'  => array( 'bloglite', 'call-to-action' ),
	'keywords'    => array( 'cta', 'call to action', 'button' ),
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"color":{"gradient":"var:preset|gradient|subtle-light"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30);background:var(--wp--preset--gradient--subtle-light)">
	<!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">همین امروز بلاگ خود را شروع کنید</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"muted-foreground"} -->
	<p class="has-text-align-center has-muted-foreground-color has-text-color">بلاگ‌لایت هر آنچه برای انتشار محتوای زیبا و خوانا نیاز دارید را در اختیار شما می‌گذارد.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">شروع کنید</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
);
