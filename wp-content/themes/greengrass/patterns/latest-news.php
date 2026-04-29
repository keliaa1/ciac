z<?php
/**
 * Title: Latest News
 * Slug: greengrass/latest-news
 * Categories: greengrass, latest-news
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"60px","left":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"align":"wide","className":"section_head","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide section_head"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"className":"section_sub_title","fontSize":"body-text","fontFamily":"catamaran"} -->
<h4 class="wp-block-heading has-text-align-center section_sub_title has-catamaran-font-family has-body-text-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e('Blogs &amp; News','greengrass'); ?></h4>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"40px"}},"className":"section_title"} -->
<h2 class="wp-block-heading has-text-align-center section_title" style="margin-top:0px;font-size:40px;font-style:normal;font-weight:700"><?php esc_html_e('Latest News &amp; Updates','greengrass'); ?></h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"10px"} -->
<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":3,"query":{"perPage":3,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"m-0 list-none"} -->
<!-- wp:group {"className":"news-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group news-box"><!-- wp:group {"className":"news-thumb","layout":{"type":"constrained"}} -->
<div class="wp-block-group news-thumb"><!-- wp:post-featured-image {"className":"news-thumb-wrap"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"news-content","layout":{"type":"constrained"}} -->
<div class="wp-block-group news-content"><!-- wp:post-terms {"term":"category","fontSize":"small"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"30px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"top":"0px","bottom":"10px"}}}} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-author-name {"isLink":true} /-->

<!-- wp:paragraph -->
<p><a href="#"><?php esc_html_e('2 Comments','greengrass'); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false} /-->

<!-- wp:group {"layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:read-more {"content":"Read More","style":{"spacing":{"padding":{"right":"5px","bottom":"5px","left":"5px"}},"border":{"bottom":{"color":"var:preset|color|primary","width":"2px"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"primary"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p><?php esc_html_e('There is no post found','greengrass'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->