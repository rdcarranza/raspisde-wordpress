<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Preschool Classes
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="container site-main">
        <section class="error-404 not-found text-center">
            <div class="theme-area-headlines">
                <h2 class="theme-area-title mb-5">
                    <?php echo esc_html( get_theme_mod( 'preschool_classes_404_page_main_heading', __( 'Oops! Page Not Found', 'preschool-classes' ) ) ); ?>
                </h2>
            </div>
        </section>
        <section class="page-content text-center mb-5 pb-5">
            <div class="other-page-content">
                <div class="not-found-pagetext">
                    <h2><?php echo esc_html( get_theme_mod( 'preschool_classes_404_page_content_1', __( 'We can’t seem to find the page you’re looking for.', 'preschool-classes' ) ) ); ?></h2>
                    <p>
                        <?php echo esc_html( get_theme_mod( 'preschool_classes_404_page_text_1', __( 'It looks like nothing was found at this location.', 'preschool-classes' ) ) ); ?>
                        <a href="<?php echo esc_url( home_url() ); ?>">
                            <?php esc_html_e( 'Go back to Homepage', 'preschool-classes' ); ?>
                        </a>
                    </p>
                </div>
            </div>
            <div class="not-found-pagetext-main">
                <div class="not-found-pagetext">
                    <h2><?php echo esc_html( get_theme_mod( 'preschool_classes_404_page_content_2', __( 'Need Help?', 'preschool-classes' ) ) ); ?></h2>
                    <p><?php echo esc_html( get_theme_mod( 'preschool_classes_404_page_text_2', __( 'Try searching for what you need below.', 'preschool-classes' ) ) ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>