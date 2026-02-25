<?php

/**
 * Welcome Notice class.
 */
class Legacy_Preschool_Kindergarten_Welcome_Notice {

	/**
	** Constructor.
	*/
	public function __construct() {
		// Render Notice
		add_action( 'admin_notices', [$this, 'legacy_preschool_kindergarten_render_notice'] );

		// Enque AJAX Script
		add_action( 'admin_enqueue_scripts', [$this, 'legacy_preschool_kindergarten_admin_enqueue_scripts'], 5 );

		// Dismiss
		add_action( 'admin_enqueue_scripts', [$this, 'legacy_preschool_kindergarten_notice_enqueue_scripts'], 5 );
		add_action( 'wp_ajax_legacy_preschool_kindergarten_dismissed_handler', [$this, 'legacy_preschool_kindergarten_dismissed_handler'] );

		// Reset
		add_action( 'switch_theme', [$this, 'legacy_preschool_kindergarten_reset_notices'] );
		add_action( 'after_switch_theme', [$this, 'legacy_preschool_kindergarten_reset_notices'] );

	}

	/**
	** Render Notice
	*/
	public function legacy_preschool_kindergarten_render_notice() {
	global $pagenow;

	$legacy_preschool_kindergarten_screen = get_current_screen();

	if (
		$legacy_preschool_kindergarten_screen &&
		$legacy_preschool_kindergarten_screen->id !== 'appearance_page_legacy-preschool-kindergarten-theme-info' &&
		$legacy_preschool_kindergarten_screen->id !== 'appearance_page_legacy-preschool-kindergarten-demo'
	) {
		$legacy_preschool_kindergarten_transient_name = sprintf('%s_activation_notice', get_template());

		if ( ! get_transient($legacy_preschool_kindergarten_transient_name) ) {
			?>
			<div class="legacy-preschool-kindergarten-notice notice notice-info is-dismissible" data-notice="<?php echo esc_attr($legacy_preschool_kindergarten_transient_name); ?>">
				<button type="button" class="notice-dismiss"></button>

				<?php $this->legacy_preschool_kindergarten_render_notice_content(); ?>
			</div>
			<?php
		}
	}
}


	/**
	** Render Notice Content
	*/
	public function legacy_preschool_kindergarten_render_notice_content() {
		$legacy_preschool_kindergarten_action = 'install-activate';
		$legacy_preschool_kindergarten_redirect_url = 'admin.php?page=legacy-preschool-kindergarten-theme-info';
		$legacy_preschool_kindergarten_screen = get_current_screen();

		?>
		<div class="notice-left-icon-box">
			<span class="dashicons dashicons-businessperson notc-theme-icon"></span>
		</div>
		<div class="welcome-message">
			<div class="notc-contnt">
				<h4><?php esc_html_e('Thank you for installing Legacy Themes!', 'legacy-preschool-kindergarten'); ?></h4>
				<h1><?php esc_html_e('Welcome to Legacy Preschool Kindergarten WordPress Theme!', 'legacy-preschool-kindergarten'); ?></h1>
				<p><?php esc_html_e( 'Our WordPress themes are modern, minimalist, fully responsive, SEO-friendly, and packed with features—perfect for designers, bloggers, and creative professionals across various fields.', 'legacy-preschool-kindergarten' );?>
				</p>			
				<div class="action-buttons">
					<a href="<?php echo esc_url(admin_url($legacy_preschool_kindergarten_redirect_url)); ?>" class="button notice-btn button-hero" data-action="<?php echo esc_attr($legacy_preschool_kindergarten_action); ?>">
						<span class="notc-btn-txt"><?php echo esc_html__( 'Get Started with Legacy Preschool Kindergarten', 'legacy-preschool-kindergarten' ); ?></span>
					</a>
					<a href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_THEME_BUNDLE_URL); ?>" target="_blank" class="bundle-btn btn" >
						<span class="demo-btn-txt"><?php echo esc_html__( 'Get All Themes', 'legacy-preschool-kindergarten' ); ?></span>
					</a>
				</div>
			</div>			
		</div>
		<div class="notice-right-img-box">
			<img class="notc-right-img" src="<?php echo esc_url( get_template_directory_uri() . '/activation-notice/img/notice-right.png' ); ?>" alt="<?php esc_attr_e( 'notice themes img', 'legacy-preschool-kindergarten' ); ?>" />
		</div>

		<?php
	}

	/**
	** Reset Notice.
	*/
	public function legacy_preschool_kindergarten_reset_notices() {
		delete_transient( sprintf( '%s_activation_notice', get_template() ) );
	}

	/**
	** Dismissed handler
	*/
	public function legacy_preschool_kindergarten_dismissed_handler() {
		wp_verify_nonce( null );

		if ( isset( $_POST['notice'] ) ) {
			set_transient( sanitize_text_field( wp_unslash( $_POST['notice'] ) ), true, 0 );
		}
	}

	/**
	** Notice Enqunue Scripts
	*/
	public function legacy_preschool_kindergarten_notice_enqueue_scripts( $page ) {
		
		wp_enqueue_script( 'jquery' );

		ob_start();
		?>
		<script>
			jQuery(function($) {
				$( document ).on( 'click', '.legacy-preschool-kindergarten-notice .notice-dismiss', function () {
					jQuery.post( 'ajax_url', {
						action: 'legacy_preschool_kindergarten_dismissed_handler',
						notice: $( this ).closest( '.legacy-preschool-kindergarten-notice' ).data( 'notice' ),
					});
					$( '.legacy-preschool-kindergarten-notice' ).hide();
				} );
			});
		</script>
		<?php
		$script = str_replace( 'ajax_url', admin_url( 'admin-ajax.php' ), ob_get_clean() );

		wp_add_inline_script( 'jquery', str_replace( ['<script>', '</script>'], '', $script ) );
	}

	/**
	** Register scripts and styles for welcome notice.
	*/
	public function legacy_preschool_kindergarten_admin_enqueue_scripts( $page ) {
		// Enqueue Styles.
		wp_enqueue_style( 'legacy-preschool-kindergarten-welcome-notic-css', get_template_directory_uri() . '/activation-notice/css/notice-bar.css' );
	}

}

new Legacy_Preschool_Kindergarten_Welcome_Notice();