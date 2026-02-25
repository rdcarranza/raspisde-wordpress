<?php
 /**
  * Title: Primary Sidebar
  * Slug: rainbow-preschool/primary-sidebar
  * Categories: posts
  */
?>

<!-- wp:group -->
<div class="wp-block-group" style="">
	<!-- wp:heading {"textAlign":"left"} -->
	<h2 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Latest posts', 'rainbow-preschool' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:latest-posts {"postsToShow":3,"displayAuthor":true,"displayPostDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left"} /-->
	<!-- wp:heading {"textAlign":"left"} -->
	<h2 class="wp-block-heading has-text-align-left"><?php esc_html_e( 'Latest Comments', 'rainbow-preschool' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:latest-comments /-->
</div>
<!-- /wp:group -->
