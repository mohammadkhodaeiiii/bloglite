<?php
/**
 * Author box pattern.
 *
 * @package BlogLite
 */

return array(
	'title'       => __( 'جعبه نویسنده', 'bloglite' ),
	'description' => __( 'جعبه معرفی نویسنده با آواتار، نام و بیوگرافی.', 'bloglite' ),
	'categories'  => array( 'bloglite', 'posts' ),
	'keywords'    => array( 'author', 'bio', 'profile' ),
	'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"var:custom|radius|large","width":"1px","style":"solid","color":"var:preset|color|border"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"80px"} -->
		<div class="wp-block-column" style="flex-basis:80px">
			<!-- wp:avatar {"size":80,"style":{"border":{"radius":"50px"}}} /-->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:post-author-name {"fontSize":"large"} /-->
			<!-- wp:post-author-biography {"fontSize":"small"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);
