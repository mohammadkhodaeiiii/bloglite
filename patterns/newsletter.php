<?php
/**
 * Newsletter pattern.
 *
 * @package BlogLite
 */

return array(
	'title'       => __( 'خبرنامه', 'bloglite' ),
	'description' => __( 'بخش فراخوان عضویت در خبرنامه.', 'bloglite' ),
	'categories'  => array( 'bloglite', 'call-to-action' ),
	'keywords'    => array( 'newsletter', 'subscribe', 'email' ),
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"color":{"background":"var:preset|color|foreground"}},"textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-text-color has-background" style="background-color:var(--wp--preset--color--foreground);color:var(--wp--preset--color--background);padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">با ما همراه باشید</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
	<p class="has-text-align-center has-medium-font-size">تازه‌ترین نوشته‌ها را در ایمیل خود دریافت کنید. بدون هرزنامه، لغو اشتراک در هر زمان.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"primary","textColor":"primary-foreground"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-primary-foreground-color has-primary-background-color has-text-color has-background wp-element-button">عضویت در خبرنامه</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
);
