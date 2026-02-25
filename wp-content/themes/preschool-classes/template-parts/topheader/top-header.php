<?php
/**
 * Displays Top header
 *
 * @package Preschool Classes
 */
?>
<?php
$preschool_classes_sticky_header = get_theme_mod('preschool_classes_sticky_header');
    $preschool_classes_data_sticky = "false";
    if ($preschool_classes_sticky_header) {
    $preschool_classes_data_sticky = "true";
  }
 ?>
<div class="top-header py-2" data-sticky="<?php echo esc_attr($preschool_classes_data_sticky); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 align-self-center">
				<div class="social-icons text-md-start text-center">
                    <?php if(get_theme_mod('preschool_classes_facebook_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('preschool_classes_facebook_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('preschool_classes_facebook_icon') ); ?>"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('preschool_classes_twitter_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('preschool_classes_twitter_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('preschool_classes_twitter_icon') ); ?>"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('preschool_classes_intagram_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('preschool_classes_intagram_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('preschool_classes_intagram_icon') ); ?>"></i></a>
                    <?php }?>
                    <?php if(get_theme_mod('preschool_classes_youtube_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('preschool_classes_youtube_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('preschool_classes_youtube_icon') ); ?>"></i></a>
                    <?php }?>
                </div>
			</div>
			<div class="col-lg-8 col-md-8 align-self-center">
				<div class="topbar-text text-md-end text-center">
					<?php if(get_theme_mod('preschool_classes_topbar_location') != ''){?>
						<p class="location"><i class="fas fa-map-marker-alt me-2"></i><?php echo esc_html(get_theme_mod('preschool_classes_topbar_location')); ?></p>
					<?php }?>
					<?php if(get_theme_mod('preschool_classes_email_address') != ''){?>
						<a href="mailto:<?php echo esc_attr(get_theme_mod('preschool_classes_email_address')); ?>"><i class="fas fa-envelope me-2"></i><?php echo esc_html(get_theme_mod('preschool_classes_email_address')); ?></a>
					<?php }?>
					<?php if(get_theme_mod('preschool_classes_phone_number') != ''){?>
						<a href="tel:<?php echo esc_attr(get_theme_mod('preschool_classes_phone_number')); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html(get_theme_mod('preschool_classes_phone_number')); ?></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>