<?php
/**
 * Theme Customizer classes
 *
 * @package Styleguide
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Display specified list of Google fonts with Font preview
 */
class Styleguide_Dropdown_Fonts extends WP_Customize_Control {


	/**
	 * Widget properties
	 *
	 * @var array
	 */
	public $params = array();


	/**
	 * Construct the widget
	 *
	 * @param type $manager
	 * @param type $id
	 * @param type $args
	 */
	public function __construct( $manager, $id, $args = array() ) {

		$this->params = $args['choices'];
		parent::__construct( $manager, $id, $args );

		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}


	/**
	 * Display a list of fonts as a select dropdown
	 * will be converted by javascript to make a html list of fonts to select
	 */
	public function render_content() {

		$value = $this->value();

?>
	<label class="styleguide-font-picker">
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<select <?php $this->link(); ?> id="<?php echo $this->id; ?>">
<?php
	foreach ( $this->params as $k => $v ) {
		$family = str_replace( '"', '\'', $v['family'] );
?>
			<option data-font-family="<?php echo esc_attr( $family ); ?>" value="<?php echo esc_attr( $k ); ?>" <?php echo selected( $value, $k, false ); ?>><?php echo esc_html( $v['name'] ); ?></option>
<?php
	}
?>
		</select>
	</label>
<?php
	}


	/**
	 * Enqueue Google fonts
	 */
	public function enqueue_scripts() {

		if ( $this->params ) {

			$fonts = array();

			foreach ( $this->params as $k => $v ) {
				if ( ! empty( $k ) ) {
					$font = $k;
					$fonts[] = $font;
				}
			}

			if ( $fonts ) {
				$query_args = array(
					'family' => implode( '|', $fonts ),
					'text' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
				);
				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

				wp_enqueue_style( 'styleguide-font-preview', $fonts_url );
			}
		}
	}
}

/**
 * Dropdown customizer control
 * allows arbitrary dropdown control that can display any list of data
 */
class Styleguide_Dropdown extends WP_Customize_Control {


	/**
	 * Widget properties.
	 * @var array
	 */
	public $params = array();


	/**
	 * Construct the widget
	 *
	 * @param type $manager
	 * @param type $id
	 * @param type $args
	 */
	public function __construct( $manager, $id, $args = array() ) {

		$this->params = $args['choices'];
		parent::__construct( $manager, $id, $args );

	}


	/**
	 * Display a standard text select dropdown
	 */
	public function render_content() {

		$value = $this->value();

?>
	<label class="styleguide-custom-dropdown">
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<select <?php $this->link(); ?> id="<?php echo esc_attr( $this->id ); ?>">
<?php
	foreach ( $this->params as $k => $v ) {
?>
			<option value="<?php echo esc_attr( $k ); ?>" <?php echo selected( $value, $v, false ); ?>><?php echo esc_html( $v ); ?></option>
<?php
	}
?>
		</select>
	</label>
<?php
	}
}
