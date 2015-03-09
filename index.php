<?php
/*
Plugin Name: Styleguide
Plugin URI: http://wordpress.org/plugins/styleguide/
Description: Easily customise styles and fonts for the themes you use on your website.
Version: 1.1.0
Author: BinaryMoon
Author URI: http://www.binarymoon.co.uk
License: GPLv2 or later
Text Domain: styleguide
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Wishlist
 *
 * style templates
 * allow fonts that aren't in the font list (to support themes with default fonts)
 * add intelligent defaults for properties
 * check if the color control already exists and if not create it
 * behave better when there's already defined colours (eg with Twenty Fifteen)
 * remove rules containing handlebars
 * support for different font character sets
 */

class StyleGuide {

	private $colors = array();

	private $fonts = array();


	/**
	 *
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

	}


	/**
	 * include theme compatibility file if it exists
	 *
	 * @param type $theme_name
	 */
	function check_compat() {

		$current_theme = wp_get_theme();

		$theme_name = $current_theme->get( 'Name' );
		$theme_name = strtolower( $theme_name );
		$theme_name = str_replace( ' ', '-', $theme_name );

		if( file_exists( get_stylesheet_directory() . '/theme-styles/' . $theme_name . '.php' ) ) { // Check in child theme (it its active) first for template .
		    $file = get_stylesheet_directory() . '/theme-styles/' . $theme_name . '.php';
		} elseif( file_exists( get_template_directory() . '/theme-styles/' . $theme_name . '.php' ) ) { // Next check in the active theme (if its not a child theme).
		    $file = get_template_directory() . '/theme-styles/' . $theme_name . '.php';
		} else {
		    $file = plugin_dir_path( __FILE__ ) . 'theme-styles/' . $theme_name . '.php'; // Else retrieve template from the plugin if it exists.
		}

		// if there's no template file for the current theme then load the default
		if ( ! file_exists( $file ) ) {
			$file = plugin_dir_path ( __FILE__ ) . 'theme-styles/_default.php';
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
		if ( empty( $settings['fonts'] ) ) {
			return;
		}

		if ( $settings['fonts'] ) {

			$fonts = $this->process_fonts();

			// enqueue the fonts
			if ( $fonts ) {
				$query_args = array(
					'family' => implode( '|', $fonts ),
					'subset' => 'latin,latin-ext',
				);

				$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

				wp_enqueue_style( 'styleguide-fonts', $fonts_url );
			}

		}

	}


	/**
	 * If there's any preloaded fonts to dequeue then lets get rid of them
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

		if ( ! empty( $settings['colors'] ) ) {

			include_once( plugin_dir_path( __FILE__ ) . 'includes/csscolor.php' );

			// if a background color is set
			if ( current_theme_supports( 'custom-background' ) ) {
				$this->process_colors( 'theme-background', get_background_color() );
			}

			// other custom colors
			foreach( $settings['colors'] as $color_key => $color ) {
				$this->process_colors( $color_key, get_theme_mod( 'styleguide_color_' . $color_key, $color[ 'default' ] ) );
			}

			// if there's any color combos then do them too
			if ( ! empty( $settings['color-combos'] ) ) {
				foreach( $settings['color-combos'] as $combo_key => $combo ) {
					$this->process_colors( $combo_key, $this->colors[ $combo['background'] . '-bg-0' ], $this->colors[ $combo['foreground'] . '-bg-0' ] );
				}
			}

		}

		$css = $settings['css'];

		// add in custom css
		$custom_css = get_theme_mod( 'styleguide_custom_css', '' );
		if ( ! empty( $custom_css ) ) {
			$css .= "\n\n" . $custom_css;
		}

		if ( ! empty( $css ) ) {
			$this->output_css( $css );
		}

	}


	/**
	 * change transport type for default customizer types
	 * means users can make use of colours for more things
	 *
	 * @param type $wp_customize
	 */
	function customize_register( $wp_customize ) {

		$current_theme = wp_get_theme();

		$theme_name = $current_theme->get( 'Name' );
		
		// change section title
		$wp_customize->get_section( 'colors' )->title = __( $theme_name . ' Colors & Fonts', 'styleguide' );

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

		// replace colours in the css template
		foreach( $this->colors as $key => $color ) {
			$css = str_replace( '{{color-' . $key . '}}', styleguide_sanitize_hex_color( $color ), $css );
		}

		// replace fonts in the css template
		foreach( $this->fonts as $key => $font ) {
			$css = str_replace( '{{font-' . $key . '}}', $font, $css );
		}

		// if the css has changed then output css
		if ( $start_css != $css ) {
			echo '<!-- Styleguide styles -->' . "\r\n";
			echo '<style>' . wp_filter_nohtml_kses( $css ) . '</style>';
		}


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

		if ( empty( $settings['fonts'] ) ) {
			return $fonts;
		}

		// load chosen fonts
		foreach( $settings['fonts'] as $font_key => $font ) {
			// make sure it's a google font and not a system font
			// by default all fonts are google fonts
			if ( ! isset( $font['google'] ) || true === $font['google'] ) {
				$key = 'styleguide_font_' . $font_key;
				$_font = get_theme_mod( $key, $font[ 'default' ] );

				// store font for use later
				if ( isset( $available_fonts[ $font[ 'default' ] ] ) ) {
					$this->fonts[ $font_key ] = $available_fonts[ $font[ 'default' ] ][ 'family' ];
				}

				if ( isset( $available_fonts[ $_font ] ) ) {
					$fonts[ $_font ] = $_font . ':400,700';
					$this->fonts[ $font_key ] = $available_fonts[ $_font ][ 'family' ];
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
			$this->colors[ ($styleguide . $key) ] = '#' . $color;
		}

	}


	/**
	 * setup the customizer control panel
	 */
	function setup_customizer( $wp_customize ) {

		$settings = $this->get_settings();

		if ( $settings ) {

			$priority = 1;

			// add font controls
			if ( ! empty( $settings['fonts'] ) ) {

				// loop through fonts and output settings and controls
				foreach( $settings[ 'fonts' ] as $font_key => $font ) {

					$key = 'styleguide_font_' . $font_key;

					$wp_customize->add_setting( $key, array(
						'default' => $font['default'],
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'styleguide_sanitize_select',
					) );

					$wp_customize->add_control(
						$key,
						array(
							'label' => $font[ 'label' ],
							'section' => 'colors',
							'settings' => $key,
							'type' => 'select',
							'choices' => $this->get_fonts(),
							'priority' => $priority,
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
				foreach( $settings['colors'] as $color_key => $color ) {

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

		// custom css
		$wp_customize->add_section( 'styleguide_custom_css', array(
			'title' => __( 'Custom CSS', 'styleguide' ),
			'description' => __( 'New to CSS? Start with a beginner tutorial. Questions? Ask in the Themes and Templates forum.', 'styleguide' ),
		) );

		$wp_customize->add_setting( 'styleguide_custom_css', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses',
		) );

		$wp_customize->add_control( 'styleguide_custom_css', array(
			'label' => __( 'Custom CSS', 'styleguide' ),
			'section' => 'styleguide_custom_css',
			'type' => 'textarea',
		) );

	}


	/**
	 * return the available fonts
	 */
	function get_fonts() {

		$_fonts = styleguide_fonts();

		$fonts = array(
			'' => __( 'Default', 'styleguide' ),
		);

		foreach( $_fonts as $key => $font ) {
			$fonts[ $key ] = $font[ 'name' ];
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

}

$styleguide = new StyleGuide();


/**
 * sanitize a hexadecimal colour
 *
 * @param type $color
 * @return string
 */
function styleguide_sanitize_hex_color( $color ) {

	if ( '' === $color ) {
		return '';
	}

	$color = str_replace( '#', '', $color );

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return '#' . $color;
	}

	return null;

}


/**
 * make sure the value returned is in the fonts array
 *
 * @param type $id
 * @return type
 */
function styleguide_sanitize_select( $id ) {

	$_fonts = styleguide_fonts();

	if ( isset( $_fonts[ $id ] ) ) {
		return $id;
	}

	return null;

}


/**
 * get the available fonts
 *
 * @return type
 */
function styleguide_fonts() {

	$fonts = array(
		'Alegreya Sans' => array(
			'name' => 'Alegreya Sans',
			'family' => '"Alegreya Sans", sans-serif',
		),
		'Arimo' => array(
			'name' => 'Arimo',
			'family' => 'Arimo, sans-serif',
		),
		'Bitter' => array(
			'name' => 'Bitter',
			'family' => 'Bitter, serif',
		),
		'Droid Sans' => array(
			'name' => 'Droid Sans',
			'family' => '"Droid Sans", sans-serif',
		),
		'Droid Serif' => array(
			'name' => 'Droid Serif',
			'family' => '"Droid Serif", serif',
		),
		'Georgia' => array(
			'name' => 'Georgia',
			'family' => 'Georgia, "Bitstream Charter", serif',
			'google' => false,
		),
		'Helvetica' => array(
			'name' => 'Helvetica',
			'family' => '"Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif',
			'google' => false,
		),
		'Lato' => array(
			'name' => 'Lato',
			'family' => 'Lato, sans-serif',
		),
		'Lora' => array(
			'name' => 'Lora',
			'family' => 'Lora, serif',
		),
		'Lobster' => array(
			'name' => 'Lobster',
			'family' => 'Lobster, serif',
		),
		'Merriweather' => array(
			'name' => 'Merriweather',
			'family' => 'Merriweather, serif',
		),
		'Merriweather+Sans' => array(
			'name' => 'Merriweather Sans',
			'family' => '"Merriweather Sans", sans-serif',
		),
		'Montserrat' => array(
			'name' => 'Montserrat',
			'family' => 'Montserrat, sans-serif',
		),
		'Noto Sans' => array(
			'name' => 'Noto Sans',
			'family' => '"Noto Sans", sans-serif',
		),
		'Noto Serif' => array(
			'name' => 'Noto Serif',
			'family' => '"Noto Serif", serif',
		),
		'Open Sans' => array(
			'name' => 'Open Sans',
			'family' => '"Open Sans", sans-serif',
		),
		'Open Sans Condensed' => array(
			'name' => 'Open Sans',
			'family' => '"Open Sans Condensed", sans-serif',
		),
		'Oswald' => array(
			'name' => 'Oswald',
			'family' => 'Oswald, sans-serif',
		),
		'Pt Sans' => array(
			'name' => 'PT Sans',
			'family' => '"PT Sans", sans-serif',
		),
		'Raleway' => array(
			'name' => 'Raleway',
			'family' => 'Raleway, sans-serif',
		),
		'Roboto' => array(
			'name' => 'Roboto',
			'family' => 'Roboto, sans-serif',
		),
		'Roboto Condensed' => array(
			'name' => 'Roboto Condensed',
			'family' => '"Roboto Condensed", serif',
		),
		'Roboto Slab' => array(
			'name' => 'Roboto Slab',
			'family' => '"Roboto Slab", serif',
		),
		'Source Sans Pro' => array(
			'name' => 'Source Sans Pro',
			'family' => '"Source Sans Pro", sans-serif',
		),
		'Titillium Web' => array(
			'name' => 'Titillium Web',
			'family' => '"Titillium Web", sans-serif',
		),
		'Ubuntu' => array(
			'name' => 'Ubuntu',
			'family' => 'Ubuntu, sans-serif',
		),
	);

	return apply_filters( 'styleguide_get_fonts', $fonts );

}