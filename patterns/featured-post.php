<?php
/**
 * Featured post pattern.
 *
 * @package BlogLite
 */

return array(
	'title'       => __( 'نوشته ویژه', 'bloglite' ),
	'description' => __( 'کارت برجسته نوشته با تصویر، عنوان و خلاصه.', 'bloglite' ),
	'categories'  => array( 'bloglite', 'posts' ),
	'keywords'    => array( 'featured', 'post', 'highlight' ),
	'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">نوشته ویژه</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":10,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"constrained"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
			<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
			<div class="wp-block-columns">
				<!-- wp:column {"width":"55%"} -->
				<div class="wp-block-column" style="flex-basis:55%">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"var:custom|radius|large"}}} /-->
				</div>
				<!-- /wp:column -->
				<!-- wp:column {"width":"45%","verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
					<!-- wp:post-title {"isLink":true,"fontSize":"x-large"} /-->
					<!-- wp:post-date {"fontSize":"small","textColor":"muted-foreground"} /-->
					<!-- wp:post-excerpt {"moreText":"خواندن نوشته","excerptLength":35} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->',
);
