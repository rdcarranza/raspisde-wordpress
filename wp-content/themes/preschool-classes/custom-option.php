<?php

    $preschool_classes_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $preschool_classes_scroll_position = get_theme_mod( 'preschool_classes_scroll_top_position','Right');
    if($preschool_classes_scroll_position == 'Right'){
        $preschool_classes_theme_css .='#button{';
            $preschool_classes_theme_css .='right: 20px;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_scroll_position == 'Left'){
        $preschool_classes_theme_css .='#button{';
            $preschool_classes_theme_css .='left: 20px;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_scroll_position == 'Center'){
        $preschool_classes_theme_css .='#button{';
            $preschool_classes_theme_css .='right: 50%;left: 50%;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $preschool_classes_footer_widget_heading_alignment = get_theme_mod( 'preschool_classes_footer_widget_heading_alignment','Left');
    if($preschool_classes_footer_widget_heading_alignment == 'Left'){
        $preschool_classes_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $preschool_classes_theme_css .='text-align: left;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_footer_widget_heading_alignment == 'Center'){
        $preschool_classes_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $preschool_classes_theme_css .='text-align: center;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_footer_widget_heading_alignment == 'Right'){
        $preschool_classes_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $preschool_classes_theme_css .='text-align: right;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $preschool_classes_footer_widget_content_alignment = get_theme_mod( 'preschool_classes_footer_widget_content_alignment','Left');
    if($preschool_classes_footer_widget_content_alignment == 'Left'){
        $preschool_classes_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $preschool_classes_theme_css .='text-align: left;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_footer_widget_content_alignment == 'Center'){
        $preschool_classes_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $preschool_classes_theme_css .='text-align: center;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_footer_widget_content_alignment == 'Right'){
        $preschool_classes_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $preschool_classes_theme_css .='text-align: right;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $preschool_classes_copyright_content_alignment = get_theme_mod( 'preschool_classes_copyright_content_alignment','Center');
    if($preschool_classes_copyright_content_alignment == 'Left'){
        $preschool_classes_theme_css .='.footer-menu-left{';
        $preschool_classes_theme_css .='text-align: left !important;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_copyright_content_alignment == 'Center'){
        $preschool_classes_theme_css .='.footer-menu-left{';
            $preschool_classes_theme_css .='text-align: center !important;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_copyright_content_alignment == 'Right'){
        $preschool_classes_theme_css .='.footer-menu-left{';
            $preschool_classes_theme_css .='text-align: right !important;';
        $preschool_classes_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $preschool_classes_width_option = get_theme_mod( 'preschool_classes_width_option','Full Width');
    if($preschool_classes_width_option == 'Boxed Width'){
        $preschool_classes_theme_css .='body{';
            $preschool_classes_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $preschool_classes_theme_css .='}';
        $preschool_classes_theme_css .='.scrollup i{';
            $preschool_classes_theme_css .='right: 100px;';
        $preschool_classes_theme_css .='}';
        $preschool_classes_theme_css .='.page-template-custom-home-page .home-page-header{';
            $preschool_classes_theme_css .='padding: 0px 40px 0 10px;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_width_option == 'Wide Width'){
        $preschool_classes_theme_css .='body{';
            $preschool_classes_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $preschool_classes_theme_css .='}';
        $preschool_classes_theme_css .='.scrollup i{';
            $preschool_classes_theme_css .='right: 30px;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_width_option == 'Full Width'){
        $preschool_classes_theme_css .='body{';
            $preschool_classes_theme_css .='max-width: 100%;';
        $preschool_classes_theme_css .='}';
    }



    /*-------------------- Global First Color -------------------*/

    $preschool_classes_first_color = get_theme_mod('preschool_classes_first_color');

    if ($preschool_classes_first_color) {
        $preschool_classes_theme_css .= ':root {';
        $preschool_classes_theme_css .= '--first-color: ' . esc_attr($preschool_classes_first_color) . ' !important;';
        $preschool_classes_theme_css .= '} ';
    }

    /*-------------------- Heading typography -------------------*/

    $preschool_classes_heading_color = get_theme_mod('preschool_classes_heading_color');
    $preschool_classes_heading_font_family = get_theme_mod('preschool_classes_heading_font_family');
    $preschool_classes_heading_font_size = get_theme_mod('preschool_classes_heading_font_size');
    if($preschool_classes_heading_color != false || $preschool_classes_heading_font_family != false || $preschool_classes_heading_font_size != false){
        $preschool_classes_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #top-slider .slider-inner-box h3, .featured h3.main-heading, .article-box h3.entry-title, .featured h4.main-heading, #colophon h5, .sidebar h5{';
            $preschool_classes_theme_css .='color: '.esc_attr($preschool_classes_heading_color).'!important; 
            font-family: '.esc_attr($preschool_classes_heading_font_family).'!important;
            font-size: '.esc_attr($preschool_classes_heading_font_size).'px !important;';
        $preschool_classes_theme_css .='}';
    }

    $preschool_classes_paragraph_color = get_theme_mod('preschool_classes_paragraph_color');
    $preschool_classes_paragraph_font_family = get_theme_mod('preschool_classes_paragraph_font_family');
    $preschool_classes_paragraph_font_size = get_theme_mod('preschool_classes_paragraph_font_size');
    if($preschool_classes_paragraph_color != false || $preschool_classes_paragraph_font_family != false || $preschool_classes_paragraph_font_size != false){
        $preschool_classes_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $preschool_classes_theme_css .='color: '.esc_attr($preschool_classes_paragraph_color).'!important; 
            font-family: '.esc_attr($preschool_classes_paragraph_font_family).'!important;
            font-size: '.esc_attr($preschool_classes_paragraph_font_size).'px !important;';
        $preschool_classes_theme_css .='}';
    }

    /*---------------- Logo CSS ----------------------*/
    $preschool_classes_logo_title_font_size = get_theme_mod( 'preschool_classes_logo_title_font_size');
    $preschool_classes_logo_tagline_font_size = get_theme_mod( 'preschool_classes_logo_tagline_font_size');
    if( $preschool_classes_logo_title_font_size != '') {
        $preschool_classes_theme_css .='#masthead .navbar-brand a{';
            $preschool_classes_theme_css .='font-size: '. $preschool_classes_logo_title_font_size. 'px;';
        $preschool_classes_theme_css .='}';
    }
    if( $preschool_classes_logo_tagline_font_size != '') {
        $preschool_classes_theme_css .='#masthead .navbar-brand p{';
            $preschool_classes_theme_css .='font-size: '. $preschool_classes_logo_tagline_font_size. 'px;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $preschool_classes_product_sale = get_theme_mod( 'preschool_classes_woocommerce_product_sale','Right');
    if($preschool_classes_product_sale == 'Right'){
        $preschool_classes_theme_css .='.woocommerce ul.products li.product .onsale{';
            $preschool_classes_theme_css .='left: auto; right: 15px;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_product_sale == 'Left'){
        $preschool_classes_theme_css .='.woocommerce ul.products li.product .onsale{';
            $preschool_classes_theme_css .='left: 15px; right: auto;';
        $preschool_classes_theme_css .='}';
    }else if($preschool_classes_product_sale == 'Center'){
        $preschool_classes_theme_css .='.woocommerce ul.products li.product .onsale{';
            $preschool_classes_theme_css .='right: 50%;left: 50%;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Border Radius -------------------*/

    $preschool_classes_woo_product_sale_border_radius = get_theme_mod('preschool_classes_woo_product_sale_border_radius');
    if($preschool_classes_woo_product_sale_border_radius != false){
        $preschool_classes_theme_css .='.woocommerce ul.products li.product .onsale{';
            $preschool_classes_theme_css .='border-radius: '.esc_attr($preschool_classes_woo_product_sale_border_radius).'px;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------- Woocommerce Product Border Radius -------------------*/

    $preschool_classes_woo_product_border_radius = get_theme_mod('preschool_classes_woo_product_border_radius', 0);
    if($preschool_classes_woo_product_border_radius != false){
        $preschool_classes_theme_css .='.woocommerce ul.products li.product a img{';
            $preschool_classes_theme_css .='border-radius: '.esc_attr($preschool_classes_woo_product_border_radius).'px;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Product Image Box Shadow -------------------*/

    $preschool_classes_woo_product_image_box_shadow = get_theme_mod('preschool_classes_woo_product_image_box_shadow',0);
    if($preschool_classes_woo_product_image_box_shadow != false){
        $preschool_classes_theme_css .='.woocommerce ul.products li.product a img{';
            $preschool_classes_theme_css .='box-shadow: '.esc_attr($preschool_classes_woo_product_image_box_shadow).'px '.esc_attr($preschool_classes_woo_product_image_box_shadow).'px '.esc_attr($preschool_classes_woo_product_image_box_shadow).'px #cccccc;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Featured Image Border Radius -------------------*/

    $preschool_classes_post_page_image_border_radius = get_theme_mod('preschool_classes_post_page_image_border_radius', 0);
    if($preschool_classes_post_page_image_border_radius != false){
        $preschool_classes_theme_css .='.article-box img{';
            $preschool_classes_theme_css .='border-radius: '.esc_attr($preschool_classes_post_page_image_border_radius).'px;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Post Page Image Box Shadow -------------------*/

    $preschool_classes_post_page_image_box_shadow = get_theme_mod('preschool_classes_post_page_image_box_shadow',0);
    if($preschool_classes_post_page_image_box_shadow != false){
        $preschool_classes_theme_css .='.article-box img{';
            $preschool_classes_theme_css .='box-shadow: '.esc_attr($preschool_classes_post_page_image_box_shadow).'px '.esc_attr($preschool_classes_post_page_image_box_shadow).'px '.esc_attr($preschool_classes_post_page_image_box_shadow).'px #cccccc;';
        $preschool_classes_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $preschool_classes_single_post_page_image_box_shadow = get_theme_mod('preschool_classes_single_post_page_image_box_shadow',0);
    if($preschool_classes_single_post_page_image_box_shadow != false){
        $preschool_classes_theme_css .='.single-post .entry-header img{';
            $preschool_classes_theme_css .='box-shadow: '.esc_attr($preschool_classes_single_post_page_image_box_shadow).'px '.esc_attr($preschool_classes_single_post_page_image_box_shadow).'px '.esc_attr($preschool_classes_single_post_page_image_box_shadow).'px #cccccc;';
        $preschool_classes_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $preschool_classes_single_post_page_image_border_radius = get_theme_mod('preschool_classes_single_post_page_image_border_radius', 0);
    if($preschool_classes_single_post_page_image_border_radius != false){
        $preschool_classes_theme_css .='.single-post .entry-header img{';
            $preschool_classes_theme_css .='border-radius: '.esc_attr($preschool_classes_single_post_page_image_border_radius).'px;';
        $preschool_classes_theme_css .='}';
    }

        /*---------------- Single post Settings ------------------*/

    $preschool_classes_single_post_navigation_show_hide = get_theme_mod('preschool_classes_single_post_navigation_show_hide',true);
    if($preschool_classes_single_post_navigation_show_hide != true){
        $preschool_classes_theme_css .='.nav-links{';
            $preschool_classes_theme_css .='display: none;';
        $preschool_classes_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $preschool_classes_nav_menu = get_theme_mod( 'preschool_classes_nav_menu_text_transform','Capitalize');
    if($preschool_classes_nav_menu == 'Capitalize'){
        $preschool_classes_theme_css .='.site-navigation .primary-menu > li a{';
            $preschool_classes_theme_css .='text-transform:Capitalize;';
        $preschool_classes_theme_css .='}';
    }
    if($preschool_classes_nav_menu == 'Lowercase'){
        $preschool_classes_theme_css .='.site-navigation .primary-menu > li a{';
            $preschool_classes_theme_css .='text-transform:Lowercase;';
        $preschool_classes_theme_css .='}';
    }
    if($preschool_classes_nav_menu == 'Uppercase'){
        $preschool_classes_theme_css .='.site-navigation .primary-menu > li a{';
            $preschool_classes_theme_css .='text-transform:Uppercase;';
        $preschool_classes_theme_css .='}';
    }

    $preschool_classes_menu_font_size = get_theme_mod( 'preschool_classes_menu_font_size');
    if($preschool_classes_menu_font_size != ''){
        $preschool_classes_theme_css .='.site-navigation .primary-menu > li a{';
            $preschool_classes_theme_css .='font-size: '.esc_attr($preschool_classes_menu_font_size).'px;';
        $preschool_classes_theme_css .='}';
    }

    $preschool_classes_nav_menu_font_weight = get_theme_mod( 'preschool_classes_nav_menu_font_weight',600);
    if($preschool_classes_menu_font_size != ''){
        $preschool_classes_theme_css .='.site-navigation .primary-menu > li a{';
            $preschool_classes_theme_css .='font-weight: '.esc_attr($preschool_classes_nav_menu_font_weight).';';
        $preschool_classes_theme_css .='}';
    }