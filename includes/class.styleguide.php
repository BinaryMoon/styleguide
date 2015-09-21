<?php

/**
 * The Styleguide class
 *
 * Does all the heavy lifting
 */
class StyleGuide {

	private $colors = array();

	private $fonts = array();

	private $version = '1.4';


	/**
	 * initialize everything
	 */
	public function __construct() {

		// prevent duplication
		global $styleguide;

		if ( isset( $styleguide ) ) {
			return $styleguide;
		}

		add_action( 'after_setup_theme', array( &$this, 'check_compat' ), 99 );
		add_action( 'wp_head', array( &$this, 'process_styles' ), 99 );
		add_action( 'customize_register', array( &$this, 'setup_customizer' ) );
		add_action( 'customize_register', array( &$this, 'customize_register' ), 99 );
		add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_fonts' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'dequeue_fonts' ), 99 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );

		add_filter( 'styleguide_get_fonts', array( &$this, 'filter_font_character_sets' ) );

	}


	/**
	 * include theme compatability file if it exists
	 *
	 * @param type $theme_name
	 */
	function check_compat() {

		$current_theme = wp_get_theme();

		$theme_name = $current_theme->get( 'Name' );
		$theme_name = strtolower( $theme_name );
		$theme_name = str_replace( ' ', '-', $theme_name );

		$file = plugin_dir_path( __FILE__ ) . '../theme-styles/' . $theme_name . '.php';

		// if there's no template file for the current theme then load the default
		if ( ! file_exists( $file ) ) {
			$file = plugin_dir_path( __FILE__ ) . '../theme-styles/_default.php';
		}

		include( $file );

	}


	/**
	 * Enqueue the Google fonts
	 *
	 * @return type
	 */
	function enqueue_fonts() {

		$settings = $this->get_settings();

		// make sure there's fonts to change
		if ( empty( $settings[ 'fonts' ] ) ) {
			return;
		}

		if ( $settings[ 'fonts' ] ) {

			$fonts = $this->process_fonts();

			// enqueue the fonts
			if ( $fonts ) {
				$query_args = array(
					'family' => implode( '|', $fonts ),
					'subset' => $this->character_set(),
				);

				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

				wp_enqueue_style( 'styleguide-fonts', $fonts_url );
			}

		}

	}


	/**
	 * If theres any preloaded fonts to dequeue then lets get rid of them
	 */
	function dequeue_fonts() {

		$settings = $this->get_settings( 'dequeue' );

		if ( $settings ) {
			foreach( $settings as $style ) {
				wp_dequeue_style( $style );
			}
		}

	}


	/**
	 * output the css styles for the current theme
	 */
	function process_styles() {

		$settings = $this->get_settings();

		if ( ! empty( $settings[ 'colors' ] ) ) {

			include_once( 'class.csscolor.php' );

			// if a background color is set
			if ( current_theme_supports( 'custom-background' ) ) {
				$this->process_colors( 'theme-background', get_background_color() );
			}

			// other custom colors
			foreach( $settings[ 'colors' ] as $color_key => $color ) {
				$this->process_colors( $color_key, get_theme_mod( 'styleguide_color_' . $color_key, $color[ 'default' ] ) );
			}

			// if there's any color combos then do them too
			if ( ! empty( $settings[ 'color-combos' ] ) ) {
				foreach( $settings[ 'color-combos' ] as $combo_key => $combo ) {
					$this->process_colors( $combo_key, $this->colors[ $combo[ 'background' ] . '-bg-0' ], $this->colors[ $combo[ 'foreground' ] . '-bg-0' ] );
				}
			}

		}

		if ( ! empty( $settings[ 'css' ] ) ) {
			$this->output_css( $settings[ 'css' ] );
		}

	}


	/**
	 * change transport type for default customizer types
	 * means users can make use of colours for more things
	 *
	 * @param type $wp_customize
	 */
	function customize_register( $wp_customize ) {

		// change section title
		$wp_customize->get_section( 'colors' )->title = __( 'Colors & Fonts', 'styleguide' );

		$settings = $this->get_settings( 'colors' );

		// make sure there's colors to change
		if ( empty( $settings ) ) {
			return;
		}

		// make custom background refresh the page rather than refresh with javascript
		if ( get_theme_support( 'custom-background', 'wp-head-callback' ) === '_custom_background_cb' ) {
			$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
		}

		// make custom header refresh the page rather than refresh with javascript
		if ( get_theme_support( 'custom-header', 'wp-head-callback' ) === '_custom_background_cb' ) {
			// $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
		}

	}


	/**
	 * print css to the head
	 *
	 * @param type $css
	 */
	function output_css( $css ) {

		$css = trim( $css );
		$start_css = $css;

		$css = $this->replace_colours( $css );
		$css = $this->replace_fonts( $css );

		// strip empty tags


		// if the css has changed then output css
		if ( $start_css != $css ) {
			echo '<!-- Styleguide styles -->' . "\r\n";
			echo '<style>' . stripslashes( wp_filter_nohtml_kses( $css ) ) . '</style>';
		}

	}


	/**
	 * Insert colours into css
	 *
	 * @param type $css
	 * @return type
	 */
	function replace_colours( $css ) {

		foreach( $this->colors as $key => $color ) {
			$css = str_replace( '{{color-' . $key . '}}', styleguide_sanitize_hex_color( $color ), $css );
		}

		return $css;

	}


	/**
	 * Insert fonts into css
	 *
	 * @param type $css
	 * @return type
	 */
	function replace_fonts( $css ) {

		foreach( $this->fonts as $key => $font ) {
			$css = str_replace( '{{font-' . $key . '}}', $font[ 'family' ], $css );

			if ( ! empty( $font[ 'weight' ] ) && 'default' !== $font[ 'weight' ] ) {
				$css = str_replace( '{{font-' . $key . '-weight}}', $font[ 'weight' ], $css );
			}
		}

		return $css;

	}


	/**
	 * process the colours and save them for later use
	 *
	 * @param type $colors
	 * @param type $styleguide
	 */
	function process_colors( $styleguide, $color1, $color2 = null ) {

		if ( null !== $color2 ) {
			$colors = new CSS_Color( styleguide_sanitize_hex_color( $color1 ), styleguide_sanitize_hex_color( $color2 ) );
		} else {
			$colors = new CSS_Color( styleguide_sanitize_hex_color( $color1 ) );
		}

		$this->add_colors( $styleguide . '-fg', $colors->fg );
		$this->add_colors( $styleguide . '-bg', $colors->bg );

	}


	/**
	 * work out which fonts to use
	 *
	 * @return string
	 */
	function process_fonts() {

		$fonts = array();
		$available_fonts = styleguide_fonts();
		$settings = $this->get_settings();

		if ( empty( $settings[ 'fonts' ] ) ) {
			return $fonts;
		}

		// load chosen fonts
		foreach( $settings[ 'fonts' ] as $font_key => $font ) {

			// make sure it's a google font and not a system font
			// by default all fonts are google fonts
			if ( ! isset( $font[ 'google' ] ) || true === $font[ 'google' ] ) {

				$key = 'styleguide_font_' . $font_key;
				$_font = get_theme_mod( $key, $font[ 'default' ] );
				$_font_weight = get_theme_mod( $key . '_weight', 'default' );

				// store font for use later
				if ( isset( $available_fonts[ $font[ 'default' ] ] ) ) {
					$this->fonts[ $font_key ][ 'family' ] = $available_fonts[ $font[ 'default' ] ][ 'family' ];
				}

				if ( ! empty( $available_fonts[ $_font ] ) ) {

					// add weights if required
					$weight = ':400,700';
					if ( isset( $available_fonts[ $_font ][ 'weight' ] ) ) {
						$weight = ':' . $available_fonts[ $_font ][ 'weight' ];
						// ensure weights aren't loaded if they don't exist
						if ( ':' === $weight ) {
							$weight = '';
						}
					}

					// add fallback fonts in case Google Fonts don't load
					$available_fonts[ $_font ][ 'family' ] = str_replace( ', serif', ', Georgia, serif', $available_fonts[ $_font ][ 'family' ] );
					$available_fonts[ $_font ][ 'family' ] = str_replace( ', san-serif', ', Arial, sans-serif', $available_fonts[ $_font ][ 'family' ] );

					// add weight to font
					$fonts[ $_font ] = $_font . $weight;

					// set css output
					$this->fonts[ $font_key ][ 'family' ] = $available_fonts[ $_font ][ 'family' ];
					$this->fonts[ $font_key ][ 'weight' ] = $_font_weight;
				}



			}

		}

		return $fonts;

	}


	/**
	 * add colors to the global array so that they can be easily accessed
	 *
	 * @param type $colors
	 * @param type $styleguide
	 */
	function add_colors( $styleguide, $colors ) {

		foreach( $colors as $key => $color ) {

			if ( $key == '0' ) {
				$key = '-0';
			}

			$this->colors[ ( $styleguide . $key ) ] = '#' . $color;

		}

	}


	/**
	 * setup the customizer control panel
	 */
	function setup_customizer( $wp_customize ) {

		$settings = $this->get_settings();

		if ( $settings ) {

			// include custom controls
			include_once( 'class.custom-controls.php' );

			$priority = 0;

			// add font controls
			if ( ! empty( $settings[ 'fonts' ] ) ) {

				// loop through fonts and output settings and controls
				foreach( $settings[ 'fonts' ] as $font_key => $font ) {

					$key = 'styleguide_font_' . $font_key;

					// font face
					$wp_customize->add_setting(
						$key,
						array(
							'default' => $font[ 'default' ],
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'styleguide_sanitize_fonts',
						)
					);

					$wp_customize->add_control(
						new Styleguide_Dropdown_Fonts(
							$wp_customize,
							$key,
							array(
								'label' => $font[ 'label' ],
								'section' => 'colors',
								'settings' => $key,
								'choices' => $this->get_fonts(),
								'priority' => $priority,
							)
						)
					);

					// font weight

					$key = 'styleguide_font_' . $font_key . '_weight';

					$wp_customize->add_setting(
						$key,
						array(
							'default' => '',
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'styleguide_sanitize_select',
						)
					);

					$wp_customize->add_control(
						new Styleguide_Dropdown(
							$wp_customize,
							$key,
							array(
								'label' => $font[ 'label' ],
								'section' => 'colors',
								'settings' => $key,
								'choices' => array( 'default', 'normal', 'bold' ),
								'priority' => $priority,
							)
						)
					);

					$priority ++;

				}

			}

			// add color controls
			if ( ! empty( $settings[ 'colors' ] ) ) {

				// does the color control already exist (through background and header colour customization?
				// if not then create the control - else reuse the existing one


				// loop through colours and output controls
				foreach( $settings[ 'colors' ] as $color_key => $color ) {

					$key = 'styleguide_color_' . $color_key;

					$wp_customize->add_setting( $key, array(
						'default' => $color[ 'default' ],
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'styleguide_sanitize_hex_color',
					) );

					$wp_customize->add_control(
						new WP_Customize_Color_Control(
							$wp_customize,
							$key,
							array(
								'label' => $color[ 'label' ],
								'section' => 'colors',
								'settings' => $key,
								'priority' => $priority,
							)
						)
					);

					$priority ++;

				}


			}

		}

	}


	/**
	 * return the available fonts
	 *
	 * @return type
	 */
	function get_fonts() {

		$_fonts = styleguide_fonts();

		$fonts = array(
			'' => array(
				'name' => __( 'Default', 'styleguide' ),
				'family' => '',
			),
		);

		foreach( $_fonts as $key => $font ) {
			$fonts[ $key ] = $font;
		}

		return $fonts;

	}


	/**
	 * get the settings for the theme with optional key
	 *
	 * @param type $key
	 */
	function get_settings( $key = null ) {

		$settings = get_theme_support( 'styleguide' );

		if ( isset( $settings[0] ) ) {
			$settings = $settings[0];
		}

		// check request for key
		if ( null !== $key ) {
			if ( isset( $settings[ $key ] ) ) {
				return $settings[ $key ];
			} else {
				return false;
			}
		}

		return $settings;

	}


	/**
	 * Enqueue default scripts and styles required for the customizer
	 * Other styles may be included in controls as and when needed
	 */
	function customize_controls_enqueue_scripts() {

		wp_enqueue_style( 'styleguide-customizer-styles', plugins_url( '../styles/customizer.css', __FILE__ ) );
		wp_enqueue_script( 'styleguide-font-preview', plugins_url( '../js/customizer.js', __FILE__ ), array( 'jquery' ), $this->version, true );

	}


	/**
	 * Register Styleguide settings
	 */
	function register_settings() {

		add_settings_section(
			'styleguide_settings_section',
			esc_html__( 'Styleguide Options', 'styleguide' ),
			'__return_false',
			'general'
		);

		add_settings_field(
			'styleguide_character_set',
			esc_html__( 'Character Set', 'styleguide' ),
			array( &$this, 'character_set_dropdown' ),
			'general',
			'styleguide_settings_section',
			array(
				'styleguide_character_set'
			)
		);

		register_setting(
			'general',
			'styleguide_character_set',
			'styleguide_sanitize_character_set'
		);

	}


	/**
	 * Dropdown control for selecting character sets in the WP admin
	 */
	function character_set_dropdown() {

		$sets = styleguide_get_character_sets();
?>
	<select id="styleguide_character_set" name="styleguide_character_set">
<?php
		foreach( $sets as $k => $set ) {
?>
		<option value="<?php echo esc_attr( $k ); ?>" <?php selected( $k, get_option( 'styleguide_character_set' ) ); ?>><?php echo $set[ 'name' ]; ?></option>
<?php
		}
?>
	</select>
<?php

	}


	/**
	 * Get the character set for the current website
	 * Defaults to latin,latin-ext
	 *
	 * @return type
	 */
	function character_set() {

		$set = 'latin';
		$sets = styleguide_get_character_sets();
		$saved_set = styleguide_sanitize_character_set( get_option( 'styleguide_character_set' ) );

		if ( ! empty( $saved_set ) ) {
			$set = $saved_set;
		}

		return $sets[ $saved_set ][ 'sets' ];

	}


	function filter_font_character_sets( $fonts ) {

		$processed = array();

		$character_set = get_option( 'styleguide_character_set' );
		$set = 'latin';
		$saved_set = styleguide_sanitize_character_set( get_option( 'styleguide_character_set' ) );

		if ( ! empty( $saved_set ) ) {
			$set = $saved_set;
		}

		foreach( $fonts as $k => $font ) {
			if ( is_array( $font[ 'sets' ] ) && in_array( $saved_set, $font[ 'sets' ] ) ) {
				$processed[ $k ] = $font;
			}
		}

		return $processed;

	}

}

$styleguide = new StyleGuide();