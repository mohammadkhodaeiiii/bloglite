<?php
/**
 * Latest posts pattern.
 *
 * @package BlogLite
 */

return array(
	'title'       => __( 'تازه‌ترین نوشته‌ها', 'bloglite' ),
	'description' => __( 'شبکه‌ای از تازه‌ترین نوشته‌های بلاگ با تصویر و خلاصه.', 'bloglite' ),
	'categories'  => array( 'bloglite', 'posts' ),
	'keywords'    => array( 'latest', 'posts', 'grid', 'blog' ),
	'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">تازه‌ترین نوشته‌ها</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":11,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"constrained"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"var:custom|radius|large","width":"1px","style":"solid","color":"var:preset|color|border"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"var:custom|radius|medium"}}} /-->
				<!-- wp:post-title {"isLink":true,"fontSize":"medium"} /-->
				<!-- wp:post-date {"fontSize":"small","textColor":"muted-foreground"} /-->
				<!-- wp:post-excerpt {"moreText":"ادامه مطلب","excerptLength":15} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->',
);
