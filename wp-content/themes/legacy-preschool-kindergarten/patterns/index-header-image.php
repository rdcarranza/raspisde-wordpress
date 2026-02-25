<?php
/**
 * Title: Index Header Image
 * Slug: legacy-preschool-kindergarten/index-header-image
 * Categories: legacy-preschool-kindergarten, index-header-image
 */
$get_url = trailingslashit(get_template_directory_uri());
$legacy_preschool_kindergarten_header_banner = $get_url . 'assets/images/header-banner.png';
?>


<!-- wp:cover {"url":"<?php echo esc_url($legacy_preschool_kindergarten_header_banner); ?>","id":15,"dimRatio":50,"minHeight":400} -->
<div class="wp-block-cover" style="min-height:400px"><img class="wp-block-cover__image-background wp-image-15" alt="" src="<?php echo esc_url($legacy_preschool_kindergarten_header_banner); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="text-transform:uppercase"><?php echo esc_html__('blog','legacy-preschool-kindergarten'); ?></h2>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->