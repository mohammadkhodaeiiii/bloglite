<?php
/**
 * Categories grid pattern.
 *
 * @package BlogLite
 */

return array(
	'title'       => __( 'شبکه دسته‌بندی‌ها', 'bloglite' ),
	'description' => __( 'شبکه واکنش‌گرای دسته‌بندی‌ها با تعداد نوشته.', 'bloglite' ),
	'categories'  => array( 'bloglite', 'posts' ),
	'keywords'    => array( 'categories', 'grid', 'taxonomy' ),
	'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"color":{"background":"var:preset|color|muted"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:var(--wp--preset--color--muted)">
	<!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">مرور بر اساس موضوع</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"muted-foreground"} -->
	<p class="has-text-align-center has-muted-foreground-color has-text-color">نوشته‌ها را بر اساس دسته‌بندی کاوش کنید.</p>
	<!-- /wp:paragraph -->

	<!-- wp:categories {"showPostCounts":true,"showHierarchy":false,"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} /-->
</div>
<!-- /wp:group -->',
);
