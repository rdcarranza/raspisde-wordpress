<?php
/**
 * Title: Preschool Latest Posts
 * Slug: rainbow-preschool/preschool-latest-posts
 * Categories: theme
 *
 * @package rainbow-preschool
 * @since 1.0.0
 */

?>

<!-- wp:group {"metadata":{"categories":["theme"],"patternName":"rainbow-preschool/latest-posts","name":"Preschool Latest Posts"},"style":{"spacing":{"blockGap":"var:preset|spacing|70","padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"},"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"701px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--70);padding-top:0;padding-bottom:0"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"0"}},"color":{"text":"#16c47f"}},"fontSize":"small","fontFamily":"fredoka"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-fredoka-font-family has-small-font-size" style="color:#16c47f;margin-bottom:0;font-style:normal;font-weight:400;text-transform:uppercase"><?php esc_html_e( 'Insights', 'rainbow-preschool' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"},"color":{"text":"#0a1823"}},"fontSize":"x-large","fontFamily":"fredoka"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-fredoka-font-family has-x-large-font-size" style="color:#0a1823;margin-bottom:var(--wp--preset--spacing--50);font-style:normal;font-weight:600;line-height:1.3"><?php esc_html_e( 'Exploring the Latest Insights and Innovations in Education', 'rainbow-preschool' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":42,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"animated animated-fadeInUp"} -->
<div class="wp-block-query animated animated-fadeInUp"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}},"color":{"background":"#ffeed3"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-background" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;background-color:#ffeed3;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"","height":"300px","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}},"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:post-author {"textAlign":"left","avatarSize":24,"showAvatar":false,"style":{"color":{"text":"#16c47f"}},"fontSize":"x-small"} /-->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#16c47f"}}},"color":{"text":"#16c47f"}},"fontSize":"x-small"} -->
<p class="has-text-color has-link-color has-x-small-font-size" style="color:#16c47f">·</p>
<!-- /wp:paragraph -->

<!-- wp:post-date {"format":"M j, Y","metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"color":{"text":"#16c47f"}},"fontSize":"x-small"} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"textAlign":"left","level":5,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|xx-small"},"padding":{"top":"var:preset|spacing|30","bottom":"0"}},"typography":{"lineHeight":"1.3","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","fontSize":"medium","fontFamily":"fredoka"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p class="has-text-align-center"></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->