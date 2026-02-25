<?php
/**
 * Preschool Classes Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Preschool Classes
 */

if ( ! function_exists( 'preschool_classes_file_setup' ) ) :

    function preschool_classes_file_setup() {

        if ( ! defined( 'PRESCHOOL_CLASSES_URL' ) ) {
            define( 'PRESCHOOL_CLASSES_URL', esc_url( 'https://www.themagnifico.net/products/education-wordpress-theme-bundle', 'preschool-classes') );
        }
        if ( ! defined( 'PRESCHOOL_CLASSES_TEXT' ) ) {
            define( 'PRESCHOOL_CLASSES_TEXT', __( 'Preschool Classes Pro','preschool-classes' ));
        }
        if ( ! defined( 'PRESCHOOL_CLASSES_BUY_TEXT' ) ) {
            define( 'PRESCHOOL_CLASSES_BUY_TEXT', __( 'Buy Preschool Classes Pro','preschool-classes' ));
        }

    }
endif;
add_action( 'after_setup_theme', 'preschool_classes_file_setup' );

use WPTRT\Customize\Section\Preschool_Classes_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Preschool_Classes_Button::class );

    $manager->add_section(
        new Preschool_Classes_Button( $manager, 'preschool_classes_pro', [
            'title'       => esc_html( PRESCHOOL_CLASSES_TEXT,'preschool-classes' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'preschool-classes' ),
            'button_url'  => esc_url( PRESCHOOL_CLASSES_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'preschool-classes-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'preschool-classes-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function preschool_classes_customize_register($wp_customize){

    // Pro Version
    class Preschool_Classes_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( PRESCHOOL_CLASSES_BUY_TEXT  ,'preschool-classes' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function preschool_classes_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('preschool_classes_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'preschool-classes' ),
        'section'        => 'title_tagline',
        'settings'       => 'preschool_classes_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_logo_title_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'preschool_classes_sanitize_number_absint'
    ));
    $wp_customize->add_control('preschool_classes_logo_title_font_size',array(
        'label' => esc_html__('Title Font Size','preschool-classes'),
        'section' => 'title_tagline',
        'type'    => 'number'
    ));

    $wp_customize->add_setting('preschool_classes_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'preschool-classes' ),
        'section'        => 'title_tagline',
        'settings'       => 'preschool_classes_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_logo_tagline_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'preschool_classes_sanitize_number_absint'
    ));
    $wp_customize->add_control('preschool_classes_logo_tagline_font_size',array(
        'label' => esc_html__('Tagline Font Size','preschool-classes'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    //Logo
    $wp_customize->add_setting('preschool_classes_logo_max_height',array(
        'default'   => '200',
        'sanitize_callback' => 'preschool_classes_sanitize_number_absint'
    ));
    $wp_customize->add_control('preschool_classes_logo_max_height',array(
        'label' => esc_html__('Logo Width','preschool-classes'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_global_color', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_global_color', array(
        'section'     => 'preschool_classes_global_color_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    )));

    // Global Color Settings
     $wp_customize->add_section('preschool_classes_global_color_settings',array(
        'title' => esc_html__('Global Settings','preschool-classes'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'preschool_classes_first_color', array(
        'default' => '#ED145B',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_first_color', array(
        'label' => __('Select Your First Color', 'preschool-classes'),
        'description' => __('Change the global color of the theme in one click.', 'preschool-classes'),
        'section' => 'preschool_classes_global_color_settings',
        'settings' => 'preschool_classes_first_color',
    )));

    //Typography option
    $preschool_classes_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'preschool_classes_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_heading_color', array(
        'label' => __('Heading Color', 'preschool-classes'),
        'section' => 'preschool_classes_global_color_settings',
        'settings' => 'preschool_classes_heading_color',
    )));

    $wp_customize->add_setting('preschool_classes_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'preschool_classes_sanitize_choices',
    ));
    $wp_customize->add_control( 'preschool_classes_heading_font_family', array(
        'section' => 'preschool_classes_global_color_settings',
        'label'   => __('Heading Fonts', 'preschool-classes'),
        'type'    => 'select',
        'choices' => $preschool_classes_font_array,
    ));

    $wp_customize->add_setting('preschool_classes_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','preschool-classes'),
        'section' => 'preschool_classes_global_color_settings',
        'setting' => 'preschool_classes_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'preschool_classes_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_paragraph_color', array(
        'label' => __('Paragraph Color', 'preschool-classes'),
        'section' => 'preschool_classes_global_color_settings',
        'settings' => 'preschool_classes_paragraph_color',
    )));

    $wp_customize->add_setting('preschool_classes_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'preschool_classes_sanitize_choices',
    ));
    $wp_customize->add_control( 'preschool_classes_paragraph_font_family', array(
        'section' => 'preschool_classes_global_color_settings',
        'label'   => __('Paragraph Fonts', 'preschool-classes'),
        'type'    => 'select',
        'choices' => $preschool_classes_font_array,
    ));

    $wp_customize->add_setting('preschool_classes_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','preschool-classes'),
        'section' => 'preschool_classes_global_color_settings',
        'setting' => 'preschool_classes_paragraph_font_size',
        'type'  => 'text'
    ));

    // Post Layouts Settings
     $wp_customize->add_section('preschool_classes_post_layouts_settings',array(
        'title' => esc_html__('Post Layouts Settings','preschool-classes'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('preschool_classes_post_layout',array(
        'default' => 'pattern_two_column_right',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control(new Preschool_Classes_Image_Radio_Control($wp_customize, 'preschool_classes_post_layout', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','preschool-classes'),
        'section' => 'preschool_classes_post_layouts_settings',
        'choices' => array(
            'pattern_one_column' => esc_url(get_template_directory_uri()).'/assets/img/1column.png',
            'pattern_two_column_right' => esc_url(get_template_directory_uri()).'/assets/img/right-sidebar.png',
            'pattern_two_column_left' => esc_url(get_template_directory_uri()).'/assets/img/left-sidebar.png',
            'pattern_three_column' => esc_url(get_template_directory_uri()).'/assets/img/3column.png',
            'pattern_four_column' => esc_url(get_template_directory_uri()).'/assets/img/4column.png',
            'pattern_grid_post' => esc_url(get_template_directory_uri()).'/assets/img/grid.png',
    ))
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_layout', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_post_layout', array(
        'section'     => 'preschool_classes_post_layouts_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    ))); 

    // General Settings
     $wp_customize->add_section('preschool_classes_general_settings',array(
        'title' => esc_html__('General Settings','preschool-classes'),
        'priority'   => 30,
    ));

     $wp_customize->add_setting('preschool_classes_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_width_option',array(
        'type' => 'select',
        'section' => 'preschool_classes_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','preschool-classes'),
            'Wide Width' => __('Wide Width','preschool-classes'),
            'Boxed Width' => __('Boxed Width','preschool-classes')
        ),
    ) );

    $wp_customize->add_setting('preschool_classes_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_nav_menu_text_transform',array(
        'type' => 'radio',
        'choices' => array(
            'Uppercase' => __('Uppercase','preschool-classes'),
            'Capitalize' => __('Capitalize','preschool-classes'),
            'Lowercase' => __('Lowercase','preschool-classes'),
        ),
        'section'=> 'preschool_classes_general_settings',
    ));

    $wp_customize->add_setting('preschool_classes_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'preschool-classes' ),
        'section'        => 'preschool_classes_general_settings',
        'settings'       => 'preschool_classes_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'preschool_classes_preloader_bg_color', array(
        'default' => '#ED145B',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','preschool-classes'),
        'section' => 'preschool_classes_general_settings',
        'settings' => 'preschool_classes_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'preschool_classes_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','preschool-classes'),
        'section' => 'preschool_classes_general_settings',
        'settings' => 'preschool_classes_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'preschool_classes_preloader_dot_2_color', array(
        'default' => '#222222',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','preschool-classes'),
        'section' => 'preschool_classes_general_settings',
        'settings' => 'preschool_classes_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('preschool_classes_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'preschool-classes' ),
        'section'        => 'preschool_classes_general_settings',
        'settings'       => 'preschool_classes_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'preschool_classes_general_settings',
        'choices' => array(
            'Right' => __('Right','preschool-classes'),
            'Left' => __('Left','preschool-classes'),
            'Center' => __('Center','preschool-classes')
        ),
    ) );

    $wp_customize->add_setting( 'preschool_classes_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','preschool-classes'),
        'section' => 'preschool_classes_general_settings',
        'settings' => 'preschool_classes_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'preschool_classes_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preschool_classes_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','preschool-classes'),
        'section' => 'preschool_classes_general_settings',
        'settings' => 'preschool_classes_scroll_color'
    )));

    $wp_customize->add_setting('preschool_classes_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','preschool-classes'),
        'description' => __('Put in px','preschool-classes'),
        'section'   => 'preschool_classes_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('preschool_classes_scroll_border_radius',array(
        'default'   => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_scroll_border_radius',array(
        'label' => __('Scroll Top Border Radius','preschool-classes'),
        'description' => __('Put in %','preschool-classes'),
        'section'   => 'preschool_classes_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('preschool_classes_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'preschool-classes' ),
        'section'        => 'preschool_classes_general_settings',
        'settings'       => 'preschool_classes_sticky_header',
        'type'           => 'checkbox',
    )));

    // Product Columns
    $wp_customize->add_setting( 'preschool_classes_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'preschool_classes_sanitize_select',
    ) );

    $wp_customize->add_control('preschool_classes_products_per_row', array(
       'label' => __( 'Product per row', 'preschool-classes' ),
       'section'  => 'preschool_classes_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('preschool_classes_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_product_per_page',array(
        'label' => __('Product per page','preschool-classes'),
        'section'   => 'preschool_classes_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number_per_row',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number_per_row',array(
        'label'       => esc_html__('Related Products Column Count', 'preschool-classes'),
        'section'     => 'preschool_classes_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 4,
        ),
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number',array(
        'label'       => esc_html__('Number of Related Products Per Page', 'preschool-classes'),
        'section'     => 'preschool_classes_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 10,
        ),
    ));

    $wp_customize->add_setting('preschool_classes_related_product_display_setting', array(
        'default' => true,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_related_product_display_setting',array(
        'label'          => __( 'Show Related Products', 'preschool-classes' ),
        'section'        => 'preschool_classes_general_settings',
        'settings'       => 'preschool_classes_related_product_display_setting',
        'type'           => 'checkbox',
    )));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('preschool_classes_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'preschool-classes' ),
        'section'        => 'preschool_classes_general_settings',
        'settings'       => 'preschool_classes_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','preschool-classes'),
        'section' => 'preschool_classes_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','preschool-classes'),
            'Right Sidebar' => __('Right Sidebar','preschool-classes'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('preschool_classes_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'preschool-classes' ),
        'section'        => 'preschool_classes_general_settings',
        'settings'       => 'preschool_classes_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','preschool-classes'),
        'section' => 'preschool_classes_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','preschool-classes'),
            'Right Sidebar' => __('Right Sidebar','preschool-classes'),
        ),
    ) );

    $wp_customize->add_setting('preschool_classes_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','preschool-classes' ),
        'type' => 'radio',
        'section' => 'preschool_classes_general_settings',
        'choices' => array(
            'Right' => __('Right','preschool-classes'),
            'Left' => __('Left','preschool-classes'),
            'Center' => __('Center','preschool-classes')
        ),
    ) );

    $wp_customize->add_setting( 'preschool_classes_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'preschool_classes_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'preschool_classes_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','preschool-classes' ),
        'section'     => 'preschool_classes_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'preschool_classes_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'preschool_classes_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'preschool_classes_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','preschool-classes' ),
        'section'     => 'preschool_classes_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 150,
        ),
    ) );

    $wp_customize->add_setting( 'preschool_classes_woo_product_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'preschool_classes_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'preschool_classes_woo_product_image_box_shadow', array(
        'label'       => esc_html__( 'Product Image Box Shadow','preschool-classes' ),
        'section'     => 'preschool_classes_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'preschool_classes_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    )));

    // Social Link
    $wp_customize->add_section('preschool_classes_social_link',array(
        'title' => esc_html__('Social Links','preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_facebook_icon',array(
        'label' => esc_html__('Facebook Icon','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_facebook_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','preschool-classes')
    ));

    $wp_customize->add_setting('preschool_classes_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('preschool_classes_facebook_url',array(
        'label' => esc_html__('Facebook Link','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('preschool_classes_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_twitter_icon',array(
        'label' => esc_html__('Twitter Icon','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_twitter_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','preschool-classes')
    ));

    $wp_customize->add_setting('preschool_classes_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('preschool_classes_twitter_url',array(
        'label' => esc_html__('Twitter Link','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('preschool_classes_intagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_intagram_icon',array(
        'label' => esc_html__('Intagram Icon','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_intagram_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','preschool-classes')
    ));

    $wp_customize->add_setting('preschool_classes_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('preschool_classes_intagram_url',array(
        'label' => esc_html__('Intagram Link','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('preschool_classes_youtube_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_youtube_icon',array(
        'label' => esc_html__('Youtube Icon','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_youtube_icon',
        'type'  => 'text',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-youtube','preschool-classes')
    ));

    $wp_customize->add_setting('preschool_classes_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('preschool_classes_youtube_url',array(
        'label' => esc_html__('Youtube Link','preschool-classes'),
        'section' => 'preschool_classes_social_link',
        'setting' => 'preschool_classes_youtube_url',
        'type'  => 'url'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_404_setting', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_404_setting', array(
        'section'     => 'preschool_classes_404_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    )));

    //404 Page Settings
    $wp_customize->add_section('preschool_classes_404_page_settings',array(
        'title' => esc_html__(' 404 Page Settings','preschool-classes')
    ));

    $wp_customize->add_setting('preschool_classes_404_page_main_heading',array(
        'default'           => __( 'Oops! Page Not Found', 'preschool-classes' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_404_page_main_heading',array(
        'label' => esc_html__('404 Main Heading','preschool-classes'),
        'section' => 'preschool_classes_404_page_settings',
        'setting' => 'preschool_classes_404_page_main_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_404_page_content_1',array(
        'default'           => __( 'We can’t seem to find the page you’re looking for.', 'preschool-classes' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_404_page_content_1',array(
        'label' => esc_html__('404 Main Content 1','preschool-classes'),
        'section' => 'preschool_classes_404_page_settings',
        'setting' => 'preschool_classes_404_page_content_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_404_page_text_1',array(
        'default'           => __( 'It looks like nothing was found at this location.', 'preschool-classes' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_404_page_text_1',array(
        'label' => esc_html__('404 Text 1','preschool-classes'),
        'section' => 'preschool_classes_404_page_settings',
        'setting' => 'preschool_classes_404_page_text_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_404_page_content_2',array(
        'default'           => __( 'Need Help?', 'preschool-classes' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_404_page_content_2',array(
        'label' => esc_html__('404 Main Content 2','preschool-classes'),
        'section' => 'preschool_classes_404_page_settings',
        'setting' => 'preschool_classes_404_page_content_2',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_404_page_text_2',array(
        'default'           => __( 'Try searching for what you need below.', 'preschool-classes' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_404_page_text_2',array(
        'label' => esc_html__('404 Text 2','preschool-classes'),
        'section' => 'preschool_classes_404_page_settings',
        'setting' => 'preschool_classes_404_page_text_2',
        'type'  => 'text'
    ));

    //Top Header
    $wp_customize->add_section('preschool_classes_top_header',array(
        'title' => esc_html__(' Header Option','preschool-classes')
    ));

    $wp_customize->add_setting('preschool_classes_topbar_location',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_topbar_location',array(
        'label' => esc_html__('Location','preschool-classes'),
        'section' => 'preschool_classes_top_header',
        'setting' => 'preschool_classes_topbar_location',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_email_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('preschool_classes_email_address',array(
        'label' => esc_html__('Email Address','preschool-classes'),
        'section' => 'preschool_classes_top_header',
        'setting' => 'preschool_classes_email_address',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('preschool_classes_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_phone_number',array(
        'label' => esc_html__('Phone Number','preschool-classes'),
        'section' => 'preschool_classes_top_header',
        'setting' => 'preschool_classes_phone_number',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_header_search_setting', array(
        'default' => false,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_header_search_setting',array(
        'label'          => __( 'Show Search', 'preschool-classes' ),
        'section'        => 'preschool_classes_top_header',
        'settings'       => 'preschool_classes_header_search_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_header_btn_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_header_btn_text',array(
        'label' => esc_html__('Header Button Text','preschool-classes'),
        'section' => 'preschool_classes_top_header',
        'setting' => 'preschool_classes_header_btn_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_header_btn_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('preschool_classes_header_btn_url',array(
        'label' => esc_html__('Header Button URL','preschool-classes'),
        'section' => 'preschool_classes_top_header',
        'setting' => 'preschool_classes_header_btn_url',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_settings', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_header_settings', array(
        'section'     => 'preschool_classes_top_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    ))); 

    //Menu Settings
    $wp_customize->add_section('preschool_classes_menu_settings',array(
        'title' => esc_html__('Menus Settings','preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','preschool-classes'),
        'section' => 'preschool_classes_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('preschool_classes_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','preschool-classes'),
        'choices' => array(
            'Uppercase' => __('Uppercase','preschool-classes'),
            'Capitalize' => __('Capitalize','preschool-classes'),
            'Lowercase' => __('Lowercase','preschool-classes'),
        ),
        'section'=> 'preschool_classes_menu_settings',
    ));

    $wp_customize->add_setting('preschool_classes_nav_menu_font_weight',array(
        'default'=> '600',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','preschool-classes'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'preschool_classes_menu_settings',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_menu_settings', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_menu_settings', array(
        'section'     => 'preschool_classes_menu_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    ))); 

    // Pro Version
    $wp_customize->add_setting( 'pro_version_banner_settings', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_banner_settings', array(
        'section'     => 'preschool_classes_top_banner',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    ))); 

    //Banner
    $wp_customize->add_section('preschool_classes_top_banner',array(
        'title' => esc_html__('Banner Settings','preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_banner_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_banner_section_setting',array(
        'label'    => __( 'Show Banner', 'preschool-classes' ),
        'section'  => 'preschool_classes_top_banner',
        'settings' => 'preschool_classes_banner_section_setting',
        'type'     => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_banner_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_banner_heading',array(
        'label' => esc_html__('Heading','preschool-classes'),
        'section' => 'preschool_classes_top_banner',
        'setting' => 'preschool_classes_banner_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_banner_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_banner_content',array(
        'label' => esc_html__('Content','preschool-classes'),
        'section' => 'preschool_classes_top_banner',
        'setting' => 'preschool_classes_banner_content',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_banner_btn_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_banner_btn_text',array(
        'label' => esc_html__('Banner Button Text','preschool-classes'),
        'section' => 'preschool_classes_top_banner',
        'setting' => 'preschool_classes_banner_btn_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_banner_btn_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('preschool_classes_banner_btn_url',array(
        'label' => esc_html__('Banner Button URL','preschool-classes'),
        'section' => 'preschool_classes_top_banner',
        'setting' => 'preschool_classes_banner_btn_url',
        'type'  => 'text'
    ));

    for ($i=1; $i <= 4; $i++) { 
        $wp_customize->add_setting('preschool_classes_banner_image'.$i,array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'preschool_classes_banner_image'.$i,array(
            'label' => __('Banner Image ','preschool-classes'),
            'section' => 'preschool_classes_top_banner',
            'settings' => 'preschool_classes_banner_image'.$i,
        )));
    }
    

    //Popular Classes Section
    $wp_customize->add_section('preschool_classes_service_section',array(
        'title' => esc_html__('Service Section','preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_service_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'preschool_classes_service_section_setting',array(
        'label'          => __( 'Show Service Section', 'preschool-classes' ),
        'section'        => 'preschool_classes_service_section',
        'settings'       => 'preschool_classes_service_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('preschool_classes_service_short_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_service_short_heading',array(
        'label' => esc_html__('Short Heading','preschool-classes'),
        'section' => 'preschool_classes_service_section',
        'setting' => 'preschool_classes_service_short_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('preschool_classes_service_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('preschool_classes_service_heading',array(
        'label' => esc_html__('Heading','preschool-classes'),
        'section' => 'preschool_classes_service_section',
        'setting' => 'preschool_classes_service_heading',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('preschool_classes_service_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'preschool_classes_sanitize_select',
    ));
    $wp_customize->add_control('preschool_classes_service_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display posts','preschool-classes'),
        'section' => 'preschool_classes_service_section',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_service_settings', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_service_settings', array(
        'section'     => 'preschool_classes_service_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('preschool_classes_post_settings',array(
        'title' => esc_html__('Post Settings','preschool-classes'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('preschool_classes_post_page_title',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_post_page_meta',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_post_page_thumb',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_post_page_content',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'preschool-classes'),
    ));

    $wp_customize->add_setting( 'preschool_classes_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'preschool_classes_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'preschool_classes_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Post Page Image Border Radius','preschool-classes' ),
        'section'     => 'preschool_classes_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'preschool_classes_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'preschool_classes_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'preschool_classes_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Post Page Image Box Shadow','preschool-classes' ),
        'section'     => 'preschool_classes_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('preschool_classes_post_page_excerpt_length',array(
        'sanitize_callback' => 'preschool_classes_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('preschool_classes_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('preschool_classes_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('preschool_classes_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_post_page_pagination',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'preschool-classes'),
    ));

    $wp_customize->add_setting( 'preschool_classes_blog_pagination_type', array(
        'default'           => 'blog-nav-numbers',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control( 'preschool_classes_blog_pagination_type', array(
        'section' => 'preschool_classes_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Type', 'preschool-classes' ),
        'choices' => array(
            'blog-nav-numbers'  => __( 'Numeric', 'preschool-classes' ),
            'next-prev' => __( 'Older/Newer Posts', 'preschool-classes' ),
        )
    ));

    $wp_customize->add_setting('preschool_classes_single_post_page_content',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_single_post_thumb',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'preschool-classes'),
    ));

    $wp_customize->add_setting( 'preschool_classes_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'preschool_classes_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'preschool_classes_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','preschool-classes' ),
        'section'     => 'preschool_classes_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'preschool_classes_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'preschool_classes_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'preschool_classes_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','preschool-classes' ),
        'section'     => 'preschool_classes_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('preschool_classes_single_post_meta',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_single_post_title',array(
            'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_single_post_tags',array(
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('preschool_classes_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'preschool-classes'),
        'section'     => 'preschool_classes_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control('preschool_classes_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','preschool-classes'),
        'section' => 'preschool_classes_post_settings',
    ));

    $wp_customize->add_setting( 'preschool_classes_single_post_sidebar_position', array(
        'default'           => 'Right Side',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control( 'preschool_classes_single_post_sidebar_position', array(
        'section' => 'preschool_classes_post_settings',
        'type' => 'select',
        'label' => __( 'Single Post Sidebar Position', 'preschool-classes' ),
        'choices' => array(
            'Right Side' => __( 'Right Side', 'preschool-classes' ),
            'Left Side' => __( 'Left Side', 'preschool-classes' ),
        )
    ));

    $wp_customize->add_setting('preschool_classes_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('preschool_classes_single_post_comment_title',array(
        'label' => __('Add Comment Title','preschool-classes'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'preschool-classes' ),
        ),
        'section'=> 'preschool_classes_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('preschool_classes_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('preschool_classes_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','preschool-classes'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'preschool-classes' ),
        ),
        'section'=> 'preschool_classes_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'preschool_classes_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_settings', array(
        'sanitize_callback' => 'Preschool_Classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_footer_settings', array(
        'section'     => 'preschool_classes_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    )));
    
    // Footer
    $wp_customize->add_section('preschool_classes_site_footer_section', array(
        'title' => esc_html__('Footer', 'preschool-classes'),
    ));

    $wp_customize->add_setting('preschool_classes_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','preschool-classes'),
        'section' => 'preschool_classes_site_footer_section',
        'choices' => array(
            'Left' => __('Left','preschool-classes'),
            'Center' => __('Center','preschool-classes'),
            'Right' => __('Right','preschool-classes')
        ),
    ) );

    $wp_customize->add_setting('preschool_classes_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'preschool_classes_sanitize_checkbox'
    ));
    $wp_customize->add_control('preschool_classes_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','preschool-classes'),
        'section' => 'preschool_classes_site_footer_section',
    ));

    $wp_customize->add_setting('preschool_classes_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('preschool_classes_footer_text_setting', array(
        'label' => __('Replace the footer text', 'preschool-classes'),
        'section' => 'preschool_classes_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('preschool_classes_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'preschool_classes_sanitize_choices'
    ));
    $wp_customize->add_control('preschool_classes_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','preschool-classes'),
        'section' => 'preschool_classes_site_footer_section',
        'choices' => array(
            'Left' => __('Left','preschool-classes'),
            'Center' => __('Center','preschool-classes'),
            'Right' => __('Right','preschool-classes')
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'preschool_classes_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Preschool_Classes_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'preschool_classes_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'preschool-classes' ),
        'description' => esc_url( PRESCHOOL_CLASSES_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'preschool_classes_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function preschool_classes_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function preschool_classes_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function preschool_classes_customize_preview_js(){
    wp_enqueue_script('preschool-classes-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'preschool_classes_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function preschool_classes_panels_js() {
    wp_enqueue_style( 'preschool-classes-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'preschool-classes-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'preschool_classes_panels_js' );