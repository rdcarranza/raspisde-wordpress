<?php
/**
 * Theme information Legacy Preschool Kindergarten
 *
 * @package Legacy Preschool Kindergarten
 */


 define('LEGACY_PRESCHOOL_KINDERGARTEN_DEMO_URL','https://legacytheme.net/trial/legacy-preschool-kindergarten/');
 define('LEGACY_PRESCHOOL_KINDERGARTEN_THEME_PRO_URL','https://www.legacytheme.net/products/preschool-wordpress-theme/');
 define('LEGACY_PRESCHOOL_KINDERGARTEN_THEME_DOC_URL','https://www.legacytheme.net/tutorial/legacy-preschool-kindergarten/');
 define('LEGACY_PRESCHOOL_KINDERGARTEN_THEME_SUPPORT_URL','https://wordpress.org/support/theme/legacy-preschool-kindergarten/');
 define('LEGACY_PRESCHOOL_KINDERGARTEN_THEME_RATINGS_URL','https://wordpress.org/support/theme/legacy-preschool-kindergarten/reviews/');
 define('LEGACY_PRESCHOOL_KINDERGARTEN_THEME_UPGRADE_URL','https://www.legacytheme.net/products/legacy-preschool-kindergarten-wordpress-theme/');
 define('LEGACY_PRESCHOOL_KINDERGARTEN_THEME_BUNDLE_URL','https://www.legacytheme.net/products/wordpress-theme-bundle/');  


if ( ! class_exists( 'Legacy_Preschool_Kindergarten_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Legacy_Preschool_Kindergarten_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Legacy_Preschool_Kindergarten_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Legacy_Preschool_Kindergarten_About_Page
		 *
		 * @var Legacy_Preschool_Kindergarten_About_Page $instance The Legacy_Preschool_Kindergarten_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Legacy_Preschool_Kindergarten_About_Page instance.
		 *
		 * We make sure that only one instance of Legacy_Preschool_Kindergarten_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function legacy_preschool_kindergarten_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Legacy_Preschool_Kindergarten_About_Page ) ) {
				self::$instance = new Legacy_Preschool_Kindergarten_About_Page;				
				self::$instance->config = $config;
				self::$instance->legacy_preschool_kindergarten_setup_config();	
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function legacy_preschool_kindergarten_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
				
		}	
	}
}


/**
 *  Adding a About page 
 */
add_action('admin_menu', 'legacy_preschool_kindergarten_add_menu');
function legacy_preschool_kindergarten_add_menu() {
     add_theme_page(esc_html__('Legacy-themes','legacy-preschool-kindergarten'), esc_html__('Get Theme Info','legacy-preschool-kindergarten'),'manage_options', esc_html__('legacy-preschool-kindergarten-theme-info','legacy-preschool-kindergarten'), esc_html__('legacy_preschool_kindergarten_theme_info','legacy-preschool-kindergarten'));
}

/**
 *  Callback
 */
function legacy_preschool_kindergarten_theme_info() {
	$theme = wp_get_theme();?>
	<div class="theme-info-get">
		<div class="container">
			<div class="top-section">
				<div class="title">
					<h1 class="info-theme-name"><?php esc_html_e( 'Legacy Preschool Kindergarten WordPress Theme', 'legacy-preschool-kindergarten' ); ?> <span><?php echo $theme->get( 'Version' ); ?></span> </h1>
					<p><?php echo $theme->get( 'Description' ); ?></p>
				</div>
			</div>
			<div class="buttons-box">
				<div class="info-btns-link">
					<div class="sidebar">
						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-format-aside"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_THEME_DOC_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DOCUMENTATION', 'legacy-preschool-kindergarten' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-visibility"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_DEMO_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DEMOS', 'legacy-preschool-kindergarten' ); ?></a></h3>
							</div>	
						</div>	

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-admin-generic"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_THEME_UPGRADE_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'legacy-preschool-kindergarten' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-star-filled"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'RATE OUR THEME', 'legacy-preschool-kindergarten' ); ?></a></h3>
							</div>						
						</div>						

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-sos"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_THEME_SUPPORT_URL); ?>" target="_blank"><?php esc_html_e( 'ASK FOR SUPPORT', 'legacy-preschool-kindergarten' ); ?></a></h3>
							</div>						
						</div>							
					</div>
				</div>
			</div>		
			<div class="middle-section">
				<div class="screnshot-wrapper">
					<div class="scrnsht-box">
						<img class="scrnshot-img" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
					</div>
				</div>
			</div>
			<div class="tick-box">
				<div class="comp-box">
					<h2 class="table-heading">
						<?php esc_html_e( 'Why choose our PRO Block Theme version?', 'legacy-preschool-kindergarten' ); ?>
					</h2>

					<div class="comp-table">
						<table>
							<thead>
								<tr>
									<th class="thead-column1"><strong><h4><?php esc_html_e( 'Feature', 'legacy-preschool-kindergarten' ); ?></h4></strong></th>
									<th class="thead-column2"><strong><h4><?php esc_html_e( 'Legacy Preschool Kindergarten Free', 'legacy-preschool-kindergarten' ); ?></h4></strong></th>
									<th class="thead-column3"><strong><h4><?php esc_html_e( 'Legacy Preschool Kindergarten Pro', 'legacy-preschool-kindergarten' ); ?></h4></strong></th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Full Site Editing (FSE) Support', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Global Styles (theme.json)', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Custom Block Patterns', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Custom Block Styles (Buttons, Headings, etc.)', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Multiple Template Parts (Header, Footer, Sidebar)', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Advanced Template Library', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Multiple Color Palettes & Gradients', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Typography Controls (Fonts, Sizes, Spacing)', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'WooCommerce Block Integration', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Performance Optimized (Lightweight, Fast)', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Animation & Scroll Effects', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Custom Query Loop Designs', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Header & Footer Layout Variations', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Custom 404 & Archive Templates', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr>
									<td class="tbody-column1"><?php esc_html_e( 'Priority Support', 'legacy-preschool-kindergarten' ); ?></td>
									<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
									<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>

								<tr class="last-row">
									<td class="tbody-column1"></td>
									<td class="tbody-column2"></td>
									<td class="tbody-column3">
										<a class="button button-primary button-large" href="<?php echo esc_url( LEGACY_PRESCHOOL_KINDERGARTEN_THEME_PRO_URL ); ?>" target="_blank">
											<?php esc_html_e( 'Upgrade to PRO', 'legacy-preschool-kindergarten' ); ?>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
		<div class="bundle-detail">
			<div class="second-side">
				<div class="bundle-wrapper">
					<h3 class="info-theme-name"><?php esc_html_e( 'Bundle up and save! Unlock all our stunning themes in one exclusive pack.', 'legacy-preschool-kindergarten' ); ?> </h3>
					<div class="scrnsht-box bundlee">
                   			<img class="scrnshot-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/bundle.png' ); ?>" alt="<?php esc_attr_e('bundle-img', 'legacy-preschool-kindergarten'); ?>">
					</div>
					<div class="info-pro-btn">
						<a class="button button-primary button-large bundle-btn" href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_THEME_BUNDLE_URL); ?>" target="_blank"><?php esc_html_e( 'GET ALL THEMES – $59', 'legacy-preschool-kindergarten' ); ?></a>
					</div>
					<div class="info-pro-btn">
						<a class="button button-primary button-large" href="<?php echo esc_url(LEGACY_PRESCHOOL_KINDERGARTEN_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'legacy-preschool-kindergarten' ); ?></a>
					</div>
				</div>
			</div>
		</div>	
	</div>
<?php
}
