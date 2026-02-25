<?php
/**
 * Displays main header
 *
 * @package Preschool Classes
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row nav-box">
            <div class="col-lg-3 col-md-4 logo-box align-self-center">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $preschool_classes_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $preschool_classes_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('preschool_classes_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('preschool_classes_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $preschool_classes_description = get_bloginfo( 'description', 'display' );
                            if ( $preschool_classes_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('preschool_classes_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($preschool_classes_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-lg-3 col-md-4 align-self-center header-search d-flex justify-content-md-end justify-content-center">
                <?php if (get_theme_mod('preschool_classes_header_search_setting', false) != false) { ?>
                    <span class="head-search align-self-center">
                        <span class="header-search-wrapper">
                            <a href="#" class="search-main">
                                <i class="fa fa-search"></i>
                            </a>
                            <div class="search-form-main clearfix">
                                <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="hidden" name="post_type" value="<?php echo esc_attr( get_search_query() ); ?>"> <!-- Set post type to product for WooCommerce products -->
                                    <label>
                                        <input type="search" class="search-field form-control" placeholder="Search 
                                        ..." value="<?php echo get_search_query(); ?>" name="s">
                                    </label>
                                    <input type="submit" class="search-submit btn btn-primary mt-3" value="Search">
                                </form>
                            </div>
                        </span>
                    </span>
                <?php } ?>
                <?php if(get_theme_mod('preschool_classes_header_btn_text') != '' || get_theme_mod('preschool_classes_header_btn_url') != ''){?>
                    <a href="<?php echo esc_url(get_theme_mod('preschool_classes_header_btn_url')); ?>" class="header-btn"><?php echo esc_html(get_theme_mod('preschool_classes_header_btn_text')); ?></a>
                <?php }?>
            </div>
        </div>
    </div>
</div>
