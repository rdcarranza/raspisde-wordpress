<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Preschool Classes
 */
do_action('preschool_classes_before_footer_content_action');

?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
	      	<div class="row">
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		          	<?php if (is_active_sidebar('preschool-classes-footer1')) : ?>
                        <?php dynamic_sidebar('preschool-classes-footer1'); ?>
                    <?php else : ?>
                        <aside id="search" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'firstsidebar', 'preschool-classes' ); ?>">
                            <h5 class="widget-title"><?php esc_html_e( 'About Us', 'preschool-classes' ); ?></h5>
                            <div class="textwidget">
                            	<p><?php esc_html_e( 'Nam malesuada nulla nisi, ut faucibus magna congue nec. Ut libero tortor, tempus at auctor in, molestie at nisi. In enim ligula, consequat eu feugiat a.', 'preschool-classes' ); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('preschool-classes-footer2')) : ?>
                        <?php dynamic_sidebar('preschool-classes-footer2'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Useful Links', 'preschool-classes' ); ?></h5>
                            <ul class="mt-4">
                            	<li><a href="#"><?php esc_html_e( 'Home', 'preschool-classes' ); ?></a></li>
                            	<li><a href="#"><?php esc_html_e( 'Tournaments', 'preschool-classes' ); ?></a></li>
                            	<li><a href="#"><?php esc_html_e( 'Reviews', 'preschool-classes' ); ?></a></li>
                            	<li><a href="#"><?php esc_html_e( 'About Us', 'preschool-classes' ); ?></a></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('preschool-classes-footer3')) : ?>
                        <?php dynamic_sidebar('preschool-classes-footer3'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Information', 'preschool-classes' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'FAQ', 'preschool-classes' ); ?></li>
                            	<li><?php esc_html_e( 'Site Maps', 'preschool-classes' ); ?></li>
                            	<li><?php esc_html_e( 'Privacy Policy', 'preschool-classes' ); ?></li>
                            	<li><?php esc_html_e( 'Contact Us', 'preschool-classes' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('preschool-classes-footer4')) : ?>
                        <?php dynamic_sidebar('preschool-classes-footer4'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Get In Touch', 'preschool-classes' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Via Carlo Montù 78', 'preschool-classes' ); ?><br><?php esc_html_e( '22021 Bellagio CO, Italy', 'preschool-classes' ); ?></li>
                            	<li><?php esc_html_e( '+11 6254 7855', 'preschool-classes' ); ?></li>
                            	<li><?php esc_html_e( 'support@example.com', 'preschool-classes' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('preschool_classes_show_hide_copyright', true)) {?>
	        <div class="site-info">
	            <div class="footer-menu-left text-center">
	            	<?php  if( ! get_theme_mod('preschool_classes_footer_text_setting') ){ ?>
					    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/'); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'preschool-classes' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep mr-1"> | </span>

					    <span>
					    	<a href="https://www.themagnifico.net/products/preschool-classes" target="_blank">
			              		<?php
				                /* translators: 1: Theme name,  */
				                printf( esc_html__( ' %1$s ', 'preschool-classes' ),'Preschool Classes WordPress Theme' );
				              	?>
			              	</a>
				          	<?php
				              /* translators: 1: Theme author. */
				              printf( esc_html__( 'by %1$s.', 'preschool-classes' ),'TheMagnifico'  );
				            ?>

	        			</span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('preschool_classes_footer_text_setting')); ?>
	            </div>
	        </div>
		<?php } ?>
	    <?php if(get_theme_mod('preschool_classes_scroll_hide',true)){ ?>
	    	<a id="button"><?php esc_html_e('TOP','preschool-classes'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>