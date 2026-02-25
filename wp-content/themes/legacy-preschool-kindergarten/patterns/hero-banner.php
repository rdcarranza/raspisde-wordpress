<?php
/**
 * Title: Hero Banner
 * Slug: legacy-preschool-kindergarten/hero-banner
 */
$get_url = trailingslashit(get_template_directory_uri());
$legacy_preschool_kindergarten_hero_image_2 = $get_url . 'assets/images/banner_2.png';
?>

<!-- wp:group {"className":"slide-group","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group slide-group"><!-- wp:columns {"className":"slider-box"} -->
<div class="wp-block-columns slider-box"><!-- wp:column {"verticalAlignment":"center","width":"50%","className":"banner-contentt"} -->
<div class="wp-block-column is-vertically-aligned-center banner-contentt" style="flex-basis:50%"><!-- wp:group {"className":"slide-content-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group slide-content-box"><!-- wp:paragraph {"align":"left","className":"banner-extra-head","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"30px"},"spacing":{"padding":{"top":"2px","bottom":"2px","left":"12px","right":"12px"}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontSize":"large","fontFamily":"poppins"} -->
<p class="has-text-align-left banner-extra-head has-primary-color has-text-color has-link-color has-poppins-font-family has-large-font-size" style="border-radius:30px;padding-top:2px;padding-right:12px;padding-bottom:2px;padding-left:12px;font-style:normal;font-weight:500;text-transform:uppercase"><i class="fas fa-suitcase-rolling"></i> <?php esc_html_e('EXCELLENT SCHOOLING', 'legacy-preschool-kindergarten'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left","className":"banner-heading","style":{"elements":{"link":{"color":{"text":"#151414"}}},"color":{"text":"#151414"},"typography":{"fontSize":"36px","fontStyle":"normal","fontWeight":"400"}},"fontFamily":"protest-riot"} -->
<h2 class="wp-block-heading has-text-align-left banner-heading has-text-color has-link-color has-protest-riot-font-family" style="color:#151414;font-size:36px;font-style:normal;font-weight:400"><?php esc_html_e('A free nanny will be provided on the first day of your trial period', 'legacy-preschool-kindergarten'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"banner-para","style":{"elements":{"link":{"color":{"text":"#555555"}}},"color":{"text":"#555555"}},"fontFamily":"poppins"} -->
<p class="has-text-align-left banner-para has-text-color has-link-color has-poppins-font-family" style="color:#555555"><?php esc_html_e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'legacy-preschool-kindergarten'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"banner-btn","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons banner-btn" style="padding-top:0;padding-bottom:0"><!-- wp:button {"textAlign":"center","backgroundColor":"primary","style":{"spacing":{"padding":{"top":"6px","bottom":"6px"}},"typography":{"letterSpacing":"0px"},"border":{"radius":{"topLeft":"6px","topRight":"6px","bottomLeft":"6px","bottomRight":"6px"}}},"fontSize":"medium","fontFamily":"poppins"} -->
<div class="wp-block-button"><a href="#" class="wp-block-button__link has-primary-background-color has-background has-poppins-font-family has-medium-font-size has-text-align-center has-custom-font-size wp-element-button" style="border-top-left-radius:6px;border-top-right-radius:6px;border-bottom-left-radius:6px;border-bottom-right-radius:6px;padding-top:6px;padding-bottom:6px;letter-spacing:0px"><?php esc_html_e('Try For Free', 'legacy-preschool-kindergarten'); ?>  <i class="fas fa-long-arrow-alt-right"></i></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"50%","className":"banner-position"} -->
<div class="wp-block-column is-vertically-aligned-bottom banner-position" style="flex-basis:50%"><!-- wp:group {"className":"slide-empty","layout":{"type":"constrained","justifyContent":"right"}} -->
<div class="wp-block-group slide-empty"><!-- wp:image {"id":274,"sizeSlug":"full","linkDestination":"none","align":"right"} -->
<figure class="wp-block-image alignright size-full"><img src="<?php echo esc_url($legacy_preschool_kindergarten_hero_image_2); ?>" alt="" class="wp-image-274"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->