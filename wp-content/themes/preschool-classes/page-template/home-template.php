<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <?php if (get_theme_mod('preschool_classes_banner_section_setting', false) != '') { ?>
    <section id="top-banner">
      <div class="banner-img-content">
        <div class="banner-content">
          <?php if(get_theme_mod('preschool_classes_banner_heading') != ''){ ?>
            <h2><?php echo esc_html(get_theme_mod('preschool_classes_banner_heading')); ?></h2>
          <?php }?>
          <?php if(get_theme_mod('preschool_classes_banner_content') != ''){ ?>
            <p><?php echo esc_html(get_theme_mod('preschool_classes_banner_content')); ?></p>
          <?php }?>
          <?php if(get_theme_mod('preschool_classes_banner_btn_text') != '' || get_theme_mod('preschool_classes_banner_btn_url') != ''){?>
            <a href="<?php echo esc_url(get_theme_mod('preschool_classes_banner_btn_url')); ?>" class="banner-btn"><?php echo esc_html(get_theme_mod('preschool_classes_banner_btn_text')); ?></a>
          <?php }?>
        </div>

        <div class="container">
          <div class="banner-post">
            <div class="row">
              <div class="col-lg-3 col-md-6 curve-post">
                <div class="post-box">
                  <?php if(get_theme_mod('preschool_classes_banner_image1') != ''){ ?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_theme_mod('preschool_classes_banner_image1')); ?>" alt="" />
                    </div>
                  <?php } else{?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/post-img.png" alt="" />
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 curve-post">
                <div class="post-box">
                  <?php if(get_theme_mod('preschool_classes_banner_image2') != ''){ ?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_theme_mod('preschool_classes_banner_image2')); ?>" alt="" />
                    </div>
                  <?php } else{?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/post-img.png" alt="" />
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 curve-post">
                <div class="post-box">
                  <?php if(get_theme_mod('preschool_classes_banner_image3') != ''){ ?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_theme_mod('preschool_classes_banner_image3')); ?>" alt="" />
                    </div>
                  <?php } else{?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/post-img.png" alt="" />
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 curve-post">
                <div class="post-box">
                  <?php if(get_theme_mod('preschool_classes_banner_image4') != ''){ ?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_theme_mod('preschool_classes_banner_image4')); ?>" alt="" />
                    </div>
                  <?php } else{?>
                    <div class="post-img">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/post-img.png" alt="" />
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php if (get_theme_mod('preschool_classes_service_section_setting', false) != '') { ?>
    <section id="service-section" class="py-5">
      <div class="container">
        <div class="service-head">
          <?php if(get_theme_mod('preschool_classes_service_short_heading') != ''){ ?>
            <h6 class="short-heading"><?php echo esc_html(get_theme_mod('preschool_classes_service_short_heading')); ?></h6>
          <?php }?>
          <?php if(get_theme_mod('preschool_classes_service_heading') != ''){ ?>
            <h3 class="main-heading mb-5"><?php echo esc_html(get_theme_mod('preschool_classes_service_heading')); ?></h3>
          <?php }?>
        </div>
        <div class="row">
          <?php
            $preschool_classes_service_category = get_theme_mod('preschool_classes_service_category','');
            if($preschool_classes_service_category){
              $preschool_classes_page_query5 = new WP_Query(array( 'category_name' => esc_html($preschool_classes_service_category,'preschool-classes')));
              $i=1;
              while( $preschool_classes_page_query5->have_posts() ) : $preschool_classes_page_query5->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="service-box">
                    <?php if(has_post_thumbnail()){ ?>
                      <div class="service-img mb-3">
                        <?php the_post_thumbnail(); ?>
                      </div>
                    <?php } else{?>
                      <div class="service-img mb-3">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/service-img1.png" alt="" />
                      </div>
                    <?php } ?>
                    <div class="service-content">
                      <h4 class="mb-0"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 5, '...'); ?></a></h4>
                      <a href="<?php the_permalink(); ?>" target="_blank" class="learn-btn"><?php echo esc_html('Learn More', 'preschool-classes'); ?></a>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>