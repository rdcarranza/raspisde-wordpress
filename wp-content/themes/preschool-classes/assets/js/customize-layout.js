(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-preschool_classes_options-';
		
		// Label
		function preschool_classes_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'preschool_classes_global_color' || id === 'preschool_classes_heading_color' || id === 'preschool_classes_paragraph_color') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'preschool_classes_scroll_hide' || id === 'preschool_classes_preloader_hide' || id === 'preschool_classes_sticky_header' || id === 'preschool_classes_products_per_row' || id === 'preschool_classes_scroll_top_position' || id === 'preschool_classes_products_per_row' || id === 'preschool_classes_width_option' || id === 'preschool_classes_nav_menu_text_transform')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'preschool_classes_woocommerce_product_sale' || id === 'preschool_classes_woocommerce_related_product_show_hide') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'preschool_classes_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header
			
			if ( id === 'preschool_classes_topbar_location' || id === 'preschool_classes_email_address' || id === 'preschool_classes_phone_number' || id === 'preschool_classes_header_search_setting' || id === 'preschool_classes_header_btn_text') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Banner

			if ( id === 'preschool_classes_banner_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Products

			if ( id === 'preschool_classes_activities_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'preschool_classes_footer_widget_content_alignment' || id === 'preschool_classes_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'preschool_classes_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'preschool_classes_single_post_page_content' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'preschool_classes_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-preschool_classes_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		preschool_classes_customizer_label( 'custom_logo', 'Logo Setup' );
		preschool_classes_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		preschool_classes_customizer_label( 'preschool_classes_global_color', 'Global Color' );
		preschool_classes_customizer_label( 'preschool_classes_heading_color', 'Heading Typography' );
		preschool_classes_customizer_label( 'preschool_classes_paragraph_color', 'Paragraph Typography' );

		// General Setting
		preschool_classes_customizer_label( 'preschool_classes_preloader_hide', 'Preloader' );
		preschool_classes_customizer_label( 'preschool_classes_scroll_hide', 'Scroll To Top' );
		preschool_classes_customizer_label( 'preschool_classes_scroll_top_position', 'Scroll to top Position' );
		preschool_classes_customizer_label( 'preschool_classes_products_per_row', 'woocommerce Setting' );
		preschool_classes_customizer_label( 'preschool_classes_width_option', 'Site Width Layouts' );
		preschool_classes_customizer_label( 'preschool_classes_sticky_header', 'Sticky Header' );
		preschool_classes_customizer_label( 'preschool_classes_woocommerce_product_sale', 'Woocommerce Product Sale' );
		preschool_classes_customizer_label( 'preschool_classes_nav_menu_text_transform', 'Nav Menus Text Transform' );

		// Colors
		preschool_classes_customizer_label( 'preschool_classes_theme_color', 'Theme Color' );
		preschool_classes_customizer_label( 'background_color', 'Colors' );
		preschool_classes_customizer_label( 'background_image', 'Image' );

		//Header Image
		preschool_classes_customizer_label( 'header_image', 'Header Image' );

		// Header 
		preschool_classes_customizer_label( 'preschool_classes_topbar_location', 'Location' );
		preschool_classes_customizer_label( 'preschool_classes_email_address', 'Email Address' );
		preschool_classes_customizer_label( 'preschool_classes_phone_number', 'Phone Number' );
		preschool_classes_customizer_label( 'preschool_classes_header_search_setting', 'Search' );
		preschool_classes_customizer_label( 'preschool_classes_header_btn_text', 'Header Button' );

		//Slider
		preschool_classes_customizer_label( 'preschool_classes_banner_section_setting', 'Banner' );

		//Products
		preschool_classes_customizer_label( 'preschool_classes_service_section', 'Service Section' );

		//Footer
		preschool_classes_customizer_label( 'preschool_classes_footer_widget_content_alignment', 'Footer' );
		preschool_classes_customizer_label( 'preschool_classes_show_hide_copyright', 'Copyright' );

		//Post setting
		preschool_classes_customizer_label( 'preschool_classes_post_page_title', 'Post Settings' );

		//Single post setting
		preschool_classes_customizer_label( 'preschool_classes_single_post_page_content', 'Single Post Settings' );
		preschool_classes_customizer_label( 'preschool_classes_single_post_comment_title', 'Single Post Comment' );
	

	});

})( jQuery );
