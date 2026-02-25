<?php
/**
 * Preschool Classes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Preschool Classes
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Preschool_Classes_Loader.php' );

$Preschool_Classes_Loader = new \WPTRT\Autoload\Preschool_Classes_Loader();

$Preschool_Classes_Loader->preschool_classes_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Preschool_Classes_Loader->preschool_classes_register();

if ( ! function_exists( 'preschool_classes_setup' ) ) :

	function preschool_classes_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'preschool-classes', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('preschool-classes-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','preschool-classes' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'preschool_classes_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 200,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_preschool_classes_dismissable_notice', 'preschool_classes_dismissable_notice');
		add_action( 'wp_ajax_tm-check-plugin-exists', 'tm_check_plugin_exists' );
		add_action( 'wp_ajax_tm_install_and_activate_plugin', 'tm_install_and_activate_plugin' );
	}
endif;
add_action( 'after_setup_theme', 'preschool_classes_setup' );

function preschool_classes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'preschool_classes_content_width', 1170 );
}
add_action( 'after_setup_theme', 'preschool_classes_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function preschool_classes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'preschool-classes' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'preschool-classes' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 1', 'preschool-classes' ),
		'id'            => 'sidebar1',
		'description'   => esc_html__( 'Add widgets here.', 'preschool-classes' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 2', 'preschool-classes' ),
		'id'            => 'sidebar2',
		'description'   => esc_html__( 'Add widgets here.', 'preschool-classes' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'preschool-classes' ),
		'id'            => 'preschool-classes-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'preschool-classes' ),
		'id'            => 'preschool-classes-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'preschool-classes' ),
		'id'            => 'preschool-classes-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'preschool_classes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function preschool_classes_scripts() {

	wp_enqueue_style(
		'peralta',
		preschool_classes_wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Peralta:ital@0;1&display=swap'),  //  font-family: "Peralta", serif;
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'oswald',
		preschool_classes_wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap'),  //  font-family: "Oswald", sans-serif;
		array(),
		'1.0'
	);

	wp_enqueue_style( 'preschool-classes-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

	wp_enqueue_style( 'preschool-classes-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'preschool-classes-style',$preschool_classes_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('preschool-classes-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'preschool_classes_scripts' );

/**
 * Enqueue Preloader.
 */
function preschool_classes_preloader() {

  $preschool_classes_theme_color_css = '';
  $preschool_classes_preloader_bg_color = get_theme_mod('preschool_classes_preloader_bg_color');
  $preschool_classes_preloader_dot_1_color = get_theme_mod('preschool_classes_preloader_dot_1_color');
  $preschool_classes_preloader_dot_2_color = get_theme_mod('preschool_classes_preloader_dot_2_color');
  $preschool_classes_preloader2_dot_color = get_theme_mod('preschool_classes_preloader2_dot_color');
  $preschool_classes_logo_max_height = get_theme_mod('preschool_classes_logo_max_height');
  $preschool_classes_scroll_bg_color = get_theme_mod('preschool_classes_scroll_bg_color');
  $preschool_classes_scroll_color = get_theme_mod('preschool_classes_scroll_color');
  $preschool_classes_scroll_font_size = get_theme_mod('preschool_classes_scroll_font_size');
  $preschool_classes_scroll_border_radius = get_theme_mod('preschool_classes_scroll_border_radius');
  $preschool_classes_related_product_display_setting = get_theme_mod('preschool_classes_related_product_display_setting', true);

  	if(get_theme_mod('preschool_classes_logo_max_height') == '') {
		$preschool_classes_logo_max_height = '200';
	}

	if(get_theme_mod('preschool_classes_preloader_bg_color') == '') {
		$preschool_classes_preloader_bg_color = '#ED145B';
	}
	if(get_theme_mod('preschool_classes_preloader_dot_1_color') == '') {
		$preschool_classes_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('preschool_classes_preloader_dot_2_color') == '') {
		$preschool_classes_preloader_dot_2_color = '#222222';
	}

	// Start CSS build
	$preschool_classes_theme_color_css = '';

	
	if (!$preschool_classes_related_product_display_setting) {
	    $preschool_classes_theme_color_css .= '
	        .related.products,
	        .related h2 {
	            display: none !important;
	        }
	    ';
	}

	$preschool_classes_theme_color_css .= '
		.custom-logo-link img{
			max-height: '.esc_attr($preschool_classes_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($preschool_classes_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($preschool_classes_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($preschool_classes_preloader_dot_2_color).';
		  }
		}
		.load hr {
			background-color: '.esc_attr($preschool_classes_preloader2_dot_color).';
		}
		a#button{
			background-color: '.esc_attr($preschool_classes_scroll_bg_color).';
			color: '.esc_attr($preschool_classes_scroll_color).' !important;
			font-size: '.esc_attr($preschool_classes_scroll_font_size).'px;
			border-radius: '.esc_attr($preschool_classes_scroll_border_radius).'%;
		}
	';
    wp_add_inline_style( 'preschool-classes-style',$preschool_classes_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'preschool_classes_preloader' );

function preschool_classes_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function preschool_classes_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function preschool_classes_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function preschool_classes_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function preschool_classes_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'preschool_classes_loop_columns');
if (!function_exists('preschool_classes_loop_columns')) {
	function preschool_classes_loop_columns() {
		$columns = get_theme_mod( 'preschool_classes_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'preschool_classes_shop_per_page', 9 );
function preschool_classes_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'preschool_classes_product_per_page', 9 );
	return $cols;
}

// Filter to change the number of related products displayed
add_filter( 'woocommerce_output_related_products_args', 'preschool_classes_products_args' );
function preschool_classes_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

function preschool_classes_get_page_id_by_title($preschool_classes_pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $preschool_classes_pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}

function preschool_classes_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer_setting' );
    $wp_customize->remove_control( 'pro_version_footer_setting' );

}
add_action( 'customize_register', 'preschool_classes_remove_customize_register', 11 );

if ( class_exists( 'WP_Customize_Control' ) ) {
	// Image Toggle Radio Buttpon
	class Preschool_Classes_Image_Radio_Control extends WP_Customize_Control {

	    public function render_content() {
	 
	        if (empty($this->choices))
	            return;
	 
	        $name = '_customize-radio-' . $this->id;
	        ?>
	        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	        <ul class="controls" id='preschool-classes-img-container'>
	            <?php
	            foreach ($this->choices as $value => $label) :
	                $class = ($this->value() == $value) ? 'preschool-classes-radio-img-selected preschool-classes-radio-img-img' : 'preschool-classes-radio-img-img';
	                ?>
	                <li style="display: inline;">
	                    <label>
	                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
	                          	$this->link();
	                          	checked($this->value(), $value);
	                          	?> />
	                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
	                    </label>
	                </li>
	                <?php
	            endforeach;
	            ?>
	        </ul>
	        <?php
	    } 
	}
}


require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Menu
 */

require get_template_directory() . '/inc/class-navigation-menu.php';



// add_action( 'preschool_classes_navigation_action','preschool_classes_single_post_navigation',30 );
if( !function_exists('preschool_classes_content_offcanvas') ):

    // Offcanvas Contents
    function preschool_classes_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'preschool-classes'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Preschool_Classes_Menu_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'preschool_classes_before_footer_content_action','preschool_classes_content_offcanvas',30 );


if ( ! function_exists( 'preschool_classes_sub_menu_toggle_button' ) ) :

    function preschool_classes_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'primary' && isset( $args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';

                // Add the sub menu toggle with Font Awesome icon
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . esc_attr( $toggle_target_string ) . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'preschool-classes' ) . '</span><i class="fas fa-chevron-down"></i></span></button>';

            }

            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';

        } elseif ( $args->theme_location == 'primary' ) {

            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = '<i class="fas fa-chevron-down"></i></div>';

            } else {

                $args->before = '';
                $args->after  = '';

            }

        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'preschool_classes_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'preschool_classes_file_link_setup' ) ) :

	function preschool_classes_file_link_setup() {

		define( 'FREE_MNSSP_API_URL', 'https://license.themagnifico.net/api/general/' );

		if ( ! defined( 'PRESCHOOL_CLASSES_CONTACT_SUPPORT' ) ) {
			define('PRESCHOOL_CLASSES_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/preschool-classes/','preschool-classes'));
		}
		if ( ! defined( 'PRESCHOOL_CLASSES_REVIEW' ) ) {
			define('PRESCHOOL_CLASSES_REVIEW',__('https://wordpress.org/support/theme/preschool-classes/reviews/','preschool-classes'));
		}
		if ( ! defined( 'PRESCHOOL_CLASSES_LIVE_DEMO' ) ) {
			define('PRESCHOOL_CLASSES_LIVE_DEMO',__('https://demo.themagnifico.net/preschool-classes/','preschool-classes'));
		}
		if ( ! defined( 'PRESCHOOL_CLASSES_GET_PREMIUM_PRO' ) ) {
			define('PRESCHOOL_CLASSES_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/education-wordpress-theme-bundle','preschool-classes'));
		}
		if ( ! defined( 'PRESCHOOL_CLASSES_PRO_DOC' ) ) {
			define('PRESCHOOL_CLASSES_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/preschool-classes-pro-doc/','preschool-classes'));
		}
		if ( ! defined( 'PRESCHOOL_CLASSES_FREE_DOC' ) ) {
			define('PRESCHOOL_CLASSES_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/preschool-classes-free-doc/','preschool-classes'));
		}
		if ( ! defined( 'PRESCHOOL_CLASSES_BUNDLE_LINK' ) ) {
			define('PRESCHOOL_CLASSES_BUNDLE_LINK',__('https://www.themagnifico.net/products/wordpress-theme-bundle','preschool-classes'));
		}
	}
endif;
add_action( 'after_setup_theme', 'preschool_classes_file_link_setup' );

/** * Posts pagination. */
if ( ! function_exists( 'preschool_classes_blog_posts_pagination' ) ) {
	function preschool_classes_blog_posts_pagination() {
		$pagination_type = get_theme_mod( 'preschool_classes_blog_pagination_type', 'blog-nav-numbers' );
		if ( $pagination_type == 'blog-nav-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}

function tm_install_and_activate_plugin() {

	$post_plugin_details = $_POST['plugin_details'];
	$plugin_text_domain = $post_plugin_details['plugin_text_domain'];
	$plugin_main_file		=	$post_plugin_details['plugin_main_file'];
	$plugin_url					=	$post_plugin_details['plugin_url'];

	$plugin = array(
		'text_domain'	=> $plugin_text_domain,
		'path' 				=> $plugin_url,
		'install' 		=> $plugin_text_domain . '/' . $plugin_main_file
	);

	wp_cache_flush();

	$plugin_path = plugin_basename( trim( $plugin['install'] ) );


	$activate_plugin = activate_plugin( $plugin_path );

	if($activate_plugin) {

		echo $activate_plugin;

	} else {
		echo $activate_plugin;
	}

	$msg = 'installed';

	$response = array( 'status' => true, 'msg' => $msg );
	wp_send_json( $response );
	exit;
}

function tm_check_plugin_exists() {
		$plugin_text_domain = $_POST['plugin_text_domain'];
		$main_plugin_file 	= $_POST['main_plugin_file'];
		$plugin_path = $plugin_text_domain . '/' . $main_plugin_file;

		$get_plugins					= get_plugins();
		$is_plugin_installed	= false;
		$activation_status 		= false;
		if ( isset( $get_plugins[$plugin_path] ) ) {
		$is_plugin_installed = true;

		$activation_status = is_plugin_active( $plugin_path );
		}
		wp_send_json_success(
		array(
		'install_status'  =>	$is_plugin_installed,
			'active_status'		=>	$activation_status,
			'plugin_path'			=>	$plugin_path,
			'plugin_slug'			=>	$plugin_text_domain
		)
		);
}

/**
 * Get CSS
 */

function preschool_classes_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
   	wp_localize_script('admin-notice-script','preschool_classes',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('preschool_classes_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'preschool_classes_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_preschool-classes-info' != $hook ) {
		return;
	}
}
add_action( 'admin_enqueue_scripts', 'preschool_classes_getpage_css' );

//Admin Notice For Getstart
function preschool_classes_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'preschool_classes_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
add_action( 'wp_ajax_preschool_classes_dismissed_notice_handler', 'preschool_classes_ajax_notice_handler' );

function preschool_classes_deprecated_hook_admin_notice() {

    $preschool_classes_dismissed = get_user_meta(get_current_user_id(), 'preschool_classes_dismissable_notice', true);
    if ( !$preschool_classes_dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'preschool-classes'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'preschool-classes'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=preschool-classes-info' )); ?>"><?php esc_html_e( 'Get started', 'preschool-classes' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero notice-pro-btn" target="_blank" href="<?php echo esc_url( PRESCHOOL_CLASSES_GET_PREMIUM_PRO ); ?>"><?php esc_html_e( 'Get Premium ', 'preschool-classes' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero notice-bundle-btn" target="_blank" href="<?php echo esc_url( PRESCHOOL_CLASSES_BUNDLE_LINK ); ?>"><?php esc_html_e( 'Buy All Themes - 120+ Templates', 'preschool-classes' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( PRESCHOOL_CLASSES_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'preschool-classes' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'preschool_classes_deprecated_hook_admin_notice' );

function preschool_classes_switch_theme() {
    delete_user_meta(get_current_user_id(), 'preschool_classes_dismissable_notice');
}
add_action('after_switch_theme', 'preschool_classes_switch_theme');
function preschool_classes_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'preschool_classes_dismissable_notice', true);
    die();
}

// Demo Content Code

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    exit;
}

// Add the AJAX action to trigger theme mods import
add_action('wp_ajax_import_theme_mods', 'preschool_classes_demo_importer_ajax_handler');

// Handle the AJAX request
function preschool_classes_demo_importer_ajax_handler() {
    // Sample data to import
    $theme_mods_data = array(
        'header_textcolor' => '000000',  // Example: change header text color
        'background_color' => 'ffffff',  // Example: change background color
        'custom_logo'      => 123,       // Example: set a custom logo by attachment ID
        'footer_text'      => 'Custom Footer Text', // Example: custom footer text
    );

    // Call the function to import theme mods
    if (preschool_classes_demo_theme_importer($theme_mods_data)) {
        // After importing theme mods, create the menu
        preschool_classes_create_demo_menu();
        wp_send_json_success(array(
        	'msg' => 'Theme mods imported successfully.',
        	'redirect' => home_url()
        ));
    } else {
        wp_send_json_error('Failed to import theme mods.');
    }

    wp_die();
}

// Function to set theme mods
function preschool_classes_demo_theme_importer($import_data) {
    if (is_array($import_data)) {
        foreach ($import_data as $mod_name => $mod_value) {
            set_theme_mod($mod_name, $mod_value);
        }
        return true;
    } else {
        return false;
    }
}

// Function to create demo menu
function preschool_classes_create_demo_menu() {


    $menu_structure = [

        [
            'title' => 'Home',
            'slug'  => 'home',
            'template' => 'page-template/home-template.php',
        ],
        [
            'title' => 'About',
            'slug'  => 'about',
            'content' => "
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            "
        ],
        [
            'title' => 'Services',
            'slug'  => 'services',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
           	"
        ],
        [
            'title' => 'Blog',
            'slug'  => 'blog',
        ],
        [
            'title' => 'Contact',
            'slug'  => 'contact',
            'content' => "
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            "
        ],
    ];

    // ----------------------------------------------------
    // Do not modify below this line unless needed
    // ----------------------------------------------------

    $created_pages = [];

    $menu_name = 'Primary Menu';
    $location  = 'primary';
    $menu = wp_get_nav_menu_object($menu_name);

    $menu_id = (!$menu) ? wp_create_nav_menu($menu_name) : $menu->term_id;

    $create_page_and_menu = function($item, $parent_menu_id = 0, $parent_page_id = 0) 
        use (&$create_page_and_menu, &$created_pages, $menu_id) {

        $page = get_page_by_title($item['title']);

        if (!$page) {
            $page_id = wp_insert_post([
                'post_title'   => $item['title'],
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_name'    => $item['slug'],
                'post_parent'  => $parent_page_id,
                'post_content' => !empty($item['content']) ? $item['content'] : '',
            ]);

            if (!empty($item['template'])) {
                update_post_meta($page_id, '_wp_page_template', $item['template']);
            }

        } else {
            $page_id = $page->ID;
        }

        $created_pages[$item['title']] = $page_id;

        $menu_item_id = wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'     => $item['title'],
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $page_id,
            'menu-item-type'      => 'post_type',
            'menu-item-parent-id' => $parent_menu_id,
            'menu-item-status'    => 'publish'
        ]);

        if (!empty($item['children'])) {
            foreach ($item['children'] as $child) {
                $create_page_and_menu($child, $menu_item_id, $page_id);
            }
        }
    };

    foreach ($menu_structure as $item) {
        $create_page_and_menu($item);
    }

    if (!empty($created_pages['Home'])) {
        update_option('page_on_front', $created_pages['Home']);
        update_option('show_on_front', 'page');
    }

    if (!empty($created_pages['Blog'])) {
        update_option('page_for_posts', $created_pages['Blog']);
    }

    $locations = get_theme_mod('nav_menu_locations');
    $locations[$location] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);


    //Social Icons
    set_theme_mod( 'preschool_classes_facebook_icon', 'fab fa-facebook-f' );
    set_theme_mod( 'preschool_classes_facebook_url', 'www.facebook.com' );
    set_theme_mod( 'preschool_classes_twitter_icon', 'fab fa-twitter' );
    set_theme_mod( 'preschool_classes_twitter_url', 'www.twitter.com' );
    set_theme_mod( 'preschool_classes_intagram_icon', 'fab fa-instagram' );
    set_theme_mod( 'preschool_classes_intagram_url', 'www.instagram.com' );
    set_theme_mod( 'preschool_classes_youtube_icon', 'fab fa-youtube' );
    set_theme_mod( 'preschool_classes_youtube_url', 'www.youtube.com' );

    //Top Header
    set_theme_mod( 'preschool_classes_topbar_location', '6391 Elgin St. Celina, 10299' );
    set_theme_mod( 'preschool_classes_email_address', 'info@example.com' );
    set_theme_mod( 'preschool_classes_phone_number', '(123) 456-7890' );
    set_theme_mod( 'preschool_classes_header_search_setting', true );
    set_theme_mod( 'preschool_classes_header_btn_text', 'Get A Quote' );
    set_theme_mod( 'preschool_classes_header_btn_url', '#' );

    //Banner
    set_theme_mod( 'preschool_classes_banner_section_setting', true );
    set_theme_mod( 'preschool_classes_banner_heading', 'Exploring Minds Elementary School' );
    set_theme_mod( 'preschool_classes_banner_content', 'Lorem Ipsum has been the industrys standard dummy text ever since the, when an unknown printer took a galley of type and ' );
    set_theme_mod( 'preschool_classes_banner_btn_text', 'More Information' );
    set_theme_mod( 'preschool_classes_banner_btn_url', '#' );
    set_theme_mod( 'preschool_classes_banner_image1', get_template_directory_uri().'/assets/img/post-img.png' );
    set_theme_mod( 'preschool_classes_banner_image2', get_template_directory_uri().'/assets/img/post-img2.png' );
    set_theme_mod( 'preschool_classes_banner_image3', get_template_directory_uri().'/assets/img/post-img3.png' );
    set_theme_mod( 'preschool_classes_banner_image4', get_template_directory_uri().'/assets/img/post-img4.png' );

    // Service
    set_theme_mod( 'preschool_classes_service_section_setting', true );
    set_theme_mod( 'preschool_classes_service_short_heading', 'Latest Service' );
    set_theme_mod( 'preschool_classes_service_heading', 'Building a Strong Foundation for Success.' );
    set_theme_mod( 'preschool_classes_service_category', 'Service' );

    $preschool_classes_post_name_array = array('Child Care & Early Education', 'Family Support & Resources', 'Health and Safety',);

    // Create a category
    $preschool_classes_category_name = 'Service'; // You can change this name
    $preschool_classes_services_sec_category = wp_create_category($preschool_classes_category_name);

    // Ensure the category is created
    if (is_wp_error($preschool_classes_services_sec_category)) {
        return; // Exit if category creation failed
    }

    // Set theme mod for featured section category
    set_theme_mod('preschool_classes_service_category', $preschool_classes_category_name);

    for ($i = 0; $i < 3; $i++) {
        // Create post object
        $preschool_classes_post_name = $preschool_classes_post_name_array[$i];
        $preschool_classes_content = 'Lorem Ipsum is simply dummy text of the industrys since the unknown.';

        $my_post = array(
            'post_title'    => wp_strip_all_tags($preschool_classes_post_name),
            'post_content'  => $preschool_classes_content,
            'post_status'   => 'publish',
            'post_type'     => 'post',
            'post_category' => array($preschool_classes_services_sec_category),
        );

        // Insert the post into the database
        $post_id = wp_insert_post($my_post);

        if ($post_id) {

	        $image_url = get_template_directory_uri().'/assets/img/service-img' . $i . '.png';

	        wp_set_object_terms($post_id,'service', 'category');

			$image_id = media_sideload_image($image_url, $post_id, null, 'id');

	        if (!is_wp_error($image_id)) {
	            // Set the downloaded image as the post's featured image
	            set_post_thumbnail($post_id, $image_id);
	        }
      	}
    }

}
// Enqueue necessary scripts
add_action('admin_enqueue_scripts', 'preschool_classes_demo_importer_enqueue_scripts');

function preschool_classes_demo_importer_enqueue_scripts() {
    wp_enqueue_script(
        'demo-theme-importer',
        get_template_directory_uri() . '/assets/js/theme-importer.js', // Path to your JS file
        array('jquery'),
        null,
        true
    );

    wp_enqueue_style('demo-importer-style', get_template_directory_uri() . '/assets/css/importer.css', array(), '');

    // Localize script to pass AJAX URL to JS
    wp_localize_script(
        'demo-theme-importer',
        'demoImporter',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('theme_importer_nonce')
        )
    );
}

/**
 * Theme Info.
 */
function preschool_classes_Theme_Info_load() {
	require get_theme_file_path( '/inc/theme-installation/theme-installation.php' );
}
add_action( 'init', 'preschool_classes_Theme_Info_load' );

// add_action( 'preschool_classes_navigation_action','preschool_classes_single_post_navigation',30 );
if( !function_exists('preschool_classes_content_offcanvas') ):

    // Offcanvas Contents
    function preschool_classes_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'preschool-classes'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new preschool_classes_Menu_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'preschool_classes_before_footer_content_action','preschool_classes_content_offcanvas',30 );


if ( ! function_exists( 'preschool_classes_sub_menu_toggle_button' ) ) :

    function preschool_classes_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'primary' && isset( $args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';

                // Add the sub menu toggle with Font Awesome icon
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . esc_attr( $toggle_target_string ) . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'preschool-classes' ) . '</span><i class="fas fa-chevron-down"></i></span></button>';

            }

            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';

        } elseif ( $args->theme_location == 'primary' ) {

            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = '<i class="fas fa-chevron-down"></i></div>';

            } else {

                $args->before = '';
                $args->after  = '';

            }

        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'preschool_classes_sub_menu_toggle_button', 10, 3 );

add_action('wp_ajax_import_theme_mods', 'preschool_classes_import_function');

function preschool_classes_import_function() {
    check_ajax_referer('your-nonce-key', '_ajax_nonce');
    wp_send_json_success([
        'msg' => 'Demo imported successfully',
        'redirect' => admin_url('themes.php?page=theme-options')
    ]);
}

// Getstart Function


function free_mnssp_get_filtered_products($cursor = '', $search = '', $collection = 'pro') {
    $endpoint_url = FREE_MNSSP_API_URL . 'getFilteredProducts';

    $remote_post_data = array(
        'collectionHandle' => $collection,
        'productHandle' => $search,
        'paginationParams' => array(
            "first" => 12,
            "afterCursor" => $cursor,
            "beforeCursor" => "",
            "reverse" => true
        )
    );

    $body = wp_json_encode($remote_post_data);

    $options = [
        'body' => $body,
        'headers' => [
            'Content-Type' => 'application/json'
        ]
    ];
    $response = wp_remote_post($endpoint_url, $options);

    if (!is_wp_error($response)) {
        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        if (isset($response_body->data) && !empty($response_body->data)) {
            if (isset($response_body->data->products) && !empty($response_body->data->products)) {
                return  array(
                    'products' => $response_body->data->products,
                    'pagination' => $response_body->data->pageInfo
                );
            }
        }
        return [];
    }
    
    return [];
}

function free_mnssp_get_filtered_products_ajax() {
    $cursor = isset($_POST['cursor']) ? sanitize_text_field(wp_unslash($_POST['cursor'])) : '';
    $search = isset($_POST['search']) ? sanitize_text_field(wp_unslash($_POST['search'])) : '';
    $collection = isset($_POST['collection']) ? sanitize_text_field(wp_unslash($_POST['collection'])) : 'pro';

    check_ajax_referer('free_mnssp_create_pagination_nonce_action', 'mnssp_pagination_nonce');

    $get_filtered_products = free_mnssp_get_filtered_products($cursor, $search, $collection);
    ob_start();
    if (isset($get_filtered_products['products']) && !empty($get_filtered_products['products'])) {
        foreach ( $get_filtered_products['products'] as $product ) {

            $product_obj = $product->node;
            
            if (isset($product_obj->inCollection) && !$product_obj->inCollection) {
                continue;
            }

            $product_obj = $product->node;

            $demo_url = isset($product->node->metafield->value) ? $product->node->metafield->value : '';
            $product_url = isset($product->node->onlineStoreUrl) ? $product->node->onlineStoreUrl : '';
            $image_src = isset($product->node->images->edges[0]->node->src) ? $product->node->images->edges[0]->node->src : '';
            $price = isset($product->node->variants->edges[0]->node->price) ? '$' . $product->node->variants->edges[0]->node->price : ''; ?>

            <div class="mnssp-grid-item">
                <div class="mnssp-image-wrap">
                    <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr($product_obj->title); ?>">
                    <div class="mnssp-image-overlay">
                        <a class="mnssp-demo-url mnssp-btn" href="<?php echo esc_attr($demo_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Demo'); ?></a>
                        <a class="mnssp-buy-now mnssp-btn" href="<?php echo esc_attr($product_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html('Buy Now'); ?></a>
                    </div>
                </div>
                <footer>
                    <h3><?php echo esc_html($product_obj->title); ?></h3>
                </footer>
                <div class="mnssp-grid-item-price">Price: <?php echo esc_html($price); ?></div>
            </div>
        <?php }
    }
    $output = ob_get_clean();

    $pagination = isset($get_filtered_products['pagination']) ?  $get_filtered_products['pagination'] : [];
    wp_send_json(array(
        'content' => $output,
        'pagination' => $pagination
    ));
}

add_action('wp_ajax_free_mnssp_get_filtered_products', 'free_mnssp_get_filtered_products_ajax');
add_action('wp_ajax_nopriv_free_mnssp_get_filtered_products', 'free_mnssp_get_filtered_products_ajax');

function free_mnssp_get_collections() {
    
    $endpoint_url = FREE_MNSSP_API_URL . 'getCollections';

    $options = [
        'body' => [],
        'headers' => [
            'Content-Type' => 'application/json'
        ]
    ];
    $response = wp_remote_post($endpoint_url, $options);

    if (!is_wp_error($response)) {
        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        if (isset($response_body->data) && !empty($response_body->data)) {
           return  $response_body->data;
        }
        return  [];
    }

    return  [];
}